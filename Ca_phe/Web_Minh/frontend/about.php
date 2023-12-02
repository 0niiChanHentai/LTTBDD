<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css">
        <link rel="stylesheet" href="../frontend/css/slider.css">
        <link rel="stylesheet" href="../frontend/css/menu.css">
        <style>
            h1{
                width:100%;
                margin:auto;
                text-align:center;
            }
            p{
                font-weight:lighter;
                font-size:20px;
                width:80%;
                margin:auto;
                text-indent:30px;
            }
            .about-row{
                margin-top:20px;
                width:70%;
                margin-left:auto;
                margin-right:auto;
            }
            .imga{
                width: 100%;
                border-radius: 20px;
            }
        </style>
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "../frontend/same/menu.php";
                ?>
            </div>          
            <div class="slider">
                <?php
                    include "../frontend/same/slider.php";
                ?>
                <script src="../frontend/js/slider.js"></script>
            </div>
            <div class="about">
                <br>
                <br>
                <h1>Mộc Cafe</h1>
                <div class="about-row">
                    <img class="imga" src="../frontend/picture/moc4.jpg" style="width:100%">
                </div>
                <br>
                <p>Nếu đây không phải là Sài Gòn mà là thủ đô Hà Nội cổ kính, thì thứ dư vị của cuộc sống chính là tách trà ấm nóng, đúng như cái vẻ trầm tĩnh của Hà Nội vậy. Còn tại mảnh đất Sài Gòn hối hả, người ta sẽ chọn cho mình một loại cà phê để thưởng thức. Cà phê có một điểm chung với những con người Sài Gòn, chính vì nó chỉ có một màu đen và một vị đắng rất đặc trưng, nhưng lại được thưởng thức bằng nhiều cách khác nhau.

                    Cũng như người Sài Gòn chỉ có mỗi cái tính thẳng thắn, thật thà mà nhiều người khi tiếp xúc rồi mới nhận thấy được nhiều dáng vẻ khác nhau trong họ. Ở đây người ta hẹn hò cũng cà phê, làm việc cũng cà phê, cô đơn cũng cà phê, sáng cũng cà phê, tối cũng cà phê. Đến lời tỏ tình “anh yêu em” cũng được thay bằng “mình cà phê nhé”. Tất cả mọi thứ đều thành “cà phê”, như một câu cửa miệng quen thuộc.
                </p>
                <br><br>
                <h1>SỨ MỆNH VÀ GIÁ TRỊ</h1>
                <div class="about-row">
                    <img class="imga" src="../frontend/picture/moc3.jpg" style="width:100%">
                </div>
                <p>Mộc mong muốn đưa sự thuần khiết của sản phẩm, giúp khách hàng cảm nhận được sự tinh tế trong nét văn hóa ẩm thực của người Việt.
Với phương châm <strong>“Quen thuộc như về nhà”</strong>. Ngoài sản phẩm phục vụ tại chỗ, Mộc cung cấp sản phẩm mang đi để khách hàng có thể sử dụng mọi lúc, mọi nơi. . Chỉ cần bạn đến, Mộc sẽ cố gắng trở thành nơi bạn gọi là “NHÀ” để qua đêm và làm những điều bạn muốn. Luôn cố gắng tìm hiểu các nguồn nguyên liệu tốt nhất để nhận được sự tin cậy và yêu mến từ khách hàng.</p>
                <br><br>
                <h1>VĂN HÓA</h1>
                <div class="about-row">
                    <img class="imga" src="../frontend/picture/moc2.jpg" style="width:100%">
                </div>
                <p>Mộc không chỉ truyền cảm hứng đến những người yêu cà phê mà Mộc còn truyền cảm hứng cho đội ngũ nhân viên nhằm chăm chút từng sản phẩm để hương vị cafe quyến rũ kia chạm đến được trái tim của bạn, đem lại sự tin tưởng và yêu mến của khách hàng.
Qua đó, Mộc cố gắng tái hiện lại một bức tranh gắn liền với văn hóa người Việt, từ môi trường sinh hoạt ấm cúng, gần gũi với thiên nhiên đến những bản sắc thông qua thói quen đọc báo và đọc sách hàng ngày.</p>
                <br><br>
                <h1>Chân ngôn của Mộc</h1>
                <div class="about-row">
                    <img class="imga" src="../frontend/picture/moc.jpg" style="width:100%">
                </div>
            </div>
            <div class="footer">
                <div class="info">
                    <?php
                        include"../frontend/same/footer.php";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>