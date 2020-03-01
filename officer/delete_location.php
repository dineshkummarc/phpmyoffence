<?php
	require_once '../connect.php';
	$conn->query("DELETE FROM `stations_city` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	// you can have many delete queries on the same filefrom different tables
	header('location:locations_list.php');
?>