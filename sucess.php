<?php
include_once 'dbconnect.php';
session_start();
$url = $_SESSION['url'];

?>

<!DOCTYPE html>

<html>
<head>
<title>Thanks|Lamco</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
<style>
.center {
    margin: auto;
    width: 50%;
	margin-top: 60px;

}
img {
    display: block;
    margin: auto;
    width: 40%;
}
</style>
<body>


	<div class="logo_products" style="margin-top:40px">
		<div class="container">
		<div class="w3ls_logo_products_left1">

			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">LAMCO PHARMACY</a></h1>
			</div>


			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- Bootstrap Core JavaScript -->


<div class="center">
<img class="img" align="middle" src="images/shopping.png" alt="Shoppping" style="width:200px;height:250px;">
</div>

<div style="text-align:center;">
<h1>Your Order Has Been Placed</h1>
</div>
<div style="text-align:center;">
<h1>Thank You For Shopping With Us</h1>
</div>
<div  style="text-align:center;margin-bottom:40px;margin-top:45px">
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>

</body>
</html>
