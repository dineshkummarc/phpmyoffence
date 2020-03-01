<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_offenses'])){
		$loca = $_POST['offense_name'];
		$bra = $_POST['offense_points'];
		$conn->query("UPDATE `offense_categorie` SET `offense_name` = '$loca', `offense_points` = '$bra' WHERE `offense_id` = '$_REQUEST[id]'") or die(mysqli_error($conn));
		header('location:offense_list.php');
	}
?>