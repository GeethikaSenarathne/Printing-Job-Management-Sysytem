<?php include ("dbconn.php");?>
<?php include ("main.php");?>

<!DOCTYPE html>
<html>
<head>
	<script>
		document.getElementById('id5').style.backgroundColor = "#88304e";
	</script>
<?php 
	//checking if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
//Pie Chart for Product Orders
          $value = 0.0;
          $book_qu = 0 ;
          $brochures_qu = 0 ;
          $box_qu = 0 ;
          $bote_qu = 0 ;
          $note_qu = 0 ;
          $bill_qu = 0 ;
          $tmp = 0;
          $sql="SELECT * FROM orders";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $product = $row["product"];
              $quantity = $row["quantity"];
              $value = $value + $quantity;

              if ($product == "Book") {
                $book_qu = $book_qu + $quantity;
              }
              elseif ($product == "Brochures"){
                $brochures_qu = $brochures_qu + $quantity;
              }
               elseif ($product == "Box"){
                $box_qu = $box_qu + $quantity;
              }
              elseif ($product == "Note Book"){
                $note_qu = $note_qu + $quantity;
              }
              elseif ($product == "Bill Book"){
                $bill_qu = $bill_qu + $quantity;
              }

            }
          }

          $book_qu1 = round(($book_qu/$value)*100,2 );
          $brochures_qu1 = round(($brochures_qu/$value)*100,2) ;
          $box_qu1 = round(($box_qu/$value)*100,2) ;
          $note_qu1 = round(($note_qu/$value)*100,2 );
          $bill_qu1 = round(($bill_qu/$value)*100,2) ;
          
          //$conn-> close();


?>

<!DOCTYPE html>
<html>
<head>
  <head>

  </head>>

<body>
	<div class="content">
		<div class="main">
			<h1>Products</h1>


			<!-- Button trigger modal -->
			<button type="button" class="dropbtn" data-toggle="modal" data-target="#addProduct">
			  Add Product
			</button>

			<!-- Modal -->
						
			  <div class="modal fade" id="addProduct" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title" align="center">Add Product</h3>
			        </div>
			         <form method="post">
			        	<div class="modal-body">
				        
				         	<div class="form-group">
								Product Name:<input type="text" name="pname" required data-error="Please enter material name">
								<div class="help-block with-errors"></div>
							</div> 
							
						
					    </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-default" name="addProduct">Add Product</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					</form>
				</div>
			      	
			 </div>
		</div>
			  <!---end of modal--->
			
<!---send material details to database--->
	<?php
		if(isset($_POST['addProduct'])){

			//$req_feilds= array('name','gsm','unit','unit_price','quantity');

			$pname=$_POST['pname'];
			
			
			$query="INSERT INTO product(p_name) VALUES('{$pname}')";

			$result=mysqli_query($conn, $query);
			//echo "Successfully added a record";
			//header('Location:materials.php');  
			
		}
		
	?>

<!---main content of page--->


  <!---getting material datails from the database--->
  		<div class="main1">
			<table>
				<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
				</tr>
				</thead>
				<?php 
					$sql="SELECT * FROM product";
					$result= $conn-> query($sql);
					$prefix="PR00";

					if ($result-> num_rows >0) {

						while ($row= $result-> fetch_assoc()) {
							echo "<tr><td>".$prefix.$row["p_id"] . "</td><td>". $row["p_name"]."</td></tr>";
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


			<!---Product Detail --->
		<div class="main2">
			<h3>Product Details</h3>
				<h4>Book: <?php echo "$book_qu1";?> %<br>
				Brochures: <?php echo "$brochures_qu1";?>%<br>
				Box: <?php echo "$box_qu1";?>%<br>
				Note Book: <?php echo "$note_qu1";?>% <br>
				Bill Book: <?php echo "$bill_qu1";?>% </h4>
				<br><br>
	          <!--<table>--->
	          	<form method="post" action="printProduct.php" target="_blank">

			          	Start Date: <input type="date" name="sdate">
				        End Date: <input type="date" name="edate">
				        <button type="submit" class="dropbtn" name="genReport" >
							  Generate Report
						</button>

				</form>
        </div>
        <?php 
        	//send sdate and edate to next page
        	if(isset($_POST['genReport'])) {
        		
        	}
        ?>

	</div>
</div>

</body>
</html>