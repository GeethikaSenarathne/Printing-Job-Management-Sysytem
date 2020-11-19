<?php include ("main.php");?>
<?php include ("dbconn.php");?>
<?php
	//checking if a user is logged in
	if(!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
  <script>
    document.getElementById('id10').style.backgroundColor = "#88304e";
  </script>
</head>
<div class="content">
  <div class="main">
    <h1>Quotations</h1>
      <!---Generate a Quatation--->
      <!---<div class="dropdown">
      <button type="button" class="dropbtn"data-toggle="modal" data-target="#setPrice">Set Price</button> 
      </div>---->
        <div class="modal fade" id="setPrice" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center">Set Price for Quotation</h3>
              </div>
               <form method="post">
                <div class="modal-body">
                
                  <div class="form-group">
                    Quatation ID:<input type="text" name="id" required data-error="Please enter quotation ID">
                    <div class="help-block with-errors"></div>
                  </div> 
                  <div class="form-group">
                    Unit Price:<input type="text" name="unitPrice" required data-error="Please enter price">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    Other Charges:<input type="text" name="description" placeholder="Description">
                    <input type="text" name="otherCharges" placeholder="Price">
                    <div class="help-block with-errors"></div>
                  </div>  
              
              </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-default" name="submit">Set price</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
          </form>
        </div>
              
       </div>
    </div>

    
    <h4><b>New Quotations</b></h4>
      <table>
        <thead>
        <tr>
          <th>Quatation ID</th>
          <th>Customer Name</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>View Qoutation</th>
        </tr>
        </thead>
        <?php 
          $sql="SELECT * FROM qoute WHERE unitPrice=0";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              echo "<tr><td>".$row["id"] . "</td><td>".$row["name"] . "</td><td>". $row["product"]."</td><td>".$row["quantity"]."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/viewQuote.php?id=".$row["id"]."' target='_blank'>View</a></td></tr>";
            }
            echo "</table>";
          }
          else {
            echo "0 result";
          }
          //$conn-> close();
        ?>

    </table>
    <br>

    <h4><b>Past Quotations</b></h4>
      <table>
        <thead>
        <tr>
          <th>Quatation ID</th>
          <th>Customer Name</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Download Quote</th>
        </tr>
        </thead>
        <?php 
          $sql="SELECT * FROM qoute WHERE unitPrice>0 ORDER BY id DESC";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              echo "<tr><td>".$row["id"] . "</td><td>".$row["name"] . "</td><td>". $row["product"]."</td><td>".$row["quantity"]."</td><td><a class='btn btn-primary' href='http://localhost/mit/Administrator/pdf.php?id=".$row["id"]."' target='_blank'>Download</a></td></tr>";
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

<body>
	
</body>
</html>