<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/cart.css" type="text/css">
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "same/menu.php";
                ?>
            </div> 
            <div class="cart">
                <h2>Đơn hàng | <a href="../frontend/cart.php">Giỏ hàng</a> | <a href="">Đơn đang giao</a> | <a href="">Đơn đã hoàn thành</a></h2>
                <div class="list-cart">
                    <table class="list">
                        <thead>
                            <td>STT</td>
                            <td>Ten san pham</td>
                            <td>Hinh anh</td>
                            <td>So luong</td>
                            <td>Don gia</td>
                        </thead>
                        <?php 
                            session_start(); 
                            $tong=0;
                            $stt=1;
                            foreach($_SESSION['cart'] as $val){
                                $gtsp=$val[3]*$val[4];
                                $tong+=$gtsp;   
                        ?>
                        <tbody>
                            <td><?php echo $stt?></td>
                            <td><?php echo $val[1]?></td>
                            <td><img src="../frontend/picture/<?php echo $val[2]?>" class="img-sp-cart"></td>
                            <td><?php echo $val[3]?></td>
                            <td><?php echo $val[4]?> VND</td>
                        
                        <?php
                                $stt++;
                            }
                        ?>
                    </table>
                </div>
                <div>
                    <h2 class="total">Tong tien: <?php echo $tong?> VND</h2>
                </div>
                <div class="info-check">
                    <form action="checkout.php" method="post">
                        <input type="text" placeholder="Họ & tên" name="hten" style="margin-left:150px;width:400px;margin-top:10px;height:20px">  
                        <input type="text" placeholder="SĐT" name="sdt" style="margin-left:150px;width:400px;margin-top:10px;height:20px">
                        <textarea placeholder="Nội dung" name="ndung" style="margin-left:150px;width:400px;margin-top:10px;height:150px;display:block" cols="40" rows="10"></textarea>
                        <button type="button" name="sent" style="margin-left:250px;width:100px;height:40px;margin-top:20px">Gửi yêu cầu</button>
                        </form>
                </div>
            </div>
            <div class="info">
                    <?php
                        include"../frontend/same/footer.php";
                    ?>
                </div>  
        </div>
    </body>
</html>