-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL,
  `kompetensi_keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(2, 'XII RPL 1', 'REKAYASA PERANGKAT LUNAK'),
(3, 'XII RPL 2', 'REKAYASA PERANGKAT LUNAK');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_dibayar` varchar(8) DEFAULT NULL,
  `tahun_dibayar` varchar(4) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `id_siswa`, `id_spp`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `jumlah_bayar`) VALUES
(37, 3, 5, 2, NULL, 'Januari', NULL, NULL),
(38, 3, 5, 2, NULL, 'Februari', NULL, NULL),
(39, 3, 5, 2, NULL, 'Maret', NULL, NULL),
(40, 3, 5, 2, NULL, 'April', NULL, NULL),
(41, 3, 5, 2, NULL, 'Mei', NULL, NULL),
(42, 3, 5, 2, NULL, 'Juni', NULL, NULL),
(43, 3, 5, 2, NULL, 'Juli', NULL, 55000),
(44, 3, 5, 2, NULL, 'Agustus', NULL, NULL),
(45, 3, 5, 2, NULL, 'Septembe', NULL, NULL),
(46, 3, 5, 2, NULL, 'Oktober', NULL, NULL),
(47, 3, 5, 2, NULL, 'November', NULL, 45000),
(48, 3, 5, 2, NULL, 'Desember', NULL, NULL),
(49, 3, 5, 3, NULL, 'Januari', NULL, NULL),
(50, 3, 5, 3, NULL, 'Februari', NULL, NULL),
(51, 3, 5, 3, NULL, 'Maret', NULL, NULL),
(52, 3, 5, 3, NULL, 'April', NULL, NULL),
(53, 3, 5, 3, NULL, 'Mei', NULL, NULL),
(54, 3, 5, 3, NULL, 'Juni', NULL, NULL),
(55, 3, 5, 3, NULL, 'Juli', NULL, NULL),
(56, 3, 5, 3, NULL, 'Agustus', NULL, NULL),
(57, 3, 5, 3, NULL, 'Septembe', NULL, NULL),
(58, 3, 5, 3, NULL, 'Oktober', NULL, NULL),
(59, 3, 5, 3, NULL, 'November', NULL, NULL),
(60, 3, 5, 3, NULL, 'Desember', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_petugas` varchar(55) DEFAULT NULL,
  `no_hp_petugas` varchar(25) DEFAULT NULL,
  `alamat_petugas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `id_users`, `nama_petugas`, `no_hp_petugas`, `alamat_petugas`) VALUES
(3, 1, 'Pak Wahyu', '234234', 'Cibatu');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(8) DEFAULT NULL,
  `nama_siswa` varchar(35) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `no_telepon_siswa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_users`, `id_spp`, `id_kelas`, `nisn`, `nis`, `nama_siswa`, `alamat_siswa`, `no_telepon_siswa`) VALUES
(5, 11, 2, 2, '123456', '123456', 'Nurul', 'Garut', '345345');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(2, '2023', 55000),
(3, '2024', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `level` enum('Admin','Petugas','Siswa') DEFAULT NULL,
  `gambar` varchar(125) DEFAULT NULL,
  `remember_token` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`, `gambar`, `remember_token`) VALUES
(1, 'admin', '$2y$10$DaG4GiQ6XROcDZpb8ksY2.zmhStBhpfbOx8RQlpMP.01oxHGwJQ82', 'Admin', 'avatar4.png', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'petugas', '$2y$10$JnBxHCZazFiJrzWTIIhmJutgYllqwCDksB88rsndRYPW5/IcOT4kO', 'Petugas', NULL, NULL),
(3, 'siswa', '$2y$10$ksHUbudGCzfdbl1WTBV9K.yvqivrJrsUO7frAtpcLGQ5W/uQD1OFO', 'Siswa', NULL, NULL),
(11, '123456', '$2y$10$NGCshOc.oaSnTfMSszEuxePTnoiXNcm1mre1w4ohM936IsApr1Gwu', 'Siswa', 'avatar4.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_users`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_user` (`id_users`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
