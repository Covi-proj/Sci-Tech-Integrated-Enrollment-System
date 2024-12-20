
<!DOCTYPE html>
<html>
<head>
    <title >Science Techonology Institute of Rosario, Cavite Inc.</title>
    <link rel="icon" type="image/x-icon" href="C:\Users\Zabala\Desktop\Thesis Project _Enrollment System\Content\favicon_scitech.png">
<style>
* {box-sizing: border-box;}

* {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #b5b1b1;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }

        .header {
            overflow: hidden;
            background-color: #4810ff;
        }

        .header a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            margin: 3px;
            text-decoration: none;
            font-weight: bold;
            font-size: 17px;
            transition: 0.3s;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: #1c96f9;
            color: white;
        }

        .header .login-container {
            float: right;
        }

        button {
            border: none;
            color: #040303;
            padding: 6px 10px;
            text-align: right;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-size: 16px;
            margin: 10px 9px;
            cursor: pointer;
            float: right;
            transition: 0.3s;
        }

        .btn_register {
            background-color: #2e00c4;
            color: #ffffff;
        }

        .btn_register:hover {
            background-color: #ffff00;
            color: #070707;
        }

        .btn_login {
            border: none;
            color: #fff;
            padding: 15px 32px;
            text-align: right;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-size: 16px;
            margin: 10px 9px;
            cursor: pointer;
            float: right;
            background-color: #2e00c4;
            transition: 0.3s;
        }

        .btn_login:hover {
            background-color: #ffff00;
            color: #070707;
        }

        .container {
            width: 30%;
            float: right;
            margin-top: 120px;
            margin-right: 20px;
            border-radius: 5px;
            background-color: #e8e8e8;
            padding: 20px;
            transition: 0.3s;
            font-weight: bold;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #928b8b;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .images {
            padding: 12px 20px;
            margin-left: 20px;
            border-radius: 4px;
        }

        .logo {
            float: left;
            margin-left: 10px;
            margin-top: 3px;
            margin-bottom: 3px;
            border-radius: 50%;
        }

        .container {
            padding: 2rem;
        }

        .display-left,
        .display-right {
            float: center;
        }

        .display-container {
            position: relative;
            max-width: 100%;
            margin: 0 auto;
            object-fit: cover;
            overflow: hidden;
        }

        /* Style for the images in the slideshow */
        .mySlides {
            display: none;
            width: 100%;
            transition: opacity 0.5s; /* Add a fade effect to the images */
            animation: fade 1s linear forwards;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Style for the left and right navigation buttons */
        .display-left,
        .display-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 24px;
        }

        .display-left {
            left: 0;
        }

        .display-right {
            right: 0;
        }

        .Studport {
            width: 100%;
            height: 50%;
        }

        .title {
            font-size: 40px;
            text-align: center;
            color: black;
        }

        .text {
            font-size: 32px;
            margin-top: 10px;
            margin-left: 150px;
            color: black;
            text-align: left;
        }

        .button {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
    float:center;
}

.btn_register {
    background-color: #2e00c4;
    color: #ffffff;
    float:center;
}

.btn_register:hover {
    background-color: #ffff00;
    color: #070707;
}

.btn_login,
.registerBtn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #2e00c4;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 16px;
    margin: 10px 9px;
    cursor: pointer;
    transition: 0.3s;
}

.btn_login:hover,
.registerBtn:hover {
    background-color: #ffff00;
    color: #070707;
}

</style>
</head>
<script>

function redirectToNextPage() {
    window.location.href = "file:///C:/Users/Zabala/Desktop/Thesis%20Project%20_Enrollment%20System/Registration%20page.html?birthday=2001-09-09#";
  }

</script>


<body>



<div class="header">
    
    <image class = "logo" src = "favicon_scitech.png" width = "60" height = "60" ></image> 

  <a href = "#portal" >Science Technology Institute of Rosario, Cavite Inc. </a>  
  <a href="#about">About</a>
  <a href="#contact">Contact</a>

  <a href="register.php" class="registerBtn">Register Now</a>
  <button  onclick="redirectToNextPage()"class= "btn_login">Login</button>

  </div>


  <div class="display-container">
    <img class="mySlides" src="enroll_pic.jpg" alt="Slide 1">
    <img class="mySlides" src="slide.jpg" alt="Slide 2">
    <img class="mySlides" src="pic1.jpg" alt="Slide 3">
    <img class="mySlides" src="background_img.jpg" alt="Slide 4">

    
    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
</div>




<script>

function redirectToNextPage() {
        window.location.href = "login.php";
      }


    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
</script>





</body>
</html>
