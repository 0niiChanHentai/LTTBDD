<?php
$dbhost = "localhost";
$dbuser = "student";
$dbpass = "123456";
$dbname = "user_database";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Khong the ket noi: ". $conn->connect_error);
}

echo"Xin chao";
?>