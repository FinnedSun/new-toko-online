<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : null;
$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : 1;
$maxJumlah = 5; 

if ($id !== null) {
    if (isset($_SESSION['keranjang'][$id])) {
        // Menambahkan jumlah produk dalam keranjang
        $jumlahBaru = $_SESSION['keranjang'][$id]['jumlah'] + $jumlah;
        if ($jumlahBaru <= $maxJumlah) {
            $_SESSION['keranjang'][$id]['jumlah'] = $jumlahBaru;
            echo "<script>alert('Produk telah ditambah');window.location.href='keranjang.php?page=keranjang';</script>";
        } else {
            echo "<script>alert('anda mencapai jumlah maksimal $maxJumlah');window.location.href='keranjang.php?page=keranjang';</script>";
        }
    } else {
        // Menambahkan produk baru ke keranjang
        $produk = fetchProdukData($id); 

        if ($produk) {
            if ($jumlah <= $maxJumlah) {
                $_SESSION['keranjang'][$id] = array(
                    'id' => $produk['id'],
                    'nama' => $produk['nama'],
                    'harga' => $produk['harga'],
                    'jumlah' => $jumlah
                );
                echo "<script>alert('Produk telah ditambah');window.location.href='keranjang.php?page=keranjang';</script>";
            } else {
                echo "<script>alert('Jumlah maksimal produk dalam keranjang adalah $maxJumlah');window.location.href='index.php?page=keranjang';</script>";
            }
        } else {
            echo "<script>alert('Produk tidak ditemukan');window.location.href='index.php?page=keranjang';</script>";
        }
    }
} else {
    echo "<script>alert('Produk tidak ditemukan');window.location.href='index.php?page=keranjang';</script>";
}

// Fungsi untuk mendapatkan data produk dari database
function fetchProdukData($id) {
}