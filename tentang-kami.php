<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko online | Tentang Kami </title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        /* ... */

        /* Animasi fade-in */
        .animate__animated.animate__fadeIn {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animate__animated.animate__fadeIn {
            animation-name: fadeIn;
        }

        /* Animasi card */
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <?php require "navbar.php"; ?>

    <!--banner-->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Tentang Kami</h1>
        </div>
    </div>

    <!--main-->
    <div class="container-fluid py-3 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <p>New Stuff adalah sebuah toko online yang berdiri sejak Tahun 2023 yang menawarkan pengalaman belanja baru yang segar dan menyenangkan. Didirikan dengan visi untuk menjadi tujuan utama bagi mereka yang mencari produk-produk terkini dengan kualitas terbaik, New Stuff senantiasa menghadirkan koleksi barang-barang yang inovatif, trendi, dan berbeda dari yang lain. Mulai dari fashion hingga aksesoris dan barang-barang lifestyle lainnya, kami menyediakan beragam pilihan untuk memenuhi selera dan gaya hidup setiap pelanggan.</p>
                        <p>Kami di New Stuff memahami bahwa belanja online harus menjadi pengalaman yang menyenangkan dan praktis. Oleh karena itu, kami merancang platform toko online kami dengan antarmuka yang sederhana, intuitif, dan mudah dinavigasi. Pelanggan dapat dengan mudah menjelajahi kategori produk, mempelajari detail dan spesifikasi, serta melakukan pembelian dengan proses checkout yang cepat dan aman. Selain itu, kami juga menawarkan layanan pengiriman cepat dan berkualitas untuk memastikan produk sampai ke tangan pelanggan dalam kondisi terbaik.</p>
                        <p>Kepuasan pelanggan adalah prioritas utama bagi kami di New Stuff. Oleh karena itu, kami berkomitmen untuk memberikan layanan pelanggan yang excellent. Tim customer service kami siap membantu dan menjawab setiap pertanyaan atau kebutuhan pelanggan dengan ramah dan profesional. Kami juga menerima masukan dan saran dari pelanggan untuk terus meningkatkan kualitas produk dan layanan kami. Dengan semangat untuk selalu memberikan pengalaman belanja yang luar biasa, New Stuff berusaha menjadi mitra terpercaya bagi setiap pelanggan dalam memenuhi kebutuhan dan gaya hidup mereka.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
    <div class="container mb-5 animate__animated animate__fadeIn px-4">
    <h3 class="text-center">Kualitas New Stuff</h3>
    <p class="text-center text-danger">Anda jangan ragu untuk berbelanja di toko Kami. Barang dengan kualitas terpercaya dan ketahanan dijamin.</p>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="image/kualitass.jpg" class="img-fluid rounded-start card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Terjamin</h5>
                                <p class="card-text">kami berkomitmen untuk menyediakan produk-produk berkualitas terbaik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="image/pengiriman.jpg" class="img-fluid rounded-start card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Pengiriman cepat dan aman</h5>
                                <p class="card-text">Kami memiliki pengiriman yang cepat dan aman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="image/smile.jpg" class="img-fluid rounded-start card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Kepuasan Pelanggan</h5>
                                <p class="card-text">Kepuasan pelanggan adalah prioritas utama kami di New Stuff.</p>
                            </div>
                        </div>
                    </div>
                </div>
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