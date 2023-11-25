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
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH ĐƠN HÀNG</label>

                        <div class="tim_kiem_them" style="margin-left: -10%;">
                            <form method="post">
                                <input type="nhap" name="timKiem" placeholder="Nhập mốc thời gian" style="width: 550px; margin-right: 10px;">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                                <div class="khoang_cach">
                                    <button type="button" name="submit" id="themmoinv" style="margin-left: 5%; width: 80px; color: #FFFACD; padding-left: 50%;">Thêm</button>
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
                                    foreach ($result as $items) :
                                        $dateTime = explode(' ', $items['thoigianlap']);
                                        $date = date('d-m-Y', strtotime($dateTime[0]));
                                        $time = $dateTime[1];
                                    ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['danhsachsp']) ?></td>
                                            <td><?php echo ($items['tenkh']) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td><?php echo ($items['ten_kh']) ?></td>
                                            <td>
                                                <?php echo $date; ?><br>
                                                <?php echo $time; ?>
                                            </td>
                                            <td><?php echo ($items['tongcong']) ?></td>
                                            <td><?php echo ($items['ghichu']) ?></td>
                                            <td>
                                                <form action="sua_dh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['iddon_hang']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_dh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['iddon_hang']) ?>" name="buttonValue">X</button>
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
            window.location.href = "them_dh.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_dh.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>