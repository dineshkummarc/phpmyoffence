<?php
require_once '../connect.php';
	if(ISSET($_POST['save_location'])){
		$lid = $_POST['license_id'];
		$nid = $_POST['national_id'];
		$reg = $_POST['regnumber'];
		$vc = $_POST['vehicle_color'];
		$mod = $_POST['model'];
		$man = $_POST['year_man'];
		$conn->query("INSERT INTO `register_car` VALUES('', '$lid', '$nid','$reg','$vc','$mod','$man',NOW())") or die(mysqli_error($conn));
		header('location: register_car_list.php');
	}

?>