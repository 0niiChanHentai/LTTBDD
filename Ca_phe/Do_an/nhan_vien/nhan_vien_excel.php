<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Họ Tên');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Điện Thoại');
    $sheet->setCellValue('D1', 'Ngày Sinh');
    $sheet->setCellValue('E1', 'Giới Tính');
    $sheet->setCellValue('F1', 'Địa Chỉ');
    $sheet->setCellValue('G1', 'Ảnh NV');
    $sheet->setCellValue('H1', 'Vị Trí');
    $sheet->setCellValue('I1', 'Lương');

    $sql = "SELECT hoten, email, dienthoai, ngaysinh, gioitinh, diachi, anh_nv, vitri, luong FROM nhan_vien";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['hoten']);
        $sheet->setCellValue('B' . $row, $data['email']);
        $sheet->setCellValue('C' . $row, $data['dienthoai']);
        $sheet->setCellValue('D' . $row, $data['ngaysinh']);
        $sheet->setCellValue('E' . $row, $data['gioitinh']);
        $sheet->setCellValue('F' . $row, $data['diachi']);
        $sheet->setCellValue('G' . $row, $data['anh_nv']);
        $sheet->setCellValue('H' . $row, $data['vitri']);
        $sheet->setCellValue('I' . $row, $data['luong']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="nhan_vien.xlsx"');
    $writer->save("php://output");
}
?>