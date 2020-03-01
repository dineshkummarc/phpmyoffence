<?php
	require_once '../connect.php';
	$admin_query = $conn->query("SELECT * FROM `vid_user`") or die(mysqli_error());
	$vid_valid = $admin_query->num_rows;
	if($vid_valid == 1){
		echo '<script>alert("Error: Can\'t delete if only one vid user account is available")</script>';
		echo '<script>window.location = "vid.php"</script>';
	}else{
		$conn->query("DELETE FROM `vid_user` WHERE `vid_id` = '$_REQUEST[vid_id]'") or die(mysqli_error($conn));
		header('location:vid.php');
	}	