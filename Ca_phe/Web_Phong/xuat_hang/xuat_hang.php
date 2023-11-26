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

    if ($phanquyen !== '1') {
        header("Location: ../reject.php");
        exit();
    }
}
?>

<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM xuat_hang ORDER BY thoigianxuat DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM xuat_hang WHERE thoigianxuat LIKE '%$search%' ORDER BY thoigianxuat DESC";
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
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH XUẤT NGUYÊN LIỆU</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập mốc thời gian">
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
                                        <th>Danh sách nguyên liệu xuất kho</th>
                                        <th style="width: 15%">Thời gian</th>
                                        <th style="width: 15%">Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result as $items) :
                                        $dateAndTime = explode(' ', $items['thoigianxuat']);
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
                                            <td><?php echo ($items['ghichu']) ?></td>
                                            <td>
                                                <form action="sua_xh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idxuat_hang']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_xh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idxuat_hang']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table><br>

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
                                    echo '<script>alert("Số lượng tồn kho dưới 0 đơn vị, vui lòng kiểm tra lại bảng Nhập kho - Xuất kho.");</script>';
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
    <script src="../assets/js/xuat_hang.js" defer></script>

    <script>
        function validateForm2() {
            var rows = document.querySelectorAll('tbody tr');
            var danhSach = document.getElementsByName('danhsachsp')[0];
            var tonkhoError = false;

            rows.forEach(function(row) {
                var soluongInput = row.querySelector('input[name="soluong[]"]');
                var tensp = row.querySelector('td:nth-child(2)').textContent;
                var giathanh = parseFloat(row.querySelector('td:nth-child(3)').textContent);

                if (soluongInput.value > 0) {
                    var soluong = parseInt(soluongInput.value);
                    var rowTotal = giathanh * soluong;

                    if (soluong > rowTotal) {
                        tonkhoError = true;
                        alert("Tồn kho < 0, vui lòng nhập lại cho sản phẩm: " + tensp);
                        return false;
                    }
                }
            });

            if (tonkhoError) {
                return false;
            }

            if (danhSach.value === "") {
                alert("Thông tin không hợp lệ.");
                return false;
            }
        }
    </script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_xh.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_xh.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>