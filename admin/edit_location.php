<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
<html lang = "eng">
	<head>
		<title>traffic offense system</title>
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

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Locations/Update</div>
				<a class = "btn btn-success" href = "locations_list.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$my_station = $conn->query("SELECT * FROM `stations_city` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
							$f_station = $my_station->fetch_array();
						?>
						<form method = "POST" action = "edit_station_query.php?id=<?php echo $f_station['id']?>">	
							<div class = "form-group">
								<label>location</label>
								<input type = "text" class = "form-control" name = "location" value = "<?php echo $f_station['location']?>" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Area</label>
								<input type = "text" class = "form-control" name = "branch" value = "<?php echo $f_station['branch']?>" required = "required"/>
							</div>
							
							
							<div class = "form-group">
								<button class = "btn btn-warning form-control" name = "update_locations"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
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
</html>