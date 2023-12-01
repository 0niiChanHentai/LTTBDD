<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM xuat_hang ORDER BY thoigianxuat DESC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $idxuat_hang = $_POST['idxuat_hang'];
 
       $sql = "DELETE FROM xuat_hang WHERE idxuat_hang = '$idxuat_hang'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: xuat_hang.php');
    } 

}
catch(Exception){
    header('location: xuat_hang.php');
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
                        
                    </div>
                -->
<!----------------->
                    <div class="khung_giua">
                        <label class="title">XÓA XUẤT NGUYÊN LIỆU</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label class="chu">ID sản phẩm cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idxuat_hang" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idxuat_hang" value="" readonly>';
                                }
                                ?></br>
                                <input type="submit" value="Xóa" name="submit" id="xoabo"
                                style="width: 120px; height: 40px"
                                    onclick="return confirmDelete()">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/xuat_hang.js" defer></script>

    <script>
        function confirmDelete() {
            var xuatHang = document.getElementsByName('idxuat_hang')[0];
            if (xuatHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: xuat_hang.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa đơn xuất hàng này không?");
                if (result) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>