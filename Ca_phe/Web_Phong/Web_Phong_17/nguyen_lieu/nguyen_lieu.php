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

    if ($phanquyen !== '1' && $phanquyen !== '2') {
        header("Location: ../reject.php");
            exit();
    }
}
?>

<?php
include '../ket_noi.php';

try{
    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM nguyen_lieu ORDER BY tenhang ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM nguyen_lieu WHERE tenhang LIKE '%$search%' ORDER BY tenhang ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
}
catch(Exception){
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
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">THỐNG KÊ NGUYÊN LIỆU</label>

                        <div class="tim_kiem_them" style="margin-left: -10%;">
                            <form method="post">
                                <input type="nhap" name="timKiem" placeholder="Nhập tên nguyên liệu"
                                    style="width: 550px; margin-right: 10px;">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                                <div class="khoang_cach">

                                <button type="button" name="submit" id="themmoinv"
                                    style="margin-left: 5%; width: 78px; color: #FFFACD; padding-left: 50%;">Thêm</button>
                            </form>
                        </div>
                        
                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button id="xuatExcel">Xuất Excel</button>
                        <button id="nhapExcel">Nhập Excel</button>
                        <input type="file" id="chonFileExcel" style="display:none;">
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content" style="margin-left: 5%;">

                            <h2>Danh mục nguyên liệu:</h2>

                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 30%">Tên nguyên liệu</th>
                                        <th style="width: 10%">Giá (VND)</th>
                                        <th style="width: 10%">Đơn vị</th>
                                        <th>Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $rowNumber = 1;
                                        foreach($result as $items): ?>
                                    <tr>
                                        <td><?php echo($rowNumber)?></td>
                                        <td><?php echo($items['tenhang'])?></td>
                                        <td><?php echo($items['giahang'])?></td>
                                        <td><?php echo($items['donvi'])?></td>
                                        <td><?php echo($items['ghichu'])?></td>
                                        <td>
                                            <form action="sua_nl.php" method="post">
                                                <button type="submit" value="<?php echo($items['mahang'])?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_nl.php" method="post">
                                                <button type="submit" value="<?php echo($items['mahang'])?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php 
                                        $rowNumber++;
                                        endforeach;?>
                                </tbody>
                            </table><br>

                            <h2>Danh sách nguyên liệu tồn kho:</h2>

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

                            echo '<table border="1">
                                <tr>
                                    <th style="width:5%">STT</th>
                                    <th>Tên nguyên liệu</th>
                                    <th style="width:20%">Lượng tồn kho</th>
                                    <th style="width:10%">Đơn vị</th>
                                </tr>';

                            $rowNumber = 1;
                            foreach ($productQuantities as $productName => $quantities) {
                                $tonkho = $quantities['soluongnhap'] - $quantities['soluongxuat'];

                                $donviQuery = "SELECT donvi FROM nguyen_lieu WHERE tenhang = :productName ORDER BY tenhang ASC";
                                $donviStmt = $conn->prepare($donviQuery);
                                $donviStmt->bindParam(':productName', $productName);
                                $donviStmt->execute();
                                $donviResult = $donviStmt->fetch(PDO::FETCH_ASSOC);
                                $donvi = $donviResult['donvi'];

                                echo '<tr>';
                                echo '<td>' . $rowNumber . '</td>';
                                echo '<td>' . $productName . '</td>';
                                echo '<td>' . $tonkho . '</td>';
                                echo '<td>' . trim($donvi) . '</td>';
                                echo '</tr>';

                                if ($tonkho < 0) {
                                    echo '<script>alert("Số lượng tồn kho dưới 0 đơn vị, vui lòng kiểm tra lại bảng Nguyên liệu Nhập kho - Xuất kho.");</script>';
                                }
                                $rowNumber++;
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
    <script src="../assets/js/nhap_hang.js" defer></script>

    <script>
            document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_nl.php";
        });

            document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_nl.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>