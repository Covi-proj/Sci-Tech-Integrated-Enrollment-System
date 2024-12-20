<?php
session_start();
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sci_tech';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlCountUsers = "SELECT COUNT(*) as total FROM tbl_stud_enroll";
$result = $conn->query($sqlCountUsers);
$row = $result->fetch_assoc();
$totalUsers = $row['total'];

// Increment the user number based on the total number of users
$userNumber = str_pad($totalUsers + 1, 4, '0', STR_PAD_LEFT);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar | School Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
    

        /* Container for the sidebar and content */
        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            position: relative;
            width: 250px;
            background-color: #2a2185;
            color: white;
            padding: 20px;
            z-index: 1;
            margin-right: 20px; /* Adjust this value as needed */
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
            z-index: 0;
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
            width: 40%;
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
        .user-accounts{
             text-align: left;
        }

#notification-icon {
    cursor: pointer;
    float: right;
    margin-top: 20px;
    margin-right: 60px;
    font-size: 20px;
}

#notification-count {
    position: absolute;
    top: 10;
    right: 0;
    background-color: red;
    color: white;
    padding: 4px 8px;
    border-radius: 50%;
    margin-right: 15px;
    
}

#notification-dropdown {
    display: none;
    position: fixed;
    top: 100px; /* Adjust the top value based on your header height and preference */
    right: 10px;
    width: 300px; /* Adjust the width as needed */
    max-height: 300px; /* Set a maximum height for the dropdown */
    overflow-y: auto; /* Add a scrollbar when content overflows */
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    z-index: 1;
    padding: 10px;
    color: black;
}

.notification-item {
    padding: 8px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    transition: background-color 0.3s;
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-item:hover {
    background-color: #f5f5f5;
}

#notif {
    float: right;
    position: absolute;
    
}

