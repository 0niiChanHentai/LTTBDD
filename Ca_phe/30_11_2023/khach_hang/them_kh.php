<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM khach_hang ORDER BY tenkh ASC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $idkh = $_POST['idkh'];
       $tenkh = $_POST['tenkh'];
       $sdtkh = $_POST['sdtkh'];
       $email = $_POST['email'];
       $diachi = $_POST['diachi'];
       $ghichu = $_POST['ghichu'];
 
 
       $sql = "INSERT INTO khach_hang (tenkh, sdtkh, email, diachi, ghichu) VALUES ('$tenkh', '$sdtkh', '$email', '$diachi', '$ghichu')";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: khach_hang.php');
    } 

}
catch(Exception){
    echo '<script>alert("Xảy ra lỗi!");</script>';
    echo "<script>window.location = 'khach_hang.php';</script>";
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                <!--
                    <div class="khung_tren">
                        >
                    </div>
                -->
<!----------------->
                    <div class="khung_giua">
                        <label class="title">THÊM MỚI KHÁCH HÀNG</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label>Tên khách hàng:</label>
                                <input type="text" name="tenkh" required><br>
                            
                                <label>Số điện thoại:</label>
                                <input type="text" name="sdtkh" required><br>
                            
                                <label>Email:</label>
                                <input type="text" name="email" required><br>

                                <label>Địa chỉ:</label>
                                <input type="text" name="diachi" required><br>

                                <label>Ghi chú:</label>
                                <input type="text" name="ghichu" value = "(không)" required><br>
                                <input type="submit" value="Thêm" name="submit" id="themmoi" style="width: 120px; height: 40px">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/khach_hang.js" defer></script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>