-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2020 pada 05.59
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tester`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `firtsname` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddres` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `firtsname`, `lastname`, `username`, `email`, `password`, `ipaddres`, `isEmailConfirmed`, `token`) VALUES
(17, 'Andre', 'Tri Ramadana', 'andre', 'andre@gmail.com', '$2y$13$j5E5DmKyVOf/v9uyZj/oduegu68EnxdXXeIZDOa6lDQ7UNPv/XxGi', '::1', 0, ''),
(18, 'Admini', 'strator', 'admin', 'admin@gmail.com', '$2y$13$yTBnW2gPDKiajIfUH3X/.OuZH.BfMGLCqYnO5fznUiUs0j1T4Uvpy', '::1', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shorlink`
--

CREATE TABLE `tbl_shorlink` (
  `id` int(14) NOT NULL,
  `session_username` varchar(122) NOT NULL,
  `long_url` longtext NOT NULL,
  `short_url` varchar(122) NOT NULL,
  `ipaddres` varchar(122) NOT NULL,
  `start_date` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_shorlink`
--

INSERT INTO `tbl_shorlink` (`id`, `session_username`, `long_url`, `short_url`, `ipaddres`, `start_date`) VALUES
(64, 'visitor', 'http://localhost/tester/beranda', 'dmh3c', '::1', '09:45:19-9-Oct-2020'),
(74, 'visitor', 'https://www.facebook.com/', 'cb9ov', '::1', '10:50:39-9-Oct-2020'),
(75, 'visitor', 'https://www.facebook.com/', 'm3d87', '::1', '10:51:18-9-Oct-2020'),
(76, 'visitor', 'https://www.facebook.com/', '6vn2a', '::1', '10:51:27-9-Oct-2020');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_shorlink`
--
ALTER TABLE `tbl_shorlink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_shorlink`
--
ALTER TABLE `tbl_shorlink`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
