<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id6').style.backgroundColor = "#88304e";
	</script>
	
</head>
<body>
	<div class="content">
		<div class="main">
			<h1>Used Material Deatails</h1><br>


  <!---getting material datails from the database--->
  			<div class="main1">
				<table>
					<thead>
					<tr>
						<th>Date</th>
						<th>Material Name</th>
						<th>Quantity</th>
					</tr>
					</thead>
					<?php 

						$sql="SELECT * FROM used_materials";
						$result= $conn-> query($sql);

						if ($result-> num_rows >0) {

							while ($row= $result-> fetch_assoc()) {

								echo "<tr><td>". $row["date"]. "</td><td>".$row["u_mname"] ."</td><td>". $row["quantity"]."</td></tr>";
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

			<div class="main2">
				<h3>Material Details</h3><br>
				<h4>
				<?php
					$mysql="SELECT u_mname, SUM(quantity) AS u_quantity FROM used_materials GROUP BY u_mname";
					$result= $conn-> query($mysql);
					if ($result-> num_rows >0) {
						while ($row= $result-> fetch_assoc()) {

							echo $row['u_mname'];
							echo "   :   ";
							echo $row['u_quantity'];
							echo "<br><br>";
						}
					}
				?>
				</h4>
			</div>
		</div>
	</div>

</body>
</html>