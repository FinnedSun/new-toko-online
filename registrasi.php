<?php
    require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pelanggan_user      =  $_POST['pelanggan_user'];
    $pelanggan_password      =  $_POST['pelanggan_password'];
    $pelanggan_nama      =  $_POST['pelanggan_nama'];
    $pelanggan_identitas      =  $_POST['pelanggan_identitas'];
    $pelanggan_jk       =  $_POST['pelanggan_jk'];
    $pelanggan_tgl_lahir =  $_POST['pelanggan_tgl_lahir'];
    $pelanggan_pekerjaan =  $_POST['pelanggan_pekerjaan'];
    $pelanggan_alamat    =  $_POST['pelanggan_alamat'];
    $pelanggan_nohp      =  $_POST['pelanggan_nohp'];

    $con->query("INSERT INTO pelanggan (pelanggan_user,pelanggan_password,pelanggan_nama,pelanggan_identitas,pelanggan_jk,pelanggan_tgl_lahir,pelanggan_pekerjaan,pelanggan_alamat,pelanggan_nohp) VALUES ('$pelanggan_user','$pelanggan_password','$pelanggan_nama','$pelanggan_identitas','$pelanggan_jk','$pelanggan_tgl_lahir','$pelanggan_pekerjaan','$pelanggan_alamat','$pelanggan_nohp') ");
    echo  "<script>
                alert('Registrasi Berhasil. Anda akan diarahkan ke halaman login.');
                window.location.href = 'login.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Users</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .registration-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-control {
            border-radius: 20px;
            padding: 15px 20px;
            border: 1px solid #ccc;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 10px 30px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .contact-info {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h1><i class="fas fa-user-plus"></i> Registrasi Users</h1>
        <form class="comments-form contact-form" method="POST">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="Username" name="pelanggan_user" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="pelanggan_password" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="Nama Lengkap" name="pelanggan_nama" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="No Identitas" name="pelanggan_identitas" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="Jenis Kelamin" name="pelanggan_jk" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="date" placeholder="Tanggal Lahir" name="pelanggan_tgl_lahir" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="Pekerjaan" name="pelanggan_pekerjaan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" placeholder="No Hp" name="pelanggan_nohp" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Alamat" name="pelanggan_alamat" required></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary">Registrasi</button>
            </div>
        </form>
    </div>

    <div class="registration-container">
        <div class="row">
            <div class="col-md-7">
                <h3><i class="fas fa-info-circle"></i> Informasi Panduan Registrasi</h3>
                <p>Silahkan lengkapi formulir registrasi data diri Anda yang valid. Pastikan semua data yang dimasukkan adalah benar dan sesuai.</p>
                <p>Setelah berhasil mendaftar, Selanjutnya Anda dapat melakukan login serta menikmati berbagai layanan fitur pada toko online kami.</p>
            </div>
            <div class="col-md-5">
                <div class="contact-info">
                    <h4><i class="fas fa-store"></i>Registrasi Users</h4>
                    <p><i class="fas fa-map-marker-alt"></i>Jl.Lubuk Begalung Rt/Rw 04/03</p>
                    <p><i class="fas fa-phone"></i> 0851-5824-8875</p>
                    <p><i class="fas fa-envelope"></i>OnlineShoplubek@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>