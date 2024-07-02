-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2024 pada 19.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'kaca mata'),
(2, 'Jam tangan'),
(3, 'Tas'),
(8, 'Celana'),
(10, 'Topi'),
(11, 'sepatu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(15) NOT NULL,
  `pelanggan_user` varchar(50) NOT NULL,
  `pelanggan_password` varchar(50) NOT NULL,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_jk` varchar(50) NOT NULL,
  `pelanggan_tgl_lahir` date NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_nohp` varchar(50) NOT NULL,
  `pelanggan_identitas` varchar(50) NOT NULL,
  `pelanggan_pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_user`, `pelanggan_password`, `pelanggan_nama`, `pelanggan_jk`, `pelanggan_tgl_lahir`, `pelanggan_alamat`, `pelanggan_nohp`, `pelanggan_identitas`, `pelanggan_pekerjaan`) VALUES
(0, '', '', '', '', '0000-00-00', '', '', '', ''),
(10, 'testing malam ', 'tes123', 'tes', 'wanita', '2024-05-20', 'jl raya padang', '093943943', '123456789', 'programer'),
(11, 'haya', 'haya123', 'hayabusa', 'pria', '2024-05-24', 'Jl.sriwijaya gang bunga', '098873636', '566727', 'guru'),
(12, 'denis', 'denis123', 'denis', 'wanita', '2024-05-17', 'jl.jambu pelangi', '22645', '232355', 'cs'),
(13, 'titi', 'titi0000', 'hesty aris santi', 'wanita', '2024-05-24', 'jl.rengas dengklok', '235222', '8482372', 'makeup'),
(21, 'hay', 'hay123', 'hay', 'ded', '2024-05-17', 'eded', '3434', '343', 'programer'),
(22, 'kiki', 'kiki111', 'kiki purwati', 'wanita', '2024-04-04', 'Jl.Tanah emas perumahan muzazzi village', '0877656787', '08767756', 'swasta'),
(25, 'a', '123', 'a', '', '2024-05-08', '12e3dsxjjjj', '089788342311', '232323', 'swasta'),
(26, 'titi', 'titi123', 'titi', 'wanita', '2024-05-18', 'jl bunga', '099348334', '56734734', 'makeup'),
(31, 'indra', 'i123', 'indra senjaya', 'pria', '2024-05-14', 'jl. anggrek', '089978777756', '00008767', 'swasta'),
(33, 'dudung', '', 'dudung permana', 'laki laki', '2024-05-28', 'jl.anggrek no 47', '089977654567', '009988677658', 'swasta'),
(34, 'deni prakoso', 'dedi123', 'deni prakoso saputra', 'laki laki', '2024-05-09', 'jl.plaju', '08999999999', '00023232', 'swasta'),
(35, 'hesty', 'hestysaja', 'Hesty aris santi', 'wanita', '2024-05-16', 'jl.Pematang palas', '08778976766', '', 'Karyawan Swasta'),
(36, 'hesty', 'hesty12344', 'Hesty aris santi saja', 'wanita', '2024-05-03', 'jl.anggrek no 47', '08778976766', '934242', 'swasta'),
(37, 'firman', 'firman123', 'firmansyah', 'pria', '2024-06-12', 'jl. antasari blok C no 97', '0899997676', '11294004999', 'supervisor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(15) NOT NULL,
  `pelanggan_id` int(15) NOT NULL,
  `pembelian_tgl` date NOT NULL,
  `pembelian_status` varchar(50) NOT NULL,
  `pembelian_total` int(15) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`pembelian_id`, `pelanggan_id`, `pembelian_tgl`, `pembelian_status`, `pembelian_total`, `bukti_bayar`) VALUES
