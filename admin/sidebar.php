<div id = "sidebar">
	<ul id = "menu" class = "nav menu">
		<li>
			<a>
				<?php 
					require_once '../connect.php';
					$q_admin_side = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
					$f_admin_side = $q_admin_side->fetch_array();
					echo "<center>".$f_admin_side['name']."</center>";
				?>
			</a>
		</li>
		<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Home</a></li>
		<li><a href = ""><i class = "glyphicon glyphicon-user"></i> Manage data</a>
			<ul>
				<li><a href = "admin.php"><i class = "glyphicon glyphicon-user"></i> Administrator</a></li>
				<li><a href = "driver.php"><i class = "glyphicon glyphicon-user"></i> Drivers</a></li>
				<li><a href = "vid.php"><i class = "glyphicon glyphicon-user"></i> VID users</a></li>
				<li><a href = "officer.php"><i class = "glyphicon glyphicon-user"></i> Officer users</a></li>
			</ul>
		</li>
		<li><a href = "endorsed_list.php"><i class = "glyphicon glyphicon-list"></i>Endorsements list</a></li>
		<li><a href = "offense_list.php"><i class = "glyphicon glyphicon-list"></i>Add offense</a></li>
		<li><a href = "locations_list.php"><i class = "glyphicon glyphicon-list"></i>Add locations</a></li>
		<li><a href = ""><i class = "glyphicon glyphicon-piggy-bank"></i> Reports</a>
			<ul>
				<li><a href = "stats.php"><i class = "glyphicon glyphicon-piggy-bank"></i> Offense per region</a></li>
             <li><a href = "rep_commit.php"><i class = "glyphicon glyphicon-piggy-bank"></i> Committed offenses</a></li>
              <li><a href = "rep_imp.php"><i class = "glyphicon glyphicon-piggy-bank"></i> Impounded vehicle</a></li>
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