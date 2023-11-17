<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT dh.iddon_hang, dh.danhsachsp, dh.ghichu, kh.tenkh, nhanvien.hoten, dh.ten_kh, dh.thoigianlap, dh.tongcong
        FROM don_hang dh
        JOIN khach_hang kh ON dh.idkhach_hang = kh.idkh
        JOIN nhan_vien nhanvien ON dh.idnhan_vien = nhanvien.id
        ORDER BY dh.thoigianlap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT dh.iddon_hang, dh.danhsachsp, dh.ghichu, kh.tenkh, nhanvien.hoten, dh.ten_kh, dh.thoigianlap, dh.tongcong
            FROM don_hang dh
            JOIN khach_hang kh ON dh.idkhach_hang = kh.idkh
            JOIN nhan_vien nhanvien ON dh.idnhan_vien = nhanvien.id
            WHERE dh.thoigianlap LIKE :search
            ORDER BY dh.thoigianlap DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR); // Bind the search value with wildcards
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
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
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
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH ĐƠN HÀNG</label>

                        <div class="tim_kiem_them" style="margin-left: -10%;">
                            <form method="post">
                                <input type="nhap" name="timKiem" placeholder="Nhập mốc thời gian" style="width: 550px; margin-right: 10px;">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                                <div class="khoang_cach">
                                    <button type="button" name="submit" id="themmoinv" style="margin-left: 5%; width: 80px; color: #FFFACD; padding-left: 50%;">Thêm</button>
                            </form>
                        </div>

                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button id="xuatExcel">Xuất Excel</button>
                        <button id="nhapExcel">Nhập Excel</button>
                        <input type="file" id="chonFileExcel" style="display:none;">
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content" style="margin-left: 5%;">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 20%">Danh sách sản phẩm</th>
                                        <th style="width: 12%">Khách hàng đặt đơn</th>
                                        <th style="width: 12%">Nhân viên bán hàng</th>
                                        <th style="width: 11%">Họ tên người nhận hàng</th>
                                        <th style="width: 15%">Thời gian</th>
                                        <th style="width: 10%">Thành tiền (VND)</th>
                                        <th style="width: 10%">Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;
                                    foreach ($result as $items) : ?>
                                        <tr>
                                            <td><?php echo ($rowNumber) ?></td>
                                            <td><?php echo ($items['danhsachsp']) ?></td>
                                            <td><?php echo ($items['tenkh']) ?></td>
                                            <td><?php echo ($items['hoten']) ?></td>
                                            <td><?php echo ($items['ten_kh']) ?></td>
                                            <td><?php echo ($items['thoigianlap']) ?></td>
                                            <td><?php echo ($items['tongcong']) ?></td>
                                            <td><?php echo ($items['ghichu']) ?></td>
                                            <td>
                                                <form action="sua_dh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['iddon_hang']) ?>" name="buttonValue">S</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="xoa_dh.php" method="post">
                                                    <button type="submit" value="<?php echo ($items['iddon_hang']) ?>" name="buttonValue">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $rowNumber++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
            window.location.href = "them_dh.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_dh.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>