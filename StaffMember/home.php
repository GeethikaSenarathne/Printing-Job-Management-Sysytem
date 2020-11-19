<?php include ("main.php");?>
<?php include ("dbconn.php");?>
<?php
	//checking if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
//Pie Chart for Product Orders
          $value = 0;
          $book_qu = 0 ;
          $brochures_qu = 0 ;
          $box_qu = 0 ;
          $bote_qu = 0 ;
          $note_qu = 0 ;
          $bill_qu = 0 ;

          $sql="SELECT * FROM orders WHERE Status='delivered'";
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

          $book_qu1 = ($book_qu/$value)*100 ;
          $brochures_qu1 = ($brochures_qu/$value)*100 ;
          $box_qu1 = ($box_qu/$value)*100 ;
          $note_qu1 = ($note_qu/$value)*100 ;
          $bill_qu1 = ($bill_qu/$value)*100 ;


          //$conn-> close();

  $dataPoints = array( 
  array("label"=>"Book", "y"=>$book_qu1),
  array("label"=>"Brochures", "y"=>$brochures_qu1),
  array("label"=>"Box", "y"=>$box_qu1),
  array("label"=>"Note Book", "y"=>$note_qu1),
  array("label"=>"Bill Book", "y"=>$bill_qu1),
  )

?>

<!DOCTYPE html>
<html>
<head>
  <head>
    <script>
      window.onload = function() {
       document.getElementById('id1').style.backgroundColor = "#88304e";
       
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Copmleted Printings"
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

  </head>>
<body>
	<div class="content">
    <div class="main">
      <div class="content1">
           <div id="chartContainer" class="chart1" style="height: 370px; width: 50%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      </div>

      <div class="content2">
          <h2>Up Comming Printings</h2>
            <table>
      <thead>
      <tr>
        <th>Oder ID</th>
        <th>Customer Name</th>
        <th>Product</th>
        <th>Requested Date</th>
      </tr>
      </thead>
      <?php 
        $sql="SELECT orders.o_id,customers.name,orders.product,orders.req_date FROM orders, customers WHERE orders.customerID = customers.NIC AND orders.delivery_date='0000-00-00'";
        $result= $conn-> query($sql);
        $prefix="O00";

        if ($result-> num_rows >0) {

          while ($row= $result-> fetch_assoc()) {
            echo "<tr><td>".$prefix.$row["o_id"] . "</td><td>". $row["name"]. "</td><td>". $row["product"]."</td><td>".$row["req_date"]."</td><td>" ."</td></tr>";
          }
          echo "</table>";
        }
        else {
          echo "0 result";
        }
        //$conn-> close();
      ?>

    </table>
  
      </div>
    </div>
  </div>

</body>
</html>