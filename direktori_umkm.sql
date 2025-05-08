-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2025 at 02:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `direktori_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `provinsi_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id`, `nama`, `latitude`, `longitude`, `provinsi_id`) VALUES
(1, 'Kabupaten Bogor', -6.59444, 106.78917, 1),
(2, 'kabupaten Garut', -7.38333, 107.76667, 1),
(3, 'Naga Raya', 4.16667, 96.51667, 3),
(4, 'Serang', -6.110366, 106.163975, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_umkm`
--

CREATE TABLE `kategori_umkm` (
  `id` int NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_umkm`
--

INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES
(1, 'Kuliner'),
(2, 'Kecantikan'),
(3, 'Fashion'),
(4, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE `pembina` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keahlian` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`id`, `nama`, `gender`, `tgl_lahir`, `tmp_lahir`, `keahlian`) VALUES
(1, 'Riza', 'L', '2005-10-07', 'Bogor', 'Digital Marketing'),
(2, 'Lisa', 'P', '2005-05-13', 'Solo', 'Managemen Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ibukota` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `ibukota`, `latitude`, `longitude`) VALUES
(1, 'Jawa Barat', 'Bandung', -7.090911, 107.668887),
(2, 'Banten', 'Serang', 96.7493993, 106.0640179),
(3, 'Aceh', 'Banda Aceh', 4.695135, 96.7493993);

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modal` double DEFAULT NULL,
  `pemilik` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kabkota_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `kategori_umkm_id` int DEFAULT NULL,
  `pembina_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `nama`, `modal`, `pemilik`, `alamat`, `website`, `email`, `kabkota_id`, `rating`, `kategori_umkm_id`, `pembina_id`) VALUES
(13, 'kina cantik', 14000000, 'kina', 'jalan suka hati bogor', 'kinacantik.id', 'kina@gmail.com', 1, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(4, 'riza', 'admin@gmail.com', 'admin'),
(5, 'dika', 'dika@gmail.com', 'dika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabkota_id` (`kabkota_id`),
  ADD KEY `kategori_umkm_id` (`kategori_umkm_id`),
  ADD KEY `pembina_id` (`pembina_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD CONSTRAINT `kabkota_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`);

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_ibfk_1` FOREIGN KEY (`kabkota_id`) REFERENCES `kabkota` (`id`),
  ADD CONSTRAINT `umkm_ibfk_2` FOREIGN KEY (`kategori_umkm_id`) REFERENCES `kategori_umkm` (`id`),
  ADD CONSTRAINT `umkm_ibfk_3` FOREIGN KEY (`pembina_id`) REFERENCES `pembina` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
