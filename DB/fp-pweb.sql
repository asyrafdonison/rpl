-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2023 at 05:06 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp-pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int NOT NULL,
  `id_tipe` int NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_km` int NOT NULL,
  `id_kelas` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_bus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `id_tipe`, `jumlah_kursi`, `harga_km`, `id_kelas`, `created_at`, `updated_at`, `nama_bus`) VALUES
(1, 3, 56, 4500, 2, '2023-07-02 21:11:49', '2023-07-02 21:11:49', 'Laksana Legacy SR2'),
(2, 2, 35, 2400, 1, '2023-07-02 21:11:49', '2023-07-02 21:11:49', 'Hino R260');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `id_tujuan` int NOT NULL,
  `id_bus` int NOT NULL,
  `harga` int DEFAULT NULL,
  `tanggal_keberangkatan` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_sampai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_tujuan`, `id_bus`, `harga`, `tanggal_keberangkatan`, `status`, `created_at`, `updated_at`, `tanggal_sampai`) VALUES
(1, 3, 1, 250000, '2023-07-02 11:30:00', 'dibuka', '2023-07-02 21:30:26', '2023-07-02 21:30:26', '2023-07-02 22:00:00'),
(2, 2, 2, 500000, '2023-07-07 16:15:18', 'dibuka', '2023-07-06 16:15:57', '2023-07-06 16:15:57', '2023-07-06 16:15:57'),
(3, 1, 1, 370000, '2023-07-08 08:00:00', 'ditutup', '2023-07-06 20:19:57', '2023-07-06 20:19:57', '2023-07-06 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi', '2023-07-02 21:04:09', '2023-07-02 21:04:09'),
(2, 'Ekslusif', '2023-07-02 21:04:09', '2023-07-02 21:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jadwal` int NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'pending'
) ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `id_user`, `id_jadwal`, `nama_penumpang`, `email`, `telepon`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 'Haikal Raditya Fadhilah', 'haikal.r.fadhilah@students.amikom.ac.id', '085155293299', '2023-07-06 20:12:23', '2023-07-06 20:12:23', 'pending'),
(2, 1, 2, 'Vania Retningtyas', 'vaniul@gmail.com', '089623461356', '2023-07-06 20:13:15', '2023-07-06 20:13:15', 'pending'),
(3, 1, 1, 'Sulthan Asyraf Donison', 'asyraf@gmail.com', '823489789357', '2023-07-06 20:15:31', '2023-07-06 20:15:31', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_bus`
--

CREATE TABLE `tipe_bus` (
  `id` int NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipe_bus`
--

INSERT INTO `tipe_bus` (`id`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Normal Deck', '2023-07-02 21:06:12', '2023-07-02 21:06:12'),
(2, 'High Deck', '2023-07-02 21:06:12', '2023-07-02 21:06:12'),
(3, 'Super High Decker', '2023-07-02 21:06:32', '2023-07-02 21:06:32'),
(4, 'High Decker Double Glass\r\n', '2023-07-02 21:06:32', '2023-07-02 21:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id` int NOT NULL,
  `jarak_tujuan` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_daerah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id`, `jarak_tujuan`, `created_at`, `updated_at`, `nama_daerah`) VALUES
(1, 180, '2023-07-02 20:07:43', '2023-07-02 20:07:43', 'Solo'),
(2, 240, '2023-07-02 20:07:43', '2023-07-02 20:07:43', 'Semarang'),
(3, 300, '2023-07-02 20:52:49', '2023-07-02 20:52:49', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Haikal Raditya Fadhilah', 'haikalrfadhilah', '17a1e77f556a5a48b728735ec80d2c27', '2023-07-02 20:16:24', '2023-07-02 20:16:24', 'user'),
(2, 'Vania Retnaningtyas', 'vaniul', 'fcb7e85e55e4fae902a1f7ee3ef58334', '2023-07-02 20:39:55', '2023-07-02 20:39:55', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tujuan` (`id_tujuan`),
  ADD KEY `id_bus` (`id_bus`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tipe_bus`
--
ALTER TABLE `tipe_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_bus`
--
ALTER TABLE `tipe_bus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_bus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
