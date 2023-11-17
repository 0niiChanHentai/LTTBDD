<?php
session_start();

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("location: login.php");
    exit;
}

// Chào mừng người dùng
echo "Xin chào, " . $_SESSION['username'] . "!<br>";
echo "<a href='logout.php'>Đăng xuất</a>";