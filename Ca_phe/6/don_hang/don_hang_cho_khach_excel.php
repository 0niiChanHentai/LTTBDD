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

    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('D7', $data['danhsachsp']);
        $sheet->setCellValue('D8', $data['ghichu']);
        $sheet->setCellValue('D5', $data['idnhan_vien']);
        $sheet->setCellValue('D6', $data['ten_kh']);
        $sheet->setCellValue('C3', $data['thoigianlap']);
        $sheet->setCellValue('G3', $data['tongcong']);
    }

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="don_hang_cho_khach_excel.xlsx"');
    $writer->save("php://output");
}
?>