-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2020 pada 15.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcapps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `jenis_id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`jenis_id`, `jenis`) VALUES
(1, 'Umum Eksternal'),
(2, 'Umum Internal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `jenis_surat_k` varchar(100) NOT NULL,
  `no_surat_k` varchar(100) NOT NULL,
  `tgl_surat_k` date NOT NULL,
  `hal_surat_k` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `waktu_rekam` datetime NOT NULL,
  `nama_rekam` varchar(100) NOT NULL,
  `nip_rekam` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `hal` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `waktu_rekam` time NOT NULL,
  `nama_rekam` varchar(100) NOT NULL,
  `nip_rekam` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `upload_scan_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `jenis_surat`, `nomor`, `tgl`, `hal`, `asal`, `waktu_rekam`, `nama_rekam`, `nip_rekam`, `status`, `upload_scan_surat`) VALUES
(1, 'Umum Eksternal', '12/AP/135', '2020-06-28', 'Penundaan', 'Mataram', '14:05:00', 'Akmal', '175150211245', 'Diterima', ''),
(2, 'Umum Internal', '12/MPA/277', '2020-06-21', 'Pengajuan', 'Surabaya', '12:10:00', 'Bima', '1751502181', 'Diterima', ''),
(4, 'Aktivasi Modul', '1209890AB', '2020-07-01', 'Impor', 'Mataram', '12:04:00', 'Bagas', '17515021', 'Diproses', ''),
(5, 'Otoritas Pegawai', '1209890', '2020-07-01', 'Pengajuan', 'Surabaya', '09:10:00', 'Bagas', '175150218113024', 'Diterima', ''),
(6, 'Redis PIB', '11/AM/MTR', '2020-07-02', 'Penundaan', 'Surabaya', '13:05:00', 'Bagas', '175150218113024', 'Diterima', ''),
(7, 'Rollback CN/PIBK', '12/AP/135', '2020-06-29', 'Impor', 'Mataram', '17:18:00', 'Alvian', '1751502133', 'Diproses', ''),
(11, 'Redis PIB', '12', '2020-07-14', 'qna', 'sby', '16:07:00', 'a', '1324', 'diterima', ''),
(12, 'Pembatalan CN/PIBK', '12', '2020-07-14', 'qna', 'sby', '16:10:00', 'a', '1324', 'diterima', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `nip`, `image`, `password`, `date_created`, `is_active`, `role_id`) VALUES
(3, 'alvian akmal n', '175150218113024', 'me.jpg', '$2y$10$jVF8sbF7i1gXcH/pFdIHo.ia4w2mnrAMWUEjyEfWSA76bUV99e0RO', 0, 1, 1),
(4, 'Amoebaaa', '175150218113028', 'IMG_20190602_103814.jpg', '$2y$10$hS.dp8DDEeQlQc2GvdOExeHBI6znxef5lhkjJhBHNjMs5JIY7MyUS', 0, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(2, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fa-fw fa-folder-open', 1),
(3, 1, 'Surat Masuk', 'admin', 'fas fa-fw fa-envelope', 1),
(4, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(5, 1, 'Surat Keluar', 'admin/surat_k', 'fas fa-fw fa-envelope-open', 1),
(6, 1, 'Arsip Surat', 'admin/arsip', 'fas fa-fw fa-archive', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
