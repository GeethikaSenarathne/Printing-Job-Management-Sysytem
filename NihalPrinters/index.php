<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<!----modal----
	<title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  ----modal ends---->


	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Nihal Printers</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	
	<!---request for qoute db connection--->
	<?php
		$mysqli_connection = new MySQLi('localhost', 'root', '', 'pressmanagement');
		/*if ($mysqli_connection->connect_error) {
		   echo "Not connected, error: " . $mysqli_connection->connect_error;
		}
		else {
		   echo "Connected.";
		}*/  
	 
	?>

	<script>
		function confirmQuatation() {
		    alert("Request for quatation was sent successfully");
		    window.location='index.php';
		}
	</script>
	<script>
		function PlaceOrder(){
			window.alert("Please login to the sysytem to place an order");
			window.location='../CustomerLogin/login.php';
		}
	</script>
	
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="Services.html">Services</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="../CustomerLogin/login.php"target="_blank">Sign in</a></li></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- End header -->
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><br>Welcome To <br> Nihal Printers</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="../CustomerLogin/login.php"target="_blank" onclick="PlaceOrder();">Sign up to Place an Order</a></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" data-toggle="modal" data-target="#myModal">Request a Qoute</a></p>
							<!----<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Request a Qoute</button>---->
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="images/slider-02.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><br>Welcome To <br> Nihal Printers</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="../CustomerLogin/login.php"target="_blank" onclick="PlaceOrder();">Sign up to Place an Order</a></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" data-toggle="modal" data-target="#myModal">Request a Qoute</a></p>
							
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="images/slider-03.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><br>Welcome To <br> Nihal Printers</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="PlaceOrder();" href="../CustomerLogin/login.php"target="_blank">Sign up to Place an Order</a></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" data-toggle="modal" data-target="#myModal">Request a Qoute</a></p>
							
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	 
	
