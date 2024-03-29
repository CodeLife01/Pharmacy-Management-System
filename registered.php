<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}



//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['register'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$address1 = mysqli_real_escape_string($con, $_POST['address1']);
	$address2 = mysqli_real_escape_string($con, $_POST['address2']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$pincode = mysqli_real_escape_string($con, $_POST['pincode']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);



	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 8) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')") ) {
			$_SESSION['usr_name'] = $name;
			$_SESSION['usr_email'] = $email;
			$result = mysqli_query($con, "SELECT id FROM users WHERE email = '" . $email. "'");
			$row = mysqli_fetch_array($result);
			$_SESSION['usr_id'] = $row['id'];
			if(mysqli_query($con, "INSERT INTO address(userid,name,address1,address2,city,state,pincode,mobile) VALUES('" . $_SESSION['usr_id'] . "', '" . $name . "', '" . $address1 . "', '" . $address2 . "', '" . $city . "', '" . $state . "', '" . $pincode . "', '" . $mobile . "')")){
				$successmsg = "Successfully Registered! <a href='index.php'>Click here to Login</a>";
				header("Location: index.php");
			}
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>





<!DOCTYPE html>
<html>
<head>
<title>Register|MySite</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="Admin/image/ub.png">
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
 <?php include 'header.php'; ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
					<input name="name" type="text" placeholder="First Name..." required=" " >
					<input name="address1" style="margin-top: 15px;" type="text" placeholder="Address Line 1..." required=" " >
					<input name="address2" style="margin-top: 15px;" type="text" placeholder="Address Line 2..." required=" " >
					<input name="city" style="margin-top: 15px;" type="text" placeholder="City..." required=" " >
					<input name="state" style="margin-top: 15px;" type="text" placeholder="State..." required=" " >
					<input name="pincode" style="margin-top: 15px;" type="text" pattern="[0-9]{6}" placeholder="Pincode..." required=" " >
					<input name="mobile" style="margin-top: 15px;" type="text" pattern="[789][0-9]{9}" placeholder="Mobile No..." required=" " >
					<h6>Login information</h6>


					<input name="email" type="email" id="email" placeholder="Email Address" required=" " onblur="checkAvailability()" onkeyup='check();'><span id="user-availability-status"></span>
					<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>

					<input name="password" type="password" id="password" placeholder="Password" required=" " pattern=".{8,}" title="8 or more characters">
					<input name="cpassword" type="password" id="confirm_password" placeholder="Password Confirmation" required=" ">
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox" required="" title="Please Accept terms and conditions"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" id="submit" name="register" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- //footer -->

<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2019 MySite. All rights reserved | Design by LAMCO PHARMACY Inc.</a></p>
			</div>
		</div>

	</div>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});

		});
</script>
<!-- //main slider-banner -->

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){
	}
	});
}
</script>

</body>
</html>
