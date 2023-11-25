<?php
include '../ket_noi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

// Check if 'date' parameter is provided
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    // Format the date in the 'YYYY-MM-DD' format that matches your database date format
    $formattedDate = date('Y-m-d', strtotime($date));

    // Query the database to retrieve rows for the specific date
    $sql = "SELECT dh.iddon_hang, dh.danhsachsp, dh.ghichu, kh.tenkh, nhanvien.hoten, dh.ten_kh, dh.thoigianlap, dh.tongcong
        FROM don_hang dh
        JOIN khach_hang kh ON dh.idkhach_hang = kh.idkh
        JOIN nhan_vien nhanvien ON dh.idnhan_vien = nhanvien.id
        WHERE DATE(dh.thoigianlap) = :formattedDate
        ORDER BY dh.thoigianlap DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':formattedDate', $formattedDate);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Handle the case where 'date' parameter is not provided or invalid
    // You can redirect the user or display an error message
    echo "Invalid or missing date parameter.";
    exit();
}
?>

<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    // Format the date in the 'YYYY-MM-DD' format that matches your database date format
    $formattedDate = date('Y-m-d', strtotime($date));
} else {
    // Handle the case where 'date' parameter is not provided or invalid
    // You can redirect the user or display an error message
    echo "Invalid or missing date parameter.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giao_dien.css">
    <link rel="stylesheet" href="../assets/css/doanh_thu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script>
        // JavaScript function to redirect to 'doanh_thu_ngay.php' with the date parameter
        function redirectToDetails(date) {
            window.location.href = 'doanh_thu_ngay.php?date=' + date;
        }
    </script>

</head>

<body>

    <a href="../doanh_thu/doanh_thu.php">
        <img src="../assets/img/logo.png" class="logo">
    </a>

    <div class="tren_phai">
        <div class="thanh_dieu_huong" style="padding-left: 5%">
            <a href="../frontend/feindex.php">
                <button class="nut_dieu_huong">
                    <i class="fas fa-home"></i>
                    <p>Trang chủ</p>
                </button>
            </a>
            <button class="nut_dieu_huong">
                <i class="fa-brands fa-tiktok"></i>
                <p>TikTok</p>
            </button>
            <button class="nut_dieu_huong">
                <i class="fa-brands fa-facebook"></i>
                <p>Facebook</p>
            </button>
            <button class="nut_dieu_huong">
                <i>Z</i>
                <p>Zalo</p>
            </button>
            <button class="nut_dieu_huong">
                <i class="fa-regular fa-envelope"></i>
                <p>Email</p>
            </button>
            <audio controls autoplay>
                <source src="../assets/img/audio.mp3" type="audio/mpeg">
            </audio>
            <button class="nut_dieu_huong">
                <i class="fa-solid fa-circle-user"></i>
                Xin chào, <?php echo $_SESSION['username']; ?>
            </button>
        </div>
    </div>

    <div class="duoi">

        <div class="menu">
            <!-------->
            <div class="menu-container">
                <a href="../san_pham/san_pham.php">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-coffee"></i>
                        </span>
                        Sản phẩm
                    </button>
                </a>

                <!-- <a href="../doanh_thu/doanh_thu.php">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                        Thống kê doanh thu
                    </button>
                </a> -->

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        Tài chính
                    </button>
                </a> -->

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

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-tools"></i>
                        </span>
                        Vật tư
                    </button>
                </a> -->

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-business-time"></i>
                        </span>
                        Ca làm
                    </button>
                </a> -->

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

            <!-------->
        </div>

        <div class="noi_dung">

            <!--
            <video controls autoplay width=80% height=100%>
                <source src="video.mp4" type="video/mp4">
            </video>
            -->

            <!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="thong_ke">

                <div class="khung_tren" style="margin-left: 2%">
                    <label class="title">CHI TIẾT DOANH THU NGÀY <?php echo $date; ?></label>
                </div>

                <div class="khung_giua">

                </div>

                <div class="khung_duoi" style="margin-top:5%; margin-left:2%">
                    <table>

                        <thead>
                            <tr style="background-color: #c49967;">
                                <th style="width: 5%">STT</th>
                                <th style="width: 20%">Danh sách sản phẩm</th>
                                <th>Khách hàng đặt đơn</th>
                                <th>Nhân viên bán hàng</th>
                                <th>Họ tên người nhận hàng</th>
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
                            foreach ($result as $items) :
                                $dateTime = explode(' ', $items['thoigianlap']);
                                $date = date('d-m-Y', strtotime($dateTime[0])); // Convert to 'DD-MM-YYYY'
                                $time = $dateTime[1]; // Time part
                            ?>
                                <tr>
                                    <td><?php echo ($rowNumber) ?></td>
                                    <td><?php echo ($items['danhsachsp']) ?></td>
                                    <td><?php echo ($items['tenkh']) ?></td>
                                    <td><?php echo ($items['hoten']) ?></td>
                                    <td><?php echo ($items['ten_kh']) ?></td>
                                    <td>
                                        <?php echo $date; ?><br> <!-- Display date -->
                                        <?php echo $time; ?> <!-- Display time on a new line -->
                                    </td>
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

            <!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="ho_tro">
                <div class="lich" style="padding-left:2%; width:100%">
                    <iframe src="https://calendar.google.com/calendar/embed?src=trancongminh14042001%40gmail.com&ctz=Asia%2FHo_Chi_Minh" style="border: 0" width="100%" height="50%" frameborder="0" scrolling="no"></iframe>
                    <div class="note">

                    </div>
                    <div class="sdt_dia_chi">
                        <p>Số điện thoại: 0354220664</p>
                        <p>Địa chỉ: Số 6, Lô 5, Khu C2, Hải An, Hải Phòng</p>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <script src="../assets/js/doanh_thu.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

<script>
    document.getElementById("themmoinv").addEventListener("click", function() {
        window.location.href = "them_sp.php";
    });

    document.getElementById("xoabonv").addEventListener("click", function() {
        window.location.href = "xoa_sp.php";
    });
</script>

</html>