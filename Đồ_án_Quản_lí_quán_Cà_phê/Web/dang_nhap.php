<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dang_nhap.css">
</head>
<body>
    <div class="dang_nhap">
        <img src="logo.png" alt="Logo" class="logo">
        
        <form action="danh_nhap.php" method="post" onsubmit="event.preventDefault(); handleLogin();">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username">
            
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password">
            
            <div class="remember">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Ghi nhớ mật khẩu</label>
            </div>

            <button type="submit">Đăng nhập</button>
        </form>
        <a href="#">Quên mật khẩu?</a>
    </div>

    <div class="anh">

    </div>

    <script src="dang_nhap.js"></script>

</body>
</html>