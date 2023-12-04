<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Tên Khách Hàng');
    $sheet->setCellValue('B1', 'Số Điện Thoại');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Địa Chỉ');
    $sheet->setCellValue('E1', 'Ghi Chú');

    $sql = "SELECT tenkh, sdtkh, email, diachi, ghichu FROM khach_hang";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['tenkh']);
        $sheet->setCellValue('B' . $row, $data['sdtkh']);
        $sheet->setCellValue('C' . $row, $data['email']);
        $sheet->setCellValue('D' . $row, $data['diachi']);
        $sheet->setCellValue('E' . $row, $data['ghichu']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="khach_hang.xlsx"');
    $writer->save("php://output");
}
?>