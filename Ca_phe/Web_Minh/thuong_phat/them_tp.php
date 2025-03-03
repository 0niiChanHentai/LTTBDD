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

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM thuong_phat ORDER BY thoigian DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    if (!empty($_POST['submit'])) {
        $idnhan_vien = $_POST['idnhan_vien'];
        $phanloai = $_POST['phanloai'];
        $sotien = $_POST['sotien'];
        $noidung = $_POST['noidung'];


        $sql = "INSERT INTO thuong_phat (idnhan_vien, thoigian, phanloai, sotien, noidung) VALUES ('$idnhan_vien', CURRENT_TIMESTAMP, '$phanloai', '$sotien', '$noidung')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: thuong_phat.php');
    }
} catch (Exception) {
    echo '<script>alert("Xảy ra lỗi!");</script>';
    echo "<script>window.location = 'thuong_phat.php';</script>";
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
                        <label class="title">THÊM TÌNH HUỐNG THƯỞNG / PHẠT</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label class="chu">Nhân viên:</label>
                                <select name="idnhan_vien" required>
                                    <option value="">Chọn nhân viên</option>
                                    <?php
                                    $sql = "SELECT id, hoten FROM nhan_vien";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$row['id']}'>{$row['hoten']}</option>";
                                    }
                                    ?>
                                </select><br>

                                <label class="chu">Phân loại:</label>
                                <select id="phanloai" name="phanloai" style="width: auto; margin-bottom: 3%; height: 22px">
                                    <option value="Thưởng">Thưởng</option>
                                    <option value="Phạt">Phạt</option>
                                </select>

                                <label class="chu">Số tiền:</label>
                                <input type="number" name="sotien" min="0" value="0" required><br>

                                <label class="chu">Nội dung:</label>
                                <input type="text" name="noidung" required><br>
                                <input type="submit" value="Thêm" name="submit" id="themmoi" style="width: 120px; height: 40px">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>