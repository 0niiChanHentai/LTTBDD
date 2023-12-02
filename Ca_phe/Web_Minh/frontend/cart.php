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
                    include "../frontend/same/menu.php";
                ?>
            </div> 
            <div class="cart">
                <h2>Giỏ hàng |<a href="../frontend/checkout.php">Tiến trình các đơn hàng</a></h2>
                <form action="order.php" method="post">
                    <div class="list-cart">
                        <?php
                            session_start();
                            if(!empty($_SESSION['cart'])){ 
                        ?>
                        <table class="list">
                            <thead>
                                <td>STT</td>
                                <td>Tên sản phẩm</td>
                                <td>Hình ảnh</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                                <td>Chức năng</td>
                            </thead>
                            <?php 
                                $tong=0;
                                $stt=0;
                                foreach($_SESSION['cart'] as $val){
                                    $gtsp=$val[3]*$val[4];
                                    $tong+=$gtsp;  
                            ?>
                            <tbody>
                                <input type="hidden" value="<?php echo $val[1]?>" name="tensp">
                                <input type="hidden" value="<?php echo $val[2]?>" name="hinhanh">
                                <input type="hidden" value="<?php echo $val[4]?>" name="price">
                                <td><?php echo $stt+1?></td>
                                <td class="tensp"><?php echo $val[1]?></td>
                                <td class="hinhanh"><img src="../frontend/picture/<?php echo $val[2]?>" class="img-sp-cart"></td>
                                <td>
                                    <input type="text" name="quantity" class="quantity" style="background-color:white;" onchange="newqty(<?php echo $stt?>)" value="<?php echo $val[3]?>" disabled>
                                </td>
                                <td class="price"><?php echo number_format((int)$val[4])?></td>
                                <td><button type="button" class="del-sp"><a href="del.php?id=<?php echo $stt ?>">Xóa</a></button></td>
                            </tbody>   
                            <?php
                                    $stt++;
                                }
                            ?>
                        </table>
                    </div>
                    <div>
                        <br>
                        <h1 style="width:80%;text-align:right">
                            Tổng tiền : 
                            <strong id="total"><?php echo number_format((int)$tong)?></strong>
                            VND
                        </h1>
                        <br>
                        
                        <button class="cash" name="cash">Thanh toán ngay</button>
                        <br>
                    </div>
                </form>
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