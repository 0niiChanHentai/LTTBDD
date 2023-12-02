<?php
    $conn=mysqli_connect("localhost","student","123456","quancaphe");
    if(isset($_POST['complain'])){
        $tenkh = $_POST['tenkh'];
        $rate = $_POST['rate'];
        $time = date("G:i:s");
        $mor = "06:00:00";
        $aft = "14:00:00";
        $eve = "22:00:00";
        if(strtotime($time)>strtotime($mor) && strtotime($time)<=strtotime($aft)){
            $profile = "kh2.jpg";
        }else if(strtotime($time)>strtotime($aft) && strtotime($time)<=strtotime($eve)){
            $profile = "kh1.jpg";
        }else{
            $profile = "kh3.jpg";
        }

        $sql = "INSERT INTO rate(tenkh,profile,rate) VALUES ('$tenkh','$profile','$rate')";
        $query = mysqli_query($conn,$sql);
        echo "
            <script>
                alert('Cảm ơn phản hồi của khách hàng. Mộc sẽ cố gắng cải thiện');
            </script>
             ";
        header("../frontend/complain.php");
    }

?>

<!DOCTYPE html>
<head>
    <title>Mộc Cafe</title>
    <meta charset="utf-8" lang="vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
    <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
    <link rel="stylesheet" href="../frontend/css/slider.css">
    <link rel="stylesheet" href="../frontend/css/complain.css">
</head>
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
        <div class="contact">
            <h1 style="text-align:center;width:100%">Ý kiến khách hàng</h1>
            <div>
                <div class="contact-l" style="width:80%;margin-left:auto;margin-right:auto">
                    <form action="../frontend/complain.php" method="post">
                        <input type="text" placeholder="Họ & tên" name="tenkh" style="display:block;margin-left:auto;margin-right:auto;width:400px;margin-top:10px;height:20px">  
                        <textarea placeholder="Phản hồi của khách hàng" name="rate" style="display:block;margin-left:auto;margin-right:auto;width:400px;margin-top:10px;height:150px;text-align:start" cols="40" rows="5"></textarea>
                        <button type="submit" name="complain" style="display:block;margin-left:auto;margin-right:auto;width:100px;height:40px;margin-top:20px">Đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="text">
            <h1>Đánh giá của các khách hàng trước</h1>
        </div>
        <div class="custom">
            <?php
                $sqlcus = "SELECT * FROM rate ORDER BY idrate DESC LIMIT 5 OFFSET 0";
                $cusquery = mysqli_query($conn,$sqlcus);
                foreach($cusquery as $cus){
            ?>
                    <div class="cus-show">
                        <img src="../frontend/picture/<?php echo $cus['profile']?>">
                        <div class="txt">
                            <h2><?php echo $cus['tenkh']?></h2>
                            <p><?php echo $cus['rate']?></p>
                        </div>
                    </div>        
            <?php
                } 
            ?>
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