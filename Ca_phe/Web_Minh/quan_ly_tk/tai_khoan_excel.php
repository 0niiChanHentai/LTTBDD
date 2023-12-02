<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
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

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="tai_khoan.xlsx"');
    $writer->save("php://output");
}
?>