.click {
    
        text-decoration: none;
        color: #333;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.3s;
        display: inline-block;
    }

    .click:hover {
        background-color: #f0f0f0;
    }

    table {
      width: 400px;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
      
      
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
	
    #enroll_form{
			float: left;
			width: 50%;"
		}
		
		#breakdown{
			float: left;
			width: 50%;"
		}
        .scrollable-table {
        max-height: 300px;
        overflow-y: auto;
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

    .welcome{

        font-weight: bold;
        font-size: 30px;
        margin-bottom: 10px;

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

    .select{
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        height: 30px;
        width: 150px;
        
    }





    </style>


</head>
<body>
    <div class="container">
        <div class="sidebar">
            <image class = "logo" src = "favicon_scitech.png" width = "30" height = "30" >Student Management</image> 
            <h1>REGISTRAR</h1>
            <ul>
                <li onclick="showDashboard()">Dashboard</li>
				<br>
                <li onclick="showEnrollment()">Enrollment</li>
                <br>
				<li onclick="showStudUpdate()">Update/Delete Student</li>
				<br>
				<li onclick="showTuitionAdd()">Manage Tuition</li>
				<br>
                <br>
				<br>
				<li onclick="showSubjectAdd()">Manage Subject</li>
                <br>
                <li onclick="showSetAY()">Set Academic Year</li>
                <br>
               
                <br>
                <li onclick="showUserAccounts()">Users Accounts</li>
            </ul>
            <form>
                <span class="logout" id="logout" onclick="logout()">Sign Out</span>
            </form>
        </div>
            
        <div class="content">
            <div id="dashboard" class="page active" onclick="toggleTable()">
                
                    <div class = "welcome">Welcome Registrar</div>


               
                    <select class="Grade" id="Grade" name="studLevel" onchange="filterGrade()">
                    <option value="All">All</option>
                    <option value="Grade 7">Grade 7</option>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                    <option value="Grade 10">Grade 10</option>
                    </select>
    
                    <?php
                        
                        function getNotificationsFromDatabase()
                        {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "sci_tech";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $sql = "SELECT Pre_register_num , Last_Name, First_Name FROM tbl_registration_new";
                            $result = $conn->query($sql);

                            $notifications = array();

                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            $notifications[] = array(
                            'pre_register_num' => $row['Pre_register_num'],
                            'Last_Name' => $row['Last_Name'],
                            'First_Name' => $row['First_Name'],
                            
                                    );
                                }
                            }
                            

                            $conn->close();

                            return $notifications;

                                }

                                
                                $notifications = getNotificationsFromDatabase();
                                ?>
                                

                                    <div id="notification-icon" onclick="showNotifications()">
                                        <span id="notification-count"><?php echo count($notifications); ?></span>
                                        <p>🔔 Notifications</p>
                                    </div>

                                    <div id="notification-dropdown" style="display: none;">
                                        <?php
                                        
                                            usort($notifications, function ($a, $b) {
                                            return $b['pre_register_num'] - $a['pre_register_num'];
                                            });

                                            
                                            $displayedNotifications = array_slice($notifications, 0, 5);

                                            foreach ($displayedNotifications as $notification):
                                        ?>
                                       
                                        <a class="click" href="view_info.php?Pre_register_num=<?php echo $notification['pre_register_num']; ?>" method="post"> 
                                            <div class="notification-item">
                                                <strong>New recently registered</strong> <?php echo $notification['pre_register_num']; ?><br>
                                                <strong>Last Name:</strong> <?php echo $notification['Last_Name']; ?><br>
                                                <strong>First Name:</strong> <?php echo $notification['First_Name']; ?><br>
                                            </div>
                                        </a>
                                        
                                        <?php endforeach; ?>
                                    </div>

                    <?php
    
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "sci_tech";

                 $conn = new mysqli($servername, $username, $password, $dbname);

                 if ($conn->connect_error) {
                     die("Connection failed: " . $conn->connect_error);
                }

                 $sql = "SELECT * FROM tbl_stud_enroll  ORDER BY studID DESC";
                 $result = $conn->query($sql);

                 if ($result === false) {
                die("Error executing the query: " . $conn->error);
                 }
                 
                 echo '<a class = "link" href="download.php" >Download Table</a>';
                    echo "<table border='1' class = 'scroll'>
                     <tr>
                        <th>Student Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Birthdate</th>
                        <th>Grade Level</th>
                        <th>Parent Guardian</th>
                        <th>Address</th>
                        <th>School Year</th>
                        <th>Payment Type</th>
                        <th>Registration Status</th>
                        <th>Date of Enrollment</th>
                        <th>PSA-Certificate</th>
                        <th>Form 138 </th>
                        <th>Form 137 </th>
                        <th>Certificate of Good Moral</th>
                        </tr>";
                    
                      while ($row = $result->fetch_assoc()) {
                        
                        echo "<tr>
                         <td>" . $row['studID'] . "</td>
                         <td>" . $row['studLast'] . "</td>
                         <td>" . $row['studFirst'] . "</td>
                         <td>" . $row['StudMiddle'] . "</td>
                         <td>" . $row['studDate'] . "</td>
                         <td>" . $row['studLevel'] . "</td>
                         <td>" . $row['parent_guardian'] . "</td>
                         <td>" . $row['address'] . "</td>
                         <td>" . $row['studSY'] . "</td>
                         <td>" . $row['studPayType'] . "</td>
                         <td>" . $row['studStatus'] . "</td>
                         <td>" . $row['regDate'] . "</td>
                         <td>" . $row['psa'] . "</td>
                         <td>" . $row['form138'] . "</td>
                         <td>" . $row['form137'] . "</td>
                         <td>" . $row['gmc'] . "</td>
                        </tr>";
                 }

                    echo "</table>";

                    $conn->close();
                  ?>

            </div>
        
                    <div id="enrollment" class="page">
						<h2>Enrollment</h2>
				

						<form action="regEn_Submit.php" method="post">
                            <div id="enroll_form">
                                <label for="userId">Registration Number:</label>
                                <input type="text" id="userId" name="userId">
                                <button type="button" onclick="searchUser()">Search</button>
                                
                                <label for="studnumber">Student Number:</label>
                                <input type="text" id="studNum" name="studNum" value="<?php echo $userNumber ?>" required>

                                <!--Eto ang variable-->
                                <label for="studLRN">LRN:</label>
                                <input type="text" id="studLRN" name="studLRN" required>
                            
                                <label for="studSY">S.Y.:</label>
                                <input type="text" id="studSY" name="studSY" required>

                                <label for="lastName">Last Name:</label>
                                <input type="text" id="studLast" name="studLast"  required>

                                <label for="firstName">First Name:</label>
                                <input type="text" id="studFirst" name="studFirst"  required>
                                
                                <label for="middlename">Middle Name:</label>
                                <input type="text" id="middlename" name="middlename"  required>
                            
                                
                                <label for="birthdate">Birthdate:</label>
                                <input type="text" id="birthdate" name="birthdate"  required>
                                
                                <label for="gradelevel">Grade Level:</label>
                                <input type="text" id="studGrade" name="studGrade"  required>

                                <label for="parent_guardian">Parent Guardian:</label>
                                <input type="text" id="parent" name="parent"  required>

                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address"  required>

                                <label for="paymenttype">Payment Type:</label>
                                <input type="text" id="studPType" name="studPType"  required>
                                
                                <label for="regstatus">Registration Status:</label>
                                <input type="text" id="regstatus" name="regstatus" value="Processing" readonly required><br>
                                
                                <label for = "psa">PSA</label>
                                <a href="dl_psa.php" name = "psa" id = "psa_link" download><p id="psaP"></p></a>
                                <select class ="select" id="psa" name="psa"  required>
                                         <option value = ""></option>
                                        <option value = "Complete">Complete</option>
                                        <option value = "Incomplete">Incomplete</option>

                                </select>
                               
                                
                                <br>
                                <label for = "form137">Form 137</label> 
                                <a href="dl_f137.php" name = "form137" id = "f137_link" ><p id = "f1137"></p></a>
                               <select class ="select" id="fomr137" name="form137"  required>
                                         <option value = ""></option>
                                        <option value = "Complete">Complete</option>
                                        <option value = "Incomplete">Incomplete</option>
                                
                                 </select>  <br>      
                                 <label for = "form138">Form 138</label> 
                                <a href="dl_f138.php" name = "form138" id = "f138_link"><p id = "f1138"></p></a>
                                <select class ="select" id="form138" name="form138"  required>
                                         <option value = ""></option>
                                        <option value = "Complete">Complete</option>
                                        <option value = "Incomplete">Incomplete</option>

                                </select><br>
                                <label for = "gmc">Good Moral Character</label> 
                                <a href="dl_gmc.php" name = "gmc" id = "gmc_link"><p id = "gmc"></p></a>
                              <select class ="select" id="gmc" name="gmc"  required>
                                         <option value = ""></option>
                                        <option value = "Complete">Complete</option>
                                        <option value = "Incomplete">Incomplete</option>

                                </select>
                                
                                <script>
                                       
							        function updatefilehref() {
                                       
                                        var userId = document.getElementById("userId").value;
                                        
                                        document.getElementById("psa_link").href = "dl_psa.php?id=" + userId;
                                        document.getElementById("f137_link").href = "dl_f137.php?id=" + userId;
                                        document.getElementById("f138_link").href = "dl_f138.php?id=" + userId;
                                        document.getElementById("gmc_link").href = "dl_gmc.php?id=" + userId;
                                    }

                                    document.getElementById("userId").onchange = updatefilehref;

                                   
                                    updatefilehref();

                                </script>
                                <label for="reg_date">Registration Date:</label>
                                <input type="date" id="reg_date" name="reg_date" value="<?php echo date("Y-m-d")?>" readonly required>

                       
                                <button type="submit">Submit</button>
                            </div>
                            <div id="breakdown">
                                <h3 id="tuiBreak">Tuition Breakdown</h3>
                                <table border="1">
                             <tr>
                            <th>Description</th>
                        <th>Amount</th>
                        </tr>
                    <tr>
                       <td>Tuition Fee</td>
                         <td id="en_tuiFee" name="en_tuiFee"></td>
                        </tr>
                         <tr>
                      <td>Miscellaneous Fee</td>
                         <td id="en_tuiMisc" name="en_tuiMisc"></td>
                    </tr>
                 <tr>
                     <td>Socio Fee</td>
                     <td id="en_tuiSocio" name="en_tuiSocio"></td>
                </tr>
                 <tr>
                     <td>Other Fee</td>
                     <td id="en_tuiOther" name="en_tuiOther"></td>
                 </tr>
                 <tr>
                  <td>Total</td>
                  <td id="en_tuiTotal" name="en_tuiTotal"></td>
                    </tr>
                 <tr>
                    <td>Upon Enrollment</td>
                    <td id="en_tuiUpon" name="en_tuiUpon"></td>
                </tr>
                 <tr>
                  <td>2nd Payment</td>
                <td id="en_tui2nd" name="en_tui2nd"></td>
                </tr>
                    <tr>
                    <td>3rd Payment</td>
                        <td id="en_tui3rd" name="en_tui3rd"></td>
                 </tr>
                     <tr>
                    <td>4th Payment</td>
                    <td id="en_tui4th" name="en_tui4th"></td>
                 </tr>
              <tr>
               <td>5th Payment</td>
                 <td id="en_tui5th" name="en_tui5th"></td>
                 </tr>
                 <tr>
              <td>6th Payment</td>
                    <td id="en_tui6th" name="en_tui6th"></td>
                </tr>
                 <tr>
                    <td>7th Payment</td>
                 <td id="en_tui7th" name="en_tui7th"></td>
                </tr>
                <tr>
              <td>8th Payment</td>
                <td id="en_tui8th" name="en_tui8th"></td>
              </tr>
             <tr>
                <td>9th Payment</td>
                <td id="en_tui9th" name="en_tui9th"></td>
            </tr>
                </table>

                            </div>
						                  
						</form>
						<script src="regFill.js"></script>
                        <!--Eto ang variable-->
                    </div>
				<div id="studUpdate" class="page">
					<h2>Update/Delete Student Information</h2>
				

					<form id="upstud" action="up_studSubmit.php" method="post">
				   
						<label for="sup_userId">Student Number:</label>
                        <input type="text" id="sup_userId" name="sup_userId" required>
                        <button type="button" onclick="up_searchUser()">Search</button>
						
						<label for="sup_studnum">Student Number:</label>
						<input type="text" id="sup_studnum" name="sup_studnum" >

						<label for="sup_lastName">Last Name:</label>
						<input type="text" id="sup_lastName" name="sup_lastName"  >

						<label for="sup_firstName">First Name:</label>
						<input type="text" id="sup_firstName" name="sup_firstName"  >
						
						<label for="sup_middlename">Middle Name:</label>
						<input type="text" id="sup_middlename" name="sup_middlename"  >
						
						<label for="sup_bdate">Birthdate:</label>
						<input type="text" id="sup_bdate" name="sup_bdate"  >
						
						<label for="sup_grade">Grade Level:</label>
						<input type="text" id="sup_grade" name="sup_grade"  >

                        <label for="sup_parent_guardian">Parent Guardian:</label>
                        <input type="text" id="sup_parent_guardian" name="sup_parent_guardian"  required>

                        <label for="sup_address">Address:</label>
                        <input type="text" id="sup_address" name="sup_address"  required>

						<label for="sup_ptype">Payment Type:</label>
						<input type="text" id="sup_ptype" name="sup_ptype" >

                        <label for="sup_psa">PSA</label> 
                        <select class = "select" id="sup_psa" name="sup_psa" required>
                            <option value = "Complete">Complete</option>
                            <option value = "Incomplete">Incomplete</option>
                        </select>

                        <label for="sup_form138">Form 138</label>
                        <select class ="select" id="sup_form138" name="sup_form138"  required>
                            <option value = "Complete">Complete</option>
                            <option value = "Incomplete">Incomplete</option>
                        </select>

                        <label for="sup_form137">Form 137</label>
                        <select class ="select" id="sup_form137" name="sup_form137"  required>
                            <option value = "Complete">Complete</option>
                            <option value = "Incomplete">Incomplete</option>

                        </select>

                        <label for="sup_gmc">Certificate of Good Moral Character</label>
                        <select class ="select" id="sup_gmc" name="sup_gmc"  required>            
                            <option value = "Complete">Complete</option>
                            <option value = "Incomplete">Incomplete</option>

                        </select>        

						<label for="sup_reg_date">Registration Date:</label>
						<input type="date" id="sup_reg_date" name="sup_reg_date" >
						<br>
						<input type="submit" value="Update"/>
						<input type="button" onclick="submitForm('del_studSubmit.php')" value="Delete"/>
					</form>
					<script src="up_studFill.js"></script>
				</div>
			
			<div id="studDelete" class="page">
                <h2>Delete Student Record</h2>
            
				<div>
					<form action="del_studSubmit.php" method="post">
				   
						<label for="sdel_userId">Student Number:</label>
						<input type="text" id="sdel_userId" name="sdel_userId" required>
						<button type="button" onclick="del_searchUser()">Search</button>
						
						<label for="sdel_studnum">Student Number:</label>
						<input type="text" id="sdel_studnum" name="sdel_studnum" readonly required>

						<label for="sdel_lastName">Last Name:</label>
						<input type="text" id="sdel_lastName" name="sdel_lastName"  readonly required>

						<label for="sdel_firstName">First Name:</label>
						<input type="text" id="sdel_firstName" name="sdel_firstName"  readonly required>
						
						<label for="sdel_middlename">Middle Name:</label>
						<input type="text" id="sdel_middlename" name="sdel_middlename"  readonly required>
						
						<label for="sdel_suffix">Suffix:</label>
						<input type="text" id="sdel_suffix" name="sdel_suffix"  readonly required>
						
						<label for="sdel_gender">Gender:</label>
						<input type="text" id="sdel_gender" name="sdel_gender"  readonly required>
						
						<label for="sdel_bdate">Birthdate:</label>
						<input type="text" id="sdel_bdate" name="sdel_bdate"  readonly required>
						
						<label for="sdel_grade">Grade Level:</label>
						<input type="text" id="sdel_grade" name="sdel_grade"  readonly required>

						<label for="sdel_ptype">Payment Type:</label>
						<input type="text" id="sdel_ptype" name="sdel_ptype" readonly required>

						<label for="sdel_reg_date">Registration Date:</label>
						<input type="text" id="sdel_reg_date" name="sdel_reg_date" readonly required>
						<br>
						<button type="submit">Delete</button>
					</form>
					<script src="del_studFill.js"></script>
				</div>
			
			
			</div>
			
			<div id="tuitionAdd" class="page">
                <h2>Manage Tuition</h2>
            

                <form id="manTui" action="add_tuiSubmit.php" method="post">
               
                    <label for="tuitionID">Tuition ID:</label>
					<input type="text" id="tuitionID" name="tuitionID" placeholder="For Update and Delete...">
					<button type="button" onclick="upTui_searchUser()">Search</button>
					
					<label for="tuiID">Tuition ID:</label>
					<input type="text" id="tuiID" name="tuiID" placeholder="Adding starts here..." required>
					
					<label for="tuiGrade">Grade Level:</label>
                    <select type="text" id="tuiGrade" name="tuiGrade" required>
                        <option value = "Grade 7">Grade 7</option>
                        <option value = "Grade 8">Grade 8</option>
                        <option value = "Grade 9">Grade 9</option>
                        <option value = "Grade 10">Grade 10</option>
                    </select>

					<label for="tuiPType">Payment Type:</label>
                    <select type="text" id="tuiPType" name="tuiPType" required>
                        <option value = "Cash">Cash</option>
                        <option value = "Bi-Annual">Bi-Annual</option>
                        <option value = "Quarterly">Quarterly</option>
                        <option value = "Monthly">Monthly</option>
                    </select>

					<label for="tuiFee">Tuition Fee:</label>
					<input type="text" id="tuiFee" name="tuiFee" oninput="calculateTuiTotal()" required>
					
					<label for="tuiMisc">Miscellaneous Fees:</label>
					<input type="text" id="tuiMisc" name="tuiMisc" oninput="calculateTuiTotal()" required>

                    <label for="tuiSocio">Socio-cultural Fees:</label>
					<input type="text" id="tuiSocio" name="tuiSocio" oninput="calculateTuiTotal()" required>
					
					<label for="tuiOther">Other Fees:</label>
					<input type="text" id="tuiOther" name="tuiOther" oninput="calculateTuiTotal()" required>
					
					<label for="tuiTotal">Total:</label>
					<input type="text" id="tuiTotal" name="tuiTotal"  required>
					
					<label for="tuiUpon">Upon Enrollment:</label>
					<input type="text" id="tuiUpon" name="tuiUpon"  required>
					
					<label for="tui2nd">2nd Payment:</label>
					<input type="text" id="tui2nd" name="tui2nd"  required>

					<label for="tui3rd">3rd Payment:</label>
					<input type="text" id="tui3rd" name="tui3rd" required>

                    <label for="tui4th">4th Payment:</label>
                    <input type="text" id="tui4th" name="tui4th"  required>
					
					<label for="tui5th">5th Payment:</label>
                    <input type="text" id="tui5th" name="tui5th"  required>
					
					<label for="tui6th">6th Payment:</label>
                    <input type="text" id="tui6th" name="tui6th"  required>
					
					<label for="tui7th">7th Payment:</label>
                    <input type="text" id="tui7th" name="tui7th"  required>
					
					<label for="tui8th">8th Payment:</label>
                    <input type="text" id="tui8th" name="tui8th"  required>

                    <label for="tui9th">9th Payment:</label>
                    <input type="text" id="tui9th" name="tui9th"  required>
					
					<br>
					<input type="submit" value="Add"/>
					<input type="button" onclick="submit_manTui('up_tuiSubmit.php')" value="Update"/>
					<input type="button" onclick="submit_manTui('del_tuiSubmit.php')" value="Delete"/>

                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sci_tech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_tuition";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "<table border='1'>
    <tr>
        <th>Tuition ID</th>
        <th>Grade Level</th>
        <th>Payment Type</th>
        <th>Tuition Fee</th>
        <th>Miscellaneous Fee</th>
        <th>Socio and Cultural Fees</th>
        <th>Other Fees</th>
        <th>Total</th>
        <th>Upon Enrollment</th>
        <th>2nd Payment</th>
        <th>3rd Payment</th>
        <th>4th Payment</th>
        <th>5th Payment</th>
        <th>6th Payment</th>
        <th>7th Payment</th>
        <th>8th Payment</th>
        <th>9th Payment</th>
    </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>" . $row['tui_ID'] . "</td>
        <td>" . $row['tui_grade'] . "</td>
        <td>" . $row['tui_ptype'] . "</td>
        <td>" . $row['tui_fee'] . "</td>
        <td>" . $row['tui_misc'] . "</td>
        <td>" . $row['socio'] . "</td>
        <td>" . $row['tui_other'] . "</td>
        <td>" . $row['tui_total'] . "</td>
        <td>" . $row['tui_upon'] . "</td>
        <td>" . $row['tui_2nd'] . "</td>
        <td>" . $row['tui_3rd'] . "</td>
        <td>" . $row['tui_4th'] . "</td>
        <td>" . $row['tui_5th'] . "</td>
        <td>" . $row['tui_6th'] . "</td>
        <td>" . $row['tui_7th'] . "</td>
        <td>" . $row['tui_8th'] . "</td>
        <td>" . $row['tuit_9th'] . "</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>


                </form>
				<script src="up_tuiFill.js"></script>
            </div>
			
			<div id="facultyAdd" class="page">
                <h2>Manage Faculty</h2>
            

                <form id="manFac" action="add_facSubmit.php" method="post">
				
					<label for="facultyID">Faculty ID:</label>
					<input type="text" id="facultyID" name="facultyID" placeholder="For Update and Delete...">
					<button type="button" onclick="upFac_searchUser()">Search</button>
               
                    <label for="facID">Faculty ID:</label>
					<input type="text" id="facID" name="facID" placeholder="Adding starts here..." required>
					
					<label for="facName">Fullname:</label>
					<input type="text" id="facName" name="facName" required>

					<label for="facPosition">Position:</label>
					<input type="text" id="facPosition" name="facPosition"  required>
					
					<br>
					<input type="submit" value="Add"/>
					<input type="button" onclick="submit_manFac('up_facSubmit.php')" value="Update"/>
					<input type="button" onclick="submit_manFac('del_facSubmit.php')" value="Delete"/>
                </form>
				<script src="up_facFill.js"></script>
            </div>
					
			<!--SUBJECTS WAG KA MALITO!-->

            
			<div id="subjectAdd" class="page">
                <h2>Manage Subject</h2>
            

                <form id="manSubj" action="add_subjSubmit.php" method="post">
				
					<label for="subjectID">Subject ID:</label>
					<input type="text" id="subjectID" name="subjectID" placeholder="For Update and Delete...">
					<button type="button" onclick="upSubj_searchUser()">Search</button>
               
                    <label for="subjID">Subject ID:</label>
					<input type="text" id="subjID" name="subjID" placeholder="Adding starts here..." required>
					
					<label for="subjName">Subject Name:</label>
					<input type="text" id="subjName" name="subjName" required>

					<label for="subjTime">Subject Time:</label>
					<input type="text" id="subjTime" name="subjTime"  required>
					
					<label for="subjDay">Subject Day:</label>
					<input type="text" id="subjDay" name="subjDay"  required>
					
					<label for="subjProf">Subject Teacher:</label>
					<input type="text" id="subjProf" name="subjProf"  required>
					
					<br>
					<input type="submit" value="Add"/>
					<input type="button" onclick="submit_manSubj('up_subjSubmit.php')" value="Update"/>
					<input type="button" onclick="submit_manSubj('del_subjSubmit.php')" value="Delete"/>
                </form>
				<script src="up_subjFill.js"></script>

                <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sci_tech";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM tbl_subject";
            $result = $conn->query($sql);
            
            if (!$result) {
                die("Query failed: " . $conn->error);
            }


            if (!$result) {
                die("Query failed: " . $conn->error);
            }
            
            echo "<table border='1'>
                <tr>
                    <th>Subject Id</th>
                    <th>Subject Name</th>
                    <th>Subject Grade</th>
                    <th>Subject Time</th>
                    <th>Subject Day</th>
                    <th>Subject Teacher</th>
                </tr>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['subj_ID'] . "</td>
                    <td>" . $row['subj_name'] . "</td>
                    <td>" . $row['subj_grade'] . "</td>
                    <td>" . $row['subj_time'] . "</td>
                    <td>" . $row['subj_day'] . "</td>
                    <td>" . $row['subj_prof'] . "</td>
                </tr>";
            }
            
            echo "</table>";
            
            $conn->close();

            ?>



            </div>
            <!--SET ACADEMIC YEAR-->
            <div id="setAY" class="page">
                <h2>Set Academic Year</h2>
                <form id="manAY" action="set_aySubmit.php" method="POST">
                    <label for="acadYear">Academic Year</label>
                    <input type="text" id="acadYear" name="acadYear" recquired/>
                    <br>
                    <input type="submit" value="Set">
                </form>
            </div>
		
			<div  id="user-accounts" class="page">
				<h2>User Accounts</h2>

				<button class="open-button" onclick="openForm()">New User</button>

				<div class = "form-popup" id = "myForm">

					<form action="admin.php" method="post" class="form-container">

						<label for="user_name">User Name:</label>
						<input type="text" id="user_name" name="Username" required>

						<label for="email">Email:</label>
						<input type="text" id="email" name="Email" required>

						<label for="name">Name:</label>
						<input type="text" id="name" name="name" required>

						<label for="contact">Contact No. :</label>
						<input type="text" id="contact" name="Contact" required>

						<label for="user_pass">Password</label>
						<input type="text" id="user_pass" name="Password" required>

						<label for="account_type">Account Type:</label>
						<select class="acc_type" id="account_type" name="AccountType">
						<option value="Student">Student</option>
						<option value="Cashier">Cashier</option>
						<option value="Admin">Admin</option>
						</select>

						<button type="submit">Create Account</button>
						<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
						
					</form>
				</div>
			</div>
			<div id="balance" class="page">
				<form action="add_balances.php" method="post">
					<h2>Student Balances</h2>

					<label for="studentNumber">Student Number:</label>
					<input type="text" id="studentNumber" name="studentNumber" required>

					<label for="studentName">Student Name:</label>
					<input type="text" id="studentName" name="studentName" required>

					<label for="currentBalance">Current Balance:</label>
					<input type="number" id="currentBalance" name="currentBalance" step="0.01" required>

					<button type="submit">Add Balance</button>
				</form>
			</div>
		</div>
	</div>
        <?php
                    

                    $db_host = 'localhost';
                    $db_user = 'root';
                    $db_pass = '';
                    $db_name = 'sci_tech';

                    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                    if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    
                    }

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        $studentNumber = mysqli_real_escape_string($conn, $_POST['studentNumber']);
                        $studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
                        $currentBalance = mysqli_real_escape_string($conn, $_POST['currentBalance']);

                        // Insert data into the tbl_student_balances table
                        $sqlInsertBalance = "INSERT INTO tbl_student_balances (Student_num, Name, Current_Balance) 
                         VALUES ('$studentNumber', '$studentName', $currentBalance)";

                            if (mysqli_query($conn, $sqlInsertBalance)) {
                             echo "Balance added successfully.";
                            } else {
                          echo "Error: " . $sqlInsertBalance . "<br>" . mysqli_error($conn);
                        }
                    }

                    mysqli_close($conn);
                    
                    ?>

        
	
	<script>
		const d = new Date();
		document.getElementById("demo").innerHTML = d;
	</script>
	
	
    <script>


		function showDashboard() {
            hideAllPages();
            document.getElementById('dashboard').classList.add('active');
        }

        function showEnrollment() {
            hideAllPages();
            document.getElementById('enrollment').classList.add('active');
        }

        function showStudUpdate() {
            hideAllPages();
            document.getElementById('studUpdate').classList.add('active');
        }
		
		function showTuitionAdd() {
            hideAllPages();
            document.getElementById('tuitionAdd').classList.add('active');
        }
		
		function showFacultyAdd() {
            hideAllPages();
            document.getElementById('facultyAdd').classList.add('active');
        }
		
		function showSubjectAdd() {
            hideAllPages();
            document.getElementById('subjectAdd').classList.add('active');
        }


        function showreports() {
            hideAllPages();
            document.getElementById('reports').classList.add('active');
        }

        function showbalance(){
            hideAllPages();
                document.getElementById('balance').classList.add('active');        
        }

        function showSetAY(){
            hideAllPages();
                document.getElementById('setAY').classList.add('active');        
        }


		
		function hideAllPages() {
            const pages = document.querySelectorAll('.page');
            pages.forEach(page => {
                page.classList.remove('active');
            });
        }


        function showUserAccounts() {
            hideAllPages();
            document.getElementById('user-accounts').classList.add('active');
        }

        document.getElementById("logout").addEventListener("click", function() {
            window.location.href = "login.php"; 
        });

        function logout() {
            window.location.href = "login.php";
        }
		
		function submitForm(action) {
			var form = document.getElementById('upstud');
			form.action = action;	
			form.submit();
		}
		
		function submit_manTui(action) {
			var form = document.getElementById('manTui');
			form.action = action;	
			form.submit();
		}
		
		function submit_manFac(action) {
			var form = document.getElementById('manFac');
			form.action = action;	
			form.submit();
		}
		
		function submit_manSubj(action) {
			var form = document.getElementById('manSubj');
			form.action = action;	
			form.submit();
		}


         //notification

         function showNotifications() {
        var dropdown = document.getElementById('notification-dropdown');
        dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';

        document.addEventListener('DOMContentLoaded', function () {
        var notificationItems = document.querySelectorAll('.notification-item');

        notificationItems.forEach(function (item) {
            item.addEventListener('click', function () {
                // Remove the notification from the DOM
                this.remove();
            });
        });
    });
    }

    function filterGrade() {
    var selectedGrade = document.getElementById("Grade").value;
    var rows = document.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) {
        var gradeColumn = rows[i].getElementsByTagName("td")[5]; 

        if (gradeColumn) {
            var gradeValue = gradeColumn.textContent || gradeColumn.innerText;

            if (gradeValue.trim() === selectedGrade || selectedGrade === "All") {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
               
            }
        }
    }
}
    