(30, 7, '2024-05-08', 'Belum Dibayar', 300000, ''),
(47, 10, '2024-05-08', 'Proses Pengiriman', 460000, ''),
(54, 10, '2024-05-08', 'Proses Pengiriman', 500000, ''),
(55, 25, '2024-05-08', 'Pembayaran terkonfirmasi', 230000, ''),
(56, 26, '2024-05-08', 'Belum Dibayar', 300000, ''),
(57, 26, '2024-05-09', 'Belum Dibayar', 460000, ''),
(58, 26, '2024-05-09', 'Belum Dibayar', 345000, ''),
(59, 31, '2024-05-09', 'Belum Dibayar', 460000, ''),
(60, 31, '2024-05-09', 'Belum Dibayar', 120000, ''),
(61, 31, '2024-05-09', 'Belum Dibayar', 300000, ''),
(62, 31, '2024-05-09', 'Belum Dibayar', 120000, ''),
(63, 31, '2024-05-09', 'Belum Dibayar', 120000, ''),
(64, 31, '2024-05-09', 'Belum Dibayar', 345000, ''),
(65, 31, '2024-05-09', 'Belum Dibayar', 460000, ''),
(66, 31, '2024-05-09', 'Belum Dibayar', 300000, ''),
(67, 31, '2024-05-09', 'Belum Dibayar', 300000, ''),
(68, 31, '2024-05-09', 'Belum Dibayar', 300000, ''),
(69, 31, '2024-05-09', 'Belum Dibayar', 300000, ''),
(70, 31, '2024-05-09', 'Belum Dibayar', 460000, ''),
(71, 31, '2024-05-10', 'Belum Dibayar', 300000, ''),
(74, 31, '2024-05-10', 'Belum Dibayar', 300000, ''),
(75, 31, '2024-05-10', 'Belum Dibayar', 345000, ''),
(76, 31, '2024-05-10', 'Belum Dibayar', 120000, ''),
(77, 26, '2024-05-10', 'Belum Dibayar', 300000, ''),
(78, 26, '2024-05-10', 'Belum Dibayar', 120000, ''),
(79, 26, '2024-05-10', 'Belum Dibayar', 387000, ''),
(80, 26, '2024-05-10', 'Belum Dibayar', 120000, ''),
(81, 26, '2024-05-11', 'Belum Dibayar', 460000, ''),
(82, 26, '2024-05-11', 'Belum Dibayar', 800000, ''),
(83, 26, '2024-05-11', 'Belum Dibayar', 620000, ''),
(92, 26, '2024-05-19', 'Pembayaran terkonfirmasi', 120000, ''),
(93, 26, '2024-05-19', 'Belum Dibayar', 345000, ''),
(94, 26, '2024-05-19', 'Belum Dibayar', 300000, ''),
(95, 26, '2024-05-19', 'Selesai', 120000, ''),
(96, 26, '2024-05-19', 'Terkirim', 300000, ''),
(97, 26, '2024-05-19', 'Proses Pengiriman', 500000, 'image/2022-11-23 (7).png'),
(98, 11, '2024-05-20', 'Terkirim', 120000, 'image/2022-11-09.png'),
(99, 11, '2024-06-03', 'Selesai', 300000, 'image/baeaccaa-b68d-483a-9d8c-d1a7862fa09e.jpg'),
(100, 21, '2024-06-19', 'Pembayaran terkonfirmasi', 2000000, 'image/fileName1687510884.jpg'),
(101, 21, '2024-06-19', 'Belum Dibayar', 240000, 'image/fileName1687510884.jpg'),
(102, 21, '2024-06-19', 'Belum Dibayar', 2500000, 'image/fileName1687510884.jpg'),
(103, 21, '2024-06-19', 'Belum Dibayar', 120000, 'image/fileName1687510884.jpg'),
(125, 12, '2024-06-21', 'Belum Dibayar', 48000, 'image/alina-karpenko-jH1PBHevj38-unsplash.jpg'),
(126, 12, '2024-06-24', 'Selesai', 1200000, 'image/Entity Relationship Diagram Team Whiteboard (2).png'),
(127, 12, '2024-06-30', 'Proses Pengiriman', 920000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(128, 37, '2024-06-30', 'Selesai', 670000, 'image/svitlana-waxEvli6Drg-unsplash.jpg'),
(129, 37, '2024-06-30', 'Proses Pengiriman', 0, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(130, 37, '2024-06-30', 'Belum Dibayar', 345000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(131, 37, '2024-06-30', 'Belum Dibayar', 89000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(132, 37, '2024-06-30', 'Belum Dibayar', 460000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(133, 37, '2024-06-30', 'Belum Dibayar', 330000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(134, 37, '2024-06-30', 'Belum Dibayar', 760000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(135, 37, '2024-06-30', 'Belum Dibayar', 1602000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(136, 37, '2024-06-30', 'Belum Dibayar', 710000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(137, 37, '2024-06-30', 'Belum Dibayar', 320000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(138, 37, '2024-06-30', 'Belum Dibayar', 600000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(139, 37, '2024-06-30', 'Belum Dibayar', 1000000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(140, 37, '2024-06-30', 'Belum Dibayar', 2, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(141, 37, '2024-06-30', 'Selesai', 1, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(142, 37, '2024-06-30', 'Proses Pengiriman', 460000, 'image/Sepatu-Gunung-Eiger-1.jpg'),
(143, 37, '2024-06-30', 'Terkirim', 460000, 'image/Sepatu-Gunung-Eiger-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `pembelian_produk_id` int(15) NOT NULL,
  `pembelian_id` int(15) NOT NULL,
  `produk_id` int(15) NOT NULL,
  `pembelian_produk_jumlah` int(15) NOT NULL,
  `pembelian_produk_harga` int(15) NOT NULL,
  `pembelian_sub_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`pembelian_produk_id`, `pembelian_id`, `produk_id`, `pembelian_produk_jumlah`, `pembelian_produk_harga`, `pembelian_sub_harga`) VALUES
(2, 8, 8, 1, 300000, 300000),
(3, 11, 7, 1, 120000, 120000),
(4, 11, 8, 1, 300000, 300000),
(5, 12, 8, 1, 300000, 300000),
(6, 13, 8, 1, 300000, 300000),
(7, 14, 6, 1, 345000, 345000),
(8, 15, 7, 1, 120000, 120000),
(9, 16, 8, 1, 300000, 300000),
(10, 17, 8, 1, 300000, 300000),
(11, 18, 8, 2, 300000, 600000),
(12, 19, 8, 3, 300000, 900000),
(13, 20, 8, 1, 300000, 300000),
(14, 21, 7, 1, 120000, 120000),
(15, 22, 10, 1, 500000, 500000),
(16, 23, 6, 1, 345000, 345000),
(17, 24, 7, 1, 120000, 120000),
(18, 25, 6, 1, 345000, 345000),
(19, 25, 11, 1, 460000, 460000),
(20, 26, 11, 1, 460000, 460000),
(21, 27, 10, 1, 500000, 500000),
(22, 28, 7, 1, 120000, 120000),
(23, 30, 8, 1, 300000, 300000),
(24, 31, 8, 1, 300000, 300000),
(25, 32, 7, 1, 120000, 120000),
(26, 33, 10, 1, 500000, 500000),
(27, 40, 10, 1, 500000, 500000),
(28, 41, 11, 1, 460000, 460000),
(29, 42, 8, 1, 300000, 300000),
(30, 43, 9, 1, 230000, 230000),
(31, 44, 6, 1, 345000, 345000),
(32, 45, 7, 2, 120000, 240000),
(33, 46, 7, 1, 120000, 120000),
(34, 47, 11, 1, 460000, 460000),
(35, 48, 9, 1, 230000, 230000),
(36, 49, 9, 1, 230000, 230000),
(37, 50, 10, 1, 500000, 500000),
(38, 51, 10, 1, 500000, 500000),
(39, 52, 9, 1, 230000, 230000),
(40, 53, 7, 1, 120000, 120000),
(41, 54, 10, 1, 500000, 500000),
(42, 55, 9, 1, 230000, 230000),
(43, 56, 8, 1, 300000, 300000),
(44, 57, 11, 1, 460000, 460000),
(45, 58, 6, 1, 345000, 345000),
(46, 59, 11, 1, 460000, 460000),
(47, 60, 7, 1, 120000, 120000),
(48, 61, 8, 1, 300000, 300000),
(49, 62, 7, 1, 120000, 120000),
(50, 63, 7, 1, 120000, 120000),
(51, 64, 6, 1, 345000, 345000),
(52, 65, 11, 1, 460000, 460000),
(53, 66, 8, 1, 300000, 300000),
(54, 67, 8, 1, 300000, 300000),
(55, 68, 8, 1, 300000, 300000),
(56, 69, 8, 1, 300000, 300000),
(57, 70, 11, 1, 460000, 460000),
(58, 71, 8, 1, 300000, 300000),
(59, 74, 8, 1, 300000, 300000),
(60, 75, 6, 1, 345000, 345000),
(61, 76, 7, 1, 120000, 120000),
(62, 77, 8, 1, 300000, 300000),
(63, 78, 7, 1, 120000, 120000),
(64, 79, 35, 1, 387000, 387000),
(65, 80, 7, 1, 120000, 120000),
(66, 81, 11, 1, 460000, 460000),
(67, 82, 10, 1, 500000, 500000),
(68, 82, 8, 1, 300000, 300000),
(69, 83, 7, 1, 120000, 120000),
(70, 83, 10, 1, 500000, 500000),
(71, 84, 10, 1, 500000, 500000),
(72, 85, 10, 1, 500000, 500000),
(73, 85, 11, 1, 460000, 460000),
(74, 86, 10, 1, 500000, 500000),
(75, 87, 8, 1, 300000, 300000),
(76, 88, 10, 1, 500000, 500000),
(77, 89, 7, 1, 120000, 120000),
(78, 90, 10, 1, 500000, 500000),
(79, 91, 8, 1, 300000, 300000),
(80, 92, 7, 1, 120000, 120000),
(81, 93, 6, 1, 345000, 345000),
(82, 94, 8, 1, 300000, 300000),
(83, 95, 7, 1, 120000, 120000),
(84, 96, 8, 1, 300000, 300000),
(85, 97, 10, 1, 500000, 500000),
(86, 98, 7, 1, 120000, 120000),
(87, 99, 8, 1, 300000, 300000),
(88, 100, 10, 4, 500000, 2000000),
(89, 101, 7, 2, 120000, 240000),
(90, 102, 10, 5, 500000, 2500000),
(91, 103, 7, 1, 120000, 120000),
(92, 104, 9, 2, 230000, 460000),
(93, 105, 29, 2, 220000, 440000),
(94, 107, 6, 1, 345000, 345000),
(95, 109, 6, 1, 345000, 345000),
(96, 110, 7, 2, 120000, 240000),
(97, 111, 8, 3, 300000, 900000),
(98, 112, 9, 3, 230000, 690000),
(99, 113, 10, 1, 500000, 500000),
(100, 114, 28, 3, 429000, 1287000),
(101, 115, 21, 2, 890000, 1780000),
(102, 116, 23, 3, 200000, 600000),
(103, 117, 13, 2, 650000, 1300000),
(104, 118, 17, 1, 476000, 476000),
(105, 119, 22, 4, 433000, 1732000),
(106, 120, 28, 1, 429000, 429000),
(107, 121, 11, 3, 460000, 1380000),
(108, 122, 11, 3, 460000, 1380000),
(109, 123, 6, 2, 345000, 690000),
(110, 124, 11, 1, 460000, 460000),
(111, 125, 15, 2, 24000, 48000),
(112, 126, 36, 4, 300000, 1200000),
(113, 127, 11, 2, 460000, 920000),
(114, 128, 12, 1, 670000, 670000),
(115, 129, 7, 2, 0, 0),
(116, 130, 6, 1, 345000, 345000),
(117, 131, 14, 1, 89000, 89000),
(118, 132, 16, 2, 230000, 460000),
(119, 133, 18, 1, 330000, 330000),
(120, 134, 19, 1, 760000, 760000),
(121, 135, 20, 3, 534000, 1602000),
(122, 136, 24, 2, 355000, 710000),
(123, 137, 25, 1, 320000, 320000),
(124, 138, 26, 1, 600000, 600000),
(125, 139, 27, 2, 500000, 1000000),
(126, 140, 35, 2, 0, 2),
(127, 141, 7, 1, 0, 1),
(128, 142, 11, 1, 460000, 460000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` int(11) NOT NULL,
  `stok_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`, `stok_sisa`) VALUES
(6, 1, 'Kacamata Rayban', 345000, 'kexsNA3J7VVKWrvVstok.jpg', '                                                               Rayban menggunakan bahan berkualitas tinggi sangat kokoh dan tahan lama.  \r\n                       \r\n                       \r\n                    ', 100, 99),
(7, 1, 'kacamata Guess', 120000, 'Tt8IDtjAbzVaH56oJev7.jpg', '                                          Kacamata guess kacamata untuk melawan terik matahari dan pantulan cahaya\r\n                       \r\n                       \r\n                       \r\n                    ', 100, 99),
(8, 8, 'Celana Tartan red', 300000, 'm1f9FeyU6dO7o66uHYiS.jpg', '                     Celana tartan slim fit cocok untuk para remaja dengan tampilan elegan dan cool\r\n                       \r\n                       \r\n                    ', 100, 97),
(9, 8, 'Celana Jeans Wrangler', 230000, 'oW4UCsTQtRPBF1covsl8.jpg', '                     Celana Jeans Wrangler dengan jahitan kuat dan rapi membuat menjadi tahan lama dan awet\r\n                       \r\n                    ', 100, 98),
(10, 2, 'Jam tangan Fossil', 500000, '4IeBQwXKjTqaq0ByuFDH.jpg', '                                          jam tangan Fossil digunakan para lelaki dengan harga terjaungkau dengan bahan koko dan kuat\r\n                       \r\n                       \r\n                       \r\n                    ', 100, 99),
(11, 2, 'Jam tangan Tissot 1853', 460000, 'TPtr7HQJ85C8Pt1cC92B.jpg', '                     Jam tangan Tissot 1853 jam tangan dengan diemasi batu berlian yang ditanami oleh emas 24 karat   \r\n                       \r\n                    ', 100, 99),
(12, 3, 'Tas Prada new brand', 670000, '9Kf86Wrcdkt3hGcgPx4H.jpg', '                     Prada new brand tas mewah dan cantik untuk para wanita karir\r\n                       \r\n                    ', 100, 99),
(13, 3, 'Tas Gucci 2024', 650000, '1m3cwxR7dsvAkiFMk8qh.jpg', '                     Gucci adalah tas untuk para wanita remaja   \r\n                    ', 100, 98),
(14, 10, 'Topi POLO 1987', 89000, 'sYS89elPD6iNWqbFaz13.jpg', '                      POLO 1987 adalah topi asli buatan jerman dengan perpaduan vintage menambah kesan kegagahan pemakainya  \r\n                       \r\n                    ', 100, 99),
(15, 10, 'Topi Series Rey', 24000, '698Bxr2zPZKOYFaTi61O.jpg', '                     Series rey cocok untuk pecinta alam dengan jahitan yang tebal dan bahan yang lembut membuat kesan hangat dikulit\r\n                       \r\n                    ', 100, 98),
(16, 11, 'Sepatu Air Jordan series', 230000, 'e5rZl1Vl3u2I86aDMksR.jpg', '                     Menambah penampilan anda semakin keren dan modis kekinian\r\n                       \r\n                    ', 100, 98),
(17, 1, 'Kacamata Wayfarer', 476000, 'XAwtOOWedEv4DXIAyrRK.jpg', '                                          Kacamata Wayfarer adalah gaya kacamata ikonik yang pertama kali dipopulerkan oleh merek ternama Ray-Ban pada tahun 1952. Berikut adalah deskripsi tentang Kacamata Wayfarer.\r\nKacamata Wayfarer memiliki desain klasik dengan bingkai plastik tebal dan bentuk lensa trapesium yang khas. Bagian atas bingkai sedikit lebih tebal, memberikan tampilan maskulin dan berkarakter. Lensa kacamata ini biasanya berwarna gelap seperti hijau, cokelat, atau hitam untuk melindungi mata dari sinar matahari.\r\nSalah satu ciri khas Wayfarer adalah gagang kacamata yang ikonik dengan ujung melebar. Gagang ini memberikan sentuhan gaya retro yang kuat dan menambah keunikan desain kacamata ini. Kacamata Wayfarer menjadi sangat populer di kalangan selebriti dan ikon budaya pada era 1950-an dan 1960-an.   \r\n                       \r\n                    ', 100, 99),
(18, 1, 'Kacamata Wrap Around', 330000, 'H2jPNAZrmWP1NcHzUItk.jpg', '                     Kacamata Wrap Around adalah jenis kacamata yang memiliki desain khusus dengan lensa yang melengkung melingkari area mata.\r\nKacamata Wrap Around memiliki lensa yang berbentuk melengkung dan melingkari wajah secara horizontal. Desain ini memberikan perlindungan maksimal bagi mata dari sinar matahari, angin, debu, atau partikel lainnya dari segala arah. Lensa Wrap Around biasanya terbuat dari plastik atau polikarbonat yang kuat dan tahan benturan.   \r\n                    ', 100, 99),
(19, 1, 'Kacamata Browline', 760000, '6ujBnSBJDptRgl6S0Fhf.jpg', '                     Kacamata Browline adalah jenis kacamata yang memiliki gaya ikonik dengan desain yang menggabungkan unsur klasik dan modern. Berikut deskripsi tentang Kacamata Browline:\r\nKacamata Browline memiliki ciri khas bingkai yang terbagi menjadi dua bagian berbeda material. Bagian atas bingkai terbuat dari plastik atau logam yang tebal, biasanya berwarna gelap seperti hitam atau cokelat tua. Bagian ini melengkung mengikuti bentuk alis atau &quot;brow&quot; sehingga dinamakan &quot;browline&quot;.\r\nSementara itu, bagian bawah bingkai terbuat dari bahan yang lebih ringan seperti logam atau nilon tipis berwarna cerah. Bagian ini membentuk bingkai lensa yang lebih kecil dan membuat penampilan kacamata terlihat lebih segar.\r\nDesain Kacamata Browline ini memberikan kesan maskulin dan intelektual. Popularitasnya meningkat sejak dikenakan oleh banyak tokoh terkenal seperti Buddy Holly, Michael Caine, dan Steve Jobs.   \r\n                    ', 100, 99),
(20, 2, 'Jam Tangan Rolex Oyster Peripetual Datejust new', 534000, 'Rn3oP9IRpPS1lRJGyGHj.jpg', '                     am Tangan Rolex Oyster Perpetual Datejust adalah salah satu koleksi ikonik dan paling populer dari merek jam tangan mewah Rolex. Berikut adalah deskripsi lengkap tentang jam tangan ini:\r\nDesain:\r\n\r\nBodi jam terbuat dari bahan baja tahan karat berkualitas tinggi yang kokoh dan tahan lama\r\nDilengkapi dengan cyclops lens (lensa pembesar) di atas kristal safir yang meningkatkan keterbacaan tanggal\r\nBezel putaran (lingkaran luar) tersedia dalam berbagai pilihan material seperti baja, emas, atau berlian\r\nTali jam (strap/bracelet) terbuat dari bahan baja kokoh dengan desain oyster yang ikonik   \r\n                    ', 100, 97),
(21, 2, 'Jam Tangan Citizen 1990', 890000, 'sz1xfSfMT9gsVQRufoXo.jpg', '                     Jam Tangan Citizen adalah merek jam tangan yang berasal dari Jepang dan dikenal dengan kualitas serta keandalan yang tinggi. Berikut adalah deskripsi tentang Jam Tangan Citizen:\r\nDesain:\r\n\r\nMemiliki desain yang modern, stylish, dan variatif, mulai dari tampilan kasual hingga formal\r\nMenggunakan material berkualitas seperti baja tahan karat, titanium, atau emas untuk bodi dan tali jam\r\nTersedia dalam berbagai ukuran diameter kasus sesuai preferensi pemakai\r\nDesain dial (bidang jam) yang bersih dan mudah dibaca dengan indeks atau angka yang jelas\r\n\r\nTeknologi:\r\n\r\nCitizen terkenal dengan teknologi Eco-Drive yang mengubah sumber cahaya (baik dari matahari atau lampu) menjadi energi untuk mengisi daya baterai secara otomatis\r\nBeberapa model dilengkapi dengan fitur canggih seperti kalender perpetual, chronograph, dan indikator reserv tenaga baterai\r\nTahan air hingga kedalaman tertentu, umumnya 50-200 meter tergantung seri   \r\n                    ', 100, 98),
(22, 2, 'Jam Tangan Fossil New brand', 433000, 'vhS3C1lBk8vtbvmGcoit.jpg', '                     Jam Tangan Fossil adalah merek jam tangan yang populer dan digemari oleh banyak orang, terutama kalangan muda. Berikut deskripsi lengkap tentang Jam Tangan Fossil:\r\nDesain:\r\n\r\nMemiliki desain yang trendi, modern, dan fashionable dengan sentuhan gaya vintage yang khas\r\nBanyak pilihan gaya mulai dari kasual, sporty, hingga formal\r\nMengombinasikan bahan seperti logam, kulit, dan bahan sintetis untuk bodi dan tali jam\r\nTersedia dalam berbagai macam warna yang beragam seperti perak, emas, hitam, cokelat, dan biru\r\n\r\nFitur:\r\n\r\nSebagian besar jam Fossil menggunakan mesin kuarsa yang akurat dan terjangkau\r\nBeberapa seri khusus menggunakan mesin automatic (mekanis) untuk tampilan yang lebih premium\r\nFitur tambahan seperti kalender, chronograph, dan ketahanan air hingga 50-100 meter pada model tertentu\r\nDiamater kasus bervariasi mulai dari 32mm hingga 50mm untuk pria dan wanita\r\n   \r\n                    ', 100, 96),
(23, 3, 'Tas Lacoste', 200000, 'u2scUh1wm17ErOYlL0eI.jpg', '                     Tas Lacoste adalah lini tas berkualitas tinggi yang diproduksi oleh brand fesyen ternama asal Prancis, Lacoste. Berikut adalah deskripsi lengkap tentang Tas Lacoste:\r\nDesain:\r\n\r\nMemiliki desain yang simpel, minimalis, namun tetap stylish dan modern\r\nMengutamakan garis-garis yang bersih dan potongan yang rapi\r\nBahan utama yang digunakan adalah kulit asli, kanvas, atau bahan sintetis berkualitas\r\nTerdapat aksen logo buaya yang menjadi ikon Lacoste pada setiap tas\r\n\r\nPilihan Produk:\r\n\r\nTersedia dalam berbagai jenis seperti tas ransel, tas selempang, tas tote, tas jinjing, dan dompet\r\nHadir dalam pilihan warna-warna klasik seperti hitam, putih, biru navy, hijau, dan merah\r\nUkuran tas bervariasi dari ukuran kecil hingga besar untuk memenuhi berbagai kebutuhan\r\n\r\nKualitas:\r\n\r\nSetiap tas Lacoste dibuat dengan penanganan khusus dan ketelitian tinggi\r\nMengutamakan bahan berkualitas tinggi yang awet dan tahan lama\r\nPermukaan tas halus dengan jahitan yang rapi dan kuat\r\n\r\nTarget Pasar:\r\n\r\nTas Lacoste ditujukan untuk kalangan menengah ke atas yang menginginkan tas berkualitas dengan tampilan simple tapi elegan\r\nCocok digunakan untuk gaya kasual maupun formal\r\nMenjadi aksesoris bergengsi yang melengkapi penampilan gaya hidup urban.   \r\n                    ', 100, 97),
(24, 3, 'Tas Get Daily Gear', 355000, 'mAm9Aqlxho7yy4ukxTZI.jpg', '                     Tas Get Daily Gear adalah tas didesain khusus untuk aktivitas sehari-hari. Tas ini memiliki tampilan sederhana namun fungsional dengan bahan utama terbuat dari polyester atau kanvas yang kuat dan tahan air.\r\nDesain Tas Get Daily Gear mengutamakan sisi fungsional di samping tampilan yang stylish. Tas ini dilengkapi dengan banyak kompartemen dan kantung tersembunyi untuk menyimpan barang-barang seperti ponsel, dompet, dan keperluan lainnya dengan teratur.\r\nTerdapat aksen berupa jahitan yang rapi serta penggunaan material berkualitas tinggi seperti ritsleting dan gesper yang kokoh. Tas ini juga mengutamakan aspek kenyamanan dengan adanya bantalan punggung dan tali bahu yang empuk serta adjustable.\r\nDesain Tas Get Daily Gear simpel namun bersih dengan pilihan warna-warna seperti hitam, abu-abu, navy yang mudah dipadukan dengan berbagai gaya berbusana. Ukurannya pun bervariasi dari tas ransel kecil hingga berukuran besar.\r\n   \r\n                    ', 100, 98),
(25, 3, 'Tas Aesthetic Pleasure', 320000, 'fkj4GssN553Esuuy5s9L.jpg', '                     Tas Aesthetic Pleasure adalah lini tas selempang dengan desain minimalis yang elegan. Berbahan kanvas atau kulit berkualitas, dengan kontur garis yang bersih dan sederhana. Aksen logam seperti gesper dan ritsleting memberi kesan mewah. Warna-warna lembut seperti krem, abu-abu, coklat tua, dan hitam klasik. Kompartemen rapi dengan ruang ponsel tersembunyi. Dilengkapi dengan bantalan punggung dan tali bahu empuk. Cocok untuk gaya hidup urban yang mencari keindahan dalam kesederhanaan. Merepresentasikan keanggunan dan kehalusan bagi penggunanya.   \r\n                    ', 100, 99),
(26, 8, 'Celana Denim Pranc', 600000, 'bNt5cc94JDgaZlzvPhbx.jpg', '                                          Berikut adalah deskripsi tentang celana jeans denim:\r\nCelana jeans denim merupakan jenis celana yang terbuat dari bahan denim, yaitu kain katun yang ditenun dengan teknik khusus sehingga menghasilkan tekstur kain yang kuat dan awet. Ciri khas celana jeans adalah tampilan kasual dan maskulin.\r\nDesain celana jeans denim sangat ikonik dengan bentuk lurus dari pinggang hingga pergelangan kaki. Bagian lutut dan paha dibuat agak longgar untuk keleluasaan bergerak, sementara bagian pergelangan kaki cenderung sempit. Terdapat lipatan pada bagian bawah celana untuk memberi kesan kusut yang khas.\r\nMaterial denim yang digunakan memiliki anyaman ketat sehingga terasa kaku dan tebal. Warna khasnya adalah biru tua dengan efek belel atau pudar pada beberapa bagian karena pemakaian. Semakin sering dipakai, maka jeans akan semakin terlihat belel dan berkarakter.   \r\n                       \r\n                    ', 100, 99),
(27, 8, 'Celana Cargo 1999', 500000, '2duTdnzMn2rtfwNhhl5I.jpg', '                                          Celana cargo merupakan jenis celana lapangan yang awalnya didesain untuk kegiatan militer atau petualangan ekstrim. Ciri khasnya adalah adanya kantung tambahan berukuran besar (cargo pocket) di bagian paha celana.\r\nCelana cargo biasanya terbuat dari bahan katun atau campuran poliester yang tebal, kuat, dan tahan lama. Bentuk celananya lurus dari pinggang hingga pergelangan kaki dengan bagian paha dan lutut yang sedikit longgar.\r\nKarakteristik utama celana cargo adalah adanya kantung tambahan dengan uk uran besar di bagian paha. Kantung ini berfungsi untuk menyimpan perlengkapan tambahan seperti senjata, amunisi, atau peralatan lain saat beraktivitas di lapangan. Kantung cargo dilengkapi dengan ritsleting atau kancing untuk memudahkan akses.\r\nSelain kantung cargo, celana ini juga sering memiliki fitur tambahan seperti kantung samping, kantung belakang, ikat pinggang kokoh, dan detail jahitan yang kuat. Memberi kesan maskulin dan fungsional.   \r\n                       \r\n                    ', 100, 98),
(28, 8, 'Celana Okechuku Felix Jogger Pants', 429000, 'wg1kQFbS6u4S9NqqXvSo.jpg', '                     Okechuku Felix Jogger Pants adalah celana olahraga dengan desain stylish yang cocok untuk aktivitas lari, jogging, ataupun sekedar berpenampilan kasual. Celana ini terbuat dari bahan polyester atau campuran polyester-spandex yang ringan, lembut, dan sangat nyaman digunakan.\r\nCiri khas dari Jogger Pants ini adalah bagian kakinya yang mengecil ke arah pergelangan kaki. Hal ini memberi kesan athleisure atau penampilan sporty yang trendy. Pinggang celana dilengkapi dengan tali pengikat atau karet elastis agar pas dan nyaman digunakan.\r\nSelain itu, Jogger Pants ini memiliki desain yang minimalis dengan garis-garis sederhana. Namun dipadukan dengan detail seperti aksen kontras warna pada bagian samping kaki untuk memberi sentuhan gaya modern.\r\nCelana ini sangat fungsional dengan adanya kantung samping dan kantung belakang untuk menyimpan barang-barang kecil seperti ponsel atau kunci saat berolahraga.   \r\n                    ', 100, 99),
(29, 10, 'Topi BNB New', 220000, 'nExBD5xv7PUn01FbVYQz.jpg', '                     Topi BNB (Born N Bread) adalah topi baseball klasik yang didesain dengan sentuhan gaya streetwear modern. Topi ini terbuat dari bahan katun twill yang kuat dan tahan lama.\r\nCiri khas dari Topi BNB adalah desain mahkota topi yang melengkung dengan lipatan pada bagian depan yang memberikan tampilan ikonik topi baseball. Bagian belakang topi terbuat dari mesh atau kain berlubang untuk memberi sirkulasi udara yang baik.\r\nLogo Born N Bread tercetak dengan desain yang mencolok pada bagian depan topi. Logo ini menampilkan stilasi tulisan dengan gaya urban dan ekspresif yang khas dari brand streetwear ini.\r\nTerdapat banyak pilihan warna dan motif cetak pada Topi BNB, mulai dari warna-warna solid seperti hitam, putih, merah, hingga motif grafis seperti garis, abstrak, atau logo brand lainnya.\r\nUkuran topi tersedia dengan bentuk yang pas di kepala dan dilengkapi dengan pengatur strap di belakang untuk menyesuaikan kenyamanan pemakai.   \r\n                    ', 100, 97),
(30, 10, 'Topi Beanie', 476000, 'D5nv88QbgxP15F4M4Q24.jpg', '                     Topi benie merupakan topi khas yang berasal dari negara-negara di Afrika Barat seperti Ghana, Nigeria, dan Togo. Topi ini memiliki desain yang khas dan menjadi ikon budaya serta identitas bagi masyarakat di wilayah tersebut.\r\nBentuk dasar topi benie adalah silinder tinggi yang terbuat dari bahan rajutan benang wol atau katun. Bagian atas topi berbentuk datar atau sedikit melengkung. Tinggi topi benie bisa mencapai 30-40 cm, menjadikannya sangat mencolok dan ikonik.\r\nSelain tingginya yang khas, topi benie juga dikenal dengan motif dan warna-warna cerah yang menghiasinya. Motif seperti garis-garis, kotak-kotak, atau pola tradisional ditorehkan dengan teknik rajut yang rumit.\r\nWarna-warna yang sering digunakan seperti merah, kuning, hijau, biru, ungu, serta motif geometris dan zik-zak yang beragam. Semakin banyak motif dan warna yang dipadukan, akan semakin menarik penampilan topi benie tersebut.   \r\n                    ', 100, 98),
(31, 10, 'Topi Breton', 140000, 'R4TfQcf7nLlL9WCXURsn.jpg', '                     Topi Breton adalah topi pelaut tradisional yang berasal dari wilayah Brittany, Prancis Barat. Topi ini memiliki desain sederhana namun ikonik dan menjadi salah satu simbol gaya nautika.\r\nTopi Breton berbentuk melengkung dengan mahkota bulat yang agak rendah. Bahan utamanya terbuat dari wool atau katun yang tebal dan kuat. Warna khasnya adalah biru tua dengan garis-garis horizontal putih yang melingkar di seluruh permukaan topi.\r\nMotif garis-garis horizontal putih tersebut menjadi ciri khas utama dari Topi Breton. Biasanya terdapat 2-3 garis putih yang menghiasi topi. Pola ini terinspirasi dari baju pelaut tradisional Breton yang juga bergaris-garis serupa.\r\nBagian depan topi sedikit melengkung ke depan, memberikan tampilan ikonik yang akrab dengan gaya nautika. Terdapat hirisan melintang di bagian belakang untuk memudahkan topi menyesuaikan bentuk kepala.   \r\n                    ', 100, 99),
(32, 11, 'Sepatu Roshe One', 400000, 'jLZHe2IqaV6oSKi6jnOh.jpg', '                     Sepatu Roshe One merupakan salah satu model sepatu sneakers ikonik dari brand Nike. Sepatu ini dirancang untuk aktivitas kasual sehari-hari dengan mengusung konsep minimalis dan kenyamanan maksimal.\r\nDesain sepatu Roshe One sangat sederhana namun stylish dengan upper berbahan mesh dan lapisan kulit sintetis yang ringan. Bagian mesh memberi sirkulasi udara yang baik sehingga kaki tetap nyaman meski digunakan dalam waktu lama.\r\nMidsole atau bantalan bawah sepatu terbuat dari dual-density foam yang memberikan peredam kejut dan fleksibilitas maksimal saat berjalan. Selain itu, teknologi Nike Roshe terbaru juga telah diterapkan pada midsole untuk meningkatkan kenyamanan.\r\nOutsole sepatu berbahan karet alami dengan pola permukaan yang memberikan cengkeraman yang baik meski digunakan di jalanan licin.\r\nSalah satu ciri khas sepatu Roshe One adalah tampilannya yang minimalis tanpa adanya detail berlebihan atau branding yang mencolok. Desainnya simpel namun tetap stylish dan mudah dipadukan untuk gaya kasual harian.   \r\n                    ', 100, 92),
(33, 11, 'Sepatu Air Huarache', 599000, 'KYQr1OHxzhWIHz92pEVe.jpg', '                     Sepatu Air Huarache merupakan salah satu model sneakers ikonik dan futuristik dari Nike yang pertama kali diluncurkan pada tahun 1991. Desainnya yang unik dan inovatif pada masanya menjadikannya sepatu dengan penampilan dan teknologi yang memukau.\r\nUpper:\r\n\r\nMenggunakan bahan synth-fit yang terbuat dari nilon berpori dan spandex untuk memberikan fleksibilitas dan kenyamanan maksimal\r\nBagian synth-fit melapisi kaki seperti stoking/kaos kaki yang pas dan nyaman\r\nDilengkapi dengan tumit dan pelindung jari kaki yang terbuat dari bahan sintetis untuk perlindungan ekstra\r\n\r\nMidsole:\r\n\r\nMenggunakan teknologi Air Sole Unit berupa kantung udara terkompresi di sepanjang midsole untuk memberikan peredam kejut dan kenyamanan\r\nBagian Huarache sendiri merupakan pelindung samping kaki yang ringan dan fleksibel\r\n\r\nOutsole:\r\n\r\nTerbuat dari karet berkualitas dengan pola unik berbentuk seperti sampan untuk memberikan cengkeraman kuat\r\nTerdapat tulisan &quot;Air Huarache&quot; yang menghiasi bagian bawah outsole   \r\n                    ', 100, 98),
(34, 11, 'Sepatu Air Max 97', 699000, 'ihc4NWmRleGCkbVUmhdS.jpg', '                                          Desain Unik:\r\n\r\nUpper terbuat dari bahan sintetis dengan lapisan mesh untuk menjaga kaki tetap bernapas\r\nMemiliki gelombang sreaming berwarna-warni yang menjadi ciri khas desain futuristik AM97\r\nGelombang streaminline ini terinspirasi dari kereta peluru Jepang dan alirannya yang dinamis\r\n\r\nTeknologi Air Unit:\r\n\r\nMidsole menggunakan teknologi Air Max penuh sepanjang telapak kaki\r\nAir Unit berbentuk gelombang memberikan peredam kejut dan kenyamanan maksimal saat berjalan\r\nLapisan atas Air Unit terbuat dari busa ringan untuk meningkatkan respon sepatu\r\n\r\nOutsole:\r\n\r\nBagian outsole terbuat dari karet berkualitas dengan pola unik yang memberikan cengkeraman kokoh\r\nTerdapat detail berupa tulisan &quot;Air Max&quot; dan angka &quot;97&quot; sebagai identitas model ini\r\n\r\nWarna:\r\n\r\nHadir dalam aneka pilihan warna trendy dan berani seperti tripel putih, neon, metalik, hingga paduan warna cerah\r\nVarian warna ikoniknya adalah &quot;Silver Bullet&quot; dengan kombinasi silver, merah, dan biru\r\n\r\nKeunggulan:\r\n\r\nMenggabungkan estetika visual yang menarik dengan teknologi Air Max untuk performa dan kenyamanan\r\nDesain futuristik menjadikan AM97 ikonik dan mudah dikenali di jalanan\r\nTetap nyaman digunakan untuk aktivitas sehari-hari meski tampilannya begitu stylish   \r\n                       \r\n                    ', 100, 97),
(35, 11, 'Sepatu Nike Air max 90', 387000, '4j1bYT3y9yTmJCJ3GTAW.jpg', '                                          Desain Ikonik:\r\n\r\nUpper terbuat dari bahan kulit sintetis, mesh, dan suede untuk tampilan klasik\r\nMemiliki panel berwarna-warni yang khas dengan gradasi warna di bagian samping\r\nCiri khas lainnya adalah adanya center-piece plastik yang menghiasi bagian samping sepatu\r\n\r\nTeknologi Air Unit:\r\n\r\nDilengkapi dengan Air Unit di sepanjang midsole untuk memberikan peredam kejut maksimal\r\nAir Unit berbentuk gelombang yang terinspirasi dari Air Max III sebelumnya\r\nLapisan bantalan busa Phylon yang ringan di atas Air Unit untuk meningkatkan respon sepatu\r\n\r\nOutsole:\r\n\r\nTerbuat dari karet berkualitas dengan pola khusus untuk mendapatkan cengkeraman yang baik\r\nDetail tulisan &quot;Air Max&quot; dan ukiran khusus lainnya di bagian outsole\r\nTerdapat lapisan karet kuning di bagian tumit untuk melindungi saat berjalan\r\n\r\nWarna:\r\n\r\nHadir dalam banyak pilihan warna klasik seperti Infrared, Volt, Ocean Fog hingga Bacon\r\nVarian warna ikoniknya adalah OG Infrared dengan kombinasi warna merah, abu-abu, dan hitam\r\n\r\nKeunggulan:\r\n\r\nTampilan retro yang keren dengan teknologi Air Max untuk kenyamanan\r\nSangat ikonik sehingga mudah dikenali sebagai sepatu Air Max 90\r\nNyaman digunakan untuk aktivitas harian maupun berpenampilan bergaya   \r\n                       \r\n                    ', 100, 98),
(36, 11, 'Sepatu Eiger adventure', 300000, 'Zop4vGQTkNratWmsjQU8.jpg', '                     Sepatu khusus untuk para traveller   \r\n                    ', 100, 96);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$vP./5mu7fi6QNgSAySP8I.4Oe8WZGxNyiyzBfS0pfw/4Q3796DY8i'),
(2, 'asas', '$2y$10$mWg8FK/Q68B220k0I9wwCOrbJjnLd1AS76NlTMgme92IxotkFpM5.'),
(3, 'hayo', '$2y$10$nXTQRbjZAE3IjEOJeCqNJ.FvCkElxbQqmMdrUTMS7oDIdYcVu7rKS'),
(4, 'ilham', '$2y$10$PfpQvFHZa1hIi59DyFQcNeXfh6GQft7y4GR6oD3ZvAkb6GMH6RNz6'),
(5, 'ayam', '$2y$10$cBEe4TuIIUhwqaXjNCsFguqosaE1TjBMMJ8h9fBcOxatLQquNDxXe'),
(6, 'ilhamsaja', '$2y$10$K.cloKX.y1zRw66k9MFyKuxVLUHnKjUOLUwI3HYOZ4GXEWrCRRdw.'),
(7, 'saya', '$2y$10$s8uzgk/wSbZ688OsxUr97eXFmfPqkTHouLqdc0XqJUBhc.YB.no.i'),
(8, 'dedenoe', '$2y$10$L7wadhIWSf6U/oAfaykzLeyLEzawQ0xApH2ZxkOjpB852/OQLB7Hm');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`pembelian_produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `pembelian_produk_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
