<?php
require 'vendor/autoload.php'; // Đảm bảo bạn đã cài đặt PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Kết nối database
include('db_ket_noi.php'); // Đường dẫn có thể thay đổi tùy theo cấu trúc thư mục của bạn

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Thiết lập tiêu đề cho các cột
$sheet->setCellValue('A1', 'STT');
$sheet->setCellValue('B1', 'Tên Tài Khoản');
$sheet->setCellValue('C1', 'Mật Khẩu');
$sheet->setCellValue('D1', 'Chủ Tài Khoản');
$sheet->setCellValue('E1', 'Quyền Hạn');

// Lấy dữ liệu từ database
$sql = "SELECT tk.ten_tk, tk.pass, nv.hoten, pq.phan_quyen 
        FROM tai_khoan AS tk
        INNER JOIN nhan_vien AS nv ON tk.id_nhanvien = nv.id
        INNER JOIN phan_quyen AS pq ON tk.phanquyen = pq.id
        ORDER BY nv.hoten ASC";
$result = $conn->query($sql);

$rowNum = 2; // Bắt đầu từ hàng thứ 2 trong Excel
while($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowNum, $rowNum - 1);
    $sheet->setCellValue('B' . $rowNum, $row['ten_tk']);
    $sheet->setCellValue('C' . $rowNum, $row['pass']);
    $sheet->setCellValue('D' . $rowNum, $row['hoten']);
    $sheet->setCellValue('E' . $rowNum, $row['phan_quyen']);
    $rowNum++;
}

$writer = new Xlsx($spreadsheet);
$fileName = 'DanhSachTaiKhoan.xlsx';
$writer->save($fileName);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
$writer->save("php://output");
?>