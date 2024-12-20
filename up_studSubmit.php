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
	$studnumber = $_POST["sup_userId"];
    $studnum = $_POST["sup_studnum"];
	$lastname = $_POST["sup_lastName"];
	$firstname = $_POST["sup_firstName"];
	$middlename = $_POST["sup_middlename"];
	$birthdate = $_POST["sup_bdate"];
	$gradelevel = $_POST["sup_grade"];
	$parent_ = $_POST["sup_parent_guardian"];
	$address_ = $_POST['sup_address'];
	$paymenttype = $_POST["sup_ptype"];
	$regdate = $_POST["sup_reg_date"];

	$psa = $_POST["sup_psa"];
	$form137 = $_POST['sup_form137'];
	$form138 = $_POST["sup_form138"];
	$gmc = $_POST["sup_gmc"];
	

    $sql = "UPDATE tbl_stud_enroll
	SET studID = '$studnum', 
	studLast = '$lastname', 
	studFirst = '$firstname', 
	StudMiddle = '$middlename',
	studDate = '$birthdate', 
	studLevel = '$gradelevel',
	parent_guardian = '$parent_',
	address = '$address_',
	studPayType = '$paymenttype', 
	regDate =  '$regdate',
	psa = '$psa',
	form137 = '$form137',
	form138 = '$form138', 
	gmc =  '$gmc'
	WHERE studID = '$studnumber'";
    if ($conn->query($sql) === TRUE) {
        echo "Student Updated!!!";
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