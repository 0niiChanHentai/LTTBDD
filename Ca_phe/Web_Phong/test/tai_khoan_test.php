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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>



    </head>
<body>
                    <div class="khung_duoi">



                        <button id="btnNhapExcel">Nhập Excel</button>
                        <button id="btnXuatExcel">Xuất Excel</button>



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
                                        <td>
                                            <!-- Nút Đổi Mật Khẩu -->
                                            <form action="doi_mat_khau.php" method="post">
                                                <input type="hidden" name="id_tk" value="<?php echo $items['id_tk']; ?>">
                                                <button type="submit" name="doiMatKhau">Đổi Mật Khẩu</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $rowNumber++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>



                    <form action="nhap_excel.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileExcel" accept=".xlsx, .xls">
                        <input type="submit" name="submitExcel" value="Nhập">
                    </form>



    <script src="../assets/js/trang_chu.js" defer></script>

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



    <script>
        document.getElementById('btnXuatExcel').addEventListener('click', function() {
            // Lấy dữ liệu từ bảng
            let table = document.querySelector('table');
            let workbook = XLSX.utils.table_to_book(table);

            // Xuất file
            XLSX.writeFile(workbook, 'DanhSachTaiKhoan.xlsx');
        });
    </script>



</body>
</html>