-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2023 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_masjid`
--

CREATE TABLE `detail_masjid` (
  `id_detail` int NOT NULL,
  `id_user` int NOT NULL,
  `name_resmi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_resmi` date DEFAULT NULL,
  `lokasi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `luas_bangunan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `luas_keseluruhan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `daya_tampung` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `facebook` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_masjid`
--

INSERT INTO `detail_masjid` (`id_detail`, `id_user`, `name_resmi`, `date_resmi`, `lokasi`, `luas_bangunan`, `luas_keseluruhan`, `daya_tampung`, `facebook`, `instagram`, `twitter`) VALUES
(1, 10, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(7, 20, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(8, 21, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(9, 22, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(10, 23, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(11, 24, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(12, 25, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(13, 26, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(14, 27, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(15, 28, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(16, 29, 'Al Baqarah', '2023-12-29', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Utara', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo'),
(17, 30, 'Nurul Fatah', '2023-12-27', 'No 04 RT/RW 04/20 Jl. Sukajadi Indralaya, Palembang Sumatera Selatan', '100 m2', '1000 m2', '100000', 'facebook.com/sandemo', 'instagram.com/sandemo', 'twitter.com/sandemo');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_user`, `id_transaksi`, `keterangan`, `tgl_transaksi`) VALUES
(12, 10, '14122023-1541', 'Donasi A/n Meri', '2023-12-14'),
(13, 1, '14122023-4873', 'Infaq Hari Jumat', '2023-12-14'),
(14, 1, '14122023-9137', 'Donasi A/n Sandi Maulidika', '2023-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jurnal` varchar(225) NOT NULL,
  `kredit` int NOT NULL,
  `debit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id`, `id_user`, `id_jurnal`, `kredit`, `debit`) VALUES
(12, 10, '12', 0, 10000),
(13, 1, '13', 0, 5000),
(14, 1, '14', 0, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  `tipe_kas` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `nominal` int NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `id_transaksi`, `id_user`, `tipe_kas`, `keterangan`, `nominal`, `tgl_transaksi`) VALUES
(9, '14122023-1541', 10, 'masuk', 'Donasi A/n Meri', 10000, '2023-12-14'),
(10, '14122023-4873', 1, 'masuk', 'Infaq Hari Jumat', 5000, '2023-12-14'),
(11, '14122023-9137', 1, 'masuk', 'Donasi A/n Sandi Maulidika', 10000, '2023-12-14');

--
-- Triggers `kas`
--
DELIMITER $$
CREATE TRIGGER `after_kas_insert` AFTER INSERT ON `kas` FOR EACH ROW BEGIN
    DECLARE id_jurnal INT;

    -- Insert ke tabel jurnal
    INSERT INTO jurnal (id_transaksi, id_user, keterangan, tgl_transaksi)
    VALUES (NEW.id_transaksi, NEW.id_user, NEW.keterangan, NEW.tgl_transaksi);

    -- Ambil id_jurnal yang baru diinsert
    SELECT id INTO id_jurnal FROM jurnal WHERE id_transaksi = NEW.id_transaksi LIMIT 1;

    -- Insert ke tabel jurnal_detail
    IF NEW.tipe_kas = 'keluar' THEN
        INSERT INTO jurnal_detail (id_jurnal, id_user, kredit, debit)
        VALUES (id_jurnal, NEW.id_user, NEW.nominal, 0);
    ELSE
        INSERT INTO jurnal_detail (id_jurnal, id_user, kredit, debit)
        VALUES (id_jurnal, NEW.id_user, 0, NEW.nominal);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int NOT NULL,
  `id_user` int NOT NULL,
  `name_kegiatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image_kegiatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_kegiatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int NOT NULL,
  `nama_website` varchar(128) NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `email` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `whatsapp` varchar(128) NOT NULL,
  `youtube` varchar(128) DEFAULT NULL,
  `alamat` text,
  `logo_website` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_website`, `about`, `email`, `facebook`, `instagram`, `whatsapp`, `youtube`, `alamat`, `logo_website`) VALUES
