<?php session_start();?>
<?php include ("dbconn.php");?>
<?php
  //checking if a user is logged in
  if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Previous Orders</title>
	<!---modal links--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="css/customer.css">

	<script>
	    function confirmLogout() {
	        alert("Are you sure you want to logout");
	        window.location='login.php';
	    }

	    function placeOder(){
	    	alert("Your order request has been sent")
	    }
	</script>
	
</head>
<body>
	<!---side bar--->
	<div class="sidebar">
	   <a href="#0">
	      <img class="logo" src="../CustomerLogin/images/logo.png" alt="forecastr logo" width="100%" height="20%">
	    </a>
	  <a href="home.php"  id= "id1" ><i class="fa fa-home"></i>Home</a>
	  <a href="customerProfile.php"  id= "id2" ><i class="fa fa-users"></i>  Profile</a>
	  <a href="placeOrder.php"  id= "id3" class="active"><i class="fa fa-user-circle"></i>  Place an Order</a>
	  <a href="pastOrders.php"  id= "id4" ><i class="fa fa-truck"></i>  Orders</a>
	</div>

	<div class="content">
	    <header>
	    <div class="appname"><h1>Printing Job Management System</h1>

	      <div class="loggedin"> Welcome <?php echo $_SESSION['user_name']; ?>
	        <div class="dropdown">
	          <button class="dropbtn">Settings
	        <i class="fa fa-cog"></i>
	        </button>
	          <div class="dropdown-content">
	            <a href="userProfile.php">Profile</a>
	            <a href="#">Change Password</a>
	            <a href="logout.php" onclick="confirmLogout();">Logout</a>
	          </div>
	        </div>
	    
	      </div>
	    </div>
	    
	    </header>
	    <!--- end of side bar--->

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

					  <label>Size (height x width) in cm</label>
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
					  <input type="text" name="fp_colour"required>
				<!--</form>-->
			</div>

			<div class="content2">
				<!---<form action ="placeOrder.php" method="post">--->
					 <label>Back page colour</label>
					  <input type="text" name="bp_colour"required>
					
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

					 <label>Sample Document</label>
					  <input type="file" name="sample"><br>

					<label>Description</label><br>
					  	<textarea type="text" rows="4" name="description"></textarea> 
									<div class="dropdown">
						<button class="dropbtn" type="reset" name="cancel" >
							Cancel
						</button>

					</div>
					<div class="dropdown">
						<button class="dropbtn" type="submit" name="save" onclick="placeOder();">
							Submit
						</button>
					</div>
				<!--</form>-->

			</div>
		</div>
	</div>
<!---send order datails to the database--->
		<?php
		if(isset($_POST['save'])){
		

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
			$description=$_POST['description'];
			$customerID=$_SESSION['user_id'];
			$status="Pending";
			//$customerID=$_POST['customerID'];
			
			
			$query="INSERT INTO orders(product, size,no_pages, quantity, paper, fp_colour, bp_colour, laminate,print_in, req_date, sample_doc, description,Status,customerID) VALUES('{$item}','{$size}','{$no_pages}','{$quantity}','{$paper}','{$fp_colour}','{$bp_colour}','{$laminate}','{$print_in}','{$req_date}','{$sample}','{$description}','{$status}', '{$customerID}')";

			$result=mysqli_query($conn, $query);
			//header('Location:pastOrders.php');
		}

		$conn -> close();


		?>
</body>
</html>