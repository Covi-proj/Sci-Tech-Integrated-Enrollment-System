<?php
  session_start();
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "sci_tech";

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
die("Connection failed: ".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Details | Sci-Tech</title>
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <link rel="stylesheet" href="style.css">
</head>
<style>


    body, h2, table {
        margin: 0;
        padding: 0;
    }


    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        background-color: #2e00c4;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    .logo {
        vertical-align: middle;
        margin-right: 10px;
    }

    .header a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }


    .displayed-text {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        text-align: justify;
        line-height: 2;
        font-weight: bold;
    }


    .tuition-info {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #0078d4;
        color: #fff;
    }


    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .student-info-container {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .student-info {
                flex: 1;
                padding: 20px;
                background-color: #f4f4f4;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-right: 20px;
                text-align: center;
            }

            .payment-details {
                flex: 1;
                padding: 20px;
                background-color: #f4f4f4;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            
            .table-row {
                display: flex;
                justify-content: space-between;
                padding: 5px 0;
            }

            .table-cell {
                flex: 1;
                text-align: left;
            }

        
            .table th {
                text-align: left;
            }
            .container{
                background-color: #f4f4f4;

            }
            .btn_submit [type = "submit"]{
                border: none;
                color: rgb(255, 255, 255);
                padding: 6px 10px;
                text-align: center;
                width: 100%;
                text-decoration: none;
                display: inline-block;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-weight: bold;
                font-size: 20px;
                margin: 10px 9px;
                margin-top: 20px;
                cursor: pointer;
                float: center;
                transition: 0.3s;
                background-color: #2e00c4;
                border-radius: 8px;

            }

            #button {
                padding: 10px 20px;
                background-color: #4CAF50; /* Green background color */
                color: white; /* White text color */
                border: none; /* Remove border */
                border-radius: 5px; /* Add border radius */
                text-align: center; /* Center text */
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer; /* Add a pointer cursor on hover */
            }

            #button:hover {
                background-color: #45a049; /* Darker green on hover */
            }
        

</style>
<body>
    <div class="header">
        <img class="logo" src="favicon_scitech.png" width="50" height="50" alt="Logo">
        <a href="#portal">Online Application</a>
    </div>
    <form action="Finish_form.php"  method="post" class = "btn_submit"  enctype="multipart/form-data" >
    <div class="container">
        
    <input id="button" type="button" type="submit" onclick="history.back()" value="Back">


        <div class="displayed-text">

            <?php

                  
// Get the total number of users in the database
$sqlCountUsers = "SELECT COUNT(*) as total FROM tbl_registration_new";
$result = $conn->query($sqlCountUsers);
$row = $result->fetch_assoc();
$totalUsers = $row['total'];

