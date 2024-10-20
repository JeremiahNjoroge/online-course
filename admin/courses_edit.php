<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$coursename = $_POST['coursename'];
		$courseid = $_POST['courseid'];
		$description = $_POST['description'];		
	

		$sql = "UPDATE courses SET course_name = '$coursename', courseid = '$courseid',  description = '$description' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: courses.php');

?>