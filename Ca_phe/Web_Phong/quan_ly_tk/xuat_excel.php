<?php
include '../ket_noi.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=tai_khoan.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Username', 'Password', 'Permission', 'Employee ID', 'Note'));

$sql = "SELECT * FROM tai_khoan ORDER BY CASE WHEN phanquyen = 1 THEN 0 ELSE 1 END, ten_tk";
$stmt = $conn->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit();