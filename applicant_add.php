<?php
session_start();

// Include database connection
include 'includes/conn.php';

// Check if the form is submitted
if (isset($_POST['add'])) {
    // Get form data
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    // Handle photo upload
    if (!empty($photo)) {
        $target_dir = 'uploads/';  // Ensure this directory exists and is writable
        $target_file = $target_dir . basename($photo);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check === false) {
            $_SESSION['error'] = 'File is not an image.';
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES['photo']['size'] > 5000000) {  // 5MB limit
            $_SESSION['error'] = 'File is too large.';
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            $_SESSION['error'] = 'Only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['error'] = 'Your file was not uploaded.';
            $photo = '';
        } else {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                // Success
            } else {
                $_SESSION['error'] = 'There was an error uploading your file.';
                $photo = '';
            }
        }
    } else {
        $photo = 'default.png';  // Set a default photo if none is uploaded
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO applicants (email, password, firstname, lastname, photo) 
            VALUES ('$email', '$password', '$firstname', '$lastname', '$photo')";

    // Execute the query
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Registration was successful';
    } else {
        $_SESSION['error'] = 'Error: ' . $conn->error;
    }

} else {
    $_SESSION['error'] = 'Fill up add form first';
}

// Redirect to login page
header('Location: login.php');
?>
