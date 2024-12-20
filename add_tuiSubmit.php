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
    $tuitionID = $_POST["tuiID"];
	$tuiGrade = $_POST["tuiGrade"];
	$tuiPType = $_POST["tuiPType"];
	$tuiFee = $_POST["tuiFee"];
	$tuiMisc = $_POST["tuiMisc"];
	$tuiSocio = $_POST["tuiSocio"];
	$tuiOther = $_POST["tuiOther"];
	$tuiTotal = $_POST["tuiTotal"];
	$tuiUpon = $_POST["tuiUpon"];
	$tui2nd = $_POST["tui2nd"];
	$tui3rd = $_POST["tui3rd"];
	$tui4th = $_POST["tui4th"];
	$tui5th = $_POST["tui5th"];
	$tui6th = $_POST["tui6th"];
	$tui7th = $_POST["tui7th"];
	$tui8th = $_POST["tui8th"];
	$tui9th = $_POST["tui9th"];
	

    $sql = "INSERT INTO tbl_tuition (tui_ID, tui_grade, tui_ptype, tui_fee, tui_misc, socio, tui_other, tui_total, tui_upon, tui_2nd, tui_3rd, tui_4th, tui_5th, tui_6th, tui_7th, tui_8th, tuit_9th) VALUES ('$tuitionID', '$tuiGrade', '$tuiPType', '$tuiFee', '$tuiMisc', '$tuiSocio', '$tuiOther', '$tuiTotal', '$tuiUpon', '$tui2nd', '$tui3rd', '$tui4th', '$tui5th', '$tui6th', '$tui7th', '$tui8th', '$tui9th')";
    if ($conn->query($sql) === TRUE) {
        echo "Tuition Added!!!";
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