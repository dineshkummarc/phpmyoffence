<!DOCTYPE html>
<?php
include"connect.php";
?>

<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<br />
<br />
<br />
<?php //login script

if (isset($_POST['login'])){
    
    // include 'opendb.php';
        $username = $_POST["username"];
        $password = $_POST["password"]; 

        $result ="";
        $query = "SELECT * FROM user WHERE username ='$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $rows=mysqli_fetch_array($result);
        // $role=$rows['role'];

        $_SESSION['username'] = $username;
        
        if(!$result){
            die( "\n\ncould'nt send the query because".mysqli_error($conn));
            exit;
        }

        $row = mysqli_num_rows($result);
        if($row==1){?> 
            <script>location="vid/index.php";</script>
            <?php exit;
        }  

        else{ ?>
            <script> 
                alert('Wrong Username or Password ,Please Try Again');
            </script>
        <?php }
}
?>

	<div class = "container-fluid" id = "content">	
		<div class = "row" style = "margin-top:-120px;">	
			<div class = "col-md-3 well" id = "login_content">	
				
					
							<div class = "alert alert-info">Staff Login</div>
							<form action="" method= "POST">	
								<div class = "form-group">
									<label>Staff ID</label>
									<input type = "text"  id = "username"  name ="username"class = "form-control"/>
								</div>
								<br />
								<div class = "form-group">
									<label>password</label>
									<input type = "password"  id = "password" name="password" class = "form-control"/>
								</div>
								<br>
								
								<div class = "form-group">
									<button type = "submit" class = "btn btn-primary form-control" name = "login">Login</button>
								</div>
							</form>	
					
			</div>	
			
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<?php include'admin/chicredit.php';?>
</body>	
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/script.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.min.js"></script>
</html>