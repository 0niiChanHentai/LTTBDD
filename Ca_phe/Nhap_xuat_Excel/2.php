        $sql = "INSERT INTO tai_khoan (ten_tk, pass, phanquyen, id_nhanvien, ghichu) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiss", $ten_tk, $pass, $phanquyen, $id_nhanvien, $ghichu);
        $stmt->execute();

<?php
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

function importTaiKhoan($filePath, $conn){
    $reader = new XlsxReader();
    $spreadersheet = $reader->load($filePath);
    $worksheet = $spreadersheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ( $row = 2; $row <= $highestRow; $row++){
        $ten_tk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    }
    $sql = "INSERT INTO tai_khoan(ten_tk, ...) VALUE (?, ...)"
    $stmt = $conn->peapare($sql);
    $stmt->bind_param("ssiss", $ten_tk, ...);
    $stmt->execute();
}
?>