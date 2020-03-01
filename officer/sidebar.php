<div id = "sidebar">
	<ul id = "menu" class = "nav menu">
		<li>
			<a>
				<?php 
					require_once '../connect.php';
					$q_admin_side = $conn->query("SELECT * FROM `officer_user` WHERE `username` = '$_SESSION[username]'") or die(mysqli_error());
					$f_admin_side = $q_admin_side->fetch_array();
					echo "<center> WELCOME ".$f_admin_side['name']."</center>";
				?>
			</a>
		</li>
		<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Home</a></li>
		<li><a href = ""><i class = "glyphicon glyphicon-user"></i> Manage data</a>
			<ul>
				<!-- <li><a href = "admin.php"><i class = "glyphicon glyphicon-user"></i> Administrator</a></li> -->
				<li><a href = "driver.php"><i class = "glyphicon glyphicon-user"></i> Drivers</a></li>
			</ul>
		</li>
		
		<li><a href = ""><i class = "glyphicon glyphicon-piggy-bank"></i> Reports</a>
			<ul>
				<li><a href = "reports.php"><i class = "glyphicon glyphicon-user"></i> Recent committed offenses</a></li>
				<!-- <li><a href = "#"><i class = "glyphicon glyphicon-user"></i> Reports</a></li> -->
			</ul>
		</li>
		<li><a href = "check_license.php"><i class = "glyphicon glyphicon-ruble"></i> Check license</a></li>
		<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Options</a>
			<ul>
				<li><a href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a></li>
			</ul>
		</li>
	</ul>
</div>