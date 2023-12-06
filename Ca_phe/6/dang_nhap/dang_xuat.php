<?php
    include '../db_ket_noi.php';
    session_start();

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
    }

    if(isset($_SESSION['username'])){
    // Lưu đăng xuất
    $ten_tai_khoan = $_SESSION['username'];
    $action = 'Đăng xuất';
    $timestamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO quan_ly_log (ten_tai_khoan, ngay_gio, hanh_dong) VALUES ('$username', CURRENT_TIMESTAMP, '$action')";
    $conn->query($sql);

    // Xóa session và chuyển hướng người dùng
    session_destroy();
    header("Location: dang_nhap.html");
    exit();
}