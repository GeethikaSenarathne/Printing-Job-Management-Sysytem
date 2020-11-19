<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id6').style.backgroundColor = "#88304e";
	</script>
	<?php
		$sql="SELECT DISTINCT name FROM meterials";
	?>
	
</head>
<body>
	<div class="content">
		<div class="main">
			<h1>Materials</h1>

			<!-- Button trigger modal -->
			<button type="button" class="dropbtn" data-toggle="modal" data-target="#addMaterial">
			  Add Material
			</button>
			<button type="button" class="dropbtn" data-toggle="modal" data-target="#addDailyUsage">
			  Add Daily Usage
			</button>
			<button type="button" class="dropbtn"><a href="materialUsage.php">
			  View Daily Usage</a>
			</button>
			
			<!-- Modal Add Material-->
						
			  <div class="modal fade" id="addMaterial" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Material</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Material Name:<input type="text" name="mname" required data-error="Please enter material name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								GSM:<input type="text" name="gsm" required data-error="Please enter gsm">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Unit:<input type="text" name="unit" vrequired data-error="Please enter unit">
								<div class="help-block with-errors"></div>
							</div> 
							  
						
					    </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addMaterial">Add Material</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>

				</div>
			      	
			 </div>
		</div>
		<!---send material details to database--->
	<?php
		if(isset($_POST['addMaterial'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$mname=$_POST['mname'];
			$gsm=$_POST['gsm'];
			$unit=$_POST['unit'];
			
			$query="INSERT INTO meterials(name,gsm,unit) VALUES('{$mname}','{$gsm}','{$unit}')";

			$result=mysqli_query($conn, $query);
			//echo "Successfully added a record";
			//header('Location:materials.php');  
			
		}
		
	?>
		<!---end of modal Add Material--->

		<!-- Modal Add Daily Usage-->
						
			  <div class="modal fade" id="addDailyUsage" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Daily Usage</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Material Name:
								<select name="u_mname">
									<option disabled selected >Select a material*</option>
										<?php
									  	$mysql = "SELECT DISTINCT name FROM meterials";
									  	$result= $conn-> query($mysql);
										while ($rows = $result -> fetch_assoc())
										{
											$name = $rows['name'];
											echo"<option value='$name'>$name</option>";
										}
									    ?>
								</select>
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Used Quanttity:<input type="text" name="u_quantity" required data-error="Please enter quantity">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Date:<input type="date" name="u_date" vrequired data-error="Please enter date">
								<div class="help-block with-errors"></div>
							</div> 
							  
						
					    </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addUsage">Add Usage</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>
			      	
			 </div>
		</div>
			  
			
<!---send material details to database--->
	<?php
		if(isset($_POST['addUsage'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$u_mname=$_POST['u_mname'];
			$u_quantity=$_POST['u_quantity'];
			$u_date=$_POST['u_date'];

			$query="UPDATE meterials SET quantity = quantity -'{$u_quantity}' WHERE name ='{$u_mname}'";

			$result=mysqli_query($conn, $query);

		}
		
		if(isset($_POST['addUsage'])){
			//add data to uasage table in database
			$squery="INSERT INTO used_materials(u_mname,quantity,date) VALUES('{$u_mname}','{$u_quantity}','{$u_date}')";

			$result=mysqli_query($conn,$squery);
		}
	?>

	<!---end of modal--->

<!---main content of page--->


  <!---getting material datails from the database--->
			<table>
				<thead>
				<tr>
					<th>Material ID</th>
					<th>Material Name</th>
					<th>GSM Value</th>
					<th>Unit Used</th>
					<th>Quantity Available</th>
					<th>Update Material</th>
				</tr>
				</thead>
				<?php 

					//$sql="SELECT * FROM meterials";
					$sql="SELECT m_id, name, gsm, unit, quantity FROM meterials";
					$result= $conn-> query($sql);
					$prefix="M00";

					if ($result-> num_rows >0) {

						while ($row= $result-> fetch_assoc()) {
							$color = '';
							if($row["quantity"] < '10') $color = "style='background-color:salmon'";

							echo "<tr><td>".$prefix.$row["m_id"] . "</td><td>". $row["name"]. "</td><td>". $row["gsm"]."</td><td>".$row["unit"]."</td><td ".$color.">".$row["quantity"] ."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/editMaterial.php?id=".$row["m_id"]."' target='_blank'>Edit</a></td></tr>";
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