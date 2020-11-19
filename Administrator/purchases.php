<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id7').style.backgroundColor = "#88304e";
	</script>
	<title></title>

	      <!---Cost calculation--->
          <?php 
          $expenses=0;
          
          	$sql= "SELECT SUM(total_cost) AS 'expenses' FROM purchases ";
          	$result1= $conn-> query($sql);

		    if ($result1-> num_rows >0) {

		            $row= $result1-> fetch_assoc(); 
		            $expenses=$row["expenses"];
		            
		          }
          

          //expence calculation during the date range
		  $r_expenses=0;
          if (isset($_POST['calCost'])) {

          	$sdate=$_POST['sdate'];
          	$edate=$_POST['edate'];

          	$sql= "SELECT SUM(total_cost) AS 'r_expenses' FROM purchases WHERE date BETWEEN '{$sdate}' AND '{$edate}'";
          	$result2= $conn-> query($sql);

		    if ($result2-> num_rows >0) {
		    	$row= $result2-> fetch_assoc();
		        $r_expenses=$row["r_expenses"];    
		        //var_dump($row["r_expenses"]);
		        //$r_expenses = $sql;
		    }
		    //die($r_expenses);
          }

          //update the quantity of meterials
            /*$quantity=0;
          	$mysql="SELECT SUM(quantity) FROM purchases GROUP BY meterial";
			$result2= $conn-> query($mysql);

			if ($result2-> num_rows >0) {

	            $row= $result2-> fetch_assoc(); 
	            $quantity=$row["quantity"];
	            
	          }*/
          ?>
	
</head>
<body>
	<div class="content">
		<div class="main">

			<h1>Purchases</h1>
			<!-- Button trigger modal -->
			<button type="button" class="dropbtn" data-toggle="modal" data-target="#addPurchase">
			  Add Purchase
			</button>

			<!---getting material datails from the database--->
			<div class="main1">
				<table>
	            <thead>
	            <tr>
	              <th>Purchase ID</th>
	              <th>Meterial</th>
	              <th>Quantity</th>
	              <th>Unit Cost</th>
	              <th>Total Cost</th>
	              <th>Supplier</th>
	              <th>Date</th>
	            </tr>
	            </thead>
	            <?php 
	              $sql="SELECT * FROM purchases ORDER BY purchase_id DESC";
	              $result= $conn-> query($sql);
	              $prefix="PC00";

	              if ($result-> num_rows >0) {

	                while ($row= $result-> fetch_assoc()) {
	                  echo "<tr><td>".$prefix.$row["purchase_id"] . "</td><td>". $row["meterial"]."</td><td>". $row["quantity"]."</td><td>". $row["unit_cost"]."</td><td>". $row["total_cost"]."</td><td>" . $row["supplier"]."</td><td>". $row["date"]."</td></tr>";
	                }
	                echo "</table>";
	              }
	              else {
	                echo "0 result";
	              }
	              //$conn-> close();
	            ?>
	          </table><br><br><br>
	         </div>

          <!---caculate cost---->
          
	         <div class="main2">
	         	<h3>Expenses</h3>
	          <!--<table>--->
	          	<form method="post">
	          		
						<h4>Total Expense: <?php echo "$expenses";?> </h4><br><br>
				
			          	Start Date: <input type="date" name="sdate">
				        End Date: <input type="date" name="edate">
				        <button type="submit" class="dropbtn" name="calCost">
							  Calculate Cost
						</button>
						
						<h4>Expense During the period : <?php echo "$r_expenses";?></h4><br>
						<button  class="dropbtn" ><a href="printPurchases.php" target="_bank">
							  Generate report</a>
						</button>
						
				</form>
	          <!--</table>--->
          	</div> 


			<!-- Modal -->
						
			  <div class="modal fade" id="addPurchase" role="dialog">
			    <div class="modal-dialog">


			    <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Purchase Item</h3>
			        </div>
			        
			        	<div class="modal-body">
				         <form method="post" name="myemailform" action="purchases.php" enctype="multipart/form-data">
				         	
								Material Name:
								<select name="mname">
									<option disabled selected >Select a material*</option>
										<?php
									  	$mysql = "SELECT DISTINCT name FROM meterials";
									  	$result= $conn-> query($mysql);
										while ($rows = $result -> fetch_assoc())
										{
											$name = $rows['name'];
											echo"<option value='$name'>$name</option>";
										}
									    ?>
								</select>

							Supplier Name:
								<select name="sname">
									<?php
									  	$mysql = "SELECT DISTINCT name FROM suppliers";
									  	$result= $conn-> query($mysql);
										while ($rows = $result -> fetch_assoc())
										{
											$name = $rows['name'];
											echo"<option value='$name'>$name</option>";
										}
									    ?>
								</select>

							<div class="form-group">
								Quantity:<input type="text" name="quantity" required data-error="Please enter quantity">
								<div class="help-block with-errors"></div>
							</div> 
							 
							<div class="form-group">
								Unit Cost:<input type="text" name="u_cost"  required data-error="Please enter total cost">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Date:<input type="date" name="date"  required data-error="Please enter the date">
								<div class="help-block with-errors"></div>
							</div> 
						
					    </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addPurchase">Add Purchase</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>
			      	
			 </div>
		</div>
			  
			
<!---send material details to database--->
	<?php
		if(isset($_POST['addPurchase'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$mname=$_POST['mname'];
			$sname=$_POST['sname'];
			$quantity=$_POST['quantity'];
			$u_cost=$_POST['u_cost'];
			$date=$_POST['date'];
			$tcost= $quantity * $u_cost ;
			
			$query="INSERT INTO purchases(quantity,date,unit_cost,total_cost,meterial,supplier) VALUES('{$quantity}','{$date}','{$u_cost}','{$tcost}','{$mname}','{$sname}')";

			$result=mysqli_query($conn, $query);
			 
			//Update the quantity of the material
			$mysql1="SELECT quantity FROM meterials WHERE name='{$mname}'";
			$result= $conn-> query($mysql1);
			while ($rows = $result -> fetch_assoc())
				{$quantity_a = $rows['quantity'];}
			
			$quantity_b = $quantity_a + $quantity;

			$sql="UPDATE meterials SET quantity='{$quantity_b}' WHERE name='{$mname}'";
			$result3=mysqli_query($conn, $sql);

		}
		
	?>

<!---main content of page--->


  
		</div>
	</div>


</body>
</html>