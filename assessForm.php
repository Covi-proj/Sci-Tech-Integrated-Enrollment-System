<?php
    session_start();

    $conn = new mysqli("localhost", "root", "", "sci_tech");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to check and set session variables
    function getSessionVar($varName, $defaultValue = "") {
        return isset($_SESSION[$varName]) ? $_SESSION[$varName] : $defaultValue;
    }

    $studnumber = getSessionVar('studNum');
    $lastname = getSessionVar('studLast');
    $firstname = getSessionVar('studFirst');
    $gradelevel = getSessionVar('studGrade');
    $paymenttype = getSessionVar('studPType');
    $regdate = getSessionVar('studDate');
    $studSY = getSessionVar('academic_year');
    $tuiFee = getSessionVar('tuiFee');
    $tuiMisc = getSessionVar('tuiMisc');
    $tuiOther = getSessionVar('tuiOther');
    $tuiTotal = getSessionVar('tuiTotal');
    $tuiUpon = getSessionVar('tuiUpon');
    $tui2nd = getSessionVar('tui2nd');
    $tui3rd = getSessionVar('tui3rd');
    $tui4th = getSessionVar('tui4th');
    $tui5th = getSessionVar('tui5th');
    $tui6th = getSessionVar('tui6th');
    $tui7th = getSessionVar('tui7th');
    $tui8th = getSessionVar('tui8th');
    $tui9th = getSessionVar('tui9th');

    $query = "SELECT subj_ID AS Code, subj_name AS Subject, subj_grade AS Grade, subj_time AS Time, subj_day AS Day, subj_prof AS Teacher FROM tbl_subject WHERE subj_grade = '$gradelevel'";
    $result = $conn->query($query);
    $columns = array();

    while ($fieldinfo = $result->fetch_field()) {
        $columns[] = $fieldinfo->name;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information and Fees</title>
    <style>
       body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-size: 15px; /* Smaller font size */
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h1,
        h3,
        label {
            text-align: center;
            font-size: 13px; /* Larger font size for headers */
        }

        h3 {
            margin-top: 30px;
        }

        table {
            width: 1000px;
            border-collapse: collapse;
            margin-top: 10px;
            border: 3px solid black;
            
        }

        
        th, td {
            border: 1px solid #ddd;
            padding: 12px; /* Adjusted padding for better spacing */
            text-align: left; /* Left-align text */
            font-weight: bold; 
            font-size: 15px; 
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }

        .name label {
            font-weight: bold;
        }

        .tuition-breakdown label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        

        .example-screen {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 12px; /* Slightly smaller padding */
            border: none;
            cursor: pointer;
            font-size: 14px; /* Smaller font size */
        }

        button:hover {
            background-color: #45a049;
        }

        .name {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; 
        }

        .title {
            font-size: 30px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
        }

        .tuition-container,
        .subjects-container {
            width: 48%; /* Adjust the width as needed */
        }
        .school{

            font-size: 25px;
        }

         .container {
        text-align: center; /* I-center ang lahat ng element sa loob ng container */
        }

        img {
            display: inline-block;
            margin-top: 200px; 
            margin-left: 150px;
    
        }

        h1.school {
            display: block; /* Palitan ang display property ng h1 sa block para maging buong width ng container */
        }
        .school {
            margin-left: 10px;
            line-height: 1.0; 
        	}

        .head{

            font-size: 25px;

        }

        .type{

            font-weight: bold;
            font-size: 20px;


        }
        .label{
            font-weight: bold;
            font-size: 20px;
        }
        img.logo {
        display: inline-block;
        margin-top: 30px;  
        margin-left: 100px; 
        padding: 0;        
        }
    </style>
</head>

<body>
    <div class="logo">
        
    </div>
    <h1 class="school">
    <img src="favicon_scitech.png" alt="Logo" width="60px" height="60px" class="logo">
    Science Technology Institute of Rosario, Cavite Inc.
</h1>
    <label class = "label">Date: <?php echo $regdate ?></label>
    <h3 class="title">Student Information</h3>
    <div class="name">
        <table>
            <tr>
                <td><label class="text"><span>Student Number: <?php echo $studnumber ?></span></label></td>
                <td><label class="text"><span>Last Name: <?php echo $lastname ?></span></label></td>
                <td><label class="text"><span>First Name: <?php echo $firstname ?></span></label></td>
                <td><label class="text"><span>Grade Level: <?php echo $gradelevel ?></span></label></td>
                <td><label class="text"><span>A.Y.: <?php echo $studSY ?></span></label></td>
            </tr>
        </table>
    </div>

    <div class="subjects-container">

        <table>
            <tr>
                <?php
                // Generate table headers based on the database columns
                foreach ($columns as $column) {
                    echo "<th>$column</th>";
                }
                ?>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                // Generate table data columns based on the database columns
                foreach ($columns as $column) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <h3 class="head">Tuition Fees</h3>
    <div class="tuition-breakdown">
        <label class ="type">Payment Type: <?php echo $paymenttype ?></label>
        <?php
if ($paymenttype == "Cash") {
    echo '<table border="1">
            <tr>
                <td><label>Tuition Fee:</label></td>
                <td>' . $tuiFee . '</td>
            </tr>
            <tr>
                <td><label>Miscellaneous Fee:</label></td>
                <td>' . $tuiMisc . '</td>
            </tr>
            <tr>
                <td><label>Other Fee:</label></td>
                <td>' . $tuiOther . '</td>
            </tr>
            <tr>
                <td><label>Total:</label></td>
                <td>' . $tuiTotal . '</td>
            </tr>
        </table>';
} elseif ($paymenttype == "Bi-Annual") {
    echo '<table border="1">
            <tr>
                <td><label>Tuition Fee:</label></td>
                <td>' . $tuiFee . '</td>
            </tr>
            <tr>
                <td><label>Miscellaneous Fee:</label></td>
                <td>' . $tuiMisc . '</td>
            </tr>
            <tr>
                <td><label>Other Fee:</label></td>
                <td>' . $tuiOther . '</td>
            </tr>
            <tr>
                <td><label>Total:</label></td>
                <td>' . $tuiTotal . '</td>
            </tr>
            <tr>
                <td><label>Upon Enrollment:</label></td>
                <td>' . $tuiUpon . '</td>
            </tr>
            <tr>
                <td><label>2nd Payment:</label></td>
                <td>' . $tui2nd . '</td>
            </tr>
        </table>';
} elseif ($paymenttype == "Quarterly") {
    echo '<table border="1">
            <tr>
                <td><label>Tuition Fee:</label></td>
                <td>' . $tuiFee . '</td>
            </tr>
            <tr>
                <td><label>Miscellaneous Fee:</label></td>
                <td>' . $tuiMisc . '</td>
            </tr>
            <tr>
                <td><label>Other Fee:</label></td>
                <td>' . $tuiOther . '</td>
            </tr>
            <tr>
                <td><label>Total:</label></td>
                <td>' . $tuiTotal . '</td>
            </tr>
            <tr>
                <td><label>Upon Enrollment:</label></td>
                <td>' . $tuiUpon . '</td>
            </tr>
            <tr>
                <td><label>2nd Payment:</label></td>
                <td>' . $tui2nd . '</td>
            </tr>
            <tr>
                <td><label>3rd Payment:</label></td>
                <td>' . $tui3rd . '</td>
            </tr>
            <tr>
                <td><label>4th Payment:</label></td>
                <td>' . $tui4th . '</td>
            </tr>
        </table>';
} elseif ($paymenttype == "Monthly") {
    echo '<table border="1">
            <tr>
                <td><label>Tuition Fee:</label></td>
                <td>' . $tuiFee . '</td>
            </tr>
            <tr>
                <td><label>Miscellaneous Fee:</label></td>
                <td>' . $tuiMisc . '</td>
            </tr>
            <tr>
                <td><label>Other Fee:</label></td>
                <td>' . $tuiOther . '</td>
            </tr>
            <tr>
                <td><label>Total:</label></td>
                <td>' . $tuiTotal . '</td>
            </tr>
            <tr>
                <td><label>Upon Enrollment:</label></td>
                <td>' . $tuiUpon . '</td>
            </tr>
            <tr>
                <td><label>2nd Payment:</label></td>
                <td>' . $tui2nd . '</td>
            </tr>
            <tr>
                <td><label>3rd Payment:</label></td>
                <td>' . $tui3rd . '</td>
            </tr>
            <tr>
                <td><label>4th Payment:</label></td>
                <td>' . $tui4th . '</td>
            </tr>
            <tr>
                <td><label>5th Payment:</label></td>
                <td>' . $tui5th . '</td>
            </tr>
            <tr>
                <td><label>6th Payment:</label></td>
                <td>' . $tui6th . '</td>
            </tr>
            <tr>
                <td><label>7th Payment:</label></td>
                <td>' . $tui7th . '</td>
            </tr>
            <tr>
                <td><label>8th Payment:</label></td>
                <td>' . $tui8th . '</td>
            </tr>
            <tr>
                <td><label>9th Payment:</label></td>
                <td>' . $tui9th . '</td>
            </tr>
        </table>';
}
?>

    </div>

    <div class="example-screen">
        <button onclick="window.print();">Print</button>
    </div>
</body>

</html>

