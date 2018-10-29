<?php
require("/var/www/html/bridge/conn.php");
include
			session_start();
			$user=$_SESSION['admin'];
			
			$sql="SELECT * FROM admins WHERE email='$user'";//Get all information about that user
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_assoc($result);

				
				$email=$row['email'];
				$company=$row['Company'];
			}

?>
<html>

<head>

	<meta charset="utf-8">

	<meta name="descroption" content="WebApp">
	<title>
		Bridge
	</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" type="text/css" href="fend.css" media="screen" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<body data-spy="scroll" data-target="#my-navbar" id="Home"  >

<!--NavBar-->
	<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
  			<div class="container">
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							
						</button>

						<a href="index.php" class="navbar-brand">Bridge<!--img src="logo1.png"--></a>


						</div><!--Navbar Header-->

					
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<a href="index.php" class="btn btn-info navbar-btn navbar-right">Logout</a>

       					

					<ul class="nav navbar-nav  pull-right">
								<li><a href="index.php">Home</a>
								<li><a href="bridge/index.php/#About">About Bridge</a></li>
								
								
								<li><a href="bridge/index.php/#Contact">Contact Us </a>
								
								
							</ul>

						 </div>
				
		</div>

	</nav><!--End NavBar-->

	<<div class="row " style="padding-top: 30px; >
		<div class="container">
			<div class="col-lg-3" style="background-color: 	#FFE4C4;"">
				<section>
			<div class="page-header" id="About" >
  				<h2>Welcome<small>  <?php echo $user;?></small></h2>
  			<img class="img-responsive" src="http://www.freelogovectors.net/wp-content/uploads/2013/02/administrator.png">
  			<h4>Compnay : <?php echo $company;?></h4>
  			

  			
				
		</div>
	</section>	
			


			</div>
			<div class="col-lg-8" style="padding-left: 20px;"  ><!--Porfile to be reviwed list -->

	<div class="page-header"  id="reviews">
  
		<h1>Profiles</h1>
		<?php

		$data  = "<table class='table table-hover'>";
    	$data .= "<thead>";
    	$data .= "<tr style='background-color:#cdd2d8'>";
    	$data .= "<th> Name </th>";
   	 	$data .= "<th> Email. </th>";
     	$data .= "<th> Cover Letter </th>";
		$data .= "<th> </th>";
    	$data .= "</tr>";
    	$data .= "</thead>";
   		$data .= "<tbody>";
		
		$sql="SELECT * FROM candidate";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
			/*First Checks, which profiles reviwer has already reviwed*/
				$e=$row['email'];
				$sql1="SELECT * FROM `Review` WHERE rev_to='$e' AND rev_by='$user'";
				$result1=mysqli_query($conn,$sql1);
				if(mysqli_num_rows($result1)==0)
				{
					$data .= "<tr>";
				 $data .= "<td>" .$row['name'];
				 
				 $data .= "<td>" .$row['email'];
				 $email=$row['email'];
				 $data .= "<td>" .$row['coverletter'];
				 $data .= "<td>" ."<a href='star.php?email=$email&review=$user' style='text-decoration:none' target='_blank'><button class='btn btn-info' >Review</button></a>";
				
				} 				 
			}
				 $data .= "</tr>";
				 $data .= "</tbody>";
        		 $data .= "</table>";
       			 echo $data;
		}

		?>
			
		</div>
		</div>
		<div class="col-lg-10" style="padding-left: 80px;"  ><!--Porfile to be reviwed list ends -->

	<div class="page-header"  id="reviews"><!--reviwed profile list -->
  
		<h1>Profiles you reviewed</h1>
		<?php

		$data  = "<table class='table table-hover'>";
    	$data .= "<thead>";
    	$data .= "<tr style='background-color:#cdd2d8'>";
    	$data .= "<th> Reviewed </th>";
   	 	$data .= "<th> Stars. </th>";
     	$data .= "<th> Date </th>";
		$data .= "<th> </th>";
    	$data .= "</tr>";
    	$data .= "</thead>";
   		$data .= "<tbody>";
		
		$sql="SELECT * FROM `Review` WHERE `rev_by`='$user' ORDER BY `stars` DESC ";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{

				$data .= "<tr>";
				 $data .= "<td>" .$row['rev_to'];
				 
				 $data .= "<td>" .$row['stars'];
				 $email1=$row['rev_to'];
				 $data .= "<td>" .$row['Timestamp'];
				 $data .= "<td>" ."<a href='ratings.php?email=$email1&review=$user' style='text-decoration:none' target='_blank'><button class='btn btn-info' >Review</button></a>";
				
				 				 
			}
				 $data .= "</tr>";
				 $data .= "</tbody>";
        		 $data .= "</table>";
       			 echo $data;
		}

		?>
			
		</div>
		</div><!--reviwed profile list ENDS -->
	</div>

	


<!--Call to action-->
	<footer>
	

		
		</div><!--End of action-->
		 <div class="container text-center">

		<hr>

        <ul class="list-inline">
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">YouTube</a></li>
        </ul>

        <p>&copy; Copyright @ 2016</p>

      </div><!-- end Container-->
      

</footer>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
	
	
