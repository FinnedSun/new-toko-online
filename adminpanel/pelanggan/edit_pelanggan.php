<?php 
session_start();
require "../../koneksi.php"; 


$pelanggan_id = isset($_GET['pelanggan_id']) ? $_GET['pelanggan_id'] : '';

// Inisialisasi $datapelanggan
$datapelanggan = [];

if (!empty($pelanggan_id)) {
    $datapelanggan = mysqli_query($con,"SELECT * FROM pelanggan WHERE pelanggan_id = '$pelanggan_id'")->fetch_assoc();
} else {
    // Tangani kasus ketika $pelanggan_id kosong atau tidak valid
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>

    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.5.2-web/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #383838;
            color: #fff;
            border-radius: 15px 15px 0 0;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px 0;
            border-radius: 8px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-back {
            color: #fff;
            background-color: #0056b3;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #B40000;
        }

        .form-control {
            border-radius: 8px;
        }

        .input-group-text {
            background-color: #6c757d;
            border: none;
            color: #fff;
            border-radius: 8px 0 0 8px;
        }
    </style>
</head>
<body>

<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <a href="../../adminpanel/pelanggan/index.php" class="btn btn-back"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Pelanggan</h2>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pelanggan_user">Pelanggan User</label>
                                    <input type="text" name="pelanggan_user" id="pelanggan_user" value="<?php echo isset($datapelanggan['pelanggan_user']) ? $datapelanggan['pelanggan_user'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_password">Pelanggan Password</label>
                                    <input type="text" name="pelanggan_password" id="pelanggan_password" value="<?php echo isset($datapelanggan['pelanggan_password']) ? $datapelanggan['pelanggan_password'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_nama">Pelanggan Nama</label>
                                    <input type="text" name="pelanggan_nama" id="pelanggan_nama" value="<?php echo isset($datapelanggan['pelanggan_nama']) ? $datapelanggan['pelanggan_nama'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_nik">Pelanggan No Identitas</label>
                                    <input type="text" name="pelanggan_nik" id="pelanggan_nik" value="<?php echo isset($datapelanggan['pelanggan_nik']) ? $datapelanggan['pelanggan_nik'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_jk">Pelanggan Jk</label>
                                    <input type="text" name="pelanggan_jk" id="pelanggan_jk" value="<?php echo isset($datapelanggan['pelanggan_jk']) ? $datapelanggan['pelanggan_jk'] : ''; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pelanggan_tgl_lahir">Pelanggan Tgl Lahir</label>
                                    <input type="text" name="pelanggan_tgl_lahir" id="pelanggan_tgl_lahir" value="<?php echo isset($datapelanggan['pelanggan_tgl_lahir']) ? $datapelanggan['pelanggan_tgl_lahir'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_pekerjaan">Pelanggan Pekerjaan</label>
                                    <input type="text" name="pelanggan_pekerjaan" id="pelanggan_pekerjaan" value="<?php echo isset($datapelanggan['pelanggan_pekerjaan']) ? $datapelanggan['pelanggan_pekerjaan'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_alamat">Pelanggan Alamat</label>
                                    <input type="text" name="pelanggan_alamat" id="pelanggan_alamat" value="<?php echo isset($datapelanggan['pelanggan_alamat']) ? $datapelanggan['pelanggan_alamat'] : ''; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pelanggan_nohp">Pelanggan Nohp</label>
                                    <input type="text" name="pelanggan_nohp" id="pelanggan_nohp" value="<?php echo isset($datapelanggan['pelanggan_nohp']) ? $datapelanggan['pelanggan_nohp'] : ''; ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
