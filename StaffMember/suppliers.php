<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id4').style.backgroundColor = "#88304e";
	</script>
</head>
<body>
	<div class="content">
		<div class="main">
			<h1>Suppliers</h1>

				<div class="dropdown">
					<button class="dropbtn" data-toggle="modal" data-target="#editProfile">Add Supplier</button>
				</div>
		

			<!-- Modal -->
						
			  <div class="modal fade" id="editProfile" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Supplier</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Name:<input type="text"  id="name" name="name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Address:<input type="text"  id="name" name="address" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Email:<input type="text"  id="name" name="email" vrequired data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Contact Number:<input type="text"  id="name" name="contact_no"  required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
						
					        </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="save_changes">Save</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>
			      	
			 </div>
		</div>
			  <!---end of modal--->

	<!---send supplier details to database--->
			  <?php 
			  	if (isset($_POST['save_changes'])) {
					 //$id = $_SESSION['id'];
					 $name = $_POST['name'];
					 $address = $_POST['address'];
					 $email = $_POST['email'];
					 $contact_no = $_POST['contact_no'];
					 $query = "INSERT INTO suppliers(name,address,contact_no,email) VALUES('{$name}','{$address}','{$contact_no}','{$email}')";
					 $result=mysqli_query($conn, $query);

					     if ($result) {
					     	
					    //header("Location: ustomerLogin/customerProfile.php");
					     } else {
					   echo $mysqli->error;
					     }
					 }//$conn-> close();
			  ?>

			<!---getting supplier datails from the database--->

		<div class="main1">
			<table>
				<thead>
				<tr>
					<th>Supplier ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Contact number</th>
					<th>Email</th>
				</tr>
				</thead>
				<?php 
					$sql="SELECT * FROM suppliers";
					$result= $conn-> query($sql);
					$prefix="S00";

					if ($result-> num_rows >0) {

						while ($row= $result-> fetch_assoc()) {
							echo "<tr><td>".$prefix.$row["supplier_id"] . "</td><td>". $row["name"]. "</td><td>". $row["address"]."</td><td>".$row["contact_no"]."</td><td>".$row["email"] ."</td></tr>";
						}
						echo "</table>";
					}
					else {
						echo "no result found";
					}
					//$conn-> close();
				?>

			</table>
		</div>

		<div class="main2">
			<h3 align="center">Generate Supplier Report</h3><br>
			
			<form method="post" name="myemailform" action="printSupplier.php" target="_blank">
				Supplier Name:
						<select name="sname">
							<option disabled selected >Select a supplier*
								<?php
							  	$mysql = "SELECT name FROM suppliers";
							  	$result= $conn-> query($mysql);
								while ($rows = $result -> fetch_assoc())
								{
									$name = $rows['name'];
									echo"<option value='$name'>$name</option>";
								}
							    ?></option>
						</select><br><br>

				Start Date: <input type="date" name="sdate"><br><br>
				End Date: <input type="date" name="edate"><br><br>
		        <button type="submit" class="dropbtn" name="genReport">
					  Generate Report
				</button>
			</form>

		</div>

		</div>
	</div>
</body>
</html>