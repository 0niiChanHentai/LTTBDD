<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

// Check for 'quyen1' permission
$query = "SELECT phanquyen FROM tai_khoan WHERE ten_tk = '{$_SESSION['username']}'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $phanquyen = $row['phanquyen'];

    if ($phanquyen !== '1') {
        header("Location: ../reject.php");
        exit();
    }
}
?>

<?php
include '../ket_noi.php';

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM xuat_hang ORDER BY thoigianxuat DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM xuat_hang WHERE thoigianxuat LIKE '%$search%' ORDER BY thoigianxuat DESC";
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

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giao_dien.css">
    <link rel="stylesheet" href="../assets/css/xuat_hang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
</head>

<body>

    <a href="../doanh_thu/doanh_thu.php">
        <img src="../assets/img/logo.png" class="logo">
    </a>

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

                <div class="khung_tren">

                    <label class="title">DANH SÁCH ĐƠN XUẤT NGUYÊN LIỆU</label>

                    <div class="tim_kiem_them" style="margin-left: -10%;">
                        <form method="post">
                            <input type="nhap" name="timKiem" placeholder="Nhập mốc thời gian" style="width: 550px; margin-right: 10px;">
                            <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            <div class="khoang_cach">

                                <button type="button" name="submit" id="themmoinv" style="margin-left: 5%; width: 78px; color: #FFFACD; padding-left: 50%;">Thêm</button>

                        </form>
                    </div>

                </div>

                <div class="khung_giua">
                    <button id="xuatExcel">Xuất Excel</button>
                    <button id="nhapExcel">Nhập Excel</button>
                    <input type="file" id="chonFileExcel" style="display:none;">
                </div>

                <div class="khung_duoi">
                    <div id="content" style="margin-left: 5%;">

                        <table>

                            <thead>
                                <tr style="background-color: #c49967;">
                                    <th style="width: 5%">STT</th>
                                    <th>Danh sách nguyên liệu xuất kho</th>
                                    <th style="width: 15%">Thời gian</th>
                                    <th style="width: 15%">Ghi chú</th>
                                    <th style="width: 5%">Sửa</th>
                                    <th style="width: 5%">Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $rowNumber = 1;
                                foreach ($result as $items) :
                                    $dateAndTime = explode(' ', $items['thoigianxuat']); // Assuming 'thoigianxuat' format is 'YYYY-MM-DD HH:MM:SS'
                                    $date = date('d-m-Y', strtotime($dateAndTime[0])); // Convert to 'DD-MM-YYYY'
                                    $time = $dateAndTime[1];
                                ?>
                                    <tr>
                                        <td><?php echo ($rowNumber) ?></td>
                                        <td><?php echo ($items['danhsachsp']) ?></td>
                                        <td>
                                            <?php echo $date; ?><br> <!-- Display date -->
                                            <?php echo $time; ?> <!-- Display time on a new line -->
                                        </td>
                                        <td><?php echo ($items['ghichu']) ?></td>
                                        <td>
                                            <form action="sua_xh.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idxuat_hang']) ?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_xh.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idxuat_hang']) ?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $rowNumber++;
                                endforeach; ?>
                            </tbody>

                        </table><br>

                        <?php
                        // Include your connection code

                        // Initialize an array to store 'soluongnhap' and 'soluongxuat' for each product
                        $productQuantities = [];

                        // Retrieve data from 'nhap_hang' and calculate 'soluongnhap'
                        $nhapQuery = "SELECT danhsachsp FROM nhap_hang";
                        $nhapResult = $conn->query($nhapQuery);

                        while ($row = $nhapResult->fetch(PDO::FETCH_ASSOC)) {
                            $items = explode(', ', $row['danhsachsp']);
                            foreach ($items as $item) {
                                list($quantity, $productName) = explode(' ', $item, 2);
                                $quantity = (float)$quantity;

                                // Initialize 'soluongxuat' to zero for each product
                                if (!isset($productQuantities[$productName]['soluongxuat'])) {
                                    $productQuantities[$productName]['soluongxuat'] = 0;
                                }

                                if (!isset($productQuantities[$productName]['soluongnhap'])) {
                                    $productQuantities[$productName]['soluongnhap'] = 0;
                                }

                                $productQuantities[$productName]['soluongnhap'] += $quantity;
                            }
                        }

                        // Retrieve data from 'xuat_hang' and calculate 'soluongxuat'
                        $xuatQuery = "SELECT danhsachsp FROM xuat_hang";
                        $xuatResult = $conn->query($xuatQuery);

                        while ($row = $xuatResult->fetch(PDO::FETCH_ASSOC)) {
                            $items = explode(', ', $row['danhsachsp']);
                            foreach ($items as $item) {
                                list($quantity, $productName) = explode(' ', $item, 2);
                                $quantity = (float)$quantity;

                                // Initialize 'soluongnhap' to zero for each product
                                if (!isset($productQuantities[$productName]['soluongnhap'])) {
                                    $productQuantities[$productName]['soluongnhap'] = 0;
                                }

                                if (!isset($productQuantities[$productName]['soluongxuat'])) {
                                    $productQuantities[$productName]['soluongxuat'] = 0;
                                }

                                $productQuantities[$productName]['soluongxuat'] += $quantity;
                            }
                        }

                        // Iterate through the products and display data
                        foreach ($productQuantities as $productName => $quantities) {
                            $tonkho = $quantities['soluongnhap'] - $quantities['soluongxuat'];

                            // Retrieve the 'donvi' value from the database based on the product name
                            $donviQuery = "SELECT donvi FROM nguyen_lieu WHERE tenhang = :productName";
                            $donviStmt = $conn->prepare($donviQuery);
                            $donviStmt->bindParam(':productName', $productName);
                            $donviStmt->execute();
                            $donviResult = $donviStmt->fetch(PDO::FETCH_ASSOC);
                            $donvi = $donviResult['donvi'];

                            if ($tonkho < 0) {
                                echo '<script>alert("Số lượng tồn kho dưới 0 đơn vị, vui lòng kiểm tra lại bảng Nhập kho - Xuất kho.");</script>';
                            }
                        }

                        echo '</table>';

                        // Close the database connection
                        $conn = null;
                        ?>


                    </div>
                </div>
            </div>
            <!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="ho_tro">
                <div class="lich" style="margin-top: -19%; width: 100%;">
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

    <script src="../assets/js/xuat_hang.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        function validateForm2() {
            var rows = document.querySelectorAll('tbody tr');
            var danhSach = document.getElementsByName('danhsachsp')[0];
            var tonkhoError = false;

            rows.forEach(function(row) {
                var soluongInput = row.querySelector('input[name="soluong[]"]');
                var tensp = row.querySelector('td:nth-child(2)').textContent;
                var giathanh = parseFloat(row.querySelector('td:nth-child(3)').textContent);

                if (soluongInput.value > 0) {
                    var soluong = parseInt(soluongInput.value);
                    var rowTotal = giathanh * soluong;

                    // Check if 'soluong' will result in a negative 'tonkho'
                    if (soluong > rowTotal) {
                        tonkhoError = true;
                        alert("Tồn kho < 0, vui lòng nhập lại cho sản phẩm: " + tensp);
                        return false; // Prevent form submission
                    }
                }
            });

            if (tonkhoError) {
                return false; // Prevent form submission
            }

            if (danhSach.value === "") {
                alert("Thông tin không hợp lệ.");
                return false; // Prevent form submission
            }
        }
    </script>


</body>


<script>
    document.getElementById("themmoinv").addEventListener("click", function() {
        window.location.href = "them_xh.php";
    });

    document.getElementById("xoabonv").addEventListener("click", function() {
        window.location.href = "xoa_xh.php";
    });
</script>

</html>