<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$intake_name = $_POST['intake_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];

		$sql = "UPDATE intakes SET intake_name = '$intake_name', start_date = 'start_date' , end_date = 'end_date'WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Intake updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: intakes.php');

?>