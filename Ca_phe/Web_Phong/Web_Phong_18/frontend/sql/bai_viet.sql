-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 08:02 AM
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
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id_baiviet` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `anh_dai_dien` text NOT NULL,
  `noi_dung` text NOT NULL,
  `mo_ta_ngan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bai_viet`
--

INSERT INTO `bai_viet` (`id_baiviet`, `tieu_de`, `anh_dai_dien`, `noi_dung`, `mo_ta_ngan`) VALUES
(1, 'Lời giới thiệu Mộc Cafe', 'loi-gioi-thieu.jpg', 'NGÀY HÈ NÓNG BỨC HÃY ĐẾN MỘC COFFEE&TEA\r\n🌱🌱 MỘC COFFEE&TEA – quán cafe mang phong cách đơn giản. mộc mạc, thư giãn và dễ chịu. Đến với MỘC bạn sẽ có một không gian thoáng mát và thư giãn. Bạn có thể lựa chọn không gian trong phòng với điều hòa mát lạnh, hay tụ tập bạn bè với không gian ngoài trời thoáng mát, còn nếu bạn là người thích ở nhà tránh nóng thì đừng lo MỘC sẽ giao hàng đến tận nơi cho bạn.\r\n🥤🌭 MENU quán vô cùng phong phú với các đồ uống thanh mát và những chiếc bánh mì thơm ngon. Đồ ăn, thức uống được chế biến đảm bảo với nguồn thực phẩm chất lượng giúp người dùng yên tâm khi sử dụng sản phẩm của quán.\r\n🍴💰 NGON – RẺ. Bên cạnh đồ ăn, thức uống chất lượng, MỘC coffee&tea còn thỏa mãn ví tiền của các bạn sinh viên với mức giá vô cùng “hạt rẻ”, giúp các bạn lấp đầy chiếc bụng đói mà không sợ đau ví. Đến với MỘC coffee&tea, việc của bạn là đặt đồ và thư giãn còn lại hãy để MỘC lo.\r\n👉 Còn chần chừ gì nữa, hãy đến MỘC coffee&tea hoặc nhấc máy đặt hàng ngay hôm nay nhé!', 'Một bài viết ngắn giới thiệu về cửa hàng Mộc Cafe của chúng tôi, cảm ơn bạn đọc đã xem'),
(2, 'review Moc Cafe', 'review-moc.jpg', 'Mộc 𝐜𝐨𝐟𝐟𝐞𝐞 – 𝐂𝐚𝐟𝐞 𝐦𝐚𝐧𝐠 𝐩𝐡𝐨𝐧𝐠 𝐜𝐚́𝐜𝐡 𝐇𝐚̀𝐧 𝐐𝐮𝐨̂́𝐜 𝐜𝐡𝐨 𝐭𝐞𝐚𝐦 𝐇𝐚̀ Đ𝐨̂𝐧𝐠\r\n⏰ : 7h-22h\r\n💰 : 25k-55k\r\n———————————–\r\n– Quán có 2 mặt tiền rộng rãi, nhiều góc sống ảo với decor xinh mang phong cách Hàn Quốc, có chỗ ngồi cả trong nhà và ngoài trời. Trong nhà có cửa kính đón cực nhiều ánh sáng mặt trời rất phù hợp cho việc học bài và check in. Không gian ngoài trời cực kỳ thoáng đãng với nhiều cây xanh,cứ giơ máy lên là có ảnh đẹp mang về nha.\r\n– Về menu của quán thì khá đa dạng từ café, trà sữa. trà hoa quả,… cho tới các loại bánh. Mình có gọi Trà hạnh nhân kem cheese và rất ấn tượng vì nó có vị béo ngậy ngậy thơm thơm siu ngon recommend mọi người nên thử nha, bạn đi cùng mình gọi Hương nhiệt đới và cà phê kem muối cũng ngon và thanh mát không kém, đây cũng là một trong những điểm cộng rất lớn để quán trở thành điểm đến thân quen của mình.\r\n– Các bạn nhân viên nhiệt tình, nhanh nhẹn. và thân thiện.\r\nĐánh giá: 9/10 điểm', 'Một bài review của khách hàng về Mộc Cafe. Cảm ơn các bạn đã quan tâm và tin tưởng sử dụng Cafe ở Mộc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
