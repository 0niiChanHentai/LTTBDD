<?php
include '../ket_noi.php';

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {

    if (!empty($_POST['submit'])) {
        $iddon_hang = $_POST['iddon_hang'];
        $danhsachsp = $_POST['danhsachsp'];
        $idkhach_hang = $_POST['idkhach_hang'];
        $idnhan_vien = $_POST['idnhan_vien'];
        $ten_kh = $_POST['ten_kh'];
        $thoigianlap = $_POST['thoigianlap'];
        $tongcong = $_POST['tongcong'];
        $ghichu = $_POST['ghichu'];

        $sql = "INSERT INTO don_hang (ghichu, tongcong, thoigianlap, danhsachsp, idkhach_hang, idnhan_vien, ten_kh) 
            VALUES ('$ghichu', '$tongcong', CURRENT_TIMESTAMP, '$danhsachsp', '$idkhach_hang', '$idnhan_vien', '$ten_kh')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: don_hang.php');
    }
} catch (Exception) {
    header('location: don_hang.php');
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result1 = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row; // Add each row to the $result1 array
        }
    }
} catch (Exception $e) {
    echo (' ERROR!');
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
                        >
                    </div>
                -->
<!----------------->
                    <div class="khung_giua">
                        <label class="title">THÊM THÔNG TIN ĐƠN HÀNG</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label>Chọn khách hàng:</label>
                                <select name="idkhach_hang" style="height: 22px">
                                    <option value="">Khách vãng lai</option>
                                    <?php
                                    $sql1 = "SELECT * FROM khach_hang WHERE tenkh <> 'Khách vãng lai'";
                                    $result = $conn->query($sql1);
                                    if (empty($_POST['submit'])) {
                                        $sql = "SELECT * FROM khach_hang  WHERE tenkh <> 'Khách vãng lai' ORDER BY tenkh ASC";
                                        $stmt = $conn->prepare($sql);
                                        $query = $stmt->execute();
                                        $result = array();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['idkh'] . '">' . $row['tenkh'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select><br>

                                <label>Chọn nhân viên bán hàng:</label>
                                <select name="idnhan_vien" style="height: 22px">
                                    <option value="">Vui lòng chọn nhân viên bán hàng</option>
                                    <?php
                                    $sql1 = "SELECT * FROM nhan_vien";
                                    $result = $conn->query($sql1);

                                    if (empty($_POST['submit'])) {
                                        $sql = "SELECT * FROM nhan_vien ORDER BY hoten ASC";
                                        $stmt = $conn->prepare($sql);
                                        $query = $stmt->execute();
                                        $result = array();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['hoten'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select><br>

                                <label>Tên người nhận hàng (nếu khách hàng không cung cấp tên, ghi '(Không)'):</label>
                                <input type="text" name="ten_kh" value = "(không)" required><br>

                                <label>Vui lòng chọn số lượng từng sản phẩm:</label>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th style="width: 10%">Giá (VND)</th>
                                            <th style="width: 10%">Tổng số lượng</th>
                                            <th style="width: 10%">Số lượng thêm/bớt</th>
                                            <th style="width: 20%">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rowNumber = 1;
                                        foreach ($result1 as $item) :
                                        ?>
                                            <tr>
                                                <td><?php echo $rowNumber; ?></td>
                                                <td><?php echo $item['tensp']; ?></td>
                                                <td><?php echo $item['giathanh']; ?></td>
                                                <td>
                                                    <input type="number" name="soluong[]" min="0" value="0" style="width: 90%" required onchange="updateText(this), updateText2(this)"><br>
                                                </td>
                                                <td>
                                                    <input type="number" name="soluong_them_bot[]" min="0" value="0" style="width: 90%">
                                                </td>
                                                <td>
                                                    <button type="button" onclick="addQuantity(this)" style="width: 45%">Thêm</button>
                                                    <button type="button" onclick="subtractQuantity(this)" style="width: 45%">Bớt</button>
                                                </td>
                                            </tr>
                                        <?php
                                            $rowNumber++;
                                        endforeach; ?>
                                    </tbody>
                                </table><br>

                                <label>Danh sách sản phẩm (Vui lòng nhập số liệu vào bảng bên trên):</label>
                                <input type="text" id="danhsachsp" name="danhsachsp" readonly required><br>

                                <label>Thành tiền (Tự động tính toán sau khi nhập số liệu trên bảng):</label>
                                <input type="text" name="tongcong" id="tongcong" class="total" readonly required><br>

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
    <script>
        function updateText(input) {
            var outputText1 = '';
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var soluongInput = row.querySelector('input[name="soluong[]"]');
                var tensp = row.querySelector('td:nth-child(2)').textContent;

                if (soluongInput.value > 0) {
                    outputText1 += soluongInput.value + ' ' + tensp + ', ';
                }
            });

            outputText1 = outputText1.slice(0, -2);
            document.getElementById('danhsachsp').value = outputText1;
        }
    </script>

    <script>
        function updateText(input) {
            var outputText1 = '';
            var total = 0;
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var soluongInput = row.querySelector('input[name="soluong[]"]');
                var tensp = row.querySelector('td:nth-child(2)').textContent;
                var giathanh = parseFloat(row.querySelector('td:nth-child(3)').textContent);

                if (soluongInput.value > 0) {
                    var rowTotal = giathanh * parseInt(soluongInput.value);
                    total += rowTotal;
                    outputText1 += soluongInput.value + ' ' + tensp + ', ';
                }
            });

            outputText1 = outputText1.slice(0, -2);
            document.getElementById('danhsachsp').value = outputText1;

            document.getElementById('tongcong').value = total;
        }
    </script>

    <script>
        function validateForm2() {
            var donHang = document.getElementsByName('iddon_hang')[0];
            var khachHang = document.getElementsByName('idkhach_hang')[0];
            var nhanVien = document.getElementsByName('idnhan_vien')[0];
            var danhSach = document.getElementsByName('danhsachsp')[0];

            if (khachHang.value === "" || danhSach.value === "" || donHang.value === "" || nhanVien.value === "") {
                alert("Thông tin không hợp lệ.");
                return false;
            }
        }
    </script>

    <script>
        function addQuantity(button) {
            var row = button.parentNode.parentNode;
            var quantityInput = row.querySelector('input[name="soluong[]"]');
            var additionalInput = row.querySelector('input[name="soluong_them_bot[]"]');

            var currentQuantity = parseInt(quantityInput.value);
            var additionalQuantity = parseInt(additionalInput.value);

            currentQuantity += additionalQuantity;

            quantityInput.value = currentQuantity;

            additionalInput.value = 0;

            updateText(quantityInput);
            updateText2(quantityInput);
        }

        function subtractQuantity(button) {
            var row = button.parentNode.parentNode;
            var quantityInput = row.querySelector('input[name="soluong[]"]');
            var additionalInput = row.querySelector('input[name="soluong_them_bot[]"]');

            var currentQuantity = parseInt(quantityInput.value);
            var additionalQuantity = parseInt(additionalInput.value);

            currentQuantity -= additionalQuantity;

            if (currentQuantity < 0) {
                currentQuantity = 0;
            }

            quantityInput.value = currentQuantity;

            additionalInput.value = 0;

            updateText(quantityInput);
            updateText2(quantityInput);
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>