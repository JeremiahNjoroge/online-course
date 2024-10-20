<?php
session_start();
$conn = new mysqli("localhost", "root", "", "coursesystem");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $applicant_id = $_SESSION['applicant']; // Assuming you store applicant_id in session
    $courses = isset($_POST['course']) ? $_POST['course'] : []; // Check if courses are set
    $intake_id = $_POST['intake']; // Get intake ID from the form

    if (empty($courses)) {
        $_SESSION['error'] = "Please select at least one course.";
        header('location: courses.php');
        exit();
    }

    // Count the existing courses for the applicant
    $sqlCount = "SELECT COUNT(*) as course_count FROM application_details WHERE applicant_id = ?";
    $stmtCount = $conn->prepare($sqlCount);
    $stmtCount->bind_param("i", $applicant_id);
    $stmtCount->execute();
    $resultCount = $stmtCount->get_result();
    $rowCount = $resultCount->fetch_assoc();
    $existingCourseCount = $rowCount['course_count'];

    // Check if the user is trying to register for more than three courses
    if ($existingCourseCount + count($courses) > 3) {
        $_SESSION['error'] = "You cannot register for more than three courses.";
        $stmtCount->close();
        header('location: courses.php');
        exit();
    }

    // Prepare the SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO application_details (applicant_id, course_id, intake_id) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        $_SESSION['error'] = "Error preparing the statement: " . $conn->error;
        $stmtCount->close();
        header('location: courses.php');
        exit();
    }

    // Bind parameters
    $stmt->bind_param("iii", $applicant_id, $course_id, $intake_id);

    $success = true; // Flag for success
    foreach ($courses as $course_id) {
        if (!$stmt->execute()) {
            $success = false; // Set the flag to false if an error occurs
        }
    }

    if ($success) {
        $_SESSION['success'] = "Course(s) successfully registered.";
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    $stmtCount->close();

    // Redirect to courses page
    header('location: courses.php');
    exit();
}

$conn->close();
?>
