<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT dh.iddon_hang, dh.danhsachsp, dh.ghichu, kh.tenkh, nhanvien.hoten, dh.ten_kh, dh.thoigianlap, dh.tongcong
        FROM don_hang dh
        JOIN khach_hang kh ON dh.idkhach_hang = kh.idkh
        JOIN nhan_vien nhanvien ON dh.idnhan_vien = nhanvien.id
        ORDER BY dh.thoigianlap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT dh.iddon_hang, dh.danhsachsp, dh.ghichu, kh.tenkh, nhanvien.hoten, dh.ten_kh, dh.thoigianlap, dh.tongcong
            FROM don_hang dh
            JOIN khach_hang kh ON dh.idkhach_hang = kh.idkh
            JOIN nhan_vien nhanvien ON dh.idnhan_vien = nhanvien.id
            WHERE dh.thoigianlap LIKE :search
            ORDER BY dh.thoigianlap DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
} catch (Exception) {
    echo (' ERROR!');
}
?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/trang_chu.css">
    <link rel="stylesheet" href="../assets/css/loi.css">
</head>
<body>
                    <div class="khung_duoi">
                        <div id="content">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 20%">Danh sách sản phẩm</th>
                                        <th>Khách hàng đặt đơn</th>
                                        <th>Nhân viên bán hàng</th>
                                        <th>Họ tên người nhận hàng</th>
                                        <th style="width: 15%">Thời gian</th>
                                        <th style="width: 10%">Thành tiền (VND)</th>
                                        <th style="width: 10%">Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
<tbody>
    <?php
    $rowNumber = 1;
    $currentDate = date('Y-m-d'); // Lấy ngày hiện tại
    foreach ($result as $items) :
        $dateTime = explode(' ', $items['thoigianlap']);
        $orderDate = date('Y-m-d', strtotime($dateTime[0]));
        $date = date('d-m-Y', strtotime($dateTime[0]));
        $time = $dateTime[1];

        // Kiểm tra xem đơn hàng có phải từ ngày hôm qua trở về trước
        $isPastOrder = $currentDate > $orderDate;
    ?>
        <tr>
            <td><?php echo $rowNumber; ?></td>
            <td><?php echo $items['danhsachsp']; ?></td>
            <td><?php echo $items['tenkh']; ?></td>
            <td><?php echo $items['hoten']; ?></td>
            <td><?php echo $items['ten_kh']; ?></td>
            <td><?php echo $date . '<br>' . $time; ?></td>
            <td><?php echo $items['tongcong']; ?></td>
            <td><?php echo $items['ghichu']; ?></td>
            <?php if (!$isPastOrder) : ?>
                <td>
                    <form action="sua_dh.php" method="post">
                        <button type="submit" value="<?php echo $items['iddon_hang']; ?>" name="buttonValue">S</button>
                    </form>
                </td>
                <td>
                    <form action="xoa_dh.php" method="post">
                        <button type="submit" value="<?php echo $items['iddon_hang']; ?>" name="buttonValue">X</button>
                    </form>
                </td>
            <?php else : ?>
                <td colspan="2">Không thể sửa/xóa</td>
            <?php endif; ?>
        </tr>
    <?php
        $rowNumber++;
    endforeach;
    ?>
</tbody>

                            </table>
                        </div>
                    </div>
</body>
</html>