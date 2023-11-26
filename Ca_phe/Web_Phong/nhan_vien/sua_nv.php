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
       $hoten = $_POST['hotennv'];
       $email = $_POST['emailnv'];
       $dienthoai = $_POST['dienthoainv'];
       $ngaysinh = $_POST['ngaysinhnv'];
       $gioitinh = $_POST['gioitinhnv'];
       $diachi = $_POST['diachinv'];
       $luong = $_POST['luongnv'];
 
       $sql = "UPDATE nhan_vien SET hoten='$hoten', email='$email',  dienthoai='$dienthoai', ngaysinh='$ngaysinh', gioitinh='$gioitinh', diachi='$diachi', luong='$luong' WHERE id='$id'";
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
                        <label class="title">SỬA NHÂN VIÊN</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label class="chu">ID nhân viên cần sửa thông tin:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idnv" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idnv" value="" readonly>';
                                }
                                ?></br>
                            
                                <label class="chu">Tên đầy đủ:</label>
                                <input type="text" name="hotennv" required><br>
                            
                                <label class="chu">Email:</label>
                                <input type="text" name="emailnv" required><br>
                            
                                <label class="chu">Điện thoại:</label>
                                <input type="text" name="dienthoainv" required><br>

                                <label class="chu">Ngày sinh:</label>
                                <input type="date" name="ngaysinhnv" style="height: 22px" required><br>
                                
                                <label class="chu">Địa chỉ:</label>
                                <input type="text" name="diachinv" required><br>

                                <label class="chu">Lương:</label>
                                <input type="text" name="luongnv" required><br>

                                <label class="chu">Giới tính:</label>
                                <select id="gioitinhnv" name="gioitinhnv" style="width: auto; margin-bottom: 3%; height: 22px">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                                <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px"
                                    onclick="validateForm()">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/nhan_vien.js" defer></script>

    <script>
        function validateForm() {
            var idnv = document.getElementsByName('idnv')[0];

            if (idnv.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin nhân viên cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>