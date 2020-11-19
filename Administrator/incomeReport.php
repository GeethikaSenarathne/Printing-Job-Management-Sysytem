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
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Top Oil Reserves"
  },
  axisY: {
    title: "Reserves(MMbbl)"
  },
  data: [{        
    type: "column",  
    showInLegend: true, 
    legendMarkerColor: "grey",
    legendText: "MMbbl = one million barrels",
    dataPoints: [   
      <?php
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        for($i = 0; $i < 12; $i++){
          $q2 = "SELECT SUM(total_cost) AS c FROM `Payment` WHERE month(`date`) = '".($i + 1)."'";
          
          $result2 = $conn->query($q2);
          $row2 = $result2->fetch_assoc();
          
          echo '{ y: '.$row2['c'].',label: "'.$months[$i].'" },';
        }
      ?>

      
      
    ]
  }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<form>
      <button onclick="window.print()">Print</button>
</form>
</body>
</html>