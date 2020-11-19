<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id6').style.backgroundColor = "#88304e";
	</script>
	<?php
		$id = $_GET['id'];
		//$count=0;
		$sql="SELECT * FROM meterials WHERE m_id ='$id'";
						$result= mysqli_query($conn,$sql);
						$count=mysqli_num_rows($result);

						if($count==1){
							$feild=mysqli_fetch_array($result);

							$m_id=$feild['m_id'];
							$name=$feild['name'];
							$gsm=$feild['gsm'];
							$unit=$feild['unit'];
							$unit_price=$feild['unit_price'];
							$quantity=$feild['quantity'];
						}
	?>
</head>
<body>
	<div class="content">
		<div class="main">
			<h1>Edit Materials</h1><br>

			<div class="content1">
				<form method="post" action ="placeOrder.php" >
					  <label>Material ID</label>
					  <input type="text" disabled="" placeholder="<?php echo $m_id;?>">
					  <label>Material Name</label>
					  <input type="text"  disabled="" placeholder="<?php echo $name;?>" required>
					  <label>GSM</label>
					  <input type="text" disabled="" placeholder="<?php echo $gsm;?>" required>
					  
				<!--</form>--->
			</div>

			<div class="content2">
					<label>Unit</label>
					<input type="text" id="unit" name='unit' placeholder="<?php echo $unit;?>" required>
					<label>Unit Price</label>
					<input type="text" id="unit_price" name='unit_price' placeholder="<?php echo $unit_price;?>" required>
					<div class="dropdown">
						<button class="dropbtn" type="submit" name="save">
							Submit
						</button>
					</div>
			</div>	
					  
		</div>
	</div>
</body>
</html>