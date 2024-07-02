<?php require "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Harian</title>
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .project {
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
            font-weight: bold;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
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

        .btn-primary {
            background-color: #00C106;
        }

        .btn-primary:hover {
            background-color: #008E02;
        }

        .signature-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .signature {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }

        .signature p {
            margin-bottom: 2px;
        }
    </style>
    <script>
        function printReport() {
            // Hide elements before printing
            document.getElementById('form-input').style.display = 'none';
            document.getElementById('print-button').style.display = 'none';

            // Print the page
            window.print();

            // Show elements after printing
            document.getElementById('form-input').style.display = 'block';
            document.getElementById('print-button').style.display = 'block';
        }
    </script>
</head>
<body>

<div class="project">
    <h1>Laporan Transaksi Harian</h1>
    <form method="get" id="form-input">
        <div class="form-group">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" placeholder="Pilih tanggal Transaksi"  name="tanggal" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="pimpinan">Nama Pimpinan:</label>
            <input type="text" class="form-control" id="pimpinan" placeholder="Input nama Pimpinan" name="pimpinan" value="<?php echo isset($_GET['pimpinan']) ? $_GET['pimpinan'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
    <button class="btn btn-primary" id="print-button" onclick="printReport()"><i class="fas fa-print"></i> Cetak Laporan</button>

    <?php
    require "../koneksi.php";

    $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
    $pimpinan = isset($_GET['pimpinan']) ? $_GET['pimpinan'] : '';

    $sql = "SELECT p.nama, pb.pelanggan_id, pp.pembelian_produk_jumlah, pp.pembelian_produk_harga, pp.pembelian_sub_harga, pb.pembelian_tgl 
            FROM produk p
            JOIN pembelian_produk pp ON p.id = pp.produk_id
            JOIN pembelian pb ON pp.pembelian_id = pb.pembelian_id
            WHERE pb.pembelian_tgl = '$tanggal'"; 
    $result = $con->query($sql);
    
    if ($result) {
        echo "<h2>Transaksi pada $tanggal</h2>";
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>No</th><th>Nama Produk</th><th>Id Pelanggan</th><th>Jumlah</th><th>Harga Produk</th><th>Total Harga</th><th>Tanggal</th></tr>";
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $no++ . "</td><td>" . $row["nama"] . "</td><td>" . $row["pelanggan_id"] . "</td><td>". $row["pembelian_produk_jumlah"] . "</td><td> Rp.".number_format($row["pembelian_produk_harga"], 2, ',', '.') . "</td><td> Rp.".number_format($row["pembelian_sub_harga"], 2, ',', '.') . "</td><td>" . $row["pembelian_tgl"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada transaksi pada tanggal ini.</p>";
        }
    } else {
        echo "Error: " . $con->error;
    }

    if ($pimpinan) {
        echo "<div class='signature-container'>";
        echo "<div class='signature'>";
        echo "<h3>Disetujui oleh</h3>";
        echo "<p><strong>$pimpinan</strong></p>";
        echo "<br><br>";
        echo "<p>_______________________</p>";
        echo "<p>Tanda Tangan</p>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
