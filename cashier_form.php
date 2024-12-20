<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier |Science Technology Institute</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #2a2185;
            margin: 0;
            padding: 0;
        }

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
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar h1 {
            margin-bottom: 20px;
            color: white;
            font-size: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
            color: white;
            cursor: pointer;
            font-size: 20px;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .sidebar ul li:hover {
            background-color: #3c2f9b;
        }

        .sidebar ul li.active {
            background-color: #3c2f9b;
            border-left: 4px solid #fff;
        }

        /* Content styles */
        .content {
            flex: 1;
            padding: 20px;
            position: relative;
        }

        .page {
            display: none;
        }

        .page.active {
            display: block;
        }

        /* Form styles */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #2a2185;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #2a2185;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus {
            border-color: #3c2f9b;
			
        }

        button {
            background-color: #3c2f9b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            
        }

        button:hover {
            background-color: #5243b4;
        }

        /* Table styles */
        table {
            
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Other styles */
        .rounded-box {
            border-radius: 10px;
            background-color: white;
            padding: 20px;
            width: 1000px;
            margin: 30px auto 0;
            overflow: hidden; /* Clear float */
        }

        .student-count {
            font-size: 18px;
            color: black;
            margin-top: 10px;
        }

        

        /* Header styles */
        header {
            background-color: blue;
            color: white;
            padding: 10px;
            text-align: center;
            height: 30px;
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
            color: white;
            float: right;
        }

        .hidden {
            display: none;
        }
		
		#cashier_form{
			float: left;
			width: 50%;"
		}
		
		#breakdown{
			float: right;
			width: 50%;"
            font-size: 15px;
            
            
		}
		
		#tuiBreak{
			color: blue;
            font-size: 20px;
		}


        .link{

        
            text-decoration: none;
            padding: 10px;
            background-color:royalblue;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;


        }

        .Grade {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        margin-right: 10px;
    }

    /* Optional: Pwedeng idagdag ang iba't ibang estilo para sa hover o focus */
    .Grade:hover,
    .Grade:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }

    #tableContainer {
        max-height: 300px; /* Set the desired height for the scrollable div */
        overflow-y: auto; /* Enable vertical scroll */
    }
    


    </style>
</head>
<body>

 
    <div class="container">

             

        <div class="sidebar">
        <image class = "logo" src = "favicon_scitech.png" width = "30" height = "30" >Cashier</image> 
            
            <ul>

                <li onclick = "showDashboard()">Dashboard</li>
                <li onclick="showBalances()">Balances</li>
                <li onclick="showPayment()">Payments</li>
                
            </ul>
            <form>
               
                <span class="logout" id="logout" onclick="logout()">Sign Out</span>
             
            </form>
        </div>
        <div class="content">


            <div id = "dashboard"  id="tableContainer" class = "page active">

                <h2>Welcome Cashier</h2>
                <h1>Dashboard</h1>

                <div class="notification">
               

                <div class="rounded-box" onclick="toggleTable()">
          

                
               
                 <button onclick="reloadTable()">Refresh</button>

                <a class = "link" href="download_payments.php" >Download Table</a>
                <select class = "Grade" id = "Grade" name = "grade_level" onchange = "filterGrade()">
                        <option value="All">All</option>
                        <option  value="Grade 7">Grade 7</option>
                        <option  value="Grade 8">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>    
                </select>
                     <h1 class="student-count">Payments</h1>

                     <?php
    
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "sci_tech";

                 $conn = new mysqli($servername, $username, $password, $dbname);

                 if ($conn->connect_error) {
                     die("Connection failed: " . $conn->connect_error);
                }

                $search = isset($_GET['search']) ? $_GET['search'] : '';

            

                 $sql = "SELECT * FROM receive_payment WHERE last_name LIKE '%$search%' OR first_name LIKE '%$search%' ORDER BY Tran_num DESC";
                 $result = $conn->query($sql);
 

                 if ($result === false) {
                die("Error executing the query: " . $conn->error);
                 }
                 
                    echo "<table border='1'>
                     <tr>
                        <th>Transaction No.</th>
                        <th>OR Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Grade Level</th>
                        <th>Amount</th>
                        <th>Date of Payment</th>
                        </tr>";

                      while ($row = $result->fetch_assoc()) {
                        
                        echo "<tr>
                         <td>" . $row['Tran_num'] . "</td>
                         <td>" . $row['OR_Num'] . "</td>
                         <td>" . $row['last_name'] . "</td>
                         <td>" . $row['first_name'] . "</td>
                         <td>" . $row['grade_level'] . "</td>
                         <td>" . $row['paid_amount'] . "</td>
                         <td>" . $row['date'] . "</td>
                        </tr>";
                 }

                    echo "</table>";

                    $conn->close();
                  ?>

                    
                 </div>
                 
            </div>


    </div>
    <div id="balances" class="page">
    <h2>Student Fees</h2>
    <form action="cashier_form.php" method="GET">
        
      
        <button type="button" onclick="balance()">Refresh</button>
        <label for="name">Name:</label>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sci_tech";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $search1 = isset($_GET['search1']) ? $_GET['search1'] : '';
    }

    $sql = "SELECT * FROM student_balance WHERE Student_num LIKE '%$search1%'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    echo "<p> $search</p>";

    // Display the results in a table
    echo "<table border='1'>
            <tr>
                <th>Student Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Current Balance</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['Student_num'] . "</td>
                <td>" . $row['studLname'] . "</td>
                <td>" . $row['studFname'] . "</td>
                <td>" . $row['Current_balance'] . "</td>
            </tr>";
    }

    echo "</table>";

    $conn->close();
    ?>
