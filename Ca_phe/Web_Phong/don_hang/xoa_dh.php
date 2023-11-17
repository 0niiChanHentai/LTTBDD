<?php
include '../ket_noi.php';

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM don_hang ORDER BY thoigianlap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    if (!empty($_POST['submit'])) {
        $iddon_hang = $_POST['iddon_hang'];

        $sql = "DELETE FROM don_hang WHERE iddon_hang = '$iddon_hang'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: don_hang.php');
    }
} catch (Exception) {
    header('location: don_hang.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">XÓA ĐƠN HÀNG</label>
                    </div>
<!----------------->
                <!--
                    <div class="khung_giua">

                    </div>
                -->
<!----------------->
                <div class="khung_duoi" style="margin-top: -2%;">

                    <div id="content" style="margin-left:5%;">
                        <form method="post" style="display:flex; flex-direction:column;">
                            <label>ID sản phẩm cần xóa:</label>
                            <?php
                            if (isset($_POST['buttonValue'])) {
                                $buttonValue = $_POST['buttonValue'];
                                echo '<input type="text" name="iddon_hang" value="' . $buttonValue . '" readonly>';
                            } else {
                                echo '<input type="text" name="iddon_hang" value="" readonly>';
                            }
                            ?></br>
                            <input type="submit" value="Xóa" name="submit" id="xoabo" style="width: 120px; height: 40px" onclick="return confirmDelete()">
                        </form>
                    </div>
                </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="donhang.js" defer></script>
    
    <script>
        function confirmDelete() {
            var donHang = document.getElementsByName('iddon_hang')[0];
            if (donHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: don_hang.php');
            } else {
                var result = confirm("Bạn có muốn xóa đơn hàng này không?");
                if (result) {
                    // User clicked OK, continue with the form submission.
                    return true;
                } else {
                    // User clicked Cancel, prevent the form submission.
                    return false;
                }
            }

        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>