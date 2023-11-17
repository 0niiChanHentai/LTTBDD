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
 
       $sql = "DELETE FROM khach_hang WHERE idkh = '$idkh'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: khach_hang.php');
    } 

}
catch(Exception){
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">XÓA KHÁCH HÀNG</label>
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
                                <label>ID sản phẩm cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idkh" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idkh" value="" readonly>';
                                }
                                ?></br>
                                <input type="submit" value="Xóa" name="submit" id="xoabo"
                                style="width: 120px; height: 40px"
                                    onclick="return confirmDelete();">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/css/khach_hang.js" defer></script>

    <script>
        function confirmDelete() {
            var donHang = document.getElementsByName('idkh')[0];
            if (donHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: don_hang.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa khách hàng này không?");
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