function calculateTuiTotal() {
    // Get the values from the input fields
    var input1 = document.getElementById('tuiFee').value;
    var input2 = document.getElementById('tuiMisc').value;
    var input3 = document.getElementById('tuiSocio').value;
    var input4 = document.getElementById('tuiOther').value;

    // Convert the values to numbers (assuming they are numeric)
    var num1 = parseFloat(input1) || 0;
    var num2 = parseFloat(input2) || 0;
    var num3 = parseFloat(input3) || 0;
    var num4 = parseFloat(input4) || 0;

    // Calculate the sum
    var sum = num1 + num2 + num3 + num4;
    // Update the result field
    document.getElementById('tuiTotal').value = sum.toFixed(2);
    
    var ptype = document.getElementById('tuiPType').value;
    
    if(ptype == 'Cash'){
        document.getElementById('tuiUpon').value = sum.toFixed(2);
        document.getElementById('tui2nd').value = 0;
        document.getElementById('tui3rd').value = 0;
        document.getElementById('tui4th').value = 0;
        document.getElementById('tui5th').value = 0;
        document.getElementById('tui6th').value = 0;
        document.getElementById('tui7th').value = 0;
        document.getElementById('tui8th').value = 0;
        document.getElementById('tui9th').value = 0;
    }else if(ptype == 'Bi-Annual'){
        var ba_pay = sum / 2;
        document.getElementById('tuiUpon').value = ba_pay.toFixed(2);
        document.getElementById('tui2nd').value = ba_pay.toFixed(2);
        document.getElementById('tui3rd').value = 0;
        document.getElementById('tui4th').value = 0;
        document.getElementById('tui5th').value = 0;
        document.getElementById('tui6th').value = 0;
        document.getElementById('tui7th').value = 0;
        document.getElementById('tui8th').value = 0;
        document.getElementById('tui9th').value = 0;
    }else if(ptype == 'Quarterly'){
        var qa_pay = sum / 4;
        document.getElementById('tuiUpon').value = qa_pay.toFixed(2);
        document.getElementById('tui2nd').value = qa_pay.toFixed(2);
        document.getElementById('tui3rd').value = qa_pay.toFixed(2);
        document.getElementById('tui4th').value = qa_pay.toFixed(2);
        document.getElementById('tui5th').value = 0;
        document.getElementById('tui6th').value = 0;
        document.getElementById('tui7th').value = 0;
        document.getElementById('tui8th').value = 0;
        document.getElementById('tui9th').value = 0;
    }else if(ptype == 'Monthly'){
        
        var mo_upon = sum * 0.4286150;
        var mo_rest = (sum - mo_upon) /8

        document.getElementById('tuiUpon').value = mo_upon.toFixed(2);
        document.getElementById('tui2nd').value = mo_rest.toFixed(2);
        document.getElementById('tui3rd').value = mo_rest.toFixed(2);
        document.getElementById('tui4th').value = mo_rest.toFixed(2);
        document.getElementById('tui5th').value = mo_rest.toFixed(2);
        document.getElementById('tui6th').value = mo_rest.toFixed(2);
        document.getElementById('tui7th').value = mo_rest.toFixed(2);
        document.getElementById('tui8th').value = mo_rest.toFixed(2);
        document.getElementById('tui9th').value = mo_rest.toFixed(2);
    }
}
    </script>
</body>

</html>
