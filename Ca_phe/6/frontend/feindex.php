<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/slider.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/rate.css" type="text/css">
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
                <!-- <h6 class="sc_section_subtitle sc_item_subtitle::before">
                    Mộc Cafe!
                </h6> -->
                <div class="sale">
                    <img src="../frontend/picture/shop.jpg" alt="sale-img">
                    <h3>
                        <span id="span1">Mộc Cafe</span>
                        <br/>
                        <span id="span2">Cafe rang xay thủ công kết hợp với view đẹp đất trời</i></span>
                        <br/>
                        <span id="span2">Sự kết hợp hoàn hảo dành cho những người yêu Cafe</i></span>   
                        <br/>
                    </h3>
                </div>
                <div class="news">
                    <h1>Một số sản phẩm nổi bật</h1>
                    <div class="sp-float">    
                        <?php
                            $conn = mysqli_connect("localhost","student","123456","quancaphe"); 
                            $spfloat = "SELECT * FROM san_pham LIMIT 3 OFFSET 2";
                            $spfquery = mysqli_query($conn, $spfloat);
                            foreach ($spfquery as $spf){
                        ?>
                        <div class="show" style="text-align:center">
                            <img src="../frontend/picture/<?php echo $spf['hinhanh'] ?>" alt="img" width="150px" height="150px">
                            <p><a href="../frontend/product_info.php?id=<?php echo $spf['masp']?>"><?php echo $spf['tensp'] ?></a></p>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="promo">
                    <h3>
                        <span id="span1">Đội ngũ nhân viên được đào tạo bài bản</span>
                        <br/>
                        <span id="span2">Đội ngũ nhân viên giàu kinh nghiệm, được đào tạo bài bản</i></span>
                        <br/>
                        <span id="span2">Sẽ mang đến cho thực khách một trải nghiệm thức uống chất lượng</i></span>   
                        <br/>
                    </h3>
                    <img src="../frontend/picture/gioithieu.jpg" alt="sale-img">
                </div>
                            <br>
                <div class="about-nvtitle">
                    <h2>Nhân viên của quán</h2>
                </div>
                <div class="about-nv">
                        <?php
                            $sqlnv="SELECT * FROM nhan_vien ORDER BY id ASC LIMIT 3 OFFSET 0";
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
                <br/>
                <div class="rate">
                    <h1>Đánh giá của khách hàng</h1>
                    <div class="rate-display">
                        <?php
                            $rate = "SELECT * FROM rate ORDER BY idrate ASC LIMIT 3 OFFSET 0";
                            $ratequery = mysqli_query($conn, $rate);
                            // echo $ratequery;
                            foreach($ratequery as $rates){
                        ?>
                        <div class="complain">
                            <img src="../frontend/picture/<?php echo $rates['profile']?>">
                            <h3><?php echo $rates["tenkh"]?></h3>
                            <p class="customer-complain" >
                                <?php echo $rates['rate']?>    
                            </p>
                            <a class="prev" onclick="changeRates(-1)">❮</a>
                            <a class="next" onclick="changeRates(1)">❯</a>
                        </div>
                        <?php
                            }
                        ?>
                        <script>
                            var rateIndex = 0;
                            var rates = document.getElementsByClassName("complain");
                            function showRates(n){
                                for(let i=0;i<rates.length;i++){
                                    if(i==n){
                                        rates[i].style.display = "block";
                                    }else{
                                        rates[i].style.display = "none";
                                    }
                                }
                            }

                            function changeRates(n){
                                if(rateIndex+n>=rates.length){
                                    rateIndex=0;
                                }
                                else if(rateIndex+n<0){
                                    rateIndex=rates.length-1;
                                }
                                else{
                                    rateIndex += n;
                                }
                                showRates(rateIndex);
                            }

                            function autoRates(n){
                                showRates(n);
                            }

                            showRates(rateIndex);
                        </script>
                    </div>
                </div>
            </div> 
            <br><br>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.0523828781725!2d106.68701387433309!3d20.8295910945914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a71e10a700d3d%3A0xf727ddd15e8b33e8!2zTeG7mWMgQ2FmZQ!5e0!3m2!1svi!2s!4v1701148346520!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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