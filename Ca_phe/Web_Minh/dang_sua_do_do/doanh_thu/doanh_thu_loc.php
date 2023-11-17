<?php
include '../ket_noi.php';

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

                            // Truy vấn SQL để tìm nạp dữ liệu trong phạm vi ngày được chỉ định
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

                                // Tách chuỗi 'DaBan' bằng dấu phẩy và tính tổng số lượng
                                $daBanArray = explode(', ', $row['DaBan']);
                                $productQuantities = [];

                                foreach ($daBanArray as $item) {
                                    // Chia mục thành số lượng và sản phẩm
                                    list($quantity, $product) = explode(' ', $item, 2);

                                    if (isset($productQuantities[$product])) {
                                        $productQuantities[$product] += (int)$quantity;
                                    } else {
                                        $productQuantities[$product] = (int)$quantity;
                                    }
                                }

                                // Tạo một chuỗi mới với số lượng tổng hợp
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