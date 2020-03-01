<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
<html lang = "eng">
	<head>
		<title>Traffic offense system</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Accounts/VID/Update</div>
				<a class = "btn btn-success" href = "vid.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_vid = $conn->query("SELECT * FROM `vid_user` WHERE `vid_id` = '$_REQUEST[vid_id]'") or die(mysqli_error($conn));
							$f_vid_user = $q_vid->fetch_array();
						?>
							<form method = "POST" action = "edit_vid_query.php?vid_id=<?php echo $f_vid_user['vid_id']?>">	
								<div class = "form-group">
									<label>Username</label>
									<input type = "text" value = "<?php echo $f_vid_user['username']?>" class = "form-control"  name = "username"/>
								</div>
								<div class = "form-group">
									<label>Name</label>
									<input type = "text" value = "<?php echo $f_vid_user['name']?>" class = "form-control"  name = "name"/>
								</div><div class = "form-group">
									<label>Surname</label>
									<input type = "text" value = "<?php echo $f_vid_user['surname']?>" class = "form-control"  name = "surname"/>
								</div>
								<div class = "form-group">
									<label>Password</label>
									<input type = "password" value = "<?php echo $f_vid_user['password']?>" class = "form-control"  name = "password"/>
								</div>
								<div class = "form-group">
									<button class = "btn btn-warning form-control" name = "update_vid"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
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
	<?php include'chicredit.php';?>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>`