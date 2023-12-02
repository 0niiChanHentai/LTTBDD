<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiem_tra_excel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm nhập dữ liệu từ Excel
function importExcel($filePath, $conn) {
    $reader = new XlsxReader();
    $spreadsheet = $reader->load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestRow; $row++) {
        $tk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $mk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

        $sql = "INSERT INTO users (tk, mk) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $tk, $mk);
        $stmt->execute();
    }
}

// Hàm xuất dữ liệu ra Excel
function exportExcel($conn) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Tài Khoản');
    $sheet->setCellValue('C1', 'Mật Khẩu');

    $sql = "SELECT id, tk, mk FROM users";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['id']);
        $sheet->setCellValue('B' . $row, $data['tk']);
        $sheet->setCellValue('C' . $row, $data['mk']);
        $row++;
    }

    $writer = new XlsxWriter($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="users.xlsx"');
    $writer->save("php://output");
}

// Xử lý yêu cầu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import'])) {
        importExcel($_FILES['excelFile']['tmp_name'], $conn);
    }

    if (isset($_POST['export'])) {
        exportExcel($conn);
        exit; // Để ngăn không xuất thêm HTML sau khi tải xuống Excel
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Excel</title>
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

    <h2>Dữ liệu từ bảng Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tài Khoản</th>
            <th>Mật Khẩu</th>
        </tr>
        <?php
        $sql = "SELECT id, tk, mk FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["tk"]. "</td><td>" . $row["mk"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
</body>
</html>