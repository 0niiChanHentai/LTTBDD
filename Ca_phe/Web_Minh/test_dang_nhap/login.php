<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // lấy thông tin người dùng
  $ten_tai_khoan = $_POST['ten_tai_khoan'];
  $mat_khau = $_POST['mat_khau'];

  // giả sử bạn đã có bảng người dùng với thông tin mật khẩu đã mã hóa
  $stmt = $conn->prepare("SELECT id, mat_khau FROM nguoi_dung WHERE ten_tai_khoan = ?");
  $stmt->bind_param("s", $ten_tai_khoan);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($mat_khau, $user['mat_khau'])) {
      // Lưu log đăng nhập
      $action = 'Đăng nhập';
      $timestamp = date('Y-m-d H:i:s');
      $log_stmt = $conn->prepare("INSERT INTO dang_nhap (ten_tai_khoan, ngay_gio, hanh_dong) VALUES (?, ?, ?)");
      $log_stmt->bind_param("sss", $ten_tai_khoan, $timestamp, $action);
      $log_stmt->execute();

      // Lưu session và chuyển hướng người dùng
      $_SESSION['login_user'] = $ten_tai_khoan;
      header("location: welcome.php");
    } else {
      $error = "Mật khẩu không đúng";
      // Hiển thị thông điệp lỗi (ví dụ: echo $error;)
    }
  } else {
    $error = "Tên tài khoản không tồn tại";
    // Hiển thị thông điệp lỗi (ví dụ: echo $error;)
  }

  // Đóng các prepared statement và kết nối
  $stmt->close();
  $log_stmt->close();
  $conn->close();
}
?>