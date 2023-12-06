<?php
include '../ket_noi.php';

if (!$conn) {
    echo ("Ket noi database that bai");
    exit;
}

try {
    if (!empty($_POST['submit'])) {
        $id_tk = $_POST['id_tk'];
        $ten_tk = $_POST['ten_tk'];
        $pass = $_POST['pass'];
        $phanquyen = $_POST['phanquyen'];
        $id_nhanvien = $_POST['id_nhanvien'];
        $ghichu = $_POST['ghichu'];
    
        $sql = "UPDATE tai_khoan SET ten_tk='$ten_tk', pass='$pass', phanquyen='$phanquyen', id_nhanvien='$id_nhanvien', ghichu='$ghichu' WHERE id_tk='$id_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        if (isset($_POST['quyen_truy_cap_tai_khoan']) && $_POST['quyen_truy_cap_tai_khoan'] == '1') {
            $sqlQuyenTruyCap = "INSERT INTO quyen_truy_cap (phan_quyen_id, trang, co_quyen_truy_cap) VALUES ('$phanquyen', 'tai_khoan.php', 1) ON DUPLICATE KEY UPDATE co_quyen_truy_cap = 1";
            $stmtQuyenTruyCap = $conn->prepare($sqlQuyenTruyCap);
            $stmtQuyenTruyCap->execute();
        } else {
            $sqlXoaQuyen = "DELETE FROM quyen_truy_cap WHERE phan_quyen_id = '$phanquyen' AND trang = 'tai_khoan.php'";
            $stmtXoaQuyen = $conn->prepare($sqlXoaQuyen);
            $stmtXoaQuyen->execute();
        }

        if (isset($_POST['quyen_truy_cap_thuong_phat'])) {
            $sqlQuyenTruyCapThuongPhat = "INSERT INTO quyen_truy_cap (phan_quyen_id, trang, co_quyen_truy_cap) VALUES ('$phanquyen', 'thuong_phat.php', 1) ON DUPLICATE KEY UPDATE co_quyen_truy_cap = 1";
            $stmtQuyenTruyCapThuongPhat = $conn->prepare($sqlQuyenTruyCapThuongPhat);
            $stmtQuyenTruyCapThuongPhat->execute();
        } else {
            $sqlXoaQuyenThuongPhat = "DELETE FROM quyen_truy_cap WHERE phan_quyen_id = '$phanquyen' AND trang = 'thuong_phat.php'";
            $stmtXoaQuyenThuongPhat = $conn->prepare($sqlXoaQuyenThuongPhat);
            $stmtXoaQuyenThuongPhat->execute();
        }

        if (isset($_POST['quyen_truy_cap_nhan_vien'])) {
            $sqlQuyenTruyCapNhanVien = "INSERT INTO quyen_truy_cap (phan_quyen_id, trang, co_quyen_truy_cap) VALUES ('$phanquyen', 'nhan_vien.php', 1) ON DUPLICATE KEY UPDATE co_quyen_truy_cap = 1";
            $stmtQuyenTruyCapNhanVien = $conn->prepare($sqlQuyenTruyCapNhanVien);
            $stmtQuyenTruyCapNhanVien->execute();
        } else {
            $sqlXoaQuyenNhanVien = "DELETE FROM quyen_truy_cap WHERE phan_quyen_id = '$phanquyen' AND trang = 'nhan_vien.php'";
            $stmtXoaQuyenNhanVien = $conn->prepare($sqlXoaQuyenNhanVien);
            $stmtXoaQuyenNhanVien->execute();
        }

        if (isset($_POST['quyen_truy_cap_nhap_hang'])) {
            $sqlQuyenTruyCapNhapHang = "INSERT INTO quyen_truy_cap (phan_quyen_id, trang, co_quyen_truy_cap) VALUES ('$phanquyen', 'nhap_hang.php', 1) ON DUPLICATE KEY UPDATE co_quyen_truy_cap = 1";
            $stmtQuyenTruyCapNhapHang = $conn->prepare($sqlQuyenTruyCapNhapHang);
            $stmtQuyenTruyCapNhapHang->execute();
        } else {
            $sqlXoaQuyenNhapHang = "DELETE FROM quyen_truy_cap WHERE phan_quyen_id = '$phanquyen' AND trang = 'nhap_hang.php'";
            $stmtXoaQuyenNhapHang = $conn->prepare($sqlXoaQuyenNhapHang);
            $stmtXoaQuyenNhapHang->execute();
        }

        if (isset($_POST['quyen_truy_cap_xuat_hang'])) {
            $sqlQuyenTruyCapXuatHang = "INSERT INTO quyen_truy_cap (phan_quyen_id, trang, co_quyen_truy_cap) VALUES ('$phanquyen', 'xuat_hang.php', 1) ON DUPLICATE KEY UPDATE co_quyen_truy_cap = 1";
            $stmtQuyenTruyCapXuatHang = $conn->prepare($sqlQuyenTruyCapXuatHang);
            $stmtQuyenTruyCapXuatHang->execute();
        } else {
            $sqlXoaQuyenXuatHang = "DELETE FROM quyen_truy_cap WHERE phan_quyen_id = '$phanquyen' AND trang = 'xuat_hang.php'";
            $stmtXoaQuyenXuatHang = $conn->prepare($sqlXoaQuyenXuatHang);
            $stmtXoaQuyenXuatHang->execute();
        }

        header('location: tai_khoan.php');
    }    
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
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

                                <label>Quyền hạn:</label>
                                <select name="phanquyen" required>
                                    <?php
                                    $phanQuyenSql = "SELECT id, phan_quyen FROM phan_quyen ORDER BY phan_quyen ASC";
                                    $phanQuyenStmt = $conn->prepare($phanQuyenSql);
                                    $phanQuyenStmt->execute();
                                    $phanQuyenResult = $phanQuyenStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($phanQuyenResult as $phanQuyen) : ?>
                                        <option value="<?php echo htmlspecialchars($phanQuyen['id']); ?>">
                                            <?php echo htmlspecialchars($phanQuyen['phan_quyen']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                <label>Quyền Truy Cập Trang Tài Khoản:</label>
                                <input type="checkbox" name="quyen_truy_cap_tai_khoan" value="1"><br>

                                <label>Quyền Truy Cập Trang Thưởng Phạt:</label>
                                <input type="checkbox" name="quyen_truy_cap_thuong_phat" value="1"><br>

                                <label>Quyền Truy Cập Trang Nhân Viên:</label>
                                <input type="checkbox" name="quyen_truy_cap_nhan_vien" value="1"><br>

                                <label>Quyền Truy Cập Trang Nhập Hàng:</label>
                                <input type="checkbox" name="quyen_truy_cap_nhap_hang" value="1"><br>

                                <label>Quyền Truy Cập Trang Xuất Hàng:</label>
                                <input type="checkbox" name="quyen_truy_cap_xuat_hang" value="1"><br>

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