<?php

$conn = new mysqli("localhost", "root", "", "sci_tech");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stud_info = $_GET['stud_info'];


$query = "SELECT * FROM tbl_stud_enroll tr RIGHT JOIN tbl_tuition tb ON tb.tui_grade = tr.studLevel AND tb.tui_ptype = tr.studPayType LEFT JOIN student_balance tl ON tl.Student_num = tr.studID WHERE tr.studID = '$stud_info'";
$result = mysqli_query($conn, $query);

if ($result) {
    
    $userData = mysqli_fetch_assoc($result);

    header('Content-Type: application/json');
    echo json_encode($userData);
} else {
   
    echo 'Error executing the query: ' . mysqli_error($conn);
}


mysqli_close($conn);

?>

