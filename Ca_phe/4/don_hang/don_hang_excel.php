<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Danh Sách Sản Phẩm');
    $sheet->setCellValue('B1', 'Ghi Chú');
    $sheet->setCellValue('C1', 'ID Khách Hàng');
    $sheet->setCellValue('D1', 'ID Nhân Viên');
    $sheet->setCellValue('E1', 'Tên Khách Hàng');
    $sheet->setCellValue('F1', 'Thời Gian Lập');
    $sheet->setCellValue('G1', 'Tổng Cộng');
    $sheet->setCellValue('H1', 'Status');

    $sql = "SELECT danhsachsp, ghichu, idkhach_hang, idnhan_vien, ten_kh, thoigianlap, tongcong, status FROM don_hang";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['danhsachsp']);
        $sheet->setCellValue('B' . $row, $data['ghichu']);
        $sheet->setCellValue('C' . $row, $data['idkhach_hang']);
        $sheet->setCellValue('D' . $row, $data['idnhan_vien']);
        $sheet->setCellValue('E' . $row, $data['ten_kh']);
        $sheet->setCellValue('F' . $row, $data['thoigianlap']);
        $sheet->setCellValue('G' . $row, $data['tongcong']);
        $sheet->setCellValue('H' . $row, $data['status']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="don_hang.xlsx"');
    $writer->save("php://output");
}
?>