<?php
session_start();
require "../../koneksi.php";

// Fungsi untuk mengonversi tanggal ke format tanggal
function tgl_indo($tanggal){
    $bulan = array (
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// Proses update status pembayaran
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $update = $con->query("UPDATE pembelian SET `pembelian_status`='$status' WHERE `pembelian_id`='$id'");

    if ($update) {
        echo "<script>
            alert('Pembelian Berhasil di Update');
            location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Update Gagal');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Data Pembelian</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.5.2-web/css/all.min.css">
    <style>   
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-top: 30px;
            background-color: #fff;
        }
        .card-header {
            background-color: #343a40;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        .card-header h2 {
            margin: 0;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #0056b3;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .bukti-bayar {
            width: 100px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<?php require "../navbar.php"; ?>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../adminpanel/index.php" class="no-decoration text-muted">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <h2>Data Pembelian</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Pembelian</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th>Total Pembelian</th>
                            <th width="270px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambil = $con->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.pelanggan_id=pelanggan.pelanggan_id");
                        $no = 1;
                        while ($save = $ambil->fetch_assoc()) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $save['pembelian_id'] ?></td>
                                <td><?php echo $save['pelanggan_nama'] ?></td>
                                <td><?php echo tgl_indo($save['pembelian_tgl']) ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $save['pembelian_id'] ?>">
                                        <select class="form-control" name="status" required>
											<option value="Belum diProses" <?php if($save['pembelian_status'] == 'Belum diProses') echo 'selected'; ?>>Belum diProses</option>
                                            <option value="Pembayaran terkonfirmasi" <?php if($save['pembelian_status'] == 'Pembayaran terkonfirmasi') echo 'selected'; ?>>Pembayaran terkonfirmasi</option>
                                            <option value="Proses Pengiriman" <?php if($save['pembelian_status'] == 'Proses Pengiriman') echo 'selected'; ?>>Proses Pengiriman</option>
                                            <option value="Terkirim" <?php if($save['pembelian_status'] == 'Terkirim') echo 'selected'; ?>>Terkirim</option>
                                            <option value="Selesai" <?php if($save['pembelian_status'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                                        </select>
                                </td>
                                <td>
                                    <?php if ($save['bukti_bayar']): ?>
                                        <img src="../../<?php echo $save['bukti_bayar'] ?>" alt="Bukti Pembayaran" class="bukti-bayar">
                                    <?php else: ?>
                                        <span>Tidak ada bukti</span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp.<?php echo number_format($save['pembelian_total'], 0, ',', '.') ?></td>
                                <td>
                                    <button type="submit" name="update_status" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Update Pembayaran
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
