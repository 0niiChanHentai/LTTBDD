-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 02:04 PM
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
(2, 'review Moc Cafe', 'review-moc.jpg', 'Mộc 𝐜𝐨𝐟𝐟𝐞𝐞 – 𝐂𝐚𝐟𝐞 𝐦𝐚𝐧𝐠 𝐩𝐡𝐨𝐧𝐠 𝐜𝐚́𝐜𝐡 𝐇𝐚̀𝐧 𝐐𝐮𝐨̂́𝐜 𝐜𝐡𝐨 𝐭𝐞𝐚𝐦 𝐇𝐚̀ Đ𝐨̂𝐧𝐠\r\n⏰ : 7h-22h\r\n💰 : 25k-55k\r\n———————————–\r\n– Quán có 2 mặt tiền rộng rãi, nhiều góc sống ảo với decor xinh mang phong cách Hàn Quốc, có chỗ ngồi cả trong nhà và ngoài trời. Trong nhà có cửa kính đón cực nhiều ánh sáng mặt trời rất phù hợp cho việc học bài và check in. Không gian ngoài trời cực kỳ thoáng đãng với nhiều cây xanh,cứ giơ máy lên là có ảnh đẹp mang về nha.\r\n– Về menu của quán thì khá đa dạng từ café, trà sữa. trà hoa quả,… cho tới các loại bánh. Mình có gọi Trà hạnh nhân kem cheese và rất ấn tượng vì nó có vị béo ngậy ngậy thơm thơm siu ngon recommend mọi người nên thử nha, bạn đi cùng mình gọi Hương nhiệt đới và cà phê kem muối cũng ngon và thanh mát không kém, đây cũng là một trong những điểm cộng rất lớn để quán trở thành điểm đến thân quen của mình.\r\n– Các bạn nhân viên nhiệt tình, nhanh nhẹn. và thân thiện.\r\nĐánh giá: 9/10 điểm', 'Một bài review của khách hàng về Mộc Cafe. Cảm ơn các bạn đã quan tâm và tin tưởng sử dụng Cafe ở Mộc'),
(3, 'Các loại cà phê cơ bản', 'bv1.jpg', '1. Cà phê truyền thống\r\nCà phê truyền thống là thức uống không thể thiếu trong thực đơn đồ uống của hầu hết các quán cà phê tại Việt Nam nói riêng và trên thế giới nói chung. Khi nhắc đến cà phê truyền thống, đó chính là loại cà phê được “pha phin” trực tiếp hoặc pha sẵn rồi uống với đá. Loại cà phê được sử dụng cho hình thức pha chế này thường phải có vị đậm, đắng mạnh và ít chua mới hợp khẩu vị của người Việt. Do đó, với loại cà phê truyền thống này, Barista thường ưu tiên sử dụng hạt cà phê Robusta để làm nguyên liệu chính cho pha chế thay vì Arabica hay cà phê chồn quen thuộc. Để khử hết vị chua, những hạt Robusta được phơi khô dưới ánh nắng tự nhiên, sau đó rang đậm có phần hơi khét để đạt được mức độ đắng mong muốn.\r\n2. Cà phê Americano\r\nAmericano là một loại cà phê Mỹ có công thức pha chế giống với cà phê Espresso, tuy nhiên lượng nước nóng được pha loãng vào Espresso nhiều hơn bình thường. Do đó, tùy thuộc vào tỷ lệ giữa cà phê Espresso và lượng nước nóng bổ sung mà hương vị cuối cùng của cà phê sẽ bị ảnh hưởng. Ban đầu, Americano được tạo ra bằng cách đổ nước lên trên một shot cà phê Espresso. Về sau tại Úc đã sáng tạo nên một phiên bản mới hoàn toàn ngược lại với tên gọi Long Black: đổ một shot Espresso lên trên nước nóng hoặc nước lạnh, với mục đích giữ lại lớp kem vàng óng của Espresso, giúp món đồ uống thêm đẹp mắt và giống cà phê hơn.\r\n3. Cà phê Latte \r\nBản chất của cà phê Latte là sự dung hòa của cà phê Espresso và sữa. Latte được yêu thích bởi sự nhẹ nhàng, hương vị ngọt ngào được hòa quyện bởi sữa, cà phê và lớp bọt sữa mềm mịn, béo ngậy. Đặc biệt, Latte chỉ sử dụng lượng bọt sữa bằng nửa lượng sữa nóng để cho ra thành phẩm như ý nhất.\r\n4.Cà phê Espresso\r\nCó nguồn gốc từ nước Ý, cà phê Espresso được rang và pha chế bằng cách dùng nước nóng nén dưới điều kiện áp suất cao (9-10 bar) qua một thiết bị lọc bột cà phê được xay mịn. Nếu pha bằng phương pháp này, hương thơm của Espresso vẫn rất mạnh, mùi vị khá đắng và nồng đậm, đặc biệt là sự xuất hiện của lớp bọt crema màu nâu óng ánh trên bề mặt của tách cà phê. \r\n5. Cà phê Cappuccino\r\nCà phê Cappuccino có thành phần tương tự như Latte, bao gồm sữa nóng, espresso và bọt sữa với tỉ lệ đều nhau. Tuy nhiên khác với Latte, Cappuccino được pha chế theo thứ tự như sau: rót một lượng espresso vào cốc đầu tiên, tiếp theo cho thêm sữa nóng, cuối cùng mới thêm bọt sữa và phân thành ba tầng thành phần rõ rệt. Để ly cà phê thêm hấp dẫn, Barista thường trang trí thêm bột  quế, bột socola, syrup caramel,…. và đặc biệt là tạo hình nghệ thuật trên bề mặt ly cà phê với các hình vẽ như lá dương xỉ, trái tim hay chim thiên nga,…\r\n6. Cà phê Mocha\r\nCà phê Mocha chắc hẳn không còn xa lạ gì với các tín đồ sành cà phê. Không giống với Espresso hay Americano, Mocha thiên về vị ngọt của chocolate hơn cả. Tuy nhiên, nó cũng là một thức uống biến thể từ Latte, vẫn có đủ lượng caffein để tỉnh táo mà không còn quá đắng gắt.', 'Giới thiệu sơ về các loại cà phê hiện nay'),
(4, 'Giới thiệu về Cafe', 'caphe.jpg', 'Cà phê – thức uống phổ biến thứ hai trên thế giới sau nước, chức năng chính của cà phê không phải là giải khát; nhiều người uống nó với mục đích tạo cảm giác hưng phấn.\r\n\r\nTheo một nghiên cứu của nhà hoá học Hoa Kỳ – Joe Vinson thuộc Đại học Scranton thì cà phê là một nguồn quan trọng cung cấp các chất chống ôxi hóa cho cơ thể, vai trò mà trước đây người ta chỉ thấy ở hoa quả và rau xanh. Những chất này cũng gián tiếp làm giảm nguy cơ bị ung thư ở người.\r\n\r\nLịch sử\r\n\r\nCà phê (gốc từ café trong tiếng Pháp) là một loại thức uống màu đen có chứa chất caffein, được sản xuất từ những hạt cà phê rang lên. Cà phê được sử dụng lần đầu tiên vào thế kỉ thứ 9, khi nó được khám phá ra từ vùng cao nguyên Ethiopia. Từ đó, nó lan ra Ai Cập và Yemen và tới thế kỉ thứ 15 thì đến Armenia, Ba Tư, Thổ Nhĩ Kỳ và phía bắc Châu Phi. Từ thế giới Hồi giáo, cà phê đến Ý, sau đó là phần còn lại của Châu Âu, Indonesia và Hoa Kỳ. Ngày nay, cà phê là một trong những thức uống thông dụng toàn cầu.\r\n\r\nĐồn điền cà phê đầu tiên được lập ở Việt Nam là do người Pháp khởi sự ở gần Kẻ Sở, Bắc Kỳ vào năm 1888. Giống cà phê arabica (tức cà phê chè) được trồng ở ven sông. Sau việc canh tác cà phê lan xuống vùng Phủ Lý, Ninh Bình, Thanh Hóa, Nghệ An, Kon Tum và Di Linh.\r\n\r\nPhân Loại\r\nBa dòng cây cà phê chính là:\r\n\r\nArabica – cà phê chè\r\nCanephora (Robusta) – cà phê vối\r\nExcelsa (Liberia) – cà phê mít\r\nChất lượng hay đẳng cấp của cà phê khác nhau tùy theo từng loại cây, từng loại hạt và nơi trồng khác nhau. Cà phê Robusta được đánh giá thấp hơn so với cà phê Arabica do có chất lượng thấp hơn và giá cả theo đó cũng rẻ hơn. Loại cà phê đắt nhất và hiếm nhất thế giới tên là Cà phê Kopi Luwak (hay “cà phê chồn”) của Việt Nam và Indonesia. Đây không phải là một giống cà phê mà một cách chế biến cà phê bằng cách dùng bộ tiêu hóa của loài cầy.\r\n\r\nCà phê chia ra nhiều loại tùy theo cách rang. Rang cà phê là để cho bớt độ ẩm trong hạt, dầu thơm tỏa ra. Trong kỹ nghệ, cà phê được rang với số lượng lớn dùng nhiệt độ cao trong một thời gian nhanh (khoảng 204 đến 260 °C trong vòng 5 phút) rồi làm nguội bằng quạt hơi hay rảy nước cho khỏi cháy khét.\r\n\r\nNgười ta có thể rang cà phê sơ sài và được gọi dưới cái tên Cinnamon roast (thời gian khoảng 7 phút), rang vừa (medium roast) còn gọi là full city hay brown (thời gian từ 9 đến 11 phút) hay rang kỹ (full roast) tức là rang kiểu Pháp thời gian từ 12 đến 13 phút. Những cách rang kỹ nhất đến cháy xém khiến cho hạt cà phê bóng nhẫy là kiểu rang của người Ý (espresso) thì phải từ 14 phút trở lên cho đến khi bắt đầu cháy thành than.\r\n\r\nCà phê cũng phân biệt theo cách xay, xay mịn hay to hạt tùy theo cách pha. Trong khoảng một trăm năm trở lại đây, người ta đã chế biến ra loại cà phê bột, chỉ cần bỏ vào nước sôi là uống được. Cà phê bột được điều chế theo hai cách: làm khô bằng cách đông lạnh (freeze drying) hay làm khô bằng cách phun (spray drying). Cả hai đều phải được lọc trước để rút hết tinh chất rồi phun ra thành những hạt li ti để làm khô.  Tuy nhiên những người khó tính vẫn cho rằng cà phê bột không thể nào bằng cà phê pha được.\r\nTác dụng an thần. Người ta đã chứng minh được rằng, nếu đi ngủ trong vòng 15 phút sau khi uống cà phê thì giấc ngủ sẽ sâu hơn, bởi máu trong não được lưu thông tốt hơn. Nhưng nếu tiếp tục chần chừ thì tác dụng này sẽ mất dần đi, và sau đó thì caffein bắt đầu phát huy hiệu quả, chúng ta sẽ không ngủ được nữa.\r\n\r\nKích thích sự tập trung và hưng phấn. Nên uống cà phê nhiều lần trong ngày, mỗi lần một ngụm nhỏ, thay vì uống một cốc thật to vào buổi sáng. Cách này đặc biệt thích hợp với những người phải làm việc vào ban đêm, họ sẽ cảm thấy dễ thức khuya hơn cũng như giữ được sự tập trung cao hơn.\r\n\r\nChống ôxi hóa. Trung tâm ung thư quốc gia Nhật Bản ở Tokyo đã thực hiện một thí nghiệm kéo dài 10 năm trên 100.000 người uống cà phê và phát hiện ra trong số họ chỉ có 214 người mắc phải chứng ung thư thận. Trong khi đó ở những người không uống cà phê, tỉ lệ này là 547/100.000, nghĩa là cao hơn hai lần. Từ đó họ rút ra kết luận rằng các chất chống ôxi hoá trong cà phê có khả năng bảo vệ các tế bào thận khỏi bị ăn mòn. Thí nghiệm so sánh cũng chỉ ra rằng trà xanh không có tác dụng bảo vệ trên giống như của cà phê.\r\n\r\nTuy nhiên để phát huy ảnh hưởng tích cực của loại đồ uống thơm ngon này chúng ta không nên lạm dụng và chỉ nên sử dụng ở liều lượng thích hợp để có tác dụng tốt đối với sức khỏe.', 'Giới thiệu sơ lược về nguồn gốc và tác dụng  của Cafe');

