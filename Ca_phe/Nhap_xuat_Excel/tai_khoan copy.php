<?php
// Kết nối cơ sở dữ liệu
include('../db_ket_noi.php');
session_start();

// Kiểm tra người dùng
if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

// Lấy phân quyền từ bảng tài khoản
$query = "SELECT phanquyen FROM tai_khoan WHERE ten_tk = '{$_SESSION['username']}'";

// query: thực thi truy vấn nhưng không chứa dữ liệu người dùng
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // fetch_assoc: trả về hàng tiếp theo dưới nhiều định dạng
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

try {
    if (empty($_POST['submit'])) {
        // INNER JOIN: Kết nối bảng
        $sql = "SELECT tk.ten_tk, tk.pass, tk.id_tk, nv.hoten, pq.phan_quyen 
            FROM tai_khoan AS tk
            INNER JOIN nhan_vien AS nv ON tk.id_nhanvien = nv.id
            INNER JOIN phan_quyen AS pq ON tk.phanquyen = pq.id
            ORDER BY (tk.phanquyen = '1') DESC, nv.hoten ASC";
        // Thực thi truy vấn
        // prepare: chuẩn bị truy vấn
        // execute: thực thi truy vấn nhưng chứa dữ liệu người dùng
        // Ví dụ lí do cần chuẩn bị truy vấn: khi nhập '' OR '1'='1' sẽ luôn đúng -> trả về toàn bộ danh sách người dùng
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        // fetch: trả về hàng tiếp theo dưới dạng mảng
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT tk.ten_tk, tk.pass, tk.id_tk, nv.hoten, pq.phan_quyen 
                FROM tai_khoan AS tk
                INNER JOIN nhan_vien AS nv ON tk.id_nhanvien = nv.id
                INNER JOIN phan_quyen AS pq ON tk.phanquyen = pq.id
                WHERE nv.hoten LIKE '%$search%'
                ORDER BY nv.hoten ASC";
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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quancaphe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm nhập dữ liệu từ Excel vào bảng tai_khoan
function importTaiKhoan($filePath, $conn) {
    $reader = new XlsxReader();
    $spreadsheet = $reader->load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestRow; $row++) {
        $ten_tk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $pass = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $phanquyen = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $id_nhanvien = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $ghichu = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

        $sql = "INSERT INTO tai_khoan (ten_tk, pass, phanquyen, id_nhanvien, ghichu) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiss", $ten_tk, $pass, $phanquyen, $id_nhanvien, $ghichu);
        $stmt->execute();
    }
}

// Hàm xuất dữ liệu từ bảng tai_khoan ra Excel
function exportTaiKhoan($conn) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Tên Tài Khoản');
    $sheet->setCellValue('B1', 'Mật Khẩu');
    $sheet->setCellValue('C1', 'Phân Quyền');
    $sheet->setCellValue('D1', 'ID Nhân Viên');
    $sheet->setCellValue('E1', 'Ghi Chú');

    $sql = "SELECT ten_tk, pass, phanquyen, id_nhanvien, ghichu FROM tai_khoan";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['ten_tk']);
        $sheet->setCellValue('B' . $row, $data['pass']);
        $sheet->setCellValue('C' . $row, $data['phanquyen']);
        $sheet->setCellValue('D' . $row, $data['id_nhanvien']);
        $sheet->setCellValue('E' . $row, $data['ghichu']);
        $row++;
    }

    $writer = new XlsxWriter($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="tai_khoan.xlsx"');
    $writer->save("php://output");
}

// Xử lý yêu cầu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import']) && isset($_FILES['excelFile'])) {
        // Kiểm tra xem file có được tải lên không
        if ($_FILES['excelFile']['error'] == 0) {
            importTaiKhoan($_FILES['excelFile']['tmp_name'], $conn);
            // Chuyển hướng sau khi nhập dữ liệu
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    if (isset($_POST['export'])) {
        exportTaiKhoan($conn);
        exit;
    }
}

function getTaiKhoanData($conn) {
    $sql = "SELECT * FROM tai_khoan";
    $result = $conn->query($sql);
    $taiKhoanData = [];
    while ($row = $result->fetch_assoc()) {
        array_push($taiKhoanData, $row);
    }
    return $taiKhoanData;
}

$taiKhoanData = getTaiKhoanData($conn);

?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        
                        <label class="title">DANH SÁCH CÁC TÀI KHOẢN</label>

                        <a href="quan_ly_log.php">
                            <button class="nut_dieu_huong">Quản lý đăng nhập / đăng xuất</button>
                        </a>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" name="timKiem" placeholder="Nhập tên nhân viên">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>
                        <input type="file" id="chonFileExcel" style="display:none;">
                        <form method="post" action="xuat_excel.php">
                            <button type="submit" name="export_excel">Xuất Excel</button>
                        </form>

                    </div>
<!----------------->
<div class="khung_giua">
                        <button type="button" name="submit" id="themmoinv">Thêm</button>
                        <form method="post" enctype="multipart/form-data">
                            Chọn file Excel để nhập: 
                            <input type="file" name="excelFile" required>
                            <input type="submit" name="import" value="Nhập Excel">
                        </form>
                            <!-- Form để xuất dữ liệu ra Excel -->
    

    <!-- Bảng hiển thị danh sách tài khoản -->
    <h2>Danh sách Tài Khoản</h2>
    <table border="1">
        <!-- ... Tiếp tục với phần hiển thị danh sách tài khoản từ tai_khoan.php -->
    </table>
                        <input type="file" id="chonFileExcel" style="display:none;">
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <table>
                            <thead>
                                <tr style="background-color: #c49967;">
                                    <th style="width: 5%">STT</th>
                                    <th style="width: 20%">Tài khoản</th>
                                    <th style="width: 20%">Mật khẩu</th>
                                    <th>Chủ tài khoản</th>
                                    <th style="width: 15%">Quyền hạn</th>
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
                                        <td><?php echo ($items['ten_tk']) ?></td>
                                        <td><?php echo ($items['pass']) ?></td>
                                        <td><?php echo ($items['hoten']) ?></td>
                                        <td><?php echo ($items['phan_quyen']) ?></td>
                                        <td>
                                            <form action="sua_tk.php" method="post">
                                                <button type="submit" value="<?php echo ($items['id_tk']) ?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_tk.php" method="post">
                                                <button type="submit" value="<?php echo ($items['id_tk']) ?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $rowNumber++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/tai_khoan.js" defer></script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_tk.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_tk.php";
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