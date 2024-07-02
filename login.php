<?php 
session_start();
    require"koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Users</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-control {
            border-radius: 20px;
            padding: 15px 20px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
            color: #fff;
        }
        .btn-primary:hover {
            background: linear-gradient(to left, #667eea, #764ba2);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2><i class="fas fa-lock"></i> Login Users</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['pelanggan_user'];
            $password = $_POST['pelanggan_password'];
            $data_user = $con->query("SELECT * FROM pelanggan WHERE pelanggan_user = '" . $username . "' and pelanggan_password = '" . $password . "'")->fetch_assoc();
            if (!empty($data_user)) {
                $_SESSION['member'] = $data_user;
                echo "<script> alert('Anda berhasil login!'); window.location.href = 'index.php'; </script>";
            } else {
                echo "<script> alert('Username atau password salah!'); </script>";
            }
        }
        ?>
        <form method="post">
            <div class="form-group mt-2">
                <input type="text" class="form-control" placeholder="Username" name="pelanggan_user" required>
            </div>
            <div class="form-group mt-2">
                <input type="password" class="form-control" placeholder="Password" name="pelanggan_password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
        </form>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>