<!- developer tremendous chatikobo time at 10:50 11/17/2018 -->
<?php
require_once '../connect.php';
	if(ISSET($_POST['impound'])){
		$license_id = $_POST['license_id'];
		$reg = $_POST['regnumber'];
		$veh = $_POST['vehicle_color'];
		$mod = $_POST['model'];
		$year = $_POST['year_man'];
		$conn->query("INSERT INTO `impounding` VALUES('', '$license_id', '$reg','$veh','$mod','$year',NOW())") or die(mysqli_error($conn));
		header('location: check_license.php');
	}

?>
<!-- require_once '../connect.php';
	if(ISSET($_GET['add'])){
		// attend here
		$license_id = $_GET['license_id'];
		$offense = $_GET['offense_name'];
		$reporter = $_GET['reporter'];
		$location = $_GET['location'];
		$conn->query("INSERT INTO `offenses` VALUES('', '$license_id', '$offense',NOW(),'$reporter','$location')") or die(mysqli_error($conn));
		header('location: check_license.php');
	} -->