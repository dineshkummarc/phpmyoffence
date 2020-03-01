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
				<div class = "alert alert-info">Accounts/drivers</div>
				
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th>license ID</th>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Class_</th>
									<th>DOB_</th>
									<th>Gender_</th>
									<th>Picture</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$s_query = $conn->query("SELECT * FROM `drivers`") or die(mysqli_error($conn));
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['license_id']?></td>
									<td><?php echo $s_fetch['firstname']?></td>
									<td><?php echo $s_fetch['lastname']?></td>
									<td><?php echo $s_fetch['class']?></td>
									<td><?php echo $s_fetch['dob']?></td>
									<td><?php echo $s_fetch['gender']?></td>
									<td><center><img src ="<?php if($s_fetch['photo'] == "default.png"){echo "../images/".$s_fetch['photo'];}else{echo "../upload/".$s_fetch['photo'];}?>" height = "45px" width = "45px"/></center></td>
									<td><center><a href = "view_driver.php?id=<?php echo $s_fetch['id']?>" class="btn btn-success btn-mini"><span class="icon-search"></span> View</a> </center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_student" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Accounts/License/Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_driver.php">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '../images/default.png'" height = "200px" width = "200px" id="pic" src="#"  required="required"/>
									</div>
									<br />
									<div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image"  required/>
									</div>
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>License Number</label>
										<input type = "text" class = "form-control"  name = "license_id"  value="02018<?php 
$prefix= md5(time()*rand(1, 9)); echo strip_tags(substr($prefix ,0,6));?>"  readonly Required />
<!-- md5 for not repeating the license number ,, find a better way ton avoid repeating number  withou using md5 
that is the best for valiadtion  -->
									</div>
									<div class = "form-group">
										<label>Firstname</label>
										<input type = "text" class = "form-control"  name = "firstname" required = "required"/>
									</div>
						
									<div class = "form-group">
										<label>Lastname</label>
										<input type = "text" class = "form-control"  name = "lastname" required = "required"/>
									</div>
									<!-- <div class = "form-group">
										<label>Year</label>
										<select class = "form-control" name = "year" required = "required">
											<option>Please select an option</option>
											<option value = "I">I</option>
											<option value = "II">II</option>
											<option value = "III">III</option>
											<option value = "IV">IV</option>
										</select>
									</div> -->
									<div class = "form-group">
										<label>class</label>
										<input type = "number"  min="1" class = "form-control"  placehoder="eg 2" name = "class"/>
									</div>
									<div class = "form-group">
										<label>DOB</label>
										<!-- must be validated 18 years back from now -->
										<input type = "date" style = "width:41%;" max="01/12/2005" class = "form-control"  name = "dob" required = "required"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_driver"><span class = "glyphicon glyphicon-save"></span> Save</button>
									</div>
								</div>	
							</form>		
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200)
						.css('display', 'block');
					$('.pic_hide').hide();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_student').on('click', function(){
				window.location = 'delete_student.php?id=' + $id;
			});
		});
	});
</script>
</html>