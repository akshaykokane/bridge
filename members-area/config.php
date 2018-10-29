<!This file is for db connectivity. MYSQL has been used for this web app. --->

<?php
$conn = mysqli_connect("localhost","root","root","bridge");
$mess=" ";
// Check connection
if (mysqli_connect_errno())
  {
	
  	  die(mysqli_connect_error());
  	 
  
  }
  

?>
