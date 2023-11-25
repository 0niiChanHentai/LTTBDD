<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css">
        <link rel="stylesheet" href="../frontend/css/menu.css">
        <link rel="stylesheet" href="../frontend/css/slider.css">
        <link rel="stylesheet" href="../frontend/css/rate.css">
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

            <div class="context">
                <div class="redirect" style="margin-top:50px">
                    <div>
                        <a href="../frontend/about.php"><img src="../frontend/picture/about-us.jpg" width="70px" height="70px"></a>
                        </br>
                        <p>Về chúng tôi<p>
                    </div>
                    <div>
                        <a href="../frontend/writter.php"><img src="../frontend/picture/note.jpg" width="70px" height="70px"></a>
                        </br>
                        <p>Bài viết<p>
                    </div>
                    <div>
                        <a href="../frontend/voucher.php"><img src="../frontend/picture/voucher.jpg" width="70px" height="70px"></a>
                        </br>
                        <p>Voucher<p>
                    </div>
                </div>
                <div class="sale">
                    <img src="../frontend/picture/slider2.jpg" alt="sale-img">
                    <h3>
                        <span id="span1">Ưu đãi cực sốc</span>
                        <br/>
                        <span id="span2">Giảm 30.000 vnđ cho đơn hàng trên 150.000 vnđ</span>   
                        <br/>
                        <button class="more" onclick="window.location.href='../frontend/voucher.php'">Xem thêm</button>
                    </h3>
                </div>
                <div class="news">
                    <h1>Một số sản phẩm nổi bật</h1>
                    <div class="sp-float">    
                        <div class="show" style="text-align:center">
                            <img src="../frontend/picture/black_coffee.jpg" alt="img" width="150px" height="150px">
                            <p>Cà phê đen</p>
                        </div>
                        <div class="show" style="text-align:center">
                            <img src="../frontend/picture/cappuchino.jpg" alt="img" width="150px" height="150px">
                            <p>Cappuchino</p>
                        </div>
                        <div class="show" style="text-align:center">
                            <img src="../frontend/picture/orange_juice.jpg" alt="img" width="150px" height="150px">
                            <p>Nước cam</p>
                        </div>
                    </div>
                </div>
                <div class="rate">
                    <h1>Đánh giá của khách hàng</h1>
                    <div class="rate-display">
                        <div class="complain">
                            <img src="../frontend/picture/nv1.jpg">
                            <h3>Khách hàng 1</h3>
                            <p class="customer-complain" >
                                Cac san pham da dang, gia tien hop ly, cac ban sinh vien hoc sinh deu co the trai nghiem . 5* cho chat luong va thai do phuc vu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-nvtitle">
                    <h2>Thành viên của nhóm</h2>
                </div>
                <div class="about-nv">
                        <?php
                            $conn=mysqli_connect("localhost","root","","quancaphe");
                            $sqlnv="SELECt * FROM nhan_vien";
                            $resultnv = mysqli_query($conn, $sqlnv);
                            foreach($resultnv as $nv){
                                ?>
                            <div class="nv">
                                <img src="../frontend/picture/<?php echo $nv['anh_nv']?>"/>
                                <h3><?php echo $nv['hoten']?><h3>
                                <h3><?php echo $nv['vitri']?><h3>
                            </div>    
                                <?php
                            }
                        ?>
                </div>
            </div> 
            <div class="footer">
                <div class="info">
                    <?php
                        include "../frontend/same/footer.php";
                    ?>       
                </div>
            </div>  
        </div>
    </body>
</html>