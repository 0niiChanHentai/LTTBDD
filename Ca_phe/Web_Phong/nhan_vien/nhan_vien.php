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
        $sql = "SELECT * FROM nhan_vien ORDER BY hoten ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM nhan_vien WHERE hoten LIKE '%$search%' ORDER BY hoten ASC";
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


if (isset($_POST["mybutton"])) {
    echo $_POST["mybutton"];
}


if (isset($_POST["postvar"])) {
    echo $_POST["postvar"];
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH NHÂN VIÊN</label>

                        <div class="tim_kiem_them" style="margin-left: -10%;">
                            <form method="post">
                                <input type="nhap" name="timKiem" placeholder="Nhập tên nhân viên" style="width: 550px; margin-right: 10px;">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                                <div class="khoang_cach">
                                    <button type="button" name="submit" id="themmoinv" style="margin-left: 5%; width: 78px; color: #FFFACD; padding-left: 50%;">Thêm</button>
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
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 15%">Họ tên</th>
                                        <th style="width: 15%">Email</th>
                                        <th style="width: 10%">Điện thoại</th>
                                        <th style="width: 5%">Ngày sinh</th>
                                        <th style="width: 5%">Giới tính</th>
                                        <th>Địa chỉ</th>
                                        <th style="width: 5%">Lương ngày (VND)</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result as $items) : ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td><?php echo ($items['email']) ?></td>
                                            <td><?php echo ($items['dienthoai']) ?></td>
                                            <td><?php echo ($items['ngaysinh']) ?></td>
                                            <td><?php echo ($items['gioitinh']) ?></td>
                                            <td><?php echo ($items['diachi']) ?></td>
                                            <td><?php echo ($items['luong']) ?></td>
                                            <td>
                                                <form action="sua_nv.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_nv.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/nhan_vien.js" defer></script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_nv.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_nv.php";
        });
        
        window.onload = function() {
            document.getElementsByName("mybutton").onclick = function() {
                document.getElementsByName("postvar")[0].value = this.value;
                document.forms.myform.submit();
            }
        };
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>