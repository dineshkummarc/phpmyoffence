<!DOCTYPE html>

<!--------------------HEAD---------------------->
<?php include'header.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'side_bar.php'?>
<?php include '../connect.php'?>
<!-------------------SIDEBAR------------------>
  
<div id="page-wrapper">
  <div class="row">
                <div class="col-lg-12">
		<div id = "sidecontent" class = "">
			<div class = "alert alert-info">Registered vehicle</div>
			<button type = "button" id = "add_station" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Register vehicle</button>
			<button style = "display:none;" type = "button" id = "cancel_station" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
			<br />
			<br />
			<div class="row">
                <div class="col-lg-12">
			<div id = "station_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>License _id</th>
								<th>national_id</th>
								<th>Number-Plate</th>
								<th>Vehicle-color</th>
								<th>Brand name</th>
								<th>year of manufacture</th>
								<th>Registered on</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$stat_query = $conn->query("SELECT * FROM `register_car`") or die(mysqli_error($conn));
							while($stat_fetch = $stat_query->fetch_array()){
							?>
							<tr>
								<td><?php echo $stat_fetch['license_id']?></td>
								<td><?php echo $stat_fetch['national_id']?></td>
								<td><?php echo $stat_fetch['regnumber']?></td>
								<td><?php echo $stat_fetch['vehicle_color']?></td>
								<td><?php echo $stat_fetch['model']?></td>
								<td><?php echo $stat_fetch['year_man']?></td>
								<td><?php echo $stat_fetch['date_in']?></td>
								
							<!-- <td><center><a href = "edit_location.php?id=<?php echo $stat_fetch['id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" data-toggle = "modal" data-target = "#delete_location" name = "<?php echo $stat_fetch['id']?>" class = "btn btn-danger id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td> -->
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
					<div class = "alert alert-success">Register vehicle /Add new</div>
					<div style = "width:40%; margin-left:32%;">	
						<form method = "POST" action = "add_vehicle.php">	
							<div class = "form-group">
								<label>License ID</label>
								<input type = "text" class = "form-control" name = "license_id" onKeyup ="character12Only(this)" required = "required"/>
							</div>
							<div class = "form-group">
								<label>National ID</label>
								<input type = "text" class = "form-control" name = "national_id" onKeyup ="character13Only(this)" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Number-Plate</label>
								<input type = "text" class = "form-control" name = "regnumber" onKeyup ="character13Only(this)" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Vehicle-color</label>
								<input type = "text" class = "form-control" name = "vehicle_color" onKeyup ="character1Only(this)" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Vehicle-brand</label>
								<input type = "text" class = "form-control" name = "model" onKeyup ="character13Only(this)" required = "required"/>
							</div>
							<div class = "form-group">
								<label>year of manufacture</label>
								<input type = "text" min="#" class = "form-control" name = "year_man" onKeyup ="character14Only(this)" required = "required"/>
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
       // valid!
  function character1Only(input){
	var regex = /[^a-z']/gi;
	input.value = input.value.replace(regex,"");
}
      // valid!
  function character13Only(input){
	var regex = /[^a-z0-9'-]/gi;
	input.value = input.value.replace(regex,"");
}
       // valid!
 function character12Only(input){
	var regex = /[^abcdef0-9']/gi;
	input.value = input.value.replace(regex,"");
}
      // valid!
 function character14Only(input){
	var regex = /[^0-9']/gi;
	input.value = input.value.replace(regex,"");
}
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>