<!- developer tremendous chatikobo time at 10:50 11/17/2018 -->

  <form method="post" action="offense_added.php">
     licence_id:
    <input type="text" name="license_id" class="form-control" placeholder="six  Characters"  value="<?php echo $f_driver['license_id']?>" required="required" readonly />
   
   
	<label>offense</label>
      <select class = "form-control status" id ="myselect" name="offense_name" required = "required">
          <!-- //seletct statment  required pattern="[a-zA-Z]{6}$"   -->
          <!-- while records exist -->
          <!-- <option> name from db</option> -->
          <!-- close while with curly brace -->
          <?php include'connect.php';
             $query = mysqli_query( $conn, "SELECT * FROM offense_categorie ");
             while ($row = mysqli_fetch_array($query)){
              $offname = $row['offense_name'];
              $offense=$row['offense_points'];
              ?><option value="<?php echo $offname; ?>"><?php echo $offname; ?></option><?php
             }
          ?>
                </select>
      
  <label>offense  weight</label>
            <input  class="form-control status" id ="myinput" type="hidden"value="" readonly />
            <br />

  <label>officer reporter</label>
            <input  class="form-control status" id ="" type="text" value="" name="reporter" />
            <br />
 <label>Location</label>
      <select class = "form-control status" id ="" name="location" required = "required">
          <!-- //seletct statment  required pattern="[a-zA-Z]{6}$"   -->
          <!-- while records exist -->
          <!-- <option> name from db</option> -->
          <!-- close while with curly brace -->
          <?php include'connect.php';
             $q = mysqli_query( $conn, "SELECT * FROM stations_city ");
             while ($rcity= mysqli_fetch_array($q)){
              $loca = $rcity['location'];
              $bra = $rcity['branch'];
              ?><option value="<?php echo $loca.$bra; ?>"><?php echo $loca; ?></option><?php
             }
          ?>
          <br>
          <br>
                </select>
             <input type="submit" name="add" value="Capture offense"  class="btn btn-success form-control"/>

  </form>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$('#myselect').on('change', function(){
  $('#myinput').val($(this).val());
})
$('#myselect').change();
</script>