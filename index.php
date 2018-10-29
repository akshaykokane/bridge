<!DOCRTPE html>
<!DOCTYPE html>

<html>
<head>
	
	<meta charset="utf-8">

	<meta name="descroption" content="WebApp">
	<title>
		Bridge
	</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
</head>
<body data-spy="scroll " data-target="#my-navbar animated fadeIn" id="Home" >

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
							<a href="members-area/login.php" class="btn btn-info navbar-btn navbar-right">Login/Register</a>

       

					<ul class="nav navbar-nav  pull-right">
								<li><a href="#Home">Home</a>
								<li><a href="#About">About Bridge</a></li>
								
								
								<li><a href="#Contact">Contact Us </a>
							
								
							</ul>
						 </div>
				
		</div>

	</nav><!--End NavBar-->

	<!--jumbotron-->
	<div class="jumbotron" style="text-align: center; background-image: " >
		<div class="container">
		<div class="col-sm-4" style="padding-top: 30px">
				
				<img class="img-responsive pull-right" src="http://www.siboom.com/wp-content/uploads/2014/02/checklist-red-300x300.png" alt="Image here">


				  				 </div>
			<div class="col-sm-8 pull-right">
				<h1 id="heading" style="color:red">B<small style="color:white">ridge</small></h1>
				<h2>India's Largest Evaluation Platform</h2>
					<h3>Its FREE!! Just Sign Up and get Instant Reviews and Job Offers</h3>
			
  			</div>
  			
	  	</div>
	  	

	</div><!--End of jumbotron-->	
<section>
		<div class="page-header" id="About" >
  		<h2>About Us <small>  Check out who are we and what we do!</small></h2>
  			<h3>Bridge is the web based platform that allows candidates to be evaluated by
				multiple people.</h3>
				
				<h4 style="line-height: 40px;"><b>This is sample text and dont have any context</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galleyLorem Ipsum is simply dummy text of the printing.
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
				Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galleyLorem Ipsum is simply dummy text of the printing.</h4>
				
		</div>
	</section>	
	

	<!-- Contact -->
	<div class="container">
		<section>
			<div class="page-header" id="Contact">
  				<h2>Contact Us.<small> Feel free to contact us if you have any doubt, feedback or suggestion</small></h2>
  			</div><!-- End Page Header -->

  				 <div class="row">
         		 	<div class="col-lg-4">
           		 <p>Send us a message, or contact us from the address below</p>

           		 	<address>
  						<strong>Bridge</strong></br>
  						
  						Pune, India.</br>
  						Phone:7350065202</br>
              E-mail: support@bridge.in</br>

  					</address>
            		
         			 </div>
         		
				<div class="col-lg-8">
					
						<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-horizontal">
              <div class="form-group form-group required">
                <label for="user-name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name" placeholder="Enter you name">
                </div>
              </div><!-- End form group -->

              <div class="form-group form-group required">
                <label for="user-email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="email" placeholder="Enter you Email Address">
                </div>
              </div><!-- End form group -->

              <div class="form-group ">
                <label for="user-url" class="col-lg-2 control-label">Phone </label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="phone" placeholder="10 digit mobile number.">
                </div>
              </div><!-- End form group -->

              <div class="form-group ">
                <label for="user-message" class="col-lg-2 control-label">Any Message</label>
                <div class="col-lg-10">
                  <textarea name="message" class="form-control" 
                  cols="20" rows="10" placeholder="Enter your Message"></textarea>
                </div>
              </div><!-- End form group -->

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" name="contact" class="btn btn-primary">Submit</button>
                </div>
              </div>

             
            
            </form>

				</div>


				</div>


  				</section>
  				</div>
<!--Call to action-->
	<footer>
	
		<div class="well">
			<div class="container text-center">
			<div class="col-xs-4">
					<h1>Made with <span><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/169px-Heart_coraz%C3%B3n.svg.png" height="30px;"> for India</h1>


			</div>
			<div class="col-xs-4 pull-right">
					<h1>Follow Us</h1>
					

					<hr>

        <ul class="list-inline">
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">YouTube</a></li>
        </ul>

		
        </div>
        </div>


		</div><!--End of action-->
		 <div class="container text-center">

		<hr>

       

        <p>&copy; Copyright @ 2016</p>

      </div><!-- end Container-->


</footer>

		<!--Scrolling-->

    <script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});

  // Add smooth scrolling on all links inside the navbar
  $("#my-navbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 100, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>

<!---Schrolling Ends-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
