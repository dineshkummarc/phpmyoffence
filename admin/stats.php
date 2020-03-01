<!DOCTYPE html>
<?php
  require_once 'session.php';
  require_once '../connect.php';
?>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "drivers_endorsements");
$sub_query = "
   SELECT location_of, count(*) as loca FROM offenses
   GROUP BY location_of 
   ORDER BY id ASC";
$result = mysqli_query($connect, $sub_query);
$data = array();
while($row = mysqli_fetch_array($result))
{
 $data[] = array(
  'label'  => $row["location_of"],
  'value'  => $row["loca"]
 );
}
$data = json_encode($data);
?>


<!DOCTYPE html>
<html>
 <head> 
  <link rel="stylesheet" href="../js/morris.js/bootstrap.min.css" />
  <link rel="stylesheet" href="../js/morris.js/morris.css">
  <script src="../js/morris.js/jquery.min.js"></script>
  <script src="../js/raphael/raphael.min.js"></script>
  <script src="../js/morris.js/morris.min.js"></script>  
 </head>
 <body>
  <div id = "sidecontent" class = "well pull-right">
        <div class = "alert alert-info">Overal statistics of offenses per region</div>
        <button type = "button" id = "" class = "btn btn-success" onClick="window.print()" ><span class = "fa fa-print"></span> print</button>

        <br />
        <br />
  <div class="container" style="width:900px;">
   <h2 align="center">Hover the chart to see number of offenses per region</h2>
   
   <div id="chart"></div>
  </div>
</div>
</div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 var donut_chart = Morris.Donut({
     element: 'chart',
     data: <?php echo $data; ?>
    });
  
 $('#like_form').on('submit', function(event){
  event.preventDefault();
  var checked = $('input[name=framework]:checked', '#like_form').val();
  if(checked == undefined)
  {
   alert("nonses");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"#",
    method:"POST",
    data:form_data,
    dataType:"json",
    success:function(data)
    {
     $('#like_form')[0].reset();
     donut_chart.setData(data);
    }
   });
  }
 });
});

</script>
