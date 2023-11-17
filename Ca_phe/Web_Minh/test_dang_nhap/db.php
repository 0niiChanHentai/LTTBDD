<?php
$servername = "localhost";
$username = "student";
$password = "123456";
$dbname = "test_dang_nhap";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Chuẩn bị một truy vấn SQL để thực hiện
$stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Thiết lập tham số và thực hiện
$username = 'new_user';
$password = password_hash('user_password', PASSWORD_DEFAULT);
$stmt->execute();

echo "Tạo tài khoản mới thành công.";

// Đóng truy vấn và kết nối
$stmt->close();
$conn->close();
?>