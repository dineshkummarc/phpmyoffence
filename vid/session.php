<?php
	session_start();
	$session = $_SESSION['username'];
	if(!ISSET($_SESSION['username'])){
		header("location:index.php");
	}
?>