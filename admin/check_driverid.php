<?php
	require_once '../connect.php';
	$license_id = $_POST['license_id'];
	$q_driver = $conn->query("SELECT * FROM `drivers` WHERE `license_id` = '$license_id'") or die(mysqli_error());
	$v_driver = $q_driver->num_rows;
	if($v_driver > 0){
		echo "Success";
	}else{
		echo "Fail";
	}
?>