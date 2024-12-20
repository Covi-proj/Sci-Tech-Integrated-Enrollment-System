<?php
$targetDirectory = "uploads/"; // Directory where uploaded files will be stored
$targetFile = $targetDirectory . basename($_FILES["file"]["name"]); // Full path of the uploaded file

// Check if file was uploaded without errors
if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "The file ". basename($_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Error: " . $_FILES["file"]["error"];
}
?>
