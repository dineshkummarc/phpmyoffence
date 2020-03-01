<!--  tremendous chatikobo  at 10:50 pm 11/17/2018 -->
<?php	
	require_once '../connect.php';
	$q_driver = $conn->query("SELECT * FROM `drivers` WHERE license_id = '$_GET[license_id]'") or die(mysqli_error());
	$f_driver = $q_driver->fetch_array();
?>
<input type = "hidden" id = "license_id" value = "<?php echo $f_driver['license_id']?>"/>
<img style = "margin:20px;" class = "pull-left" src = "<?php if($f_driver['photo'] == "default.png"){echo "../images/".$f_driver['photo'];}else{echo "../upload/".$f_driver['photo'];}?>" height = "150px" width = "150px"/>
<div style = "padding:20px; margin-left:50px;" class = "col-md-8 alert-success">	
	<table class = "table">	
		<tr>
			<td><label>License ....ID:</label></td><td><label class = "text-success"><?php echo $f_driver['license_id']?></label></td>
		</tr>
		<tr>
			<td><label>Name:</label></td><td><label class = "text-success"><?php echo $f_driver['firstname']?></label></td>
		</tr>
		<tr>
			<td><label>Surname:</label></td><td><label class = "text-success"><?php echo $f_driver['lastname']?></label></td>
		</tr>
		<tr>
			<td><label>DOB:</label></td><td><label class = "text-success"><?php echo $f_driver['dob']?></label></td>
		</tr>
		<tr>
			<td><label>class:</label></td><td><label class = "text-danger"><?php echo $f_driver['class']?></label></td>
		</tr>
		<tr>
			<td><label>Gender:</label></td><td><label class = "text-success"><?php echo $f_driver['gender']?></label></td>
		</tr>
	</table>
</div>
<br style = "clear:both;"/>
<br />
<div class = "row">
	<div class = "col-md-8"></div>
	<div class = "col-md-12 well text-danger ">
		<!-- modal is the best to use here other than the form -->
		<!-- <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> + compile offense</button>
		 -->
		<!-- <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myoffense"> +status</button> -->
		<?php
            require_once '../connect.php';
           // endorsements algorithm begins here(equi_join)
            // attention 
	     $license_id = $f_driver['license_id'];
	     $take = $conn->query("SELECT SUM(of.offense_points) Total_points FROM offense_categorie of,offenses o WHERE  of.offense_name=o.offense_committed AND o.license_id = '$license_id'") or die(mysqli_error($conn));
	    while($row=mysqli_fetch_array($take)){
		$endo= $row['Total_points'];
		if($endo>24){
			?>
<!-- 	<button type="button" class="btn disabl btn-primary btn-xs" data-toggle="modal" data-target="#myModal" > + compile offense</button> -->
            <a href="offense_add1.php?id= <?php echo $license_id ;?>">impound</a>

			<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myoffense"> view_status</button>
			<?php
			 echo "Your license is endorsed for six months,start from 27/11/2018. your offense weight is $endo";
		   }
		elseif ($endo==0){
			?>
		   <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myoffense"> +status</button>
		<?php
		echo "Normal.NO offense committed yet! your offense weight is 0";
		   }
		else
		{
		
		?>
		<!-- insert -->
	
		  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myoffense"> +status</button>
		
		<?php
		echo"normal,your offense weight is $endo";
		  }
	       }
      ?>
      <!-- if the license is endorsed the next stage will be impounding the vihecle ,, there use  way to show btn for impounding only if the 
      car is impounded  -->
      <!-- end of endorsements algorithm  -->
</div>
<!-- first modal for compiling offense -->
<div class="modal fade" id="#myModal" role="dialog">
    <div class="modal-dialog" style="width:400px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Compile offenses</h4></center>
        </div>
          <div class="modal-body">
        	<!-- formwithin the modal starts -->
        	<!-- using the same modal for each driver all history of ofenses commited by date location must be shown  -->
          <p><?php include "offense_add.php"; ?></p>
          </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
      </div>
      
    </div>
  </div>
 </div>
 <!-- second modal for recents committed offenses -->
 <div class="modal fade" id="myoffense" role="dialog">
      <div class="modal-dialog" style="width:700px;">
    
      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <center><h4 class="modal-title">Recent offenses</h4></center>
              </div>
             <div class="modal-body">
        	     <!-- formwithin the modal starts -->
        	      <!-- using the same modal for each driver all history of ofenses commited by date location must be shown  -->
                  <p><?php include "offense_recent.php"; ?></p>
             </div>
             <div class="modal-footer">
             	<!-- nested modalform  -->
                  <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+Compile Offense</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
         </div>
   </div>
<!-- third modal for impounding the vehicle -->
 <div class="col-md-4 modal-grids">
				
		   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Compile offenses</h4>
			</div>
			    <div class="modal-body">
				<p><?php include "offense_add.php"; ?></p>	
			    </div>
			          </div>
			             </div>
			       </div>
			</div>
 <!-- testing sum function  -->
 <!-- if the sum of offensepoints on same license_id is greater than the limit then the license is endorsed -->
 <?php
	// require_once '../connect.php';
	// // $license_id = $_POST['license_id'];
	// $license_id = $f_driver['license_id'];
	// $take = $conn->query("SELECT SUM(offense_points) Total_points FROM `offenses` WHERE `license_id` = ''") or die(mysqli_error($conn));
	// while($row=mysqli_fetch_array($take)){
	// 	$endo= $row['Total_points'];
	// 	if($endo>10){
	// 		echo "endorsed". $row['Total_points'];
	// 	}
	// 	else
	// 	{
	// 	echo"normal". $row['Total_points'];	
	// 	}
	// }
	
?>
<script src = "../js/script1.js"></script>