</div>


            <div id="payment" class="page">
                <h2>Payment</h2>
            
                <button id="toggleForm">New Payment</button>
                
                <form  id="paymentForm" action="subtract_balance.php" class = "hidden" method="post">
					
					<div id="cashier_form">
						<label for = "stud_info">Search Student:</label>
						<input type = "text" id = "stud_info" name = "stud_info">

						<input type="hidden" id="payment_id" name="OR_Num" readonly>
						<script>
							
						function generateRandomNumber() {
							
						
							var randomNumber = Math.floor(100000 + Math.random() * 900000);
							
							
							document.getElementById('payment_id').value = randomNumber;
						}

						generateRandomNumber();
						</script>

						
						<button type = "button" onclick = "searchUser()">Search</button>

						<label for="name" ></label>
						<input type="text" id="tran_no" name="Tran_num" hidden>

						<?php


						$db_host = 'localhost';
						$db_user = 'root';
						$db_pass = '';
						$db_name = 'sci_tech';

						$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						
						$sql = "SELECT COUNT(*) AS Tran_num FROM receive_payment";
						$result = $conn->query($sql);
								   
						?>
                        <label for = "Stud_number">Student Number</label>
						<input type = "text" id = "Stud_number" name = "Stud_number">

						<label for="lname">Last Name</label>
						<input type="text" id="lname" name="lname">

						<label for="fname">First Name</label>
						<input type="text" id="fname" name="fname">

						<label for="gradelevel">Grade Level</label>
						<input type="text" id="grade_level" name="grade_level" >

						<label for="pay_type">Payment Type</label>
						<input type="text" id="pay_type" name="pay_type" >

						<label for="Current_balance">Current Balance</label>
						<input type="text" id="Current_balance" name="Current_balance">

			
						<label for="paid_amount">Amount</label>
						<input type="text" id="paid_amount" name="paid_amount" >

						<label for="paymentdate">Payment Date:</label>
						<input type="date" id="date" name="date" value="<?php echo date("Y-m-d"); ?>" >

						<button type="submit">Submit Payment</button>
					</div>
					
					<div id="breakdown">
						<!--wait kalma --->
						<h3 id="tuiBreak">Tuition Breakdown</h3>
						<table border = "1">
                      <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        </tr>
                        <tr>
                        <td>Tuition Fee</td>
                        <td id="tuiFee" name="tuiFee"></td>
                        </tr>
                        <tr>
                        <td>Miscellaneous Fee</td>
                        <td id="tuiMisc" name="tuiMisc"></td>
                        </tr>
                        <tr>
                        <td>Other Fee</td>
                        <td id="tuiOther" name="tuiOther"></td>
                        </tr>
                        <tr>
                        <td>Total</td>
                        <td id="tuiTotal" name="tuiTotal"></td>
                        </tr>
                        <tr>
                        <td>Upon Enrollment</td>
                        <td id="tuiUpon" name="tuiUpon"></td>
                        </tr>
                        <tr>
                        <td>2nd Payment</td>
                        <td id="tui2nd" name="tui2nd"></td>
                        </tr>
                        <tr>
                        <td>3rd Payment</td>
                        <td id="tui3rd" name="tui3rd"></td>
                        </tr>
                        <tr>
                        <td>4th Payment</td>
                        <td id="tui4th" name="tui4th"></td>
                        </tr>
                        <tr>
                       <td>5th Payment</td>
                      <td id="tui5th" name="tui5th"></td>
                    </tr>
                    <tr>
                      <td>6th Payment</td>
                 <td id="tui6th" name="tui6th"></td>
                </tr>
                <tr>
                    <td>7th Payment</td>
                <td id="tui7th" name="tui7th"></td>
                    </tr>
                <tr>
                <td>8th Payment</td>
                    <td id="tui8th" name="tui8th"></td>
                </tr>
                <td>9th Payment</td>
                    <td id="tui9th" name="tui9th"></td>
                </tr>
                </table>

					</div>
            </form>
                    
            
                   
                 
                 </div>

              
                 
            </div>
            
        </div>
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

        function showBalances() {
            hideAllPages();
            document.getElementById('balances').classList.add('active');
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

        function logout() {
            window.location.href = "login.php";
        }

        document.getElementById('toggleForm').addEventListener('click', function () {
            var form = document.getElementById('paymentForm');
            form.classList.toggle('hidden');
        });


        function reloadTable() {

            location.reload();
        }


        function balance() {

        location.reload('balances');
        }


        
    </script>

    <script>

        function searchUser() {
            var stud_info = document.getElementById('stud_info').value;

            // Perform an asynchronous request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'searchStud.php?stud_info=' + encodeURIComponent(stud_info), true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var userData = JSON.parse(xhr.responseText);

                    // Update the first name and last name fields
                    document.getElementById('Stud_number').value = userData.studID;
                    document.getElementById('lname').value = userData.studLast;
                    document.getElementById('fname').value = userData.studFirst;
                    document.getElementById('grade_level').value = userData.studLevel;
                    document.getElementById('pay_type').value = userData.studPayType;
                    document.getElementById('Current_balance').value = userData.Current_balance;

                    if(document.getElementById('pay_type').value == 'Cash'){

                    document.getElementById('tuiFee').innerHTML = '=&nbsp;&nbsp;' + userData.tui_fee;
					document.getElementById('tuiMisc').innerHTML = '=&nbsp;&nbsp;' + userData.tui_misc;
					document.getElementById('tuiOther').innerHTML = '=&nbsp;&nbsp;' + userData.tui_other;
					document.getElementById('tuiTotal').innerHTML = '=&nbsp;&nbsp;' + userData.tui_total;

                    }
                    else if(document.getElementById('pay_type').value == 'Bi-Annual'){

                    document.getElementById('tuiFee').innerHTML = '=&nbsp;&nbsp;' + userData.tui_fee;
					document.getElementById('tuiMisc').innerHTML = '=&nbsp;&nbsp;' + userData.tui_misc;
					document.getElementById('tuiOther').innerHTML = '=&nbsp;&nbsp;' + userData.tui_other;
                    document.getElementById('tuiTotal').innerHTML = '=&nbsp;&nbsp;' + userData.tui_total;
                    document.getElementById('tuiUpon').innerHTML = '=&nbsp;&nbsp;' + userData.tui_upon;
					document.getElementById('tui2nd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_2nd;


                    }

                    else if(document.getElementById('pay_type').value == 'Quarterly'){
                    
                    document.getElementById('tuiFee').innerHTML = '=&nbsp;&nbsp;' + userData.tui_fee;
					document.getElementById('tuiMisc').innerHTML = '=&nbsp;&nbsp;' + userData.tui_misc;
					document.getElementById('tuiOther').innerHTML = '=&nbsp;&nbsp;' + userData.tui_other;
					document.getElementById('tuiTotal').innerHTML = '=&nbsp;&nbsp;' + userData.tui_total;
                    document.getElementById('tuiUpon').innerHTML = '=&nbsp;&nbsp;' + userData.tui_upon;
					document.getElementById('tui2nd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_2nd;
					document.getElementById('tuiUpon').innerHTML = '=&nbsp;&nbsp;' + userData.tui_upon;
					document.getElementById('tui2nd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_2nd;
					document.getElementById('tui3rd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_3rd;
					document.getElementById('tui4th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_4th;

                    }else if(document.getElementById('pay_type').value == 'Monthly'){

                    
                    document.getElementById('tuiFee').innerHTML = '=&nbsp;&nbsp;' + userData.tui_fee;
					document.getElementById('tuiMisc').innerHTML = '=&nbsp;&nbsp;' + userData.tui_misc;
					document.getElementById('tuiOther').innerHTML = '=&nbsp;&nbsp;' + userData.tui_other;
					document.getElementById('tuiTotal').innerHTML = '=&nbsp;&nbsp;' + userData.tui_total;
                    document.getElementById('tuiUpon').innerHTML = '=&nbsp;&nbsp;' + userData.tui_upon;
					document.getElementById('tui2nd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_2nd;
					document.getElementById('tui2nd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_2nd;
					document.getElementById('tui3rd').innerHTML = '=&nbsp;&nbsp;' + userData.tui_3rd;
					document.getElementById('tui4th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_4th;
					document.getElementById('tui5th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_5th;
					document.getElementById('tui6th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_6th;
					document.getElementById('tui7th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_7th;
					document.getElementById('tui8th').innerHTML = '=&nbsp;&nbsp;' + userData.tui_8th;
                    document.getElementById('tui9th').innerHTML = '=&nbsp;&nbsp;' + userData.tuit_9th;

                    }
                 

               
                } else {
                    console.error('Error:', xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.error('Network error');
            };

            xhr.send();
            
        }

        function toggleTable() {
        var table = document.getElementById("payment-table");
        if (table.style.display === "none") {
            table.style.display = "table";
        } else {
            table.style.display = "none";
        }
    }



    function filterGrade() {
            var selectedGrade = document.getElementById("Grade").value;
            var rows = document.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) {
                var gradeColumn = rows[i].getElementsByTagName("td")[4];
                if (gradeColumn) {
                    var gradeValue = gradeColumn.textContent || gradeColumn.innerText;

                    if (gradeValue === selectedGrade || selectedGrade === "All") {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }


    </script>


</body>
</html>

<?php




?>
