<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sci_tech';



$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch payments from the payment_report table
$paymentTable = "tbl_balance_exist";



$query = "SELECT * FROM $paymentTable";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

h1 {
    background-color: #2a2185;
    color: white;
    padding: 20px;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
}

th, td {
    border: 1px solid #2a2185;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #2a2185;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #c6d0da;
}

/* Center the table */
table {
    margin-left: auto;
    margin-right: auto;
}

/* Add spacing to the table cells */
td, th {
    padding: 8px 16px;
}



</style>    
<body>
    <h1>Balances</h1>

    
            <?php
            
            $db_host = 'localhost';
            $db_user = 'root';
            $db_pass = '';
            $db_name = 'grade 7';
            
            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
            }

            $tuitiontable = "monthly";
            $query = "SELECT * FROM $tuitiontable";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<table class="your-table-class">';

                // Row 1
                echo '<th colspan="2">Monthly</th>';
                echo '<tr>';
                
                echo '<td>Tuition Fee:</td>';
                
                echo '<td>' . $row['Tuition_Fee'] . '</td>';
                echo '</tr>';
                
                // Row 2
                echo '<tr>';
                echo '<td>Other School Fees:</td>';
                echo '<td>' . $row['other_school_fees'] . '</td>';
                echo '</tr>';
                
                // Row 3
                echo '<tr>';
                echo '<td>Miscellaneous and Socio-Cultural Fees:</td>';
                echo '<td>' . $row['Miscellaneous_Fees_and_Socio'] . '</td>';
                echo '</tr>';
                
                // Row 4
                echo '<tr>';
                echo '<td>Total:</td>';
                echo '<td>' . $row['total'] . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>Upon Enrollment:</td>';
                echo '<td>' . $row['upon_enrollment'] . '</td>';
                echo '</tr>';

                // Row 5
                echo '<tr>';
                echo '<td>2nd Payment (September 31):</td>';
                echo '<td>' . $row['2nd_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 6
                echo '<tr>';
                echo '<td>3rd Payment (October 15):</td>';
                echo '<td>' . $row['3rd_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 7
                echo '<tr>';
                echo '<td>4th Payment (November 15):</td>';
                echo '<td>' . $row['4th_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 8
                echo '<tr>';
                echo '<td>5th Payment (December 15):</td>';
                echo '<td>' . $row['5th_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 9
                echo '<tr>';
                echo '<td>6th Payment (January 15):</td>';
                echo '<td>' . $row['6th_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 10
                echo '<tr>';
                echo '<td>7th Payment (February 15):</td>';
                echo '<td>' . $row['7th_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 11
                echo '<tr>';
                echo '<td>8th Payment (March 15):</td>';
                echo '<td>' . $row['8th_Payment'] . '</td>';
                echo '</tr>';
                
                // Row 12
                echo '<tr>';
                echo '<td>9th Payment (April 15):</td>';
                echo '<td>' . $row['9th_Payment'] . '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

            ?>
           <table class="your-table-class">
    <thead>
        <tr>
            <th>Outstanding Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['balance'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

        </tbody>
    </table>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
