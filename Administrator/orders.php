<?php include ("dbconn.php");?>
<?php include ("main.php");?>


<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id8').style.backgroundColor = "#88304e";
	</script>
</head>
<body>
<div class="content">
	<div class="main">
		<h1>Orders</h1>
  		<div class="dropdown">
			<button type="button" class="dropbtn"><a href="placeOrder.php" target="_blank">Place a New Order </a></button> 
		</div>

  <!---getting user datails from the database--->
		<table>
			<thead>
			<tr>
				<th>Oder ID</th>
				<th>Customer Name</th>
				<th>Product</th>
				<th>Requested Date</th>
				<th>Delivery Date</th>
				<th>Status</th>
				<th>Edit</th>
			</tr>
			</thead>
			<?php 
				$sql="SELECT orders.o_id,customers.name,orders.product,orders.Status,orders.req_date,orders.delivery_date FROM orders, customers WHERE orders.customerID = customers.NIC ORDER BY orders.o_id DESC";
				$result= $conn-> query($sql);
				$prefix="O00";

				if ($result-> num_rows >0) {

					while ($row= $result-> fetch_assoc()) {
						$color = '';
						if($row["Status"] == 'Accept') $color = "style='background-color:royalblue'";
						if($row["Status"] == 'Finished') $color = "style='background-color:orange'";
						if($row["Status"] == 'Delivered') $color = "style='background-color:limegreen'";
						if($row["Status"] == 'Reject') $color = "style='background-color:salmon'";
						if($row["Status"] == 'Pending') $color = "style='background-color:gold'";

						echo "<tr><td>".$prefix.$row["o_id"] . "</td><td>". $row["name"]. "</td><td>". $row["product"]."</td><td>".$row["req_date"]."</td><td>".$row["delivery_date"] ."</td><td ".$color.">".$row["Status"]."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/editOrder.php?id=".$row["o_id"]."' target='_blank'>Edit</a></td></tr>";
					}
					echo "</table>";
				}
				else {
					echo "0 result";
				}
				//$conn-> close();
			?>

		</table>
	
	</div>
</div>
</body>
</html>