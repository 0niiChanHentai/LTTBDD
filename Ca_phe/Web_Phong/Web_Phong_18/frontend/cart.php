<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/cart.css" type="text/css">
        <script src="../frontend/js/cart.js"></script>
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "same/menu.php";
                ?>
            </div> 
            <div class="cart">
                <h2>Giỏ hàng | <a href="">Đơn đang giao</a> | <a href="">Đơn đã hoàn thành</a></h2>
                <div class="list-cart">
                    <?php
                        session_start();
                        if($_SESSION['cart'] != null){ 
                    ?>
                    <table class="list">
                        <thead>
                            <td>STT</td>
                            <td>Ten san pham</td>
                            <td>Hinh anh</td>
                            <td>So luong</td>
                            <td>Don gia</td>
                            <td>Chuc nang</td>
                        </thead>
                        <?php 
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
                            <td>
                                <span>
                                    <!-- <button class="decrease" onclick="decrease">-</button> -->
                                    &ensp;<?php echo $val[3] ?>&ensp;
                                    <!-- <button class="increase" onclick="increase">+</button> -->
                                </span>
                            </td>
                            <td id="price"><?php echo $val[4]?> VND</td>
                            <td><button type="button" class="del-sp"><a href="del.php?id=<?php echo $stt-1 ?>">Xoa</a></button></td>
                        </tbody>
                        
                        <?php
                                $stt++;
                            }
                        ?>
                    </table>
                </div>
                <div>
                    <h2 class="total">Tong tien: <?php echo $tong?> VND</h2>
                    <button type="button" class="cash"><a href="../frontend/order.php">Thanh toan ngay</a></button>
                </div>
                <?php
                    }else{
                        ?>
                    <br/>
                    <br/>
                    <br/>
                    <h2 style="text-align:center">Hiện không có đơn hàng trong giỏ hàng</h2>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <?php
                    }
                ?>
            </div>
        </div>
        <div class="info">
            <?php
                include 'same/footer.php';
            ?>
        </div>
    </body>
</html>