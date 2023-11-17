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
       $sql = "SELECT * FROM nhan_vien ORDER BY hoten ASC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $id = $_POST['idnv'];
 
       $sql = "DELETE FROM nhan_vien WHERE id = '$id'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: nhan_vien.php');
    } 

}
catch(Exception){
    header('location: nhan_vien.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">XÓA NHÂN VIÊN</label>
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
                                <label>ID nhân viên cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idnv" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idnv" value="" readonly>';
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
            var donHang = document.getElementsByName('idnv')[0];
            if (donHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: nhan_vien.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa nhân viên này không?");
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