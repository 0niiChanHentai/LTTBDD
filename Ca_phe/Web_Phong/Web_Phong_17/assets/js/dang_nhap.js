const VALID_USERNAME = "admin";
const VALID_PASSWORD = "123456";

window.onload = function() {
    const savedUsername = localStorage.getItem("savedUsername");
    const savedPassword = localStorage.getItem("savedPassword");

    if (savedUsername && savedPassword) {
        document.getElementById("username").value = savedUsername;
        document.getElementById("password").value = savedPassword;
        document.getElementById("rememberMe").checked = true;
    }
}

function handleLogin() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const rememberMe = document.getElementById("rememberMe").checked;

    if (username === VALID_USERNAME && password === VALID_PASSWORD) {
        if (rememberMe) {
            localStorage.setItem("savedUsername", username);
            localStorage.setItem("savedPassword", password);
        } else {
            localStorage.removeItem("savedUsername");
            localStorage.removeItem("savedPassword");
        }

        // Chuyển hướng sang doanh_thu.php
        window.location.href = "../doanh_thu/doanh_thu.php";
    } else {
        alert("Tên đăng nhập hoặc mật khẩu không đúng.");
    }
}

let timeout;
const resetTimer = () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        window.location.href = "dang_nhap.html";
    }, 10 * 60 * 1000);  // 10 minutes
};
document.addEventListener('mousemove', resetTimer);
resetTimer();