// Increment the user number based on the total number of users
$userNumber = str_pad($totalUsers + 1, 4, '0', STR_PAD_LEFT);


			$Pre_register_num = $userNumber;
			$Last_Name = $_POST["Last_Name"];
			$First_Name = $_POST["First_Name"];
			$Middle_Name = $_POST["Middle_Name"];
			$Birthdate = $_POST["Birthdate"];
			$Birth_Place = $_POST["Birth_Place"];
			$parent_guardian = $_POST["parent_guardian"];
			$address = $_POST["address"];
			$academic_year = $_POST["academic_year"];
			$last_school_Attended = $_POST["last_school_Attended"];
			$School_Address = $_POST["School_Address"];
			$Contact_Number = $_POST["Contact_Number"];
			$Facebook = $_POST["Facebook"];
			$Instagram = $_POST["Instagram"];
			$Email = $_POST["Email"];
			$Payment_Type = $_POST["Payment_Type"];
            $grade_level = $_POST["grade_level"];


            $psaname = $_FILES['psa']['name'];
            $psatmp_name = $_FILES['psa']['tmp_name'];
            if($psatmp_name !== null && $psatmp_name !== ""){
                $psaContent = addslashes(file_get_contents($psatmp_name));
                $_SESSION['psaname'] = $psaname;
			    $_SESSION['psa_content'] = $psaContent;
            }
            
            

            $form_137name = $_FILES['form_137']['name'];
            $form_137tmp_name = $_FILES['form_137']['tmp_name'];
            if($form_137tmp_name  !== null && $form_137tmp_name !== ""){
                $form_137_Content = addslashes(file_get_contents($form_137tmp_name));
                $_SESSION['form_137name'] = $form_137name;
			    $_SESSION['form_137_content'] = $form_137_Content;
            }
            
            

            $form_138name = $_FILES['form_138']['name'];
            $form_138tmp_name = $_FILES['form_138']['tmp_name'];
            if($form_138tmp_name !== null && $form_138tmp_name !== ""){
                $form_138_Content = addslashes(file_get_contents($form_138tmp_name));
                $_SESSION['form_138name'] = $form_138name;
			    $_SESSION['form_138_content'] = $form_138_Content;
            }
          
            

            $gmcname = $_FILES['gmc']['name'];
            $gmctmp_name = $_FILES['gmc']['tmp_name'];
            if($gmctmp_name !== null && $gmctmp_name !== ""){
                $gmc_Content = addslashes(file_get_contents($gmctmp_name));
                $_SESSION['gmcname'] = $gmcname;
			    $_SESSION['gmc_content'] = $gmc_Content;
            }
            
            	
            $_SESSION['Pre_Num'] = $Pre_register_num;
            $_SESSION['Last_Name'] = $Last_Name;
            $_SESSION['First_Name'] = $First_Name;
            $_SESSION['Middle_Name'] = $Middle_Name;
            $_SESSION['Birthdate'] = $Birthdate;
            $_SESSION['Birth_Place'] = $Birth_Place;
            $_SESSION['parent_guardian'] = $parent_guardian;
            $_SESSION['address'] = $address;
            $_SESSION['academic_year'] = $academic_year;
            $_SESSION['last_school_Attended'] = $last_school_Attended;
            $_SESSION['School_Address'] = $School_Address;
            $_SESSION['Contact_Number'] = $Contact_Number;
            $_SESSION['Facebook'] = $Facebook;
            $_SESSION['Instagram'] = $Instagram;
            $_SESSION['Email'] = $Email;
            $_SESSION['Payment_Type'] = $Payment_Type;
            $_SESSION['grade_level'] = $grade_level;

        
			echo '<table type = "text" class="your-table-class">';

            echo '<tr>';
            echo '<th >Student Information Details:</th>';
            echo '</tr>';


            echo "<tr><td>Pre-registered Number:</td><td>$Pre_register_num</td></tr>";
            echo "<tr><td>Last Name:</td><td>$Last_Name</td></tr>";
            echo "<tr><td>First Name:</td><td>$First_Name</td></tr>";
            echo "<tr><td>Middle Name:</td><td>$Middle_Name</td></tr>";
            echo "<tr><td>Birthdate:</td><td>$Birthdate</td></tr>";
            echo "<tr><td>Birth Place:</td><td>$Birth_Place</td></tr>";
            echo "<tr><td>Parent/Guardian:</td><td>$parent_guardian</td></tr>";
            echo "<tr><td>Permanent Address:</td><td>$address</td></tr>";
            echo "<tr><td>Academic Year:</td><td>$academic_year</td></tr>";
            echo "<tr><td>Last School Attended:</td><td>$last_school_Attended</td></tr>";
            echo "<tr><td>School Address:</td><td>$School_Address</td></tr>";
            echo "<tr><td>Contact No.:</td><td>$Contact_Number</td></tr>";
            echo "<tr><td>Facebook:</td><td>$Facebook</td></tr>";
            echo "<tr><td>Instagram:</td><td>$Instagram</td></tr>";
            echo "<tr><td>Email:</td><td>$Email</td></tr>";
            echo "<tr><td>Payment Type:</td><td>$Payment_Type</td></tr>";
            echo "<tr><td>Grade Level:</td><td>$grade_level</td></tr>";
            //eto po kua
            echo "<tr><td>Form 137:</td><td>$form_137name</td></tr>";
            echo "<tr><td>Form 138:</td><td>$form_138name</td></tr>";
            echo "<tr><td>Certificate of Good Moral Character:</td><td>$gmcname</td></tr>";
            echo "<tr><td>Cetifified PSA:</td><td>$psaname</td></tr>";
            echo '</table>';

            $grade_level = $_POST["grade_level"];
			if($grade_level == 'Grade 7'){

                $Payment_Type = $_POST["Payment_Type"];			
            
		
				if($Payment_Type == 'Cash'){
					$db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
                        echo '<table class="your-table-class">';

                        // Table header with colspan
                        echo '<tr>';
                        echo '<th colspan="2">Cash Payment</th>';
                        echo '</tr>';
                        
                        // Row 1
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '</table>';
                        
					}
				}
				
				elseif($Payment_Type == 'Bi-Annual'){

                    $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<table class="your-table-class">';
                        
                        echo '<tr>';
                        echo '<th colspan="2">Bi-Annual</th>';
                        echo '</tr>';
                        

                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'],2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        
                        echo '</table>';

                    }
				}
				elseif( $Payment_Type == 'Quarterly'){
                    $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
                    $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<table class="your-table-class">';
                        echo '<tr>';
                        echo '<th colspan="2">Quarterly</th>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' .number_format( $row['tui_3rd'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';

                        
                    
                        echo '</table>';
                        
                        }
				}
				
				elseif($Payment_Type == 'Monthly'){
					$db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
                        echo '<table class="your-table-class">';

                        // Row 1
                        echo '<th colspan="2">Monthly</th>';
                        echo '<tr>';
                        
                        echo '<td>Tuition Fee:</td>';
                        
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_3rd'], 2). '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 8
                        echo '<tr>';
                        echo '<td>5th Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_5th'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 9
                        echo '<tr>';
                        echo '<td>6th Payment (January 15):</td>';
                        echo '<td>' . number_format($row['tui_6th'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 10
                        echo '<tr>';
                        echo '<td>7th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_7th'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 11
                        echo '<tr>';
                        echo '<td>8th Payment (March 15):</td>';
                        echo '<td>' . number_format($row['tui_8th'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 12
                        echo '<tr>';
                        echo '<td>9th Payment (April 15):</td>';
                        echo '<td>' . number_format($row['tuit_9th'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '</table>';
                        
					}
				}
				else{
					echo "invalid payment type $Payment_Type";
				}

                $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

                $query = "SELECT * FROM  tbl_subjects_grade7";
				$result = mysqli_query($conn, $query);
                
                echo '<table>';
                echo '<tr>';
                echo '<th>Subjects for Grade 7</th>';
                echo '</tr>';
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<table>';

                    
                    echo '<td>' . $row['subject_name'] . '</td>';
                    

                    echo '</table>';
                }
            }
            elseif ($grade_level == 'Grade 8'){
                
                    $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
                    
                    $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
				    $result = mysqli_query($conn, $query);


                    if($Payment_Type == 'Cash'){

                        while ($row = mysqli_fetch_assoc($result)){

                            echo '<table class="your-table-class">';

                            echo '<tr>';
                            echo '<th colspan="2">Cash Payment</th>';
                            echo '</tr>';
                            
                            // Row 1
                            echo '<tr>';
                            echo '<td>Tuition Fee:</td>';
                            echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 2
                            echo '<tr>';
                            echo '<td>Other School Fees:</td>';
                            echo '<td>' . number_format($row['tui_other'], 2). '</td>';
                            echo '</tr>';
                            
                            // Row 3
                            echo '<tr>';
                            echo '<td>Miscellaneous Fees:</td>';
                            echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 4
                            echo '<tr>';
                            echo '<td>Socio-Cultural Fees:</td>';
                            echo '<td>' . number_format($row['socio'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 5
                            echo '<tr>';
                            echo '<td>Total:</td>';
                            echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                            echo '</tr>';

                            echo '</table>';

                        }
                    }
                    elseif ($Payment_Type == 'Bi-Annual' ){

                        $db_host = 'localhost';
					    $db_user = 'root';
					    $db_pass = '';
					    $db_name = 'sci_tech';

					    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

                    $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)){


                        echo '<table class="your-table-class">';
                        
                        echo '<tr>';
                        echo '<th colspan="2">Bi-Annual</th>';
                        echo '</tr>';
                        

                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        
                        echo '</table>';
                    }

                    }
                    elseif ($Payment_Type == 'Quarterly'){

                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<table class="your-table-class">';

                        echo '<tr>';
                        echo '<th colspan="2">Quarterly</th>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';
                            
                        echo '</table>';


                        }


                    }
                    elseif ($Payment_Type == 'Monthly'){

                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)){

                            echo '<table class="your-table-class">';

                            // Row 1
                            echo '<th colspan="2">Monthly</th>';
                            echo '<tr>';
                            
                            echo '<td>Tuition Fee:</td>';
                            
                            echo '<tr>';
                            echo '<td>Tuition Fee:</td>';
                            echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 2
                            echo '<tr>';
                            echo '<td>Other School Fees:</td>';
                            echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 3
                            echo '<tr>';
                            echo '<td>Miscellaneous Fees:</td>';
                            echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 4
                            echo '<tr>';
                            echo '<td>Socio-Cultural Fees:</td>';
                            echo '<td>' . number_format($row['socio'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 5
                            echo '<tr>';
                            echo '<td>Total:</td>';
                            echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>Upon Enrollment:</td>';
                            echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>2nd Payment (November 15)</td>';
                            echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>3rd Payment (December 15):</td>';
                            echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                            echo '</tr>';
                            
                            echo '<tr>';
                            echo '<td>4th Payment (February 15):</td>';
                            echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 8
                            echo '<tr>';
                            echo '<td>5th Payment (December 15):</td>';
                            echo '<td>' . number_format($row['tui_5th'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 9
                            echo '<tr>';
                            echo '<td>6th Payment (January 15):</td>';
                            echo '<td>' . number_format($row['tui_6th'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 10
                            echo '<tr>';
                            echo '<td>7th Payment (February 15):</td>';
                            echo '<td>' . number_format($row['tui_7th'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 11
                            echo '<tr>';
                            echo '<td>8th Payment (March 15):</td>';
                            echo '<td>' . number_format($row['tui_8th'], 2) . '</td>';
                            echo '</tr>';
                            
                            // Row 12
                            echo '<tr>';
                            echo '<td>9th Payment (April 15):</td>';
                            echo '<td>' . number_format($row['tuit_9th'], 2) . '</td>';
                            echo '</tr>';
                            
                            echo '</table>';
                        }
                        
                           
                    }

                    $query = "SELECT * FROM tbl_subjects_grade7";
                    $result = mysqli_query($conn, $query);
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Subjects for Grade 8</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
    
                        echo '<table>';
    
                        
                        echo '<td>' . $row['subject_name'] . '</td>';
                        
    
                        echo '</table>';
                    }        


                }
                   

                elseif ($grade_level == 'Grade 9'){
                    
                    $Payment_Type = $_POST["Payment_Type"];			
            
			
				if($Payment_Type == 'Cash'){
					$db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {

                        echo '<table class="your-table-class">';

                        // Table header with colspan
                        echo '<tr>';
                        echo '<th colspan="2">Cash Payment</th>';
                        echo '</tr>';
                        
                        // Row 1
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';


                        
                        echo '</table>';
                        
					}
				}
				
				elseif($Payment_Type == 'Bi-Annual'){

                    $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<table class="your-table-class">';
                        
                        echo '<tr>';
                        echo '<th colspan="2">Bi-Annual</th>';
                        echo '</tr>';
                        

                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 5
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '</table>';

                    }
				}
				elseif( $Payment_Type == 'Quarterly'){
                    $db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
                    $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {


                        echo '<table class="your-table-class">';
                        echo '<tr>';
                        echo '<th colspan="2">Quarterly</th>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 2
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 3
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        // Row 4
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        echo '</table>';
                        
                        }
				}
				
				elseif($Payment_Type == 'Monthly'){
					$db_host = 'localhost';
					$db_user = 'root';
					$db_pass = '';
					$db_name = 'sci_tech';

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
                        echo '<table class="your-table-class">';

                        
                        echo '<th colspan="2">Monthly</th>';
                        echo '<tr>';
                        
                        echo '<td>Tuition Fee:</td>';
                        
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                     
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        echo '<tr>';
                        echo '<td>5th Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_5th'], 2) . '</td>';
                        echo '</tr>';
                        
                     
                        echo '<tr>';
                        echo '<td>6th Payment (January 15):</td>';
                        echo '<td>' . number_format($row['tui_6th'], 2) . '</td>';
                        echo '</tr>';
                      
                        echo '<tr>';
                        echo '<td>7th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_7th'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>8th Payment (March 15):</td>';
                        echo '<td>' . number_format($row['tui_8th'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>9th Payment (April 15):</td>';
                        echo '<td>' . number_format($row['tuit_9th'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '</table>';

					}
                      
				}
				else{
					echo "invalid payment type $Payment_Type";
				}
                $query = "SELECT * FROM subjects_g9";
                    $result = mysqli_query($conn, $query);
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Subjects for Grade 9</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
    
                        echo '<table>';
    
                        
                        echo '<td>' . $row['subject'] . '</td>';
                        
    
                        echo '</table>';
                    }  
                }
                elseif ($grade_level == 'Grade 10'){

                    $Payment_Type = $_POST["Payment_Type"];			
            
			
                    if($Payment_Type == 'Cash'){
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'sci_tech';
    
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<table class="your-table-class">';
    
                           
                            echo '<tr>';
                        echo '<th colspan="2">Cash Payment</th>';
                        echo '</tr>';
                    
                        
                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                      
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                      
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                     
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';
    
    
                            
                            echo '</table>';
                            
                        }
                    }
                    
                    elseif($Payment_Type == 'Bi-Annual'){
    
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'sci_tech';
    
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            echo '<table class="your-table-class">';
                            
                            echo '<tr>';
                        echo '<th colspan="2">Bi-Annual</th>';
                        echo '</tr>';
                           

                        echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                    
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                   
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';
                            
                            echo '</table>';
    
                        }
                    }
                    elseif( $Payment_Type == 'Quarterly'){
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'sci_tech';
    
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
    
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<table class="your-table-class">';
                            echo '<tr>';
                            echo '<th colspan="2">Quarterly</th>';
                            echo '</tr>';
                            
                            echo '<tr>';
                            echo '<td>Tuition Fee:</td>';
                            echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                            echo '</tr>';
                            
                            
                            echo '<tr>';
                            echo '<td>Other School Fees:</td>';
                            echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                            echo '</tr>';
                            
                         
                            echo '<tr>';
                            echo '<td>Miscellaneous Fees:</td>';
                            echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                            echo '</tr>';
                            
                            
                            echo '<tr>';
                            echo '<td>Socio-Cultural Fees:</td>';
                            echo '<td>' . number_format($row['socio'], 2) . '</td>';
                            echo '</tr>';
                            
                            
                            echo '<tr>';
                            echo '<td>Total:</td>';
                            echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>Upon Enrollment:</td>';
                            echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>2nd Payment (November 15)</td>';
                            echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                            echo '</tr>';
    
                            echo '<tr>';
                            echo '<td>3rd Payment (December 15):</td>';
                            echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                            echo '</tr>';
                            
                            echo '<tr>';
                            echo '<td>4th Payment (February 15):</td>';
                            echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                            echo '</tr>';
    
                            
                            
                            echo '</table>';
                            
                            }
                    }
                    
                    elseif($Payment_Type == 'Monthly'){
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'sci_tech';
    
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $query = "select * from tbl_tuition where tui_grade = '$grade_level' and tui_ptype = '$Payment_Type'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<table class="your-table-class">';
    
                           
                            echo '<th colspan="2">Monthly</th>';
                            echo '<tr>';
                            
                            echo '<td>Tuition Fee:</td>';
                            
                            echo '<tr>';
                        echo '<td>Tuition Fee:</td>';
                        echo '<td>' . number_format($row['tui_fee'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Other School Fees:</td>';
                        echo '<td>' . number_format($row['tui_other'], 2) . '</td>';
                        echo '</tr>';
                        
                      
                        echo '<tr>';
                        echo '<td>Miscellaneous Fees:</td>';
                        echo '<td>' . number_format($row['tui_misc'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>Socio-Cultural Fees:</td>';
                        echo '<td>' . number_format($row['socio'], 2) . '</td>';
                        echo '</tr>';
                        
                        
                        echo '<tr>';
                        echo '<td>Total:</td>';
                        echo '<td>' . number_format($row['tui_total'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Upon Enrollment:</td>';
                        echo '<td>' . number_format($row['tui_upon'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>2nd Payment (November 15)</td>';
                        echo '<td>' . number_format($row['tui_2nd'], 2) . '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>3rd Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<td>4th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>5th Payment (December 15):</td>';
                        echo '<td>' . number_format($row['tui_5th'], 2) . '</td>';
                        echo '</tr>';
                        
                    
                        echo '<tr>';
                        echo '<td>6th Payment (January 15):</td>';
                        echo '<td>' . number_format($row['tui_6th'], 2) . '</td>';
                        echo '</tr>';
                        
                      
                        echo '<tr>';
                        echo '<td>7th Payment (February 15):</td>';
                        echo '<td>' . number_format($row['tui_7th'], 2) . '</td>';
                        echo '</tr>';
                        
                     
                        echo '<tr>';
                        echo '<td>8th Payment (March 15):</td>';
                        echo '<td>' . number_format($row['tui_8th'], 2) . '</td>';
                        echo '</tr>';
                        
                       
                        echo '<tr>';
                        echo '<td>9th Payment (April 15):</td>';
                        echo '<td>' . number_format($row['tuit_9th'], 2) . '</td>';
                        echo '</tr>';
                            
                            echo '</table>';
    
                        }
                }
                $query = "SELECT * FROM subjects_g10";
                    $result = mysqli_query($conn, $query);
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Subjects for Grade 10</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
    
                        echo '<table>';
    
                        
                        echo '<td>' . $row['subject_name'] . '</td>';
                        
    
                        echo '</table>';
                    }   

            }


            ?>
            <div class="btn_submit">
                    <input  type="submit" name="submit" value="Submit" id = "button">
                </div>
        
        </div>
       </div>
    </form>

</body>

<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js">

</script>    
<script>

            var form = document.getElementById('form')

                form.addEventListener('submit',function(event)){
                    event.preventDefault()
                }

                var text = document.getElementById('text').value

                var doc = new jsPDF()

                doc.text(text,20,20)
                
                doc.save("output.pdf")

</script>

</html>



