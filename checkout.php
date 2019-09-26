<?php
include_once 'dbconnect.php';
session_start();
if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$items =" ";
$finaltotal = 0;
$usr_id = $_SESSION['usr_id'];
$sql = mysqli_query($con, "SELECT productid FROM cart WHERE userid = '" . $usr_id. "'");
$row = mysqli_num_rows($sql);
if($row==0){
	header("Location: index.php");
}else{
	$sql = mysqli_query($con, "SELECT * FROM cart WHERE userid = '" . $usr_id. "'");
	while ($row = mysqli_fetch_array($sql)) {

		$finaltotal = $finaltotal + $row['mtotal'];
	}
}


if (isset($_POST['Add'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$address1 = mysqli_real_escape_string($con, $_POST['address1']);
	$address2 = mysqli_real_escape_string($con, $_POST['address2']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$pincode = mysqli_real_escape_string($con, $_POST['pincode']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);


	mysqli_query($con, "INSERT INTO address(userid,name,address1,address2,city,state,pincode,mobile) VALUES('" . $_SESSION['usr_id'] . "', '" . $name . "', '" . $address1 . "', '" . $address2 . "', '" . $city . "', '" . $state . "', '" . $pincode . "', '" . $mobile . "')");
}

if (isset($_POST['placeorder'])){
	$sql = mysqli_query($con, "SELECT productid,quantity FROM cart WHERE userid = '" . $usr_id. "'");
	while ($row = mysqli_fetch_array($sql)){
		$pid=$row['productid'];
		$sql2 = mysqli_query($con, "SELECT name,price FROM products where id = '" . $pid. "'") or die(mysql_error());
		$result = mysqli_fetch_array($sql2);
		$items = $items.$row['quantity']."x ".$result['name']."(".$row['productid'].")-Rs.".$result['price']."  ";
	}
	$addressid = $_POST['address'];
	if(mysqli_query($con, "INSERT INTO orders(userid,items,addressid,total) VALUES('" . $_SESSION['usr_id'] . "', '" . $items . "', '" . $addressid . "', '" . $finaltotal . "')")){
		mysqli_query($con,"DELETE FROM cart WHERE userid='" . $usr_id. "' ");
		header("Location: sucess.php");
	}
	
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Checkout|LAMCO</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="Admin/image/ub.png">
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
</head>

<body>
<!-- header -->
<?php include 'header.php' ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Place Order</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<div class="container" style="min-height:880px">
  <div class="row">
    <div class="col-sm-4">
     <div >
		 <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="placeorder">
	  <div class="login-form-grids" style="width: 100%; padding: 3em; background: #F7F7F9; margin: 2em auto 0;">
				<h5 style="text-align:center">Select address</h5>
		  	<?php
		$sql = mysqli_query($con, "SELECT * FROM address where userid ='".$_SESSION['usr_id']."' ");
		  $i=1;
		while ($row = mysqli_fetch_array($sql)){
	  echo '<div>
			<b>'.$row['name'].' </b><br>
			'.$row['address1'].' <br>
			'.$row['address2'].' <br>
			'.$row['city'].' <br>
			'.$row['state'].' <br>
			'.$row['pincode'].' <br>
			Mob -'.$row['mobile'].' <br>
			<div style="padding-top: 10px;">';
		    if($i==1){
			echo '<input type="radio" name="address" value="'.$row['id'].'" checked><span style="color: #3999cc;"> Select Address</span>';
			}else{
			echo '<input type="radio" name="address" value="'.$row['id'].'"><span style="color: #3999cc;"> Select Address</span>';
			}
		echo '</div>
		   </div>
		   <p style="padding-bottom: 30px";></p>';
			$i++;
		}
   ?>

			</div>
	  </div>
	 </div>
    <div class="col-sm-8">
		<div class="login-form-grids" style="width: 100%; padding: 3em; background: #F7F7F9; margin: 2em auto 0;">

				     <h3 style="text-align:center">Total amount to Pay 	&#8358;:<?php echo $finaltotal ?></h3>

					<input type="submit" id="submit" name="placeorder" value="PLACE ORDER">
				</form>
			</div>


			<div class="login-form-grids" style="width: 100%; padding: 3em; background: #F7F7F9; margin: 2em auto 0;">
				<h5 style="text-align:center">add new address</h5>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
					<input name="name" type="text" placeholder="First Name..." required=" " >
					<input name="address1" style="margin-top: 15px;" type="text" placeholder="Address Line 1..." required=" " >
					<input name="address2" style="margin-top: 15px;" type="text" placeholder="Address Line 2..." required=" " >
					<input name="city" style="margin-top: 15px;" type="text" placeholder="City..." required=" " >
					<input name="state" style="margin-top: 15px;" type="text" placeholder="State..." required=" " >
					<input name="pincode" style="margin-top: 15px;" type="text" pattern="[0-9]{6}" placeholder="Pincode..." required=" " >
					<input name="mobile" style="margin-top: 15px;" type="text" pattern="[789][0-9]{9}" placeholder="Mobile No..." required=" " >

					<input type="submit" id="submit" name="Add" value="Add">
				</form>
			</div>

    </div>
  </div>
</div>



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

</body>
</html>
