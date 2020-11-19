<?php 
include_once('dbconn.php');

?>

<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="css/userProfile.css">
	<link rel="stylesheet" type="text/css" href="css/customer.css">
</head>
<body>
	<div class="profile-card">
			 <div class="main">
			 	<h1>User Profile</h1>
				     
						<div class="image-container">
							<h2><?php echo $_SESSION['user_name']; ?></h2>
							<img src="images/user.jpg" style="width: 80%">
							
							<div class="title">
								
							</div>
							<input type="file" name="upload" value="change image">
						</div>
						
					<!----change the profile picture--->
					<?php
						if (isset($_POST['upload'])) {
							$target="images/".basename($_FILES['image']['name']);

							$picture=$_FILES['image']['name'];

							$sql= "INSERT INTO staff(picture) VALUES ($picture)";
						}
					?>

					<!---get the data from logged user details from the database---->
					
					<?php 
						$sql="SELECT address,email,contact_no,image FROM staff WHERE NIC ='{$_SESSION['user_id']}';";
						$result= mysqli_query($conn,$sql);
						$count=mysqli_num_rows($result);

						if($count==1){
							$feild=mysqli_fetch_array($result);

							//$_SESSION['id']=$feild['NIC'];
							$_SESSION['address']=$feild['address'];
							$_SESSION['email']=$feild['email'];
							$_SESSION['contact_no']=$feild['contact_no'];
							$_SESSION['image']=$feild['image'];
						}
						
					?>
					<div class="main-container">
				
										<h3><p><i class="fas fa-address-card info"> </i> NIC: <?php echo $_SESSION['user_id'] ?>  </p>
										<p><i class="fa fa-user-circle info"> </i> Customer Name: <?php echo $_SESSION['user_name'] ?>  </p>
										<p><i class="fas fa-home info"></i> Address : <?php echo $_SESSION['address'] ?> </p>
										<p><i class="fas fa-envelope info"></i> Email       :<?php echo $_SESSION['email'] ?> </p>
										<p><i class="fas fa-phone-alt info"></i>Contact Number:<?php echo $_SESSION['contact_no'] ?></p></h3>
					</div><br><br>
					<div class="loggedin">
								<div class="dropdown">
									<button class="dropbtn" data-toggle="modal" data-target="#editProfile"><i class="fa fa-pencil-square-o"></i>Update Details</button>
								</div>
								<div class="dropdown">
									<button class="dropbtn" data-toggle="modal" data-target="#changePassword"><i class="fa fa-pencil-square-o"></i>Change Password</button>
								</div>
					</div>
					
			 </div>
		</div>

			<!-- Modal for Edit Profile-->
						
			  <div class="modal fade" id="editProfile" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Edit Profile</h4>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Name:<input type="text"  id="name" name="name" value=<?php echo $_SESSION['user_name'];?> required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Address:<input type="text"  id="name" name="address" value=<?php echo $_SESSION['address'];?> required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Email:<input type="text"  id="name" name="email" value=<?php echo $_SESSION['email']; ?> required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Contact Number:<input type="text"  id="name" name="contact_no" value=<?php echo $_SESSION['contact_no']; ?> required data-error="Please enter your name">
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

			  <!---update user details--->
			  <?php 
			  	if (isset($_POST['save_changes'])) {
					 //$id = $_SESSION['id'];
					 $name = $_POST['name'];
					 $address = $_POST['address'];
					 $email = $_POST['email'];
					 $contact_no = $_POST['contact_no'];
					 $update_profile = "UPDATE staff SET name = '$name',address = '$address', email = '$email', contact_no = '$contact_no'WHERE NIC = '{$_SESSION['user_id']}'";
					 $result=mysqli_query($conn, $update_profile);

					     if ($result) {
					   //header("Location: userProfile.php");
					     } else {
					   echo $mysqli->error;
					     }
					 }$conn-> close();
			  ?>

			  <!-- Modal for Chage Password-->
						
			  <div class="modal fade" id="changePassword" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Chage Password</h4>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Current Pasword:<input type="password" name="opwd" id="opwd"> 
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								New Password:<input type="password" name="npwd" id="npwd">
								<div class="help-block with-errors"></div>
							</div> 
							<div class="form-group">
								Confirm Password:<input type="password" name="cpwd" id="cpwd"> 
								<div class="help-block with-errors"></div>
							</div> 
					        </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="submit">Save</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					        </form>
					      </div>
			      	
			    </div>
			  </div>
			  <!---end of modal--->
			  <!---change pasword in database--->
			  <?php
			  if(isset($_POST['submit']))
				{
				 $oldpass=($_POST['opwd']);
				 //$useremail=$_SESSION['login'];
				 $newpassword=($_POST['npwd']);
				$sql="SELECT password FROM staff where NIC='_SESSION['user_id']'&& password='$oldpass' ";
				$result= $conn-> query($sql);

				if ($result-> num_rows >0) {

		          while ($row= $result-> fetch_assoc()) {
		            if ($row['password']=$oldpass) {
		            	echo "true";
		            }
		        }
		        //else {
		          //echo "0 result";
				}
			}
			  ?>

</body>
</html>