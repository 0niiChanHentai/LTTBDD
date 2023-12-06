<?php
include '../ket_noi.php';

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM nhap_hang ORDER BY thoigiannhap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    if (!empty($_POST['phanquyen'])) {
        $selectedQuyen = $_POST['phanquyen']; // Đây là một mảng
        $id_tk = $_POST['id_tk'];

        // Xóa các quyền hạn cũ
        $sqlDelete = "DELETE FROM nhan_vien_quyen WHERE id_nhanvien = :id_tk";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bindParam(':id_tk', $id_tk);
        $stmtDelete->execute();

        // Thêm quyền hạn mới
        foreach ($selectedQuyen as $quyen) {
            $sqlInsert = "INSERT INTO nhan_vien_quyen (id_nhanvien, id_phanquyen) VALUES (:id_tk, :quyen)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bindParam(':id_tk', $id_tk);
            $stmtInsert->bindParam(':quyen', $quyen);
            $stmtInsert->execute();
        }
    }
} catch (Exception) {
    header('location: tai_khoan.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                <!--
                    <div class="khung_tren">
                        
                    </div>
                -->
<!----------------->
                    <div class="khung_giua">
                        <label class="title">SỬA THÔNG TIN TÀI KHOẢN</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label>ID tài khoản cần sửa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="id_tk" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="id_tk" value="" readonly>';
                                }
                                ?></br>

                                <label>Tên tài khoản:</label>
                                <input type="text" name="ten_tk" required><br>

                                <label>Mật khẩu:</label>
                                <input type="password" name="pass" required><br>

                                <label>Chủ sở hữu tài khoản:</label>
                                <select name="id_nhanvien" required>
                                    <?php
                                    $nhanVienSql = "SELECT id, hoten FROM nhan_vien ORDER BY hoten ASC";
                                    $nhanVienStmt = $conn->prepare($nhanVienSql);
                                    $nhanVienStmt->execute();
                                    $nhanVienResult = $nhanVienStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($nhanVienResult as $nhanVien) : ?>
                                        <option value="<?php echo htmlspecialchars($nhanVien['id']); ?>">
                                            <?php echo htmlspecialchars($nhanVien['hoten']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                <label>Quyền hạn:</label><br>
                                <?php
                                $phanQuyenSql = "SELECT id, phan_quyen FROM phan_quyen ORDER BY phan_quyen ASC";
                                $phanQuyenStmt = $conn->prepare($phanQuyenSql);
                                $phanQuyenStmt->execute();
                                $phanQuyenResult = $phanQuyenStmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($phanQuyenResult as $phanQuyen) {
                                    echo '<input type="checkbox" name="phanquyen[]" value="'.htmlspecialchars($phanQuyen['id']).'"> ';
                                    echo htmlspecialchars($phanQuyen['phan_quyen']).'<br>';
                                }
                                ?>

                                <label>Ghi chú:</label>
                                <input type="text" name="ghichu" value="(không)" required><br>
                                <input type="submit" value="Sửa" name="submit" id="themmoi">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script>
        function validateForm() {
            var idtk = document.getElementsByName('id_tk')[0];

            if (idtk.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin tài khoản cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>