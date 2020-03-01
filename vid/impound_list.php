<?php include 'header.php';?>
            <!-- /.navbar-top-links -->

            <?php include"side_bar.php";?>
            <!-- /.navbar-static-side -->
           <?php require_once '../connect.php';?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class = "alert alert-info">impounded vehicle list</div>
                <!-- <button type = "button" id = "add_driver" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add license</button>
                <button style = "display:none;" type = "button" id = "cancel_driver" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
                <br /> -->
                <br />
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          impouded vehicles
                        </div>
                        <!-- /.panel-heading -->
                        <div id ="s_table" class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>License ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Number Plate</th>
                                        <th>Vehicle Color_</th>
                                        <th>Model</th>
                                        <th>Year of Mnaufacture</th>
                                        <th>Date of impound</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                    // join start
                                    $s_query = $conn->query("SELECT * FROM `impounding` JOIN drivers ON drivers.license_id =impounding.license_id") or die(mysqli_error($conn));
                                    while($s_fetch = $s_query->fetch_array()){  
                                ?>
                                <tr>
                                    <td><?php echo $s_fetch['license_id']?></td>
                                    <td><?php echo $s_fetch['firstname']?></td>
                                    <td><?php echo $s_fetch['lastname']?></td>
                                    <td><?php echo $s_fetch['regnumber']?></td>
                                    <td><?php echo $s_fetch['vehicle_color']?></td>
                                    <td><?php echo $s_fetch['model']?></td>
                                    <td><?php echo $s_fetch['year_man']?></td>
                                    <td><?php echo $s_fetch['date_in']?></td>
                                    
                                </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                            <!-- /.table-responsive -->
                        </div>
                        <div id = "s_form" style = "display:none;" class = "panel panel-default">
                    <div  class = " panel-heading" >    
                            <div class = "alert alert-success">Accounts/License/Add new</div>
                            <form method = "POST" enctype = "multipart/form-data" action = "add_driver.php">
                                <div class = "pull-left">
                                    <div id = "picture">
                                        <img onerror="this.src = '../images/default.png'" height = "200px" width = "200px" id="pic" src="#"  required="required"/>
                                    </div>
                                    <br />
                                    <div class = "form-group">
                                        <input type='file' onchange="readURL(this);" name = "image"  required/>
                                    </div>
                                </div>
                                <div style = "width:40%; margin-left:32%;"> 
                                    <div class = "form-group">
                                        <label>License Number</label>
                                        <input type = "text" class = "form-control"  name = "license_id"  value="02018<?php 
$prefix= md5(time()*rand(1, 9)); echo strip_tags(substr($prefix ,0,6));?>"  readonly Required />
<!-- md5 for not repeating the license number ,, find a better way ton avoid repeating number  withou using md5 
that is the best for valiadtion  -->
                                    </div>
                                    <div class = "form-group">
                                        <label>Firstname</label>
                                        <input type = "text" class = "form-control"  name = "firstname" required = "required"/>
                                    </div>
                        
                                    <div class = "form-group">
                                        <label>Lastname</label>
                                        <input type = "text" class = "form-control"  name = "lastname" required = "required"/>
                                    </div>
                                    <!-- <div class = "form-group">
                                        <label>Year</label>
                                        <select class = "form-control" name = "year" required = "required">
                                            <option>Please select an option</option>
                                            <option value = "I">I</option>
                                            <option value = "II">II</option>
                                            <option value = "III">III</option>
                                            <option value = "IV">IV</option>
                                        </select>
                                    </div> -->
                                    <div class = "form-group">
                                        <label>class</label>
                                        <input type = "number"  min="1" class = "form-control"  placehoder="eg 2" name = "class"/>
                                    </div>
                                    <div class = "form-group">
                                        <label>DOB</label>
                                        <!-- must be validated 18 years back from now -->
                                        <input type = "date" style = "width:41%;" max="01/12/2005" class = "form-control"  name = "dob" required = "required"/>
                                    </div>
                                    <div class = "form-group">
                                        <button class = "btn btn-primary form-control" name = "save_driver"><span class = "glyphicon glyphicon-save"></span> Save</button>
                                    </div>
                                </div>  
                            </form>     
                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src = "../js/script.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
