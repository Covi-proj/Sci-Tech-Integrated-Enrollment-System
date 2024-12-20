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
	$up_facultyID = $_POST["facultyID"];
    $up_facID = $_POST["facID"];
	$up_facName = $_POST["facName"];
	$up_facPosition = $_POST["facPosition"];
	
    $sql = "UPDATE tbl_faculty 
	SET fac_ID = '$up_facID', 
	fac_name = '$up_facName', 
	fac_pos = '$up_facPosition'
	WHERE fac_ID = '$up_facultyID'";
    if ($conn->query($sql) === TRUE) {
        echo "Faculty Updated!!!";
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