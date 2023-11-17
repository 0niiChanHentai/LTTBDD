<?php
$db_host = 'localhost';  // Change to your database host
$db_user = 'student';  // Change to your database username
$db_pass = '123456';  // Change to your database password
$db_name = 'quancaphe';  // Change to your database name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>