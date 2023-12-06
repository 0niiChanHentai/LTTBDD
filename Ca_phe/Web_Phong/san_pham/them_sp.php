<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

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

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        if (isset($_FILES['hinhanh'])) {
            $targetDirectory = '../frontend/picture/';
            $fileName = basename($_FILES['hinhanh']['name']);
            $targetFilePath = $targetDirectory . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Check file image
            $check = getimagesize($_FILES['hinhanh']['tmp_name']);
            if ($check !== false) {
                // Upload file
                if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $targetFilePath)) {
                    $hinhanh = $fileName;
                } else {
                    echo '<script>alert("Lỗi khi tải ảnh lên!");</script>';
                }
            } else {
                echo '<script>alert("File không phải là hình ảnh!");</script>';
            }
        }
    }

    if (!empty($_POST['submit'])) {
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $giathanh = $_POST['giathanhsp'];
        $thanhphan = $_POST['thanhphansp'];
        $hinhanh = $_POST['hinhanh'];
        $mota = $_POST['mota'];
        $phanloai = $_POST['phanloai'];
        $id_cha = $_POST['id_cha'];
        $id_danhmuc = $_POST['id_danhmuc'];
        $ghichu = $_POST['ghichusp'];
        $phanloai_danhmuc = $_POST['phanloai_danhmuc'];

        switch ($phanloai_danhmuc) {
            case 'DoUong':
                $id_danhmuc = '1';
                $id_cha = '0';
                $phanloai = 'Đồ uống';
                break;
            case 'DoAn':
                $id_danhmuc = '2';
                $id_cha = '0';
                $phanloai = 'Đồ ăn';
                break;
            case 'Cafe':
                $id_danhmuc = '5';
                $id_cha = '1';
                $phanloai = 'Cafe';
                break;
            case 'SinhTo':
                $id_danhmuc = '6';
                $id_cha = '1';
                $phanloai = 'Sinh tố';
                break;
            case 'CacLoaiNuocKhac':
                $id_danhmuc = '7';
                $id_cha = '1';
                $phanloai = 'Các loại nước khác';
                break;
            case 'BanhNgot':
                $id_danhmuc = '8';
                $id_cha = '2';
                $phanloai = 'Bánh ngọt';
                break;
            case 'DoAnKhac':
                $id_danhmuc = '9';
                $id_cha = '2';
                $phanloai = 'Đồ ăn khác';
                break;
        }

        $sql = "INSERT INTO san_pham (tensp, giathanh, thanhphan, hinhanh, mota, phanloai, id_cha, id_danhmuc, ghichu) VALUES ('$tensp', '$giathanh', '$thanhphan', '$hinhanh', '$mota', '$phanloai', '$id_cha', '$id_danhmuc', '$ghichu')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: san_pham.php');
    }
} catch (Exception) {
    echo '<script>alert("Xảy ra lỗi!");</script>';
    echo "<script>window.location = 'san_pham.php';</script>";
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
    <label class="title">THÊM MỚI SẢN PHẨM</label>
</div>
<!----------------->
<div class="khung_duoi">
    <div id="content">
        <form method="post" enctype="multipart/form-data" style="display:flex; flex-direction:column;">

            <label class="chu">Tên sản phẩm:</label>
            <input type="text" name="tensp" required><br>

            <label class="chu">Giá:</label>
            <input type="text" name="giathanhsp" required><br>

            <label class="chu">Thành phần:</label>
            <input type="text" name="thanhphansp" required><br>

            <label class="chu">Hình ảnh:</label>
            <div class="file-upload">
                <input type="file" id="imageInput" name="hinhanh" style="display: none;" onchange="updateImageName()">
                <button type="button" onclick="document.getElementById('imageInput').click()" style="margin-right: 1%">Chọn ảnh</button>
                <input type="text" id="imageName" name="hinhanh_name" readonly>
            </div>


            <label class="chu">Mô tả:</label>
            <input type="text" name="mota" required><br>

            <label class="chu">Phân loại:</label>
            <select name="phanloai_danhmuc" style="height: 24px" required>
                <option value="DoUong">Đồ uống</option>
                <option value="DoAn">Đồ ăn</option>
                <option value="Cafe">Cafe</option>
                <option value="SinhTo">Sinh tố</option>
                <option value="CacLoaiNuocKhac">Các loại nước khác</option>
                <option value="BanhNgot">Bánh ngọt</option>
                <option value="DoAnKhac">Đồ ăn khác</option>
            </select><br>

            <label class="chu">Ghi chú:</label>
            <input type="text" name="ghichusp" value="(không)" required><br>
            <input type="submit" value="Thêm" name="submit" id="themmoi" style="width: 120px; height: 40px">
        </form>
    </div>
</div>

<script>
    function updateImageName() {
        var input = document.getElementById('imageInput');
        var output = document.getElementById('imageName');
        output.value = input.files[0].name;
    }
</script>

<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<script src="../assets/js/san_pham.js" defer></script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>

</html>