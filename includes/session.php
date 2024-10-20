<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['applicant'])){
		$sql = "SELECT * FROM applicants WHERE id = '".$_SESSION['applicant']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>