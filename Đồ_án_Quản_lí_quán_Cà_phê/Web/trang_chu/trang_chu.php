<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trang_chu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
    <a href="trang_chu.php"><img src="logo.png" class="logo"></a>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="tren">
        <div class="can_chinh_tren">

            <button class="nut_tren">
                <a href="dang_nhap.php"><i class="fa-solid fa-shop"></i></a>
            </button>
            
            <audio controls autoplay>
                <source src="audio.mp3" type="audio/mpeg">
            </audio>

            <!--
            <button class="nut_tren">
                <i class="fa-solid fa-circle-user"></i>
                Xin chào, Trần Công Minh
            </button>
            -->
            
            <button class="userMenu">
                <i class="fa-solid fa-circle-user"></i>
                    Xin chào, Trần Công Minh
                <div class="userDropdown">
                    <a href="#">Đổi mật khẩu</a>
                    <a href="#">Quản lý phân quyền</a>
                    <a href="#">Trợ giúp</a>
                    <a href="dang_nhap.php">Đăng xuất</a>
                </div>
            </button>

        </div>
    </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="duoi">
<!---->
        <div class="menu">
<!-------->
            <button class="nut_menu">
                <span class="icon-wrapper">
                    <i class="fa-solid fa-mug-hot"></i>
                </span>
                Sản phẩm
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-regular fa-paste"></i>
                </span>
                Đơn hàng
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-user"></i>
                </span>
                Khách hàng
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-users"></i>
                </span>
                Nhân viên
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-dollar-sign"></i>
                </span>
                Tài chính
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-tags"></i>
                </span>
                Khuyến mãi và giảm giá
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-seedling"></i>
                </span>
                Nguyên liệu
            </button>
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-couch"></i>
                </span>
                Kho
            </button>
            <!--
            <button class="nut_menu">
                <span class="icon-wrapper">
                <i class="fa-solid fa-cart-shopping"></i>
                </span>
                Đặt hàng trực tuyến
            </button>
            -->
<!-------->
            <div class="thanh_ngang"></div>
<!-------->
            <a href="dang_nhap.php">
                <button class="dang_xuat">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Đăng xuất
                </button>
            </a>
<!-------->
        </div>
<!---->
        <div class="noi_dung">
<!-------->
            <div class="thong_ke">
                <!--
                <video controls autoplay width="100%" height="100%">
                    <source src="video.mp4" type="video/mp4">
                </video>
                -->
            </div>
<!-------->
            <div class="lich">  
                <h1>
                    <span id="currentWeather">Thời tiết: </span>
                </h1>
                <h1>
                    <span id="currentTemperature">Nhiệt độ: </span>
                </h1>
                <h2 id="currentTime">Bây giờ là: </h2>
                <h2 id="currentWeekday">Hôm nay là: </h2>
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
                        <input id="eventInput" placeholder="Event details" type="text"/>
                        <input id="locationInput" placeholder="Event location" type="text"/>
                        <div id="map"></div>
                        <button onclick="saveEvent()">Save</button>
                    </div>
                </div>
            </div>
<!-------->
        </div>
<!---->
    </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
    <script src="dang_xuat.js" defer></script>
    <script src="calendar_script_with_map.js"></script>
    <script defer="" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;callback=initMap"></script>
    <script defer="" src="trang_chu.js"></script>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
</body>

</html>