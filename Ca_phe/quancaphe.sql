-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 02:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `tongcong` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`iddon_hang`, `danhsachsp`, `ghichu`, `idkhach_hang`, `idnhan_vien`, `ten_kh`, `thoigianlap`, `tongcong`) VALUES
(1, '1 Cà phê nâu, 3 Cà phê đen, 1 Trà cúc', '(Không)', 2, 1, 'Không', '2023-10-22 09:22:52', 117000),
(2, '5 Cà phê đen', '(không)', 1, 1, 'Dark Commander', '2023-10-22 11:22:20', 115000),
(3, '2 Cà phê nâu', '(không)', 3, 1, 'Không', '2023-10-28 16:11:19', 46000),
(4, '99 Cà phê đen', '(không)', 4, 2, 'Arnold Schwarzenegger', '2023-10-28 17:17:57', 2277000),
(5, '6 Bạc xỉu, 6 Cà phê nâu, 6 Cà phê đen, 6 Sinh tố bơ, 6 Sinh tố sữa chua, 6 Trà cúc', '(không)', 6, 2, 'Minh', '2023-11-02 14:59:08', 954000),
(6, '100 Trà cúc', '(không)', 7, 2, 'Duy', '2023-11-02 16:42:26', 2500000);

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
(7, 'Nguyễn Duck Duy', '1234567890', '(không)', '(không)', '(không)');

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
  `luong` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `hoten`, `email`, `dienthoai`, `ngaysinh`, `gioitinh`, `diachi`, `luong`) VALUES
(1, 'Vũ Văn Thắng', '(không)', '0986323307', '24/04', 'Nam', '255 Hàng Kênh', 75000),
(2, 'Dương Thị Kim Trung', '(không)', '0936623239', '27/10', 'Nữ', '255 Hàng Kênh', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `nhap_hang`
--

CREATE TABLE `nhap_hang` (
  `idnhap_hang` int(10) NOT NULL,
  `danhsachsp` varchar(255) NOT NULL,
  `thoigiannhap` text NOT NULL,
  `tongtien` int(250) NOT NULL,
  `idkho` int(11) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhap_hang`
--

INSERT INTO `nhap_hang` (`idnhap_hang`, `danhsachsp`, `thoigiannhap`, `tongtien`, `idkho`, `ghichu`) VALUES
(1, '4kg Cà phê hạt Arabica, 2kg Cà phê hạt Robusta', '2023-10-25 15:22:02', 780000, 0, '(không)'),
(2, '2kg Cà phê hạt Robusta', '2023-11-02 19:37:02', 260000, 0, '(không)'),
(3, '01kg Cam thảo, 01kg Cà phê hạt Arabica, 01kg Cà phê hạt Robusta, 01kg Chanh, 01kg Đường trắng, 01kg Đường vàng, 01gói Đường thanh x 50, 01kg Hoa cúc, 01kg Kỳ tử, 01quả La hán, 01lon Sữa đặc ông thọ 380g, 01hộp Sữa tươi 1L, 01kg Táo đỏ', '2023-10-25 13:07:33', 1024600, 0, '(không)'),
(4, '4kg Cam thảo', '2023-11-02 21:18:12', 600000, 0, '(không)');

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
(1, 'admin'),
(2, 'staff');

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
(1, 'admin', '2023-11-05 02:14:19', 'Đăng nhập'),
(2, 'admin', '2023-11-05 02:16:43', 'Đăng nhập'),
(3, 'admin', '2023-11-05 02:18:57', 'Đăng nhập'),
(4, 'admin', '2023-11-05 02:20:00', 'Đăng nhập'),
(5, 'admin', '2023-11-05 02:28:07', 'Đăng xuất'),
(6, 'admin', '2023-11-05 02:33:57', 'Đăng nhập'),
(8, 'admin', '2023-11-05 04:03:22', 'Đăng xuất'),
(9, 'staff', '2023-11-05 04:03:25', 'Đăng nhập'),
(10, 'staff', '2023-11-05 04:09:21', 'Đăng xuất'),
(11, 'admin', '2023-11-05 04:09:23', 'Đăng nhập'),
(12, 'admin', '2023-11-05 07:53:49', 'Đăng xuất'),
(13, 'admin', '2023-11-05 07:53:51', 'Đăng nhập'),
(14, 'admin', '2023-11-06 02:16:47', 'Đăng nhập'),
(15, 'admin', '2023-11-06 02:23:07', 'Đăng xuất'),
(16, 'admin', '2023-11-06 02:23:09', 'Đăng nhập'),
(17, 'admin', '2023-11-06 02:23:12', 'Đăng xuất'),
(18, 'admin', '2023-11-06 02:23:14', 'Đăng nhập');

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
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`masp`, `tensp`, `giathanh`, `thanhphan`, `hinhanh`, `mota`, `phanloai`, `ghichu`) VALUES
(1, 'Cà phê nâu', 23000, '60 ml cà phê.\r\n3 thìa sữa đặc.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'caphe', '(không)'),
(2, 'Cà phê đen', 23000, '60 ml cà phê.\r\n2 thanh đường.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'caphe', '(không)'),
(3, 'Bạc xỉu', 23000, '40 ml cà phê.\r\n5 thìa sữa đặc.\r\n30 ml sữa tươi.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'caphe', '(không)'),
(4, 'Sinh tố sữa chua', 30000, '2 hộp sữa chua đông đá.\r\nNước cốt chanh (0.3 quả).\r\n10 thìa sữa đặc.\r\n3 muôi đá xay.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'sinhto', '(không)'),
(5, 'Sinh tố bơ', 35000, '150g thịt bơ quả.\r\n14 thìa sữa đặc.\r\n3 muôi đá vụn.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'sinhto', '(không)'),
(6, 'Trà cúc', 25000, '5g hoa cúc khô.\r\n0.5 thìa kỳ tử.\r\n3 quả táo đỏ.\r\n1/8 quả la hán.\r\n2g cam thảo.\r\n2 thanh đường.', 'cappuchino.jpg', '(sản phẩm tạm thời chưa có mô tả)', 'tra', '(không)');

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
(1, 'admin', '123456', 1, 1, '(khong)'),
(2, 'staff', '123456', 2, 2, '(khong)');

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

-- --------------------------------------------------------

--
-- Table structure for table `xuat_hang`
--

CREATE TABLE `xuat_hang` (
  `idxuat_hang` int(10) NOT NULL,
  `danhsachsp` varchar(255) NOT NULL,
  `thoigianxuat` text NOT NULL,
  `idkho_hang` int(11) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xuat_hang`
--

INSERT INTO `xuat_hang` (`idxuat_hang`, `danhsachsp`, `thoigianxuat`, `idkho_hang`, `ghichu`) VALUES
(1, '1kg Cam thảo, 1kg Cà phê hạt Arabica', '2023-10-25 10:40:41', 0, '(không)'),
(3, '1kg Cam thảo, 2kg Cà phê hạt Arabica', '2023-10-25 12:43:06', 0, '(không)');

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
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ca_lam_viec`
--
ALTER TABLE `ca_lam_viec`
  MODIFY `idca` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `iddon_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `id_kho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguyen_lieu`
--
ALTER TABLE `nguyen_lieu`
  MODIFY `mahang` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  MODIFY `idnhap_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quan_ly_log`
--
ALTER TABLE `quan_ly_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `masp` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
