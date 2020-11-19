<?php session_start();?>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/customer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!---verify the user to logout from the system-->
  <script>
    function confirmLogout() {
        alert("Are you sure you want to logout");
        window.location='login.php';
    }
  </script>

</head>
<body>
  
  
<div class="sidebar">
   <a href="#0">
      <img class="logo" src="../CustomerLogin/images/logo.png" alt="forecastr logo" width="100%" height="20%">
    </a>
  <a href="home.php"  id= "id1" class="active"><i class="fa fa-home"></i>Home</a>
  <a href="customerProfile.php"  id= "id2"><i class="fa fa-users"></i>  Profile</a>
  <a href="placeOrder.php"  id= "id3"><i class="fa fa-user-circle"></i>  Place an Order</a>
  <a href="pastOrders.php"  id= "id4"><i class="fa fa-truck"></i>  orders</a>
</div>

<div class="content">
    <header>
    <div class="appname"><h1>Printing Job Management System</h1>

      <div class="loggedin"> Welcome <?php echo $_SESSION['user_name']; ?> 
        <div class="dropdown">
          <button class="dropbtn">Settings
        <i class="fa fa-cog"></i>
        </button>
          <div class="dropdown-content">
            <a href="userProfile.php">Profile</a>
            <a href="#">Change Password</a>
            <a href="logout.php" onclick="confirmLogout();">Logout</a>
          </div>
        </div>
    
      </div>
    </div>
    
    </header>

    <div class="main">
      <h2>Upcoming Printings</h2>
    <table>
        <thead>
        <tr>
          <th>Oder ID</th>
          <th>Product</th>
          <th>Size</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Delivery Date</th>
        </tr>
        </thead>
        <?php 
          $sql="SELECT o_id,product,size,quantity,Status, delivery_date FROM orders WHERE customerID='{$_SESSION['user_id']}'&& delivery_date IS NULL";
          $result= $conn-> query($sql);

          if ($result-> num_rows >0) {

            while ($row= $result-> fetch_assoc()) {
              $color = '';
              if($row["Status"] == 'Accept') $color = "style='background-color:royalblue'";
              if($row["Status"] == 'Finished') $color = "style='background-color:orange'";
              if($row["Status"] == 'Delivered') $color = "style='background-color:limegreen'";
              if($row["Status"] == 'Reject') $color = "style='background-color:salmon'";
              if($row["Status"] == 'Pending') $color = "style='background-color:gold'";
              echo "<tr><td>".$row["o_id"] . "</td><td>". $row["product"]. "</td><td>". $row["size"]."</td><td>".$row["quantity"]."</td><td ".$color.">".$row["Status"]."</td><td>".$row["delivery_date"] ."</td></tr>";
            }
            echo "</table>";
          }
          else {
            echo "0 result";
          }
          $conn-> close();
        ?>

      </table>

    </div>

</div>
</body>
</html>

