-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 19.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `summer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` varchar(8) NOT NULL,
  `nama_kat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
('K001', 'Makanan'),
('K002', 'Minuman'),
('K003', 'Ice Cream');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(8) NOT NULL,
  `id_kat` varchar(8) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` char(30) NOT NULL,
  `stok` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_kat`, `gambar`, `nama_menu`, `harga`, `stok`) VALUES
(1, 'K001', 'image-from-rawpixel-id-3343087-original.jpg', 'Honey Pancake', '35000', '100'),
(2, 'K003', 'Vegan Chocolate Ice Cream.jpg', 'Vegan Chocolate Ice Cream', '20000', '35'),
(3, 'K001', 'pancake.jpg', 'Strawberry Pancake', '30000', '23'),
(4, 'K001', 'food1.jpg', 'Japanese Regional Cuisine', '20000', '56'),
(5, 'K001', 'food6.jpg', 'Chocolate Churros', '50000', '87'),
(6, 'K001', 'food4.jpg', 'Strawberry and Marshmallow', '40000', '54'),
(7, 'K002', '15.jpg', 'Hot Cappucino', '15000', '124'),
(8, 'K003', '1.png', 'Gingered Golden Milk', '30000', '111'),
(9, 'K002', '11.jpg', 'Candy Drinks', '45000', '67'),
(10, 'K002', '12.jpg', 'Blueberry with Lemon', '40000', '124'),
(11, 'K002', '13.jpg', 'Lattes and Cookies', '30000', '65'),
(12, 'K002', '14.jpg', 'Dalgona Coffee', '20000', '35'),
(13, 'K003', '2.jpg', 'Ice Cream Small Box', '25000', '87'),
(14, 'K003', '3.jpg', 'Banana Stick Ice Cream', '20000', '35'),
(15, 'K003', '4.jpg', 'Green Tea Oreo Ice Cream', '45000', '76'),
(16, 'K003', '5.jpg', 'Oreo Vanilla Ice Cream', '15000', '43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` varchar(8) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `foto`, `nama`, `username`, `password`) VALUES
('P001', 'budi.jpg', 'Budi', 'budi123', '123'),
('P002', 'mchandra.jpg', 'Muhammad Chandra', 'mchandra123', '123'),
('P003', 'Shafa Salsabila.jpg', 'Shafa Salsabila', 'shafa123', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kat` (`id_kat`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
