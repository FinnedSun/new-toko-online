<?php
session_start();

// Periksa koneksi ke database
require "koneksi.php";

// Ambil data produk berdasarkan ID
$id_produk = $_GET['id'];
$query = "SELECT * FROM produk WHERE id = '$id_produk'";
$result = $con->query($query);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $nama_produk = $data['nama'];
    $harga_produk = $data['harga'];

    // Cek apakah produk sudah ada dalam keranjang
    if (isset($_SESSION['keranjang'][$id_produk])) {
        // Jika produk sudah ada, tambahkan jumlah
        $_SESSION['keranjang'][$id_produk]['jumlah']++;
    } else {
        // Jika produk belum ada, tambahkan ke keranjang
        $_SESSION['keranjang'][$id_produk] = [
            'nama' => $nama_produk,
            'harga' => $harga_produk,
            'jumlah' => 1
        ];
    }

    // Redirect ke halaman keranjang
    header("Location: keranjang.php");
    exit();
} else {
    echo "Produk tidak ditemukan.";
}
?>