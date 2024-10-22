-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 14.20
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcushion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cushion`
--

CREATE TABLE `cushion` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cushion`
--

INSERT INTO `cushion` (`id`, `image`, `merk`, `name`, `price`) VALUES
(3, 'skintificc.png', 'SKINTIFIC', 'Cover All Perfect Cushion', 209790),
(4, 'g2gg.webp', 'GLAD2GLOW', 'Perfect Cover Cushion', 97000),
(5, 'originot.png', 'THE ORIGINOTE', 'High Cover Serum Cushion', 99000),
(6, 'bb.webp', 'BARENBLISS', 'True Beauty Inside Cushion', 136800),
(7, 'y.jpg', 'YOU BEAUTY', 'NoutriWear+Flawless Cushion Foundation', 140400),
(8, 'mo.png', 'MOTHER OF PEARL', 'Microblur Translucent Cushion', 235000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'iim2', 'imro@gmail.com', 'iim'),
(2, 'iim', 'imro@gmail.com', 'pl'),
(3, 'iim', 'imro@gmail.com', 'pl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(2, 'admin', '$2y$10$yOIUA0kBQf18YddSdlOQxeoKy0HhqQ12vEVhkl8y8sD2XQCiOb2NK', 'admin'),
(3, 'iim', '$2y$10$tgSexUv70o.tHmWA4kgfw.K6ScC/4h3R3h4uSpOJgCvuhenaW8Ove', 'user'),
(4, 'iim2', '$2y$10$zDqTME8GdXQto3FoifQbVOfqHalj701YkJBWe1Q3fPWOFjVj4RmFW', 'user'),
(5, 'iimmmm7', '$2y$10$1NRGN4smA3Qxq3yCIpXqOemDE3gHc1WHfte0LUJ1tN..BO82ExmHq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cushion`
--
ALTER TABLE `cushion`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cushion`
--
ALTER TABLE `cushion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
