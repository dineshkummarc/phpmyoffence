<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_officer'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$q_officer = $conn->query("SELECT * FROM `officer_user` WHERE `username` = '$username'") or die(mysqli_error($conn));
		$v_officer = $q_officer->num_rows;
		if($v_officer > 0){
			echo '<script>alert("Username already taken");</script>';
			echo '<script>window.location = "edit_officer.php?officer_id=" +'.$_REQUEST['officer_id'].'</script>';
		}else{
			$conn->query("UPDATE `officer_user` SET `username` = '$username', `password` = '$password', `name` = '$name', `surname` = '$surname' WHERE `officer_id` = '$_REQUEST[officer_id]'") or die(mysqli_error($conn));
			header('location:officer.php');
		}
	}
?>