<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, test_column FROM test_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Xuất dữ liệu của mỗi hàng
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Test Column: " . $row["test_column"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>