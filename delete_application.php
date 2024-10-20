<?php
session_start();
$conn = new mysqli("localhost", "root", "", "coursesystem");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $applicant_id = $_SESSION['applicant']; // Ensure you use the session applicant ID for security

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM application_details WHERE id = ? AND applicant_id = ?");
    $stmt->bind_param("ii", $id, $applicant_id);

    if ($stmt->execute()) {
        echo 'success'; // Respond with success if the deletion was successful
    } else {
        echo 'Error: ' . $stmt->error; // Respond with error if something went wrong
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
