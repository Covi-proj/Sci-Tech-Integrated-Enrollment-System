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
    $facID = $_POST["facID"];
	$facName = $_POST["facName"];
	$facPosition = $_POST["facPosition"];

    $sql = "INSERT INTO tbl_faculty (fac_ID, fac_name, fac_pos) VALUES ('$facID', '$facName', '$facPosition')";
    if ($conn->query($sql) === TRUE) {
        echo "Faculty Added!!!";
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