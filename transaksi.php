<?php
require "koneksi.php";
require "navbar.php";

$id=0;
// Cek jika pengguna telah login
if (isset($_SESSION['member']) && isset($_SESSION['member']['pelanggan_id'])) {
    $id=  $_SESSION['member']['pelanggan_id'];
    $isLoggedIn = true; // Pengguna sudah login
} else {
    $isLoggedIn = false; // Pengguna belum login
}

function rupiah($angka) {
$hasil = "Rp " . number_format($angka, 0, ',', '.');
return $hasil;
}

$dataMember = $con->query("SELECT * FROM `pelanggan` WHERE pelanggan_id = '$id'")->fetch_assoc();

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
    <style>
        .col-md-4,
        .col-lg-3 {
            margin-bottom: 30px;
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        .container-fluid.py-5 {
            background-color: #f8f9fa;
        }
        .container-fluid.py-5 {
        background-color: #f8f9fa;
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
        background-image: url('image/Rn3oP9IRpPS1lRJGyGHj.jpg');
        }

        .kategori-tas-wanita {
        background-image: url('image/tas.jpg');
        }

        .kategori-sepatu {
        background-image: url('image/ihc4NWmRleGCkbVUmhdS.jpg');
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
</head>
<body>
<section id="cart-view">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <h1 class="text-center"> TrackOrder <?php echo ($dataMember && isset($dataMember['pelanggan_nama'])) ? ucfirst($dataMember['pelanggan_nama']) : 'Nama Pelanggan Tidak Ditemukan'; ?></h1>
                    <div class="cart-view-table mt-3">
                        <div class="table-responsive">
                        <div class="container">
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-80">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Daftar TrackOrder</h4>
                                </div>
                                <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($con !== null) {
                                        $no = 1;
                                        $ambilDataTrx = $con->query("SELECT * FROM `pembelian` WHERE pelanggan_id = '$id'");
                                        if ($ambilDataTrx !== false) {
                                        while ($pecahTrx = $ambilDataTrx->fetch_assoc()) : ?>
                                            <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $pecahTrx['pembelian_id']; ?></td>
                                            <td><?php echo $pecahTrx['pembelian_tgl']; ?></td>
                                            <td>
                                                <?php
                                                $status = $pecahTrx['pembelian_status'];
                                                $badge_class = ($status == 'Selesai') ? 'badge-success' : 'badge-warning';
                                                echo '<span class="badge ' . $badge_class . '">' . $status . '</span>';
                                                ?>
                                            </td>
                                            <td>Rp<?php echo number_format($pecahTrx['pembelian_total'], 0, ',', '.'); ?></td>
                                            <td>
                                                <a target="_blank" href="cetak.php?id=cetak&id=<?php echo $pecahTrx['pembelian_id'] ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-print"></i> Cetak
                                                </a>
                                            </td>
                                            </tr>
                                        <?php endwhile;
                                        } else {
                                        echo "<tr><td colspan='6' class='text-center'>Gagal mengambil data transaksi.</td></tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>Koneksi database tidak valid.</td></tr>";
                                    } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

    <!--higlight kategori-->
    

    <div class="container-fluid py-5 mt-4">
    <div class="container text-center">
        <h3><strong>Kategori Terlaris</strong><br></h3>
        <P>Shopping convenience is our top priority</P>

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

</section>
<!--Footer-->
    
    <?php require "footer.php";?>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>