<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.
    kategori_id =b.id");
    $jumlahProduk = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
    
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/fontawesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #495057;
        }
        form div {
            margin-bottom: 20px;
        }
        .my-card {
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #17a2b8;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #117a8b;
        }
        .table-bordered {
            border-radius: 15px;
        }
        .table th, .table td {
            border: none;
            vertical-align: middle;
        }
        .table-responsive {
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        .table thead {
            background-color: #17a2b8;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="no-decoration">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Produk
                </li>
            </ol>
        </nav>
        
        <!-- Tambah produk -->
        <div class="row justify-content-center">
            <div class="col-md-6 my-card">
                <h3 class="mb-4">Tambah Produk</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Pilih satu</option>
                            <?php while($data=mysqli_fetch_array($queryKategori)): ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                        <input type="number" class="form-control" name="ketersediaan_stok" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    
                </form>
                
                <?php
                if(isset($_POST['simpan'])){
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                    $target_dir ="../image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name ."." . $imageFileType; 

                    if($nama==''|| $kategori==''|| $harga==''){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, kategori dan harga wajib diisi
                        </div>
            <?php  
                    }
                    else{
                        if($nama_file!=''){
                            if($image_size > 5000000){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            File tidak boleh lebih dari 500kb
                        </div>
            <?php
                            }
                            else{
                                if($imageFileType != 'jpg' && $imageFileType != 'png' &&
                                $imageFileType != 'gif'){
            ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        File wajib tipe jpg atau png atau gif
                                    </div>
            <?php
                                }
                                else{
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . 
                                    $new_name);
                                }
                            }
                        }

                        //query insert to produk table
                        $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga,
                        foto, detail, ketersediaan_stok) VALUES ('$kategori', '$nama', '$harga',
                        '$new_name', '$detail', '$ketersediaan_stok')");
                   
                        if($queryTambah){
                ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Produk Berhasil tersedia
                            </div>

                            <meta http-equiv="refresh" content="2; url=produk.php" />
                <?php
                    }
                    else{
                        echo mysqli_error($con);
                     }
                    }
                }
            ?>
        </div>

        <!-- List Produk -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>List Produk</h2>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ketersediaan Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($jumlahProduk == 0): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Data Produk tidak tersedia</td>
                                </tr>
                            <?php else: ?>
                                <?php $jumlah = 1; ?>
                                <?php while($data=mysqli_fetch_array($query)): ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><?php echo $data['ketersediaan_stok']; ?></td>
                                        <td>
                                            <a href="produk-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i> Update Produk</a>
                                        </td>
                                    </tr>
                                    <?php $jumlah++; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>
