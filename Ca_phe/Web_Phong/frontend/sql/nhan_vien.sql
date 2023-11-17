-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 08:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quancaphe`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` varchar(32) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `ngaysinh` varchar(32) NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `anh_nv` varchar(255) NOT NULL,
  `vitri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `hoten`, `email`, `dienthoai`, `ngaysinh`, `gioitinh`, `diachi`, `anh_nv`, `vitri`) VALUES
('', 'Nguyễn Văn Đông', 'dong2222@gmail.com', '0788456982', '', 'nam', 'Hải Dương', 'nv1.jpg', 'Pha chế'),
('NV001', 'Vu Van Thang', '(khong)', '0986323307', '24/04', 'Nam', '255 Hang Kenh', 'nv1.jpg', 'pha chế'),
('NV002', 'Duong Thi Kim Trung', '(khong)', '0936623239', '27/10', 'Nu', '255 Hang Kenh', 'nv1.jpg', 'thu ngân');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
