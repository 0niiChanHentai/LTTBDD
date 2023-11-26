<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "student";  // Thay thế bằng username của bạn
$password = "123456";  // Thay thế bằng password của bạn
$dbname = "myDatabase";       // Thay thế bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý tập tin được tải lên
if (isset($_FILES['fileToUpload'])) {
    $inputFileName = $_FILES['fileToUpload']['tmp_name'];

    // Đọc tập tin Excel
    $spreadsheet = IOFactory::load($inputFileName);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    foreach ($sheetData as $row) {
        // Bỏ qua dòng đầu tiên nếu là tiêu đề
        if ($row === $sheetData[0]) continue;

        $column1 = $row[0];
        $column2 = $row[1];
        $column3 = $row[2];

        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO myTable (column1, column2, column3) VALUES ('$column1', '$column2', '$column3')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "File uploaded and data imported successfully!";
} else {
    echo "No file uploaded.";
}

$conn->close();
?>