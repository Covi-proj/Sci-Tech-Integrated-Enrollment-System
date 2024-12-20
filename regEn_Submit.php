<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sci_tech";


function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

// Insert new user into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studnumber = $_POST["studNum"];
	$lastname = $_POST["studLast"];
	$firstname = $_POST["studFirst"];
	$middlename = $_POST["middlename"];
	
	$birthdate = $_POST["birthdate"];
	$gradelevel = $_POST["studGrade"];
	$parent = $_POST['parent'];
	$address = $_POST['address'];
	$paymenttype = $_POST["studPType"];
	$regstatus = $_POST["regstatus"];
	$regdate = $_POST["reg_date"];
	$psa = $_POST['psa'];
	$form138 = $_POST['form138'];
	$form137 = $_POST['form137'];
	$gmc = $_POST['gmc'];
	
	$studLRN = $_POST["studLRN"];
	$studSY = $_POST["studSY"];

	//CHECKING AND QUERIES SHOULD START HERE!!!
	$check_studID = "select * from tbl_stud_enroll where studID = '$studnumber'";
	$studID_result = $conn->query($check_studID);

	if($studID_result->num_rows>0){
		echo "FAILED TO ADD STUDENT!! STUDENT NUMBER ALREADY EXIST!!";
	}else{
		$check_LRN = "select * from student_lrn where LRN = '$studLRN'";
		$LRN_result = $conn->query($check_LRN);
		if($LRN_result->num_rows>0){
			echo "FAILED TO ADD STUDENT!! LRN ALREADY EXIST!!";
		}else{
			$sql = "INSERT INTO tbl_stud_enroll (studID, studLast, studFirst, StudMiddle, studDate, parent_guardian , address ,studLevel, studSY, studPayType, studStatus, regDate, psa, form138 ,form137, gmc) VALUES
			('$studnumber', '$lastname', '$firstname', '$middlename', '$birthdate', '$parent','$address','$gradelevel', '$studSY', '$paymenttype', '$regstatus', '$regdate', '$psa', '$form138', '$form137','$gmc')";

			$sql1 = "SELECT tui_total FROM tbl_tuition WHERE tui_grade = '$gradelevel' AND tui_ptype = '$paymenttype'";
			
			$result = $conn->query($sql1);

				if ($result->num_rows > 0) {
					// Output data of the first row
					$row = $result->fetch_assoc();
					$tuiTotal = $row["tui_total"];
				} else {
					echo "No results found";
				}

				$sql2 = "INSERT INTO student_balance (Student_num, studLname, studFname, Current_balance) VALUES ('$studnumber', '$lastname', '$firstname', '$tuiTotal')";

			    $password = generateRandomPassword();
                        $accounttype = 'Student';
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
                        $sql_user = "INSERT INTO useraccount (Username, Password, account_type)
                                     VALUES ('$studnumber', '$hashed_password', '$accounttype')";
                       

			$sql3 = "SELECT * FROM tbl_tuition WHERE tui_grade = '$gradelevel' AND tui_ptype ='$paymenttype'";
	
			$result3 = $conn->query($sql3);

			if ($result3->num_rows > 0) {
				
				$row3 = $result3->fetch_assoc();

				if ($paymenttype == 'Cash'){

					$tuiFee = $row3["tui_fee"];
					$tuiMisc = $row3["tui_misc"];
					$tuiOther = $row3["tui_other"];
					$tuiTotal = $row3["tui_total"];


				}
				else if($paymenttype == 'Bi-Annual'){
					
					$tuiFee = $row3["tui_fee"];
					$tuiMisc = $row3["tui_misc"];
					$tuiOther = $row3["tui_other"];
					$tuiTotal = $row3["tui_total"];
					$tuiUpon = $row3["tui_upon"];
					$tui2nd = $row3["tui_2nd"];

				}
				else if($paymenttype == 'Quarterly'){
					
				$tuiFee = $row3["tui_fee"];
				$tuiMisc = $row3["tui_misc"];
				$tuiOther = $row3["tui_other"];
				$tuiTotal = $row3["tui_total"];
				$tuiUpon = $row3["tui_upon"];
				$tui2nd = $row3["tui_2nd"];
				$tui3rd = $row3["tui_3rd"];
				$tui4th = $row3["tui_4th"];


			} else if($paymenttype == 'Monthly'){

				$tuiFee = $row3["tui_fee"];
				$tuiMisc = $row3["tui_misc"];
				$tuiOther = $row3["tui_other"];
				$tuiTotal = $row3["tui_total"];
				$tuiUpon = $row3["tui_upon"];
				$tui2nd = $row3["tui_2nd"];
				$tui3rd = $row3["tui_3rd"];
				$tui4th = $row3["tui_4th"];
				$tui5th = $row3["tui_5th"];
				$tui6th = $row3["tui_6th"];
				$tui7th = $row3["tui_7th"];
				$tui8th = $row3["tui_8th"];
				$tui9th = $row3["tuit_9th"];
			}
				
				
				
			} else {
				echo "No results found";
			}

			$sql4 = "INSERT INTO student_LRN (LRN, Student_num, last_name, first_name, middle_name) VALUES ('$studLRN','$studnumber','$lastname','$firstname','$middlename')";

			if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql4)=== TRUE)  {
				$_SESSION['studNum'] = $studnumber;
				$_SESSION['studLast'] = $lastname;
				$_SESSION['studFirst'] = $firstname;
				$_SESSION['studGrade'] = $gradelevel;
				$_SESSION['studPType'] = $paymenttype;
				$_SESSION['studDate'] = $regdate;
				
				$_SESSION['studLRN'] = $studLRN;
				$_SESSION['studSY'] = $studSY;


			if($paymenttype == 'Cash'){

				$_SESSION['tuiFee'] = $tuiFee;
				$_SESSION['tuiMisc'] = $tuiMisc;
				$_SESSION['tuiOther'] = $tuiOther;
				$_SESSION['tuiTotal'] = $tuiTotal;



			}	
			else if($paymenttype == 'Bi-Annual'){

				$_SESSION['tuiFee'] = $tuiFee;
				$_SESSION['tuiMisc'] = $tuiMisc;
				$_SESSION['tuiOther'] = $tuiOther;
				$_SESSION['tuiTotal'] = $tuiTotal;
				$_SESSION['tuiUpon'] = $tuiUpon;
				$_SESSION['tui2nd'] = $tui2nd;

			}
			else if ($paymenttype == 'Quarterly'){
				$_SESSION['tuiFee'] = $tuiFee;
				$_SESSION['tuiMisc'] = $tuiMisc;
				$_SESSION['tuiOther'] = $tuiOther;
				$_SESSION['tuiTotal'] = $tuiTotal;
				$_SESSION['tuiUpon'] = $tuiUpon;
				$_SESSION['tui2nd'] = $tui2nd;
				$_SESSION['tui3rd'] = $tui3rd;
				$_SESSION['tui4th'] = $tui4th;
			}
			else if ($paymenttype === 'Monthly'){
				$_SESSION['tuiFee'] = $tuiFee;
				$_SESSION['tuiMisc'] = $tuiMisc;
				$_SESSION['tuiOther'] = $tuiOther;
				$_SESSION['tuiTotal'] = $tuiTotal;
				$_SESSION['tuiUpon'] = $tuiUpon;
				$_SESSION['tui2nd'] = $tui2nd;
				$_SESSION['tui3rd'] = $tui3rd;
				$_SESSION['tui4th'] = $tui4th;
				$_SESSION['tui5th'] = $tui5th;
				$_SESSION['tui6th'] = $tui6th;
				$_SESSION['tui7th'] = $tui7th;
				$_SESSION['tui8th'] = $tui8th;
				$_SESSION['tui9th'] = $tui9th;

			}
				
				echo "Student Added";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}

}

$conn->close();

?>

<style>

body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
			font-weight: bold;
        }

        button {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
			background-color: blue;
			color: white;
			border-radius: 10px;
        }

</style>

<html lang="en">
	<br>
	<button type="button" onclick="history.back()">Back</button>
	<br>
	<label>Generate Assessment Form</label>
	<button type="button" onclick="openAssessForm()">Generate Form</button>
	<br>
	<label>Generate Certificate of Enrollment</label>
	<button type="button" onclick="openEnrollCert()">Generate Certificate</button>
	
	<script>
			function openAssessForm() {
				
				var urlToOpen = 'assessForm.php';
				
				
				window.open(urlToOpen, '_blank');
			}
			function openEnrollCert() {
				
				var urlToOpen = 'enrollCert.php';
				
				
				window.open(urlToOpen, '_blank');
			}
	</script>
</html>
<!--TO ADD ENDS HERE!!-->