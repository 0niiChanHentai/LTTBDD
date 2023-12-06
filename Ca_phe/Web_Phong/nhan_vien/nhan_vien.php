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

    $accessQuery = "SELECT co_quyen_truy_cap FROM quyen_truy_cap WHERE phan_quyen_id = ? AND trang = 'nhan_vien.php'";
    $accessStmt = $conn->prepare($accessQuery);
    $accessStmt->bind_param("i", $phanquyen);
    $accessStmt->execute();
    $accessResult = $accessStmt->get_result();

    if ($accessResult->num_rows > 0) {
        $accessRow = $accessResult->fetch_assoc();
        if (!$accessRow['co_quyen_truy_cap']) {
            header("Location: ../reject.php");
            exit();
        }
    } else {
        header("Location: ../reject.php");
        exit();
    }
}
?>

<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM nhan_vien ORDER BY hoten ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM nhan_vien WHERE hoten LIKE '%$search%' ORDER BY hoten ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
} catch (Exception) {
    echo (' ERROR!');
}


if (isset($_POST["mybutton"])) {
    echo $_POST["mybutton"];
}


if (isset($_POST["postvar"])) {
    echo $_POST["postvar"];
}
?>
<?php
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

$servername = "localhost";
$username = "student";
$password = "123456";
$dbname = "quancaphe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function importNhanVien($filePath, $conn) {
    $reader = new XlsxReader();
    $spreadsheet = $reader->load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestRow; $row++) {
        $hoten = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $dienthoai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $ngaysinh = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $gioitinh = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
        $diachi = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
        $anh_nv = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
        $vitri = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
        $luong = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

        $sql = "INSERT INTO nhan_vien (hoten, email, dienthoai, ngaysinh, gioitinh, diachi, anh_nv, vitri, luong) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $hoten, $email, $dienthoai, $ngaysinh, $gioitinh, $diachi, $anh_nv, $vitri, $luong);
        $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import']) && isset($_FILES['excelFile'])) {
        if ($_FILES['excelFile']['error'] == 0) {
            importNhanVien($_FILES['excelFile']['tmp_name'], $conn);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
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
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH NHÂN VIÊN</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập tên nhân viên">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>

                        <input type="file" id="chonFileExcel" style="display:none;">
                        <form method="post" action="nhan_vien_excel.php">
                            <button type="submit" name="export_excel">Xuất Excel</button>
                        </form>

                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button type="button" name="submit" id="themmoinv">Thêm</button>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="excelFile" required>
                            <input type="submit" name="import" value="Nhập Excel">
                        </form>
                        <table border="1"></table>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content" class="cuon_ngang">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 15%">Họ tên</th>
                                        <th style="width: 15%">Email</th>
                                        <th style="width: 10%">Điện thoại</th>
                                        <th style="width: 5%">Ngày sinh</th>
                                        <th style="width: 5%">Giới tính</th>
                                        <th>Địa chỉ</th>
                                        <th style="width: 5%">Lương ngày (VND)</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result as $items) : ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td><?php echo ($items['email']) ?></td>
                                            <td><?php echo ($items['dienthoai']) ?></td>
                                            <td><?php echo ($items['ngaysinh']) ?></td>
                                            <td><?php echo ($items['gioitinh']) ?></td>
                                            <td><?php echo ($items['diachi']) ?></td>
                                            <td><?php echo ($items['luong']) ?></td>
                                            <td>
                                                <form action="sua_nv.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_nv.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_nv.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_nv.php";
        });
        
        window.onload = function() {
            document.getElementsByName("mybutton").onclick = function() {
                document.getElementsByName("postvar")[0].value = this.value;
                document.forms.myform.submit();
            }
        };
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>