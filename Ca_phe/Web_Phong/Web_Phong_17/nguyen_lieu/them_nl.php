<?php
include '../ket_noi.php';

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (!empty($_POST['submit'])) {
        $mahang = $_POST['mahang'];
        $tenhang = $_POST['tenhang'];
        $giahang = $_POST['giahang'];
        $donvi = $_POST['donvi'];
        $ghichu = $_POST['ghichu'];

        $sql = "INSERT INTO nguyen_lieu (tenhang, giahang, donvi, ghichu) 
            VALUES ('$tenhang', '$giahang', '$donvi', '$ghichu')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: nguyen_lieu.php');
    }
} catch (Exception) {
    header('location: nguyen_lieu.php');
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM nguyen_lieu ORDER BY tenhang ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result1 = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row;
        }
    }
} catch (Exception $e) {
    echo (' ERROR!');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title">THÊM THÔNG TIN MỤC NGUYÊN LIỆU</label>
                    </div>
<!----------------->
                <!--
                    <div class="khung_giua">

                    </div>
                -->
<!----------------->
                    <div class="khung_duoi" style="margin-top: -2%;">
                        <div id="content" style="margin-left: 5%;">
                            <form method="post" style="display:flex; flex-direction:column;">
                                
                                <label>Tên nguyên liệu:</label>
                                <input type="text" id="tenhang" name="tenhang" required><br>

                                <label>Giá thành:</label>
                                <input type="text" name="giahang" id="giahang" required><br>

                                <label>Đơn vị:</label>
                                <input type="text" name="donvi" id="donvi" required><br>

                                <label>Ghi chú:</label>
                                <input type="text" name="ghichu" value = "(không)" required><br>
                                <input type="submit" value="Thêm mới" name="submit" id="themmoi" style="width: 120px; height: 40px" onclick="validateForm()">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/nguyen_lieu.js" defer></script>

    <script>
        function validateForm2() {
            var mahang = document.getElementsByName('mahang')[0];

            if (mahang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin nguyên liệu cần thêm");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>