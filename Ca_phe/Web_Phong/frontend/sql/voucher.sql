-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 11:06 PM
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
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `ma_sale` varchar(255) NOT NULL,
  `ten_uu_dai` varchar(255) NOT NULL,
  `gia_tri` text NOT NULL,
  `hsd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `ma_sale`, `ten_uu_dai`, `gia_tri`, `hsd`) VALUES
(1, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe', '20%', '2024-11-01'),
(2, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe', '20%', '2024-11-01'),
(3, 'LPSPKF59', 'Chào mừng đến Mộc Cafe', '10%', '2024-11-01'),
(4, 'DHDT0001', 'Khuyến mãi đơn hàng đầu tiên', '50%', '2024-11-01'),
(5, 'FREESHIP', 'Miễn phí giao hàng', '5%', '2024-11-01'),
(6, 'LKJDLGDS', 'Ưu đãi khách hàng mới', '10%', '2023-10-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
