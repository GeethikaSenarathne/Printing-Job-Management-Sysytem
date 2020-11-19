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
			$description=$feild['description'];
			}
?>
	

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
	  <a href="placeOrder.php"  id= "id3" ><i class="fa fa-user-circle"></i>  Place an Order</a>
	  <a href="pastOrders.php"  id= "id4" class="active"><i class="fa fa-truck"></i>  Orders</a>
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
  			<h2>Order ID : O00<?php echo "$id"?></h2><br/>

			<div class="content1">
				<form method="post" action ="placeOrder.php" >
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
					  <input type="text" name="fp_colour" value="<?php echo $fp_colour ?>">
				<!--</form>-->
			</div>

			<div class="content2">
				<!---<form action ="placeOrder.php" method="post">--->
					 <label>Back page colour</label>
					  <input type="text" name="bp_colour" value="<?php echo $bp_colour ?>">
					
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

					 <label>Sample Document</label>
					  <input type="file" name="sample"><br>

					<label>Description</label><br>
					  	<textarea type="text" rows="4" value="<?php echo $description ?>"></textarea> 
									
				</div>
				<!--</form>-->

			</div>
		</div>
	</div>

</body>
</html>