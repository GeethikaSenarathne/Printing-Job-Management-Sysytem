<?php include ("dbconn.php");?>
<?php include ("main.php");?>


<!DOCTYPE html>
<html>
<head>
	<title>Place an Order</title>
	
	<script>
		document.getElementById('id8').style.backgroundColor = "#88304e";
	</script>
	<script>

	    function placeOder(){
	    	alert("Your order request has been sent")
	    }
	</script>
	
</head>
<body>
	<div class="content">
		<div class="main">
  			<h2>Place an Order</h2><br/>

			<div class="content1">
				<form method="post" action ="placeOrder.php" >
					  <label>Item</label>
					  	
						  	<!---get the product names from the database--->
						  	<select id="item" name= "item" required data-error="Please select a Product">
											  <option disabled selected>Select an item *</option>
											  <?php
											  	$sql = ("SELECT DISTINCT p_name FROM product");
											  	$result= $conn-> query($sql);
												while ($rows = $result -> fetch_assoc())
												{
													$p_name = $rows['p_name'];
													echo"<option value='$p_name'>$p_name</option>";
												}
											  ?>
							</select>

					  <label>Size (height x width)</label>
					  	<input type="text" id="size" name='size' required>
					  <label >Number of Pages</label>
					  	<input type="text" name="no_pages"required>
					  <label >Quantity</label>
					  	<input type="text" name="quantity"required>
					  

					  <label >Paper
					  		<select id="paper" name="paper">
					  		  <option disabled selected>Select a paper type *</option>
							  <option value="Bank paper">Bank Paper</option>
							  <option value="Art paper">Art paper</option>
							  <option value="Laser Printer Paper">Laser Printer Paper</option>
							  <option value="Bright White">Bright White</option>
							</select>
					  </label><br> <br>
					  <label>Front page colour</label>
					  <input type="text" name="fp_colour"required><br>
					  <label>Back page colour</label>
					  <input type="text" name="bp_colour"required>
				<!--</form>-->
			</div>

			<div class="content2">
				<!---<form action ="placeOrder.php" method="post">--->
					 
					
					<label>Laminating</label>
					  		<select name="laminate">
					  			<option value="none">None</option>
							  	<option value="gloss">Gloss</option>
							  	<option value="matt">Matt</option>
							</select>
					 <br>

					 <label>Print in</label>
					  		<select name="print_in">
					  			<option value="one side">One side</option>
							  	<option value="both sides">Both sides</option>
							</select>
					 <br>


					<label>Date Required</label>
					  <input type="date" name="req_date"required><br><br>

					<label >Description</label>
					  	<input type="text" name="description"required><br><br>

					 <label>Sample Document</label>
					  <input type="file" name="sample"><br>

					<label>Customer ID</label>
					  <input type="text" name="c_ID"required>

					<div class="dropdown">
						<button class="dropbtn" type="submit" name="save" onclick="placeOder();">
							Submit
						</button>
						<button class="dropbtn" type="reset"><a href="customers.php" target="_blank">
							Register Customer
						</button>
					</div>
				</div>
				<!--</form>-->

			</div>
		</div>
	</div>
	</div>

<!---send order datails to the database--->
		<?php
		if(isset($_POST['save'])) {

			$item=$_POST['item'];
			$size=$_POST['size'];
			$no_pages=$_POST['no_pages'];
			$quantity=$_POST['quantity'];
			$paper=$_POST['paper'];
			$fp_colour=$_POST['fp_colour'];
			$bp_colour=$_POST['bp_colour'];
			$laminate=$_POST['laminate'];
			$print_in=$_POST['print_in'];
			$req_date=$_POST['req_date'];
			$sample=$_POST['sample'];
			$customerID=$_POST['c_ID'];
			$description=$_POST['description'];
			$status='Pending';
			
			
			$query="INSERT INTO orders(product, size,no_pages, quantity, paper, fp_colour, bp_colour, laminate,print_in, req_date, sample_doc, description,customerID,Status) VALUES('{$item}','{$size}','{$no_pages}','{$quantity}','{$paper}','{$fp_colour}','{$bp_colour}','{$laminate}','{$print_in}','{$req_date}','{$sample}','{$description}','{$customerID}','{$status}')";

			$result=mysqli_query($conn, $query);
			//header('Location:pastOrders.php');
		}

		$conn -> close();


		?>
</body>
</html>