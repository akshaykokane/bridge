<?php
require("/var/www/html/bridge/conn.php");
    if(isset($_GET)){  
       
       $star=$_GET['star'];//rating
        $rev=$_GET['product_id'];//reviwer email
        $revto=$_GET['revto'];//email id of profile he is reviewing
       // STORE THE RATING INTO DATABASE
     $sql="INSERT INTO `Review`(`rev_by`, `rev_to`, `stars`) VALUES ('$rev','$revto','$star')";
      if (mysqli_query($conn, $sql)) {
        $status = "<b class='g'>Thanks! You rated this candidate {$star} Stars. </b>";;
   
       } else {
     $status = "Error! You are already registered with the email id: ".$email;
    }
 
       
 
        // Display the result
        echo $status;
    }
     
?>
