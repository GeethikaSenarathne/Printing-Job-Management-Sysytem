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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!---modal links---->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!----modal links ends---->

	 <!---verify the user to logout from the system-->
	<script>
		function confirmLogout() {
		    var r = confirm("Are you sure you want to logout?");
			  if (r == true) {
			    window.location='logout.php';
			  } else {
			    //window.location='home.php';
			  }
					}
	</script>

	<!-- active the clicked tab--->
	<script>
		function openTab(Name) {
		  var i;
		  var x = document.getElementsByClassName("city");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  document.getElementById(id).style.sidebar.active.background-color= "#800080"
		}
	</script>

</head>
<body>
<div class="sidebar">
	<a href="#0">
      <img class="logo" src="../Administrator/images/logo.png" alt="forecastr logo" width="100%" height="20%">
    </a>
  <a href="home.php" id= "id1"><i class="fa fa-home"></i>  Home</a>
  <a href="customers.php"  id= "id2"><i class="fa fa-users"></i>  Customers</a>
  <a href="staff.php"  id= "id3"><i class="fa fa-user-circle"></i>  Staff</a>
  <a href="suppliers.php"  id= "id4"><i class="fa fa-truck"></i>  Supliers</a>
  <a href="product.php" id= "id5"><i class="fa fa-newspaper-o"></i>  Products</a>
  <a href="materials.php"  id= "id6"><i class="fa fa-suitcase"></i>  Materials</a>
  <a href="purchases.php" id= "id7"><i class="fa fa-money"></i>  Purchases</a>
  <a href="orders.php" id= "id8"><i class="fa fa-file-text-o"></i>  Orders</a>
  <a href="payment.php"id= "id9"><i class="fa fa-money"></i>  Payments</a>
  <a href="generateReports.php" id= "id11"><i class="fa fa-file-text-o"></i>  Generate Reports</a>
  <a href="quotations.php"  id= "id10"><i class="fa fa-pencil-square-o"></i> Quotations</a>
  
</div>

<div class="content">
		<header>
		<div class="appname"><h1><b>Printing Job Management System</b></h1>

			<div class="loggedin"> Welcome <?php echo $_SESSION['user_name']; ?> </br>
				<div class="dropdown">
				  <button class="dropbtnright">Settings
				<i class="fa fa-cog"></i>
				</button>
				  <div class="dropdown-content">
				    <a href="userProfile.php">Profile</a>
				    <a onclick="confirmLogout();">Logout</a>
				  </div>
				</div>
		
			</div>
		</div>
		
		</header>
  
</div>

</body>
</html>