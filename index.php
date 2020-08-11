<!DOCTYPE html>
<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require 'vendor/autoload.php';
  $mail = new PHPMailer(true);

  if(!empty($_POST)) {
    $success=0;
   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = trim(stripslashes($_POST['subject']));
   $mobile = trim(stripslashes($_POST['mobile']));
   $contact_message = trim(stripslashes($_POST['message']));
   $error =array();
    if (strlen($name) < 2) {
      $error['name'] = "Please enter your name.";
    }

    if (strlen($mobile) < 10) {
      $error['mobile'] = "Please enter mobile number.";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
      $error['email'] = "Please enter a valid email address.";
    }
    // Check Message
    if (strlen($contact_message) < 15) {
      $error['message'] = "Please enter your message. It should have at least 15 characters.";
    }
       // Subject
    if ($subject == '') { $subject = "Contact Form Submission"; }
    $message ="";
    $message .= "Email from: " . $name . "<br />";
    $message .= "Email address: " . $email . "<br />";
    $message .= "Email address: " . $mobile . "<br />";
    $message .= "Message: <br />";
    $message .= $contact_message;
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'brownangler.com'; 
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->setFrom($email);
    $mail->addAddress('bhaskar@ascratech.in');
    $mail->Username = 'bhaskar@brownangler.com';
    $mail->Password = 'Bhaskar@0812';
    $mail->Subject = $subject;
    $mail->From = 'bhaskar@brownangler.com';
    $mail->FromName = $name;
    $mail->Body = $message;
    $mail->SMTPSecure = 'tls';
    //echo "<pre>";  print_r($mail);die;
    if(!$error){
      $send = $mail->send();
      if(!$send) {
        echo 'Email is not sent.';
        echo 'Email error: ' . $mail->ErrorInfo;
      } else {
        $success=1;
      }
    }
     /*  // Set Message
    $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";


       // Set From: header
      $from =  $name . " <" . $email . ">";

       // Email Headers
      $headers = "From: " . $from . "\r\n";
      $headers .= "Reply-To: ". $email . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $siteOwnersEmail = 'bhaskar@ascratech.in';
      if (!$error) {

      //ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);
        if ($mail) { $success=1; }
        else { $success=0; }

      } # end if - no validation error*/

    }
    
?>


