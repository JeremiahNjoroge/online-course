<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$coursename = $_POST['coursename'];
		$courseid = $_POST['courseid'];
		$description = $_POST['description'];		
	

		$sql = "INSERT INTO courses (course_name, courseid, description) VALUES ('$coursename', '$courseid', '$description')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: courses.php');
?>