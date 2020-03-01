<?php 
include ('../connect.php');
@session_start();
@$username=$_SESSION['username'];
if($username==""){
		session_write_close();
		header("location: ../index.php");
		exit();
}

?>