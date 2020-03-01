<?php
	require_once '../connect.php';
	$officer_query = $conn->query("SELECT * FROM `officer_user`") or die(mysqli_error());
	$officer_valid = $officer_query->num_rows;
	if($officer_valid == 1){
		echo '<script>alert("Error: Can\'t delete if only one admin account is available")</script>';
		echo '<script>window.location = "officer.php"</script>';
	}else{
		$conn->query("DELETE FROM `officer_id` WHERE `officer_id` = '$_REQUEST[officer_id]'") or die(mysqli_error($conn));
		header('location:officer.php');
	}	