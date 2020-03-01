
<?php include'head.php'?>
<!--------------------HEAD---------------------->
	<div class = "container-fluid" id = "content">
		<div class = "row">	
			<div class = "col-md-2">	
			</div>
			<div class = "col-md-2">	
			</div>
			<div class = "col-md-4">	
				<div class = "panel panel-primary">
					<div class = "panel-heading">
						<h4>Administrator Login</h4>
					</div>
					<div class = "panel-body">
						<form method = "POST" enctype = "multipart/form-data">
							<div class = "form-group">
								<label>Username</label>
								<input type = "text" id = "username" class = "form-control" />
							</div>
							<div class = "form-group">
								<label>Password</label>
								<input type = "password" maxlength = "12" id = "password" class = "form-control" />
							</div>
							<div id = "loading">
							</div>
							<br />
							<div class = "form-group">
								<button type = "button" class = "btn btn-primary form-control" id = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
							</div>
						</form>
					</div>
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
<script src = "../js/script.js"></script>
</html>