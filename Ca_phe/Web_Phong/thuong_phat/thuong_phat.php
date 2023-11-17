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
        $sql1 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.phanloai = 'Thưởng' 
            ORDER BY tp.thoigian DESC";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result1 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql1 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.thoigian LIKE '%$search%' AND tp.phanloai = 'Thưởng' 
            ORDER BY tp.thoigian DESC";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result1 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result1[] = $row;
        }
    }

    if (empty($_POST['submit'])) {
        $sql2 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.phanloai = 'Phạt' 
            ORDER BY tp.thoigian DESC";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        $result2 = array();
        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $result2[] = $row;
        }
    } else {
        $search = $_POST['timKiem'];
        $sql2 = "SELECT tp.*, nv.hoten FROM thuong_phat tp
            LEFT JOIN nhan_vien nv ON tp.idnhan_vien = nv.id
            WHERE tp.thoigian LIKE '%$search%' AND tp.phanloai = 'Phạt' 
            ORDER BY tp.thoigian DESC";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        $result2 = array();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $result2[] = $row;
        }
    }
} catch (Exception) {
    echo (' ERROR!');
}


if (isset($_POST["mybutton"])) {
    echo $_POST["mybutton"];
}


if (isset($_POST["postvar"])) {
    echo $_POST["postvar"];
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
    <link rel="stylesheet" href="../assets/css/nhan_vien.css">
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

                    <label class="title" style="font-size: 32px;">DANH SÁCH TÌNH HUỐNG THƯỞNG / PHẠT</label>

                    <div class="tim_kiem_them" style="margin-left: -10%;">
                        <form method="post">
                            <input type="nhap" name="timKiem" placeholder="Nhập tên nhân viên" style="width: 550px; margin-right: 10px;">
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
                        <h2 style="font-size: 24px">Danh sách tình huống thưởng:</h2>
                        <table>
                            <thead>
                                <tr style="background-color: #c49967;">
                                    <th style="width: 5%">STT</th>
                                    <th style="width: 20%">Nhân viên</th>
                                    <th style="width: 20%">Thời gian</th>
                                    <th style="width: 10%">Số tiền (VND)</th>
                                    <th>Nội dung</th>
                                    <th style="width: 5%">Sửa</th>
                                    <th style="width: 5%">Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $rowNumber = 1;
                                foreach ($result1 as $items) :
                                    $dateAndTime = explode(' ', $items['thoigian']); // Assuming 'thoigian' format is 'YYYY-MM-DD HH:MM:SS'
                                    $date = date('d-m-Y', strtotime($dateAndTime[0])); // Convert to 'DD-MM-YYYY'
                                    $time = $dateAndTime[1];
                                ?>
                                    <tr>
                                        <td><?php echo ($rowNumber) ?></td>
                                        <td><?php echo ($items['hoten']) ?></td>
                                        <td>
                                            <?php echo $date; ?><br> <!-- Display date -->
                                            <?php echo $time; ?> <!-- Display time on a new line -->
                                        </td>
                                        <td><?php echo ($items['sotien']) ?></td>
                                        <td><?php echo ($items['noidung']) ?></td>
                                        <td>
                                            <form action="sua_tp.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_tp.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $rowNumber++;
                                endforeach; ?>
                            </tbody>

                        </table>

                        <h2 style="font-size: 24px; margin-top: 5%">Danh sách tình huống phạt:</h2>
                        <table>
                            <thead>
                                <tr style="background-color: #c49967;">
                                    <th style="width: 5%">STT</th>
                                    <th style="width: 20%">Nhân viên</th>
                                    <th style="width: 20%">Thời gian</th>
                                    <th style="width: 10%">Số tiền (VND)</th>
                                    <th>Nội dung</th>
                                    <th style="width: 5%">Sửa</th>
                                    <th style="width: 5%">Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $rowNumber = 1;
                                foreach ($result2 as $items) :
                                    $dateAndTime = explode(' ', $items['thoigian']); // Assuming 'thoigian' format is 'YYYY-MM-DD HH:MM:SS'
                                    $date = date('d-m-Y', strtotime($dateAndTime[0])); // Convert to 'DD-MM-YYYY'
                                    $time = $dateAndTime[1];
                                ?>
                                    <tr>
                                        <td><?php echo ($rowNumber) ?></td>
                                        <td><?php echo ($items['hoten']) ?></td>
                                        <td>
                                            <?php echo $date; ?><br> <!-- Display date -->
                                            <?php echo $time; ?> <!-- Display time on a new line -->
                                        </td>
                                        <td><?php echo ($items['sotien']) ?></td>
                                        <td><?php echo ($items['noidung']) ?></td>
                                        <td>
                                            <form action="sua_tp.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_tp.php" method="post">
                                                <button type="submit" value="<?php echo ($items['idtinh_huong']) ?>" name="buttonValue">X</button>
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
            </div>
            <!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="ho_tro">
                <div class="lich" style="margin-top: -19%; width:100%">
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

    <script src="../assets/js/nhan_vien.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

</body>


<script>
    document.getElementById("themmoinv").addEventListener("click", function() {
        window.location.href = "them_tp.php";
    });

    document.getElementById("xoabonv").addEventListener("click", function() {
        window.location.href = "xoa_nv.php";
    });

    window.onload = function() {
        document.getElementsByName("mybutton").onclick = function() {
            document.getElementsByName("postvar")[0].value = this.value;
            document.forms.myform.submit();
        }
    };
</script>

</html>