-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2020 pada 11.40
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gambar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`id` int(11) NOT NULL,
  `orang_id` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `orang_id`, `nama_gambar`, `gambar`) VALUES
(64, 11, 'coding', '2.PNG'),
(65, 11, 'as', '1.PNG'),
(66, 11, 'asg', '15.CSS3 - Transition (Part 1).mp4  [1_2] - GOM Player 02_12_2019 10_52_36.png'),
(72, 11, 'script', '1.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang`
--

CREATE TABLE IF NOT EXISTS `orang` (
`id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` enum('admin','anggota') NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orang`
--

INSERT INTO `orang` (`id`, `nama_lengkap`, `nama`, `level`, `password`) VALUES
(11, 'kota', 'kota', 'anggota', '$2y$10$hKkiqUohV/gOGoiLbT2NtewUW43vT.RgJ7GI4/EhY.CQtiuaFEGSm'),
(12, 'aku', 'aku', 'anggota', '$2y$10$vygW7Wo8C39CJsAe.ng78.g2EzVfXA2RWxo16Kr0im1P2TmmEAabe'),
(13, 'aoi', 'aoi', 'anggota', '$2y$10$Aiznfs04SBzHt0rQI.bT2.ag6wQ6e3dtAgjxGRpCsvEvdUWOJcv8u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD PRIMARY KEY (`id`), ADD KEY `orang_id` (`orang_id`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`orang_id`) REFERENCES `orang` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
