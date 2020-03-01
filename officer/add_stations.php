<?php
require_once '../connect.php';
	if(ISSET($_POST['save_location'])){
		$loca = $_POST['location'];
		$sta = $_POST['branch'];
		$conn->query("INSERT INTO `stations_city` VALUES('', '$loca', '$sta')") or die(mysqli_error($conn));
		header('location: locations_list.php');
	}

?>