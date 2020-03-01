<?php
	require_once 'session.php';?>
	<?php include '../connect.php';
?>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">list of endorsed licenses </div>
			<br />
			<div id = "station_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>license id </th>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Class_</th>
								<th>gender_</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// implenting join and logic for three tables select endorsed license only
	 
							$act_query = $conn->query("SELECT o.license_id,d.firstname,d.lastname,d.class,d.gender  FROM offenses o,drivers d WHERE o.license_id=d.license_id GROUP BY o.license_id HAVING COUNT(o.license_id) > 3") or die(mysqli_error($conn));
							while($act_fetch = $act_query->fetch_array()){
							?>
			
							<tr>
								<td><?php echo $act_fetch['license_id']?></td>
								<td><?php echo $act_fetch['firstname']?></td>
								<td><?php echo $act_fetch['lastname']?></td>
								<td><?php echo $act_fetch['class']?></td>
								<td><?php echo $act_fetch['gender']?></td>
								
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class = "modal fade" id = "delete_location" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this location?</label></center>
							<br />
							<center><a class = "btn btn-danger delete_locations" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div id = "sta_form" style = "display:none;" class = "panel panel-default">
				<div  class = " panel-heading" >	
					<div class = "alert alert-success">locations/Add new</div>
					<div style = "width:40%; margin-left:32%;">	
						<form method = "POST" action = "add_stations.php">	
							<div class = "form-group">
								<label>city</label>
								<input type = "text" class = "form-control" name = "location" required = "required"/>
							</div>
							
							<div class = "form-group">
								<label>Area/branch</label>
								<input type = "text" min="#" class = "form-control" name = "branch" required = "required"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-primary form-control" name = "save_location"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>	
					</div>	
				</div>
			</div>
		<br /><br /><br />
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_locations').on('click', function(){
				window.location = 'delete_location.php?id=' + $id;
			});
		})
	});
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>