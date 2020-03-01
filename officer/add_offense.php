<?php include 'session.php';?>
<?php
require_once '../connect.php';
	if(ISSET($_POST['save_offense'])){
		$offname = $_POST['offense_name'];
		$offpoints = $_POST['offense_points'];
		$conn->query("INSERT INTO `offense_categorie` VALUES('', '$offname', '$offpoints')") or die(mysqli_error($conn));
		header('location: offense_list.php');
	}

?>