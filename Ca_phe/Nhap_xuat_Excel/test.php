<?php
$dbhost = "localhost";
$dbuser = "student";
$dbpass = "123456";
$dbname = "user_database";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Không thể kết nối: " . $conn->connect_error);
}

$sql = "SELECT id, username, email, password, reg_date FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Ngày đăng ký</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["reg_date"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>