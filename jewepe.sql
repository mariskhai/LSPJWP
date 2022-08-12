-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 10:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewepe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$rblJuMa4sfc6ixGeTqo40..B93usuRqSgyx49MQpHYpPOi5skVijW');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(15) NOT NULL,
  `namapeserta` varchar(35) NOT NULL,
  `dipilih` varchar(35) NOT NULL,
  `status` varchar(35) NOT NULL DEFAULT 'menunggu',
  `waktu` varchar(25) NOT NULL,
  `krs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `namapeserta`, `dipilih`, `status`, `waktu`, `krs`) VALUES
(1, 'user', 'C', 'Menunggu', '2022-07-22', 'jewepe/images/KRS.jpg'),
(3, '51418348', 'Java', 'Menunggu', '2022-07-22', ''),
(12, '51418348', 'C', 'Sudah Terverifikasi', '2022-07-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `namakursus` varchar(40) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `namakursus`, `waktu`) VALUES
(6, 'Java', '2022-07-15'),
(7, 'SQL', '2022-07-22'),
(8, 'C', '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `namakursus` varchar(40) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `lama` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `namakursus`, `keterangan`, `lama`) VALUES
(1, 'C', 'Pada kursus ini kalian akan diajarkan mengenai dasar-dasar mengenai bahasa pemograman C dan juga pada akhir krusus ini kalian akan diberikan project real mengenai penerapan bahasa pemograman C pada kehidupan nyata', 5),
(4, 'Java', 'Pada kursus ini akan diajarkan mengenai dasar-dasar mengenai bahasa pemograman java dimana pada kursus ini juga kalian akan diajarkan penerapan secara sederhana untuk pengaplikasian bahasa pemograman ini pada ruang lingkup IT', 7),
(5, 'SQL', 'Pada kursus SQL ini akan diajar mengenai dasar dasar mengenai basis data dan contoh dasar untuk pengaplikasiannya pada ruang lingkup pemograman', 10),
(6, 'PHP', 'Pada kursus ini akan diajarkan mengenai proses dasar untuk mempelajari bahasa pemograman php ini. Yuk buruan daftar ', 10),
(9, 'Ruby', 'dasar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama`, `kelas`, `password`, `status`) VALUES
(4, '51418348', '51418348', 'yaapasswor', '$2y$10$rhVe.ik7VYa6LOS5OdAJ1uCjZumGBIcKmeM93LFFnbLkbJ8wsuDTC', 'belum'),
(5, '1233333', 'David', 'David', '$2y$10$xIHdwX6PHuug7k3wa1LSn.57O8XGJb0gbmkaxDJrV1bTXeR3yKKq6', 'belum'),
(6, '123499', 'David Liong', 'David Lion', '$2y$10$hfz7H6.xuCsQ.xOzpOTQQ.L/JwdiLye0DUrzwSNg0s2T.KRmoYOYe', 'belum'),
(7, 'coba', 'coba', 'coba', '$2y$10$hCu84qYoUdhrUuVrDc9YUe0A.ajIG3AA.MaMmc4PeZzXbnbyx.84e', 'belum'),
(8, 'user', 'user', '4ia01', '$2y$10$XI7NJMcv88wy2b12EfFa3eQHVUel5B.DP2vJlxrstFshl6vuJVETK', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NPM` (`npm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
