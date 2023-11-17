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

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giao_dien.css">
    <link rel="stylesheet" href="../assets/css/doanh_thu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<!----------------------------------------------------------------------------------------------------------------------------------------->
        <a href="../doanh_thu/doanh_thu.php">
            <img src="../assets/img/logo.png" class="logo">
        </a>
<!---->
        <div class="tren_phai">
            <div class="thanh_dieu_huong" style="padding-left: 5%">
                <a href="../frontend/feindex.php">
                    <button class="nut1">
                        <i class="fas fa-home"></i>
                        <p>Trang chủ</p>
                    </button>
                </a>
                <button class="nut1">
                    <i class="fa-brands fa-tiktok"></i>
                    <p>TikTok</p>
                </button>
                <button class="nut1">
                    <i class="fa-brands fa-facebook"></i>
                    <p>Facebook</p>
                </button>
                <button class="nut1">
                    <i>Z</i>
                    <p>Zalo</p>
                </button>
                <button class="nut1">
                    <i class="fa-regular fa-envelope"></i>
                    <p>Email</p>
                </button>
                <audio controls autoplay>
                    <source src="../assets/img/audio.mp3" type="audio/mpeg">
                </audio>
                <button class="nut1">
                    <i class="fa-solid fa-circle-user"></i>
                    Xin chào, <?php echo $_SESSION['username']; ?>
                </button>
            </div>
        </div>
<!---->
        <div class="duoi">
<!--------->
            <div class="menu">
<!------------->
                <div class="menu-container">
                    <a href="../san_pham/san_pham.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-coffee"></i>
                            </span>
                            Sản phẩm
                        </button>
                    </a>

                    <a href="../khach_hang/khach_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-users"></i>
                            </span>
                            Khách hàng
                        </button>
                    </a>

                    <a href="../don_hang/don_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            Đơn hàng
                        </button>
                    </a>

                    <a href="../nguyen_lieu/nguyen_lieu.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-seedling"></i>
                            </span>
                            Nguyên liệu
                        </button>
                    </a>

                    <a href="../nhap_hang/nhap_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fa-solid fa-warehouse"></i>
                            </span>
                            Nhập nguyên liệu
                        </button>
                    </a>

                    <a href="../xuat_hang/xuat_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fa-solid fa-box"></i>
                            </span>
                            Xuất nguyên liệu
                        </button>
                    </a>

                    <a href="../nhan_vien/nhan_vien.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-user-tie"></i>
                            </span>
                            Nhân viên
                        </button>
                    </a>

                    <a href="../thuong_phat/thuong_phat.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-trophy"></i>
                            </span>
                            Thưởng / phạt
                        </button>
                    </a>

                    <a href="../quan_ly_tk/tai_khoan.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-user"></i>
                            </span>
                            Quản lý các tài khoản
                        </button>
                    </a>
                </div>

                <div class="thanh_ngang"></div>
                <a href="../dang_nhap/dang_xuat.php?username=<?php echo urlencode($_SESSION['username']); ?>">
                    <button class="nut_menu">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất
                    </button>
                </a>
            </div>
<!--------->
            <div class="noi_dung">
<!------------->
                <div class="thong_ke">
<!----------------->
                    <div class="khung_tren" style="margin-left: 2%">
                        <label class="title">LỌC DOANH THU THEO THỜI GIAN</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <style>
                            .khung_duoi {
                                margin-left: 2%;
                                margin-top: 7%;
                            }
                            table {
                                border-collapse: collapse;
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 8px;
                            }
                        </style>

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
                            echo "<tr><th>Ngày</th><th>Doanh thu ngày</th><th>Đã Bán</th></tr>";

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

                                echo "<tr><td>$date</td><td>$total VND</td><td>" . implode(', ', $productsSold) . "</td></tr>";

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

                            // Reset total products sold and total7DaysSum
                            $totalProductsSold = [];
                            $total7DaysSum = 0;

                            // Display the results for 30 days in a similar manner
                            echo "<div class='table-container'>";
                            echo "<table>";
                            echo "<h2>Thống kê doanh thu 30 ngày gần nhất:</h2>";
                            echo "<tr><th>Ngày</th><th>Doanh thu ngày</th><th>Đã Bán</th></tr>";

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

                                echo "<tr><td>$date</td><td>$total VND</td><td>" . implode(', ', $productsSold) . "</td></tr>";

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
                    </div>
<!----------------->
                </div>
<!------------->
                <div class="ho_tro">
<!----------------->
                    <div class="lich" style="width: 100%">
                        <h2 id="currentWeekday"></h2>
                        <h2 id="currentTime"></h2>
                        <h2><span id="currentWeather"></span></h2>
                        <h2><span id="currentTemperature"></span></h2>
                        <button onclick="prevMonth()">Tháng trước</button>
                        <button onclick="nextMonth()">Tháng sau</button>
                        <h2 id="monthYear"></h2>
                        <table id="calendar">
                            <tr>
                                <th>Chủ Nhật</th>
                                <th>Thứ Hai</th>
                                <th>Thứ Ba</th>
                                <th>Thứ Tư</th>
                                <th>Thứ Năm</th>
                                <th>Thứ Sáu</th>
                                <th>Thứ Bảy</th>
                            </tr>
                        </table>
                        <div class="modal" id="eventModal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">×</span>
                                <h2>Add/Edit Event</h2>
                                <input id="eventInput" placeholder="Chi tiết sự kiện" type="text" />
                                <input id="locationInput" placeholder="Địa điểm sự kiện" type="text" />
                                <div id="map"></div>
                                <button onclick="saveEvent()">Save</button>
                            </div>
                        </div>
                    </div>
<!----------------->
                </div>
<!------------->
            </div>
<!--------->
        </div>
<!---->
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/doanh_thu.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer="" src="../assets/js/trang_chu.js"></script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_sp.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_sp.php";
        });
    </script>

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
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>