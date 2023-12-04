<?php
$db_host = 'localhost';
$db_user = 'student';
$db_pass = '123456';
$db_name = 'quancaphe';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>