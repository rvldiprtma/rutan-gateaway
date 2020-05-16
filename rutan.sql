-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2020 pada 09.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rutan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi_penahanan`
--

CREATE TABLE `instansi_penahanan` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi_penahanan`
--

INSERT INTO `instansi_penahanan` (`id`, `nama_instansi`) VALUES
(1, 'Pengadilan Negeri Pontianak'),
(2, 'Kejaksaan Negeri Pontianak'),
(3, 'Polda Kalbar'),
(4, 'Polresta Pontianak'),
(5, 'Polres Kubu Raya'),
(6, 'Polsek Pontianak Kota'),
(7, 'Polsek Pontianak Barat'),
(8, 'Polsek Pontianak Timur'),
(9, 'Polsek Pontianak Utara'),
(10, 'Polsek Pontianak Selatan'),
(11, 'Polsek Pontianak Tenggara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pihak_penahanan`
--

CREATE TABLE `pihak_penahanan` (
  `id` int(11) NOT NULL,
  `nama_pihak_penahanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pihak_penahanan`
--

INSERT INTO `pihak_penahanan` (`id`, `nama_pihak_penahanan`) VALUES
(1, 'Kejaksaan Tinggi Kalimantan Barat'),
(2, 'Kejaksaan Negeri Pontianak'),
(3, 'Pengadilan Tinggi Pontianak'),
(4, 'Pengadilan Negeri Pontianak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_id`
--

INSERT INTO `role_id` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(5, 'Pengguna Biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `instansi_penahanan` int(11) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `no_hp`, `instansi_penahanan`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Rivaldi Pratama', 'privaldi75@gmail.com', '089693646381', 0, '$2y$10$9o0T5VlqpwKmo3/EU8c2euEr0gpKOyZQYpal6D7huToLkQmBJLz.6', 1, 1, 1589337209),
(3, 'asda', '1234@gmail.com', '089693646280', 0, '$2y$10$BqCCzqI8uEbLrmbmIQiYluVVgilhPAmkoHzy.oT.TA105NbsKC.Se', 2, 1, 1589339216),
(4, 'Member 1', 'member1@gmail.com', '089775644321', 6, '$2y$10$rS8mAu6IIDN/klEsHYlp1ezGCPPAOvp6R06wafY91vugVDNEHCVqm', 3, 1, 1589406169),
(5, 'Member 2', 'member2@gmail.com', '087676545431', 11, '$2y$10$2Hunnv0lRYFJ78dxKruqgeJmYUzlXBvPHPe2SZM/Z4jP/LnmX5GOu', 3, 1, 1589421462),
(6, 'Administrator', 'administrator@gmail.com', '089695746521', 0, '$2y$10$84DTkfhbGVUspy5al/ndx.riD5IMgRQ08rUC/ENhq4COBjtIqxvCC', 1, 1, 1589536840),
(7, 'Guest', 'guest@gmail.com', '089693646387', 1, '$2y$10$93RcHhtFOCc8Kc2s3x/PJ.W5mtmGLg2EcKtPxT7i9q4jfKrAHn8ri', 3, 1, 1589536876),
(8, 'Member', 'member@gmail.com', '089765648321', 0, '$2y$10$OYTI.33amOby/J.gxkCqqOeP5cJEPDbsqt56mO8w24Gd5OCFxnYD2', 2, 1, 1589536903);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 3, 3),
(5, 1, 4),
(8, 1, 2),
(13, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Guest'),
(4, 'Menu'),
(5, 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Guest'),
(9, 'Ini Test Aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` text NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Member', 'administrator', 'fas fa-fw fa-users', 1),
(2, 2, 'Tahanan', 'member', 'fas fa-fw fa-user-shield', 1),
(3, 3, 'Konfirmasi', 'guest', 'fas fa-fw fa-user-clock', 1),
(4, 4, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Submenu Manajemen', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 4, 'Role', 'administrator/role', 'fas fa-fw fa-user-tie', 1),
(9, 5, 'Ini Cuma Test', 'hanyacoba', 'fas fa-fw fa-folder-open', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instansi_penahanan`
--
ALTER TABLE `instansi_penahanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pihak_penahanan`
--
ALTER TABLE `pihak_penahanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_id`
--
ALTER TABLE `role_id`
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
-- AUTO_INCREMENT untuk tabel `instansi_penahanan`
--
ALTER TABLE `instansi_penahanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pihak_penahanan`
--
ALTER TABLE `pihak_penahanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
