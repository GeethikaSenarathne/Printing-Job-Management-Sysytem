<?php include ("dbconn.php");?>
<?php include ("main.php");?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Order</title>
	<script>
		document.getElementById('id8').style.backgroundColor = "#88304e";
	</script>

	<?php 
	$id = $_GET['id'];
						$sql="SELECT * FROM orders WHERE o_id ='$id'";
						$result= mysqli_query($conn,$sql);
						$count=mysqli_num_rows($result);

						if($count==1){
							$feild=mysqli_fetch_array($result);

							$item=$feild['product'];
							$size=$feild['size'];
							$no_pages=$feild['no_pages'];
							$quantity=$feild['quantity'];
							$paper=$feild['paper'];
							$fp_colour=$feild['fp_colour'];
							$bp_colour=$feild['bp_colour'];
							$laminate=$feild['laminate'];
							$print_in=$feild['print_in'];
							$req_date=$feild['req_date'];
							$customerID=$feild['customerID'];
							$status=$feild['Status'];
							}
									
					?>
	
</head>
<body>
	<div class="content">
		<div class="main">
  			<h2>Update Order O00<?php echo"$id"?></h2><br/>

			<div class="content1">
				<form method="post" action ="" >
					  <label>Item</label>
					  	
						  	<!---get the product names from the database--->
						  	<select id="item" name= "item" required data-error="Please select a Product">
											  <option disabled selected><?php echo $item ?></option>
											  
							</select>

					  <label>Size (height x width)</label>
					  	<input type="text" id="size" name='size' value="<?php echo $size ?>">
					  <label >Number of Pages</label>
					  	<input type="text" name="no_pages" value="<?php echo $no_pages ?>">
					  <label >Quantity</label>
					  	<input type="text" name="quantity" value="<?php echo $quantity ?>">
					  

					  <label >Paper
					  		<select id="paper" name="paper">
					  		  <option disabled selected><?php echo $paper?>"</option>
							</select>
					  </label><br> <br>
					  <label>Front page colour</label>
					  <input type="text" name="fp_colour" value="<?php echo $fp_colour ?>"><br>
					  <label>Back page colour</label>
					  <input type="text" name="bp_colour" value="<?php echo $bp_colour ?>">
				</form>
			</div>

			<div class="content2">
				<form action ="" method="post">
					 
					
					<label>Laminating</label>
					  		<select name="laminate">
					  			<option value="none"><?php echo $laminate ?></option>
							</select>
					 <br>

					 <label>Print in</label>
					  		<select name="print_in">
					  			<option value="one side"><?php echo $print_in?></option>
							</select>
					 <br>


					<label>Date Required</label>
					  <input type="date" name="req_date" value="<?php echo $req_date ?>"><br><br>

					<label>Customer ID</label>
					  <input type="text" name="c_ID" value="<?php echo $customerID ?>"><br>

					 <label>Delivery Date</label>
					  <input type="date" name="delivery_date"><br><br>

					<label>Status</label>
					  		<select name="Status">
					  			<option disabled selected value="<?php echo $status ?>"><?php echo $status ?></option>
					  			<option value="Accept">Accept</option>
					  			<option value="Finished">Finished</option>
					  			<option value="Delivered">Delivered</option>
					  			<option value="Delivered">Reject</option>
							</select>

							<br><br>

					<div class="dropdown">
						
						<button class="dropbtn" type="submit" name="update">
							Update
						</button>
						<button class="dropbtn" type="button" data-toggle="modal" data-target="#addPayment">
							Make Payment
						</button>
					</div>
				</form>
			</div>
				
				<!---Update the Status--->
				<?php 
			  	if (isset($_POST['update'])) {

					 $Status = $_POST['Status'];
					 $delivery_date=$_POST['delivery_date'];
					 $updateStatus = "UPDATE orders SET Status = '$Status', delivery_date='$delivery_date' WHERE o_id = '$id'";
					 $result=mysqli_query($conn, $updateStatus);

					     if ($result) {
					   //header("Location: home.php");
					     } else {
					   echo $mysqli->error;
					     }
					 }
			  ?>

			</div>
		</div>

<!---Add Payment--->

			<!-- Modal -->
						
			  <div class="modal fade" id="addPayment" role="dialog">
			    <div class="modal-dialog">


			    <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Payment</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        	Payment for Order ID: O00<?php echo "$id"?>
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
		</div>
			
<!---send payment details to database--->
	<?php
		if(isset($_POST['addPayment'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$order_ID=$id;
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
		
	?>
					
</body>
</html>