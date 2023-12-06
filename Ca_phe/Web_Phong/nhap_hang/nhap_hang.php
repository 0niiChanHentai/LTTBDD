<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

$query = "SELECT phanquyen FROM tai_khoan WHERE ten_tk = '{$_SESSION['username']}'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $phanquyen = $row['phanquyen'];

    $accessQuery = "SELECT co_quyen_truy_cap FROM quyen_truy_cap WHERE phan_quyen_id = ? AND trang = 'nhap_hang.php'";
    $accessStmt = $conn->prepare($accessQuery);
    $accessStmt->bind_param("i", $phanquyen);
    $accessStmt->execute();
    $accessResult = $accessStmt->get_result();

    if ($accessResult->num_rows > 0) {
        $accessRow = $accessResult->fetch_assoc();
        if (!$accessRow['co_quyen_truy_cap']) {
            header("Location: ../reject.php");
            exit();
        }
    } else {
        header("Location: ../reject.php");
        exit();
    }
}
?>

<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM nhap_hang ORDER BY thoigiannhap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM nhap_hang WHERE thoigiannhap LIKE '%$search%' ORDER BY thoigiannhap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
} catch (Exception) {
    echo (' ERROR!');
}

try {
    $sql_chi_phi = "SELECT DATE_FORMAT(thoigiannhap, '%Y-%m') AS YearMonth, SUM(tongtien) AS ChiPhi FROM nhap_hang GROUP BY YearMonth";
    $stmt_chi_phi = $conn->prepare($sql_chi_phi);
    $stmt_chi_phi->execute();
    $result_chi_phi = array();
    while ($row_chi_phi = $stmt_chi_phi->fetch(PDO::FETCH_ASSOC)) {
        $result_chi_phi[] = $row_chi_phi;
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
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

                        <label class="title">THỐNG KÊ NHẬP NGUYÊN LIỆU</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width:60%" name="timKiem" placeholder="Nhập mốc thời gian">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>

                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button type="button" name="submit" id="themmoinv">Thêm</button>
                        <button id="xuatExcel">Xuất Excel</button>
                        <button id="nhapExcel">Nhập Excel</button>
                        <input type="file" id="chonFileExcel" style="display:none;">
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th>Danh sách nguyên liệu nhập</th>
                                        <th style="width: 15%">Thời gian</th>
                                        <th style="width: 10%">Thành tiền</th>
                                        <th style="width: 15%">Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result as $items) :
                                        $dateAndTime = explode(' ', $items['thoigiannhap']);
                                        $date = date('d-m-Y', strtotime($dateAndTime[0]));
                                        $time = $dateAndTime[1];
                                    ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['danhsachsp']) ?></td>
                                            <td>
                                                <?php echo $date; ?><br>
                                                <?php echo $time; ?>
                                            </td>
                                            <td><?php echo ($items['tongtien']) ?></td>
                                            <td><?php echo ($items['ghichu']) ?></td>
                                            <td>
                                                <form action="sua_nh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idnhap_hang']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_nh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idnhap_hang']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table><br>

                            <div>
                                <label class="chu">Tổng chi phí theo tháng:</label>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Năm-Tháng</th>
                                            <th>Chi Phí (VND)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result_chi_phi as $items_chi_phi) : ?>
                                            <tr>
                                                <td><?php echo $items_chi_phi['YearMonth']; ?></td>
                                                <td><?php echo $items_chi_phi['ChiPhi']; ?></td>
                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div><br>

                            <?php
                            $productQuantities = [];
                            $nhapQuery = "SELECT danhsachsp FROM nhap_hang";
                            $nhapResult = $conn->query($nhapQuery);

                            while ($row = $nhapResult->fetch(PDO::FETCH_ASSOC)) {
                                $items = explode(', ', $row['danhsachsp']);
                                foreach ($items as $item) {
                                    list($quantity, $productName) = explode(' ', $item, 2);
                                    $quantity = (float)$quantity;

                                    if (!isset($productQuantities[$productName]['soluongxuat'])) {
                                        $productQuantities[$productName]['soluongxuat'] = 0;
                                    }

                                    if (!isset($productQuantities[$productName]['soluongnhap'])) {
                                        $productQuantities[$productName]['soluongnhap'] = 0;
                                    }

                                    $productQuantities[$productName]['soluongnhap'] += $quantity;
                                }
                            }

                            $xuatQuery = "SELECT danhsachsp FROM xuat_hang";
                            $xuatResult = $conn->query($xuatQuery);

                            while ($row = $xuatResult->fetch(PDO::FETCH_ASSOC)) {
                                $items = explode(', ', $row['danhsachsp']);
                                foreach ($items as $item) {
                                    list($quantity, $productName) = explode(' ', $item, 2);
                                    $quantity = (float)$quantity;

                                    if (!isset($productQuantities[$productName]['soluongnhap'])) {
                                        $productQuantities[$productName]['soluongnhap'] = 0;
                                    }

                                    if (!isset($productQuantities[$productName]['soluongxuat'])) {
                                        $productQuantities[$productName]['soluongxuat'] = 0;
                                    }

                                    $productQuantities[$productName]['soluongxuat'] += $quantity;
                                }
                            }

                            foreach ($productQuantities as $productName => $quantities) {
                                $tonkho = $quantities['soluongnhap'] - $quantities['soluongxuat'];

                                $donviQuery = "SELECT donvi FROM nguyen_lieu WHERE tenhang = :productName";
                                $donviStmt = $conn->prepare($donviQuery);
                                $donviStmt->bindParam(':productName', $productName);
                                $donviStmt->execute();
                                $donviResult = $donviStmt->fetch(PDO::FETCH_ASSOC);
                                $donvi = $donviResult['donvi'];

                                if ($tonkho < 0) {
                                    echo '<script>alert("Số lượng tồn kho dưới 0 đơn vị, vui lòng kiểm tra lại bảng Nguyên liệu Nhập kho - Xuất kho.");</script>';
                                }
                            }

                            echo '</table>';

                            $conn = null;
                            ?>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_nh.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_nh.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>