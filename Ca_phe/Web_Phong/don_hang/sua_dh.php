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

        $sql = "UPDATE don_hang SET ghichu='$ghichu', tongcong='$tongcong', thoigianlap=CURRENT_TIMESTAMP, danhsachsp='$danhsachsp', idkhach_hang='$idkhach_hang', idnhan_vien='$idnhan_vien', ten_kh='$ten_kh' WHERE iddon_hang='$iddon_hang'";
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

<?php
session_start();

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
    <link rel="stylesheet" href="../assets/css/don_hang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

            <!-- <video controls autoplay width=80% height=100%>
                <source src="video.mp4" type="video/mp4">
            </video> -->

            <!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="thong_ke">

                <div class="khung_tren">
                    <label class="title">SỬA THÔNG TIN ĐƠN HÀNG</label>
                </div>

                <!-- <div class="khung_giua">

                </div> -->

                <div class="khung_duoi" style="margin-top: -2%;">

                    <div id="content" style="margin-left: 5%;">
                        <form method="post" style="display:flex; flex-direction:column;">
                            <label>ID đơn hàng cần sửa thông tin:</label>
                            <?php
                            if (isset($_POST['buttonValue'])) {
                                $buttonValue = $_POST['buttonValue'];
                                echo '<input type="text" name="iddon_hang" value="' . $buttonValue . '" readonly>';
                            } else {
                                echo '<input type="text" name="iddon_hang" value="" readonly>';
                            }
                            ?></br>

                            <!-- <label>Danh sách sản phẩm:</label>
                            <input type="text" name="danhsachsp" required><br> -->

                            <label>Chọn khách hàng:</label>
                            <select name="idkhach_hang" style="height: 22px">
                                <option value="1">Khách vãng lai</option>
                                <?php
                                $sql1 = "SELECT * FROM khach_hang";
                                $result = $conn->query($sql1);

                                if (empty($_POST['submit'])) {
                                    $sql = "SELECT * FROM khach_hang WHERE tenkh <> 'Khách vãng lai' ORDER BY tenkh ASC";
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

                            <label>Tên người nhận hàng (nếu khách hàng không cung cấp tên, ghi '(không)'):</label>
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
                                            <td><input type="number" name="soluong[]" min="0" value="0" style="width: 90%" required onchange="updateText(this), updateText2(this)"><br></td>
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

                            <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px" onclick="validateForm()">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!----------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="ho_tro" style="margin-left: 70%; margin-top: 12.5%">
            <div class="lich" style="width: 100%">
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

    <script src="../assets/js/don_hang.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
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

            outputText1 = outputText1.slice(0, -2); // Remove the trailing comma and space
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

            outputText1 = outputText1.slice(0, -2); // Remove the trailing comma and space
            document.getElementById('danhsachsp').value = outputText1;

            // Update the total cost
            document.getElementById('tongcong').value = total;
        }
    </script>

    <script>
        function validateForm() {
            var iddon_hang = document.getElementsByName('iddon_hang')[0];

            if (iddon_hang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin đơn hàng cần sửa.");
                return false; // Prevent form submission
            }
        }
    </script>

    <script>
        function addQuantity(button) {
            // Find the input elements in the same row
            var row = button.parentNode.parentNode;
            var quantityInput = row.querySelector('input[name="soluong[]"]');
            var additionalInput = row.querySelector('input[name="soluong_them_bot[]"]');

            // Get the current quantity and the additional quantity
            var currentQuantity = parseInt(quantityInput.value);
            var additionalQuantity = parseInt(additionalInput.value);

            // Update the quantity and the additional quantity
            currentQuantity += additionalQuantity;

            // Set the total quantity back to the updated value
            quantityInput.value = currentQuantity;

            // Reset the additional quantity to 0
            additionalInput.value = 0;

            // Update the displayed total
            updateText(quantityInput);
            updateText2(quantityInput);
        }

        function subtractQuantity(button) {
            // Find the input elements in the same row
            var row = button.parentNode.parentNode;
            var quantityInput = row.querySelector('input[name="soluong[]"]');
            var additionalInput = row.querySelector('input[name="soluong_them_bot[]"]');

            // Get the current quantity and the additional quantity
            var currentQuantity = parseInt(quantityInput.value);
            var additionalQuantity = parseInt(additionalInput.value);

            // Update the quantity and the additional quantity
            currentQuantity -= additionalQuantity;

            // Ensure the quantity cannot go below 0
            if (currentQuantity < 0) {
                currentQuantity = 0;
            }

            // Set the total quantity back to the updated value
            quantityInput.value = currentQuantity;

            // Reset the additional quantity to 0
            additionalInput.value = 0;

            // Update the displayed total
            updateText(quantityInput);
            updateText2(quantityInput);
        }
    </script>

</body>

</html>