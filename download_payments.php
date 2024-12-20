<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sci_tech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM receive_payment";
$result = $conn->query($sql);

$filename = 'Students Payments.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');
fputcsv($output, array(
    'Tran No. ', 'OR Number', 'Last Name', 'First Name', 'Grade Level','Amount', 'Payment Date'));

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
