<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<?php

$conn = new mysqli("localhost", "root", "", "sci_tech");

$user_id = $_POST["Stud_number"];
$Tran_num = $_POST["Tran_num"];
$payment_id = $_POST["OR_Num"];
$lname = $_POST["lname"];
$fname = $_POST["fname"];
$grade_level = $_POST["grade_level"];
$paid_amount = $_POST["paid_amount"];
$date = $_POST["date"];



$_SESSION['Stud_number'] = $user_id;
$_SESSION['Tran_num'] = $Tran_num;
$_SESSION['OR_Num'] = $payment_id;
$_SESSION['lname'] = $lname;
$_SESSION['fname'] = $fname;
$_SESSION['grade_level'] = $grade_level;
$_SESSION['paid_amount'] = $paid_amount;
$_SESSION['date'] = $date; 


// Fetch Current_balance for the specific student
$Current_balance_from_database = "SELECT Current_balance FROM student_balance WHERE Student_num = '$user_id'";
$result = $conn->query($Current_balance_from_database);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Current_balance = $row['Current_balance'];

} else {
    echo '<div class="message error">Error fetching Current_balance: ' . $conn->error . '</div>';
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sqlbal = "SELECT Current_balance from Student_balance where Student_num = '$user_id'";
	$result = $conn->query($sqlbal);
	$row = $result->fetch_assoc();
	$balval = $row['Current_balance'];
	//Comparing the student balance from the database with the payment
	if($balval == 0){
		echo '<script> alert("There are no remaining balance. This account cannot accept any payment") </script>';
		echo '<script> window.history.back() </script>';
	}else if($paid_amount > $balval){
		echo '<script> alert("Payment is higher than the Balance! Check your Payment and Balance!") </script>';
		echo '<script> window.history.back() </script>';
	}
    else{

    
// Subtract balance
        $balance_update_sql = "UPDATE student_balance SET Current_balance = Current_balance - $paid_amount WHERE Student_num = '$user_id'";
        $updated_balance = "SELECT Current_balance FROM student_balance WHERE Student_num = '$user_id'";

        $updatedresult = $conn->query($updated_balance);

        if ($updatedresult->num_rows > 0) {
                $rowbalance = $updatedresult->fetch_assoc();
                $Current_balance = $rowbalance['Current_balance'];

            }

                $_SESSION['Current_balance'] = $Current_balance;


// Insert new record
            $sql = "INSERT INTO receive_payment (Tran_num, OR_Num, Last_name, First_name, grade_level,  paid_amount, date) 
                    VALUES ('$Tran_num', '$payment_id', '$lname', '$fname', '$grade_level','$paid_amount', '$date')";

                    $sql2 = "UPDATE tbl_stud_enroll SET studStatus = 'Enrolled' WHERE studID = '$user_id'";

                    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($balance_update_sql) === TRUE) {
                        echo '<div class="message success">Transaction success</div>';

   

                        $conn->close();
            
                    } else {
                        echo '<div class="message error">Error inserting record: ' . $conn->error . '</div>';
                    
                    }
                }

?>
<br>

    <button onclick="history.back()">Back</button>
    <button type = "button" onclick = "openOR()">Generate OR</button>
</body>

</html>

<script>

        function openOR(){

                var genOR = 'gen_OR.php';

                window.open(genOR, '_blank');
        }

</script>

