<?php include ("dbconn.php");?>

<!DOCTYPE html>
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
    
  	<style>
    h2{
      text-align: center;
    }
		table {
      margin-left: 100px;
		  border-collapse: collapse;
		  width: 70%;
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
      
      <div class="content2">
          <h2>Total Expences for Materials</h2>
     	<table>
	      	<thead>
		      <tr>
		        <th>Material</th>
		        <th>Total of Cost</th>
		        <th>Percentage</th>
		        
		      </tr>
      		</thead>
      		
          <?php
         
          $tcost=0;
          $mysql="SELECT SUM(total_cost) AS tcost FROM purchases";
          $result1= $conn-> query($mysql);

          if ($result1-> num_rows >0) {

            while ($row= $result1-> fetch_assoc()) {
              $tcost = $row["tcost"];
            }
          }

          $sql="SELECT meterial, SUM(total_cost) AS cost FROM purchases GROUP BY meterial";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $cost = $row["cost"];
              $pec = round(($cost/$tcost)*100,2);
              echo "<tr><td>". $row["meterial"]. "</td><td>".$row["cost"] ."</td><td>".$pec."%"."</td><td>";

            }
          }
    ?>
      			
    	</table>

  
      </div><br><br>
    </div>
  </div>
  	<form>
  		<button onclick="window.print()">Print</button>
  	</form>
		
</body>
</html>