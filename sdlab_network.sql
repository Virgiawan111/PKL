-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdlab_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `id_type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `id_documentation` int(11) NOT NULL,
  `id_maintenance` int(11) NOT NULL,
  `pictures_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `nama_perangkat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Selesai','Dalam Proses','Dijadwalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `nama_perangkat`, `tanggal`, `status`) VALUES
(1, 'router a', '2025-04-22', 'Dalam Proses'),
(2, 'router b', '2025-04-10', 'Selesai'),
(3, 'ROUTER E', '2025-04-16', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_progress`
--

CREATE TABLE `maintenance_progress` (
  `id_maintenance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divace` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `problems` text NOT NULL,
  `addnotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network_device`
--

CREATE TABLE `network_device` (
  `id_device` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `mac` int(11) DEFAULT NULL,
  `ip` int(11) DEFAULT NULL,
  `speed` int(11) NOT NULL,
  `ssid` int(11) DEFAULT NULL,
  `brand` int(11) NOT NULL,
  `notes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE `perangkat` (
  `id` int(11) NOT NULL,
  `nama_perangkat` varchar(100) NOT NULL,
  `mac_address` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `kecepatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perangkat2`
--

CREATE TABLE `perangkat2` (
  `id` int(11) NOT NULL,
  `nama_perangkat` varchar(100) NOT NULL,
  `mac_address` varchar(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `kecepatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `size` varchar(150) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'rendi', '$2y$10$sIT/wO.mSCIzWBhnykQFO.85XnMU3zgUzSYViXH2Zhr0jNCACdND.', '2025-04-21 04:20:48'),
(2, 'virgiawan', '$2y$10$AN6kr8UxROuuXm.BTib6NOZXw.oz6WdDJ9vFidQoTk7eDxjc/pAl2', '2025-04-22 04:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`id_documentation`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_progress`
--
ALTER TABLE `maintenance_progress`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `network_device`
--
ALTER TABLE `network_device`
  ADD PRIMARY KEY (`id_device`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat2`
--
ALTER TABLE `perangkat2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `id_documentation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maintenance_progress`
--
ALTER TABLE `maintenance_progress`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network_device`
--
ALTER TABLE `network_device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perangkat2`
--
ALTER TABLE `perangkat2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
