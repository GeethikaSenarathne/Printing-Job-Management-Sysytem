<?php include ("dbconn.php");?>
<!DOCTYPE HTML>
<html>
<head>  
  <head>
    <table width="100%">
    <thead>
      <tr>
        <th rowspan="3" width="40%"><img src="images/logo.png"/></th>
        <th></th>
        <th><h1>Nihal Printers</h1></th>
        <th><h4>No 35, Mihidu Mawatha, Kurunegala<br>
        037-3456754</h4></th>
      </tr>
      </thead>
    </table><br><br><br><br>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "Completed Products, 2020"
  },  
  axisY: {
    title: "No of Orders",
    titleFontColor: "#4F81BC",
    lineColor: "#4F81BC",
    labelFontColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "No of Orders",
    titleFontColor: "#C0504E",
    lineColor: "#C0504E",
    labelFontColor: "#C0504E",
    tickColor: "#C0504E"
  },  
  toolTip: {
    shared: true
  },
  legend: {
    cursor:"pointer",
    itemclick: toggleDataSeries
  },
  data: [
  <?php   
    $q = "SELECT * FROM `product`";
    $result = $conn->query($q);
    while($row = $result->fetch_assoc()){


  ?> 
  {
    type: "column",
    name: "<?php echo $row['p_name']; ?>",
    legendText: "<?php echo $row['p_name']; ?>",
    showInLegend: true, 
    dataPoints:[
      <?php 
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        for($i = 0; $i < 12; $i++){
          $q2 = "SELECT COUNT(o_id) AS c FROM `orders` WHERE product='".$row['p_name']."' AND month(`delivery_date`) = '".($i + 1)."'";
          
          $result2 = $conn->query($q2);
          $row2 = $result2->fetch_assoc();
          echo '{ label: "'.$months[$i].'", y: '.$row2['c'].' },';
        }
      ?>

    ]
  },
<?php } ?>
  
  ]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else {
    e.dataSeries.visible = true;
  }
  chart.render();
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<form>
      <button onclick="window.print()">Print</button>
</form>
</body>
</html>