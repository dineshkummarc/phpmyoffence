<!DOCTYPE html>
<?php
	require_once 'session.php';
?>

<?php include'header.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'side_bar.php'?>
<!-------------------SIDEBAR------------------>


		<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				<div class = "alert alert-info">Drivers license</div>
				<a class = "btn btn-warning" href = "driver.php"><span class = "glyphicon glyphicon-hand-right"> Back</span></a>
				<br />
				<br />
				<div class="row">
                <div class="col-lg-12">
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$q_driver = $conn->query("SELECT * FROM `drivers` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
								$f_driver = $q_driver->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "#?>">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '<?php if($f_driver['photo'] == "default.png"){echo "../images/".$f_driver['photo'];}else{echo "../upload/".$f_driver['photo'];}?>'" height = "200px" width = "200px" id="pic" src="#" />
									</div>
									<br />
									<!-- <div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image" />
									</div> -->
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>License ID</label>
										<input type = "text" class = "form-control"  name = "license_id" value = "<?php echo $f_driver['license_id']?>"  disabled required = "required"/>
									</div>
									<div class = "form-group">
										<label>Firstname</label>
										<input type = "text" class = "form-control"  name = "firstname" value = "<?php echo $f_driver['firstname']?>" disabled required = "required"/>
									</div>
									<div class = "form-group">
										<label>Lastname</label>
										<input type = "text" class = "form-control"  name = "lastname" value = "<?php echo $f_driver['lastname']?>"  disabled placeholder = "Optional"/>
									</div>
									<div class = "form-group">
										<label>Class</label>
										<input type = "text" class = "form-control"  name = "class" value = "<?php echo $f_driver['class']?>" disabled required = "required"/>
									</div>
								   <div class = "form-group">
										<label>Date of birth</label>
										<input type = "text" class = "form-control"  name = "class" value = "<?php echo $f_driver['dob']?>" disabled required = "required"/>
									</div>
					               <div class = "form-group">
										<label>Gender</label>
										<input type = "text" class = "form-control"  name = "class" value = "<?php echo $f_driver['gender']?>" disabled required = "required"/>
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

</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>