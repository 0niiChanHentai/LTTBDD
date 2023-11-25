<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM nhap_hang ORDER BY thoigiannhap DESC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $idnhap_hang = $_POST['idnhap_hang'];
 
       $sql = "DELETE FROM nhap_hang WHERE idnhap_hang = '$idnhap_hang'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: nhap_hang.php');
    } 

}
catch(Exception){
    header('location: nhap_hang.php');
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
                        <label class="title" style="text-align: center;">XÓA ĐƠN NHẬP NGUYÊN LIỆU</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label class="chu">ID sản phẩm cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idnhap_hang" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idnhap_hang" value="" readonly>';
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
    <script src="nhaphang.js" defer></script>

    <script>
        function confirmDelete() {
            var nhapHang = document.getElementsByName('idnhap_hang')[0];
            if (nhapHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: nhap_hang.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa nhập hàng này không?");
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