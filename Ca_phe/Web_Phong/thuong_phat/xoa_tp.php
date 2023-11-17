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
        $sql = "SELECT * FROM thuong_phat ORDER BY thoigian DESC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $idtinh_huong = $_POST['idtinh_huong'];
 
       $sql = "DELETE FROM thuong_phat WHERE idtinh_huong = '$idtinh_huong'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: thuong_phat.php');
    } 

}
catch(Exception){
    header('location: thuong_phat.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">XÓA THÔNG TIN TÌNH HUỐNG THƯỞNG / PHẠT</label>
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
                                <label>ID tình huống thưởng / phạt:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idtinh_huong" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idtinh_huong" value="" readonly>';
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
    <script src="../assets/js/nhan_vien.js" defer></script>
    
    <script>
        function confirmDelete() {
            var donHang = document.getElementsByName('idtinh_huong')[0];
            if (donHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: thuong_phat.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa mục thưởng / phạt này không?");
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