<?php
	require_once '../connect.php';
	if(ISSET($_POST['save_vid_user'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$a_query = $conn->query("SELECT * FROM `vid_user` WHERE `username` = '$username'") or die(mysqli_error($conn));
		$a_valid = $a_query->num_rows;
		if($a_valid > 0){
			echo "<script>alert('Username already taken')</script>";
			echo "<script>window.location = 'vid.php'</script>";
		}else{
			$conn->query("INSERT INTO `vid_user` VALUES('', '$username', '$password', '$name','$surname')") or die(mysqli_error($conn));
			header('location:vid.php');
		}
	}	
?>
