<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sci_tech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve file details from the database
$fileId = $_GET['id']; // Assuming you pass the file ID as a parameter in the URL
$sql = "SELECT Pre_register_num, psaName, psaContent FROM tbl_registration_new WHERE Pre_register_num = '$fileId'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Set the appropriate headers for file download
    header("Content-Disposition: attachment; filename=" . $row['psaName']);

    // Output the file content
    echo $row['psaContent'];
} else {
    echo "File not found.";
}

// Close the database connection
$conn->close();
?>
