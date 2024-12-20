<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sci_tech";

$conn = new mysqli($servername, $username, $password, $database);

$Student_Number = $_POST['Student_number'];
$student_name = $_POST['student_name'];
$contact = $_POST['contact'];
$Email = $_POST['Email'];
$address = $_POST['address'];

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
} else {
    $sql = "INSERT INTO tbl_students_ (Student_Number, student_name, contact, Email, address)
            VALUES (?, ?, ?, ?, ?)";
    $query = "SELECT * FROM tbl_students_";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $Student_Number, $student_name, $contact, $Email, $address);

if ($stmt->execute()) {
    header("Location: admin.php?success");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

    
?>
