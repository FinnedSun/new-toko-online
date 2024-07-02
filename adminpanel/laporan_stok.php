
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .projek {
            margin: auto;
            max-width: 900px;
            margin-top: 30px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .btn-print {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #01C901;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-print:hover {
            background-color: #008A12;
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    
    <?php
    require "session.php";
    require "../koneksi.php";

    $sql = "SELECT p.nama, p.harga, p.ketersediaan_stok, p.stok_sisa, 
            CASE WHEN p.stok_sisa = 0 THEN 0 ELSE (p.ketersediaan_stok - p.stok_sisa) END AS terjual 
            FROM produk p";
    $result = $con->query($sql);
    ?>
    <?php require "navbar.php"; ?>
    <div class="projek">
        <h1>Laporan Stok Tersedia dan Terjual</h1>
        <button class="btn-print" onclick="printReport()"><i class="fas fa-print"></i> Cetak Laporan</button>

        <?php
        if ($result) {
            if ($result->num_rows > 0) {
                echo "<h2>Stok Produk</h2>";
                echo "<table>";
                echo "<tr><th>No</th><th>Nama Produk</th><th>Harga</th><th>Stok Awal</th><th>Stok Tersedia</th><th>Terjual</th></tr>";
                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<tr><td>" . $counter . "</td><td>" . $row["nama"] . "</td><td> Rp." . number_format($row["harga"], 2, ',', '.') . "</td><td>" . $row ["ketersediaan_stok"] . "</td><td>" . $row["stok_sisa"] . "</td><td>" . $row["terjual"] . "</td></tr>";
                    $counter++;
                }
                echo "</table>";
            } else {
                echo "<p>Tidak ada data stok.</p>";
            }
        } else {
            echo "Error: " . $con->error;
        }
        ?>
        
    </div>
</body>
</html>
