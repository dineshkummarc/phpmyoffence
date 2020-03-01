<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_vid'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$q_vid = $conn->query("SELECT * FROM `vid_user` WHERE `username` = '$username'") or die(mysqli_error($conn));
		$v_vid = $q_vid->num_rows;
		if($v_vid > 0){
			echo '<script>alert("Username already taken");</script>';
			echo '<script>window.location = "edit_vid.php?vid_id=" +'.$_REQUEST['vid_id'].'</script>';
		}else{
			$conn->query("UPDATE `vid_user` SET `username` = '$username', `password` = '$password', `name` = '$name', `surname` = '$surname' WHERE `vid_id` = '$_REQUEST[vid_id]'") or die(mysqli_error($conn));
			header('location:vid.php');
		}
	}
?>