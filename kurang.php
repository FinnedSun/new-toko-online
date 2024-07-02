<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null && isset($_SESSION['keranjang'][$id])) {
    if ($_SESSION['keranjang'][$id]['jumlah'] > 1) {
        $_SESSION['keranjang'][$id]['jumlah'] -= 1;
    } else {
        unset($_SESSION['keranjang'][$id]);
    }

    echo "<script>alert('Produk telah dikurangi');window.location.href='index.php?page=keranjang';</script>";
} else {
    echo "<script>alert('Produk tidak ditemukan dalam keranjang');window.location.href='index.php?page=keranjang';</script>";
}