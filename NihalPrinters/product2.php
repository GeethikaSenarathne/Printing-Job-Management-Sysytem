<?php
  $qoute_name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $product=$_POST['product'];
  $productSize = $_POST['productSize'];
  $quantity = $_POST['quantity'];
  $sample = $_POST['sample'];
  $message = $_POST['message'];

  $tmp_name    = $_FILES['my_file']['tmp_name'];
  $name        = $_FILES['my_file']['name']; 
  $size        = $_FILES['my_file']['size'];
  $type        = $_FILES['my_file']['type'];  
  $error       = $_FILES['my_file']['error'];
  
    //validate form field for attaching the file 
  if($file_error > 0) 
  { 
      die('Upload error or No files uploaded'); 
  }

  $handle = fopen($tmp_name, "r");  // set the file handle only for reading the file 
  $content = fread($handle, $size); // reading the file 
  fclose($handle);                  // close upon completion 
  
  $encoded_content = chunk_split(base64_encode($content)); 
  
  $boundary = md5("random"); // define boundary with a md5 hashed value 
  
  
  //$email_from = 'yourname@yourwebsite.com';
  $email_from = '$visitor_email';

  $email_subject = "New Form submission";

  $email_body = "$qoute_name ask to request a quatation.\n".
                            "Here is the details:\n
                             Product: $product\n
                             Product size: $productSize\n
                             Quantity: $quantity\n
                             Sample: $sample\n.
                            Description: $message \n".
  
  $to = "geethikasenarathne@gmail.com"; 

  mail($to,$email_subject,$email_body);
  
  header('Location:index.php');
?>