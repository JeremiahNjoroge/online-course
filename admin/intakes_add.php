<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$intake_name = $_POST['intake_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];

		$sql = "SELECT * FROM intakes ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);

		
		$sql = "INSERT INTO intakes (intake_name, start_date, end_date) VALUES ('$intake_name', '$start_date', '$end_date')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Intakes added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: intakes.php');
?>