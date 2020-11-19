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
    document.getElementById('id11').style.backgroundColor = "#88304e";

  </script>
</head>
<div class="content">
  <div class="main">
    <h2>Generate Report</h2>
    <div class="content1">
        <!---<form method="post" action="productReport.php">
                <label>Report Type</label>
                <select name="reportType">
                  <option name="product">Product</option>
                  <option name="material">Meterial</option>
                  <option name="income">Income</option>
                </select>
                
            
            <br><br>
            <div class="dropdown">
              <button type="button" class="dropbtn"><a href="productReport.php" target="_blank">Generate Report</a></button> 
            </div>
        </form>--->
        <div class="dropdown">
              <button type="button" class="dropbtn"><a href="productReport.php" target="_blank">Generate Product Report</a></button> <br><br>
        </div><br>
        <div class="dropdown">
              <button type="button" class="dropbtn"><a href="materialReport.php" target="_blank">Generate Material Report</a></button> <br><br>
        </div><br>
        
      </div>
  </div>
</div>

<body>
	
</body>
</html>