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
require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

$servername = "localhost";
$username = "student";
$password = "123456";
$dbname = "quancaphe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function importDonHang($filePath, $conn) {
    $reader = new XlsxReader();
    $spreadsheet = $reader->load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestRow; $row++) {
        $danhsachsp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $ghichu = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
        $ghichu = $ghichu !== NULL ? $ghichu : '';
        $idkhach_hang = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $idnhan_vien = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $ten_kh = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
        $thoigianlap = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
        $tongcong = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
        $status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

        $sql = "INSERT INTO don_hang (danhsachsp, ghichu, idkhach_hang, idnhan_vien, ten_kh, thoigianlap, tongcong, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiiisii", $danhsachsp, $ghichu, $idkhach_hang, $idnhan_vien, $ten_kh, $thoigianlap, $tongcong, $status);
        $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import']) && isset($_FILES['excelFile'])) {
        if ($_FILES['excelFile']['error'] == 0) {
            importDonHang($_FILES['excelFile']['tmp_name'], $conn);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH ĐƠN HÀNG</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập mốc thời gian">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>

                        <input type="file" id="chonFileExcel" style="display:none;">
                        <form method="post" action="don_hang_excel.php">
                            <button type="submit" name="export_excel">Xuất Excel</button>
                        </form>

                        <input type="file" id="chonFileExcel" style="display:none;">
                        <form method="post" action="don_hang_cho_khach_excel.php">
                            <button type="submit" name="export_excel">Xuất đơn hàng</button>
                        </form>

                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button type="button" name="submit" id="themmoinv">Thêm</button>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="excelFile" required>
                            <input type="submit" name="import" value="Nhập Excel">
                        </form>
                        <table border="1"></table>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content" class="cuon_ngang">
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
                                    $currentDate = date('Y-m-d');
                                    foreach ($result as $items) :
                                        $dateTime = explode(' ', $items['thoigianlap']);
                                        $orderDate = date('Y-m-d', strtotime($dateTime[0]));
                                        $date = date('d-m-Y', strtotime($dateTime[0]));
                                        $time = $dateTime[1];
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
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_dh.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_dh.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>