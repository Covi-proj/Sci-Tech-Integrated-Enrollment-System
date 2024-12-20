
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Details | Sci-Tech</title>
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
        

</style>
<body>
    <div class="header">
        <img class="logo" src="favicon_scitech.png" width="50" height="50" alt="Logo">
        <a href="#portal">ESC Validation</a>
    </div>
    <form id ="form-print" action="Finish_form.php" method="post" enctype="text/plain">
    <div class="container">
        
        <div class="displayed-text">
            <?php
			
			$host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "sci_tech";

            $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

            if (!$conn) {
	        die("Connection failed: ".mysqli_connect_error());
            }
			//Registration Information
			
			
			//ESC application form to DB
			$LRN  = $_POST["LRN"];
			$lastname  = $_POST["last_name"];
			$firstname  = $_POST["first_name"];
			$middlename  = $_POST["middle_name"];
			$suffix  = $_POST["suffix"];
			$birthdate  = $_POST["birthdate"];
			$nationality  = $_POST["nationality"];
			$gender1  = $_POST["gender"];
			$street  = $_POST["street"];
			$municipality  = $_POST["municipality"];
			$barangay  = $_POST["barangay_district"];
			$province  = $_POST["province"];
			$zip_code  = $_POST["zip_zode"];
			$mobile_no  = $_POST["phone"];
			$email  = $_POST["email"];
			$fam_members  = $_POST["members"];
			$moto_ped  = $_POST["ped"];
			$car_van  = $_POST["car"];
			$farm_land  = $_POST["land"];
			$home_det  = $_POST["home"];
			$no_rooms  = $_POST["bedno"];
			$f_lastname  = $_POST["fl_name"];
			$f_firstname  = $_POST["ff_name"];
			$f_soi  = $_POST["f_soi"];
			$f_gmi  = $_POST["f_gmi"];
			$m_lastname  = $_POST["ml_name"];
			$m_firstname  = $_POST["mf_name"];
			$m_soi  = $_POST["m_soi"];
			$m_gmi  = $_POST["m_gmi"];
			$g_lastname  = $_POST["gl_name"];
			$g_firstname  = $_POST["gf_name"];
			$g_soi  = $_POST["g_soi"];
			$g_gmi  = $_POST["g_gmi"];
			$elem_name  = $_POST["s_name"];
			$elem_type  = $_POST["s_type"];
			$elem_prov  = $_POST["s_prov"];
			$elem_mun  = $_POST["s_mun"];
			$elem_brgy  = $_POST["s_brgy"];
			$elem_tuition  = $_POST["s_tuition"];
			$elem_other  = $_POST["s_other"];
			$elem_misc  = $_POST["s_misc"];
			$IDphoto  = $_POST["IDphoto"];
			$PSAcert  = $_POST["PSAcert"];
			$elem_card  = $_POST["s_card"];
			$latest_ITR  = $_POST["latest_ITR"];
			$cert_TaxEx  = $_POST["cert_TaxEx"];
			$cert_Unem  = $_POST["cert_Unem"];
			
			
			
			$sql = "INSERT INTO esc_app(LRN,lastname,firstname,middlename,suffix,birthdate,nationality,gender,street,municipality,barangay,province,zip_code,mobile_no,email, fam_members,moto_ped,car_van,farm_land,home_det,no_rooms,f_lastname,f_firstname,f_soi,f_gmi,m_lastname,m_firstname,m_soi,m_gmi,g_lastname,g_firstname,g_soi,g_gmi,elem_name,elem_type,elem_prov,elem_mun,elem_brgy,elem_tuition,elem_other,elem_misc,IDphoto,PSAcert,elem_card,latest_ITR,cert_TaxEx,cert_Unem) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			
	
	$stmt = mysqli_stmt_init($conn);

	
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		die('Error in preparing statement: ' . $conn->error);
	}
		
		mysqli_stmt_bind_param($stmt, "issssssssssssssssssssssssssssssssssssssssbbbbbb",$LRN, $lastname, $firstname, $middlename, $suffix, $birthdate, $nationality, $gender1, $street, $municipality, $barangay, $province, $zip_code, $mobile_no, $email, $fam_members, $moto_ped, $car_van, $farm_land, $home_det, $no_rooms, $f_lastname, $f_firstname, $f_soi, $f_gmi, $m_lastname, $m_firstname, $m_soi, $m_gmi, $g_lastname, $g_firstname, $g_soi, $g_gmi, $elem_name, $elem_type, $elem_prov, $elem_mun, $elem_brgy, $elem_tuition, $elem_other, $elem_misc, $IDphoto,$PSAcert,$elem_card,$latest_ITR,$cert_TaxEx,$cert_Unem);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
			
			

            echo '<tr>';
            echo '<th >My Information</th>';
            echo '<tr>';

	        echo "<tr><td>LRN:</td><td>$LRN</td></tr>";
            echo "<tr><td>Last Name:</td><td>$lastname</td></tr>";
            echo "<tr><td>First Name:</td><td>$firstname</td></tr>";
            echo "<tr><td>Middle Name:</td><td>$middlename</td></tr>";
            echo "<tr><td>Suffix:</td><td>$suffix</td></tr>";
            echo "<tr><td>Birthdate:</td><td>$birthdate</td></tr>";
            echo "<tr><td>Nationality:</td><td>$nationality</td></tr>";
            echo "<tr><td>Gender:</td><td>$gender1</td></tr>";
            echo "<tr><td>Street:</td><td>$street</td></tr>";
            echo "<tr><td>Municipality</td><td>$municipality</td></tr>";
            echo "<tr><td>Barangay / District:</td><td>$barangay</td></tr>";
            echo "<tr><td>Province</td><td>$province</td></tr>";
            echo "<tr><td>Zip Code</td><td>$zip_code</td></tr>";
            echo "<tr><td>Mobile/Landline No.:</td><td>$mobile_no</td></tr>";
            echo "<tr><td>Email:</td><td>$email</td></tr>";

            echo '<tr>';
            echo '<th>About my family</th>';
            echo '<tr>';

            echo "<tr><td>Family Members</td><td>$fam_members</td></tr>";
			
			echo "<tr><td>Owns Motorcycle/Pedicab?: </td><td>$moto_ped</td></tr>";
			echo "<tr><td>Owns Car/Van/Pick-up/Truck?: </td><td>$car_van</td></tr>";
			echo "<tr><td>Owns Farm/Land?: </td><td>$farm_land</td></tr>";

            echo '<tr>';
            echo '<th>Father</th>';
            echo '<tr>';

            echo "<tr><td>Last Name: </td><td>$f_lastname</td></tr>";
            echo "<tr><td>First Name: </td><td>$f_firstname</td></tr>";
            echo "<tr><td>Source of Income</td><td>$f_soi</td></tr>";
            echo "<tr><td> Gross Monthly Income</td><td>$f_gmi</td></tr>";

            echo '<tr>';
            echo '<th>Mother</th>';
            echo '<tr>';

            echo "<tr><td>Last Name: </td><td>$m_lastname</td></tr>";
            echo "<tr><td>First Name: </td><td>$m_firstname</td></tr>";

            echo "<tr><td>Source of Income</td><td>$m_soi</td></tr>";
            echo "<tr><td> Gross Monthly Income</td><td>$m_gmi</td></tr>";

            echo '<tr>';
            echo '<th>Guardian</th>';
            echo '<tr>';


            echo "<tr><td>Last Name: </td><td>$g_lastname</td></tr>";
            echo "<tr><td>First Name: </td><td>$g_firstname</td></tr>";

            echo "<tr><td>Source of Income</td><td>$g_soi</td></tr>";
            echo "<tr><td> Gross Monthly Income</td><td>$g_gmi</td></tr>";

            echo '<tr>';
            echo '<th>About my Elementary School</th>';
            echo '<tr>';

            
            echo "<tr><td>Name of Elementary School:</td><td>$elem_name</td></tr>";
            echo "<tr><td>School Type:</td><td>$elem_type</td></tr>";

            echo "<tr><td>Province:</td><td>$elem_prov</td></tr>"; 
            
            echo "<tr><td>Tuition:</td><td>$elem_tuition</td></tr>";  
            echo "<tr><td>Other:</td><td>$elem_other</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$elem_misc</td></tr>";      

            
            echo '<tr>';
            echo '<th>Attestation</th>';
            echo '<tr>';

            echo "<tr><td>Miscellaneous:</td><td>$IDphoto</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$PSAcert</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$elem_card</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$latest_ITR</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$cert_TaxEx</td></tr>"; 
            echo "<tr><td>Miscellaneous:</td><td>$cert_Unem</td></tr>"; 

    

            echo '</table>';
            
            ?>
            <div class="btn_submit">
                    <input  type="submit" name="submit" value="Submit">
            </div>
			<input type="button" class="btn btn-primary"
			onclick="GeneratePdf();" value="GeneratePdf"> 
        
        </div>
       </div>
    </form>
	
	<!-- Html2Pdf -->
	<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js"
		integrity= 
"sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A=="
		crossorigin="anonymous"> 
	</script> 
	
	<script>		 
		// Function to GeneratePdf 
		function GeneratePdf() { 
			var element = document.getElementById('form-print'); 
			html2pdf(element); 
		} 
	</script>
	
	<script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
		integrity= 
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
		crossorigin="anonymous"> 
	</script> 

</body>

</html>



