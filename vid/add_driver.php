<?php
	require_once '../connect.php';
	if(ISSET($_POST['save_driver'])){	
			if($_FILES['image']['name'] == ""){
				$location = "default.png";
			}else{
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
				$location =  $_FILES["image"]["name"];
			}
			$license_id = $_POST['license_id'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$class = $_POST['class'];
			$dob = $_POST['dob'];
			$conn->query("INSERT INTO `drivers` VALUES('', '$license_id', '$firstname','$lastname',  '$class', '$dob','$location')") or die(mysqli_error($conn));
			header("location:driver.php");
	}
?>