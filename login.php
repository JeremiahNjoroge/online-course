<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM applicants WHERE email = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Wrong Details';
		}
		else{
			$row = $query->fetch_assoc();
			if($password===$row['password']){
				$_SESSION['applicant'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input credentials first';
	}

	header('location: index.php');

?>