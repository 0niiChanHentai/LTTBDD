<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/slider.css">
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "same/menu.php";
                ?>
            </div>          
            <div class="slider">
                <?php
                    include "same/slider.php";
                ?>
                <script src="../frontend/js/slider.js"></script>
            </div>
            <div class="contact">
                <h1 style="text-align:center">Liên hệ với chúng tôi</h1>
                <div style="display:flex">
                    <div class="contact-l" style="float:left;width:55%;padding-left:50px">
                        <input type="text" placeholder="Họ & tên" name="hten" style="margin-left:150px;width:400px;margin-top:10px;height:20px">  
                        <input type="text" placeholder="SĐT" name="sdt" style="margin-left:150px;width:400px;margin-top:10px;height:20px">
                        <input type="text" placeholder="Email" name="email" style="margin-left:150px;width:400px;margin-top:10px;height:20px">
                        <textarea placeholder="Nội dung" name="ndung" style="margin-left:150px;width:400px;margin-top:10px;height:150px;display:block" cols="40" rows="10"></textarea>
                        <button type="button" name="sent" style="margin-left:250px;width:100px;height:40px;margin-top:20px">Gửi yêu cầu</button>
                    </div>
                    <div class="contact-r" style="width:44%;border-left:1px solid black; padding-left:40px">
                        <h2>Trụ sở Hải Phòng</h2>
                        <h4>SĐT: 0123456789</h4>
                        <h4>Email: CafeMoc24@gmail.com</h4>
                        <h4>Địa chỉ: </h4> 
                    </div>
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