-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:47 PM
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
(4, 'Giới thiệu về Cafe', 'caphe.jpg', 'Cà phê – thức uống phổ biến thứ hai trên thế giới sau nước, chức năng chính của cà phê không phải là giải khát; nhiều người uống nó với mục đích tạo cảm giác hưng phấn.\r\n\r\nTheo một nghiên cứu của nhà hoá học Hoa Kỳ – Joe Vinson thuộc Đại học Scranton thì cà phê là một nguồn quan trọng cung cấp các chất chống ôxi hóa cho cơ thể, vai trò mà trước đây người ta chỉ thấy ở hoa quả và rau xanh. Những chất này cũng gián tiếp làm giảm nguy cơ bị ung thư ở người.\r\n\r\nLịch sử\r\n\r\nCà phê (gốc từ café trong tiếng Pháp) là một loại thức uống màu đen có chứa chất caffein, được sản xuất từ những hạt cà phê rang lên. Cà phê được sử dụng lần đầu tiên vào thế kỉ thứ 9, khi nó được khám phá ra từ vùng cao nguyên Ethiopia. Từ đó, nó lan ra Ai Cập và Yemen và tới thế kỉ thứ 15 thì đến Armenia, Ba Tư, Thổ Nhĩ Kỳ và phía bắc Châu Phi. Từ thế giới Hồi giáo, cà phê đến Ý, sau đó là phần còn lại của Châu Âu, Indonesia và Hoa Kỳ. Ngày nay, cà phê là một trong những thức uống thông dụng toàn cầu.\r\n\r\nĐồn điền cà phê đầu tiên được lập ở Việt Nam là do người Pháp khởi sự ở gần Kẻ Sở, Bắc Kỳ vào năm 1888. Giống cà phê arabica (tức cà phê chè) được trồng ở ven sông. Sau việc canh tác cà phê lan xuống vùng Phủ Lý, Ninh Bình, Thanh Hóa, Nghệ An, Kon Tum và Di Linh.\r\n\r\nPhân Loại\r\nBa dòng cây cà phê chính là:\r\n\r\nArabica – cà phê chè\r\nCanephora (Robusta) – cà phê vối\r\nExcelsa (Liberia) – cà phê mít\r\nChất lượng hay đẳng cấp của cà phê khác nhau tùy theo từng loại cây, từng loại hạt và nơi trồng khác nhau. Cà phê Robusta được đánh giá thấp hơn so với cà phê Arabica do có chất lượng thấp hơn và giá cả theo đó cũng rẻ hơn. Loại cà phê đắt nhất và hiếm nhất thế giới tên là Cà phê Kopi Luwak (hay “cà phê chồn”) của Việt Nam và Indonesia. Đây không phải là một giống cà phê mà một cách chế biến cà phê bằng cách dùng bộ tiêu hóa của loài cầy.\r\n\r\nCà phê chia ra nhiều loại tùy theo cách rang. Rang cà phê là để cho bớt độ ẩm trong hạt, dầu thơm tỏa ra. Trong kỹ nghệ, cà phê được rang với số lượng lớn dùng nhiệt độ cao trong một thời gian nhanh (khoảng 204 đến 260 °C trong vòng 5 phút) rồi làm nguội bằng quạt hơi hay rảy nước cho khỏi cháy khét.\r\n\r\nNgười ta có thể rang cà phê sơ sài và được gọi dưới cái tên Cinnamon roast (thời gian khoảng 7 phút), rang vừa (medium roast) còn gọi là full city hay brown (thời gian từ 9 đến 11 phút) hay rang kỹ (full roast) tức là rang kiểu Pháp thời gian từ 12 đến 13 phút. Những cách rang kỹ nhất đến cháy xém khiến cho hạt cà phê bóng nhẫy là kiểu rang của người Ý (espresso) thì phải từ 14 phút trở lên cho đến khi bắt đầu cháy thành than.\r\n\r\nCà phê cũng phân biệt theo cách xay, xay mịn hay to hạt tùy theo cách pha. Trong khoảng một trăm năm trở lại đây, người ta đã chế biến ra loại cà phê bột, chỉ cần bỏ vào nước sôi là uống được. Cà phê bột được điều chế theo hai cách: làm khô bằng cách đông lạnh (freeze drying) hay làm khô bằng cách phun (spray drying). Cả hai đều phải được lọc trước để rút hết tinh chất rồi phun ra thành những hạt li ti để làm khô.  Tuy nhiên những người khó tính vẫn cho rằng cà phê bột không thể nào bằng cà phê pha được.\r\nTác dụng an thần. Người ta đã chứng minh được rằng, nếu đi ngủ trong vòng 15 phút sau khi uống cà phê thì giấc ngủ sẽ sâu hơn, bởi máu trong não được lưu thông tốt hơn. Nhưng nếu tiếp tục chần chừ thì tác dụng này sẽ mất dần đi, và sau đó thì caffein bắt đầu phát huy hiệu quả, chúng ta sẽ không ngủ được nữa.\r\n\r\nKích thích sự tập trung và hưng phấn. Nên uống cà phê nhiều lần trong ngày, mỗi lần một ngụm nhỏ, thay vì uống một cốc thật to vào buổi sáng. Cách này đặc biệt thích hợp với những người phải làm việc vào ban đêm, họ sẽ cảm thấy dễ thức khuya hơn cũng như giữ được sự tập trung cao hơn.\r\n\r\nChống ôxi hóa. Trung tâm ung thư quốc gia Nhật Bản ở Tokyo đã thực hiện một thí nghiệm kéo dài 10 năm trên 100.000 người uống cà phê và phát hiện ra trong số họ chỉ có 214 người mắc phải chứng ung thư thận. Trong khi đó ở những người không uống cà phê, tỉ lệ này là 547/100.000, nghĩa là cao hơn hai lần. Từ đó họ rút ra kết luận rằng các chất chống ôxi hoá trong cà phê có khả năng bảo vệ các tế bào thận khỏi bị ăn mòn. Thí nghiệm so sánh cũng chỉ ra rằng trà xanh không có tác dụng bảo vệ trên giống như của cà phê.\r\n\r\nTuy nhiên để phát huy ảnh hưởng tích cực của loại đồ uống thơm ngon này chúng ta không nên lạm dụng và chỉ nên sử dụng ở liều lượng thích hợp để có tác dụng tốt đối với sức khỏe.', 'Giới thiệu sơ lược về nguồn gốc và tác dụng  của Cafe'),
(5, 'ĐẶC ĐIỂM HƯƠNG VỊ CỦA CÁC LOẠI CAFE', 'ddcp.jpg', 'Càfê Moka đặc biệt: Moka là một giống cafe được người Pháp di thực từ những năm 30 của thế kỉ trước. Trồng ở độ cao 1700m, hương vị rất đặc biệt, sang trọng ngây ngất cho người sành điệu (gout châu âu cổ điển) - phương pháp chế biến : thủ công,\r\n- màu nước : nâu cánh gián,\r\n- cách pha chế : pha máy, pha phin, túi lọc...\r\n\r\nCàfê Moka Côlômbia: Hương thơm đặc trưng cho moka côlômbia kết hợp với mùi vị béo của bản thân bơ trong hạt càfê được giữ lại do phương pháp rang đặc biệt\r\n- phương pháp chế biến : thủ công,\r\n- màu nứơc : nâu lợt, bọt càfê được lọc và nổi lên trên rất hấp dẫn,\r\n- cách pha chế : pha máy là tốt nhất, có thể pha phin uống với sữa tươi...\r\n\r\nCàfê Mo-Rhum: Sự kết hợp giữa hương vị của moka với thoáng nhẹ mùi của rượu rhum Pháp, uống nhiều có cảm giác say nồng rất dễ chịu.\r\n- phương pháp chế biến : thủ công, dây chuyền bán tự động,\r\n- màu nước : nâu,\r\n- cách pha chế : pha máy, pha phin ,túi lọc...\r\n\r\nCàfê Mo-Nes: Vẫn là sự kết hợp tuyệt vời của moka Đà Lạt với mùi nhẹ của hoa hồi Trung Hoa mà châu Âu gọi là mùi Nes, nó kích thích người ta dùng rồi lại muốn dùng thêm ly thứ 2,3 mới đã .\r\n- phương pháp chế biến : thủ công, dây chuyền bán tự động,\r\n- màu nước : nâu,\r\n- cách pha chế : pha máy, pha phin ...\r\n\r\nCàfê Mo-Cappu: Hương thơm có mùi thoáng nhẹ bơ càfê. Vị đậm với hàm lượng chất kích thích(cafein) cao\r\n- phương pháp chế biến : thủ công,\r\n- màu nước : nâu lợt,\r\n- cách pha chế : pha máy, pha phin ...\r\n\r\nCàfê Ro-Rhum: Ngoài hương thơm nồng nàn của càfê, Ro-Rhum còn có vị hậu ở khoang miệng và cổ họng rất thú vị, hương vị cứ lưu luyến mãi mặc dù hớp càfê đã uống xong từ bao giờ.\r\n- phương pháp chế biến : thủ công,\r\n- màu nước : đen sánh vừa,\r\n- cách pha chế : pha phin, túi lọc...\r\n\r\nCàfê Ro-Nes: Có mùi của tử đinh hương thơm lâu vùng vòm họng. Làm cho người thưởng thức nửa muốn nuốt xuống nửa muốn lưu giữ lại khoang miệng để \"nghe\" thêm một chút xíu nữa, một mùi hương thật khó quên.\r\n- phương pháp chế biến : dây chuyền bán tự động,\r\n- cách pha chế : pha phin và đặc biệt tốt dùng túi lọc...\r\n\r\nCàfê Ro-Cappu: Là sự kết hợp giữa phong cách uống châu Âu và châu Á. Vị đậm nhưng hương lại rất quyến rũ, rất thích hợp cho người uống nhiều lần trong ngày.\r\n- phương pháp chế biến : thủ công,\r\n- màu nước: nâu đen,\r\n- cách pha chế: pha phin...\r\n\r\nCàfê Ðà Lạt: Hương thơm và vị rất ngon, đậm đà thể chất, càfê uống xong vẫn để lại dư âm trong miệng cứ thơm mãi. Đây là loại càfê mà người tiêu dùng Đà Lạt rất ưa chuộng.\r\n- phương pháp chế biến : thủ công,\r\n- màu nước : nâu đậm hơi sánh,\r\n- cách pha chế : pha phin...\r\n\r\nCàfê Siêu Cấp: Trong quá trình chế biến, hãng Bosscafe đã nghiên cứu tạo ra độ keo sánh bằng cách cô đọng chất tan và chất dễ bay hơi trong càfê để tạo cho quý khách một cảm giác tận cùng của càfê. Đắng nhưng hậu ngọt và thực sự sảng khoái.\r\n- phương pháp chế biến : dây chuyền bán tự động,\r\n- màu nước : nâu đen sánh,\r\n- cách pha chế : pha phin...\r\n\r\nCàfê Darkess: Vị rất đậm, uống để tạo ra cảm giác lâng lâng, bồng bềnh cho ta liên tưởng tới những ý tưởng sáng tạo mới, hương thơm nhẹ nhàng quyến rũ\r\n- phương pháp chế biến : dây chuyền bán tự động,\r\n- màu nước : đen sánh,\r\n- cách pha chế : pha phin...', 'Moka là một giống cafe được người Pháp di thực từ những năm 30 của thế kỉ trước. Trồng ở độ cao 1700m, hương vị rất đặc biệt,...'),
(6, 'CÀ PHÊ VÀ SỨC KHỎE CỦA BẠN', 'cpvds.jpg', 'TT - Một lượng cà phê tương đối có thể ngăn ngừa hữu hiệu chứng tiểu đường. Các nghiên cứu đã chỉ ra rằng những người thường uống 4-6 tách cà phê mỗi ngày có thể giảm tới 28% nguy cơ nhiễm bệnh so với những người chỉ uống khoảng 2 tách hoặc ít hơn.\r\nNhững người uống trên 6 tách cà phê mỗi ngày giảm tới 35% nguy cơ nhiễm bệnh. Các nhà nghiên cứu của Na Uy cũng đã chỉ ra mối tương quan nghịch giữa thói quen uống cà phê với tỉ lệ các bệnh về tim mạch. Dựa vào dữ liệu tập hợp được từ 27.000 phụ nữ trong độ tuổi từ 55 đến 69 trong vòng 15 năm, người ta thấy rằng những phụ nữ thường uống từ 1-3 tách cà phê mỗi ngày giảm tới 24% nguy cơ về các bệnh tim mạch so với những người không hề uống tách cà phê nào.\r\nTuy nhiên, nếu uống quá nhiều (trên 6 tách cà phê mỗi ngày) thì những tác dụng của cà phê sẽ giảm đáng kể. Sau khi loại bỏ những vấn đề về rượu, tuổi tác và thuốc lá, các nhà nghiên cứu nhận thấy rằng những phụ nữ uống từ 1-5 tách cà phê mỗi ngày chỉ giảm được 15-19% nguy cơ tử vong so với những người không hề uống cà phê.\r\nHàm lượng các chất chống ôxi hóa trong cà phê cũng cao hơn trong nước nho, việt quất, quả mâm xôi và cam. Những hợp chất này có vai trò quan trọng trong việc ngăn ngừa nguy cơ gây viêm nhiễm tế bào. Điều này giải thích cho khả năng giảm nguy cơ viêm gan và ung thư gan do các nguyên nhân liên quan đến rượu. Hiện tượng này đã được nghiên cứu từ năm 1992 và mới được công bố vào tháng 6 trên tạp chí The Archives of Internal Medicine của Mỹ.\r\nBên cạnh đó, các nhà nghiên cứu cũng nhấn mạnh rằng đối với những người đã có tiền sử về tim mạch thì việc uống cà phê thật sự không phải là một điều tốt cho sức khỏe của họ, bởi caffein trong cà phê có thể gây tăng huyết áp và tăng nồng độ amino axit trong máu. Một số nhà nghiên cứu còn cho rằng hàm lượng caffein có trong 2 tách cà phê có thể làm giảm đáng kể lượng máu lưu thông vào tim, đặc biệt đối với những người làm việc trên cao.', 'Một lượng cà phê tương đối có thể ngăn ngừa hữu hiệu chứng tiểu đường. Các nghiên cứu đã chỉ ra rằng ...'),
(7, 'CÂU CHUYỆN LÃNG MẠN NHẤT VỀ SỰ PHÁT TRIỂN CỦA CAFÉ', 'caphelangman.jpg', 'Câu chuyện lãng mạn nhất về sự phát triển của Café và thức uống này đã lan truyền ra khắp thế giới một cách rộng rãi như thế nào, sẽ được hé lộ ở phần dưới.\r\nSự khởi đầu của Café bắt đầu nguồn từ mỏm Châu Phi (Horn of Africa) ở Ethiopia. Nơi mà café được cho là xuất hiện ở tỉnh Kaffa (Ethiopia). Đã có nhiều câu chuyện tưởng tượng không có thật nhưng có một câu chuyện không giống như vậy trong rất nhiều câu chuyện về sự khám phá về giá trị của hạt café rang này.\r\nCâu chuyện lãng mạn nhất về sự phát triển của Café và thức uống này đã lan truyền ra khắp thế giới một cách rộng rãi như thế nào, sẽ được hé lộ ở phần dưới.\r\nSự khởi đầu của Café bắt đầu nguồn từ mỏm Châu Phi (Horn of Africa) ở Ethiopia. Nơi mà café được cho là xuất hiện ở tỉnh Kaffa (Ethiopia). Đã có nhiều câu chuyện tưởng tượng không có thật nhưng có một câu chuyện không giống như vậy trong rất nhiều câu chuyện về sự khám phá về giá trị của hạt café rang này.\r\nMột câu chuyện đã được lan truyền từ thời những người chăn dê Ethiopian- Họ đã thực sự ngạc nhiên vì những hành đông kỳ qoặc của những con dê sau khi ăn những trái café chín. Họ chỉ biết một điều chắc chắn rằng đó là một loại thức ăn bổ dưỡng và được những người nô lệ trong các đồn điền sử dụng như một loại thức ăn, phổ biến từ Sudan tới Yemen và Arabia, cổng chính dẫn tới thế giới ngày nay.\r\nMocha được xem là một biểu tượng của café. Café chắc chắn đã được trồng ở Yemen vào thế kỷ 15 cũng có thể sớm hơn từ rất lâu trước đó. Ngày nay, Mocha là một cảng chính quan trọng trong hải trình tới Mecca và cũng là nơi tấp nập bận rộn nhất thế giới. Nhưng vào thời đó những người Arabs đã có lệnh cấm xuất khẩu bất cứ một loại hạt hay giống cây trồng nào. Vì vậy café không thể được trồng ở bất cứ một nơi nào khác. Hạt café chính là phần trong của trái cây café nhưng khi bỏ ra khỏi vỏ thì nó trở nên ít giá trị ở thời điểm đó.\r\nNhững cuộc đua âm thầm để mang những cây café giống hay hạt của nó đã diễn ra nhưng đều thất bại, tuy nhiên, người Đức (Dutch) đã thành công khi họ tới đây vào năm 1616. Chính những người này đã mang nó tới Hà Lan (Holland) để trồng và phát triển nó trong nhà kính (Green house).\r\nBan đầu những người Yemen được khuyến khích uống café, nó được xem là một thức uống cực kỳ hiệu quả hơn cả Kat, một loại cây bụi mà rễ và lá của nó được dùng để nhai như là một chất kích thích, giảm đau và có thể gây nghiện.\r\nQuán café được mở cửa đầu tiên ở Meca được gọi là “kaveh kanes” chúng nhanh chóng được phổ biến rộng rãi trong thế giới Aradb và đã rất thành công, nơi mà người ta có thể chơi cờ, tán gẫu, trao đổi, hát hò, nhảy nhót và thưởng thức nhạc. Họ trang hoàng chúng với những thứ xa xỉ và theo những phong cách cá nhân đặc trưng. Không một nơi nào được như các quán café đã tồn tại trong thời kỳ đó. Một nơi mà sự giao tiếp xã hội và các hoạt động kinh doanh có thể được bàn luận một cách thoải mái ở khắp mọi nơi nhưng không phải tất cả mọi người đều có thể tới đó vì giá của thức uống café này quá mắc.\r\n\r\nCác quán Café phong cách Arab đã sớm trở thành các trung tâm về các hoạt đông chính trị và sự cấm đoán đã được chính quyền thời đó đưa ra nhằm hạn chế sự phát triển của nó Café và các quán Café đã từng bị ngăn cấm nhiều lần trong nhiều thế kỷ sau đó nhưng nó vẫn cố tồn tại ở những dạng khác nhau cho dù có lệnh cấm. Thậm chí một giải pháp đã được đưa ra đó là đánh thuế rất cao vào café và các quán café.', 'Câu chuyện lãng mạn nhất về sự phát triển của Café và thức uống này đã lan truyền...'),
(8, 'CÁC MỐC CHÍNH LỊCH SỬ CAFÉ', 'lichsucafe.jpg', 'Người ta kể lại rằng: Một chàng chăn dê tò mò đã khám phá ra café là một thức uống tuyệt vời\r\nGiữa những năm 800: Những người Hồi Giáo ở Ađen được ghi nhận là những người uống café đầu tiên.\r\n1453 Thổ Nhĩ Kì ban hành luật lệ mới, cho phép một phụ nữ li dị chồng mình nếu không chịu đưa café cho cô ta.\r\ncafé trở nên phổ biến ở châu Âu, tuy bị cấm ở một vài nơi.\r\nVua Pope Clement VIII cấm việc uống café.\r\n1511 Thủ tướng một nước Hồi giáo, Khair Beg, ra lệnh cấm café vì sợ nó gây những ý kiến phản đối do luật lệ mà ông ta đặt ra. Kết quả là ông đã bị sát hại bởi những người Sultan.\r\n1570 Cùng với thuốc lá, café lần đầu tiên xuất hiện tại Venice\r\nCuối thế kỷ 15: café ngày nay được sáng chế\r\n1600 Thông qua những nhà buôn người Ý, các nước phương Tây lần đầu tiên biết đến café\r\n1645 Tiệm café đầu tiên được khai trương ở Ý\r\n1650 café được ưa thích cuồng nhiệt tại Ấn Độ\r\n1652 Tiệm café đầu tiên ở Anh được mở cửa\r\n1656 Việc uống café và mở tiệm café bị cấm tại Thổ Nhĩ Kỳ\r\n1669 café trở nên phổ biến ở Châu Âu\r\n1672 Tiệm café đầu tiên ở Pháp được mở cửa\r\n1690 Người Hà Lan trở thành những người đầu tiên kinh doanh và gieo trồng café như một thương phẩm, tại Ceylon và Java\r\n1668 café đã thế chỗ bia, trở thành thức uống bữa sáng được yêu thích nhất tại New York\r\n1697 Thuyền trưởng John Smith giới thiệu café với thị trường Bắc Mỹ\r\n1714 café xuất hiện chính thức tại Mỹ\r\n1721 Tiệm café đầu tiên ở Beclin được khai trương\r\n1732 Johann Sebastian Bach sáng tác ra bản Kanata café (Coffee Canata)\r\n1773 Uống café được coi là “nghĩa vụ quốc gia” đối với mỗi công dân Mỹ\r\n1822 Máy espresso đầu tiên được tạo ra tại Pháp\r\n1825 café xuất hiện ở Haoai\r\n1865 James Mason phát minh ra máy pha café(percolator)\r\n1887 café xuất hiện ở Indochina\r\n1896 café được giới thiệu với người Úc\r\nĐầu những năm 1900: Uống café vào bữa trưa trở thành một thời gian “bắt buộc” ở Đức\r\n1901 Luigi Bezzera phát minh ra máy chiết tách hương vị của café\r\n1901 café uống liền (instant coffee) được phát minh bởi một nhà hoá học người Mỹ gốc Nhật\r\n1908 Melitta Benz phát minh ra phin pha café\r\n1909 café uống liền được tung ra thị trường\r\n1938 Nescafe (café sấy bằng phương pháp đông lạnh) được phát minh\r\n1942 Trong chiến tranh thế giới thứ hai, lính Mỹ được phát khẩu phần gồm cả café uống liền hiệu Maxwell House\r\n1971 Hãng café Starbuck mở đại lý đầu tiên tại Seattle\r\nCho đến hiện nay café được công nghiệp hoá và trở thành nông phẩm quan trọng nhất của ngành nông nghiệp, doanh thu chỉ đứng sau bông.', 'Người ta kể lại rằng: Một chàng chăn dê tò mò đã khám phá ra café là một thức uống tuyệt vời ... '),
(9, 'MỘT TÍ VỀ CÀ PHÊ', 'mottivecaphe.jpg', 'Người Việt ta thường dùng nước trà hoặc miếng trầu là đầu câu chuyện.\r\nVới các quốc gia Tây phương, mời nhau uống cà phê là tượng trưng cho lòng  hiếu khách. Người ta rủ nhau ra quán làm ly cà phê để có cơ hội tâm sự, đấu láo cũng như bàn bạc chuyện này chuyện nọ. Tại công sở khắp nơi, cà phê thường được pha sẵn để mọi người dùng trong lúc làm việc cũng như vào giờ giải lao. Nhiều người đă đồng nghĩa cà phê với tình bạn và sự thư giăn tâm hồn.Còn đối với các bạn học sinh sau nhiều giờ học, ít giờ ngủ thì cà phê là ly thần dược giúp đầu óc tỉnh táo. Cho nên vừa thức giấc vào buổi sáng mà thưởng thức ly cà phê mới pha thơm phức; ăn bữa cơm trưa lại kèm theo chai nước coca lạnh hoặc thư giăn ở nhà buổi tối với tách nước trà Mạn Hảo, thì trong những nguồn lạc thú đó đều có chung một chất: chất caffeine.\r\nthường dùng nước trà hoặc miếng trầu là đầu câu chuyện.\r\nVới các quốc gia Tây phương, mời nhau uống cà phê là tượng trưng cho lòng  hiếu khách. Người ta rủ nhau ra quán làm ly cà phê để có cơ hội tâm sự, đấu láo cũng như bàn bạc chuyện này chuyện nọ. Tại công sở khắp nơi, cà phê thường được pha sẵn để mọi người dùng trong lúc làm việc cũng như vào giờ giải lao. Nhiều người đă đồng nghĩa cà phê với tình bạn và sự thư giăn tâm hồn.Còn đối với các bạn học sinh sau nhiều giờ học, ít giờ ngủ thì cà phê là ly thần dược giúp đầu óc tỉnh táo. Cho nên vừa thức giấc vào buổi sáng mà thưởng thức ly cà phê mới pha thơm phức; ăn bữa cơm trưa lại kèm theo chai nước coca lạnh hoặc thư giăn ở nhà buổi tối với tách nước trà Mạn Hảo, thì trong những nguồn lạc thú đó đều có chung một chất: chất caffeine.\r\nTừ lâu, Caffeine đă được coi như một thứ thuốc có tác dụng kích thích và là một gia vị thực phẩm. Nước uống có chất caffeine đă được thông dụng từ nhiều ngàn năm trên khắp trái đất.\r\nDù caffeine đă là một trong những chất được nghiên cứu rộng răi nhưng vẫn c̣n nhiều quan điểm khác nhau cũng như ngộ nhận về chất có khả năng một phần nào ảnh hưởng tới tâm tính con người này.', 'Người Việt ta thường dùng nước trà hoặc miếng trầu là đầu câu chuyện...'),
(10, 'PHÁT HIỆN MỚI VỀ CAFFEINE VÀ BỆNH TIỂU ĐƯỜNG', 'tieuduong.jpg', 'Chất caffeine có thể tìm thấy trong cà phê, trà, và nhiều loại nước uống khác.Theo các nhà nghiên cứu của trung tâm y học tại đại học Duke ở Durham, bắc Carolina, khi cho những người mắc bệnh tiểu đường tuýp 2 dùng những chất có chứa caffeine, lượng đường trong máu của họ tăng lên trong suốt cả ngày, đặt biệt là sau bữa ăn.\r\nTrong một phỏng vấn qua điện thoại, ông James Lane, nhà tâm lí học, người dẫn đầu chương trình này đã cho biết rằng: “Caffeine có vẻ như đã làm gián đoạn quá trình trao đổi chất, điều này rất có hại đến những người mắc bệnh tiểu đường ở tuýp 2.” \r\n\r\nChất caffeine có thể tìm thấy trong cà phê, trà, và nhiều loại nước uống khác. \r\n\r\nBệnh tiểu đường xuất hiện khi lượng đường glucozo trong máu tăng quá cao. Đường trong máu quá cao sẽ có thể dẫn đến sự tổn hại về mắt, thận, thần kinh. Ngoài ra, bệnh tiểu đường cũng có thể dẫn đến bệnh tim mạch, đột quỵ và ngay cả việc phải cắt bỏ các chi. Bệnh tiểu đường loại 2 còn có liên quan đến bệnh béo phì. \r\n\r\nPhát hiện mới này dường như mâu thuẫn với những nghiên cứu trước đây. Các nghiên cứu trước đây chỉ ra rằng uống cà phê có thể giúp giảm các rủi ro do bệnh tiểu đường tuýp 2 gây ra; càng uống nhiều cà phê thì nguy cơ càng thấp. \r\n\r\nCác nhà nghiên cứu đã dùng một kĩ thuật mới – sử dụng một máy phát tín hiệu glucozo nhỏ nằm dưới da – để kiểm tra mức độ glucozo ở 10 người với độ tuổi trung bình là 63. \r\n\r\nVào ngày mà những người tham gia được cho dùng khoảng 4 ly cà phê, lượng đường trung bình trong máu tăng lên 8% so với những ngày họ không dùng caffeine. \r\n\r\nÔng Lane cho biết: “Điều đó có nghĩa là, khi những người mắc bệnh tiểu đường loại 2 khi dùng những loại thức uống có caffeine, trong suốt cả ngày đó lượng đường trong máu sẽ tăng lên cao hơn so với những ngày mà họ không dùng caffeine.” \r\n\r\n“Đối với một số người nghiện caffeine, họ có thể cho rằng điều này là phóng đại, uống cà phê không thể gây tác dụng như vậy. Tuy nhiên, sự thật vẫn là sự thật, và họ sẽ nhận ra rằng bỏ cà phê cũng không phải là khó lắm.” \r\n\r\nCaffeine có thể cản trở quá trình chuyển hóa glucozo từ máu sang cơ bắp và những tế bào khác trong cơ thể sẽ bị đốt cháy để dùng làm nguyên liệu. Caffeine còn đẩy mạnh sự xuất hiện của hoocmon adrenaline, một chất làm tăng lượng đường glucozo trong máu. \r\n\r\nTrong khi đó một số nghiên cứu gần đây đã đưa ra nhiều kết luận khác nhau về tác dụng của caffeine đối với sức khỏe con người. \r\n\r\nChẳng hạn, Những nhà nghiên cứu Mĩ cho biết rằng phụ nữ mang thai nếu dùng hơn 2 tách cà phê mỗi ngày sẽ có nhiều nguy cơ bị sẩy thai hơn những người không uống. Những nhà nghiên cứu khác thì lại cho biết, caffeine có thể giúp phụ nữ giảm thiểu nguy cơ ung thư buồng trứng. ', 'Chất caffeine có thể tìm thấy trong cà phê, trà, và nhiều loại nước uống khác...'),
(11, 'UỐNG CÀ PHÊ ĐỂ GIẢM NGUY CƠ MẮC BỆNH ĐÁI ĐƯỜNG', 'daiduong.jpg', 'Các nhà nghiên cứu ở Phần Lan vừa phát hiện ra rằng, uống cà phê mỗi ngày có thể giúp bạn giảm thiểu nguy cơ mắc bệnh đái đường. \r\nTheo thông tin hãng thông tấn STT của Phần Lan đưa ra, sau khi tiến hành nghiên cứu với 60.000 người, nhà nghiên cứu Siamak Bidel ở Viện Nghiên cứu Sức khoẻ cộng đồng quốc gia vừa nhận thấy mối liên quan giữa việc uống cà phê và bệnh đái đường.\r\nTheo đó, ông Siamak Bidel cho biết, việc sử dụng nhiều cà phê, cả loại có cafein và loại không có cafein đều có khả năng giảm nguy cơ mắc bệnh đái đường type 2 ở những người thừa cân và ở những người uống nhiều đồ uống có cồn. Tuy nhiên, hiệu quả còn phụ thuộc vào loại cà phê mà bạn lựa chọn. \r\n\r\nCũng theo bản nghiên cứu, những thành phần có trong cà phê đóng vai trò quan trọng trong việc giảm thiểu những nguy cơ mắc bệnh đái đường. Nếu mỗi ngày bạn uống 1 ly cà phê thì điều này có thể giúp bạn giảm 13% nguy cơ mắc bệnh. Nếu uống 2 - 3 ly có thể giảm được 43% nguy cơ mắc bệnh. Nếu uống 4 ly trở lên, nguy cơ mắc bệnh giảm 47%. \r\n\r\nTại Phần Lan, nửa triệu trên tổng số 5,3 triệu người mắc bệnh đái đường. Theo thống kê, người dân Phần Lan là những người tiêu thụ cà phê nhiều nhất trên thế giới với khối lượng trung bình khoảng 12kg cà phê trong một năm. ', 'Các nhà nghiên cứu ở Phần Lan vừa phát hiện ra rằng, uống cà phê mỗi ngày có thể giúp bạn...'),
(12, 'NẾU UỐNG Ở MỨC ĐỘ HỢP LÝ THÌ CÀ PHÊ THỰC SỰ TỐT CHO CƠ THỂ NAM GIỚI', 'caphetot.jpg', 'Cà phê có thể uống ở rất nhiều nơi và lý do khiến nhiều người cho rằng nó không tốt là vì nó có những tác dụng phụ như đau nửa đầu, tăng nhịp tim. Nhưng nếu bạn không gặp phải những tác dụng phụ này thì cà phê là đồ uống hữu dụng cho bạn\r\n\r\nNếu uống ở mức độ hợp lý thì cà phê thực sự tốt cho cơ thể nam giới. Người ta đã chứng minh cà phê có tác dụng giảm nguy cơ ung thư gan và giảm bớt các triệu chứng của bệnh Alzheimer và Parkinson. \r\nCà phê có thể uống ở rất nhiều nơi và lý do khiến nhiều người cho rằng nó không tốt là vì nó có những tác dụng phụ như đau nửa đầu, tăng nhịp tim. Nhưng nếu bạn không gặp phải những tác dụng phụ này thì cà phê là đồ uống hữu dụng cho bạn.', 'Cà phê có thể uống ở rất nhiều nơi và lý do khiến nhiều người cho rằng ...');

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
(19, ' 1 Cà phê nâu,2 Trà cúc,', '', 41, 2, 'Truong NA', '2023-11-25 11:55:33', 73000, 1),
(20, ' 2 Latte,1 Cà phê nâu,', '', 42, 1, '', '2023-12-01 13:43:31', 133000, 1);

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
(41, 'Truong NA', '0254879653', 'na@gmail.com', 'Hai Phong', 'khong'),
(42, '', '', '', '', 'khong');

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
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hten` varchar(255) NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ndung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hten`, `sdt`, `email`, `ndung`) VALUES
(1, 'Tran', 254684163, 'aoksfapo@gaofak', 'aokfpoa[sf');

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
(3, 'Lê Công Minh', 'kh3.jpg', '\"View quán đẹp, rộng rãi, thoáng mát, đồ uống ngon, nhân viên phục vụ tốt\"'),
(4, 'Khách ẩn danh', 'kh3.jpg', 'Cafe ngon, chất lượng trên cả sự mong đợi');

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
(1, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe', '20', '2023-11-01', 0),
(2, 'GSJOK456', 'Ưu đãi khai chương Mộc Cafe 2', '20', '2024-11-01', 0),
(3, 'LPSPKF59', 'Chào mừng đến Mộc Cafe', '10', '2024-11-01', 0),
(4, 'DHDT0001', 'Khuyến mãi đơn hàng đầu tiên', '50', '2024-11-01', 0),
(5, 'FREESHIP', 'Miễn phí giao hàng', '5', '2024-11-01', 0),
(6, 'LKJDLGDS', 'Ưu đãi khách hàng mới', '10', '2024-10-11', 0);

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
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `iddon_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `id_kho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idrate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
