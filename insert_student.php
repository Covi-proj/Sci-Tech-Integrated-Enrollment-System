<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "sci_tech";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
// ...

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form fields are set
    if (isset($_POST["user_id"]) && isset($_POST["name"]) && isset($_POST["user_pass"]) && isset($_POST["account_type"])) {
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $user_pass = $_POST["user_pass"];
        $account_type = $_POST["account_type"];

        // Insert data into the database
        $sql = "INSERT INTO user_account_s (user_id, name, user_pass, account_type) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("isss", $user_id, $name, $user_pass, $account_type);

            if ($stmt->execute()) {
                echo "Account inserted successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error in preparing the statement: " . $conn->error;
        }
    } else {
        echo "Missing form fields. Make sure to fill out all required fields.";
    }
}

// ...

// Close the database connection
$conn->close();
?>
