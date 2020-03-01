<!DOCTYPE html>
<?php
    require_once 'session.php';
?>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

        <div id = "sidecontent" class = "well pull-right">
            <div class = "alert alert-info">Recent reported offenses </div>
            <button type = "button" id = "" class = "btn btn-success" onClick="window.print()" ><span class = "fa fa-print"></span> print</button>

            <br />
            <br />
            <div id = "station_table" class = "panel panel-default">
                <div  class = " panel-heading"> 
                    <table id = "table" class = "table table-bordered">
                        <thead>
                            <tr>
                                <th>License ID</th>
                                <th>License_holder Name</th>
                                <th>License_holder Surname</th>
                                <th>Offense committed</th>
                                <th>Fine_in$ </th>
                                <th>location</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    // join start
                                    $s_query = $conn->query("SELECT * FROM `offenses` JOIN drivers ON drivers.license_id =offenses.license_id WHERE reporter='$session'") or die(mysqli_error($conn));
                                    while($s_fetch = $s_query->fetch_array()){  
                                ?>
                                <tr>
                                    <td><?php echo $s_fetch['license_id']?></td>
                                    <td><?php echo $s_fetch['firstname']?></td>
                                    <td><?php echo $s_fetch['lastname']?></td>
                                    <td><?php echo $s_fetch['offense_committed']?></td>
                                    <td><?php echo $s_fetch['dollar']?></td>
                                    <td><?php echo $s_fetch['location_of']?></td>
                                    <td><?php echo $s_fetch['chi_date']?></td>
                                   
                                    
                                </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>  
            </div>
            
        <br /><br /><br />
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        $('#table').DataTable();
    })
</script>
<script type = "text/javascript">
// validation for inputs
function charactersOnly(input){
    var regex = /[^a-z0-9]/g;
    input.value = input.value.replace(regex,"");
}
function namesOnly(input){
    var regex = /[^a-z0-9']/g;
    input.value = input.value.replace(regex,"");
}
function numbersOnly(input){
    var regex = /[^0-9]/g;
    input.value = input.value.replace(regex,"");
}
    $(document).ready(function(){
        $('.id').on('click', function(){
            $id = $(this).attr('name');
            $('.delete_locations').on('click', function(){
                window.location = 'delete_location.php?id=' + $id;
            });
        })
    });
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>