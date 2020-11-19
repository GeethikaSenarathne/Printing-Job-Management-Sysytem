<?php include ("dbconn.php");?>

<!DOCTYPE html>
<html>
<head>
  <head>
  	<?php
          $sname=$_POST["sname"];
          $sdate=$_POST["sdate"];
          $edate=$_POST["edate"];
          
          $sql="SELECT * FROM suppliers WHERE name='$sname'";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $s_id = $row["supplier_id"];
              $sname = $row["name"];
              $address = $row["address"];

            }
          }

          

    ?>
    
  	<style>
		table {
		  border-collapse: collapse;
		  width: 60%;
		}

		th, td {
		  padding: 8px;
		  text-align: left;
		  border-bottom: 1px solid #ddd;
		}
    h2{
      text-align: center;
    }
	</style>

  </head>
<body>
	<div class="content">
    <div class="main">

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
      
          <h2>Purchase Details of <?php echo "$sname";?></h2><br>
          <h3>Supplier ID: S00<?php echo "$s_id";?><br>
          Supplier Name: <?php echo "$sname";?><br>
          Address: <?php echo "$address";?></h3><br><br><br>

     	<table>
	      	<thead>
		      <tr>
		        <th>Material</th>
		        <th>Total Quantity</th>
		        <th>Cost</th>
		        
		      </tr>
      		</thead>

          <?php 
          //table data
          $sql="SELECT quantity,SUM(total_cost) AS tcost,meterial FROM purchases WHERE supplier='$sname' GROUP BY meterial";
          $result= $conn-> query($sql);

          $total_cost=0;
          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $quantity = $row["quantity"];
              $tcost = $row["tcost"];
              $material = $row["meterial"];
              $total_cost=$tcost+$total_cost;

              echo "<tr><td>". $material. "</td><td>".$quantity ."</td><td>".$tcost ."</td><td>";
            }
          }
            echo"<tr><td colspan=2>"."Tatal Amount". "</td><td>".$total_cost."</td></tr>";
          ?>
      		
      			
    	</table>

  
      </div><br><br>
   
  </div>
  	<form>
  		<button onclick="window.print()">Print</button>
  	</form>
		
</body>
</html>