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
	$up_subjectID = $_POST["subjectID"];
    $up_subjID = $_POST["subjID"];
	$up_subjName = $_POST["subjName"];
	$up_subjTime = $_POST["subjTime"];
	$up_subjDay = $_POST["subjDay"];
	$up_subjProf = $_POST["subjProf"];
	
    $sql = "UPDATE tbl_subject 
	SET subj_ID = '$up_subjID', 
	subj_name = '$up_subjName', 
	subj_time = '$up_subjTime',
	subj_day = '$up_subjDay', 
	subj_prof = '$up_subjProf'
	WHERE subj_ID = '$up_subjectID'";
    if ($conn->query($sql) === TRUE) {
        echo "Subject Updated!!!";
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