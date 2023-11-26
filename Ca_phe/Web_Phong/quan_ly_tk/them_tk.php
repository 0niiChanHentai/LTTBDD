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
        $sql = "SELECT * FROM tai_khoan ORDER BY ten_tk ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    if (!empty($_POST['submit'])) {
        $id_tk = $_POST['id_tk'];
        $ten_tk = $_POST['ten_tk'];
        $pass = $_POST['pass'];
        $phanquyen = $_POST['phanquyen'];
        $id_nhanvien = $_POST['id_nhanvien'];
        $ghichu = $_POST['ghichu'];


        $sql = "INSERT INTO tai_khoan (ten_tk, pass, phanquyen, id_nhanvien, ghichu) VALUES ('$ten_tk', '$pass', '$phanquyen', '$id_nhanvien', '$ghichu')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: tai_khoan.php');
    }
} catch (Exception) {
    echo '<script>alert("Xảy ra lỗi!");</script>';
    echo "<script>window.location = 'tai_khoan.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["buttonValue"])) {
        $buttonValue = $_POST["buttonValue"];
        echo "<input type='text' value='$buttonValue' readonly>";
    }
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
                        <label class="title">THÊM MỚI TÀI KHOẢN</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label class="chu">Tên tài khoản:</label>
                                <input type="text" name="ten_tk" required><br>

                                <label class="chu">Mật khẩu:</label>
                                <input type="password" name="pass" required><br>

                                <label class="chu">Chủ sở hữu tài khoản:</label>
                                <select name="id_nhanvien" required>
                                    <?php
                                    $nhanVienSql = "SELECT id, hoten FROM nhan_vien ORDER BY hoten ASC";
                                    $nhanVienStmt = $conn->prepare($nhanVienSql);
                                    $nhanVienStmt->execute();
                                    $nhanVienResult = $nhanVienStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($nhanVienResult as $nhanVien) : ?>
                                        <option value="<?php echo htmlspecialchars($nhanVien['id']); ?>">
                                            <?php echo htmlspecialchars($nhanVien['hoten']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                </br><label class="chu">Quyền hạn:</label>
                                <select name="phanquyen" required>
                                    <?php
                                    $phanQuyenSql = "SELECT id, phan_quyen FROM phan_quyen ORDER BY phan_quyen ASC";
                                    $phanQuyenStmt = $conn->prepare($phanQuyenSql);
                                    $phanQuyenStmt->execute();
                                    $phanQuyenResult = $phanQuyenStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($phanQuyenResult as $phanQuyen) : ?>
                                        <option value="<?php echo htmlspecialchars($phanQuyen['id']); ?>">
                                            <?php echo htmlspecialchars($phanQuyen['phan_quyen']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                <label class="chu">Ghi chú:</label>
                                <input type="text" name="ghichu" value = "(không)" required><br>
                                <input type="submit" value="Thêm" name="submit" id="themmoi">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/tai_khoan.js" defer></script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>