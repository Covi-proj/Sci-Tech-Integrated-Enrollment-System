<?php
// Assume you have a database connection established
// Establish a connection to the database
$conn = new mysqli("localhost", "root", "", "sci_tech");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get the user ID from the request
$userId = $_GET['userId'];

// Perform a database query to retrieve user information
// Replace "users" with your actual table name
$query = "SELECT * FROM tbl_registration_new tr RIGHT JOIN tbl_tuition tu ON tu.tui_grade = tr.grade_level AND tu.tui_ptype = tr.Payment_Type WHERE Pre_register_num = '$userId'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch user data
    $userData = mysqli_fetch_assoc($result);

    // Return user data as JSON
    header('Content-Type: application/json');
    
    echo json_encode($userData);
} else {
    // Handle the query error
    echo 'Error executing the query: ' . mysqli_error($conn);
}

// Close the database connection if needed
mysqli_close($conn);
?>
