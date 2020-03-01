<!DOCTYPE html>
<?php
	require_once 'session.php';
?>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">Offenses </div>
			<button type = "button" id = "add_offense" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add offenses</button>
			<button style = "display:none;" type = "button" id = "cancel_offense" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
			<br />
			<br />
			<div id = "act_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>Offense >name</th>
								<th>Offense points/weight</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$act_query = $conn->query("SELECT * FROM `offense_categorie`") or die(mysqli_error());
							while($act_fetch = $act_query->fetch_array()){
							?>
							<tr>
								<td><?php echo $act_fetch['offense_name']?></td>
								<td><?php echo $act_fetch['offense_points']?></td>
								
								<td><center><a href = "edit_activity.php?activity_id=<?php echo $act_fetch['offense_id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> </center></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class = "modal fade" id = "delete_activity" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger delete_activity" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div id = "act_form" style = "display:none;" class = "panel panel-default">
				<div  class = " panel-heading" >	
					<div class = "alert alert-success">Offense/Add new</div>
					<div style = "width:40%; margin-left:32%;">	
						<form method = "POST" action = "add_offense.php">	
							<div class = "form-group">
								<label>offense name</label>
								<input type = "text" class = "form-control" name = "offense_name" onKeyup ="namesOnly(this)" required = "required"/>
							</div>
							
							<div class = "form-group">
								<label>offense points</label>
								<input type = "number" min="1" class = "form-control" name = "offense_points"  onKeyup ="numbersOnly(this)" required = "required"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-primary form-control" name = "save_offense"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
// validation for inputs
function charactersOnly(input){
	var regex = /[^a-z0-9]/g;
	input.value = input.value.replace(regex,"");
}
function namesOnly(input){
	var regex = /[^a-z ']/gi;
	input.value = input.value.replace(regex,"");
}
function numbersOnly(input){
	var regex = /[^0-9]/g;
	input.value = input.value.replace(regex,"");
}

	$(document).ready(function(){
		$('.activity_id').on('click', function(){
			$activity_id = $(this).attr('name');
			$('.delete_activity').on('click', function(){
				window.location = 'delete_activity.php?activity_id=' + $activity_id;
			});
		})
	});
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>