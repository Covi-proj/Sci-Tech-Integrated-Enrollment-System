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
    $subjID = $_POST["subjID"];
	$subjName = $_POST["subjName"];
	$subjTime = $_POST["subjTime"];
	$subjDay = $_POST["subjDay"];
	$subjProf = $_POST["subjProf"];
	

    $sql = "INSERT INTO tbl_subject (subj_ID, subj_name, subj_time, subj_day, subj_prof) VALUES ('$subjID', '$subjName', '$subjTime', '$subjDay', '$subjProf')";
    if ($conn->query($sql) === TRUE) {
        echo "Subject Added!!!";
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