<?php
// Get user input from the form
$payid = $_POST['payid'];
$paymentName = $_POST['paymentName'];
$grsect = $_POST['grsect'];
$date = $_POST['date'];
$amount = $_POST['amount'];

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'sci_tech'); // Fixed 'root' as the username

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the current balance from the database for the given student
$query = "SELECT student_name FROM tbl_students_ WHERE Student_Number = $payid";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_balance = $row['balance'];

    // Calculate the new balance after subtracting the payment
    $new_balance = $current_balance - $amount;

    // Update the database with the new balance
    $update_query = "UPDATE balance SET amount = $new_balance WHERE student_id = $payid";

    if ($conn->query($update_query) === TRUE) {
        header("Location: admin.php?success&new_balance=$new_balance"); // Fixed the header redirection
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Student not found.";
}

// Close the database connection
$conn->close();
?>
