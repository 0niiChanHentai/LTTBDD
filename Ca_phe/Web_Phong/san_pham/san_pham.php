<?php
include '../ket_noi.php';

try{
    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM san_pham WHERE tensp LIKE '%$search%' ORDER BY tensp ASC";
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

function importSanPham($filePath, $conn) {
    $reader = new XlsxReader();
    $spreadsheet = $reader->load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestRow; $row++) {
        $tensp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $giathanh = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $thanhphan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $hinhanh = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $mota = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
        $phanloai = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
        $id_danhmuc = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
        $ghichu = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
        $ghichu = $ghichu !== NULL ? $ghichu : ''; // Gán giá trị mặc định nếu NULL

        $sql = "INSERT INTO san_pham (tensp, giathanh, thanhphan, hinhanh, mota, phanloai, id_danhmuc, ghichu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sississi", $tensp, $giathanh, $thanhphan, $hinhanh, $mota, $phanloai, $id_danhmuc, $ghichu);
        $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['import']) && isset($_FILES['excelFile'])) {
        if ($_FILES['excelFile']['error'] == 0) {
            importSanPham($_FILES['excelFile']['tmp_name'], $conn);
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

                        <label class="title">DANH SÁCH SẢN PHẨM</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập tên sản phẩm">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>

                        <input type="file" id="chonFileExcel" style="display:none;">
                        <form method="post" action="san_pham_excel.php">
                            <button type="submit" name="export_excel">Xuất Excel</button>
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
                        <div id="content">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 15%">Tên sản phẩm</th>
                                        <th style="width: 10%">Giá (VND)</th>
                                        <th>Thành phần</th>
                                        <th style="width: 15%">Ghi chú</th>
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
                                        <td><?php echo($items['tensp'])?></td>
                                        <td><?php echo($items['giathanh'])?></td>
                                        <td><?php echo($items['thanhphan'])?></td>
                                        <td><?php echo($items['ghichu'])?></td>
                                        <td>
                                            <form action="sua_sp.php" method="post">
                                                <button type="submit" value="<?php echo($items['masp'])?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_sp.php" method="post">
                                                <button type="submit" value="<?php echo($items['masp'])?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php 
                                        $rowNumber++;
                                        endforeach;?>
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
            window.location.href = "them_sp.php";
        });

            document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_sp.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>