<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Application | Sci-Tech</title>
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <style>
        body {
            background-color: #fff;
            color: #333;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #2e00c4;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 20px;
        }

        .message {
            background-color: #fff;
            border: 2px solid #2e00c4;
            border-radius: 10px;
            text-align: center;
            font-size: 20px;
            max-width: 80%;
            padding: 20px;
            font-weight: bold;
            float: center;
            margin-left:150px;
        }


        .header-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #2e00c4;
            color: white;
            padding: 20px;
            text-align: left;
            
            font-weight: bold;
            font-size: 25px;
            border-bottom: 2px solid #fff;
        }
        .hyperlink{

            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 


        }

        .inviform{
            
            display: none;

        }

        @media print {
            .no-prt {
                display:none;
            }
            .inviform {
                font-size: 13px;
                display:block;
            }
            .title{
                text-align: center;


            }
        }
        .school_name{

            font-size: 20px;
            text-align: center;
            
        }
            
        .address{

            font-size: 15px;
        }
        .reg{

            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }
        .stud_det{

            border: 1px solid black;
            border-bottom: 1px solid black;

        }

        
    </style>
</head>
<body>

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


$Pre_register_num = $_SESSION['Pre_Num']; 
$Last_Name = $_SESSION['Last_Name'];
$First_Name = $_SESSION['First_Name'];
$Middle_Name = $_SESSION['Middle_Name']; 
$Birthdate = $_SESSION['Birthdate']; 
$Birth_Place = $_SESSION['Birth_Place'];
$parent_guardian = $_SESSION['parent_guardian'];
$address = $_SESSION['address'];
$academic_year = $_SESSION['academic_year'];
$last_school_Attended = $_SESSION['last_school_Attended'];
$School_Address = $_SESSION['School_Address'];
$Contact_Number = $_SESSION['Contact_Number'];
$Facebook  = $_SESSION['Facebook'];
$Instagram = $_SESSION['Instagram'];
$Email = $_SESSION['Email'];
$Payment_Type = $_SESSION['Payment_Type'];
$grade_level = $_SESSION['grade_level'];


$filename = '';
$filesize = '';
$filetype = '';
$upload_date = '';



if (isset($_FILES['psa'])) {
    $filename = basename($_FILES['psa']['name']);
    $filesize = $_FILES['psa']['size'];
    $filetype = mime_content_type($_FILES['psa']['tmp_name']);
    $upload_date = date("Y-m-d H:i:s");
    move_uploaded_file($_FILES['psa']['tmp_name'], "uploads/" . $filename);
}

$filename = isset($_SESSION['psa']) ? $_SESSION['psa']: '';
$filesize = isset($_SESSION['form_138']) ? $_SESSION['form_138']: '';
$filetype = isset($_SESSION['form_137']) ? $_SESSION['form_137']: '';
$upload_date = isset($_SESSION['gmc']) ? $_SESSION['gmc']: '';


$sql = "INSERT INTO  tbl_registration_new (Pre_register_num, Last_Name, First_Name, Middle_Name, Birthdate, Birth_Place, parent_guardian, address, academic_year, last_school_Attended, School_Address, Contact_Number, Facebook, Instagram, Email, Payment_Type, grade_level, filename, filesize, filetype, upload_date) 
            VALUES ('$Pre_register_num', '$Last_Name', '$First_Name', '$Middle_Name', '$Birthdate', '$Birth_Place', '$parent_guardian', '$address', '$academic_year', '$last_school_Attended', '$School_Address', '$Contact_Number', '$Facebook', '$Instagram', '$Email','$Payment_Type', '$grade_level', '$filename', '$filesize', '$filetype', '$upload_date')";
	
	
	
	if ($conn ->query($sql)===TRUE) {
		session_unset();  
        session_destroy(); 
	}
	else{
		echo "Error uploading file: " . $conn->error;
	}

?>

<div class="no-prt">
    <div class="header" >
        Online Application
    </div>
    <img class="header-image" src="checklogo.jpg"  width = "100px" height = "50px" alt="Header Image">
    <div class="container">
        Your Online Application has been successfully accepted
    </div>
   
    <div class="message">
        You may download or print the registration form for your copy. To confirm your admission, please settle the assessment or the minimum reservation fee 
        of one thousand pesos (PHP 1,000) through the cashier at the Science Technology Institute Rosario.

        <button onclick = "window.print();"   href="generatepdf.php">Click here to download</button> 
    </div> 
</div>
 

<div class = "inviform">
 
<h3 class = "school_name"><image class = "logo" src = "favicon_scitech.png" width = "30" height = "30" ></image> Science Technology Institute of Rosario, Cavite <b class = "address"><br>STI Bldg. Gen. Trias Drive, Tejero, Rosario, Cavite<br>971-1672/ 438-5227 Email add: stihs.rosario@yahoo.com</p></b></h3>
<h3 class = "reg">Registration Form</h3>
    <?php
        echo '<table type = "text" class="your-table-class">';
    echo '<div class = "stud_det">';
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
    
    echo '</table>';
    echo '</div>';
    $grade = $grade_level;
    if($grade == 'Grade 7'){

        $PType = $Payment_Type;		
    

        if($PType == 'Cash'){
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
   //number_format($row['tui_fee'], 2)             
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
        
        elseif($PType == 'Bi-Annual'){

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
        elseif( $PType == 'Quarterly'){
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
                echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>4th Payment (February 15):</td>';
                echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                echo '</tr>';

                
            
                echo '</table>';
                
                }
        }
        
        elseif($PType == 'Monthly'){
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
                echo '<td>' . numnber_format($row['tui_upon'], 2) . '</td>';
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
                echo '<td>' . number_formar($row['tui_4th'], 2) . '</td>';
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
    elseif ($grade == 'Grade 8'){

        $PType = $Payment_Type;

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


            if($PType == 'Cash'){

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
            elseif ($PType == 'Bi-Annual' ){

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
                echo '<td>' . number_format($row['tui_other'] ,2) . '</td>';
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
            elseif ($PType == 'Quarterly'){

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
            elseif ($PType == 'Monthly'){

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

                
                echo '<td>' . number_format($row['subject_name'], 2) . '</td>';
                

                echo '</table>';
            }        


        }
           

        elseif ($grade == 'Grade 9'){
            
            $PType = $Payment_Type;		
    
    
        if($PType == 'Cash'){
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
                echo '<td>' .number_format( $row['tui_other'], 2) . '</td>';
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
        
        elseif($PType == 'Bi-Annual'){

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
        elseif( $PType == 'Quarterly'){
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
        
        elseif($PType == 'Monthly'){
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
        elseif ($grade == 'Grade 10'){

            $PType = $Payment_Type;		
    
    
            if($PType == 'Cash'){
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
            
            elseif($PType == 'Bi-Annual'){

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
            elseif( $PType == 'Quarterly'){
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
                    echo '<td>' . number_format($row['tui_3rd'], 2) . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<td>4th Payment (February 15):</td>';
                    echo '<td>' . number_format($row['tui_4th'], 2) . '</td>';
                    echo '</tr>';

                    
                    
                    echo '</table>';
                    
                    }
            }
            
            elseif($PType == 'Monthly'){
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

</div>
</body>
</html>


