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

        $sql = "UPDATE nguyen_lieu SET tenhang='$tenhang', giahang='$giahang', donvi='$donvi', ghichu='$ghichu' WHERE mahang='$mahang'";
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
                        <label class="title">SỬA THÔNG TIN MỤC NGUYÊN LIỆU</label>
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

                                <label>ID nguyên liệu cần sửa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="mahang" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="mahang" value="" readonly>';
                                }
                                ?></br>
                                
                                <label>Tên nguyên liệu:</label>
                                <input type="text" id="tenhang" name="tenhang" required><br>

                                <label>Giá thành:</label>
                                <input type="text" name="giahang" id="giahang" required><br>

                                <label>Đơn vị:</label>
                                <input type="text" name="donvi" id="donvi" required><br>

                                <label>Ghi chú:</label>
                                <input type="text" name="ghichu" value="(không)" required><br>
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
        function updateText(input) {
            var outputText1 = '';
            var total = 0;
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var soluongInput = row.querySelector('input[name="soluong[]"]');
                var tensp = row.querySelector('td:nth-child(2)').textContent;
                var giathanh = parseFloat(row.querySelector('td:nth-child(3)').textContent);
                var donvi = row.querySelector('td:nth-child(4)').textContent;

                if (soluongInput.value > 0) {
                    var rowTotal = giathanh * parseInt(soluongInput.value);
                    total += rowTotal;
                    outputText1 += soluongInput.value + donvi + ' ' + tensp + ', ';
                }
            });
            outputText1 = outputText1.slice(0, -2);
            document.getElementById('danhsachsp').value = outputText1;
            document.getElementById('tongtien').value = total;
        }
    </script>

    <script>
        function validateForm() {
            var mahang = document.getElementsByName('mahang')[0];

            if (mahang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin nguyên liệu cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>