-- --------------------------------------------------------

--
-- Table structure for table `ca_lam_viec`
--

CREATE TABLE `ca_lam_viec` (
  `idca` int(32) NOT NULL,
  `mota` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca_lam_viec`
--

INSERT INTO `ca_lam_viec` (`idca`, `mota`, `ghichu`) VALUES
(1, 'Sang Chu Nhat mo cua\r\n7:00 - 10:00', '(khong)'),
(2, 'Sang thu 2 mo cua\r\n7:00 - 10:00', '(khong)'),
(3, 'Sang thu 3 mo cua\r\n7:00 - 10:00', '(khong)'),
(4, 'Sang thu 4 mo cua\r\n7:00 - 10:00', '(khong)'),
(5, 'Sang thu 5 mo cua\r\n7:00 - 10:00', '(khong)'),
(6, 'Sang thu 6 mo cua\r\n7:00 - 10:00', '(khong)'),
(7, 'Sang thu 7 mo cua\r\n7:00 - 10:00', '(khong)');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danhmuc` int(10) NOT NULL,
  `ten_danhmuc` varchar(200) NOT NULL,
  `id_cha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danhmuc`, `ten_danhmuc`, `id_cha`) VALUES
(1, 'Cafe', 0),
(2, 'Sinh tố', 0),
(3, 'Đồ ăn vặt', 0),
(4, 'Bánh Ngọt', 0),
(5, 'Các thức uống khác', 0);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `iddon_hang` int(10) NOT NULL,
  `danhsachsp` varchar(255) NOT NULL,
  `ghichu` text NOT NULL,
  `idkhach_hang` int(11) DEFAULT NULL,
  `idnhan_vien` int(32) DEFAULT NULL,
  `ten_kh` varchar(32) DEFAULT NULL,
  `thoigianlap` text NOT NULL,
  `tongcong` int(250) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`iddon_hang`, `danhsachsp`, `ghichu`, `idkhach_hang`, `idnhan_vien`, `ten_kh`, `thoigianlap`, `tongcong`, `status`) VALUES
