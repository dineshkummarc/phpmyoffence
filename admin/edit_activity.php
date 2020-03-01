<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>

<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Activity/Update</div>
				<a class = "btn btn-success" href = "offense_list.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_activity = $conn->query("SELECT * FROM `offense_list` WHERE `offense_id` = '$_REQUEST[offense_id]'") or die(mysqli_error());
							$f_activity = $q_activity->fetch_array();
						?>
						<form method = "POST" action = "edit_activity_query.php?offense_id=<?php echo $f_activity['offense_id']?>">	
							<div class = "form-group">
								<label>offense</label>
								<input type = "text" value = "<?php echo $f_activity['offense_name']?>" class = "form-control" name = "offense_name" />
							</div>
							<div class = "form-group">
								<label>offense points</label>
								<textarea name = "offense_points" style = "height:100px; resize:none;" class = "form-control"><?php echo $f_activity['offense_points']?></textarea>
							</div>
							
							<br />
							<div class = "form-group">
								<button class = "btn btn-warning form-control" name = "update_activity"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
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