<html lang="en">
  <head>
    <title>Profit-mart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="bg-wrap">
							<div class="row">
								<div class="col-md-6 d-flex align-items-center">
									<p class="mb-0 phone pl-md-2">
										<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +91 9691299845</a> 
									</p>
								</div>
								<!-- <div class="col-md-6 d-flex justify-content-md-end">
									<div class="social-media">
						    		<p class="mb-0 d-flex">
						    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
						    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
						    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						    		</p>
					        </div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><img src="images/Profitmart-Logo.png"/></a>
	    	
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item"><a href="#about" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="#about-company" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="#about-max" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="#contact_us" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="hero-wrap" id="about">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-8 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<h2>We Business Grow</h2>
			            <h1 class="mb-4">We Help You for better investment and profit</h1>
			            <p><a href="#contact_us" class="btn btn-white">Connect with us</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-8 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<h2>We Support Business</h2>
			            <h1 class="mb-4">The Best Equity/Comodity Support</h1>
			            <p><a href="#contact_us" class="btn btn-white">Connect with us</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/bg_3.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-center">
		          <div class="col-md-8 ftco-animate">
		          	<div class="text w-100 text-center">
		          		<h2>We Give Advice</h2>
			            <h1 class="mb-4">Expert Financial Advice</h1>
			            <p><a href="#contact_us" class="btn btn-white">Connect with us</a></p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	  </div>
   	
    <section class="ftco-section ftco-no-pt bg-light" id="about-max">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
    				</div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-md-5">
    				<div class="heading-section pl-md-4 pt-md-5">
    					<span class="subheading">Welcome to Profit-max</span>
	            <h2 class="mb-4">We Are the Best Broking Agency</h2>
    				</div>
    				<div class="services-2 w-100 d-flex">
    					<div class="d-flex align-items-center justify-content-center"><span ><img src="images/equity-icon.png"></span></div>
    					<div class="text pl-4">
    						<h4>EQUITY</h4>
    						<p>Trading in equities with Profitmart brings you the very best of the Technology, Research, Access and Ease.</p>
    					</div>
    				</div>
    				<div class="services-2 w-100 d-flex">
    					<div class="d-flex align-items-center justify-content-center"><span ><img src="images/Commodities-icon.png"></span></div>
    					<div class="text pl-4">
    						<h4>COMMODITY</h4>
    						<p>Commodities derivative market has emerged as a new avenue for investors to create wealth.</p>
    					</div>
    				</div>
    				<div class="services-2 w-100 d-flex">
    					<div class="d-flex align-items-center justify-content-center"><span ><img src="images/currency-icon.png"></span></div>
    					<div class="text pl-4">
    						<h4>CURRENCY</h4>
    						<p>The global increase in trade and foreign investments has led to inter-connection of many national economies.</p>
    					</div>
    				</div>
    				<div class="services-2 w-100 d-flex">
    					<div class="d-flex align-items-center justify-content-center"><span ><img src="images/wealth-managment-icon.png"></span></div>
    					<div class="text pl-4">
    						<h4>WEALTH MANAGEMENT</h4>
    						<p>Your financial success depends on being able to put all the puzzle pieces of your life’s goals together.</p>
    					</div>
    				</div>
            <div class="services-2 w-100 d-flex">
              <div class="d-flex align-items-center justify-content-center"><span ><img src="images/depository-icon.png"></span></div>
              <div class="text pl-4">
                <h4>DEPOSITORY</h4>
                <p>Our depository services offer you a secure, convenient, paperless and cost effective way to keep track of your investments.</p>
              </div>
            </div>
            <div class="services-2 w-100 d-flex">
              <div class="d-flex align-items-center justify-content-center"><span ><img src="images/stock-sip.png"></span></div>
              <div class="text pl-4">
                <h4>STOCK SIP</h4>
                <p>Stock SIP is a vehicle offered to help investor save regularly. It is just like a recurring deposit with the bank where investor put in a small amount every month.</p>
              </div>
            </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light ftco-faqs">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6">
    				<div class="img-faqs w-100">
	    				<div class="img mb-4 mb-sm-0" style="background-image:url(images/about-2.jpg);">
	    				</div>
	    				<div class="img img-2 mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
	    				</div>
	    			</div>
    			</div>
    			<div class="col-lg-6 pl-lg-5" id="about-company">
    				<div class="heading-section mb-5 mt-5 mt-lg-0">
    					<span class="subheading">About Us</span>
	            <h2 class="mb-3">Who we are?</h2>
	            <p><b>PROFITMART</b> is an emerging Broking house in India offering diversified investment options like Equities, Derivatives, Currency, Commodities, IPO, Mutual Funds and Real Estate.

            At Profitmart, we focus on delivering efficient trading software, supported with effective investing tools, which are helpful to maximize your profits.

            We’ve been hard at work creating an investment experience to achieve your financial goals. It’s our passion to offer you the best Product, Technology & Service. We ensure the trading experience at Profitmart to be one of its kind, with the help of our expertise.

            You deserve a better way to invest. We aim to deliver it.</p>
    				</div>
    				<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
						  <div class="card">
						    <div class="card-header p-0" id="headingOne">
						      <h2 class="mb-0">
						        <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
						        	<p class="mb-0">Vision</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
						      <div class="card-body py-3 px-0">
						      	<p>To become the most trusted Savings and Investments Partner for our Clients and to provide investors with the best value through innovative products, investment strategies, advanced technology.</p>
						      </div>
						    </div>
						  </div>

						  <div class="card">
						    <div class="card-header p-0" id="headingTwo" role="tab">
						      <h2 class="mb-0">
						        <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
						        	<p class="mb-0">Mission</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="card-body py-3 px-0">
						      	<div class="card-body py-3 px-0">
                    <p>To build value for Customers, Employees, and other Stakeholders by creating new industry benchmarks in Financial Product Solutions and Services in the most innovative and cost-effective ways.</p>
                  </div>
						      </div>
						    </div>
						  </div>
						</div>
	        </div>
        </div>
    	</div>
    </section>

    <footer class="footer">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-8">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-10">
										<div class="row">
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Services</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">EQUIRT</a></li>
						              <li><a href="#" class="py-1 d-block">COMMODITY</a></li>
						              <li><a href="#" class="py-1 d-block">CURRENCY</a></li>
						              <li><a href="#" class="py-1 d-block">WEALTH MANAGEMENT</a></li>
                          <li><a href="#" class="py-1 d-block">DEPOSITORY</a></li>
                          <li><a href="#" class="py-1 d-block">STOCK SIP</a></li>
						            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Profitmax <i class="fa fa-heart" aria-hidden="true"></i>
					  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5" id="contact_us">
						<h2 class="footer-heading">Free consultation</h2>
						<form action="index.php#contact_us" method="POST" class="form-consultation">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo !empty($name)?$name:'';?>">
              <span style="color: red;"><?php echo !empty($error['name'])?$error['name']:''?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" value="<?php echo !empty($email)?$email:'';?>" placeholder="Your Email">
               <span style="color: red;"><?php echo !empty($error['email'])?$error['email']:''?></span>
              </div>
              <div class="form-group">
                <input type="text" value="<?php echo !empty($subject)?$subject:'';?>" class="form-control" name="subject" placeholder="Subject">
              <span style="color: red;"><?php echo !empty($error['subject'])?$error['subject']:''?></span>
              </div> 
              <div class="form-group">
                <input type="text" value="<?php echo !empty($mobile)?$mobile:'';?>" class="form-control" name="mobile" placeholder="Mobile No.">
               <span style="color: red;"><?php echo !empty($error['mobile'])?$error['mobile']:''?></span>
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="3"  name="message" class="form-control" placeholder="Message"><?php echo !empty($Message)?$Message:'';?></textarea>
              <span style="color: red;"><?php echo !empty($error['message'])?$error['message']:''?></span>
              </div>
              <div><?php if(!empty($success)){
                echo "<span style='color:green;'><b>Thankyou for your intrest, We will get back to you soon.</b></span>";
              }?></div>
              <div class="form-group">
              	<button type="submit" class="form-control submit px-3">Send A Message</button>
              </div>
            </form>
					</div>
				</div>
			</div>
		</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

