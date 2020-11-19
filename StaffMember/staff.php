<?php include ("dbconn.php");?>
<?php include ("main.php");?>


<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id3').style.backgroundColor = "#88304e";
	</script>
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++){
    	/*td = tr[i].getElementsByTagName("td")[0];
    	if (td) {
    	   txtValue = td.textContent || td.innerText;
       if (txtValue.toUpperCase().indexOf(filter) > -1) {
         tr[i].style.display = "";
       } else {
         tr[i].style.display = "none";
       }
     }  */

    if (!tr[i].classList.contains('header')) {
      td = tr[i].getElementsByTagName("td"),
      match = false;
      for (j = 0; j < td.length; j++) {
        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          match = true;
          break;
        }
      }
      if (!match) {
        tr[i].style.display = "none";
      } else {
        tr[i].style.display = "";
      }
    }
	}
  }
	
	</script>
</head>
<body>
<div class="content">
	<div class="main">
		<h1>Staff Members</h1>
  		<div class="dropdown">
			<button type="button" class="dropbtn" data-toggle="modal" data-target="#addStaff">Add Staff Member</button> 
		</div>
		<input type="text" id="myInput" name="text1" onkeyup="myFunction()" placeholder="Search for NIC.." title="Type in a name">

  <!---getting user datails from the database--->
		<table id="myTable">
			<thead>
			<tr>
				<th>NIC</th>
				<th>Name</th>
				<th>Address</th>
				<th>Contact Number</th>
				<th>Email</th>
			</tr>
			</thead>
			<?php 
				$sql="SELECT NIC,name,address,contact_no,email FROM staff";
				$result= $conn-> query($sql);

				if ($result-> num_rows >0) {

					while ($row= $result-> fetch_assoc()) {
						echo "<tr><td>".$row["NIC"] . "</td><td>". $row["name"]. "</td><td>". $row["address"]."</td><td>".$row["contact_no"]."</td><td>".$row["email"] ."</td></tr>";
					}
					echo "</table>";
				}
				else {
					echo "0 result";
				}
				//$conn-> close();
			?>

		</table>

		<!-- Modal -->
						
			  <div class="modal fade" id="addStaff" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add New Staff Member</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								NIC:<input type="text" name="nic" required data-error="Please enter your NIC">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								User Name:<input type="text" name="name" required data-error="Please enter your user name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Role:
								<select id="role" name="role">
								  <option value="Staff Member">Staff Member</option>
								  <option value="Administrator">Administrator</option>
								</select>
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Address:<input type="text" name="address" vrequired data-error="Please enter your address">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Contact Number:<input type="text" name="contact_no"  required data-error="Please enter your contact number">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Email:<input type="text" name="email"  required data-error="Please enter the quantity">
								<div class="help-block with-errors"></div>
							</div> 
						
					    </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addStaff">Add Member</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>
			      	
			 </div>
		</div>
			  <!---end of modal--->
<!---send customer details to database--->
	<?php
		if(isset($_POST['addStaff'])){

			$nic=$_POST['nic'];
			$name=$_POST['name'];
			$address=$_POST['address'];
			$contact_no=$_POST['contact_no'];
			$role=$_POST['role'];
			$email=$_POST['email'];
			$password=$_POST['nic'];
			
			$query="INSERT INTO staff(NIC,name,address,email,contact_no,role,password) VALUES('{$nic}','{$name}','{$address}','{$email}','{$contact_no}','{$role}','{$password}')";

			$result=mysqli_query($conn, $query);
			//echo "Successfully added a record";
			//header('Location:materials.php');  
			
		}
		
	?>
		
	</div>
</div>
</body>
</html>