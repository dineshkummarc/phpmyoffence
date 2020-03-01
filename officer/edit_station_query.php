<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_locations'])){
		$loca = $_POST['location'];
		$bra = $_POST['branch'];
		$conn->query("UPDATE `stations_city` SET `location` = '$loca', `branch` = '$bra' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
		header('location:locations_list.php');
	}
?>