-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 03:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbooklpg1`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbooks`
--

CREATE TABLE `guestbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `jammasuk` time DEFAULT NULL,
  `jamkeluar` time DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guestbooks`
--

INSERT INTO `guestbooks` (`id`, `name`, `address`, `instansi`, `jumlah`, `tujuan`, `keperluan`, `email`, `status`, `jammasuk`, `jamkeluar`, `phone`, `sign`, `message`, `kep`, `feedback1`, `created_at`, `updated_at`) VALUES
(2, 'Masyitah Ayuning Setyo', 'Kota Padang', 'BPS Provinsi Sumatera Barat', 1, 'Keperluan bertemu Kepala BPS Provinsi', 'Mencari Publikasi', '221710086@stis.ac.id', 1, '11:12:00', '14:17:44', '081273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161c5490aeb834.png', NULL, '10', 'Sudah Bagus', '2022-01-06 04:14:03', '2021-12-29 03:58:12'),
(3, 'Syifa Qotrunnada', 'Langkapura, Bandar Lampung', 'Direktorat Jendral Pajak Bengkulu Lampung', 2, 'Pelayanan Statistik Terpadu', 'Mencari Publikasi', 'syifa@gmail.com', 1, '11:16:00', '13:18:06', '081234523487', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161c549cd1a797.png', NULL, '8', 'Sudah Bagus', '2022-01-05 04:17:20', '2021-12-29 03:57:55'),
(4, 'Fadheel Wisnu', 'Bilabong Jaya', 'BPS Kabupaten Waykanan', 1, 'Keperluan berkaitan Statistik Produksi', 'AB Mencari Publikasi', 'fadheel@stis.ac.id', 1, '11:18:00', '11:59:38', '089777171712', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161c54a2977bf3.png', NULL, '7', 'cukup', '2022-01-04 04:18:49', '2021-12-29 03:58:33'),
(5, 'Meiru Panca Rezki', 'Lungsir', 'BPS Lampung Barat', 1, 'Keperluan berkaitan Statistik Sosial', 'Menemui pak Mas\'ud', 'Meiru@stis.ac.id', 1, '11:18:00', '12:52:38', '081299879837', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161c54a7323418.png', NULL, '10', 'Sudah Bagus', '2022-01-03 04:20:05', '2021-12-29 03:54:13'),
(6, 'Wahyu Prastowo', 'Pringsewu', 'BPS Kabupaten Pringsewu', 1, 'Keperluan berkaitan Statistik Neraca', 'Diskusi terkait PDRB Kab Pringsewu', '221710086@stis.ac.id', 1, '11:24:00', '11:34:12', '089777171712', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161cd34d870891.png', NULL, '9', 'Sudah Bagus', '2022-01-03 04:26:03', '2021-12-30 04:34:12'),
(7, 'Ikbal Mukti Pratama', 'Gading rejo, pesawaran', 'BPS Kabupten Pesawaraan', 2, 'Keperluan berkaitan Bagian Umum', 'Perjadin, Kepegawaian', '--', 2, '11:28:00', '16:00:00', '081273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161cd35a9aec68.png', 'Auto Checkout', NULL, NULL, '2022-01-04 04:29:30', '2021-12-30 07:34:39'),
(8, 'Putri Tareka Navasya', 'Gunung Terang Bandar Lampung', 'BPS Kota Bandar Lampung', 1, 'Keperluan berkaitan Statistik Produksi', 'Mencari Publikasi 1', 'puyey@gmail.com', 1, '11:29:00', '12:34:34', '089777171712', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161cd35f170b78.png', NULL, '8', 'cukup', '2022-01-03 04:30:41', '2021-12-30 07:22:05'),
(9, 'Desiyanti Yusuf', 'Kota Bumu', 'BPS Kabupaten Lampung Utara', 1, 'Keperluan berkaitan Statistik Neraca', 'Diskusi terkait PDRB', 'desi@stis.ac.id', 2, '14:26:00', '16:00:00', '081293847563', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161cd5fa82a5f7.png', 'Auto Checkout', NULL, NULL, '2021-12-30 07:28:40', '2021-12-30 07:34:18'),
(10, 'Viky Wijaya', 'Kota Bumu', 'BPS Kabupaten Lampung Utara', 1, 'Keperluan berkaitan Statistik Neraca', 'Diskusi terkait PDRB', 'desi@stis.ac.id', 2, '14:26:00', '16:00:00', '081293847563', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161cd5fa82a5f7.png', NULL, '7', 'Baik', '2022-01-04 07:28:40', '2021-12-30 07:34:18'),
(11, 'Johan Darmawan', 'Kota Metro', 'BPS Lampung Timur', 1, 'Keperluan bertemu Kepala BPS Provinsi', 'Koordinasi mengenai Sensus Penduduk', 'johan@gmail.com', 1, '07:38:00', '10:13:11', '081273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d63a3db7fd4.png', NULL, '10', 'Sudan baik', '2022-01-06 00:39:30', '2022-01-07 03:13:11'),
(12, 'Zaza Yuda Perwira', 'Bilabong Jaya222', 'BPS Provinsi Lampung 1', 2, 'Keperluan berkaitan Statistik Produksi', 'Koordinasi mengenai Sensus Penduduk', 'zazayudaperwira93@gmail.com', 1, '09:32:00', '11:33:31', '081273341443111', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d654e9d46e7.png', NULL, '10', 'PUAS', '2022-01-06 02:33:14', '2022-01-07 04:33:31'),
(13, 'ZAZAZAZA', 'JAKARTA', 'STIS', 1, 'Keperluan berkaitan Statistik Sosial', 'ABC', '-', 2, '09:41:00', '16:00:00', '083476372322', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d657306bc56.png', 'Auto Checkout', NULL, NULL, '2022-01-06 02:42:58', '2022-01-07 07:37:27'),
(14, 'Zaza Yuda Perwira', 'Darussalam Street, Block F1 Number 4, Bilabong Jaya Residence, Langkapura', 'Polstat STIS', 5, 'Keperluan berkaitan Statistik Produksi', 'Abc', '221710086@stis.ac.id', 2, '09:45:00', '16:00:00', '+6281273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d65c84c1c95.png', 'Auto Checkout', NULL, NULL, '2022-02-06 03:05:41', '2022-01-07 07:37:27'),
(15, 'Zaza Yuda Perwira', 'Darussalam Street, Block F1 Number 4, Bilabong Jaya Residence, Langkapura', 'Polstat STIS', 2, 'Keperluan berkaitan Statistik Distribusi', 'Ancd', '221710086@stis.ac.id', 2, '10:13:00', '16:00:00', '+6281273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d65e81c4445.png', 'Auto Checkout', NULL, NULL, '2022-01-06 03:14:09', '2022-01-07 07:37:27'),
(16, 'Zaza Yuda', 'Darussalam Street, Block F1 Number 4, Bilabong Jaya Residence, Langkapura', 'Polstat STIS', 2, 'Keperluan berkaitan Statistik Neraca', 'Abc', '-', 2, '11:23:00', '16:00:00', '+6281273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d66edc63efb.png', 'Auto Checkout', NULL, NULL, '2022-02-06 04:23:57', '2022-01-07 07:37:27'),
(17, 'Asasasa', 'Darussalam Street, Block F1 Number 4, Bilabong Jaya Residence, Langkapura', 'Qeqeqew', 1, 'Pilih...', 'A hah ka', 'Jjj', 2, '15:32:00', '16:00:00', '6281273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d6a949b75a9.png', 'Auto Checkout', NULL, NULL, '2022-01-06 08:33:16', '2022-01-07 07:37:27'),
(18, 'Zaza yuda perwira', 'Langkapura', 'BPS Provinsi Lampung', 1, 'Keperluan berkaitan Statistik Produksi', 'ST2023', 'Zaza@stis.ac.id', 2, '10:04:00', '16:00:00', '081213134564', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7ade0a898a.png', 'Auto Checkout', NULL, NULL, '2022-01-07 03:05:04', '2022-01-07 07:37:27'),
(19, 'Zaza Yuda Perwira', 'Darussalam Street, Block F1 Number 4, Bilabong Jaya Residence, Langkapura', 'Polstat STIS', 1, 'Pelayanan Statistik Terpadu', 'Abc', '221710086@stis.ac.id', 2, '10:37:00', '16:00:00', '+6281273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7b69b247ef.png', 'Auto Checkout', NULL, NULL, '2022-01-07 03:42:20', '2022-01-07 07:37:27'),
(20, 'Syifa Qotrunnada', 'Bilabong Jaya 1', 'Direktorat Jendral Pajak Bengkulu Lampung', 3, 'Keperluan berkaitan Statistik Neraca', 'Koordinasi mengenai Sensus Penduduk', 'syifa@gmail.com', 2, '10:49:00', '16:00:00', '081273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7b8716d0e8png', 'Auto Checkout', NULL, NULL, '2022-01-07 03:50:09', '2022-01-07 07:37:27'),
(21, 'Zaza Yuda Perwira', 'Bilabong Jaya', 'Direktorat Jendral Pajak Bengkulu Lampung', 2, 'Pelayanan Statistik Terpadu', 'AB Mencari Publikasi', 'syifa@gmail.com', 2, '10:51:00', '16:00:00', '081273341443111', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7b8e43be59.png', 'Auto Checkout', NULL, NULL, '2022-01-07 03:52:04', '2022-01-07 07:37:27'),
(22, 'Meiru Panca Rezki', 'Langkapura, Bandar Lampung', 'BPS Provinsi Lampung 1', 2, 'Pelayanan Statistik Terpadu', 'Mencari Publikasi 1', 'zazayudaperwiara93@gmail.com', 2, '11:10:00', '16:00:00', '08127334143', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7bd36e1b98.png', 'Auto Checkout', NULL, NULL, '2022-01-07 04:10:31', '2022-01-07 07:37:27'),
(23, 'Meiru Panca Rezki', 'Langkapura, Bandar Lampung', 'BPS Provinsi Lampung 1', 2, 'Pelayanan Statistik Terpadu', 'Mencari Publikasi 1', 'zazayudaperwiara93@gmail.com', 2, '11:10:00', '16:00:00', '08127334143', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7bd83a2488.png', 'Auto Checkout', NULL, NULL, '2022-01-07 04:11:47', '2022-01-07 07:37:27'),
(24, 'Meiru Panca Rezki', 'Langkapura, Bandar Lampung', 'Direktorat Jendral Pajak Bengkulu Lampung', 23, 'Keperluan bertemu Kepala BPS Provinsi', 'Mencari Publikasi', 'zazayudaperwiara93@gmail.com', 2, '11:15:00', '16:00:00', '0812733414431', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7be7d80d59.png', 'Auto Checkout', NULL, NULL, '2022-01-07 04:15:57', '2022-01-07 07:37:27'),
(25, 'Jua', 'Jalan ABC', 'Dinas XYZ', 1, 'Keperluan berkaitan Statistik Neraca', 'Diskusi tentang PDRB', 'jua@gmail.com', 1, '14:19:00', '14:35:10', '081234567890', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7e9d378040.png', NULL, '4', 'Yang ditemui sedang perjalanan dinas', '2022-01-07 07:20:54', '2022-01-07 07:35:10'),
(26, 'Fadheel', 'SUKABUMI', 'STIS', 1, 'Pelayanan Statistik Terpadu', 'Meminta data lahan Tumbuhan Pinang', 'fdlwsnutmo@gmail.com', 1, '14:18:00', '14:34:00', '085788820753', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161d7ec5c2660b.png', NULL, '9', 'Memuaskan pelayanannya', '2022-01-07 07:31:40', '2022-01-07 07:34:00'),
(27, 'Fadheel Wisnu', 'Bilabong Jaya 1', 'Direktorat Jendral Pajak Bengkulu Lampung', 2, 'Bagian Umum', 'AB Mencari Publikasi', 'syifa@gmail.com', 0, '14:21:00', NULL, '089777171712', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161e12498d13b6.png', NULL, NULL, NULL, '2022-01-14 07:22:03', '2022-01-14 07:22:03'),
(28, 'Aisyah Salsabila', 'Bilabong Jaya222', 'Direktorat Jendral Pajak Bengkulu Lampung', 2, 'Fungsi Statistik Sosial', 'Koordinasi mengenai Sensus Penduduk', 'zazayudaperwiara93@gmail.com', 0, '14:46:00', NULL, '089777171712', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161e12aa8ac191.png', NULL, NULL, NULL, '2022-01-14 07:47:53', '2022-01-14 07:47:53'),
(29, 'Zaza Yuda Perwira', 'A Bilabong Jaya', 'BPS Provinsi Lampung 1', 2, 'Keperluan bertemu Kepala BPS Provinsi', 'AB Mencari Publikasi', 'zazayudaperwira93@gmail.com', 0, '14:48:00', NULL, '081273341443', 'E:\\xampp\\htdocs\\bukutamu-bps-lpg\\public\\/images/ttd/ttd161e12af44bb6f.png', NULL, NULL, NULL, '2022-01-14 07:49:08', '2022-01-14 07:49:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbooks`
--
ALTER TABLE `guestbooks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbooks`
--
ALTER TABLE `guestbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
