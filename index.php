<?php 
    require"koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    
    .card {
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 0 40px 60px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease-in-out;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.image-box {
  overflow: hidden;
}

.card-img-top {
  transition: all 0.3s ease-in-out;
}

.card:hover .card-img-top {
  transform: scale(1.1);
}

.card-body {
  padding: 20px;
  background-color: #f5f5f5;
}

.card-title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  color: #333;
}

.card-text {
  font-family: 'Lato', sans-serif;
  color: #666;
}

.text-harga {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  color: #e74c3c;
}

.btn {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  border-radius: 90px;
  padding: 14px 50px;
  transition: all 0.3s ease-in-out;
}

.btn.warna2 {
  background-color: #e74c3c;
  border-color: #e74c3c;
}

.btn.warna2:hover {
  background-color: #c0392b;
  border-color: #c0392b;
}
.rounded-custom {
    border-radius: px; /* Atur nilai sesuai keinginan Anda */
}
.container-fluid.py-5 {
            background-color: #000000;
        }
        .container-fluid.py-5 {
        background-color: #FFFFFF;
        }

        .container-fluid.py-5 h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        }

        .container-fluid.py-5 p {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2rem;
        color: #666;
        }

        .highlighted-kategori {
        height: 200px;
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease-in-out;
        }

        .highlighted-kategori:hover {
        transform: scale(1.05);
        }

        .kategori-jam-pria {
        background-image: url('https://example.com/jam-pria.jpg');
        }

        .kategori-tas-wanita {
        background-image: url('https://example.com/tas-wanita.jpg');
        }

        .kategori-sepatu {
        background-image: url('https://example.com/sepatu.jpg');
        }

        .highlighted-kategori h4 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .highlighted-kategori h4 a {
        color: #fff;
        text-decoration: none;
        }

        .rounded-custom {
        border-radius: 20px;
        overflow: hidden;
        }

        .no-decoration {
        text-decoration: none;
        }
</style>
<body>
    <?php require "navbar.php"; ?>
   <!--banner-->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    
    <div class="carousel-caption d-none d-md-block">
                <h1>Toko Online Shopping</h1>
                <h3>Mau Cari apa?</h3>
                <div class="col-md-8 offset-md-2">
                    <form method="get" action="produk.php">
                        <div class="input-group input-group-lg my-4">
                            <input type="text" class="form-control" placeholder="Masukan Barang" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                            <button type="submit" class="btn warna2 text-white">Telusuri</button>
                        </div>
                    </form>
                </div>
            </div>

    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img src="image/banner.jpg" class="d-block w-100" alt="Banner 1" style="max-height: 500px; object-fit: cover; object-position: top">
           
        </div>
        <div class="carousel-item">
            <img src="image/banner2.jpg" class="d-block w-100" alt="Banner 2" style="max-height: 500px; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="image/banner3.jpg" class="d-block w-100" alt="Banner 3" style="max-height: 500px; object-fit: cover;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!--higlight kategori-->
    <div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Kategori terlaris</h3>

        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-jam-pria d-flex justify-content-center align-items-center rounded-custom">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Jam tangan">Jam Pria</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-tas-wanita d-flex justify-content-center align-items-center rounded-custom">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Tas">Tas Wanita</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center rounded-custom">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=sepatu">Sepatu Sneakers</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--tentang kami-->
    <div class="container-flui warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="mt 5">
            New Stuff,kami berkomitmen untuk menyediakan produk-produk berkualitas terbaik. Setiap produk yang 
            kami tawarkan telah melalui proses seleksi dan kontrol kualitas yang ketat. Kami hanya bekerjasama dengan mitra dan 
            supplier terpercaya yang mengutamakan standar kualitas tinggi. New Stuff telah menjalin kerjasama dengan beberapa 
            perusahaan ekspedisi terkemuka untuk memastikan produk Anda dikirimkan dengan aman dan tepat waktu. Kami menawarkan 
            beberapa pilihan jasa pengiriman, mulai dari reguler hingga ekspres, sehingga Anda dapat memilih yang paling sesuai 
            dengan kebutuhan Anda. Setiap paket juga dilengkapi dengan asuransi pengiriman untuk melindungi barang Anda selama dalam perjalanan.
            </p>
        </div>
    </div>

    <!--produk-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
            <p class="mb-2">Look for your favorite items, guaranteed quality and low prices</p>

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
                            <div class="d-flex justify-content-between mt-3">
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-sm warna2 text-white">
                                <i class="fas fa-info-circle"></i> Lihat Detail
                            </a>
                            <a href="tambah-keranjang.php?id=<?php echo $data['id']; ?>" class="btn btn-sm warna2 text-white">
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

    <!--Footer-->
    <?php require "footer.php";?>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>