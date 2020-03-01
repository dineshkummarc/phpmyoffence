<?php	
	require_once '../connect.php';
	$q_student = $conn->query("SELECT * FROM `drivers` WHERE license_id = '$_REQUEST[license_id]'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
?>
<input type = "hidden" id = "license_id" value = "<?php echo $f_student['license_id']?>"/>
<img style = "margin:20px;" class = "pull-left" src = "<?php if($f_student['photo'] == "default.png"){echo "../images/".$f_student['photo'];}else{echo "../upload/".$f_student['photo'];}?>" height = "150px" width = "150px"/>
<div style = "padding:20px; margin-left:50px;" class = "col-md-8 alert-success">	
	<table class = "table">	
		<tr>
			<td><label>License ....ID:</label></td><td><label class = "text-danger"><?php echo $f_student['license_id']?></label></td>
		</tr>
		<tr>
			<td><label>Name:</label></td><td><label class = "text-danger"><?php echo $f_student['firstname']?></label></td>
		</tr>
		<tr>
			<td><label>Surname:</label></td><td><label class = "text-danger"><?php echo $f_student['lastname']?></label></td>
		</tr>
		<tr>
			<td><label>class:</label></td><td><label class = "text-danger"><?php echo $f_student['class']?></label></td>
		</tr>
	</table>
</div>
<br style = "clear:both;"/>
<br />

</div>
<script src = "../js/script1.js"></script>