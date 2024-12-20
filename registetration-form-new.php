
<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<title> Registration Form | Sci-Tech</title>
<meta charset = "utf-8 name = "viewport" content = "width = device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="icon" type="image/x-icon" href="C:\Users\Zabala\xampp\Thesis Project _Enrollment System\Content\favicon_scitech.jpg">
<link rel="stylesheet" href="C:\Users\Zabala\xampp\htdocs\Thesis Project _Enrollment System\CSS\design_registration.css">
<head>

<h1> </h1>

</head>
<style>

    body {


        display: flex;
        height: 160vh;
        justify-content: center;
        background-color: #b5b1b1; 
        margin-left: 5px;
        font-family:  system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background: linear-gradient(135deg, #2e00c4, #ffff00);
        
    }

    .header{

       
        overflow: hidden;
        background-color: #a890f5;
        margin-top: 0px;

    }


    .header a{

        float: left;
        display: block;
        color: rgb(255, 255, 255);
        text-align: center;
        padding: 14px 16px;
        margin-top: 3px;
        margin-bottom: 3px;
        text-decoration: none;
        font-weight: bold;
        font-size: 17px;
        transition: 0.3s;

    }

    .container{

        
        margin-top: 10px;
        max-width: 700px;
        width: 100%;
        background: #cac9c9;
        padding: 25px 30px;
        border-radius: 8px;
        position: center;
}

.container, title{

    font-size: 20px;
    font-weight: bold;

}

.container form .user-details{

display: flex;
flex-wrap: wrap;
justify-content: space-between;

}
form .user-details .input-box{

margin: 20px 0 12px 0;
width: calc(100% / 2 - 20px);

}
.user-details .input-box input .details{

display: block;
font-weight: 500;
margin-bottom: 5px;
}
.user-details .input-box input{

height: 45px;
width: 100%;
outline: none;
border-radius: 5px;
border: 1px solid #ccc;
padding-left: 15px;
font-size: 16px;
margin-bottom: 5px;

}

form .gender-details .gender-title{

font-size: 20px;
font-weight: 500;

}
form .gender-details .category{

display: flex;
width:80;
margin: 5px 10px 0;
justify-content: space-between;
}

.gender-details .category label{
display: flex;
align-items: center;
}

.gender-details .category .dot{

height: 18px;
width: 18px;
border-radius: 50%;
margin-right: 10px;
margin-left: 3px;
border: 5px solid transparent; 
transition: all 0.3 ease;
}


.logo {

float: left;
margin-left: 10px;
margin-top: 3px;
margin-bottom: 3px;
border-radius: 50%;
}

form .button input{

border: none;
color: rgb(255, 255, 255);
padding: 15px 32px;
text-align: center;
text-decoration: none;
width: 100%;
display: inline-block;
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
font-weight: bold;
font-size: 16px;
margin: 10px 9px;
cursor: pointer;
border-radius: 8px;
background-color: #2e00c4;
}


    




    
</style>
<body>
    
    <div class = "header">

        <image class = "logo" src = "C:\xampp\htdocs\Enrollment_System_SciTech\favicon_scitech.png" width = "50" height = "50" ></image>
        <a href = "#portal" >Registration Form</a>  
    </div>

    <div class="container">
        <div class="title">Student's Information</div>
        <form ' method= "post">

        <div class="user-details">
             <div class = "input-box">

                

                <span class ="details">Last Name:</span>  
                <input type="text" placeholder="Last Name" required name = "Last_Name">

             </div>
             <div class = "input-box">

                <span class ="details">First Name:</span>
                <input type="text" placeholder="First Name" required name = "First_Name">

             </div>

             <div class = "input-box">

                <span class ="details">Middle Initial:</span>
                <input type="text" placeholder="Middle Initial" required name = "Middle_Initial">

             </div>

             <div class = "input-box">

                <span class ="details">Suffix:</span>
                <input type="text" placeholder="(e.g, Jr.)" required name = "Suffix">

             </div>

             <div class = "gender-details">

                
                
                <span class ="gender-title">Gender:</span>
                <div class="category">
                    <label for="dot-1">

                        <input type="radio" name="gender" id="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="">

                        <input type="radio" name="gender" id="dot-2" name = "gender">
                        <span class="dot one"></span>
                        <span class="gender">Female</span>
                    </label>
                    
                </div>
                
             </div>

             <div class = "input-box">

                <span class="birthday">Birthday:</span>
                <input type="date" id="birthday"  name = "Birthdate">

             </div>

             <div class = "input-box">

                <span class ="details">Birth Place:</span>
                <input type="text" placeholder="Birth Place" required name = "Birth_Place">

             </div>

             
             <div class = "input-box">

                <span class ="details">Permanent Address:</span>
                <input type="text" placeholder="Address" required name = "address">

             </div>

             <div class = "input-box">

                <span class ="details">Academic Year:</span>
                <input type="text" placeholder="2023-2024" required name = "academic_year">

             </div>

             <div class = "input-box">

                <span class ="details">Last School Attended:</span>
                <input type="text" placeholder="" required name = "last_school_Attended">

             </div>


             <div class = "input-box">

                <span class ="details">Contact Number:</span>
                <input type="text" placeholder="Contact No." required name = "Contact_Number">

             </div>
            
             <div class = "input-box">

                <span class ="details">Facebook:</span>
                <input type="text" placeholder="ex.(Mark Covi Z. Del Rosario)" required name = "Facebook">

             </div>

             <div class = "input-box">

                <span class ="details">Instagram:</span>
                <input type="text" placeholder="ex.(@Covi_Zabala)" required name = "Instagram">

             </div>


             <div class = "input-box">

                <span class ="details">Email Address:</span>
                <input type="text" placeholder="(example@example.com)" required name = "Email">


             </div>


             <span class ="Payment-title">Payment Type:</span>
                <div class="category">
                    <label for="dot-1">

                        <input type="radio" name= "Payment_Type" id="dot-1">
                        <span class="dot one"></span>
                        <span class="Payment_Type">Cash</span>
                    </label>
                    <label for="dot-2">

                        <input type="radio" name="Payment_Type" id="dot-2">
                        <span class="dot one"></span>
                        <span class="Payment_Type">Installment</span>
                    </label>

                    <label for="dot-3">

                        <input type="radio" name="Payment_Type" id="dot-2">
                        <span class="dot one"></span>
                        <span class="Payment_Type">W/ESC</span>
                    </label>

                    <label for="dot-4">

                        <input type="radio" name="Payment_Type" id="dot-2">
                        <span class="dot one"></span>
                        <span class="Payment_Type">W/Discount/Honors</span>
                    </label>

            </div>

             <div class="button" >

                <input type ="submit" name = 'submit' value ="Register" >
             </div>
        </div>
        </form>

    </div>
    
    <?php

$Last_Name = $_POST['Last_Name'];
$First_Name = $_POST['First_Name'];
$Middle_Initial = $_POST['Middle_Initial'];
$Suffix = $_POST['Suffix'];
$gender = $_POST['gender'];
$Birthdate = $_POST['Birthdate'];
$Birth_Place = $_POST['Birth_Place'];
$address = $_POST['address'];
$academic_year = $_POST['academic_year'];
$last_school_Attended = $_POST['last_school_Attended'];
$Contact_Number = $_POST['Contact_Number'];
$Facebook = $_POST['Facebook'];
$Instagram = $_POST['Instagram'];
$Email = $_POST['Email'];
$Payment_Type = $_POST['Payment_Type'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sci_tech";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "INSERT INTO tb_registration (Last_Name, First_Name, Middle_Initial, Suffix, gender, Birthdate, Birth_Place, address, academic_year, last_school_Attended, Contact_Number, Facebook, Instagram, Email, Payment_Type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssissss", $Last_Name, $First_Name, $Middle_Initial, $Suffix, $gender, $Birthdate, $Birth_Place, 
    $address, $academic_year, $last_school_Attended, $Contact_Number, $Facebook, $Instagram, $Email, $Payment_Type);

    if ($stmt->execute()) {
        echo "New record is inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>




</body>



</html>






