<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dang_nhap.css">
    <title>Đăng nhập</title>
</head>

<body>

    <div class="login-container">

        <h2>Đăng nhập</h2>

        <form id="loginForm">
            <div class="input-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="input-group">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Ghi nhớ mật khẩu</label>
            </div>
            <button type="button" onclick="handleLogin()">Đăng nhập</button>
        </form>
        
    </div>

    <script src="dang_nhap.js"></script>

</body>

</html>