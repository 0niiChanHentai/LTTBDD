<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Danh Sách Sản Phẩm');
    $sheet->setCellValue('B1', 'Thời Gian Xuất');
    $sheet->setCellValue('C1', 'Ghi Chú');

    $sql = "SELECT danhsachsp, thoigianxuat, ghichu FROM xuat_hang";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['danhsachsp']);
        $sheet->setCellValue('B' . $row, $data['thoigianxuat']);
        $sheet->setCellValue('C' . $row, $data['ghichu']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="xuat_hang.xlsx"');
    $writer->save("php://output");
}
?>