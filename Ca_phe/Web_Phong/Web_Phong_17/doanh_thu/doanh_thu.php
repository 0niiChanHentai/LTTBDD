<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM san_pham WHERE tensp LIKE '%$search%' ORDER BY tensp ASC";
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
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
                <div class="khung_tren" style="margin-left: 2%">
                    <label class="title">HIỂN THỊ DOANH THU GẦN ĐÂY</label>
                    <a href="doanh_thu_loc.php">
                        <button class="nut2" style="width: auto; padding-left:2%; padding-right:2%; border-radius: 4px"></i>Lọc doanh thu theo ngày</button>
                    </a>
                </div>

                <!-- <div class="khung_giua" style="margin-top:5%">

                </div> -->

                <div class="khung_duoi" style="margin-left: 2%; margin-top: 7%">
                    <!DOCTYPE html>
                    <html>

                    <head>

                        <style>
                            table {
                                border-collapse: collapse;
                            }

                            th,
                            td {
                                border: 1px solid black;
                                padding: 8px;
                            }
                        </style>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

                    </head>

                    <body>
                        <?php
                        // Include the connection file
                        include '../ket_noi.php';

                        // Function to generate a list of dates for the past n days
                        function generateDateList($n)
                        {
                            $dates = [];
                            for ($i = 0; $i < $n; $i++) {
                                $date = date('Y-m-d', strtotime("-$i days"));
                                $dates[] = $date;
                            }
                            return $dates;
                        }

                        // Generate lists of dates for the past 7 and 30 days
                        $recent7Days = generateDateList(7);
                        $recent30Days = generateDateList(30);

                        // SQL query to get the total 'tongcong' for the 7 most recent days
                        $query7Days = "SELECT DATE(thoigianlap) AS order_date, SUM(tongcong) AS total_tongcong
                            FROM don_hang
                            WHERE DATE(thoigianlap) IN ('" . implode("', '", $recent7Days) . "')
                            GROUP BY DATE(thoigianlap)";

                        // SQL query to get the total 'tongcong' for the 30 most recent days
                        $query30Days = "SELECT DATE(thoigianlap) AS order_date, SUM(tongcong) AS total_tongcong
                            FROM don_hang
                            WHERE DATE(thoigianlap) IN ('" . implode("', '", $recent30Days) . "')
                            GROUP BY DATE(thoigianlap)";

                        try {
                            // Prepare and execute the SQL queries for the 7 and 30 days
                            $stmt7Days = $conn->prepare($query7Days);
                            $stmt7Days->execute();

                            $stmt30Days = $conn->prepare($query30Days);
                            $stmt30Days->execute();

                            // Display the results in tables
                            echo "<div class='table-container'>";
                            echo "<table>";
                            echo "<h2>Thống kê doanh thu 7 ngày gần nhất:</h2>";
                            echo "<tr><th>Ngày</th><th>Doanh thu ngày</th><th>Đã Bán</th><th>Hành động</th></tr>";

                            // Create an associative array with date as the key and total_tongcong as the value
                            $total7Days = [];
                            while ($row = $stmt7Days->fetch(PDO::FETCH_ASSOC)) {
                                $total7Days[$row['order_date']] = $row['total_tongcong'];
                            }

                            foreach ($recent7Days as $date) {
                                $total = isset($total7Days[$date]) ? $total7Days[$date] : 0;
                            
                                // Get the list of products sold on the current date
                                $queryProducts = "SELECT danhsachsp FROM don_hang WHERE DATE(thoigianlap) = :date";
                                $stmtProducts = $conn->prepare($queryProducts);
                                $stmtProducts->bindParam(':date', $date);
                                $stmtProducts->execute();
                            
                                // Initialize an associative array to store product counts
                                $productCounts = [];
                            
                                while ($row = $stmtProducts->fetch(PDO::FETCH_ASSOC)) {
                                    $products = explode(', ', $row['danhsachsp']);
                                    foreach ($products as $product) {
                                        list($quantity, $productName) = explode(' ', $product, 2);
                                        if (!isset($productCounts[$productName])) {
                                            $productCounts[$productName] = 0;
                                        }
                                        $productCounts[$productName] += (int)$quantity;
                                    }
                                }
                            
                                // Display the products sold
                                $productsSold = [];
                                foreach ($productCounts as $productName => $quantity) {
                                    $productsSold[] = "$quantity $productName";
                                }
                            
                                // Add a button with a link to 'doanh_thu_ngay.php' and pass the date as a parameter
                                $formattedDate = date('d-m-Y', strtotime($date));
                                echo "<tr><td style='width: 15%;'>$formattedDate</td><td style='width: 25%;'>$total VND</td><td>" . implode(', ', $productsSold) . "</td><td style='width: 15%;'><a href='doanh_thu_ngay.php?date=$date'><button onclick='redirectToDetails(\"$date\")'>Xem chi tiết</button></a></td></tr>";
                                
                                // Update the total products sold
                                foreach ($productCounts as $productName => $quantity) {
                                    if (!isset($totalProductsSold[$productName])) {
                                        $totalProductsSold[$productName] = 0;
                                    }
                                    $totalProductsSold[$productName] += $quantity;
                                }
                            }
                            

                            echo "</table><br>";
                            echo "<h2>Tổng sản phẩm đã bán (7 ngày gần nhất):</h2>";
                            echo "<table>";
                            echo "<tr><th>Sản phẩm</th><th>Đã Bán</th></tr>";

                            // Initialize the $totalProductsSold array
                            $totalProductsSold = [];

                            foreach ($recent7Days as $date) {
                                // Get the list of products sold on the current date
                                $queryProducts = "SELECT danhsachsp FROM don_hang WHERE DATE(thoigianlap) = :date";
                                $stmtProducts = $conn->prepare($queryProducts);
                                $stmtProducts->bindParam(':date', $date);
                                $stmtProducts->execute();

                                // Initialize an associative array to store product counts for each date
                                $productCounts = [];

                                while ($row = $stmtProducts->fetch(PDO::FETCH_ASSOC)) {
                                    $products = explode(', ', $row['danhsachsp']);
                                    foreach ($products as $product) {
                                        list($quantity, $productName) = explode(' ', $product, 2);
                                        if (!isset($productCounts[$productName])) {
                                            $productCounts[$productName] = 0;
                                        }
                                        $productCounts[$productName] += (int)$quantity;
                                    }
                                }

                                // Update the total products sold for each product
                                foreach ($productCounts as $productName => $quantity) {
                                    if (!isset($totalProductsSold[$productName])) {
                                        $totalProductsSold[$productName] = 0;
                                    }
                                    $totalProductsSold[$productName] += $quantity;
                                }
                            }

                            foreach ($totalProductsSold as $productName => $quantity) {
                                echo "<tr><td>$productName</td><td>$quantity</td></tr>";
                            }

                            // Calculate the total 'Total Tongcong' for 7 days
                            $total7DaysSum = array_sum($total7Days);
                            echo "<tr><th>Tổng thu</th><td>$total7DaysSum VND</td></tr>";

                            echo "</table><br>";


                            // Reset total products sold and total7DaysSum
                            // ... (previous code)

                            // Reset total products sold and total7DaysSum
                            $totalProductsSold = [];
                            $total7DaysSum = 0;
                            echo "</div>"; // Close the table-container

                            // Display the results for 30 days in a similar manner
                            echo "<div class='table-container'>";
                            echo "<table>";
                            echo "<h2>Thống kê doanh thu 30 ngày gần nhất:</h2>";
                            echo "<tr><th>Ngày</th><th>Doanh thu ngày</th><th>Đã Bán</th><th>Hành động</th></tr>";

                            // Create an associative array with date as the key and total_tongcong as the value
                            $total30Days = [];
                            while ($row = $stmt30Days->fetch(PDO::FETCH_ASSOC)) {
                                $total30Days[$row['order_date']] = $row['total_tongcong'];
                            }

                            foreach ($recent30Days as $date) {
                                $total = isset($total30Days[$date]) ? $total30Days[$date] : 0;

                                // Get the list of products sold on the current date
                                $queryProducts = "SELECT danhsachsp FROM don_hang WHERE DATE(thoigianlap) = :date";
                                $stmtProducts = $conn->prepare($queryProducts);
                                $stmtProducts->bindParam(':date', $date);
                                $stmtProducts->execute();

                                // Initialize an associative array to store product counts
                                $productCounts = [];

                                while ($row = $stmtProducts->fetch(PDO::FETCH_ASSOC)) {
                                    $products = explode(', ', $row['danhsachsp']);
                                    foreach ($products as $product) {
                                        list($quantity, $productName) = explode(' ', $product, 2);
                                        if (!isset($productCounts[$productName])) {
                                            $productCounts[$productName] = 0;
                                        }
                                        $productCounts[$productName] += (int)$quantity;
                                    }
                                }

                                // Display the products sold
                                $productsSold = [];
                                foreach ($productCounts as $productName => $quantity) {
                                    $productsSold[] = "$quantity $productName";
                                }
                                $formattedDate = date('d-m-Y', strtotime($date));
                                echo "<tr><td style='width: 15%;'>$formattedDate</td><td style='width: 25%;'>$total VND</td><td>" . implode(', ', $productsSold) . "</td><td style='width: 15%;'><a href='doanh_thu_ngay.php?date=$date'><button onclick='redirectToDetails(\"$date\")'>Xem chi tiết</button></a></td></tr>";

                                // Update the total products sold
                                foreach ($productCounts as $productName => $quantity) {
                                    if (!isset($totalProductsSold[$productName])) {
                                        $totalProductsSold[$productName] = 0;
                                    }
                                    $totalProductsSold[$productName] += $quantity;
                                }

                                // Update the total 'Total Tongcong' for 30 days
                                $total30DaysSum = array_sum($total30Days);
                            }

                            echo "</table><br>";
                            // Display the total products sold for 30 days
                            echo "<h2>Tổng sản phẩm đã bán (30 ngày gần nhất):</h2>";
                            echo "<table>";
                            echo "<tr><th>Sản phẩm</th><th>Đã Bán</th></tr>";

                            foreach ($totalProductsSold as $productName => $quantity) {
                                echo "<tr><td>$productName</td><td>$quantity</td></tr>";
                            }

                            // Calculate the total 'Total Tongcong' for 30 days
                            $total30DaysSum = array_sum($total30Days);
                            echo "<tr><th>Tổng thu (30 ngày):</th><td>$total30DaysSum VND</td></tr>";

                            echo "</table><br>";

                            echo "</div>"; // Close the table-container
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }

                        // Close the database connection
                        $conn = null;
                        ?>

                        <script>
                            // Function to create a bar chart
                            function createBarChart(labels, data, chartTitle, chartContainerId) {
                                var ctx = document.getElementById(chartContainerId).getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: chartTitle,
                                            data: data,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar color
                                            borderColor: 'rgba(75, 192, 192, 1)', // Border color
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            }

                            // Function to create a line chart
                            function createLineChart(labels, data, chartTitle, chartContainerId) {
                                var ctx = document.getElementById(chartContainerId).getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: chartTitle,
                                            data: data,
                                            borderColor: 'rgba(75, 192, 192, 1)', // Line color
                                            borderWidth: 2,
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            }

                            // Data for your bar chart (7 days)
                            var barChartLabels7Days = <?php echo json_encode($recent7Days); ?>;
                            var barChartData7Days = <?php echo json_encode(array_values($total7Days)); ?>;
                            createBarChart(barChartLabels7Days, barChartData7Days, 'Doanh thu ngày', 'barChart7Days');

                            // Data for your line chart (30 days)
                            var lineChartLabels30Days = <?php echo json_encode($recent30Days); ?>;
                            var lineChartData30Days = <?php echo json_encode(array_values($total30Days)); ?>;
                            createLineChart(lineChartLabels30Days, lineChartData30Days, 'Doanh thu ngày', 'lineChart30Days');
                        </script>

                    </body>

                    </html>
                </div>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi_thong_ke.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>