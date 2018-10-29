<?php

require("config.php");
			session_start();
			$user=$_SESSION['user'];
			$webadd="Not avilable";
			$sql="SELECT * FROM candidate WHERE email='$user'";//Get all information about that user
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_assoc($result);

				$name=$row['name'];
				$email=$row['email'];
				$webadd=$row['webadd'];
				
				$cov=$row['coverletter'];
				$attachment_link=$row['resume'];
				$attachment_link=substr($attachment_link,13,strlen($attachment_link));
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
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

						<a href="../index.php" class="navbar-brand">Bridge<!--img src="logo1.png"--></a>


						</div><!--Navbar Header-->

					
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<a href="login.php" class="btn btn-info navbar-btn navbar-right">Logout</a>

       					

					<ul class="nav navbar-nav  pull-right">
								<li><a href="../index.php">Home</a>
								<li><a href="../index.php/#About">About Bridge</a></li>
								
								
								<li><a href="../index.php/#Contact">Contact Us </a>
								
								
							</ul>

						 </div>
				
		</div>

	</nav><!--End NavBar-->

	<div class="row " style="padding-top: 30px; > 
		<div class="container"><!--Basic Info-->
			<div class="col-lg-3" style="background-color: 	#FFE4C4;"">
				<section>
			<div class="page-header" id="About" >
  				<h2>Welcome<small>  <?php echo $user;?></small></h2>
  			<img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQupuLmBDzs0P1tyM7FLGRL9ctFamagiGAiYoLJbbMuxt1OvcSx">
  			<h4>Name : <?php echo $name;?></h4>
  			<h4>Web address : <?php echo $webadd;?></h4>
  			<h4>Cover letter : <?php echo $cov;?></h4>

  			<h4>Resume (pdf): <a href="<?php echo $attachment_link;?>"  target="_blank">Click Here</a></h4>
				
		</div>
	</section>	
			


			</div><!--Basic Info Ends-->
			<div class="col-lg-8" style="padding-left: 20px;"  >

	<div class="page-header"  id="reviews"> <!--List of reviwes-->
  
		<h1>Your profiles was reviewed by</h1>
			<?php

		$data  = "<table class='table table-hover'>";
    	$data .= "<thead>";
    	$data .= "<tr style='background-color:#cdd2d8'>";
    	$data .= "<th> Reviewed By </th>";
   	 	$data .= "<th> Stars. </th>";
     	$data .= "<th> Date </th>";
		$data .= "<th> </th>";
    	$data .= "</tr>";
    	$data .= "</thead>";
   		$data .= "<tbody>";
		
		$sql="SELECT * FROM `Review` WHERE `rev_to`='$email' ORDER BY `stars`";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{

				$data .= "<tr>";
				 $data .= "<td>" .$row['rev_by'];
				 
				 $data .= "<td>" .$row['stars'];
				
				 $data .= "<td>" .$row['Timestamp'];
				
				
				 				 
			}
				 $data .= "</tr>";
				 $data .= "</tbody>";
        		 $data .= "</table>";
       			 echo $data;
		}

		?>
		</div> <!--List of Ends-->
		</div>
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
	
	
