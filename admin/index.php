
<!DOCTYPE html>
<?php
require("/var/www/html/bridge/conn.php");
session_start();
unset($_SESSION['admin']);
   if(isset($_POST['login']))/////////////////LOGIN FORM/////////////////////////
      { 
     
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];

        $sql="SELECT email FROM admins WHERE email='$uname' AND password='$pass'";//For more securiy we can use md5 encrypted password
        $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==1)
        {
          session_start();
          $_SESSION['admin']=$uname;
          header("location: reviewer_profile.php");

        }
      else
      {
        $err="Incorrect username and/or password";
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
<link rel="stylesheet" type="text/css" href="fend.css" media="screen" />
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
                <li><a href="bridge/index.php/#About">About Bridge</a></li>
                
                
                <li><a href="bridge/index.php/#Contact">Contact Us </a>
              
                
              </ul>
             </div>
        
    </div>

  </nav><!--End NavBar-->

  <div class="row " style="padding-top: 30px">
  <div class="container">
  <div class="col-lg-4" style="background-color:  #FFE4C4;"">
    <div class="page-header" id="login" >
    <h1>Login</h1>
    <p>Enter your username and password</p>   
    </div>
      
      <form method="POST" action="index.php" class="form-horizontal"><!--Login Form -->
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
      </form><!--Login Ends -->

    <div class="col-lg-8" style="padding-left: 20px;"  >

  <div class="page-header"  id="register"><!--Registeration Form -->
  
    <h1>Register(for employer only)</h1>
    <p>Please enter your details</p>    
    </div>
      
      <form method="POST" action="login.php" class="form-horizontal" enctype="multipart/form-data">
      <?php echo "<h3>".$status ."</h3>"; ?>
        <?php echo "<h3>".$status1 ."</h3>"; ?>
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
                <label for="company" class="col-lg-2 control-label">Company</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="compnay" placeholder="Company Name" required>
                </div>
              </div><!-- End form group -->
                

               <div class="form-group">

                <div class="col-lg-10 col-lg-offset-2">
                                  <button type="submit" name="reg" class="btn btn-primary">Register</button>
                 
                    <a href="index.php#Contact" style=" text-decoration:none;">Having problem?</a>
                </div>
              </div>

      </div>
      </form><!--Registeration Form -->

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
  
  