<!-- Modal Request a Qoute-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"align="center">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <!---<h4 class="modal-title" >Modal Header</h4>--->
        </div>
        <div class="modal-body">
		
		<form method="post" name="myemailform" action="product.php" enctype="multipart/form-data">

			Enter Name:	<input class="form-control" type="text" name="name"><br>

			Enter Email Address:	<input class="form-control" type="text" name="email"><br>

			Product : 
			<select name="product">
				<option disabled selected >Select a Product*</option>
					<?php
				  	$resultSet = $mysqli_connection->query("SELECT DISTINCT p_name FROM product");
					while ($rows = $resultSet -> fetch_assoc())
					{
						$p_name = $rows['p_name'];
						echo"<option value='$p_name'>$p_name</option>";
					}
				    ?>
			</select><br>

			
			Quantity:	<input class="form-control" type="text" name="quantity"><br>

			Description(Please state product size,material, number of pages according to your requirement):<textarea class="form-control" name="message"></textarea><br>

			Sample (If any): <input type="file" name="sample" id="sample"><br>

			<input type="submit" name="button" onclick="confirmQuatation();" value="Send Form">

		
		</form> 

        <!--- <form id="contactForm" action='product.php' method="post">
					<h2 class="modal-title" align="center">Request a Qoute</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="product" name= "product" required data-error="Please select a Product">
											  <option disabled selected>Select a Product*</option>
											  <?php/*
											  	$resultSet = $mysqli_connection->query("SELECT DISTINCT p_name FROM product");
												while ($rows = $resultSet -> fetch_assoc())
												{
													$p_name = $rows['p_name'];
													echo"<option value='$p_name'>$p_name</option>";
												}*/
											  ?>
											</select>
											-<input type="submit" name="submit" value="Select"/>-- select button to post the value---
											<div class="help-block with-errors"></div>
										</div> 
							</div>
							<?php/*

								if(isset($_POST['submit'])) 
								{
								  $p = $_POST['product'];
								$p= $_GET['product'];
									echo "$p";
								}*/
							?>
							<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="person" required data-error="Please select a Product size">
											  <option disabled selected>Select size</option>
											  <?php/*
												$resultType = $mysqli_connection->query("SELECT DISTINCT p_size FROM product");
												while ($rows = $resultType -> fetch_assoc())
												{
													$p_size = $rows['p_size'];
													echo"<option value='$p_size'>$p_size</option>";
												}*/
											  ?>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
							</div>
							
							<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="person" required data-error="Please select a Product size">
											  <option disabled selected>Select size</option>
											  <?php/*
												$resultType = $mysqli_connection->query("SELECT p_size FROM product WHERE p_name = $p_name");
												while ($rows = $resultType -> fetch_assoc())
												{
													$p_size = $rows['p_size'];
													echo"<option value='$p_size'>$p_size</option>";
												}*/
											  ?>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Quantity" id="quantity" class="form-control" name="quantity" required data-error="Please enter the quantity">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12"><div class="form-group">
									<input type="text" placeholder="Attach Sample document here" id="sample" class="form-control">
									<input type="file" name="fileToUpload" id="fileToUpload">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" id="message" name="message" placeholder="Description" rows="4" data-error="Write your message" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submitRequest" type="submit" onclick="product.php">Send Request</button>
									<button class="btn btn-common" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>--->
		  
        </div>
      </div>
      
    </div>
  </div>
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To<span>Nihal Printers</span></h1>
						<h4>Little Story</h4>
						<p>We are pride ourselves to provide printing sevices from several decades in Kurunegala city. Hundrads of our customers are served with the best printing experience in our long journey.</p>
						<p>This is another step of Nihal Printers to expand our sevice for keeping you closely</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Place an order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						" The power is to set the agenda. What we print and what we don't print matter a lot. "
					</p>
					<span class="lead">Katharine Graham</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Services -->
	<div class="Services-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Featured Products</h2>
						<p>We are ready to provide whatever you want to print</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-Services text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".drinks">Paper Printing</button>
							<button data-filter=".lunch">Binding</button>
							<button data-filter=".dinner">Designing</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-01.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Books</h4>
							<p></p>
							<!---<h5> $7.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-02.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Boxes</h4>
							<p></p>
							<!---<h5> $9.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-03.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Paper Bags</h4>
							<p></p>
							<!---<h5> $10.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-04.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Saddle-stitching</h4>
							<p></p>
							<!---<h5> $15.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-05.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Spiral Binding</h4>
							<p></p>
							<!----<h5> $18.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-06.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Perfect Binding</h4>
							<p></p>
							<!---<h5> $20.79</h5>---->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-07.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Brochures</h4>
							<p></p>
							<!---<h5> $25.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-08.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Cards</h4>
							<p></p>
							<!--<h5> $22.79</h5>--->
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-09.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Cover Pages</h4>
							<p></p>
							<!---<h5> $24.79</h5>--->
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Services -->
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-1.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Sarath Rathnayake</strong></h5>
								<h6 class="text-dark m-0">Colombo</h6>
								<p class="m-0 pt-3">Well printed and processed quikly.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-3.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Jagath Serasinghe</strong></h5>
								<h6 class="text-dark m-0">Kurunegala</h6>
								<p class="m-0 pt-3">I have printed 1000 books and they provied 15% diacount for me</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-7.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Robot Fernando</strong></h5>
								<h6 class="text-dark m-0">Gampaha</h6>
								<p class="m-0 pt-3">Nicely printed with awsome colours</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							037-3456754
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							nihalprinters@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							No 35, Mihidu Mawatha, Kurunegala
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>We are one the most leading printing service provider in Kurunegala city. We served number of our customers since 1998 with the best quality printings. Not only the printing, we provide number of services such as laminating, binding, type setting for your convenience.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Sunday: </span>Closed</p>
					<p><span class="text-color">Mon-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Satuday :</span> 5:PM - 10PM</p>
					<p><span class="text-color">Poyadays: </span>Closed</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">No 35, Mihidu Mawatha, Kurunegala</p>
					<p class="lead"><a href="#">037-3456754</a></p>
					<p><a href="#"> nihalprinters@gmail.com</a></p>
				</div>
				<!---<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>--->
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!---<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Nihal Printers</a> Design By : 
					<a href="https://html.design/">html design</a></p>--->
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>