(1, 'Aplikasi Keuangan Kas Masjid', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'admin@gmail.com', 'facebook.com/sandemo', NULL, '087801751656', NULL, 'Jl. Cimincrang No. 14, Cimincrang, Kec. Gedebage, Kota Bandung, Jawa Barat 40292', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donatur`
--

CREATE TABLE `tbl_donatur` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_donatur`
--

INSERT INTO `tbl_donatur` (`id`, `id_user`, `nama`, `alamat`) VALUES
(5, 1, 'Sandi Maulidika', 'Palembang'),
(6, 1, 'Voni Puspita Sari', 'Jakarta'),
(7, 10, 'Merii', 'Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `nama_transaksi` varchar(225) NOT NULL,
  `nominal` double(255,0) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `id_donatur` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `id_user`, `id_transaksi`, `nama_transaksi`, `nominal`, `jenis`, `id_donatur`, `tgl_transaksi`) VALUES
(13, 10, '14122023-1541', 'Donasi A/n Meri', 10000, 'kas masuk', '7', '2023-12-14'),
(14, 1, '14122023-9137', 'Donasi A/n Sandi Maulidika', 10000, 'kas masuk', '5', '2023-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_masjid` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `name_masjid`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Sandemo', 'AL - NABAWI', 'sandimaulidika@gmail.com', 'centang-biru.png', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 1, 1, 1661189930),
(10, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(20, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151),
(21, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(22, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151),
(23, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(24, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151),
(25, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(26, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151),
(27, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(28, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151),
(29, 'Voni Puspita Sari', 'AL - Baqarah', 'voni@gmail.com', 'default.jpg', '$2y$10$r/xcmYkTSsIV7LJP.RYWGulRhwugCKVrKVIgx7ytOpcBQ6jHEGxp6', 2, 1, 1702290630),
(30, 'Sandemo', 'Nurul Fatah', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$K33/1KmyXJtKJEsnVSBks.ruOa66OBkeh20eHMjhpqMyzf0daBQNq', 2, 1, 1703855151);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 1, 2),
(5, 1, 3),
(6, 1, 5),
(13, 2, 2),
(14, 2, 6),
(15, 2, 5),
(16, 2, 115);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(225) NOT NULL,
  `sort` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `sort`) VALUES
(1, 'Admin', 1),
(2, 'User', 4),
(3, 'Menu', 5),
(5, 'Transaksi', 2),
(6, 'Laporan', 3),
(115, 'Managements', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'shop text-primary', 1),
(2, 2, 'My Profile', 'user', 'single-02 text-success', 1),
(4, 3, 'Menu Management', 'menu', 'folder-17 text-danger', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'ui-04 text-danger', 1),
(8, 1, 'Role', 'admin/role', 'circle-08 text-info', 1),
(12, 5, 'Data Donatur', 'transaksi/donatur', 'circle-08 text-success', 1),
(22, 5, 'Data Donasi', 'transaksi/donasi', 'badge text-primary', 1),
(23, 5, 'Kas Keluar', 'transaksi/kaskeluar', 'fat-delete text-danger', 1),
(24, 5, 'Kas Masuk', 'transaksi/kasmasuk', 'fat-add text-info', 1),
(25, 6, 'Laporan Kas', 'laporan', 'chart-bar-32 text-success', 1),
(27, 2, 'Home', 'user/dashboard', 'shop text-primary', 1),
(28, 1, 'Setting', 'admin/setting', 'fa-solid fa-gea', 1),
(29, 115, 'Site Management', 'user/management', 'shop text-primary', 1),
(30, 115, 'Kegiatan', 'user/kegiatan', 'shop text-primary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_masjid`
--
ALTER TABLE `detail_masjid`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_masjid`
--
ALTER TABLE `detail_masjid`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
