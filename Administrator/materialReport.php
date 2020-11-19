<?php include ("dbconn.php");?>

<!DOCTYPE html>
<html>
<head>
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
  	<?php
	
//Pie Chart for Product Orders
          $value = 0;
          $bankPaper_qu = 0 ;
          $art_qu = 0 ;
          $laser_qu = 0 ;
          $bright_qu = 0 ;
          $stone_qu = 0 ;
          $colour_qu = 0 ;

          $sql="SELECT * FROM used_materials";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $material = $row["u_mname"];
              $quantity = $row["quantity"];
              $value = $value + $quantity;

              if ($material == "Bank paper") {
                $bankPaper_qu = $bankPaper_qu + $quantity;
              }
              elseif ($material == "Art paper"){
                $art_qu = $art_qu + $quantity;
              }
               elseif ($material == "Laser Printer Paper"){
                $laser_qu = $laser_qu + $quantity;
              }
              elseif ($material == "Bright White"){
                $bright_qu = $bright_qu + $quantity;
              }
              elseif ($material == "Stone Paper"){
                $stone_qu = $stone_qu + $quantity;
              }
              elseif ($material == "Colour Boad"){
                $colour_qu = $colour_qu + $quantity;
              }

            }
          }

          $bankPaper_qu1 = round(($bankPaper_qu/$value)*100,2) ;
          $art_qu1 = round(($art_qu/$value)*100,2) ;
          $laser_qu1 = round(($laser_qu/$value)*100,2) ;
          $bright_qu1 = round(($bright_qu/$value)*100,2) ;
          $stone_qu1 = round(($stone_qu/$value)*100,2) ;
          $colour_qu1 = round(($colour_qu/$value)*100,2) ;

          //$conn-> close();

  $dataPoints = array( 
  array("label"=>"Bank Paper", "y"=>$bankPaper_qu1),
  array("label"=>"Art paper", "y"=>$art_qu1 ),
  array("label"=>"Laser Printer Paper", "y"=>$laser_qu1),
  array("label"=>"Bright White", "y"=>$bright_qu1),
  array("label"=>"Stone Paper", "y"=>$stone_qu1),
  array("label"=>"Colour Boad", "y"=>$colour_qu1),
  )

?>
    <script>
      window.onload = function() {
       
       
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Usage of Material"
        },
        subtitles: [{
          text: "2020"
        }],
        data: [{
          type: "pie",
          yValueFormatString: "#,##0.00\"%\"",
          indexLabel: "{label} ({y})",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
       
      }
  </script>
  	<style>
		table {
		  border-collapse: collapse;
		  width: 80%;
		}

		th, td {
		  padding: 8px;
		  text-align: left;
		  border-bottom: 1px solid #ddd;
		}
	</style>

  </head>
<body>
	<div class="content">
    <div class="main">
      <div class="content1">
           <div id="chartContainer" class="chart1" style="height: 370px; width: 50%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      </div>

      <div class="content2">
          <h2>Material</h2>
     	<table>
	      	<thead>
		      <tr>
		      	<th>Product ID</th>
		        <th>Product</th>
		        <th>Total of Quantity</th>
		        <th>Percentage</th>
		        
		      </tr>
      		</thead>
      		<tr>
      			<td>M001</td>
      			<td>Bank paper</td>
      			<td><?php echo "$bankPaper_qu"?></td>
      			<td><?php echo "$bankPaper_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>M003</td>
      			<td>Art paper</td>
      			<td><?php echo "$art_qu"?></td>
      			<td><?php echo "$art_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>M004</td>
      			<td>Laser Printer Paper</td>
      			<td><?php echo "$laser_qu"?></td>
      			<td><?php echo "$laser_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>M005</td>
      			<td>Bright White</td>
      			<td><?php echo "$bright_qu"?></td>
      			<td><?php echo "$bright_qu1"?>%</td>
      		</tr>
          <tr>
            <td>M006</td>
            <td>Stone Paper</td>
            <td><?php echo "$stone_qu"?></td>
            <td><?php echo "$stone_qu1"?>%</td>
          </tr>
          <tr>
            <td>M007</td>
            <td>Colour Boad</td>
            <td><?php echo "$colour_qu"?></td>
            <td><?php echo "$colour_qu1"?>%</td>
          </tr>
      			
    	</table>

  
      </div><br><br>
    </div>
  </div>
  	<form>
  		<button onclick="window.print()">Print</button>
  	</form>
		
</body>
</html>