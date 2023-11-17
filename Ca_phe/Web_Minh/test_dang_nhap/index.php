<?php
session_start(); // Bắt đầu session
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

// Kiểm tra dữ liệu form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ten_tai_khoan = $_POST['ten_tai_khoan'];
  $mat_khau = $_POST['mat_khau'];

  // Chuẩn bị và thực hiện truy vấn
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $ten_tai_khoan);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($mat_khau, $row['password'])) {
      // Mật khẩu đúng, thiết lập thông tin session
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $ten_tai_khoan;
      // Chuyển hướng đến trang khác
      header("location: welcome.php");
    } else {
      echo "Mật khẩu không đúng.";
    }
  } else {
    echo "Không tìm thấy tài khoản.";
  }

  // Đóng statement và connection
  $stmt->close();
  $conn->close();
}
?>