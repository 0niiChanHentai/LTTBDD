<?php
include('../db_ket_noi.php');
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Tên Sản Phẩm');
    $sheet->setCellValue('B1', 'Giá Thành');
    $sheet->setCellValue('C1', 'Thành Phần');
    $sheet->setCellValue('D1', 'Hình Ảnh');
    $sheet->setCellValue('E1', 'Mô Tả');
    $sheet->setCellValue('F1', 'Phân Loại');
    $sheet->setCellValue('G1', 'ID Danh Mục');
    $sheet->setCellValue('H1', 'Ghi Chú');

    $sql = "SELECT tensp, giathanh, thanhphan, hinhanh, mota, phanloai, id_danhmuc, ghichu FROM san_pham";
    $result = $conn->query($sql);

    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['tensp']);
        $sheet->setCellValue('B' . $row, $data['giathanh']);
        $sheet->setCellValue('C' . $row, $data['thanhphan']);
        $sheet->setCellValue('D' . $row, $data['hinhanh']);
        $sheet->setCellValue('E' . $row, $data['mota']);
        $sheet->setCellValue('F' . $row, $data['phanloai']);
        $sheet->setCellValue('G' . $row, $data['id_danhmuc']);
        $sheet->setCellValue('H' . $row, $data['ghichu']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="san_pham.xlsx"');
    $writer->save("php://output");
}
?>