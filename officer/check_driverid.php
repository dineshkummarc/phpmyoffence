<?php
	require_once '../connect.php';
	$license_id = $_POST['license_id'];
	$q_student = $conn->query("SELECT * FROM `drivers` WHERE `license_id` = '$license_id'") or die(mysqli_error());
	$v_student = $q_student->num_rows;
	if($v_student > 0){
		echo "Success";
	}else{
		echo "Fail";
	}
?>