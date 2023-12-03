<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['export_excel'])) {
    $filePath = '../Mau_don_hang.xlsx';
    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();

    $sql = "SELECT danhsachsp, ghichu, idkhach_hang, idnhan_vien, ten_kh, thoigianlap, tongcong, status FROM don_hang";
    $result = $conn->query($sql);

    $row = 10;
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

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="don_hang_cho_khach_excel.xlsx"');
    $writer->save("php://output");
}
?>