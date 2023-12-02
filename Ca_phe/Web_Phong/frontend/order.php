<!-- <?php
    $conn = mysqli_connect("localhost","student","123456","quancaphe");
    $vou = 0;
    if(isset($_POST['apply'])){
        echo $vou = '<script>
                    document.writeln(sessionStorage.getItem("opt"));
                </script>';
        echo $sqlv = "SELECT gia_tri FROM voucher WHERE ma_sale LIKE '$vou'";
        echo $magg = mysqli_query($conn,$sqlv);
        //echo $magg = $conn->query($sqlv); 
    }else{
        $gg=0;
    }
?> -->

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <!-- <link rel="stylesheet" href="../frontend/css/cart.css" type="text/css"> -->
        <link rel="stylesheet" href="../frontend/css/order.css" type="text/css">
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "../frontend/same/menu.php";
                ?>
            </div> 
            <div class="cart">
                
                <div class="list-cart">
                <h2>Tạo đơn hàng | <a href="../frontend/cart.php">Giỏ hàng</a> | <a href="../frontend/checkout.php">Đơn đang giao</a></a></h2>
                    <table class="list">
                        <thead>
                            <td>STT</td>
                            <td>Tên sản phẩm</td>
                            <td>Hình ảnh</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                        </thead>
                        <?php 
                            session_start();
                            $i=0;
                            $gg=0;
                            $tong = 0;
                            $dssp = " ";
                            foreach($_SESSION['cart'] as $val){
                                $tong += ($val[3] * $val[4]);
                                $dssp .= $val[3] ." ". $val[1] .",";
                        ?>
                        <tbody>
                            <td><?php echo $i+1?></td>
                            <td><?php echo $val[1]?></td>
                            <td><img src="../frontend/picture/<?php echo $val[2]?>" class="img-sp-cart"></td>
                            <td><?php echo $val[3]?></td>
                            <td><?php echo number_format($val[4])?></td>
                        <?php
                            $i++;    
                        }
                        ?>        
                    </table>
                    <div>
                    <h2 class="total">Tổng tiền: <?php echo number_format((int)$tong - (int)$tong*(int)$gg/100);?> VND</h2>
                </div>
                </div>
                
                <div class="info-check">
                    <h2>Thông tin nhận hàng</h2>
                    <form action="checkout.php" method="post">
                        <input type="text" name="ten_kh" placeholder="Họ & tên" required>
                        <input type="tel" minlength="10" maxlength="10" size="20" name="sdtkh" placeholder="SĐT" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="diachi" placeholder="Địa chỉ" required>
                        <textarea name="ghichu" placeholder="Ghi chú" cols='25' rows='4'></textarea>
                        <input type="hidden" name="danhsachsp" value="<?php echo $dssp?>"> 
                        <!-- <input typye="hidden" name="voucher" value="<?php echo $vou?>"> -->
                        <input type="hidden" name="tongcong" value="<?php echo ((int)$tong - (int)$tong*(int)$gg/100)?>">
                        <select>
                            <option>Thanh toán khi nhận hàng</option>
                        </select>
                        <button class="cash" type="submit" name="sent">Đặt hàng</button>
                    </form>
                    <!-- <form action="order.php" method="post">
                        <select id="magg" class="magg" name="magg">
                            <option value="0" selected>-- Chọn Voucher --</option>
                            <?php
                                $voucher = "SELECT * FROM voucher";
                                $voucherquery = mysqli_query($conn,$voucher);
                                $format = "Y-m-d";
                                $date = date($format, time());
                                foreach($voucherquery as $sale){
                                    if(strtotime($sale['hsd'])>strtotime($date) && $sale['qty']>0){
                                        ?>
                                        <option value="<?php echo $sale['ma_sale']?>"><?php echo $sale['ma_sale']?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <button type="submit" name="apply">Áp dụng voucher</button>
                    </form> -->
                </div>
                <!-- <script>
                    var magg = document.getElementById("magg"); 
                    magg.onchange = function(){
                        sessionStorage.clear();
                        sessionStorage.setItem('opt',this.value);
                        magg.value = sessionStorage.getItem('opt');
                    }
                </script> -->
            </div>
        </div>
    </body>
</html>