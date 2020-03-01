<!- developer tremendous chatikobo time at 10:50 11/17/2018 -->

  <form method="post" action="imp_added.php">
   <input type="text" name="license_id" class="form-control" placeholder="six  Characters"  value="<?php echo $_GET['id']?>" required="required" readonly />
   
 <label>Vehiclebb Numberplate</label>
      <input  class="form-control status" id ="" type="text" value="" name="regnumber" />
<label>Vehicle color</label>
      <input  class="form-control status" id ="" type="text" value="" name="vehicle_color" />
<label>Model</label>
      <input  class="form-control status" id ="" type="text" value="" name="model" />
<label>Year of manufacture</label>
      <input  class="form-control status" id ="" type="text" value="" name="year_man" />
          <br />       
             <input type="submit" name="impound" value="Impound the vehicle"  class="btn btn-success form-control"/>

  </form>
