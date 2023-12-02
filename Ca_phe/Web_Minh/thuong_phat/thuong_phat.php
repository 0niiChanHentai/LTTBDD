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
        $sql1 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.phanloai = 'Thưởng' 
            ORDER BY tp.thoigian DESC";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result1 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql1 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.thoigian LIKE '%$search%' AND tp.phanloai = 'Thưởng' 
            ORDER BY tp.thoigian DESC";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result1 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row;
        }
    }

    if (empty($_POST['submit'])) {
        $sql2 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.phanloai = 'Phạt' 
            ORDER BY tp.thoigian DESC";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        $result2 = array();
        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $result2[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql2 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.thoigian LIKE '%$search%' AND tp.phanloai = 'Phạt' 
            ORDER BY tp.thoigian DESC";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        $result2 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result2[] = $row;
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
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH THƯỞNG / PHẠT</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập tên nhân viên">
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

                            <h2 style="font-size: 24px">Danh sách tình huống thưởng:</h2>
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 20%">Nhân viên</th>
                                        <th style="width: 20%">Thời gian</th>
                                        <th style="width: 10%">Số tiền (VND)</th>
                                        <th>Nội dung</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result1 as $items) :
                                        $dateAndTime = explode(' ', $items['thoigian']);
                                        $date = date('d-m-Y', strtotime($dateAndTime[0]));
                                        $time = $dateAndTime[1];
                                    ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td>
                                                <?php echo $date; ?><br>
                                                <?php echo $time; ?>
                                            </td>
                                            <td><?php echo ($items['sotien']) ?></td>
                                            <td><?php echo ($items['noidung']) ?></td>
                                            <td>
                                                <form action="sua_tp.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_tp.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table>

                            <h2 style="font-size: 24px; margin-top: 5%">Danh sách tình huống phạt:</h2>
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 20%">Nhân viên</th>
                                        <th style="width: 20%">Thời gian</th>
                                        <th style="width: 10%">Số tiền (VND)</th>
                                        <th>Nội dung</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result2 as $items) :
                                        $dateAndTime = explode(' ', $items['thoigian']);
                                        $date = date('d-m-Y', strtotime($dateAndTime[0]));
                                        $time = $dateAndTime[1];
                                    ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td>
                                                <?php echo $date; ?><br> 
                                                <?php echo $time; ?>
                                            </td>
                                            <td><?php echo ($items['sotien']) ?></td>
                                            <td><?php echo ($items['noidung']) ?></td>
                                            <td>
                                                <form action="sua_tp.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_tp.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">X</button>
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
    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_tp.php";
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