<?php
	include 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $conn->query("SELECT * FROM `vid_user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error($conn));
	$valid = $query->num_rows;
	$fetch = $query->fetch_array();
	if($valid > 0){
		echo 'Success';
		session_start();
		$_SESSION['username'] = $fetch['username'];
	}else{
		echo 'Error';
	}