<?php
session_start();
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .main {
            height: 100vh;
        }

        .login-box {
            width: 500px;
            box-sizing: border-box;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Change Password</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="reg_username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="reg_username" id="reg_username">
                        </div>
                        <div class="mb-3">
                            <label for="reg_password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="reg_password" id="reg_password">
                        </div>
                        <button class="btn btn-success form-control mt-3" type="submit" name="registerbtn">Change</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-3" style="width: 500px">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);
                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: ../adminpanel');
                    } else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Password salah
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Akun anda tidak tersedia
                    </div>
                    <?php
                }
            }

            // Register ulang Password
            if (isset($_POST['registerbtn'])) {
                $reg_username = htmlspecialchars($_POST['reg_username']);
                $reg_password = htmlspecialchars($_POST['reg_password']);

                // Periksa apakah username sudah digunakan
                $check_query = mysqli_query($con, "SELECT * FROM users WHERE username='$reg_username'");
                $count_check = mysqli_num_rows($check_query);

                if ($count_check > 0) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Username sudah digunakan, silakan gunakan username lain.
                    </div>
                    <?php
                } else {
                    // Hash password sebelum disimpan di database
                    $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);

                    // Simpan data registrasi ke database
                    $insert_query = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$reg_username', '$hashed_password')");

                    if ($insert_query) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Registrasi berhasil, silakan login.
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Terjadi kesalahan saat registrasi, silakan coba lagi.
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>