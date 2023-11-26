<?php
include 'db_ket_noi.php'; // Đảm bảo rằng đường dẫn đúng đến file kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['doiMatKhau'])) {
    $idTk = $_POST['id_tk'];

    // Kiểm tra xem các trường dữ liệu đã được đặt hay chưa
    $matKhauMoi = isset($_POST['mat_khau_moi']) ? $_POST['mat_khau_moi'] : '';
    $matKhauXacNhan = isset($_POST['mat_khau_xac_nhan']) ? $_POST['mat_khau_xac_nhan'] : '';

    // Kiểm tra mật khẩu mới và mật khẩu xác nhận có giống nhau không
    if ($matKhauMoi != $matKhauXacNhan) {
        echo "Mật khẩu xác nhận không khớp.";
    } else {
        // Mã hóa mật khẩu mới
        $matKhauMoiHash = password_hash($matKhauMoi, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu vào cơ sở dữ liệu
        $sql = "UPDATE tai_khoan SET pass = ? WHERE id_tk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matKhauMoiHash, $idTk]);

        if ($stmt->rowCount() > 0) {
            echo "Mật khẩu đã được cập nhật thành công.";
        } else {
            echo "Đã có lỗi xảy ra trong quá trình cập nhật mật khẩu.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
</head>
<body>
    <h2>Đổi Mật Khẩu</h2>
    <form action="" method="post">
        <input type="hidden" name="id_tk" value="<?php echo isset($idTk) ? $idTk : ''; ?>">
        <label for="mat_khau_moi">Mật khẩu mới:</label>
        <input type="password" name="mat_khau_moi" required><br>
        <label for="mat_khau_xac_nhan">Xác nhận mật khẩu:</label>
        <input type="password" name="mat_khau_xac_nhan" required><br>
        <button type="submit" name="doiMatKhau">Đổi Mật Khẩu</button>
    </form>
</body>
</html>