-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2025 at 06:21 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rshp`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_rekam_medis`
--

CREATE TABLE `detail_rekam_medis` (
  `iddetail_rekam_medis` int NOT NULL,
  `idrekam_medis` int NOT NULL,
  `idkode_tindakan_terapi` int NOT NULL,
  `detail` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_rekam_medis`
--

INSERT INTO `detail_rekam_medis` (`iddetail_rekam_medis`, `idrekam_medis`, `idkode_tindakan_terapi`, `detail`) VALUES
(7, 5, 6, ''),
(8, 9, 6, 'hamil'),
(9, 10, 1, '1'),
(10, 11, 30, '-'),
(11, 11, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hewan`
--

CREATE TABLE `jenis_hewan` (
  `idjenis_hewan` int NOT NULL,
  `nama_jenis_hewan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_hewan`
--

INSERT INTO `jenis_hewan` (`idjenis_hewan`, `nama_jenis_hewan`) VALUES
(1, 'Anjing (Canis lupus familiaris)'),
(2, 'Kucing (Felis catus)'),
(3, 'Kelinci (Oryctolagus cuniculus)'),
(4, 'Burung'),
(5, 'Reptil'),
(6, 'Rodent / Hewan Kecil'),
(7, 'Kuda');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`) VALUES
(1, 'Vaksinasi'),
(2, 'Bedah / Operasi'),
(3, 'Cairan infus'),
(4, 'Terapi Injeksi'),
(5, 'Terapi Oral'),
(6, 'Diagnostik'),
(7, 'Rawat Inap'),
(8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_klinis`
--

CREATE TABLE `kategori_klinis` (
  `idkategori_klinis` int NOT NULL,
  `nama_kategori_klinis` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_klinis`
--

INSERT INTO `kategori_klinis` (`idkategori_klinis`, `nama_kategori_klinis`) VALUES
(1, 'Terapi'),
(2, 'Tindakan');

-- --------------------------------------------------------

--
-- Table structure for table `kode_tindakan_terapi`
--

CREATE TABLE `kode_tindakan_terapi` (
  `idkode_tindakan_terapi` int NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_tindakan_terapi` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idkategori` int NOT NULL,
  `idkategori_klinis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode_tindakan_terapi`
--

INSERT INTO `kode_tindakan_terapi` (`idkode_tindakan_terapi`, `kode`, `deskripsi_tindakan_terapi`, `idkategori`, `idkategori_klinis`) VALUES
(1, 'T01', 'Vaksinasi Rabies', 1, 1),
(2, 'T02', 'Vaksinasi Polivalen (DHPPi/L untuk anjing)', 1, 1),
(3, 'T03', 'Vaksinasi Panleukopenia / Tricat kucing', 1, 1),
(4, 'T04', 'Vaksinasi lainnya (bordetella, influenza, dsb.)', 1, 1),
(5, 'T05', 'Sterilisasi jantan', 2, 2),
(6, 'T06', 'Sterilisasi betina', 2, 2),
(9, 'T07', 'Minor surgery (luka, abses)', 2, 2),
(10, 'T08', 'Major surgery (laparotomi, tumor)', 2, 2),
(11, 'T09', 'Infus intravena cairan kristaloid', 3, 1),
(12, 'T10', 'Infus intravena cairan koloid', 3, 1),
(13, 'T11', 'Antibiotik injeksi', 4, 1),
(14, 'T12', 'Antiparasit injeksi', 4, 1),
(15, 'T13', 'Antiemetik / gastroprotektor', 4, 1),
(16, 'T14', 'Analgesik / antiinflamasi', 4, 1),
(17, 'T15', 'Kortikosteroid', 4, 1),
(18, 'T16', 'Antibiotik oral', 5, 1),
(19, 'T17', 'Antiparasit oral', 5, 1),
(20, 'T18', 'Vitamin / suplemen', 5, 1),
(21, 'T19', 'Diet khusus', 5, 1),
(22, 'T20', 'Pemeriksaan darah rutin', 6, 2),
(23, 'T21', 'Pemeriksaan kimia darah', 6, 2),
(24, 'T22', 'Pemeriksaan feses / parasitologi', 6, 2),
(25, 'T23', 'Pemeriksaan urin', 6, 2),
(26, 'T24', 'Radiografi (rontgen)', 6, 2),
(27, 'T25', 'USG Abdomen', 6, 2),
(28, 'T26', 'Sitologi / biopsi', 6, 2),
(29, 'T27', 'Rapid test penyakit infeksi', 6, 2),
(30, 'T28', 'Observasi sehari', 7, 2),
(31, 'T29', 'Observasi lebih dari 1 hari', 7, 2),
(32, 'T30', 'Grooming medis', 8, 2),
(33, 'T31', 'Deworming', 8, 1),
(34, 'T32', 'Ektoparasit control', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `idpemilik` int NOT NULL,
  `no_wa` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `iduser` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`idpemilik`, `no_wa`, `alamat`, `iduser`) VALUES
(1, '123456', 'jl. jalan2', 15),
(5, '1', 'jl. 1', 23),
(6, '23', 'jl. 23', 24),
(7, '123456', 'jl. 123456', 26),
(8, '12345', 'jl. 12345', 27),
(9, '123456', 'jl. 123456', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `idpet` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `warna_tanda` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idpemilik` int NOT NULL,
  `idras_hewan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`idpet`, `nama`, `tanggal_lahir`, `warna_tanda`, `jenis_kelamin`, `idpemilik`, `idras_hewan`) VALUES
(1, 'Zebra', '2003-03-03', 'hitam putih', 'J', 1, 16),
(2, 'kucing', '2025-09-25', 'putih', 'J', 5, 5),
(3, 'lumba-lumba', '2025-10-01', 'pink', 'L', 8, 17),
(4, 'oren', '2024-07-10', 'Biru', 'B', 9, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ras_hewan`
--

CREATE TABLE `ras_hewan` (
  `idras_hewan` int NOT NULL,
  `nama_ras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idjenis_hewan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ras_hewan`
--

INSERT INTO `ras_hewan` (`idras_hewan`, `nama_ras`, `idjenis_hewan`) VALUES
(1, 'Golden Retriever', 1),
(2, 'Labrador Retriever', 1),
(3, 'German Shepherd', 1),
(4, 'Bulldog (English, French)', 1),
(5, 'Poodle (Toy, Miniature, Standard)', 1),
(6, 'Beagle', 1),
(7, 'Siberian Husky', 1),
(8, 'Shih Tzu', 1),
(9, 'Dachshund', 1),
(10, 'Chihuahua', 1),
(11, 'Persia', 2),
(12, 'Maine Coon', 2),
(13, 'Siamese', 2),
(14, 'Bengal', 2),
(15, 'Sphynx', 2),
(16, 'Scottish Fold', 2),
(17, 'British Shorthair', 2),
(18, 'Anggora', 2),
(19, 'Domestic Shorthair (kampung)', 2),
(20, 'Ragdoll', 2),
(21, 'Holland Lop', 3),
(22, 'Netherland Dwarf', 3),
(23, 'Flemish Giant', 3),
(24, 'Lionhead', 3),
(25, 'Rex', 3),
(26, 'Angora Rabbit', 3),
(27, 'Mini Lop', 3),
(28, 'Lovebird (Agapornis sp.)', 4),
(29, 'Kakatua (Cockatoo)', 4),
(30, 'Parrot / Nuri (Macaw, African Grey, Amazon Parrot)', 4),
(31, 'Kenari (Serinus canaria)', 4),
(32, 'Merpati (Columba livia)', 4),
(33, 'Parkit (Budgerigar / Melopsittacus undulatus)', 4),
(34, 'Jalak (Sturnus sp.)', 4),
(35, 'Kura-kura Sulcata (African spurred tortoise)', 5),
(36, 'Red-Eared Slider (Trachemys scripta elegans)', 5),
(37, 'Leopard Gecko', 5),
(38, 'Iguana hijau', 5),
(39, 'Ball Python', 5),
(40, 'Corn Snake', 5),
(41, 'Hamster (Syrian, Roborovski, Campbell, Winter White)', 6),
(42, 'Guinea Pig (Abyssinian, Peruvian, American Shorthair)', 6),
(43, 'Gerbil', 6),
(44, 'Chinchilla', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `idrekam_medis` int NOT NULL,
  `idreservasi_dokter` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `anamnesa` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `temuan_klinis` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diagnosa` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dokter_pemeriksa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`idrekam_medis`, `idreservasi_dokter`, `created_at`, `anamnesa`, `temuan_klinis`, `diagnosa`, `dokter_pemeriksa`) VALUES
(1, 4, '2025-09-19 07:39:49', 'aman', 'aman', 'aman', 7),
(5, 2, '2025-09-19 07:59:38', 'p', 'p', 'p', 7),
(8, 7, '2025-09-19 09:10:36', 'tes', 'tes', 'tes', 7),
(9, 8, '2025-09-26 06:44:45', 'apapun', 'apapun', 'puan', 7),
(10, 10, '2025-09-26 09:19:11', 'p', 'p', 'p', 7),
(11, 11, '2025-10-07 04:09:08', 'Susah makan', 'Susah tidur', 'Stres', 7);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int NOT NULL,
  `nama_role` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `nama_role`) VALUES
(1, 'Administrator'),
(2, 'Dokter'),
(3, 'Perawat'),
(4, 'Resepsionis'),
(5, 'Pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `idrole_user` int NOT NULL,
  `iduser` bigint NOT NULL,
  `idrole` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`idrole_user`, `iduser`, `idrole`, `status`) VALUES
(1, 6, 1, 1),
(2, 7, 3, 1),
(6, 10, 4, 1),
(7, 15, 5, 1),
(20, 43, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temu_dokter`
--

CREATE TABLE `temu_dokter` (
  `idreservasi_dokter` int NOT NULL,
  `no_urut` int DEFAULT NULL,
  `waktu_daftar` timestamp NULL DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idpet` int NOT NULL,
  `idrole_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temu_dokter`
--

INSERT INTO `temu_dokter` (`idreservasi_dokter`, `no_urut`, `waktu_daftar`, `status`, `idpet`, `idrole_user`) VALUES
(1, 1, '2025-09-12 14:13:48', '1', 1, 2),
(2, 1, '2025-09-16 03:03:46', '1', 1, 2),
(3, 1, '2025-09-19 07:10:30', '1', 1, 2),
(4, 2, '2025-09-19 07:10:33', '1', 1, 2),
(7, 5, '2025-09-19 08:21:40', '2', 1, 2),
(8, 6, '2025-09-19 08:21:45', '1', 1, 2),
(9, 1, '2025-09-26 08:11:12', '0', 1, 2),
(10, 2, '2025-09-26 09:07:33', '1', 2, 2),
(11, 1, '2025-10-07 04:07:46', '2', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` bigint NOT NULL,
  `nama` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `email`, `password`) VALUES
(6, 'Admin', 'admin@mail.com', '$2y$12$zlMSWspC3N7Qq4pfTK9Qae3u905vbH2gMg3fdnPV0UX6jH9cOHlXS'),
(7, 'Perawat', 'perawat@mail.com', '$2y$12$gNE88xHXps3afv1mJsnaUeo.MJy0IUM/cZQWi6qJvC2r0hJDZV16e'),
(8, 'admin5', 'admin5@mail.com', '$2y$12$hNdZvjsrksR7I.CJ0rSOKezES12VfwtvJc2wEP5dbeBFxu839Cmv6'),
(9, 'admin3', 'admin3@mail.com', '$2y$10$H0hOiUk40MqxmiSriBXAr.XqB0GATV5JMYaJxussvCijjYjHiFfx2'),
(10, 'Resepsionis', 'resepsionis@mail.com', '$2y$12$vSUqWW6SYUJUuqJtebCPA.JDgMkpBMs.EgBCZ5SHUdSi8IY2aEPUa'),
(15, 'Pemilik', 'pemilik@mail.com', '$2y$12$15JEOiPzFd.51fFnExAieOCQhR8wvpWcOryXyQTHnYcPRuzh5psu6'),
(23, 'p', 'p@mail.com', '$2y$10$55ojkPbuhUwgdVlpOKROWej1KW7.JkDjHNbsP46Uemi/6xaxVFza6'),
(24, 'kuda', 'kuda@mail.com', '$2y$10$VDWoI3UWsRMHUy78Tn4vnur4wHozpPQChpbxYVMnU8nZCHmqDSwEy'),
(25, 'perawat1', 'perawat1@mail.com', '$2y$12$YW5vJE/CiBlg1AFl8.WYYu8k4O3nbKgvpfkXm/ph2Bh7iPe3Dxrgy'),
(26, 'pemilik3', 'pemilik3@mail.com', '$2y$12$e3UrjX5ZULG2i9s5nJJI6.xELDnWm6.NZTet/i46A9sZ.bjw5LO7m'),
(27, 'pe', 'pe@gmail.com', '$2y$10$2dgcomgx2P.RCa5HK5APIOEUPdfUQuEbMIHM0VhwtPesUSCujIsAO'),
(29, 'adil', 'adil@mail.com', '$2y$12$eRJ5wB8YtxAUtsZMoTpNTuBeN8LaNgRJ3AnfLOxbktgjXEeHkUKD6'),
(43, 'Dokter', 'dokter@mail.com', '$2y$12$7p4laWeRjUfKPGsO1DZwQ.wcJfr8Z7/7zY/oVvwcMcMa2MCH/kJLy'),
(45, 'ar-elfahmi', 'elfahmi@mail.com', '$2y$12$H1Ah7DN4uAt4wW2QFdCAhuBjP5NwWdXKkhw/YOuxj6Xb9lWde11bO'),
(47, 'thariq', 'thariq@mail.com', '$2y$12$THNlZvmU7Q.wQXOHpTP45u4cjhSSlkK9rkDvS5lyP2.3bmaG1BJgi'),
(48, 'habib', 'habib@mail.com', '$2y$12$srJQlVh3SPKte6DS8h8hEuRn/gQhSwq9ynq3Ouc/csPPdF459SRhm'),
(49, 'farel', 'farel@mail.com', '$2y$12$X.xtIxsC0Pa4tAZzwtNBrezfcBwdsz4XoDDnU9tcgSTBO5J4//MOm'),
(50, 'rozan', 'rozan@mail.com', '$2y$12$pfROo2IfFgJzvYdOKnigmurxJNo6ZmTGIXJ6heW7jPzzCGK3lZpky'),
(51, 'fahmi', 'fahmi@mail.com', '$2y$12$amXNMraNwoR4DJvfjgS1Ce/pk6XIFQ11H3h4wo6OtcU4RAKHEco9.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_rekam_medis`
--
ALTER TABLE `detail_rekam_medis`
  ADD PRIMARY KEY (`iddetail_rekam_medis`),
  ADD KEY `fk_detail_rekam_medis_rekam_medis1_idx` (`idrekam_medis`),
  ADD KEY `idkode_tindakan_terapi` (`idkode_tindakan_terapi`);

--
-- Indexes for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  ADD PRIMARY KEY (`idjenis_hewan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `kategori_klinis`
--
ALTER TABLE `kategori_klinis`
  ADD PRIMARY KEY (`idkategori_klinis`);

--
-- Indexes for table `kode_tindakan_terapi`
--
ALTER TABLE `kode_tindakan_terapi`
  ADD PRIMARY KEY (`idkode_tindakan_terapi`),
  ADD KEY `fk_kode_tindakan_terapi_kategori1_idx` (`idkategori`),
  ADD KEY `fk_kode_tindakan_terapi_kategori_klinis1_idx` (`idkategori_klinis`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`idpemilik`),
  ADD KEY `fk_pemilik_user1_idx` (`iduser`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`idpet`),
  ADD KEY `fk_pet_pemilik1_idx` (`idpemilik`),
  ADD KEY `fk_pet_ras_hewan1_idx` (`idras_hewan`);

--
-- Indexes for table `ras_hewan`
--
ALTER TABLE `ras_hewan`
  ADD PRIMARY KEY (`idras_hewan`),
  ADD KEY `fk_ras_hewan_jenis_hewan1_idx` (`idjenis_hewan`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`idrekam_medis`),
  ADD KEY `fk_rekam_medis_temu_dokter` (`idreservasi_dokter`),
  ADD KEY `fk_rekam_medis_dokter` (`dokter_pemeriksa`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`idrole_user`),
  ADD KEY `fk_role_user_user_idx` (`iduser`),
  ADD KEY `fk_role_user_role1_idx` (`idrole`);

--
-- Indexes for table `temu_dokter`
--
ALTER TABLE `temu_dokter`
  ADD PRIMARY KEY (`idreservasi_dokter`),
  ADD KEY `idpet` (`idpet`),
  ADD KEY `idrole_user` (`idrole_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_rekam_medis`
--
ALTER TABLE `detail_rekam_medis`
  MODIFY `iddetail_rekam_medis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  MODIFY `idjenis_hewan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kode_tindakan_terapi`
--
ALTER TABLE `kode_tindakan_terapi`
  MODIFY `idkode_tindakan_terapi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `idpemilik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `idpet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ras_hewan`
--
ALTER TABLE `ras_hewan`
  MODIFY `idras_hewan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `idrekam_medis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `idrole_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `temu_dokter`
--
ALTER TABLE `temu_dokter`
  MODIFY `idreservasi_dokter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_rekam_medis`
--
ALTER TABLE `detail_rekam_medis`
  ADD CONSTRAINT `detail_rekam_medis_ibfk_1` FOREIGN KEY (`idkode_tindakan_terapi`) REFERENCES `kode_tindakan_terapi` (`idkode_tindakan_terapi`),
  ADD CONSTRAINT `fk_detail_rekam_medis_rekam_medis1` FOREIGN KEY (`idrekam_medis`) REFERENCES `rekam_medis` (`idrekam_medis`);

--
-- Constraints for table `kode_tindakan_terapi`
--
ALTER TABLE `kode_tindakan_terapi`
  ADD CONSTRAINT `fk_kode_tindakan_terapi_kategori1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `fk_kode_tindakan_terapi_kategori_klinis1` FOREIGN KEY (`idkategori_klinis`) REFERENCES `kategori_klinis` (`idkategori_klinis`);

--
-- Constraints for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `fk_pemilik_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_pet_pemilik1` FOREIGN KEY (`idpemilik`) REFERENCES `pemilik` (`idpemilik`),
  ADD CONSTRAINT `fk_pet_ras_hewan1` FOREIGN KEY (`idras_hewan`) REFERENCES `ras_hewan` (`idras_hewan`);

--
-- Constraints for table `ras_hewan`
--
ALTER TABLE `ras_hewan`
  ADD CONSTRAINT `fk_ras_hewan_jenis_hewan1` FOREIGN KEY (`idjenis_hewan`) REFERENCES `jenis_hewan` (`idjenis_hewan`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_rekam_medis_dokter` FOREIGN KEY (`dokter_pemeriksa`) REFERENCES `role_user` (`idrole_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekam_medis_temu_dokter` FOREIGN KEY (`idreservasi_dokter`) REFERENCES `temu_dokter` (`idreservasi_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_role_user_role1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`),
  ADD CONSTRAINT `fk_role_user_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `temu_dokter`
--
ALTER TABLE `temu_dokter`
  ADD CONSTRAINT `temu_dokter_ibfk_1` FOREIGN KEY (`idpet`) REFERENCES `pet` (`idpet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temu_dokter_ibfk_2` FOREIGN KEY (`idrole_user`) REFERENCES `role_user` (`idrole_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
