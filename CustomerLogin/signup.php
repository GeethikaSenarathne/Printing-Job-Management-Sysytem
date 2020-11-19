<?php session_start();?>

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db="pressmanagement";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo"test";
}
//echo "Connected successfully";
if(isset($_POST['submit'])){

	$req_feilds= array('nic','username','address','email','password','confirm_password');

	$nic=$_POST['nic'];
	$username=$_POST['username'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	
	
	$errors=[];	
	if ($password != $confirm_password) {
	 	$erros[]='Passwords do not match';
	 } 
	
	
	
	$query="INSERT INTO customers(NIC,name,address,email, contact_no,password) VALUES('{$nic}','{$username}','{$address}','{$email}','{$contact_no}','{$password}')";

	$result=mysqli_query($conn, $query);
	echo "Successfully added a record";
	header('Location:login.php');
}

$conn -> close();


?>

<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

		<script type = "text/javascript">
         <!--
            function Cancel() {
               window.location = "login.php";
            }
         //-->
      </script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">

</head>
<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/image1.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Sign Up
				</span>
				<?php
					if(isset($errors) && !empty($errors)){
						echo '<p style="background-color:red; color: white;"> Please fill out all feilds </p>';
					}
						?>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="signup.php">

					<div class="wrap-input100 validate-input" data-validate = "Enter NIC" required>
						<input class="input100" type="text" name="nic" placeholder="NIC" >
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter User name">
						<input class="input100" type="text" name="username" placeholder="Username" >
						<span class="focus-input100" data-placeholder="&#xe82b;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Address">
						<input class="input100" type="text" name="address" placeholder="Address" >
						<span class="focus-input100" data-placeholder="&#xe800;"></span>

					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100" data-placeholder="&#xe818;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contact Number">
						<input class="input100" type="text" name="contact_no" placeholder="Contact Number" >
						<span class="focus-input100" data-placeholder="&#xe830;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" >
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Confirm password">
						<input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" >
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>


					<dsiv class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="reset" name="cancel" onclick="Cancel();">
							Cancel
						</button>
						<button class="login100-form-btn" type="submit" name="submit">
							Submit
						</button>
					</div>
				</form>

</body>
</html>
