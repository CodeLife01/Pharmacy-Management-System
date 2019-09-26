<?php
ob_start();
session_start();
include_once 'dbconnect.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['usr_id'])){
header("Location:login.php");
}
$usr_id = $_SESSION['usr_id'];


if(isset($_SESSION['checkout'])){
header("Location:checkout.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart|LamcoPharmacy</title>
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
<script type="text/javascript" src="js/easing.js">

</script>
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
	<script>
		var totalprice = 0;
	</script>


<script>
	     window.onload = function() {
         myFunction1();
		 myFunction2();
		 myFunction3();
		 myFunction4();
		 myFunction5();
		 myFunction6();
		 myFunction7();
		 myFunction8();
		 myFunction9();
		 myFunction10();
		 myFunction11();
		 myFunction12();
		 myFunction13();
		 myFunction14();
		 myFunction15();

   };
</script>




<body>
<!-- header -->
<?php include 'header.php'; ?>

<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Cart</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->

	<?php	if(isset($_SESSION['usr_id'])){
								echo '<input type="hidden" id="userid" name="userid" value="'. $_SESSION['usr_id'] .'" />    ';
								}
						?>
	<div class="checkout">
		<div class="container">
			<?php
			$check = mysqli_query($con, "SELECT productid FROM cart WHERE userid = '" . $usr_id. "'");
			$nop = mysqli_num_rows($check);
			if(mysqli_num_rows($check) != 0){
						echo '<h2 style="font-size: 1.4em;">Your shopping cart contains: <span>'.$nop.' Products</span></h2>';
					}
			     ?>

				<div class="checkout-right">
					<table class="timetable_sub">

					<?php
					$check = mysqli_query($con, "SELECT productid FROM cart WHERE userid = '" . $usr_id. "'");
					if(mysqli_num_rows($check) == 0){
						echo " <br><br><br><br><h2 align='center'>No Products in Cart</h2><br><br><br><br><br> ";
					}else{
					echo '<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>

							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>';
					}
					?>
					<?php
					$sql = mysqli_query($con, "SELECT productid FROM cart WHERE userid = '" . $usr_id. "'");
					$row = mysqli_num_rows($sql);

					$addid=$row+1;
					$sn=1;
					while ($row = mysqli_fetch_array($sql)){

					$pid=$row['productid'];


					$sql2 = mysqli_query($con, "SELECT * FROM products where id = '" . $pid. "'") or die(mysql_error());
					$result = mysqli_num_rows($sql2);
					$result = mysqli_fetch_array($sql2);


			echo    '<tr id="rem'.$row['productid'].'" class="rem1">
						<td class="invert">'.$sn.'</td>
						<td class="invert-image"><a href="single.php?link=' .$row['productid'] .'"><img src="'.$result['image'].'" alt=" " class="img-responsive" /></a></td>
						<td class="invert">

							 <div class="quantity">
								<div class="quantity-select">
								<input type="hidden" id="sn'.$sn.'"name="add" value="'.$result['price'].'">
									<select id="mySelect'.$sn.'" onchange="myFunction'.$sn.'()">
										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
										<option value="5">5</option>
  										<option value="6">6</option>
  										<option value="7">7</option>
  										<option value="8">8</option>
										<option value="9">9</option>
  										<option value="10">10</option>
  										<option value="11">11</option>
  										<option value="12">12</option>
									</select>
								</div>
							</div>
						</td>
						<td class="invert">'.$result['name'].'</td>
						<p id="demo'.$row['productid'].'"></p>
						<td class="invert" id="miniprice'.$result['price'].'" >&#8358;'.$result['price'].'</td>
						<td class="invert">
							<div class="rem">




								<form action="" method="post" class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<button type="submit" name='.$row['productid'].' value="X"><i>X</i></button>
								</form>'; ?>

					<?php
								if(isset($_POST[$row['productid']])){
									mysqli_query($con, "DELETE FROM cart WHERE productid='".$row['productid']."' AND userid='".$usr_id."'");
									header('Location: cart.php');
								}
							?>


						<?php


						echo		'<script>
									function myFunction'.$sn.'() {
    								var x = document.getElementById("mySelect'.$sn.'").value;
									var y = '.$result['price'].';
									var proid = '.$row['productid'].';
									var email = $("#userid").val();
									var z = x * y;
									document.getElementById("print'.$sn.'").innerHTML = z;
									document.getElementById("anoop'.$sn.'").innerHTML = z;
									add();
									$.post("quantityadd.php", { x: x, email: email, proid: proid, z: z },
									function(data) {
	 								$("#results").html(data);
	 								});
							}
							</script>
							</div>
						</td>
					</tr>';

					$sn++;

					}
					?>
					<?php
			           echo 	'<script>
									function add(){
									totalprice = 0;
								    for(i=1;i<'.$addid.';i++){
									var x = document.getElementById("anoop"+i).innerHTML;
									var value = parseInt(x,10);
									totalprice = totalprice+ value;
					   				document.getElementById("total").innerHTML = totalprice;

					   				   }

									}
								</script>';
					?>
				</table>
			</div>
			<div class="checkout-left">
				<div class="checkout-left-basket">

					<ul>


						<?php

						$sql = mysqli_query($con, "SELECT productid FROM cart WHERE userid = '" . $usr_id. "'");
						$row = mysqli_num_rows($sql);
						$sn=1;
						$jn=1;
						while ($row = mysqli_fetch_array($sql)){
						$pid=$row['productid'];
						$sql2 = mysqli_query($con, "SELECT * FROM products where id = '" . $pid. "'") or die(mysql_error());
						$result = mysqli_num_rows($sql2);
						$result = mysqli_fetch_array($sql2);


					    echo	'<li id="rem2'.$row['productid'].'">'.$result['name'].'<i></i> <span id="print'.$sn.'">'.$result['price'].'</span></li>
						<p hidden id="anoop'.$jn.'"></p>';
						$jn++;
						$sn++;
						}   ?>

						<?php
							if(mysqli_num_rows($check) != 0){
					 		echo '<li id="" class="checkout-total" style="font-size: 1em;color: #212121;">Total <i></i><span id="total"></span ></li>';
						}
						?>



					</ul>
				</div>

				<div class="clearfix"> </div>
			</div>
			<div style="text-align:center;">
						<?php
							if(mysqli_num_rows($check) != 0){

					 		echo '<form action="checkout.php" method="post">
							<input style="margin-top: 45px;background-color: #272626;color: white;border-color: black;width: 200px;height: 35px;font-size: medium;" type="submit" name="checkout" value="Confirm & Checkout">
							</form>';
										}
						?>
			</div>
		</div>
	</div>
<!-- //checkout -->



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


<!-- //footer -->
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


<!-- main slider-banner -->


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
