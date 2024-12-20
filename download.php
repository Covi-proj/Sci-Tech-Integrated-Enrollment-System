<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sci_tech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_stud_enroll";
$result = $conn->query($sql);

$filename = 'Enrolled Students.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');
fputcsv($output, array(
    'Student Number', 'Last Name', 'First Name', 'Middle Name', 'Birthdate',
    'Grade Level','Parent Guardian','Address', 'School Year', 'Payment Type', 'Registration Status', 'Date of Enrollment','PSA-Certificate','Form 138','Form 137','Certificate of Good Moral'
));

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
