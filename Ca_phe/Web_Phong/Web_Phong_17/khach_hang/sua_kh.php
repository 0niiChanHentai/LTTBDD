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
 
       $sql = "UPDATE khach_hang SET tenkh='$tenkh', sdtkh='$sdtkh', email='$email', diachi='$diachi', ghichu='$ghichu' WHERE idkh='$idkh'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: khach_hang.php');
    } 

}
catch(Exception){
    header('location: khach_hang.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">SỬA THÔNG TIN KHÁCH HÀNG</label>
                    </div>
<!----------------->
                <!--
                    <div class="khung_giua">

                    </div>
                -->
<!----------------->
                    <div class="khung_duoi" style="margin-top: -2%;">
                        <div id="content" style="margin-left: 5%;">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label>ID sản phẩm cần sửa thông tin:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idkh" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idkh" value="" readonly>';
                                }
                                ?></br>
                            
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

                                <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px"
                                    onclick="validateForm()">
                            </form>
                        </div>
                    </div>
 <!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/khach_hang.js" defer></script>

    <script>
        function validateForm() {
            var khachHang = document.getElementsByName('idkh')[0];

            if (khachHang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin khách hàng cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>