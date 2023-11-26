<?php
require '../vendor/autoload.php'; // Đảm bảo đường dẫn đúng đến autoload.php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// Cấu hình kết nối cơ sở dữ liệu
$db_host = 'localhost';
$db_user = 'student';
$db_pass = '123456';
$db_name = 'quancaphe';

// Hàm kết nối cơ sở dữ liệu
function dbConnect($db_host, $db_name, $db_user, $db_pass) {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        return new PDO($dsn, $db_user, $db_pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

// Kiểm tra xem có file được tải lên không
if (isset($_POST['submitExcel'])) {
    $file = $_FILES['fileExcel']['tmp_name'];

    $reader = new Xlsx();
    try {
        // Đọc file Excel
        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Kết nối cơ sở dữ liệu
        $conn = dbConnect($db_host, $db_name, $db_user, $db_pass);

        // Xử lý và cập nhật dữ liệu vào cơ sở dữ liệu
        foreach ($sheetData as $row) {
            // Bỏ qua hàng tiêu đề hoặc hàng trống
            if ($row['A'] === 'ID' || empty($row['A'])) continue;

            // Kiểm tra xem phanquyen có tồn tại trong bảng phan_quyen không
            $queryPhanQuyen = "SELECT id FROM phan_quyen WHERE id = ?";
            $stmtPhanQuyen = $conn->prepare($queryPhanQuyen);
            $stmtPhanQuyen->execute([$row['C']]);
            if ($stmtPhanQuyen->rowCount() == 0) {
                // Nếu không tồn tại, bỏ qua hàng này hoặc xử lý tùy theo nhu cầu
                continue;
            }

            // Xây dựng và thực thi câu lệnh SQL
            $sql = "INSERT INTO tai_khoan (ten_tk, pass, phanquyen, id_nhanvien, ghichu) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$row['A'], $row['B'], $row['C'], $row['D'], $row['E']]);
        }

        echo "Dữ liệu đã được nhập thành công.";

    } catch (\Exception $e) {
        echo 'Lỗi khi đọc file Excel: ' . $e->getMessage();
    }
}
?>