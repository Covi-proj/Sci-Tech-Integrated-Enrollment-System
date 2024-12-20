<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$db = "sci_tech";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection failed");
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["user_id"];
    $user_pass = $_POST["user_pass"];

    $Username = mysqli_real_escape_string($data, $Username);
    $user_pass = mysqli_real_escape_string($data, $user_pass);

    $sql = "SELECT * FROM UserAccount WHERE Username = '$Username' AND Password = '$user_pass'";
    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row) {
        // User authenticated, redirect to appropriate page
        if ($row["account_type"] == "Student") {
            header("location: student_home.php");
            $_SESSION['user'] = $Username;
            exit();
        } elseif ($row["account_type"] == "Admin") {
            header("location: admin.php");
            exit();
        } elseif ($row["account_type"] == "Cashier") {
            header("location: cashier_form.php");
            exit();
        }
    } else {
       
        $error_message = "Wrong username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title >Sci-Tech Portal</title>
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
</head>
<style>

*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}

a {

    text-decoration: none;


}

.header {

position: fixed;
height: 80px;
width: 100%;

z-index : 100;
padding: 0 20px;


}

.nav {

    max-width: 1100px;
    width: 100%;
    margin: 0 auto;
    color: white;
    text-shadow: 2px 2px 5px black;

}

.nav , .nav_item{

    display: flex;
    height: 100%;
    align-items: center;
    justify-content: space-between;
    font-weight: bold;
    color: white;
}
.nav_logo {

    font-size: 25px;
    margin-left: 10px;
    color: rgb(255, 255, 255);

}

.nav_item {

    column-gap: 25px;
    color: white;

}
.nav_link {

    color: #fff;
    transition: 0.3s;

}

.nav_link:hover{

    color: #000000;


}

.home {

    position: relative;
    height: 100vh;
    width: 100%;
    background-image: url('C:\xampp\htdocs\Enrollment_System_SciTech\pic1.jpg');
    background-size: cover;
    background-position: center;


}

.button{

    border: none;
  color: rgb(255, 252, 252);
  background-color: #2e00c4;
  padding: 6px 10px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-weight: bold;
  font-size: 16px;
  margin: 10px 9px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 8px;

}


button:hover {
  background-color: #ffff00;
  color: #070707;

}

.button:active{

    transform: scale(0.98);

}

.button2 { 

  border: none;
  color: rgb(4, 3, 3);
  padding: 6px 10px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-weight: bold;
  font-size: 16px;
  margin: 10px 9px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 8px;


}

.button2{
    background-color: #2e00c4;
    color: #ffffff;
}

.button2:hover {
  background-color: #ffff00;
  color: #070707;

}

.form_container {

    position: absolute;
    max-width: 320px;
    width: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 101;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: rgba(0, 0, 0, 0.1);   
    animation: fadeInAnimation ease 1s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
    
}
@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}


.form_container h2{

    font-size: 22px;
    color:rgb(4, 3, 3);
    text-align: center; 

}




.input_box {

    
    position: relative;
    margin-top: 30px;
    width: 100%;
    height: 40px;
   
    
    
}

.input_box input{

    height: 100%;
    width: 100%;
    border: none;
    outline: none;
    padding: 0 30px;
    color: #333;
    border-bottom: 1.5px solid #aaaaaa;


}



.checkbox input{

    font-size: 12px;
    cursor: pointer;
    user-select: none;
    color: #0b0217;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    margin: 20px 20px 0;
   

}

.form_container .btn_login {

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

.btn_login:hover {
  background-color: #ffff00;
  color: #070707;

}

.information{

    background-color: #2e00c4;
    width: 100%;
    height: 50%;



}

.title{


    color: white;
    text-align: left;
    margin-top:0;
    margin-left: 20px;
    margin-bottom: 20px;



}

.location{

    color: white;
    margin-left: 20px; 

}

.phone{

    color: white;
    margin-left: 20px; 


}

.title2{

    color: white;
    margin-top: 20px;
    margin-left: 20px;
    margin-bottom: 20px;

}

.link1{

    color: white;
    margin-left: 20px; 
}

.email{

    color: white;
    margin-left: 20px;
    margin-bottom: 20px;

}
.error-message {
    background-color: #ffcccc;
    padding: 10px;
    border: 1px solid #e74c3c;
    color: #c0392b;
    border-radius: 5px;
    margin: 20px 0;
    text-align: center;
}


</style>
<body>

    <header class = "header">
        
    <nav class = "nav">
        <image class = "logo" src = "favicon_scitech.png" width = "60" height = "60" ></image> 
        <a href="#" class = "nav_logo"> Science Technology Institute of Rosario Cavite</a>

        <ul class = "nav_items">

            <li class = "nav_item">

                <a href = '#' class = "nav_link">About</a>
                <a href = '#' class = "nav_link">Contact</a>


            </li>
        </ul>
    </nav>

</header>

   
    <section class = "home">
        <image class = "home" src = "gradient.jpg"></image>
        <div class = "form_container">
            <i class = "uil uil-times form_close"></i>

            <div class = "form login_form">
                
                <form action = "#" method= "POST">
                    <h2>Log In</h2>

                    <?php if (!empty($error_message)): ?>
                   <div class="error-message">
                  <?php echo $error_message; ?>
                 </div>
                 <?php endif; ?>

                    <div class = "input_box">
                        <input type = "user_id" placeholder = "Enter your Username" name = "user_id"  required/>
                        <i class = "uil uil-envelope-alt email"></i>
                    </div>
                    <div class = "input_box">
                    <input type="password" placeholder="Enter your password" name= "user_pass" id="myInput"  required />

                        <i class = "uil uil-lock password"></i> 
                        <i class = "uil uil-eye-slash pw_hide"></i> 
                    </div>
                    
                    <span class = "checkbox">

                        <input type="checkbox" onclick="myFunction()">Show Password

                    </span>
                    

                    <button class= "btn_login" type = "submit" value = "Login">Log In</button>

                </form>
                <script> 
        
                    function myFunction() {
                        var x = document.getElementById("myInput");
                             if (x.type === "password") {
                                x.type = "text";
                             } else {
                                x.type = "password";
                            }
                    }
                    
                </script>




            </div>
        </div>
        <div class = "information">


            <form>

            <h2 class = "title">Sci-Tech</h2>

            <p class = "location">Location: Lolo Polo Bldg. Gen. Trias Drive Tejeros, Rosario, Cavite</p>
            <p class = "phone">Phone: 0917 106 1869</p>

            <h2 class = "title2">Get regular updates</h2>
            <a href="https://www.facebook.com/science.technology.institute" class = "link1">Facebook</a>

            <p  class = "email">Email Address: scitech.rosario@gmail.com</p>

            </form>    
            

        </div>    
     
    </section>


</body>
</html> 