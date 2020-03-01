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
			
			<div id = "" class = "panel panel-default">
				<div  class = " panel-heading">	
<?php	
	require_once '../connect.php';
	// some error here need attention 
	$q_driver = $conn->query("SELECT * FROM `drivers` WHERE license_id = '$_GET[id]'") or die(mysqli_error());
	$f_driver = $q_driver->fetch_array();
	$id=$_GET["id"];
?>
				<form method="POST" action="imp_added.php">
     licence_id:
   <input type="text" name="license_id" class="form-control" placeholder="six  Characters"  value="<?php echo $_GET['id']?>" required="required" readonly />
   
    <label>Vehicle Numberplate</label>
      <input  class="form-control status" id ="" type="text" value="" name="regnumber" />
    <label>Vehicle color</label>
      <input  class="form-control status" id ="" type="text" value="" name="vehicle_color" />
    <label>Model</label>
      <input  class="form-control status" id ="" type="text" value="" name="model" />
    <label>Year of manufacture</label>
       <input  class="form-control status" id ="" type="text" value="" name="year_man" />
          <br />       
             <input type="submit" name="impound" value="Impound the vehicle"  class="btn btn-success form-control"/>

  </form>
  <?php include 'imp_added.php';?>
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
	// 
	$('#myselect').on('change', function(){
  $('#myinput').val($(this).val());
})
$('#myselect').change();
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
