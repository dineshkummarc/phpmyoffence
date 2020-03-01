<!- developer tremendous chatikobo time at 10:50 11/17/2018 -->

  <form method="post" action="impound_add.php">
     licence_id:
    <input type="text" name="license_id" class="form-control" placeholder="six  Characters"  value="<?php echo $f_driver['license_id']?>" required="required" readonly />
      
  <label>Regnumber</label>
            <input  class="form-control status" id ="#" type="text" name="regnumber" value=""  />
            <br />

  <label>Vehicle_color</label>
            <input  class="form-control status" id ="" type="text" value="" name="vehicle_color" />
            <br />
 <label>Model</label>
            <input  class="form-control status" id ="" type="text" value="" name="model" />
  <label>Year of man</label>
            <input  class="form-control status" id ="" type="text" value="" name="year_man" />
            <br />
           <br />
 <label>Date of impounding</label>
            <input  class="form-control status" id ="" type="text" value="" name="date_in" />
            <br />
 
 
          <br>
          <br>
                </select>
             <input type="submit" name="add" value="impound "  class="btn btn-success form-control"/>

  </form>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$('#myselect').on('change', function(){
  $('#myinput').val($(this).val());
})
$('#myselect').change();
</script>