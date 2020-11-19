<?php session_start();?>

<?php include ("dbconn.php");?>

<?php 
	
	//check for login
	if(isset($_POST['login'])){
			
			$errors=array();
		//check if user name and password has been entered
			if(!isset($_POST['username']) || strlen(trim($_POST['username'])) <1){
				$errors[]="Username is missing or invalid";
			}
			if(!isset($_POST['password']) || strlen(trim($_POST['password'])) <1){
				$errors[]="Password is missing or invalid";
			}
		//check if there are any errors in the form
			if(empty($errors)) {
				//Save username and pasword into variables
			  	$username=mysqli_real_escape_string($conn,$_POST['username']);
			  	$password=mysqli_real_escape_string($conn,$_POST['password']);
			  	//$hashed_password=sha1($password);

			  	//prepare database query
			  	$query="SELECT * FROM customers 
			  		WHERE name='{$username}'
			  		AND password='{$password}' 
			  		LIMIT 1";

			  	$result_set=mysqli_query($conn,$query);

				
				//check if the user is valid
			  	if ($result_set){
			  		//query successful
			  		if(mysqli_num_rows($result_set)==1){
			  			//valid user found
			  			$user =mysqli_fetch_assoc($result_set);
			  			$_SESSION['user_id']=$user['NIC'];
			  			$_SESSION['user_name']=$user['name'];

			  			 //redirect to user.php
			  			header('Location:home.php');
			  		} else{
			  			//username password invalid
			  			$errors[]='Invalid Username or Password';
			  		}
			  	}
			  	else{
			  		$errors[]='Databse query failed';
			  		}

			  
			  	}
			exit;
			}
    
	
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>

<!---signup button direction--->
	<script type = "text/javascript">
         <!--
            function Redirect() {
               window.location = "signup.php";
            }
         //-->
      </script>
      <style type="text/css">
      	h6{
      		text-align: center;
      		background-color: #841572;
      	}
      </style>
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/image1.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<?php
					if(isset($errors) && !empty($errors)){
						echo '<p style="background-color:red; color: white;"> Invalid Username or Password </p>';
					}
						?>
				<?php 
					if(isset($_GET['logout'])){
					echo '<p style="background-color:green; color: white;"> You have successfully loggedout</p>';	
					}
				?>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="#">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<!--<button class="login100-form-btn" type="submit" name="signup" onclick = "Redirect();">
							Sign Up
						</button>--->
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button><br><br>
						
					</div>
						
				</form>
				<h6><a href="signup.php"><b>Click here to sign up</b></a></h6>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php mysqli_close($conn); ?>