(1, '1 Cà phê nâu, 3 Cà phê đen, 1 Trà cúc', '(Không)', 2, 1, 'Không', '2023-10-22 09:22:52', 117000, 0),
(2, '5 Cà phê đen', '(không)', 1, 1, 'Dark Commander', '2023-10-22 11:22:20', 115000, 0),
(4, '99 Cà phê đen', '(không)', 4, 2, 'Arnold Schwarzenegger', '2023-10-28 17:17:57', 2277000, 0),
(5, '6 Bạc xỉu, 6 Cà phê nâu, 6 Cà phê đen, 6 Sinh tố bơ, 6 Sinh tố sữa chua, 6 Trà cúc', '(không)', 6, 2, 'Minh', '2023-11-02 14:59:08', 954000, 0),
(6, '100 Trà cúc', '(không)', 7, 2, 'Duy', '2023-11-02 16:42:26', 2500000, 0),
(10, '7 Bạc xỉu', '(không)', 6, 2, '(không)', '2023-11-09 16:55:53', 161000, 0),
(11, '2 Cà phê nâu', '(không)', 3, 2, '(không)', '2023-11-15 21:05:21', 46000, 0),
(17, ' 1 Cà phê đen,1 Sinh tố sữa chua,', '', 38, 2, 'sgposod', '2023-11-25 11:18:20', 53000, 1),
(18, ' 1 Cà phê đen,1 Sinh tố sữa chua,', '', 38, 2, 'sgposod', '2023-11-25 11:21:40', 53000, 1),
(19, ' 1 Cà phê nâu,2 Trà cúc,', '', 41, 2, 'Truong NA', '2023-11-25 11:55:33', 73000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `idkh` int(11) NOT NULL,
  `tenkh` varchar(32) NOT NULL,
  `sdtkh` varchar(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`idkh`, `tenkh`, `sdtkh`, `email`, `diachi`, `ghichu`) VALUES
(1, 'Khách vãng lai', '(không)', '(không)', '(không)', '(không)'),
(2, 'Trần Trùng Trục', '(không)', '(không)', '(không)', '(không)'),
(3, 'Phong Master', '0865356746', 'glorygangplank2702abc@gmail.com', 'Hải Phòng', '(không)'),
(4, 'Kẻ Hủy Diệt', '(không)', '(không)', '(không)', '(không)'),
(6, 'Trần Công Minh', '122121', '31331233@assd', 'Hải Phòng', '(không)'),
(7, 'Nguyễn Duck Duy', '1234567890', '(không)', '(không)', '(không)'),
(8, 'Tran A', '023154678', 'trana@gmail.com', 'Hai Phong', 'khong'),
(15, 'Tran C', '0258467913', 'tranc@gmail.com', 'Hai Phong', 'khong'),
(36, 'Truong Gia', '023456789', 'trgia@gmail.com', 'Hai Phong', 'khong'),
(37, 'sdosdkgo', '1234567890', 'isdjf@gaiofj', 'sdklf', 'khong'),
(38, 'sgposod', '0548796543', 'auhfui@gmail.com', 'Hải Phòng', 'khong'),
(39, 'sgposod', '0548796543', 'auhfui@gmail.com', 'Hải Phòng', 'khong'),
(40, 'sgposod', '0548796543', 'auhfui@gmail.com', 'Hải Phòng', 'khong'),
(41, 'Truong NA', '0254879653', 'na@gmail.com', 'Hai Phong', 'khong');

-- --------------------------------------------------------

--
-- Table structure for table `kho_hang`
--

CREATE TABLE `kho_hang` (
  `id_kho` int(11) NOT NULL,
  `tenkho` varchar(32) NOT NULL,
  `diachi` text NOT NULL,
  `id_nv_quanly` varchar(32) NOT NULL,
  `dienthoai` varchar(11) NOT NULL,
  `trangthai` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kho_hang`
--

INSERT INTO `kho_hang` (`id_kho`, `tenkho`, `diachi`, `id_nv_quanly`, `dienthoai`, `trangthai`, `ghichu`) VALUES
(1, 'Kho 255 HK', '255 Hàng Kênh, Lê Chân, Hải Phòng', 'NV001', '0986323307', 'Chưa đầy.', '(không)');

-- --------------------------------------------------------

--
-- Table structure for table `nguyen_lieu`
--

CREATE TABLE `nguyen_lieu` (
  `mahang` int(32) NOT NULL,
  `tenhang` varchar(32) NOT NULL,
  `giahang` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `donvi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguyen_lieu`
--

INSERT INTO `nguyen_lieu` (`mahang`, `tenhang`, `giahang`, `ghichu`, `donvi`) VALUES
(1, 'Cam thảo', 150000, '(không)', 'kg'),
(2, 'Cà phê hạt Arabica', 130000, '(không)', 'kg'),
(3, 'Cà phê hạt Robusta', 130000, '(không)', 'kg'),
(4, 'Chanh', 15000, '(không)', 'kg'),
(5, 'Đường trắng', 26000, '(không)', 'kg'),
(6, 'Đường vàng', 28600, '(không)', 'kg'),
(7, 'Đường thanh x 50', 17000, '(không)', 'gói'),
(8, 'Hoa cúc', 80000, '(không)', 'kg'),
(9, 'Kỳ tử', 200000, '(không)', 'kg'),
(10, 'La hán', 4000, '(không)', 'quả'),
(11, 'Sữa đặc ông thọ 380g', 37000, '(không)', 'lon'),
(12, 'Sữa tươi 1L', 37000, '(không)', 'hộp'),
(13, 'Táo đỏ', 170000, '(không)', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(32) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `ngaysinh` varchar(32) NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `anh_nv` varchar(255) NOT NULL,
  `vitri` varchar(255) NOT NULL,
  `luong` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `hoten`, `email`, `dienthoai`, `ngaysinh`, `gioitinh`, `diachi`, `anh_nv`, `vitri`, `luong`) VALUES
(1, 'Vũ Văn Thắng', '(không)', '0986323307', '24/04', 'Nam', '255 Hàng Kênh', 'nv1.jpg\r\n', 'Pha chế', 75000),
(2, 'Dương Thị Kim Trung', '(không)', '0936623239', '27/10', 'Nữ', '255 Hàng Kênh', 'nv2.jpg', 'Thu ngân', 75000),
(5, 'Trương Xuân', 'truongxuan@gmail.com', '0245789465', '1990/10/10', 'nam', 'Hải Dương', 'nv3.jpg', 'Pha chế', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `nhap_hang`
--

CREATE TABLE `nhap_hang` (
  `idnhap_hang` int(10) NOT NULL,
  `danhsachsp` varchar(255) NOT NULL,
  `thoigiannhap` text NOT NULL,
  `tongtien` int(250) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhap_hang`
--

INSERT INTO `nhap_hang` (`idnhap_hang`, `danhsachsp`, `thoigiannhap`, `tongtien`, `ghichu`) VALUES
(1, '4kg Cà phê hạt Arabica, 2kg Cà phê hạt Robusta', '2023-10-25 15:22:02', 780000, '(không)'),
(2, '2kg Cà phê hạt Robusta', '2023-11-02 19:37:02', 260000, '(không)'),
(3, '01kg Cam thảo, 01kg Cà phê hạt Arabica, 01kg Cà phê hạt Robusta, 01kg Chanh, 01kg Đường trắng, 01kg Đường vàng, 01gói Đường thanh x 50, 01kg Hoa cúc, 01kg Kỳ tử, 01quả La hán, 01lon Sữa đặc ông thọ 380g, 01hộp Sữa tươi 1L, 01kg Táo đỏ', '2023-10-25 13:07:33', 1024600, '(không)'),
(4, '4kg Cam thảo', '2023-11-02 21:18:12', 600000, '(không)');

-- --------------------------------------------------------

--
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `id` int(11) NOT NULL,
  `phan_quyen` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`id`, `phan_quyen`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `quan_ly_log`
--

CREATE TABLE `quan_ly_log` (
  `id` int(11) NOT NULL,
  `ten_tai_khoan` varchar(255) NOT NULL,
  `ngay_gio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hanh_dong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quan_ly_log`
--

INSERT INTO `quan_ly_log` (`id`, `ten_tai_khoan`, `ngay_gio`, `hanh_dong`) VALUES
(20, 'quantrivien', '2023-11-08 01:56:25', 'Đăng nhập'),
(21, 'quantrivien', '2023-11-08 02:19:16', 'Đăng xuất'),
(22, 'nhanvien01', '2023-11-08 02:19:22', 'Đăng nhập'),
(23, 'quantrivien', '2023-11-08 12:50:14', 'Đăng nhập'),
(24, 'nhanvien01', '2023-11-09 03:01:52', 'Đăng nhập'),
(25, 'nhanvien01', '2023-11-09 03:02:01', 'Đăng xuất'),
(26, 'quantrivien', '2023-11-09 03:08:08', 'Đăng nhập'),
(27, 'quantrivien', '2023-11-09 12:52:54', 'Đăng nhập'),
(28, 'quantrivien', '2023-11-12 02:54:59', 'Đăng nhập'),
(29, 'quantrivien', '2023-11-12 07:41:24', 'Đăng nhập'),
(30, 'quantrivien', '2023-11-13 02:14:35', 'Đăng nhập'),
(31, 'quantrivien', '2023-11-15 13:48:07', 'Đăng nhập'),
(32, 'quantrivien', '2023-11-15 14:01:37', 'Đăng nhập'),
(33, 'quantrivien', '2023-11-15 14:04:59', 'Đăng nhập'),
(34, 'quantrivien', '2023-11-15 23:54:44', 'Đăng nhập'),
(35, 'quantrivien', '2023-11-16 07:35:58', 'Đăng nhập'),
(36, 'quantrivien', '2023-11-16 07:55:19', 'Đăng nhập'),
(37, 'quantrivien', '2023-11-19 09:43:34', 'Đăng nhập'),
(38, 'quantrivien', '2023-11-19 14:12:50', 'Đăng nhập');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `idrate` int(11) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `rate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`idrate`, `tenkh`, `profile`, `rate`) VALUES
(1, 'Lê Anh Nuôi', 'kh2.jpg', '\"Đồ uống phù hợp với túi tiền, 9/10 điểm về chất lượng. Nhân viên phục vụ tốt. Sẽ quay lại vào những lần tới\"'),
(2, 'Trương Anh Ngọc', 'kh1.jpg', '\"Sản phẩm tốt, chuẩn vị Cafe\"'),
(3, 'Lê Công Minh', 'kh3.jpg', '\"View quán đẹp, rộng rãi, thoáng mát, đồ uống ngon, nhân viên phục vụ tốt\"');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `masp` int(32) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giathanh` int(255) NOT NULL,
  `thanhphan` text NOT NULL,
  `hinhanh` text NOT NULL,
  `mota` text NOT NULL,
  `phanloai` text NOT NULL,
  `id_danhmuc` int(25) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`masp`, `tensp`, `giathanh`, `thanhphan`, `hinhanh`, `mota`, `phanloai`, `id_danhmuc`, `ghichu`) VALUES
(1, 'Cà phê nâu', 23000, '60 ml cà phê.\r\n3 thìa sữa đặc.', 'milkcoffee.png', ' “Nâu đá là món cà phê thuần Việt, được pha từ cà phê, sữa đặc và đá. Nâu đá có màu Nâu nên gọi là Nâu”', 'caphe', 1, '(không)'),
(2, 'Cà phê đen', 23000, '60 ml cà phê.\r\n2 thanh đường.', 'blackcoffee.jpg', 'Cà phê đen là loại thức uống nguyên chất được pha từ hạt cà phê đã được rang, xay theo tiêu chuẩn. Cà phê đen không giống các loại cà phê khác, nó rất đơn giản từ cách pha đến nguyên liệu chuẩn bị.', 'caphe', 1, '(không)'),
(3, 'Bạc sỉu', 23000, '40 ml cà phê.\r\n5 thìa sữa đặc.\r\n30 ml sữa tươi.', 'bacsiu.jpg', 'Bạc xỉu hay Bạc sỉu là một món đồ uống có nguồn gốc từ người Hoa sống ở vùng Sài Gòn-Chợ Lớn những năm thập niên 1950-1960 và là món thức uống phổ biến ở khu vực này và các vùng xung quanh.', 'caphe', 1, '(không)'),
(4, 'Sinh tố sữa chua', 30000, '2 hộp sữa chua đông đá.\r\nNước cốt chanh (0.3 quả).\r\n10 thìa sữa đặc.\r\n3 muôi đá xay.', 'suachua.jpg', 'Sinh tố sữa chua không chỉ ngon miệng mà còn đem lại cho bạn rất nhiều công dụng:\r\n\r\nHỗ trợ cho hệ tiêu hóa: Trong sữa chua có nhiều vi sinh vật probiotic, bổ sung vi khuẩn có lợi cho đường ruột.\r\nGiúp tăng cường hệ miễn dịch: Ăn nhiều sữa chua, đặc biệt là những loại sữa chua có chứa probiotics có thể tăng cường sức khỏe hệ thống miễn dịch của cơ thể và giảm khả năng mắc bệnh.\r\nLà người bạn đồng hành trong quá trình giảm cân: Theo nhiều nghiên cứu, ăn sữa chua giúp cơ thể tiết ra ít cortisol và các chất béo dễ dàng đốt cháy bởi axit amin, làm giảm lượng mỡ cơ thể.\r\nBảo vệ răng miệng: Axit lactic trong sữa chua góp phần bảo vệ cho lợi của bạn rất tốt.\r\nCung cấp kẽm, canxi giúp xương và răng chắc khỏe.\r\nSữa chua còn giúp làm đẹp và bảo vệ tóc, ngăn ngừa gãy rụng.', 'sinhto', 2, '(không)'),
(5, 'Sinh tố bơ', 35000, '150g thịt bơ quả.\r\n14 thìa sữa đặc.\r\n3 muôi đá vụn.', 'bo.jpg', 'Theo nhiều nghiên cứu, trong quả bơ có hơn 25 loại Vitamin khác nhau. Các nhóm Acid béo có lợi trong quả bơ là Omega 3 cùng Kali và Natri. Giúp giảm nguy cơ mắc bệnh về tim mạch và cân bằng điện giải cho cơ thể dễ dàng hơn. Các hợp chất này còn giúp oxy hóa mạch máu làm máu huyết lưu thông tốt hơn. Nguồn Vitamin B6 có sẵn trong bơ sẽ cực thích hợp cho sức khỏe bà bầu. Làm giảm tình trạng ốm nghén, nâng cao hệ miễn dịch tối ưu nhất cho thai nhi. Ngoài ra sinh tố bơ còn nhiều tác dụng chữa bệnh không ngờ. Như ngăn ngừa bệnh ung thư, giảm Cholesterol trong máu và chống viêm cho cơ thể. Uống sinh tố bơ đúng, đều đặn cũng là một cách giúp ngừa bệnh đột quỵ.', 'sinhto', 2, '(không)'),
(6, 'Trà cúc', 25000, '5g hoa cúc khô.\r\n0.5 thìa kỳ tử.\r\n3 quả táo đỏ.\r\n1/8 quả la hán.\r\n2g cam thảo.\r\n2 thanh đường.', 'cuc.jpg', 'Trà hoa cúc hay trà bông cúc là loại nước sắc làm từ hoa Chrysanthemum morifolium hoặc Chrysanthemum indicum, phổ biến nhất là ở Đông Á. Người ta ngâm hoa cúc vào nước nóng ở nhiệt độ khoảng 90-95 °C, có thể thêm đường đá hay thỉnh thoảng là củ khởi. Nước trà trong suốt và có màu từ vàng nhạt đến vàng tươi', 'tra', 5, '(không)'),
(7, 'Americano', 50000, 'Cafe', 'americano.jpg', 'Americano là một loại cà phê Mỹ có công thức pha chế giống với cà phê Espresso, tuy nhiên lượng nước nóng được pha loãng vào Espresso nhiều hơn bình thường. Do đó, tùy thuộc vào tỷ lệ giữa cà phê Espresso và lượng nước nóng bổ sung mà hương vị cuối cùng của cà phê sẽ bị ảnh hưởng. Ban đầu, Americano được tạo ra bằng cách đổ nước lên trên một shot cà phê Espresso. Về sau tại Úc đã sáng tạo nên một phiên bản mới hoàn toàn ngược lại với tên gọi Long Black: đổ một shot Espresso lên trên nước nóng hoặc nước lạnh, với mục đích giữ lại lớp kem vàng óng của Espresso, giúp món đồ uống thêm đẹp mắt và giống cà phê hơn.\r\nAmericano không có vị quá đắng như cà phê truyền thống và ít chua hơn so với Espresso nguyên chất. Đây là thức uống yêu thích của những tín đồ sành cà phê muốn thưởng thức hương vị nguyên bản của espresso nhưng nhẹ nhàng hơn. Để tăng thêm cảm giác sảng khoái mỗi khi thưởng thức loại thức uống tuyệt vời này, bạn có thể cho thêm đá viên nếu muốn. Ngày nay, cà phê Americano ngày càng nổi tiếng, đặc biệt các loại Specialty được sản xuất nhiều hơn. Theo làn sóng cà phê pha máy, Americano dần hội nhập và phát triển với hương vị muôn màu muôn vẻ, trở thành biểu tượng cà phê được đông đảo khách hàng tin yêu và ưa chuộng trên khắp thế giới.', 'caphe', 1, ''),
(8, 'Latte', 55000, 'Espresso\r\nSữa', 'latte.jpg', 'Bản chất của cà phê Latte là sự dung hòa của cà phê Espresso và sữa. Latte được yêu thích bởi sự nhẹ nhàng, hương vị ngọt ngào được hòa quyện bởi sữa, cà phê và lớp bọt sữa mềm mịn, béo ngậy. Đặc biệt, Latte chỉ sử dụng lượng bọt sữa bằng nửa lượng sữa nóng để cho ra thành phẩm như ý nhất.\r\nLatte hiện nay ngày càng nổi tiếng hơn nữa bởi xu hướng Latte Art với những hình vẽ vô cùng sáng tạo trên cốc cà phê. Với lượng sữa lớn và lớp bọt mịn thơm lừng, Latte giúp cho các Barista thỏa sức sáng tạo ra các hình vẽ đầy tính nghệ thuật. Ngày nay, Latte đã trở thành thức uống phổ biến và hiện diện rộng rãi trên toàn thế giới.', 'caphe', 1, ''),
(9, 'Espresso', 40000, 'Caphe\r\nnước nóng', 'espresso.jpg', 'Có nguồn gốc từ nước Ý, cà phê Espresso được rang và pha chế bằng cách dùng nước nóng nén dưới điều kiện áp suất cao (9-10 bar) qua một thiết bị lọc bột cà phê được xay mịn. Nếu pha bằng phương pháp này, hương thơm của Espresso vẫn rất mạnh, mùi vị khá đắng và nồng đậm, đặc biệt là sự xuất hiện của lớp bọt crema màu nâu óng ánh trên bề mặt của tách cà phê. \r\nNguyên liệu pha cà phê Espresso thường là những hạt cà phê được rang sẫm màu, lúc này khi pha dưới áp suất cao không gặp tình trạng cà phê có mùi chua khó chịu. Tuy nhiên, Barista cần chú ý đến thời gian rang cà phê để cho ra hương thơm đúng ý nhất, có cách cân bằng giữa hàm lượng axit và hương thơm khi rang cà phê. Thông thường, loại hạt cà phê được lựa chọn nhiều nhất để pha chế Espresso là hạt Arabica chất lượng cao, tuy nhiên đôi khi Barista cũng sẽ linh hoạt pha trộn thêm hạt Robusta để cho ra được lớp crema dày và đậm đặc hơn.\r\n\r\nKhông chỉ pha chế để thưởng thức riêng biệt, Espresso còn là nền tảng để tạo ra nhiều loại cà phê hấp dẫn như Latte, Cappuccino, Macchiato hay Americano. Cà phê Espresso ngày càng nổi tiếng và được nhiều tín đồ sành cà phê trên toàn thế giới cũng như tại Việt Nam yêu thích vì hương vị hấp dẫn, đậm đà cuốn hút mọi vị giác.', 'caphe', 1, ''),
(10, 'Cappuchino', 35000, 'sữa nóng, espresso và bọt sữa', 'cappuchino.jpg', 'Cà phê Cappuchino có thành phần tương tự như Latte, bao gồm sữa nóng, espresso và bọt sữa với tỉ lệ đều nhau. Tuy nhiên khác với Latte, Cappuccino được pha chế theo thứ tự như sau: rót một lượng espresso vào cốc đầu tiên, tiếp theo cho thêm sữa nóng, cuối cùng mới thêm bọt sữa và phân thành ba tầng thành phần rõ rệt. Để ly cà phê thêm hấp dẫn, Barista thường trang trí thêm bột  quế, bột socola, syrup caramel,…. và đặc biệt là tạo hình nghệ thuật trên bề mặt ly cà phê với các hình vẽ như lá dương xỉ, trái tim hay chim thiên nga,…\r\nCappuccino có nguồn gốc từ nước Ý xinh đẹp, được sáng tạo bởi những con người tài hoa, và được xem là một hương vị hoàn hảo của nước Ý lãng mạn: chút đăng đắng của cà phê hòa tan, quyện hòa cùng vị ngọt ngào, béo ngậy của kem sữa đầy say mê và lớp bọt sữa mịn màng vương trên đầu lưỡi. Đó chính là lý do suốt bao năm qua Cappuccino dễ dàng chinh phục được vị giác của nhiều người đến vậy.', 'caphe', 1, ''),
(11, 'Mocha', 40000, 'espresso và sữa nóng ', 'mocha.jpg\r\n', 'Cà phê Mocha chắc hẳn không còn xa lạ gì với các tín đồ sành cà phê. Không giống với Espresso hay Americano, Mocha thiên về vị ngọt của chocolate hơn cả. Tuy nhiên, nó cũng là một thức uống biến thể từ Latte, vẫn có đủ lượng caffein để tỉnh táo mà không còn quá đắng gắt.\r\nTương tự như Latte, cà phê Mocha được pha chế từ espresso và sữa nóng nhưng mang nhiều vị ngọt hơn và có thêm chocolate (có thể là bột hoặc syrup chocolate đều được). Lúc này, cà phê được cân chỉnh vị đắng và trở nên ngọt ngào hơn, dậy thêm vị thơm béo từ sữa nóng. Tùy vào sở thích cũng như mục đích pha chế mà Barista có thể thay thế giữa chocolate đen hoặc chocolate sữa để tạo nên một loại cà phê Mocha trắng ngọt ngào.', 'caphe', 1, ''),
(12, 'Sinh tố xoài', 25000, 'Xoài', 'xoai.jpg', 'Sinh tố xoài là món sinh tố rất thơm ngon và dinh dưỡng, bởi hương vị từ loại trái cây nhiệt đới nổi tiếng số 1 là xoài chín. Loại thức uống được rất nhiều gia đình ưa chuộng đặc biệt là vào các ngày hè nắng nóng như thế này.', 'sinhto', 2, ''),
(13, 'Nước cam ép', 20000, 'cam', 'cam.jpg', 'Nước cam hay nước cam ép, nước cam vắt là một loại thức uống phổ biến được làm từ cam bằng cách chiết xuất nước từ trái cam tươi bằng việc vắt hay ép thành một loại nước cam tươi ', 'nuocep', 5, ''),
(14, 'Donut', 15000, 'banh', 'donut.jpg', 'Donut là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây, có thể được mua trong cửa hàng hoặc tự làm ở nhà. Thường bánh có dạng hình vòng nhồi nhân bên trong hoặc không nhồi nhân bên trong. Bánh thường được phủ nhiều loại kem socola và trang trí bằng hạt đường, hạt cốm,...', 'banh', 4, ''),
(15, 'Bánh quy', 15000, 'banh', 'cracker.jpg', 'Bánh quy là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 'banh', 4, ''),
(16, 'Coca-cola', 10000, 'nuoc ngot co ga', 'coca.jpg', 'Coca-Cola là một thương hiệu nước ngọt có ga chứa nước cacbon dioxide bão hòa được sản xuất bởi Công ty Coca-Cola. Coca-Cola được điều chế bởi dược sĩ John Pemberton vào cuối thế kỷ XIX với mục đích ban đầu là trở thành một loại biệt dược.', 'khac', 5, ''),
(17, 'Pepsi', 10000, 'nuoc ngot co ga', 'pepsi.jpg', 'Pepsi một đồ uống giải khát có gas, lần đầu tiên được sản xuất bởi Caleb Bradham. Ban đầu, Ông pha chế ra một loại nước uống dễ hấp thụ làm từ nước cacbonat, đường, vani và một ít dầu ăn dưới tên “Nước uống của Brad\" năm 1892.', 'khac', 5, ''),
(18, 'Nước khoáng', 10000, 'nước', 'nuockhoang.jpg', 'Nước khoáng là nước lấy từ nguồn suối khoáng, có thành phần gồm nhiều hợp chất muối và hợp chất lưu huỳnh. Nước khoáng có thể là nước sủi bọt. ', 'khac', 5, ''),
(19, 'Lavie', 10000, 'nước', 'lavie.jpg', 'Nước khoáng thiên nhiên La Vie được khai thác từ mạch nước khoáng ngầm hàng ngàn năm tuổi, nằm sâu dưới lòng đất. Công nghệ đóng chai tại nguồn giúp giữ trọn vẹn hàm lượng nguyên tố vi lượng & khoáng chất tự nhiên quý giá của nước khoáng, gồm Natri, Kali, Canxi, Magie, Flouride, Bicarbonate, I-ốt.', 'khac', 5, ''),
(20, 'Bim bim', 7000, 'bim bim', 'snack.jpg', 'Bim bim hay Snack là một loại thức ăn nhẹ làm bằng bột và gia vị hoặc các loại hạt, được sấy khô đóng bao, ăn có vị giòn. Bim bim có nhiều loại, dựa vào thứ gia vị tẩm bột: bim bim cay, bim bim vị tôm, bim bim vị bò, bim bim vị cua... rất là phong phú và đa dạng.', 'anvat', 3, ''),
(21, 'Hạt hướng dương', 7000, 'hạt', 'sunflower.jpg', 'Hạt hướng dương là hạt từ cây hướng dương. Những bông hoa hướng dương nở ra, trong nhụy mọc lên quả có hình dáng giống hạt nên được gọi là \"hạt\". Có ba loại hạt thường thấy là: giàu linoleic, giàu oleic và hạt tạo dầu', 'hạt', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_old`
--

CREATE TABLE `san_pham_old` (
  `id_sanpham` int(10) NOT NULL,
  `ten_sanpham` varchar(200) NOT NULL,
  `don_gia` int(100) NOT NULL,
  `hinh_anh` varchar(200) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham_old`
--

INSERT INTO `san_pham_old` (`id_sanpham`, `ten_sanpham`, `don_gia`, `hinh_anh`, `mo_ta`) VALUES
(1, 'Cappuchino', 70000, 'cappuchino.jpg', 'A cappuccino is an espresso-based coffee drink that is traditionally prepared with steamed milk foam.\r\n\r\nVariations of the drink involve the use of cream instead of milk, using non-dairy milk substitutes and flavoring with cinnamon or chocolate powder. It is typically smaller in volume than a caffè latte, with a thicker layer of microfoam.'),
(2, 'Ca phe den', 50000, 'black_coffee.jpg', 'Coffee is a beverage prepared from roasted coffee beans. Darkly colored, bitter, and slightly acidic, coffee has a stimulating effect on humans, primarily due to its caffeine content. It has the highest sales in the world market for hot drinks.\r\n\r\nThe seeds of the Coffea plant\'s fruits are separated to produce unroasted green coffee beans. The beans are roasted and then ground into fine particles typically steeped in hot water before being filtered out, producing a cup of coffee. It is usually served hot, although chilled or iced coffee is common. Coffee can be prepared and presented in a variety of ways (e.g., espresso, French press, caffè latte, or already-brewed canned coffee). Sugar, sugar substitutes, milk, and cream are often added to mask the bitter taste or enhance the flavor.'),
(3, 'Ca phe sua', 60000, 'milk_coffee.jpg', 'Milk coffee is a category of coffee-based drinks made with milk. Johan Nieuhof, the Dutch ambassador to China, is credited as the first person to drink coffee with milk when he experimented with it around 1660'),
(4, 'Chocolate Cake', 100000, 'chocolate_cake.jpg', 'Chocolate cake is made with chocolate. It can also include other ingredients. These include fudge, vanilla creme, and other sweeteners. The history of chocolate cake goes back to the 17th century, when cocoa powder from the Americas was added to traditional cake recipes.'),
(5, 'Cheese Cake', 120000, 'cheese_cake.jpg', 'Cheesecake is a sweet dessert made with a soft fresh cheese (typically cottage cheese, cream cheese, quark or ricotta), eggs, and sugar. It may have a crust or base made from crushed cookies (or digestive biscuits), graham crackers, pastry, or sometimes sponge cake. Cheesecake may be baked or unbaked, and is usually refrigerated.\r\n\r\nVanilla, spices, lemon, chocolate, pumpkin, or other flavors may be added to the main cheese layer. Additional flavors and visual appeal may be added by topping the finished dessert with fruit, whipped cream, nuts, cookies, fruit sauce, chocolate syrup, or other ingredients.'),
(6, 'Doughnut', 50000, 'donuts.jpg', 'A doughnut or donut (/ˈdoʊnət/) is a type of food made from leavened fried dough.  It is popular in many countries and is prepared in various forms as a sweet snack that can be homemade or purchased in bakeries, supermarkets, food stalls, and franchised specialty vendors. Doughnut is the traditional spelling, while donut is the simplified version; the terms are used interchangeably.\r\n\r\nDoughnuts are usually deep fried from a flour dough, but other types of batters can also be used. Various toppings and flavors are used for different types, such as sugar, chocolate or maple glazing. Doughnuts may also include water, leavening, eggs, milk, sugar, oil, shortening, and natural or artificial flavors.'),
(7, 'Orange Juice', 40000, 'orange_juice.jpg', 'Orange juice is a liquid extract of the orange tree fruit, produced by squeezing or reaming oranges. It comes in several different varieties, including blood orange, navel oranges, valencia orange, clementine, and tangerine. As well as variations in oranges used, some varieties include differing amounts of juice vesicles, known as \"pulp\" in American English, and \"(juicy) bits\" in British English. These vesicles contain the juice of the orange and can be left in or removed during the manufacturing process. How juicy these vesicles are depend upon many factors, such as species, variety, and season. In American English, the beverage name is often abbreviated as \"OJ\".'),
(8, 'Lemon Juice', 40000, 'lemon_juice.jpg', 'The lemon (Citrus × limon) is a species of small evergreen tree in the flowering plant family Rutaceae, native to Asia, primarily Northeast India (Assam), Northern Myanmar, or China.\r\n\r\nThe tree\'s ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses. The pulp and rind are also used in cooking and baking. The juice of the lemon is about 5-6% citric acid, with a pH of around 2.2, giving it a sour taste. The distinctive sour taste of lemon juice, derived from the citric acid, makes it a key ingredient in drinks and foods such as lemonade and lemon meringue pie.'),
(9, 'Aquafina', 7000, 'aqua.jpg', 'Just a Normal Water');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tk` int(32) NOT NULL,
  `ten_tk` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phanquyen` int(11) NOT NULL,
  `id_nhanvien` int(32) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tk`, `ten_tk`, `pass`, `phanquyen`, `id_nhanvien`, `ghichu`) VALUES
(1, 'quantrivien', '123456', 1, 1, '(khong)'),
(2, 'nhanvien01', '123456', 2, 2, '(khong)');

-- --------------------------------------------------------

--
-- Table structure for table `thuong_phat`
--

CREATE TABLE `thuong_phat` (
  `idtinh_huong` int(32) NOT NULL,
  `idnhan_vien` int(32) NOT NULL,
  `thoigian` text NOT NULL,
  `phanloai` varchar(10) NOT NULL,
  `sotien` int(250) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuong_phat`
--

INSERT INTO `thuong_phat` (`idtinh_huong`, `idnhan_vien`, `thoigian`, `phanloai`, `sotien`, `noidung`) VALUES
(2, 1, '2023-10-29 18:19:27', 'Thưởng', 200000, 'Tăng ca ngày 29/10/2023');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `ma_sale` varchar(255) NOT NULL,
  `ten_uu_dai` varchar(255) NOT NULL,
  `gia_tri` text NOT NULL,
  `hsd` date NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `ma_sale`, `ten_uu_dai`, `gia_tri`, `hsd`, `qty`) VALUES
(1, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe', '20%', '2023-11-01', 0),
(2, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe 2', '20%', '2024-11-01', 0),
(3, 'LPSPKF59', 'Chào mừng đến Mộc Cafe', '10%', '2024-11-01', 0),
(4, 'DHDT0001', 'Khuyến mãi đơn hàng đầu tiên', '50%', '2024-11-01', 0),
(5, 'FREESHIP', 'Miễn phí giao hàng', '5%', '2024-11-01', 0),
(6, 'LKJDLGDS', 'Ưu đãi khách hàng mới', '10%', '2024-10-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `xuat_hang`
--

CREATE TABLE `xuat_hang` (
  `idxuat_hang` int(10) NOT NULL,
  `danhsachsp` varchar(255) NOT NULL,
  `thoigianxuat` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xuat_hang`
--

INSERT INTO `xuat_hang` (`idxuat_hang`, `danhsachsp`, `thoigianxuat`, `ghichu`) VALUES
(1, '1kg Cam thảo, 1kg Cà phê hạt Arabica', '2023-10-25 10:40:41', '(không)'),
(3, '1kg Cam thảo, 2kg Cà phê hạt Arabica', '2023-10-25 12:43:06', '(không)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Indexes for table `ca_lam_viec`
--
ALTER TABLE `ca_lam_viec`
  ADD PRIMARY KEY (`idca`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`iddon_hang`),
  ADD KEY `fk_khachhang` (`idkhach_hang`),
  ADD KEY `fk_nhanvien` (`idnhan_vien`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`idkh`);

--
-- Indexes for table `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD PRIMARY KEY (`id_kho`);

--
-- Indexes for table `nguyen_lieu`
--
ALTER TABLE `nguyen_lieu`
  ADD PRIMARY KEY (`mahang`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  ADD PRIMARY KEY (`idnhap_hang`);

--
-- Indexes for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quan_ly_log`
--
ALTER TABLE `quan_ly_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`idrate`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `san_pham_old`
--
ALTER TABLE `san_pham_old`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tk`),
  ADD KEY `fk_phanquyen` (`phanquyen`),
  ADD KEY `fk_tknhanvien` (`id_nhanvien`);

--
-- Indexes for table `thuong_phat`
--
ALTER TABLE `thuong_phat`
  ADD PRIMARY KEY (`idtinh_huong`),
  ADD KEY `fk_nhanvien_thph` (`idnhan_vien`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indexes for table `xuat_hang`
--
ALTER TABLE `xuat_hang`
  ADD PRIMARY KEY (`idxuat_hang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ca_lam_viec`
--
ALTER TABLE `ca_lam_viec`
  MODIFY `idca` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danhmuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `iddon_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `id_kho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguyen_lieu`
--
ALTER TABLE `nguyen_lieu`
  MODIFY `mahang` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  MODIFY `idnhap_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quan_ly_log`
--
ALTER TABLE `quan_ly_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `idrate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `masp` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `san_pham_old`
--
ALTER TABLE `san_pham_old`
  MODIFY `id_sanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tk` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thuong_phat`
--
ALTER TABLE `thuong_phat`
  MODIFY `idtinh_huong` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xuat_hang`
--
ALTER TABLE `xuat_hang`
  MODIFY `idxuat_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_khachhang` FOREIGN KEY (`idkhach_hang`) REFERENCES `khach_hang` (`idkh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`idnhan_vien`) REFERENCES `nhan_vien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD CONSTRAINT `fk_phanquyen` FOREIGN KEY (`phanquyen`) REFERENCES `phan_quyen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tknhanvien` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhan_vien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thuong_phat`
--
ALTER TABLE `thuong_phat`
  ADD CONSTRAINT `fk_nhanvien_thph` FOREIGN KEY (`idnhan_vien`) REFERENCES `nhan_vien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
