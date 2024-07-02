<?php
require "koneksi.php";

// Fungsi untuk memformat angka menjadi format rupiah
function rupiah($angka) {
    $hasil = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil;
}

// Cek apakah parameter id dikirimkan melalui GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data transaksi dan pelanggan
    $resultTrx = $con->query("SELECT * FROM `pembelian` JOIN pelanggan ON pembelian.pelanggan_id=pelanggan.pelanggan_id WHERE pembelian.pembelian_id = '$id'");
    if ($resultTrx) {
        $dataTrx = $resultTrx->fetch_assoc();
        
        // Cek apakah data transaksi ditemukan
        if ($dataTrx) {
            session_start();
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Cetak Transaksi</title>
                <link href="bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
                <style>
                    body {
                        font-family: 'Times New Roman', Times, serif;
                        color: #333;
                        background-color: #f5f5f5;
                    }
                    .cetak {
                        background-color: #fff;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 0 20px rgba(0,0,0,0.1);
                    }
                    h1, h3 {
                        color: #333;
                    }
                    .header, .footer {
                        border-bottom: 2px solid #ddd;
                        margin-bottom: 100px;
                    }
                    .header img {
                        width: 100px;
                        height: auto;
                    }
                    .header h3 {
                        margin-top: 10px;
                    }
                    .footer {
                        border-top: 2px solid #ddd;
                        margin-top: 320px;
                        padding-top: 10px;
                    }
                    .table th, .table td {
                        vertical-align: middle;
                    }
                </style>
            </head>
            <body onload="window.print()">
                <div class="cetak">
                    <div class="row header">
                        <div class="col-xs-8">
                            <h3 class="strong text-danger">NewStuff</h3>
                            <p>
                                Alamat   : Jl. Lubuk Begalung Nan Xx <br>
                                No Admin : +62895-3423-7080
                            </p>
                        </div>
                    </div>
                    <h1 class="text-center">Transaksi No <?php echo $dataTrx['pembelian_id'] ?></h1>
                    <div class="row">
                        <div class="col-xs-6">
                            <strong>Nama Pelanggan:</strong> <?php echo $dataTrx['pelanggan_nama'] ?> <br>
                        </div>
                        <div class="col-xs-6">
                            <strong>Tanggal Belanja:</strong> <?php echo $dataTrx['pembelian_tgl'] ?> <br>
                            <strong>Total Belanja:</strong> <?php echo rupiah($dataTrx['pembelian_total']) ?>
                        </div>
                    </div>
                    <div class="cart-view-table mt-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-primary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $total = 0;
                                $ambilDataTrx = $con->query("SELECT pp.*, p.pembelian_status FROM pembelian_produk pp 
                                JOIN pembelian p ON pp.pembelian_id = p.pembelian_id 
                                WHERE pp.pembelian_id = '$dataTrx[pembelian_id]'");
                                while ($save = $ambilDataTrx->fetch_assoc()) :
                                    $dataProduk = $con->query("SELECT * FROM produk WHERE id = '" . $save['produk_id'] . "'")->fetch_assoc();
                                    $total += $save['pembelian_sub_harga'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo isset($dataProduk['nama']) ? $dataProduk['nama'] : 'Produk tidak ditemukan'; ?></td>
                                        <td><?php echo rupiah($save['pembelian_produk_harga']) ?></td>
                                        <td><?php echo $save['pembelian_produk_jumlah'] ?></td>
                                        <td><?php echo $save['pembelian_status'] ?></td>
                                        <td><?php echo rupiah($save['pembelian_sub_harga']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                <tr class="table-primary">
                                    <td colspan="5" class="text-end"><strong>Total</strong></td>
                                    <td><strong><?php echo rupiah($total) ?></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <p >Terima kasih telah berbelanja di NewStuff</p>
                    </div>
                </div>
                <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>
            <?php
        } else {
            echo "Data transaksi tidak ditemukan.";
        }
    } else {
        echo "Query error: " . $con->error;
    }
} else {
    echo "Parameter id tidak ditemukan.";
}
?>
