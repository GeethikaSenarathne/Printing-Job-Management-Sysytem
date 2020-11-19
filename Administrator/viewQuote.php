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
  <?php
    $id = $_GET['id'];
    //$count=0;
    $sql="SELECT * FROM qoute WHERE id ='$id'";
            $result= mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);

            if($count==1){
              $feild=mysqli_fetch_array($result);

              $id=$feild['id'];
              $name=$feild['name'];
              $email=$feild['email'];
              $product=$feild['product'];
              $message=$feild['message'];
              $quantity=$feild['quantity'];
            }
  ?>

  <?php 
    //Set price
    if(isset($_POST['submit'])){

      //$id =$_POST['id'];
      $unitPrice=$_POST['unitPrice'];
      $description=$_POST['description'];
      $otherCharges=$_POST['otherCharges'];

      $mysql="SELECT quantity FROM qoute WHERE id = '$id'";
      $result1= $conn-> query($mysql);

      if ($result1-> num_rows >0) {

            while ($row= $result1-> fetch_assoc()) {
            $quantity=$row["quantity"];
            }
          }

      //update the price
      $query="UPDATE qoute SET id='$id',unitPrice='$unitPrice', description='$description', 
      otherCharges='$otherCharges', Price=('$unitPrice'*'$quantity')+'$otherCharges' WHERE id='$id'";

      $result=mysqli_query($conn, $query);
       
      
    }
    ?>
</head>
<body>
  <div class="content">
    <div class="main">
      <h1>Edit Materials</h1><br>

      <div class="content1">
        <form >
            <label>Quotation ID</label>
            <input type="text" disabled="" placeholder="<?php echo $id;?>">
            <label>Customer Name</label>
            <input type="text"  disabled="" placeholder="<?php echo $name;?>" >
            <label>email</label>
            <input type="text"  disabled="" placeholder="<?php echo $email;?>" >
            <label>Product</label>
          <input type="text"  disabled="" placeholder="<?php echo $product;?>" >
          <label>Quantity</label>
          <input type="text" disabled="" placeholder="<?php echo $quantity;?>" >
            
        </form>
      </div>

      <div class="content2">
        <form method="post" action ="" > 
          <label>Description</label><br>
          <textarea rows="5" cols="80" disabled="" placeholder="<?php echo $message;?>"></textarea> 
          <label>Unit Price</label>
          <input type="text"   name="unitPrice"><br><br>
          <label>Other Charges</label><br>
          <label>Descrition</label>
          <input type="text"   name="description" >
          <label>Price</label>
          <input type="text"  name="otherCharges" >
          <div class="dropdown">
            <button class="dropbtn" type="submit" name="submit">
              Set price
            </button>
          </div>
        </form>
      </div>  
    
            
    </div>
  </div>
</body>
</html>