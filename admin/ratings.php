<html>
<?php
include('/var/www/html/bridge/conn.php');
        $email=$_GET['email'];
        $user=$_GET['review'];
        $url=$user."&"."revto=".$email;//preparing url contaning email address of reviwer aswell as email of profile he is reviewing
    ?>


<head>
    <title>Rate</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="star.css">
</head>
<body><!--Reviwer system -->

    <input type="hidden" value="<?php echo $url; ?>" id="product_id"><!--Reviwer system starts -->
    <div class="container">
        <h1>REVIEW SYSTEM</h1>
        <div id="star-container">
            <i class="fa fa-star fa-3x star" id="star-1"></i>
            <i class="fa fa-star fa-3x star" id="star-2"></i>
            <i class="fa fa-star fa-3x star" id="star-3"></i>
            <i class="fa fa-star fa-3x star" id="star-4"></i>
            <i class="fa fa-star fa-3x star" id="star-5"></i>
        </div>
        <div id="result">
      
        </div>
        <?php
      
        
        
        $rating="";
              echo "<h1> Showing profile of : ".$email."</h1>";
        $sql="SELECT * FROM candidate WHERE email='$email';" ;
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_assoc($result);
            
            echo "<h3> Name :".$row['name']."</h3>";
            echo "<h3> Email : ".$row['email']."</h3>";
            echo "<h3> Web address : ".$row['webadd']."</h3>";
            echo "<h3> Cover Letter : ".$row['coverletter']."</h3>";

            echo "<h3> Timestamp : ".$row['Timestamp']."</h3>";
            echo "<h3> IP : ".$row['IP']."</h3>";
            echo "<h3> Location(based on IP)".$row['Location']."</h3>";
           
            $attachment_link=$row['resume'];
                $attachment_link=substr($attachment_link,13,strlen($attachment_link));
                echo "<h3> Resume (pdf) : "."<a href='".$attachment_link."'target='_blank'>Click Here to Open</a>"."</h3>";
                                 
            
                 
        }

    ?>
    </div><!--Reviwer system end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="star.js">
      
    </script>
   
</body>
</html>
