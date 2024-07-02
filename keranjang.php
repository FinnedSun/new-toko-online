<?php
session_start(); // Mulai session
require"koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

// Fungsi untuk mengubah format harga menjadi format rupiah
function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
}

    if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
        echo "<script>
        alert('Keranjang kosong, Silahkan belanja');
        window.location='index.php';
        </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    /* CSS Styles */
    .cart-view-area {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .owl-carousel .thumbnail {
        text-align: center;
    }
    .owl-carousel .thumbnail img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
</style>

<body>
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="cart-view-area">
                    <h1 class="text-center mt-3"><strong>Keranjang Anda</strong><br></h1>
                    <p class="text-center mt-1">cek kembali keranjang anda pastikan benar!</p>
                    <div class="cart-view-table">
                        <form action="cekout.php" method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah</th>
                                            <th>Sub Total</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
                                        $no = 1;
                                        foreach ($_SESSION['keranjang'] as $id_produk => $produk) :
                                            $data = $con->query("SELECT * FROM produk WHERE id = '$id_produk'")->fetch_assoc();
                                            // Periksa apakah query berhasil
                                            if ($data) {
                                                // Hitung Sub Total
                                                $subharga = $produk['harga'] * $produk['jumlah'];
                                                @$totalharga += $subharga;
                                    ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $produk['nama'] ?></td>
                                                <td><?php echo rupiah($produk['harga']) ?></td>
                                                <td><?php echo $data['detail'] ?></td>
                                                <td>
                                                    <a href="beli.php?id=<?php echo $id_produk; ?>"><span class="fa fa-plus-circle"></span></a>
                                                    <?php echo $produk['jumlah'] ?>
                                                    <a href="kurang.php?id=<?php echo $id_produk; ?>"><span class="fa fa-minus-circle"></span></a>
                                                </td>
                                                <td><?php echo rupiah($subharga) ?></td>
                                                <td><a href="hapus-keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger">HAPUS</a></td>
                                            </tr>
                                    <?php
                                            }
                                        endforeach;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group mt-2">
                                <label for="bukti_bayar"><strong>Bukti Pembayaran</strong></label>
                                <input type="file" class="form-control" id="bukti_bayar" name="bukti_pembayaran" required>
                            </div>
                            <button type="submit" class="btn btn-danger mt-2">Proceed to Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Produk Section -->
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Produk</h3>
        <div class="row mt-5">
            <?php while($data = mysqli_fetch_array($queryProduk)){ ?> 
            <div class="col-sm-6 col-md-4 mb-2">
                <div class="card h-100">
                    <div class="image-box">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title "><?php echo $data['nama']; ?></h4>
                        <p class="card-text"><?php echo $data['detail']; ?></p>
                        <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                        <div class="rating text-warning">
                            <span>5.0</span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-3">
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-danger btn-block warna2">
                                <i class="fas fa-info-circle"></i> Lihat Detail
                            </a>
                            <a href="tambah-keranjang.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-block warna2">
                                <i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a class="btn btn-outline-warning mt-3" href="produk.php">See More</a>
    </div>
</div>

<!-- Include Footer -->
<?php require "footer.php";?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 
<script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
