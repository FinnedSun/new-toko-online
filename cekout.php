<?php
session_start();
require "koneksi.php";

$total = 0; // Inisialisasi total dengan 0
$idPelanggan = 0; // Inisialisasi $idPelanggan dengan nilai default 0
$buktibayar = ''; // Inisialisasi $buktibayar dengan string kosong

// Cek apakah ada file yang diunggah
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['bukti_pembayaran'])) {
    $buktibayar = $_FILES['bukti_pembayaran'];
    $nama_file = $buktibayar['name'];
    $tmp_file = $buktibayar['tmp_name'];
    $error = $buktibayar['error'];

    // Cek apakah file berhasil diunggah
    if ($error === 0) {
        // Tentukan direktori untuk menyimpan file
        $direktori_upload = 'image/';
        if (!is_dir($direktori_upload)) {
            mkdir($direktori_upload, 0755, true);
        }
        $path_file = $direktori_upload . $nama_file;

        // Pindahkan file ke direktori yang ditentukan
        if (move_uploaded_file($tmp_file, $path_file)) {
            // File berhasil diupload, simpan path file ke variabel $buktibayar
            $buktibayar = $path_file;
        } else {
            echo "Terjadi kesalahan saat mengupload file bukti pembayaran.";
            exit; // Berhenti eksekusi jika gagal upload
        }
    } else {
        echo "Terjadi kesalahan saat mengupload file bukti pembayaran: " . $error;
        exit; // Berhenti eksekusi jika gagal upload
    }
}

// Cek apakah session 'member' ada dan memiliki 'pelanggan_id'
if (isset($_SESSION['member']) && isset($_SESSION['member']['pelanggan_id'])) {
    $idPelanggan = $_SESSION['member']['pelanggan_id'];
} else {
    echo "Pelanggan tidak ditemukan.";
    exit; // Berhenti eksekusi jika pelanggan tidak ditemukan
}

$tgl = date('Y-m-d');

if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $id => $cart) {
        $jumlah = (int)$cart['jumlah'];
        $data = $con->query("SELECT * FROM `produk` WHERE id = '$id'")->fetch_assoc();
        if ($data) {
           
            $subHarga = $jumlah * $data['harga'];
            $total += $subHarga; // Akumulasikan total harga
        } else {
            echo "Produk dengan ID $id tidak ditemukan.";
        }
    }

    // Debug: Periksa nilai $buktibayar
    echo "Path Bukti Bayar: " . $buktibayar . "<br>";

    // Insert data pembelian
    $query = "INSERT INTO `pembelian`(`pelanggan_id`, `pembelian_tgl`, `pembelian_total`, `pembelian_status`, `bukti_bayar`) VALUES ('$idPelanggan', '$tgl', '$total', 'Belum Dibayar', '$buktibayar')";
    if ($con->query($query)) {
        $theLastId = $con->insert_id;
    } else {
        echo "Gagal menyimpan data pembelian: " . $con->error;
        exit; // Berhenti eksekusi jika gagal menyimpan data pembelian
    }

    if ($theLastId) {
        foreach ($_SESSION['keranjang'] as $id => $cart) {
            $jumlah = (int)$cart['jumlah'];
            $data = $con->query("SELECT * FROM `produk` WHERE id = '$id'")->fetch_assoc();
            if ($data) {
                
                $subHarga = $jumlah *  $data['harga'];
                $produk = $data['id'];

               // Kurangi ketersediaan_stok dan simpan stok_sisa
                $ketersediaanStok = $data['ketersediaan_stok'];
                $stokSisa = $ketersediaanStok - $jumlah;
                $con->query("UPDATE `produk` SET `stok_sisa` = '$stokSisa' WHERE `id` = '$produk'");

                $con->query("INSERT INTO `pembelian_produk`(`pembelian_id`, `produk_id`, `pembelian_produk_jumlah`, `pembelian_produk_harga`, `pembelian_sub_harga`) VALUES ('$theLastId', '$produk', '$jumlah', '$subHarga')");
            } else {
                echo "Produk dengan ID $id tidak ditemukan.";
            }
        }

        // Hapus session keranjang belanja setelah pembelian berhasil
        unset($_SESSION['keranjang']);
        echo "<script> alert('Pembelian Sukses'); window.location='index.php?page=nota&id=$theLastId'; </script>";
    } else {
        echo "Gagal menyimpan data pembelian.";
    }
} else {
    echo "Keranjang belanja kosong.";
}
?>
