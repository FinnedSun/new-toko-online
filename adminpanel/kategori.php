<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahkategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/fontawesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #495057;
        }
        .my-card {
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            background-color: #17a2b8;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #117a8b;
        }
        .table-bordered {
            border-radius: 20px;
        }
        .table th, .table td {
            border: none;
            vertical-align: middle;
        }
        .table-responsive {
            border-radius: 20px;
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
                    Kategori
                </li>
            </ol>
        </nav>
        
        <div class="row justify-content-center">
            <div class="col-md-6 my-card">
                <h3 class="mb-4">Tambah Kategori</h3>
              
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input nama kategori" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </form>

                <?php
                    if(isset($_POST['simpan_kategori'])){
                        $kategori = htmlspecialchars($_POST['kategori']);
                    
                        $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama ='$kategori'");
                        $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                        if($jumlahDataKategoriBaru > 0){
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Kategori Sudah ada
                            </div>
                            <?php
                        }
                        else{
                            $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

                            if($querySimpan){
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kategori Berhasil Tersimpan
                                </div>

                                <meta http-equiv="refresh" content="2; url=kategori.php" />
                                <?php
                            }
                            else {
                                echo mysqli_error($con);
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2>List Kategori</h2>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($jumlahkategori == 0){
                            ?>
                                <tr>
                                    <td colspan=3 class="text-center">Data Kategori tidak tersedia</td>
                                </tr>
                            <?php
                                }
                                else{
                                    $jumlah = 1;
                                    while ($data=mysqli_fetch_array($queryKategori)){
                            ?>
                                        <tr>
                                           <td><?php echo $jumlah; ?></td>
                                           <td><?php echo $data ['nama']; ?></td>
                                           <td>
                                                <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i> Update Kategori</a>
                                           </td>
                                        </tr>
                            <?php   
                                         $jumlah++;       
                                    }
                                }
                            ?>  
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
