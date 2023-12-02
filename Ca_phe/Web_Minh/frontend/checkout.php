<?php
    $conn=mysqli_connect("localhost","student","123456","quancaphe");

    if(isset($_POST['sent'])){
        $tenkh=$_POST['ten_kh'];
        $sdtkh = $_POST['sdtkh'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu'];
        $danhsachsp = $_POST['danhsachsp'];
        $tongcong = $_POST['tongcong'];
        $format = "Y-m-d G:i:s";
        $date = date($format, time());
        $time = date("G:i:s");
        $swt = "12:00:00";
        $status = 1;
        if(strtotime($time)>strtotime($swt)){
            $idnhan_vien = 1;
        }
        else{
            $idnhan_vien = 2;
        }
        $sql1 = "INSERT INTO khach_hang(tenkh,sdtkh,email,diachi,ghichu) VALUES ('$tenkh','$sdtkh','$email','$diachi','khong') ";
        $query1 = mysqli_query($conn,$sql1);
        $sql2 = "SELECT * FROM khach_hang ORDER BY idkh ASC"; 
        $query2 = mysqli_query($conn, $sql2); 
        foreach($query2 as $kh){
            if($kh['sdtkh'] === $sdtkh){
                $idkh = $kh['idkh'];
                break;
            }else{
                $idkh = $kh['idkh'];
                }
        }
        $sql3 = "INSERT INTO don_hang(danhsachsp,ghichu,idkhach_hang,idnhan_vien,ten_kh,thoigianlap,tongcong,status) 
                VALUES ('$danhsachsp','$ghichu','$idkh','$idnhan_vien','$tenkh','$date','$tongcong','$status')";

        $query3 = mysqli_query($conn,$sql3);
        unset($_SESSION['cart']);
    }else{
        $khachhang = "SELECT * FROM don_hang ORDER BY iddon_hang ASC"; 
        $qkhachhang = mysqli_query($conn, $khachhang); 
        foreach($qkhachhang as $qkh){
            $idkh = $qkh['idkhach_hang'];
        }
    }
?>
<!-- #-->
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
                <h2><a href="../frontend/cart.php">Giỏ hàng</a> | <strong>Tiến trình các đơn hàng</strong></h2>
                <div class="list-cart">
                        <table class="list">
                            <thead>
                                <td>STT</td>
                                <td>Mã đơn hàng</td>
                                <td>Tên khách hàng</td>
                                <td>Danh sách sản phẩm</td>
                                <td>Tổng thanh toán</td>
                                <td>Trạng thái</td>
                            </thead>
                    <?php
                        $list = "SELECT * FROM `don_hang` WHERE `idkhach_hang` = $idkh OR `status` = 1 ORDER BY `iddon_hang` DESC";
                        $listq = mysqli_query($conn, $list);
                        $stt=1;
                        foreach($listq as $lst){    
                    ?>
                            <tbody>
                                <td><?php echo $stt?></td>
                                <td><?php echo $lst['iddon_hang']?></td>
                                <td><?php echo $lst['ten_kh']?></td>
                                <td><?php echo $lst['danhsachsp']?></td>
                                <td><?php echo $lst['tongcong']?></td>
                                <td><?php 
                                    if($lst['status'] = 0){
                                        echo "Hoàn thành";
                                    }else{
                                        echo "Đang giao hàng";
                                    }?></td>
                            </tbody>
                        <?php
                            $stt++;
                        }
                    ?>
                </div>

            </div>
        </div>
    </body>
</html>