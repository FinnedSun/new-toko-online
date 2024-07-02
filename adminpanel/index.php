<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

$queryPelanggan = mysqli_query($con, "SELECT * FROM pelanggan");
$jumlahPelanggan = mysqli_num_rows($queryPelanggan);

$queryPembelian = mysqli_query($con, "SELECT * FROM pembelian");
$jumlahPembelian = mysqli_num_rows($queryPembelian);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/fontawesome.min.css">
    <style>
        .summary-item {
            background: linear-gradient(to right, #345, #233);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        .summary-item:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        }

        .summary-icon {
            color: #fff;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: text-shadow 0.3s ease-in-out;
        }

        .summary-item:hover .summary-icon {
            text-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        }

        .no-decoration {
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php require "navbar.php" ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i>Home
                </li>
            </ol>
        </nav>
        <h2>Hallo <?php echo $_SESSION['username']; ?></h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-5">
                    <div class="summary-item p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-align-justify fa-7x summary-icon"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Kategori</h3>
                                <p class="fs-4"><?php echo $jumlahkategori; ?> Kategori</p>
                                <p><a href="kategori.php" class="btn btn-primary text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="summary-item p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-box fa-7x summary-icon"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Produk</h3>
                                <p class="fs-4"><?php echo $jumlahProduk; ?> Produk</p>
                                <p><a href="produk.php" class="btn btn-primary text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-3 ">
                    <div class="summary-item p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-users fa-7x summary-icon"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Pelanggan</h3>
                                <p class="fs-4"><?php echo $jumlahPelanggan; ?> Pelanggan</p>
                                <p><a href="pelanggan/index.php" class="btn btn-primary text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-3 ">
                    <div class="summary-item p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-shopping-cart fa-7x summary-icon"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Pembelian</h3>
                                <p class="fs-4"><?php echo $jumlahPembelian; ?> Pembelian</p>
                                <p><a href="pembelian/index.php" class="btn btn-primary text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
