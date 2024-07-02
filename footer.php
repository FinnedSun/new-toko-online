<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Design</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom CSS */
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 5px 0;
        }
        .footer .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .footer .footer-content .footer-section {
            flex: 1;
            margin-bottom: 20px;
        }
        .footer .footer-content h3 {
            margin-bottom: 20px;
        }
        .footer .footer-content ul {
            list-style: none;
            padding: 0;
        }
        .footer .footer-content ul li {
            margin-bottom: 10px;
        }
        .footer .footer-content ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer .footer-content ul li a:hover {
            color: #ffc107; /* Warna kuning untuk efek hover */
            font-size: 8px;
            margin-right: 8px;
        }
        .footer .footer-content .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer .footer-content .social-icons a {
            margin: 0 10px;
            color: #fff;
            font-size: 30px;
            transition: color 0.3s ease;
            text-align: center;
            display: block;
        }
        .footer .footer-content .social-icons a:hover {
            color: #ffc107; /* Warna kuning untuk efek hover */
        }
        .footer .footer-content .follow-us {
            text-align: center;
            margin-bottom: 10px;
        }
        .footer .footer-bottom {
            background-color: #292b2c;
            color: #fff;
            padding: 5px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Left Section -->
            <div class="footer-section">
                <h3>Toko Online Fashion</h3>
                <ul>
                    <li><i class="fas fa-circle "></i> <a href="index.php">Home</a></li>
                    <li><i class="fas fa-circle"></i> <a href="tentang-kami.php">Tentang Kami</a></li>
                    <li><i class="fas fa-circle"></i> <a href="produk.php">Produk</a></li>
                </ul>
            </div>
            <!-- Right Section -->
            <div class="footer-section">
                <div class="follow-us">Ikuti Sosial Media Kami</div>
                <div class="social-icons">
                    <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
                    <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://youtube.com"><i class="fab fa-youtube"></i></a>
                    <a href="https://whatsapp.com"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container mt-3">
            <p>&copy; 2024 Toko Online Fashion - Pengalaman Belanja Mewah</p>
            <p>Created by <a href="#" class="text-white">Ilham Akbar</a></p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
