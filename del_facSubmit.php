<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sci_tech";

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

// Insert new user into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $del_facultyID = $_POST["facultyID"];

    $sql = "DELETE FROM tbl_faculty WHERE fac_ID = '$del_facultyID'";
    if ($conn->query($sql) === TRUE) {
        echo "Faculty Deleted!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<html lang="en">
	<br>
	<button type="button" onclick="history.back()">Back</button>
</html>