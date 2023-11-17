<?php
include 'db.php'; // Sử dụng file db.php đã tạo để kết nối cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

// Truy vấn lấy dữ liệu từ bảng dang_nhap
$sql = "SELECT * FROM dang_nhap ORDER BY ngay_gio DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lịch Sử Đăng Nhập và Đăng Xuất</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Lịch Sử Đăng Nhập và Đăng Xuất</h2>

<table>
<tr>
        <th>ID</th>
        <th>Tên Tài Khoản</th>
        <th>Ngày</th>
        <th>Giờ</th>
        <th>Hành Động</th>
    </tr>
    <?php
    // Kiểm tra xem có dữ liệu hay không
    if ($result->num_rows > 0) {
        // Xuất dữ liệu của mỗi hàng
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["ten_tai_khoan"]."</td>
                    <td>".$row["ngay_gio"]."</td>
                    <td>".$row["hanh_dong"]."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>