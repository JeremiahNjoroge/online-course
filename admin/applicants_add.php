<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$filename = $_FILES['photo']['name'];
	if (!empty($filename)) {
		move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
	}


	$sql = "INSERT INTO applicants (password, firstname, lastname, email, photo) VALUES ('$password', '$firstname', '$lastname', '$email' , '$filename')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Voter added successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}

} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: applicants.php');
?>