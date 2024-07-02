<?php
session_start(); // Pastikan Anda telah memulai sesi sebelum menggunakan $_SESSION

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['keranjang'][$id])) {
        // Hapus item dari keranjang
        unset($_SESSION['keranjang'][$id]);

        echo "
        <script>
        alert('Produk telah dihapus dari keranjang');
        location='index.php?page=keranjang';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Produk tidak ditemukan dalam keranjang');
        location='index.php?page=keranjang';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('ID produk tidak valid');
    location='index.php?page=keranjang';
    </script>
    ";
}
?>