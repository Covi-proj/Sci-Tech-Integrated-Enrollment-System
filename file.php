<?php
$uploadDirectory = 'uploads/';

if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

if (isset($_FILES['file'])) {
    $targetFile = $uploadDirectory . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo "The file ". basename($_FILES['file']['name']). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "No file was uploaded.";
}
?>
