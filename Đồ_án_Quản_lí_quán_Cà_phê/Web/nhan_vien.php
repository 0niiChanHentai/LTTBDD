<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trang_chu.css">
    <link rel="stylesheet" href="nhan_vien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="nhan_vien.js" defer></script>
</head>

<body>
    <img src="logo.png" class="logo">
    <div class="tren_phai">
        <div class="thanh_dieu_huong">
            <button class="nut1">
                <i class="fas fa-home"></i>
                <p>Trang chủ</p>
            </button>
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
                <source src="audio.mp3" type="audio/mpeg">
            </audio>
            <button class="nut1"><i class="fa-solid fa-circle-user"></i>Xin chào, Trần Công Minh</button>
        </div>
    </div>
    <div class="duoi">
        <div class="menu">
            <button class="nut2"><i class="fa-solid fa-mug-hot"></i>Sản phẩm</button>
            <button class="nut2"><i class="fa-regular fa-paste"></i>Đơn hàng</button>
            <button class="nut2"><i class="fa-solid fa-user"></i>Khách hàng</button>
            <p class="chu_mau_trang"><i class="fa-solid fa-users"></i>Nhân viên</p>
            <button class="nut2"><i class="fa-solid fa-dollar-sign"></i>Tài chính</button>
            <button class="nut2"><i class="fa-solid fa-tags"></i>Khuyến mãi và giảm giá</button>
            <button class="nut2"><i class="fa-solid fa-seedling"></i>Nguyên liệu</button>
            <button class="nut2"><i class="fa-solid fa-couch"></i>Bàn và khu vực chỗ ngồi</button>
            <button class="nut2"><i class="fa-solid fa-cart-shopping"></i>Đặt hàng trực tuyến</button>
            <div class="thanh_ngang"></div>
            <button class="dang_xuat"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</button>
        </div>
        <div class="noi_dung">
            <!--
            <video controls autoplay width=80% height=100%>
                <source src="video.mp4" type="video/mp4">
            </video>
            -->
            <div id="themNhanVienModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Thêm nhân viên</h2>
                    <form id="themNhanVienForm">
                    <label for="ten">Tên:</label>
                    <input type="text" id="ten" name="ten">
                    <label for="ma">Mã:</label>
                    <input type="text" id="ma" name="ma">
                    <!-- Thêm nội dung -->
                    <input type="submit" value="Thêm">
                    </form>
                </div>
            </div>
            <div class="thong_ke">
                <div class="khung_tren">
                    <div class="tim_kiem_them">
                    <form action="search_employee.php" method="GET">
                        <input type="nhap" name="query" placeholder="Nhập tên hoặc mã nhân viên">
                        <button type="submit">Tìm kiếm</button>
                        <div class="khoang_cach"></div>
                        <button type="button">Thêm nhân viên</button>
                    </form>
                    </div>
                </div>
                <div class="khung_duoi">
                    
                </div>
            </div>
            <div class="ho_tro">
                <div class="lich">
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
</body>
</html>