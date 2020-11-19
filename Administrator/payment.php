<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id9').style.backgroundColor = "#88304e";
	</script>
	
</head>
<body>
	<div class="content">
		<div class="main">

			<h1>Payments</h1>
			
			

          <h4><b>Payment to be made</b></h4>
          <table>
			<thead>
			<tr>
				<th>Oder ID</th>
				<th>Customer Name</th>
				<th>Product</th>
				<th>Requested Date</th>
				<th>Add Payment</th>
			</tr>
			</thead>
			<?php 
				$sql="SELECT orders.o_id,customers.name,orders.product,orders.req_date FROM orders, customers WHERE orders.customerID = customers.NIC AND orders.Status='Finished'";
				$result= $conn-> query($sql);
				$prefix="O00";

				if ($result-> num_rows >0) {

					while ($row= $result-> fetch_assoc()) {
						

						echo "<tr><td>".$prefix.$row["o_id"] . "</td><td>". $row["name"]. "</td><td>". $row["product"]."</td><td>".$row["req_date"]."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/editOrder.php?id=".$row["o_id"]."' target='_blank'>Add Payment</a></td></tr>";
					}
					echo "</table>";
				}
				else {
					echo "No any payment to be made";
				}
				//$conn-> close();
			?>

		</table>

		<h4><b>Completed Orders</b></h4>
			<!---getting material datails from the database--->
			<table>
            <thead>
            <tr>
              <th>Payament ID</th>
              <th>Oder ID</th>
              <th>Customer</th>
              <th>Total Cost</th>
              <th>Date</th>
              <th>Generate Reciept</th>
            </tr>
            </thead>
            <?php 
              $sql="SELECT Payment.order_ID,Payment.pay_ID, Payment.total_cost, Payment.date, customers.name
					FROM ((Payment
					INNER JOIN orders ON Payment.order_ID = orders.o_id)
					INNER JOIN customers ON orders.customerID = customers.NIC)
					ORDER BY Payment.pay_ID DESC;";
              $result= $conn-> query($sql);
              $prefix1="PM00";
              $prefix2="O00";

              if ($result-> num_rows >0) {

                while ($row= $result-> fetch_assoc()) {
                  echo "<tr><td>".$prefix1.$row["pay_ID"] . "</td><td>".$prefix2. $row["order_ID"]."</td><td>". $row["name"]."</td><td>". $row["total_cost"]."</td><td>". $row["date"]."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/pdfGen.php?id=".$row["order_ID"]."' target='_blank'>Download</a></td></tr>";
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

			<!-- Modal --
						
			  <div class="modal fade" id="addPayment" role="dialog">
			    <div class="modal-dialog">--->


			    <!-- Modal content--
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Payment</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Order ID:
								<input type="text" name="order_ID" required data-error="Please fillout">
							</div>
							<div class="form-group">
								Unit Cost:
								<input type="text" name="unitPrice" required data-error="Please fillout">
							</div>
							<div class="form-group">
								Other Charges :<input type="text" name="otherChargeDes" placeholder="Description" "><br>
								<input type="text" name="otherCharge" placeholder="Amount" ">
							</div> 
							<div class="form-group">
								Payment Date:<input type="date" name="date" vrequired data-error="Please enter date">
								<div class="help-block with-errors"></div>
							</div> 
							
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addPayment">Add Payment</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>    	
			 </div>
		</div>-->
			
<!---send payment details to database---
	<?php
		if(isset($_POST['addPayment'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$order_ID=$_POST['order_ID'];
			$unitPrice=$_POST['unitPrice'];
			$otherChargeDes=$_POST['otherChargeDes'];
			$otherCharge=$_POST['otherCharge'];
			$date=$_POST['date'];

			$mysql="SELECT quantity FROM orders WHERE o_id = '$order_ID'";
		    $result1= $conn-> query($mysql);

		    $quantity=0;
		    if ($result1-> num_rows >0) {

		            $row= $result1-> fetch_assoc();
		            $quantity=$row["quantity"];
		          }

			$total_cost=($quantity * $unitPrice) + $otherCharge;

			$query="INSERT INTO Payment(unitPrice,otherChargeDes,otherCharge,total_cost, date,order_ID) VALUES('{$unitPrice}','{$otherChargeDes}','{$otherCharge}','{$total_cost}','{$date}','{$order_ID}')";

			$result=mysqli_query($conn, $query);
			//echo "Successfully added a record";
			//header('Location:materials.php');  
			
		}
		
	?>-->

<!---main content of page--->


  
		</div>
	</div>


</body>
</html>