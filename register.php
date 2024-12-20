<?php
    $db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'sci_tech';

	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$setAY = "SELECT * FROM school_year";
	$result = $conn->query($setAY);
	$row = $result->fetch_assoc();
	$acadYear = $row['school_year'];
?>

<!DOCTYPE html>
<html lang="en">
<style>


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Set a background color and font family for the whole page */
    body {
        background-color: #f2f2f2;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;;
    }

    /* Style the header */
    .header {
        background-color:  #2e00c4;
        color:  #2e00c4;
        padding: 10px;
        text-align: left;
    }

    .header .logo {
        vertical-align: middle;
    }

    .header a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
    }

    /* Style the container */
    .container {
        background-color: #fff;
        max-width: 700px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Style the form title */
    .title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Style input boxes and labels */
    .input-box {
        margin-bottom: 15px;
    }

    .input-box label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input-box input[type="text"],
    .input-box input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }

    /* Style radio buttons */
    .category {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .category label {
        display: flex;
        align-items: center;
    }

    .category input[type="radio"] {
        margin-right: 5px;
    }

    /* Style the submit button */
    .button {
        text-align: center;
        margin-top: 20px;
    }

    .button input[type="submit"] {
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

    .button input[type="submit"]:hover {
        background-color: #ffff00;
    color: #070707;
    }

    .gender {

    border-radius: 10px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    height: 30px;
    width: 30%;

    }
    .Grade{
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        height: 30px;
        width: 100%;
        
    }
    .existing-student-form{
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        height: 30px;
        width: 30%;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="file"] {
        margin-bottom: 15px;
    }


    input[type="file"]:not(:last-child) {
        margin-right: 10px;
    }


    .input-box label::before {
                content: "*";
                color: red;
                margin-right: 4px;
            }


</style>    
            <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Sci-Tech</title>
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
                 <div class="header" >
                 <img class="logo" src="favicon_scitech.png" width="50" height="50" alt="Logo">
                 <a href="#portal">Registration Form</a>
                 </div>
                 <div id = "enroll" class="container">
                 <div class="title">Student's Information</div>
                 
                 <form action="register_submit.php" method="post" enctype="multipart/form-data">
                  <div class="user-details">


                <div class="input-box">
                    <label for="Last_Name">Last Name</label>
                    <input type="text" id="Last_Name"  required name="Last_Name">
                </div>
                <div class="input-box">
                    <label for="First_Name">First Name</label>
                    <input type="text" id="First_Name"  required name="First_Name">
                </div>
                <div class="input-box">
                    <label for="Middle_Initial">Middle Name</label>
                    <input type="text" id="Middle_Name"  required name="Middle_Name">
                </div>
                
                <div class="input-box">
                    <label for="Birthdate">Birthday</label>
                    <input type="date" id="Birthdate" name="Birthdate">
                </div>
                <div class="input-box">
                    <label for="Birth_Place">Birth Place</label>
                    <input type="text" id="Birth_Place" required name="Birth_Place">
                </div>
                <div class = "input-box">
                    <label for = "Parent/Guardian">Parent/Guardian</label>
                    <input type = "text" id = "parent/guardian" required name = "parent_guardian">
                </div>
                <div class="input-box">
                    <label for="Address">Permanent Address</label>
                    <input type="text" id="address"  required name="address">
                </div>
                <div class="input-box">
                    <label for="Academic_Year">Academic Year</label>
                    <input type="text" id="Academic_Year" value = "<?php echo $acadYear ?>" required name="academic_year" readonly>
                </div>
                <div class="input-box">
                    <label for="Last_School_Attended">Elementary School Completed:</label>
                    <input type="text" id="Last_School_Attended" placeholder="" required name="last_school_Attended">
                </div>
                <div class = "input-box">

                    <label for = "School-Address">School Address</label>
                    <input type = "text" id = "School_Address " required name = "School_Address"> 

              </div>

                <div class="input-box">
                    <label for="Contact_Number">Contact Number</label>
                    <input type="text" id="Contact_Number"  required name="Contact_Number">
                </div>
                <div class="input-box">
                    <label for="Facebook">Facebook</label>
                    <input type="text" id="Facebook"  name="Facebook">
                </div>
                <div class="input-box">
                    <label for="Instagram">Instagram</label>
                    <input type="text" id="Instagram" name="Instagram">
                </div>
                <div class="input-box">
                    <label for="Email">Email Address</label>
                    <input type="text" id="Email"  name="Email">
                </div>
                
                <div>
                <div>
                <label class="title">Requirements</label>
                <p class="files">Please follow up on the requirements.</p>

                    <label for="psa">PSA-Birth Certificate:</label>
                    <input type="file" id="psa" name="psa"><br><br>

                    <label for="form_138">Form 138 - Report Card:</label>
                    <input type="file" id="form_138" name="form_138"><br><br>

                    <label for="form_137">Form 137 - Transcript of Record:</label>
                    <input type="file" id="form_137" name="form_137"><br><br>

                    <label for="gmc">Certificate of Good Moral:</label>
                    <input type="file" id="gmc" name="gmc"><br><br>
                    
                </div>

                </div>

                <label class="Payment-title">Type of Payment:</label>
                <div class="category" name="Payment_Type">
                    <label for="Cash">
                        <input type="radio" id="Cash" name="Payment_Type" value="Cash">
                        <span class="dot"></span>
                        <span class="Payment_Type">Full Payment</span>
                    </label>
                    <label for="Bi-Annual">
                        <input type="radio" id="Bi-Annual" name="Payment_Type" required value="Bi-Annual">
                        <span class="dot"></span>
                        <span class="Payment_Type">Bi-Annual</span>
                    </label>
                    <label for="Quarterly">
                        <input type="radio" id="Quarterly" name="Payment_Type" required value="Quarterly">
                        <span class="dot"></span>
                        <span class="Payment_Type">Quarterly</span>
                    </label>
                    <label for="Monthly">
                        <input type="radio" id="Monthly" name="Payment_Type" required value="Monthly">
                        <span class="dot"></span>
                        <span class="Payment_Type">Monthly</span>
                    </label>

				<div id = "existing-student-form">
                <label for=Grade> Grade Level</label>
                <select class = "Grade" id="Grade" name="grade_level">
                        <option  value="Grade 7">Grade 7</option>
                        <option  value="Grade 8">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>    
                </select>

                
                </div>

                </div>
                
                <div class="button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
                    </form> 

            </div>



</body>

            

</html>
