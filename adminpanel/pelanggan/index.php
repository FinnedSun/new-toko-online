<?php require "../../koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.5.2-web/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .no-decoration {
            text-decoration: none;
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
        .breadcrumb-item a {
            color: #343a40;
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
        .form-group label {
            font-weight: bold;
        }
        .btn-primary, .btn-success, .btn-danger {
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .print-section, .print-section * {
                visibility: visible;
            }
            .print-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }
            .no-print {
                display: none;
            }
        }
        .signature-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }
        .signature {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
<?php require "../navbar.php"; ?>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../adminpanel/index.php" class="no-decoration text-muted">
                <i class="fas fa-home"></i> Home
            </a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Pelanggan
            </li>
        </ol>
    </nav>

    <div class="card mt-3 no-print">
        <div class="card-header">
            <h2>Tambah Data Pelanggan</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pelanggan User</label>
                            <input type="text" name="pelangganuser" class="form-control" placeholder="Input Username">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Password</label>
                            <input type="password" name="pelangganpassword" class="form-control" placeholder="Input Password User">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Nama</label>
                            <input type="text" name="pelanggannama" class="form-control" placeholder="Input Nama Pelanggan">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Identitas</label>
                            <input type="text" name="pelangganidentitas" class="form-control" placeholder="Input No Identitas">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pelanggan Jk</label>
                            <input type="text" name="pelangganjk" class="form-control" placeholder="Input Jenis Kelamin Pelanggan">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Tgl Lahir</label>
                            <input type="date" name="pelanggantgllahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Pekerjaan</label>
                            <input type="text" name="pelangganpekerjaan" class="form-control" placeholder="Input Pekerjaan Pelanggan">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Alamat</label>
                            <input type="text" name="pelangganalamat" class="form-control" placeholder="Input Alamat Pelanggan">
                        </div>
                        <div class="form-group">
                            <label>Pelanggan Nohp</label>
                            <input type="text" name="pelanggannohp" class="form-control" placeholder="Input Nomor HP Pelanggan">
                        </div>
                    </div>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
            </form>
            <?php 
                if (isset($_POST['simpan'])) {
                    $pelanggan_user = $_POST['pelangganuser']; 
                    $pelanggan_pass = $_POST['pelangganpassword'];
                    $pelanggan_nama = $_POST['pelanggannama']; 
                    $pelanggan_identitas = $_POST['pelangganidentitas'];
                    $pelanggan_jk = $_POST['pelangganjk']; 
                    $pelanggan_tgl_lahir = $_POST['pelanggantgllahir']; 
                    $pelanggan_pekerjaan = $_POST['pelangganpekerjaan'];
                    $pelanggan_alamat = $_POST['pelangganalamat']; 
                    $pelanggan_nohp = $_POST['pelanggannohp']; 

                    $con->query("INSERT INTO pelanggan (pelanggan_user,pelanggan_password,pelanggan_nama,pelanggan_identitas,pelanggan_jk,pelanggan_tgl_lahir,pelanggan_pekerjaan,pelanggan_alamat,pelanggan_nohp) VALUES ('$pelanggan_user','$pelanggan_pass','$pelanggan_nama','$pelanggan_identitas','$pelanggan_jk','$pelanggan_tgl_lahir','$pelanggan_pekerjaan','$pelanggan_alamat','$pelanggan_nohp')");
                    echo "<script>
                            alert('Data Berhasil Disimpan');
                            window.location='?page=pages/pelanggan/index'
                          </script>";
                } 
            ?>
        </div>
    </div>


        <div class="card-header">
            <h2>Laporan Pelanggan</h2>
        </div>
        <div class="card-body print-section">
            <form method="get" class="mb-3 no-print">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari nama pelanggan" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <input type="text" class="form-control" placeholder="Nama Pimpinan" name="pimpinan" value="<?php echo isset($_GET['pimpinan']) ? $_GET['pimpinan'] : ''; ?>">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            
            <div class="print-only">
                <h1 class="mt-6 text-center">Laporan Data Pelanggan</h1>
                <p class="text-center">Tanggal Cetak: <?php echo date('d-m-Y H:i:s'); ?></p>
            </div>

            <button onclick="printReport()" class="btn btn-success mb-3 no-print"><i class="fas fa-print"></i> Cetak Laporan</button>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr >
                            <th>No</th>
                            <th>User</th>
                            <th>Password User</th>
                            <th>Nama</th>
                            <th>Kelamin L/P</th>
                            <th>Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $query = "SELECT * FROM pelanggan WHERE pelanggan_nama LIKE '%$search%' ORDER BY pelanggan_nama ASC";
                        $ambil = $con->query($query);
                        $no = 1;
                        while ($save = $ambil->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $save['pelanggan_user']; ?></td>
                                <td><?php echo $save['pelanggan_password']; ?></td>
                                <td><?php echo $save['pelanggan_nama']; ?></td>
                                <td><?php echo $save['pelanggan_jk']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($save['pelanggan_tgl_lahir'])); ?></td>
                                <td><?php echo $save['pelanggan_pekerjaan']; ?></td>
                                <td><?php echo $save['pelanggan_alamat']; ?></td>
                                <td><?php echo $save['pelanggan_nohp']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php
            $pimpinan = isset($_GET['pimpinan']) ? $_GET['pimpinan'] : '';
            if ($pimpinan) {
                echo "<div class='signature-container print-only'>";
                echo "<div class='signature'>";
                echo "<h3>Disetujui oleh</h3>";
                echo "<p><strong>$pimpinan</strong></p>";
                echo "<br><br>";
                echo "<p>_______________________</p>";
                echo "<p>Tanda Tangan</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<script src="../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
