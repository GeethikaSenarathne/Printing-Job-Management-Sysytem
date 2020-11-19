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
          //$sdate=$_POST["sdate"];
          //$edate=$_POST["edate"];
          
	
//Pie Chart for Product Orders
          $value = 0;
          $book_qu = 0 ;
          $brochures_qu = 0 ;
          $box_qu = 0 ;
          $bote_qu = 0 ;
          $note_qu = 0 ;
          $bill_qu = 0 ;

          //$sql="SELECT * FROM orders WHERE delivery_date BETWEEN '$sdate' AND '$edate'";
          $sql="SELECT * FROM orders";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $product = $row["product"];
              $quantity = $row["quantity"];
              $value = $value + $quantity;

              if ($product == "Book") {
                $book_qu = $book_qu + $quantity;
              }
              elseif ($product == "Brochures"){
                $brochures_qu = $brochures_qu + $quantity;
              }
               elseif ($product == "Box"){
                $box_qu = $box_qu + $quantity;
              }
              elseif ($product == "Note Book"){
                $note_qu = $note_qu + $quantity;
              }
              elseif ($product == "Bill Book"){
                $bill_qu = $bill_qu + $quantity;
              }

            }
          }

          $book_qu1 = round(($book_qu/$value)*100,2) ;
          $brochures_qu1 = round(($brochures_qu/$value)*100,2) ;
          $box_qu1 = round(($box_qu/$value)*100,2) ;
          $note_qu1 = round(($note_qu/$value)*100,2) ;
          $bill_qu1 = round(($bill_qu/$value)*100,2) ;


          //$conn-> close();

  $dataPoints = array( 
  array("label"=>"Book", "y"=>$book_qu1),
  array("label"=>"Brochures", "y"=>$brochures_qu1),
  array("label"=>"Box", "y"=>$box_qu1),
  array("label"=>"Note Book", "y"=>$note_qu1),
  array("label"=>"Bill Book", "y"=>$bill_qu1),
  )

?>
    <script>
      window.onload = function() {
       
       
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Product Orders Recieved"
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
          <h2>Product Details</h2>
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
      			<td>PR001</td>
      			<td>Book</td>
      			<td><?php echo "$book_qu"?></td>
      			<td><?php echo "$book_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>PR004</td>
      			<td>Brouchers</td>
      			<td><?php echo "$brochures_qu"?></td>
      			<td><?php echo "$brochures_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>PR006</td>
      			<td>Box</td>
      			<td><?php echo "$box_qu"?></td>
      			<td><?php echo "$box_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>PR007</td>
      			<td>Note Book</td>
      			<td><?php echo "$note_qu"?></td>
      			<td><?php echo "$note_qu1"?>%</td>
      		</tr>
      		<tr>
      			<td>PR008</td>
      			<td>Bill Book</td>
      			<td><?php echo "$bill_qu"?></td>
      			<td><?php echo "$bill_qu1"?>%</td>
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