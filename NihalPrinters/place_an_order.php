<?php
		$mysqli_connection = new MySQLi('localhost', 'root', '', 'pressmanagement');
		
		$product=$_POST['product'];
		$size=$_POST['size'];
		$quantity=$_POST['quantity'];
		$date=$_POST['date'];
		$message=$_POST['message'];
											
											
		$sql = $mysqli_connection->query("INSERT INTO order(product, size, quantity, sample, req_date, description)
																				VALUES('$product','$size','$quantity','$date','$message')");
												
?>