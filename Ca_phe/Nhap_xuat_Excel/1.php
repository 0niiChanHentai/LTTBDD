<?php
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

$servername = "localhost";
$username = "student";
$password = "123456";
$dbname = "quancaphe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import']) && isset($_FILES['excelFile'])) {
        if ($_FILES['excelFile']['error'] == 0) {
            importTaiKhoan($_FILES['excelFile']['tmp_name'], $conn);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}
?>