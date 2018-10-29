
<!DOCTYPE html>
<?php
 
include("config.php");
include("location.php");
    $status="";$status1="";
      $upload=0;
      if(isset($_POST['reg']))/////////////////REGISTERATION FORM/////////////////////////
      { 
      	$secret = '6LfS9SoUAAAAANoT8DUvouETjPRmzK4oURAvL8Di';
 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
   $responseData = json_decode($verifyResponse);
   if($responseData->success){
   	$status="CAPTACHA VERIFIES";
   	
      	//FILE UPLOAD SCRIPT///
   		  if (!empty($_FILES) && isset($_FILES['fileToUpload'])) {
   		  	
  		  switch ($_FILES['fileToUpload']["error"]) {
        case UPLOAD_ERR_OK:
            $target = "/var/www/html/bridge/";
            $target = $target . basename($_FILES['fileToUpload']['name']);

            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
                
              
                 $check=mime_content_type($target);
                 
                
                if ((strncmp($check,"application/pdf"))==0) {
                    echo "File is a pdf <br>";
                    $upload=1;
                    
                } else {
                    
                	$status = "Please Upload file in pdf format only.";
                   
                    $upload=0;
                }

            } else {
                $status = "Sorry, there was a problem uploading your file.";
               
            }
            break;
        }
    }//FILE UPLOAD SCRIPT ENDS//

    //SCRIPT FOR UPLOADING DATA TO DATABASE BEGINS//
    if($upload)
    {
    $name=$_POST['name'];//name of candidate
    $email=$_POST['email'];//email of candidate
    $webadd=$_POST['webadd'];//webaddress
    $cov=$_POST['cov'];//cover letter
    $resume=$target;// link to resume
    $pass=$_POST['password'];//password
    $repass=$_POST['repassword'];
	  $ip=$_SERVER['REMOTE_ADDR'];//ip address of client
	  $timestamp=date("Y-m-d H:i:s");//get current timestamp
   
    if($pass!=$repass)
    	$status="Passwords doesn't match!<br>";
    else{
    $sql="INSERT INTO `candidate`(`name`, `email`, `webadd`, `coverletter`, `password`, `resume`, `Timestamp`, `IP`, `Location`) VALUES ('$name','$email','$webadd','$cov','$pass','$resume','$timestamp','$ip','')";
    if (mysqli_query($conn, $sql)) {
    	$status = "Thank you for registering with us! You can now login with your email-id on left";
   
	   } else {
  	 $status = "Error! You are already registered with the email id: ".$email;
    }
    }
  }


           
      } else
       {
       	$status="Robot verification failed, please try again";
       }
    
       }  

       $err="";
      if(isset($_POST['login']))/////////////////LOGIN FORM/////////////////////////
      { 
     
      	$uname=$_POST['uname'];
		$pass=$_POST['pass'];

		$sql="SELECT email FROM candidate WHERE email='$uname' AND password='$pass'";//For more securiy we can use md5 encrypted password
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1)
			{
				session_start();
        

				$_SESSION['user']=$uname;

				header("location: candidate_profile.php");

			}
		else
		{
			$err="Invalid username and/or password";
		}
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

						<a href="index.php" class="navbar-brand">Bridge<!--img src="logo1.png"--></a>


						</div><!--Navbar Header-->

					
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<a href="login.php" class="btn btn-info navbar-btn navbar-right">Login/Register</a>

       

					<ul class="nav navbar-nav  pull-right">
								<li><a href="index.php">Home</a>
								<li><a href="index.php/#About">About Bridge</a></li>
								
								
								<li><a href="index.php/#Contact">Contact Us </a>
							
								
							</ul>
						 </div>
				
		</div>

	</nav><!--End NavBar-->

	<div class="row " style="padding-top: 30px">
	<div class="container">
	<div class="col-lg-4" style="background-color: 	#FFE4C4;"">
		<div class="page-header" id="login" ><!--Login Form Starts-->
		<h1>Login</h1>
		<p>Enter your username and password</p>		
		</div>
			
			<form method="POST" action="#" class="form-horizontal">
			 <?php echo $err; ?>
			 <div class="form-group">
                <label for="user-name" class="col-lg-4 control-label"> Username </label>
                <div class="col-lg-8">
                  <input type="text" name="uname" class="form-control" id="user-name" placeholder="Enter you username" required>
                </div>
              </div><!-- End form group -->

              	 <div class="form-group">
                <label for="password"  class="col-lg-4 control-label">Password</label>
                <div class="col-lg-8">
                  <input type="password" name="pass" class="form-control" placeholder="Password" required>
                </div>
              </div><!-- End form group -->
			
			 <div class="form-group">
                <div class="col-lg-10 col-lg-offset-5">
                  <button type="submit" name="login" class="btn btn-warning">Login</button>
                    <a href="" style=" text-decoration:none;">Forget password?</a>
                </div>

                </div>
			</div>
			</form><!--Login Form Ends-->

		<div class="col-lg-8" style="padding-left: 20px;"  >

	<div class="page-header"  id="register"><!--Registeration Form Starts-->
  
		<h1>Register</h1>
		<p>Please enter your details</p>		
		</div>
			
			<form method="POST" action="login.php" class="form-horizontal" enctype="multipart/form-data">
			<?php echo "<h3>".$status ."</h3>"; ?>
       
			 <div class="form-group">
                <label for="name" class="col-lg-2 control-label"> Name </label>
                <div class="col-lg-8">
                  <input type="text" class="form-control"name= "name" placeholder="Enter you  Name" required>
                </div>
              </div><!-- End form group -->
 				
 			<div class="form-group">
                <label for="email" class="col-lg-2 control-label"> Email-id </label>
                <div class="col-lg-8">
                  <input type="email" class="form-control" name="email" placeholder="Enter you Email-id" required>
                </div>
              </div><!-- End form group -->
               <div class="form-group">
                <label for="webadd" class="col-lg-2 control-label"> Web Address </label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="webadd" placeholder="Enter you Web address (if any)">
                </div>
              </div><!-- End form group -->

               <div class="form-group">
                        <label for="cover-letter" class="col-lg-2 control-label"> Cover Letter </label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="cov" placeholder="Cover-Letter" required>
                </div>
              </div><!-- End form group -->

              
              	 <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-8">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
              </div><!-- End form group -->

              	 <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Reconfirm</label>
                <div class="col-lg-8">
                  <input type="password" class="form-control" name="repassword" placeholder="Re-Confirm Password" required>
                </div>
              </div><!-- End form group -->
              	
              <div class="form-group">
                        <label for="cv:" class="col-lg-2 control-label">CV/Resume</label>
                <div class="col-lg-8">
                  <input type="file" name="fileToUpload" id="fileToUpload" required>
   					
                </div>
              </div><!-- End form group -->
              
              	

               <div class="form-group">

                <div class="col-lg-10 col-lg-offset-2">
                 <div class="g-recaptcha" data-sitekey="6LfS9SoUAAAAAPFKZ56RIt0_SjfEuh-oAcVaV_rm"></div>
                  <button type="submit" name="reg" class="btn btn-primary">Register</button>
                 
                    <a href="index.php#Contact" style=" text-decoration:none;">Having problem?</a>
                </div>
              </div>

			</div>
			</form><!--Registeration Form Ends-->

		</div>
		
		</div>

		</div>
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
	
	
