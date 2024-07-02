<?php
session_start();
// Mulai sesi
// Cek jika pengguna telah login
if (isset($_SESSION['member']) && isset($_SESSION['member']['pelanggan_id'])) {
    $namaPelanggan = $_SESSION['member']['pelanggan_nama'];
    // Ambil nama pengguna dari sesi
    $isLoggedIn = true; // Pengguna sudah login
} else {
    $isLoggedIn = false; // Pengguna belum login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Anda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
        .navbar {
            background-color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 2rem;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .nav-link {
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #ffc107;
            transform: scale(1.1);
        }
        
        .btn-outline-light {
            border-color: #ffc107;
            color: #ffc107;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            background-color: #ffc107;
            color: #333;
        }
        
        .btn-secondary {
            background-color: #ffc107;
            border-color: #ffc107;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        
        .btn-primary,
        .btn-success {
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover,
        .btn-success:hover {
            transform: scale(1.1);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand text-danger" href="#">New Stuff</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="tentang-kami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="transaksi.php">Track Order</a>
                    </li>
                </ul>
                <a href="keranjang.php" class="btn btn-outline-light me-2">
                    <i class="fas fa-shopping-cart"></i> Keranjang
                </a>
                <div class="dropdown me-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo isset($namaPelanggan) ? $namaPelanggan : "Profil"; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="profil.php"><i class="fas fa-user"></i> Akun Saya</a></li>
                        <li><a class="dropdown-item" href="transaksi.php"><i class="fas fa-shopping-bag"></i> Pesanan</a></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
                <div class="ms-auto">
                    <?php if (!$isLoggedIn) { ?>
                        <a href="registrasi.php" class="btn btn-primary me-2">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </a>
                        <a href="login.php" class="btn btn-success">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>