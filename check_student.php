<?php
	require_once 'connect.php';
	$username = $_POST['username'];
	$username=$_POST['password'];
	$q_student = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' and password='$password'") or die(mysqli_error($conn));
	$v_student = $q_student->num_rows;
	if($v_student > 0){
		echo "Success";
	}else{
		session_start();
		if(!ISSET($_SESSION['student_id'])){
			echo'
				<div class = "alert alert-info">Student Login</div>
				<form>	
					<div class = "form-group">
						<label>Student ID</label>
						<input type = "number" min = "0" max = "99999999" id = "student_id" class = "form-control"/>
					</div>
					<br />
					<div class = "form-group">
						<button type = "button" class = "btn btn-primary form-control" id = "student_login">Login</button>
					</div>
				</form>	
			';
		}
	}
?>