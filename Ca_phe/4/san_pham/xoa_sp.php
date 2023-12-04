<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

$query = "SELECT phanquyen FROM tai_khoan WHERE ten_tk = '{$_SESSION['username']}'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $phanquyen = $row['phanquyen'];

    if ($phanquyen !== '1') {
        header("Location: ../reject.php");
            exit();
    }
}
?>

<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $masp = $_POST['masp'];
 
       $sql = "DELETE FROM san_pham WHERE masp = '$masp'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: san_pham.php');
    } 

}
catch(Exception){
    header('location: san_pham.php');
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
                        <label class="title">XÓA SẢN PHẨM</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label class="chu">ID sản phẩm cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="masp" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="masp" value="" readonly>';
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
    <script src="../assets/js/san_pham.js" defer></script>

    <script>
        function confirmDelete() {
            var donHang = document.getElementsByName('masp')[0];
            if (donHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: san_pham.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa sản phẩm này không?");
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