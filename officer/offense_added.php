<!- developer tremendous chatikobo time at 10:50 11/17/2018 -->
<?php
session_start();
require_once '../connect.php';
	if(ISSET($_POST['add'])){
		// attend here
		$license_id = $_POST['license_id'];
		$offense = $_POST['offense_name'];
		$dollar= $_POST['dollar'];
		$reporter = $_SESSION['username'];
		$location = $_POST['location'];
		$conn->query("INSERT INTO `offenses` VALUES('', '$license_id', '$offense','$dollar',NOW(),'$reporter','$location')") or die(mysqli_error($conn));
		header('location: check_license.php');
	}

?>