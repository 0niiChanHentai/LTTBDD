<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren" style="margin-left: 2%">
                        <label class="title">LỌC DOANH THU THEO THỜI GIAN</label>
                    </div>
<!----------------->
                    <!-- <div class="khung_giua">

                    </div> -->
<!----------------->
                    <div class="khung_duoi" style="margin-top:5%; margin-left:2%">
                        <p>Vui lòng nhập hai mốc thời gian phân biệt:</p>
                        <form method="post" style="margin-bottom:2%">
                            Ngày bắt đầu: <input type="date" name="pickdate1" id="pickdate1" style="margin-right: 2%;" required>
                            Ngày kết thúc: <input type="date" name="pickdate2" id="pickdate2" style="margin-right: 2%;" required>
                            <input type="submit" name="loc_dulieu" value="Lọc dữ liệu" onclick="validateDates(event)">
                        </form>

                        <?php
                        if (isset($_POST['loc_dulieu'])) {
                            $start_date = $_POST['pickdate1'];
                            $end_date = $_POST['pickdate2'];

                            // SQL query to fetch data within the specified date range
                            $sql = "SELECT DATE(thoigianlap) AS Ngay, 
                                SUM(tongcong) AS DoanhThuNgay,
                                GROUP_CONCAT(danhsachsp SEPARATOR ', ') AS DaBan
                                FROM don_hang
                                WHERE DATE(thoigianlap) BETWEEN :start_date AND :end_date
                                GROUP BY Ngay";

                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':start_date', $start_date);
                            $stmt->bindParam(':end_date', $end_date);
                            $stmt->execute();

                            echo "<table border='1'>";
                            echo "<tr><th>Ngày</th><th>Doanh thu ngày</th><th>Đã bán</th></tr>";

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['Ngay'] . "</td>";
                                echo "<td>" . $row['DoanhThuNgay'] . "</td>";

                                // Split the 'DaBan' string by comma and calculate the sum of quantities
                                $daBanArray = explode(', ', $row['DaBan']);
                                $productQuantities = [];

                                foreach ($daBanArray as $item) {
                                    // Split the item into quantity and product
                                    list($quantity, $product) = explode(' ', $item, 2);

                                    if (isset($productQuantities[$product])) {
                                        $productQuantities[$product] += (int)$quantity;
                                    } else {
                                        $productQuantities[$product] = (int)$quantity;
                                    }
                                }

                                // Create a new string with summed quantities
                                $daBanSummed = [];
                                foreach ($productQuantities as $product => $quantity) {
                                    $daBanSummed[] = $quantity . ' ' . $product;
                                }

                                echo "<td>" . implode(', ', $daBanSummed) . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }
                        ?>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/doanh_thu.js" defer></script>

    <script>
    document.getElementById("themmoinv").addEventListener("click", function() {
        window.location.href = "them_sp.php";
    });

    document.getElementById("xoabonv").addEventListener("click", function() {
        window.location.href = "xoa_sp.php";
    });
    </script>

    <script>
        function validateDates(event) {
            const startDate = new Date(document.getElementById('pickdate1').value);
            const endDate = new Date(document.getElementById('pickdate2').value);

            if (startDate > endDate) {
                alert("Ngày kết thúc phải đứng sau ngày bắt đầu.");
                event.preventDefault(); // Prevent form submission
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>