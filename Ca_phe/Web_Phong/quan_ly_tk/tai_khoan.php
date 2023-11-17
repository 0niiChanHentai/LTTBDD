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
        $sql = "SELECT tk.ten_tk, tk.pass, tk.pass, tk.id_tk, nv.hoten, pq.phan_quyen 
            FROM tai_khoan AS tk
            INNER JOIN nhan_vien AS nv ON tk.id_nhanvien = nv.id
            INNER JOIN phan_quyen AS pq ON tk.phanquyen = pq.id
            ORDER BY (tk.phanquyen = '1') DESC, nv.hoten ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT tk.ten_tk, tk.pass, tk.id_tk, nv.hoten, pq.phan_quyen 
                FROM tai_khoan AS tk
                INNER JOIN nhan_vien AS nv ON tk.id_nhanvien = nv.id
                INNER JOIN phan_quyen AS pq ON tk.phanquyen = pq.id
                WHERE nv.hoten LIKE '%$search%'
                ORDER BY nv.hoten ASC";
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

                        <label class="title">DANH SÁCH CÁC TÀI KHOẢN</label>
                        <a href="quan_ly_log.php">
                            <button class="nut2" style="width: auto; padding-left:2%; padding-right:2%; border-radius: 4px"></i>Quản lý đăng nhập / đăng xuất</button>
                        </a>

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
                                        <th style="width: 20%">Tài khoản</th>
                                        <th style="width: 20%">Mật khẩu</th>
                                        <th>Chủ tài khoản</th>
                                        <th style="width: 15%">Quyền hạn</th>
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
                                            <td><?php echo ($items['ten_tk']) ?></td>
                                            <td><?php echo ($items['pass']) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td><?php echo ($items['phan_quyen']) ?></td>
                                            <td>
                                                <form action="sua_tk.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id_tk']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_tk.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['id_tk']) ?>" name="buttonValue">X</button>
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
    <script src="../assets/js/tai_khoan.js" defer></script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_tk.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_tk.php";
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