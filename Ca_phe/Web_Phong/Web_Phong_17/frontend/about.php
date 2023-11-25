<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/frontend/css/feindex.css">
        <link rel="stylesheet" href="/frontend/css/slider.css">
        <link rel="stylesheet" href="/frontend/css/menu.css">
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
            <div class="about" style="margin-top:50px">
                <div class="about-row" style="display:flex;background-color:darkgrey">
                    <img src="../frontend/picture/moc.jpg" height="450px">
                    <span style="margin-left:40px;margin-top:80px;text-align:center">  
                        <h1>Mộc Cafe</h1>
                        <h2>Những hạt cà phê được chọn lọc tự nhiên</h2>
                        <h3>Đến với chúng tôi để thưởng thức</h3>    
                        <h3>các loại Cafe tốt nhất</h3>
                    </span>
                </div>
                <div class="about-row">

                </div>
                <div class="about-row">

                </div>
                <div class="about-row">

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