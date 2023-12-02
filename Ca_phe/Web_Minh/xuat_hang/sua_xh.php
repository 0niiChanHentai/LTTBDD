<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
    exit();
}

try{
    $_SESSION['last_updated_xuat_hang'] = null;
    
    if (!empty($_POST['submit'])) {
       $idxuat_hang = $_POST['idxuat_hang'];
       $danhsachsp = $_POST['danhsachsp'];
       $ghichu = $_POST['ghichu'];
 
       $sql = "UPDATE xuat_hang SET ghichu='$ghichu', thoigianxuat=CURRENT_TIMESTAMP, danhsachsp='$danhsachsp' WHERE idxuat_hang='$idxuat_hang'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: xuat_hang.php');
    }

}
catch(Exception){
    header('location: xuat_hang.php');
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
                        <label class="title">SỬA ĐƠN XUẤT NGUYÊN LIỆU</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label class="chu">ID xuất hàng cần sửa thông tin:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="idxuat_hang" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="idxuat_hang" value="" readonly>';
                                }
                                ?></br>

                                <label class="chu">Vui lòng chọn số lượng từng sản phẩm:</label>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">STT</th>
                                            <th>Tên nguyên liệu</th>
                                            <th style="width: 10%">Giá (VND)</th>
                                            <th style="width: 10%">Đơn vị</th>
                                            <th style="width: 10%">Tổng số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $rowNumber = 1;
                                            foreach ($result1 as $item) : ?>
                                            <tr>
                                                <td><?php echo $rowNumber; ?></td>
                                                <td><?php echo $item['tenhang']; ?></td>
                                                <td><?php echo $item['giahang']; ?></td>
                                                <td><?php echo $item['donvi']; ?></td>
                                                <td><input type="number" name="soluong[]" min="0" value="0" style="width: 90%" required onchange="updateText(this), updateText2(this)"><br></td>
                                            </tr>
                                        <?php 
                                        $rowNumber++;
                                        endforeach; ?>
                                    </tbody>
                                </table><br>
                                <label class="chu">Danh sách sản phẩm (Vui lòng nhập số liệu vào bảng bên trên):</label>
                                <input type="text" id="danhsachsp" name="danhsachsp" readonly required><br>

                                <label class="chu">Ghi chú:</label>
                                <input type="text" name="ghichu" value = "(không)" required><br>
                                <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px"
                                    onclick="validateForm()">
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
        }
    </script>

    <script>
        function validateForm() {
            var idxuat_hang = document.getElementsByName('idxuat_hang')[0];

            if (idxuat_hang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin xuất hàng cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>