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
	$up_tuitionID = $_POST["tuitionID"];
    $up_tuiID = $_POST["tuiID"];
	$up_tuiGrade = $_POST["tuiGrade"];
	$up_tuiPType = $_POST["tuiPType"];
	$up_tuiFee = $_POST["tuiFee"];
	$up_tuiMisc = $_POST["tuiMisc"];
	$up_tuiSocio = $_POST["tuiSocio"];
	$up_tuiOther = $_POST["tuiOther"];
	$up_tuiTotal = $_POST["tuiTotal"];
	$up_tuiUpon = $_POST["tuiUpon"];
	$up_tui2nd = $_POST["tui2nd"];
	$up_tui3rd = $_POST["tui3rd"];
	$up_tui4th = $_POST["tui4th"];
	$up_tui5th = $_POST["tui5th"];
	$up_tui6th = $_POST["tui6th"];
	$up_tui7th = $_POST["tui7th"];
	$up_tui8th = $_POST["tui8th"];
	$up_tui9th = $_POST["tui9th"];
	
    $sql = "UPDATE tbl_tuition 
	SET tui_ID = '$up_tuiID', 
	tui_grade = '$up_tuiGrade', 
	tui_ptype = '$up_tuiPType', 
	tui_fee = '$up_tuiFee', 
	tui_misc = '$up_tuiMisc',
	socio = '$up_tuiSocio', 
	tui_other = '$up_tuiOther', 
	tui_total = '$up_tuiTotal', 
	tui_upon = '$up_tuiUpon', 
	tui_2nd = '$up_tui2nd', 
	tui_3rd = '$up_tui3rd',
	tui_4th = '$up_tui4th',
	tui_5th = '$up_tui5th',
	tui_6th = '$up_tui6th',
	tui_7th = '$up_tui7th',
	tui_8th = '$up_tui8th',
	tuit_9th = '$up_tui9th'
	WHERE tui_ID = '$up_tuitionID'";
    if ($conn->query($sql) === TRUE) {
        echo "Tuition Updated!!!";
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