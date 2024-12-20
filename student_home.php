<?php
  session_start();
  // Establish a connection to the database
$conn = new mysqli("localhost", "root", "", "sci_tech");
$conn1 = new mysqli("localhost", "root", "", "grade 7");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Sci-Tech Portal</title>
    <link rel="stylesheet" href="style (1).css">
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <style>
        /* Add your custom styles here */

		body {
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
        }

        header {
            background-color: #2a2185;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #555;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #c6d0da;
        }
    
    </style>
</head>

<body>

    <div class="header">
        <img class="logo" src="favicon_scitech.png" width="60" height="60">
        <a href="#portal">Science Technology Institute of Rosario, Cavite Inc.</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <a class="active" onclick="showDashboard()">Home</a>
            <p>Information</p>
            <a onclick="showGrades()">Grades</a>
            <a onclick="showClassSchedule()">Class Schedule</a>
            <a onclick="showBalance()">Balances</a>
            <p>Others</p>
            <a onclick="showAbout()">About</a>
            <a class="btn_logout" id="logout" onclick="logout()">Log Out</a>
        </div>

        <!-- Page content -->
        <div class="content">
            <div id="dashboard" class="page active">
                <h2>Subject Grades</h2>
                <!-- Your content for the dashboard page goes here -->
            </div>
            <div id="grades" class="page">
                <!-- Your content for the grades page goes here -->
            </div>
            <div id="classSchedule" class="page">
                <!-- Your content for the class schedule page goes here -->
            </div>
            <div id="balance" class="page">
                <!-- Your content for the balance page goes here -->
            </div>
            <div id="about" class="page">
                <!-- Your content for the about page goes here -->
            </div>
        </div>
    </div>

    <script>
        function hideAllPages() {
            var pages = document.querySelectorAll('.page');
            pages.forEach(function (page) {
                page.classList.remove('active');
            });
        }

        function showDashboard() {
            hideAllPages();
            document.getElementById('dashboard').classList.add('active');
        }

        function showGrades() {
            hideAllPages();
            document.getElementById('grades').classList.add('active');
        }

        function showClassSchedule() {
            hideAllPages();
            document.getElementById('classSchedule').classList.add('active');
        }

        function showBalance() {
            hideAllPages();
            document.getElementById('balance').classList.add('active');
        }

        function showAbout() {
            hideAllPages();
            document.getElementById('about').classList.add('active');
        }

        function logout() {
            document.getElementById("logout").addEventListener("click", function() {
            window.location.href = "login.php"; 
        });
        }
    </script>
</body>

</html>
