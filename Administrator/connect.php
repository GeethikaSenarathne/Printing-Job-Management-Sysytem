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
}
//echo "Connected successfully";
if(isset($_POST['submit'])){

	$req_feilds= array('nic','username','address','email','password','confirm_password');

	$nic=$_POST['nic'];
	$username=$_POST['username'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$role=$_POST['role'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];

//echo "test ...1".$role;

	$errors=[];	
		
	// cheking the required feilds
	/*foreach ($req_feilds as $feild) {
		if(empty(trim($_POST[$feild]))){
		$errors[]= $feild .' is required';
		echo "test ...";
	}
	}*/
	
	

	if ($password != $confirm_password) {
	 	$erros[]='Passwords do not match';
	 } 
	
	
	
	$query="INSERT INTO staff(NIC,name,address,email, contact_no, role,password) VALUES('{$nic}','{$username}','{$address}','{$email}','{$contact_no}','{$role}','{$password}')";

	$result=mysqli_query($conn, $query);
		echo "Successfully added a record";
		header('Location:staff.php');
}

$conn -> close();

?>