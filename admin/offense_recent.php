<!- developer tremendous chatikobo time at 10:50 1
1/17/2018 -->

  <!--  select all recent offenses by the same license_id  -->
    <div id = "" class = "panel panel-default">
        <div  class = " panel-heading"> 
          <table id = "table" class = "table table-bordered">
            <thead>
              <tr>
                <th>Offense_committed</th>
                <th>location</th>
                <th>date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $license_id = $f_driver['license_id'];
              $stat_query = $conn->query("SELECT *FROM offenses WHERE license_id='$license_id'") or die(mysqli_error($conn));
              while($row=mysqli_fetch_array($stat_query)){
              ?>
              <tr>
                <td><?php echo $row['offense_committed']?></td>
                <td><?php echo $row['location_of']?></td>
                <td><?php echo $row['chi_date']?></td>
                
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>  
      </div>
<script src="js/jquery-1.8.3.min.js"></script>
