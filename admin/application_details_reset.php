<?php
	include 'includes/session.php';

	$sql = "DELETE FROM application_details";
	if($conn->query($sql)){
		$_SESSION['success'] = "Application Details reset successfully";
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: application_details.php');

?>