<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'grade 7';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM tbl_bi_annual";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {


    echo '<table class="your-table-class">';
                        
    echo '<tr>';
    echo '<th colspan="2">Bi-Annual</th>';
    echo '</tr>';
    

    echo '<tr>';
    echo '<td>Tuition Fee</td>';
    echo '<td>' . $row['Tuition_fee'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td> Other School Fees </td>';
    echo '<td>' . $row['other_school_fees'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td> Miscellaneous Fees & Socio-Cultural Fees </td>';
    echo '<td>' . $row['Miscellaneous_Fees'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>Total</td>';
    echo '<td>' . $row['total'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td> Upon Enrollment </td>';
    echo '<td>' . $row['upon_enrollment'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>2nd Payment (November 15)</td>';
    echo '<td>' . $row['2nd_Payment'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td> Total </td>';
    echo '<td>' . $row['total2'] . '</td>';
    echo '</tr>';

    echo '</table>';
}


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sci_tech';

$conn_balance = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn_balance) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_balance = "SELECT * FROM tbl_balance WHERE studNO = $stuNo";
$result_balance = mysqli_query($conn, $query);

echo '<table>';
while ($row_balance = mysqli_fetch_assoc($result_balance)) {
    echo '<tr>';
    echo '<td>Balance</td>';
    echo '<td>' . $row['balance'] . '</td>';
    echo '</tr>';
}
echo '</table>';


$conn->close();
?>
