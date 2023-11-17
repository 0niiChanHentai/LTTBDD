<?php
include '../ket_noi.php'; // Update this path to the correct database connection file

// Set headers to trigger the download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=tai_khoan.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('ID', 'Username', 'Password', 'Permission', 'Employee ID', 'Note'));

// Fetch the data
$sql = "SELECT * FROM tai_khoan ORDER BY CASE WHEN phanquyen = 1 THEN 0 ELSE 1 END, ten_tk";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Loop over the rows, outputting them
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit();
