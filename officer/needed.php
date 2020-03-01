<form class="form-horizontal" method="POST" action="get_driverid.php">
			<div class="control-group">
				<label class="control-label" for="">license</label>
				 <input name="license_id" style="" type="text" value ="<?php echo $f_student['license_id'];?>" id="" placeholder="" />
			</div>
           
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
         <!-- <div class = "form-horizontal">
				<button type = "button"   name="capture_offense"class = "btn btn-primary form-control"><span class = "glyphicon glyphicon-bitcoin"></span> capture offense</button>
			</div> -->
			<input type ="submit" id ="capture_offense" name ="capture_offense" value ="capture offense"   class = "btn btn-primary form-control">
       </form>
	</div>
	<!-- query for suming  up column value with same id -->
	<!-- question  -->
	Item         ItemName        PackageID  Specifics    brandname  GRNQty  UnitPric GRNValue
102814742801 ALL BRAN FLAKES 1PKT       Bran.        KELLOGS    7       15.9    111.3
102814742801 ALL BRAN FLAKES 1PKT                    KELLOGS    50      15.9    795
100314860301 ALMOND FLAKED   1PKT       Alm.         HYSON      20      52      1040
100314860301 ALMOND FLAKED   1PKT                    HYSON      30      52      1560
101814899665 ALMONDS ROASTED 1KG                     HOMELINE   250     59.5    14875
101426707397 ANCHOVY FILLETS 1TIN       Anch.        VARIOUS    4       34      136
101426707397 ANCHOVY FILLETS 1TIN                    VARIOUS    8       34      272
I'd like to get the sum of a particular Item in the column. I want to do Sum of GRNQty as well as GRNValue of Same Type Item in the table.
	<!- -->
	SELECT SUM(GRNQty) GRNQtySum,SUM(GRNValue) GRNValueSum
FROM mytable WHERE Item = '102814742801';
<!-- 2 -->
SELECT Item,SUM(GRNQty) GRNQtySum,SUM(GRNValue) GRNValueSum
FROM mytable GROUP BY Item;
<!-- 3 -->
SELECT PackageID,SUM(GRNQty) GRNQtySum,SUM(GRNValue) GRNValueSum
FROM mytable GROUP BY PackageID;
<!-- 4 -->
SELECT brandname,SUM(GRNQty) GRNQtySum,SUM(GRNValue) GRNValueSum
FROM mytable GROUP BY brandname;