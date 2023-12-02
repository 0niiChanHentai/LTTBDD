<?php
require 'vendor/autoload.php';

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

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Excel - Tài Khoản</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        Chọn file Excel để nhập: 
        <input type="file" name="excelFile" required>
        <input type="submit" name="import" value="Nhập Excel">
    </form>

    <form method="post">
        <input type="submit" name="export" value="Xuất Excel">
    </form>
    <h2>Danh sách Tài Khoản</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên Tài Khoản</th>
            <th>Mật Khẩu</th>
            <th>Phân Quyền</th>
            <th>ID Nhân Viên</th>
            <th>Ghi Chú</th>
        </tr>
        <?php
        foreach ($taiKhoanData as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_tk'] . "</td>";
            echo "<td>" . $row['ten_tk'] . "</td>";
            echo "<td>" . $row['pass'] . "</td>";
            echo "<td>" . $row['phanquyen'] . "</td>";
            echo "<td>" . $row['id_nhanvien'] . "</td>";
            echo "<td>" . $row['ghichu'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>