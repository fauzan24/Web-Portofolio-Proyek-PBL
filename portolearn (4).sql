-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2026 at 10:44 AM
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
-- Database: `portolearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `id_projek` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `id_projek`, `id_user`) VALUES
(6, 'projek tersebut sudah sangat-sangat bagus sekali', 23, 25);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int NOT NULL,
  `id_projek` int NOT NULL,
  `id_user` int NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_projek`, `id_user`, `nilai`) VALUES
(6, 23, 25, 80);

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id_projek` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `anggota` varchar(255) NOT NULL,
  `link_file` varchar(255) NOT NULL,
  `link_yt` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_komentar` int DEFAULT NULL,
  `id_penilaian` int DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projek`
--

INSERT INTO `projek` (`id_projek`, `judul`, `semester`, `deskripsi`, `ketua`, `anggota`, `link_file`, `link_yt`, `foto`, `id_komentar`, `id_penilaian`, `id_user`) VALUES
(15, 'web pengelolaan sp', 'ganjil', 'aaaaaaaaaaaaaaaaa', 'fraews', 'afung', 'https://github.com/fauzan24/Portolearn.git', 'https://github.com/fauzan24/Portolearn.git', 'logo kelompok.jpg', NULL, NULL, NULL),
(16, 'web pengelolaan sp', 'ganjil', 'aaaaaaaaaaaaaaaaaaaaaa', 'muhammad adit', 'zaki simorangkir', 'https://github.com/fauzan24/Portolearn.git', 'https://github.com/fauzan24/Portolearn.git', 'logo.png', NULL, NULL, NULL),
(23, 'portofolio', 'ganjil', 'web portofolio proyek PBL ini berfungsi sebagai tempat untuk mahasiswa untuk menyimpan portofolio proyek PBL mereka', 'Fauzan Najib Ali', 'Ruben Andika Nababan, Luthfi Dwi Aprialdi', 'https://drive.google.com/drive/folders/1iXcLRpsMumRgAMbuBq77b0y1bFNe0-vQ?usp=drive_link', 'https://youtu.be/JYlkHRf5gW8?si=_HdRTRQB89hnn08z', 'Screenshot 2025-12-15 151046.png', NULL, NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan` enum('teknik elektro','teknik informatika','teknik mesin','manajemen bisnis') NOT NULL,
  `profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('mahasiswa','dosen','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `nim`, `jurusan`, `profil`, `role`) VALUES
(7, 'fauzan', 'admin', '123', '123', 'teknik elektro', '', 'admin'),
(11, 'Dwi Agung', 'Dwi', '123', '3312501063', 'teknik elektro', '', 'dosen'),
(18, 'Fauzan Najib Ali', '3312501078', '123', '3312501078', 'teknik informatika', '../gambar/user.png', 'mahasiswa'),
(19, 'Luthfi Dwi Aprialdi', '3312501077', '123', '3312501077', 'teknik mesin', '../gambar/user.png', 'mahasiswa'),
(20, 'Ruben Andika Nababan', '3312501076', '123', '3312501076', 'teknik elektro', '../gambar/user.png', 'mahasiswa'),
(23, 'arys', 'arys', '123', '331251055', 'teknik elektro', '../gambar/user.png', 'dosen'),
(25, 'zaky', 'zaky', '123', '3310501056', 'teknik elektro', '../gambar/dosen.jpeg', 'dosen'),
(26, 'Dimas Pratama', '3312501098', '123', '3312501098', 'manajemen bisnis', '../gambar/user.png', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_projek` (`id_projek`,`id_user`),
  ADD KEY `komentar_ibfk_2` (`id_user`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_projek` (`id_projek`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id_projek`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `id_penilaian` (`id_penilaian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id_projek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id_projek`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id_projek`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `projek`
--
ALTER TABLE `projek`
  ADD CONSTRAINT `projek_ibfk_2` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `projek_ibfk_3` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `projek_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
