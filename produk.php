<?php
    require "koneksi.php";

    $queryKategori= mysqli_query($con, "SELECT * FROM kategori");

    //get produk by nama produk
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    //get produk by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);
   
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    //get produk default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");

    }

    $countData = mysqli_num_rows($queryProduk);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokoh Online | Produk</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>   
     .no-decoration{
        text-decoration: none;
    }
</style>
<body>
        <?php require "navbar.php"; ?>
        <!--banner-->
        <div class="container-fluid banner-produk d-flex align-items-center">
            <div class="container">
                <h1 class="text-white text-center">Produk <br>
            </h1>
            </div>
        </div>

        <!--body-->
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-3 mb-5" >
                <ul class="list-group">
                        <li class="list-group-item active" aria-current="true"><H3>Kategori Produk</H3></li>
                        <?php while ($kategori = mysqli_fetch_array($queryKategori)){ ?>
                        <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                        <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                        <?php } ?>
                        </ul>
                </div>

                <div class="col-lg-9">
                    <h3 class="text-center">Produk</h3>
                    <p class="text-center mb-3">Quality guaranteed goods and cheap prices</p>
                    <div class="row">
                        <?php
                            if($countData<1){
                        ?>
                            <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
                        <?php
                            }
                        ?>

                        <?php while ($produk = mysqli_fetch_array($queryProduk)){ ?>
                    <div class="col-md-4 mb-3">
                            <div class="card h-100">
                            <div class="image-box">
                           <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="..."> 
                            </div>
                                <div class="card-body">
                                    <h4 class="card-title "><?php echo $produk['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                    <p class="card-text text-harga">Rp <?php echo $produk['harga']; ?></p>
                                    <div class="rating text-warning">
                                        <span>5.0</span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="mt-3">
                                        <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn btn-danger btn-block warna2">
                                            <i class="fas fa-info-circle"></i> Lihat Detail
                                        </a>
                                        <a href="tambah-keranjang.php?id=<?php echo $produk['id']; ?>" class="btn btn-danger btn-block warna2">
                                            <i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!--footer-->
        <?php require "footer.php"; ?>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>