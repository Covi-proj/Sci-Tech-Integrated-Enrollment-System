<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | School Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Container for the sidebar and content */
        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #2a2185;
            color: white;
            padding: 20px;
        }

        .sidebar h1 {
            margin-bottom: 20px;
            color: white;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
            color: white;
            cursor: pointer;
        }

        .sidebar ul li.active {
            background-color: blue;
            border-left: 4px solid #fff;
        }

        /* Content styles */
        .content {
            flex: 1;
            padding: 20px;
        }

        .page {
            display: none;
        }

        .page.active {
            display: block;
        }

        /* Form styles (you can customize further) */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #2a2185;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #2a2185;
        }

        button {
            background-color: #2a2185;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .your-table-class {
            width: 100%;
            border-collapse: collapse;
        }

        .your-table-class th,
        .your-table-class td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .your-table-class th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .your-table-class tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li class="active" onclick="showDashboard()">Dashboard</li>
                <li onclick="showStudents()">Students</li>
                <li onclick="showPayment()">Payment</li>
                <li onclick="showUserAccounts()">User Accounts</li>
            </ul>
        </div>
        <div class="content">
            <div id="dashboard" class="page active">
                <h2>Dashboard</h2>
                <div>Welcome Admin</div>
            </div>
            <div id="students" class="page">
                <h2>List of Students</h2>
                <form method="post" action="save_student.php">
                    <label for="studentId">Student ID:</label>
                    <input type="text" id="studentId" name="Student_number" required>
                    
                    <label for="name">Name of Student:</label>
                    <input type="text" id="name" name="student_name" required>

                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" required>              
                          
                    <label for="email">Email Address:</label>
                    <input type="text" id="email" name="Email" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>

                    <button type="submit">Save</button>

                    <?php

                    $db_host = 'localhost';
                    $db_user = 'root';
                    $db_pass = '';
                    $db_name = 'sci_tech';

                    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                  
                    $query = "SELECT * FROM tbl_students_";
                  
                    $result = mysqli_query($conn, $query);
					          while ($row = mysqli_fetch_assoc($result)) {
                      
                    echo '<table class="your-table-class">';
                
                    echo '<tr>';
                    echo '<td>Student No.</td>';
                    echo '<td>' . $row['Student_Number'] . '</td>';
                    echo '</tr>';


                    echo '<tr>';
                    echo '<td>Student Name</td>';
                    echo '<td>' . $row['student_name'] . '</td>';
                    echo '</tr>';


                    echo '<tr>';
                    echo '<td>Contact</td>';
                    echo '<td>' . $row['contact'] . '</td>';
                    echo '</tr>';

                    // Row 4
                    echo '<tr>';
                    echo '<td>Email</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '</tr>';

                    // Row 5
                    echo '<tr>';
                    echo '<td>Address</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '</tr>';

                    echo '</table>';

                    }
                  ?>
                </form>
            </div>
            <div id="payment" class="page">
                <h2>Payment</h2>
                <form action="subtract_balance.php" method="post">
                    <label for="payid">Student ID:</label>
                    <input type="text" id="studNo" name="studNo" placeholder="Please enter Student Number" required>
                    <!--
                    <label for="paymentName">Name of Student:</label>
                    <input type="text" id="studName" name="studName" >

                    <label for="grsect">Grade and Section:</label>
                    <input type="text" id="grdSec" name="grdSec" >

                    <label for="date">Payment Date:</label>
                    <input type="date" id="date" name="date">
					-->
					
                    <label for="amount">Amount:</label>
                    <input type="text" id="amount" name="amount" required>
                    
                    
                    <button type="submit">Submit Payment</button>                  
                </form>                  
            </div>
			
						
			
						
						
			
            <div id="user-accounts" class="page">
                <h2>User Accounts</h2>
                <form method="post" action="admin.php">
                    <label for="studentNumber">Student Number:</label>
                    <input type="text" id="studentNumber" name="studentNumber" required>

                    <label for="studentName">Name of Student:</label>
                    <input type="text" id="studentName" name="studentName" required>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Create Account</button>
                </form>
            </div>
        </div>
        <form>
            <span class="logout" id="logout">Sign Out</span>  
        </form>  
    </div>
    <script>
        function showDashboard() {
            hideAllPages();
            document.getElementById('dashboard').classList.add('active');
        }

        function showStudents() {
            hideAllPages();
            document.getElementById('students').classList.add('active');
        }

        function showPayment() {
            hideAllPages();
            document.getElementById('payment').classList.add('active');
        }

        function showUserAccounts() {
            hideAllPages();
            document.getElementById('user-accounts').classList.add('active');
        }

        function hideAllPages() {
            const pages = document.querySelectorAll('.page');
            pages.forEach(page => {
                page.classList.remove('active');
            });
        }

        document.getElementById("logout").addEventListener("click", function() {
            window.location.href = "login.php"; 
        });
    </script>
</body>
</html>






?>
