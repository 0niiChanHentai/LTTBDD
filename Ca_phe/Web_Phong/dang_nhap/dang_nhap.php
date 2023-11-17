<?php
session_start();

// Include the database connection code here
$db_host = 'localhost';  // Change to your database host
$db_user = 'student';  // Change to your database username
$db_pass = '123456';  // Change to your database password
$db_name = 'quancaphe';  // Change to your database name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tai_khoan WHERE ten_tk = '$username' AND pass = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $phanquyen = $row['phanquyen'];
        $action = 'Đăng nhập';
        $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO quan_ly_log (ten_tai_khoan, ngay_gio, hanh_dong) VALUES ('$username', CURRENT_TIMESTAMP, '$action')";
        $conn->query($sql);

        if ($phanquyen === 'quyen2' && $_SERVER['REQUEST_URI'] === '../nhan_vien/nhan_vien.php') {
            $_SESSION['message'] = "Bạn không đủ quyền hạn";
            header("Location: ../doanh_thu/doanh_thu.php");
            exit();
        }

        if ($phanquyen === 'quyen2' && $_SERVER['REQUEST_URI'] === '../nhan_vien/them_nv.php') {
            $_SESSION['message'] = "Bạn không đủ quyền hạn";
            header("Location: ../doanh_thu/doanh_thu.php");
            exit();
        }

        if ($phanquyen === 'quyen2' && $_SERVER['REQUEST_URI'] === '../nhan_vien/sua_nv.php') {
            $_SESSION['message'] = "Bạn không đủ quyền hạn";
            header("Location: ../doanh_thu/doanh_thu.php");
            exit();
        }

        if ($phanquyen === 'quyen2' && $_SERVER['REQUEST_URI'] === '../nhan_vien/xoa_nv.php') {
            $_SESSION['message'] = "Bạn không đủ quyền hạn";
            header("Location: ../doanh_thu/doanh_thu.php");
            exit();
        }

        // Login successful
        $_SESSION['username'] = $username;
        header("Location: ../doanh_thu/doanh_thu.php");
    } else {
        $_SESSION['message'] = "Sai tên đăng nhập hoặc mật khẩu";
        header("Location: dang_nhap.html");
    }
} else {
    header("Location: dang_nhap.html");
}

$conn->close();
?>
