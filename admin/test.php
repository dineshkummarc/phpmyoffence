<form id ="" method = "POST" action=" save_offense.php">
			<!-- insert all offense attached to the same license id on same table or different 
		  form id will be used to hide the form if the license is endorsed-->
		  
		<div class = "form-inline">
			
			<div class = "pull-left">	
				<label>offense</label>
				<select class = "form-control status" required = "required">
					<!-- //seletct statment  -->
					<!-- while records exist -->
					<!-- <option> name from db</option> -->
					<!-- close while with curly brace -->
					<?php include'connect.php';
					   $query = mysqli_query( $conn, "SELECT * FROM offense_categorie ");
					   while ($row = mysqli_fetch_array($query)){
					   	$offname = $row['offense_name'];
					   	?><option value="<?php echo $offname; ?>"><?php echo $offname; ?></option><?php
					   }
					?>
				</select>

			</div>
			<!-- <div class = "pull-right">	
				<label>offense</label>
				<select class = "form-control status" required = "required">
					<option value = "">Choose an option</option>
					<option>driving without seatbelts</option>
					<option>over speed</option>
					<option>no headlights</option>
				</select>
			</div> -->
			<br style = "clear:both;"/>
			<br/>
			<br />
			<br />
			<br style = "clear:both;"/>
			<div class = "form-group">
				<button type = "button"   name="capture_offense"class = "btn btn-primary form-control"><span class = "glyphicon glyphicon-bitcoin"></span> capture offense</button>
			</div>
		</div>
		</form>