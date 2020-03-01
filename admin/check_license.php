<!DOCTYPE html>
<?php
	require_once 'session.php';
?>

<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">Drivers details</div>
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<div class = "form-inline">
						<label>Enter License ID:</label>
						<input type = "text" style = "width:200px;" class = "form-control" onKeyup ="charactermixOnly(this)" min = "0" max = "999999" id = "search" required/>
						<button class = "btn btn-primary" id = "btn_search"><span class = "glyphicon glyphicon-search"></span></button>
					</div>
					<hr style = "border-top:1px dotted #000;"/>
					
					<div id = "result">
						
					</div>
					<div id = "offense_form">
						
					</div>

					<br style = "clear:both;"/>
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
<script type="text/javascript">
// licnse id must have 4 characters
function charactermixOnly(input){
	var regex = /[^abcdefx0-9]/gi;
	input.value = input.value.replace(regex,"");
}
</script>

<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>

