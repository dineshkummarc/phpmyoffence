<?php
require_once '../connect.php';
	if(ISSET($_POST['capture_offense'])){
		echo $license = $_POST['license_id'];
		echo $offpoints = $_POST['offense_points'];
		$conn->query("INSERT INTO offenses  (license_id, offense) VALUES( '$license', '$offense_name')") or die(mysqli_error($conn));
		//header('location: offense_list.php');
	}
?