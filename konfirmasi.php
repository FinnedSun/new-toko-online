<?php
session_start();
require "koneksi.php";

$id_pembelian = $_GET['id'];

// Ambil data pembelian dari database
$sql_pembelian = "SELECT * FROM pembelian WHERE id = '$id_pembelian'";
$query_pembelian = mysqli_query($con, $sql_pembelian);
$data_pembelian = mysqli_fetch_assoc($query_pembelian);

// Ambil data detail pembelian dari database
$sql_detail_pembelian = "SELECT dp.*, p.nama AS nama_produk FROM pembelian dp JOIN produk p ON dp.produk_id = p.id WHERE dp.pembelian_id = '$id_pembelian'";
$query_detail_pembelian = mysqli_query($con, $sql_detail_pembelian);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pembelian</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Konfirmasi Pembelian</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID Pembelian: <?php echo $id_pembelian; ?></h5>
                <p class="card-text">Nama Pelanggan: <?php echo $data_pembelian['nama_pelanggan']; ?></p>
                <p class="card-text">Tanggal Pembelian: <?php echo $data_pembelian['tanggal_pembelian']; ?></p>
                <p class="card-text">Status Pembelian: <?php echo $data_pembelian['status_pembelian']; ?></p>
                <p class="card-text">Total Pembelian: <?php echo rupiah($data_pembelian['total_pembelian']); ?></p>
                <h6>Detail Pembelian:</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data_detail = mysqli_fetch_assoc($query_detail_pembelian)) : ?>
                            <tr>
                                <td><?php echo $data_detail['nama_produk']; ?></td>
                                <td><?php echo $data_detail['jumlah']; ?></td>
                                <td><?php echo rupiah($data_detail['harga']); ?></td>
                                <td><?php echo rupiah($data_detail['subtotal']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>