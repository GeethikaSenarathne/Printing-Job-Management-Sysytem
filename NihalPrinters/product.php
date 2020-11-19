<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pressmanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$target_dir = "C:\\xampp\\htdocs\\mit\\NihalPrinters\\attachments\\";
$target_file = $target_dir . basename($_FILES["sample"]["name"]);


// Check if $uploadOk is set to 0 by an error
//die($_FILES["sample"]["tmp_name"]);
move_uploaded_file($_FILES["sample"]["tmp_name"], $target_file);

  $qoute_name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $product=$_POST['product'];
  $productSize = $_POST['productSize'];
  $quantity = $_POST['quantity'];
  $sample = $_FILES["sample"]["name"];
  $message = $_POST['message'];

$sql= "INSERT INTO qoute (name, email, product, productSize, quantity, sample, message)
                                        VALUES('$qoute_name','$visitor_email','$product','$productSize','$quantity','$sample','$message')";

if ($conn->query($sql) === TRUE) {
    header('Location:index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



// Recipient 
$to = 'geethikasenarathne@gmail.com'; 
 
// Sender 
$from = 'sender@example.com'; 
$fromName = 'CodexWorld'; 
 
// Email subject 
$subject = 'New Form submission';  
 
// Attachment file 
//$file = "attachments/123.jpg"; 
 
// Email body content 
$htmlContent = "
    <h3>Request for Quatation</h3> 
    <p>Here is the details:</p> 
    <p>Product: $product</p> 
    <p>Product size: $productSize </p> 
    <p>Quantity: $quantity</p> 
    <p>Sample: <a href=\"http://localhost/mit/NihalPrinters/attachments/$sample\">Download</a></p> 
    <p>Description: $message</p> 
"; 


// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 

?>