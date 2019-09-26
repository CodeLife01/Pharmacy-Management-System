<?php
session_start();
include_once 'dbconnect.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];


if ( !empty($_POST['searchtext'])){
  $text = $_POST['searchtext'];
  $_SESSION['searchtext'] = $text;
}
else{
  $text = $_SESSION['searchtext'];
}



if(isset($_GET["page"])){
	 $page  = $_GET["page"];
}
else{
	$page=1;
}
$res = mysqli_query($con,"SELECT COUNT(*) AS total FROM products");
$row = mysqli_fetch_array($res);
$total_pages = ceil($row["total"] / 16);

?>



<?php

	if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_email'] = $row['email'];
   		
}
	else {
		$errormsg = "Incorrect Email or Password!!!";
	echo'	<script type="text/javascript">
				$(document).ready(function(){
				$("#myModal").modal("show");
				});
			</script> ';

	}
}



?>

<!DOCTYPE html>


<style>
/.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px<!-- <li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li> -->; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 0px;
    border: 1px solid #888;
    width: 90%;
	    margin-top: 40px;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}* The Modal (background) */

.button{
	font-size: 14px;
    color: #fff;
    background: #3399cc;
    text-decoration: none;
    position: relative;
    border: none;
    border-radius: 0;
    width: 100%;
    text-transform: uppercase;
    padding: .5em 0;
    outline: none;
}


</style>
<html>
<head>
<title>Search|Lamco</title>
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
				<li class="active">Search</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->


<!--- gourmet --->
	<div class="products">
		<div class="container">

			<div class="col-md-12 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>
              </select>
						</div>

						<div class="clearfix"> </div>
					</div>
				</div>
            </div>


				<div class="agile_top_brands_grids">
	<?php
				$i=1;
        $start = ($page-1) * 16;
        if($text!=NULL){
          if(strlen($text<3)){
            $res = mysqli_query($con,"SELECT * FROM products WHERE name LIKE '$text%' LIMIT $start,16");
          }
          else{
				        $res = mysqli_query($con,"SELECT * FROM products WHERE name LIKE '%$text%' LIMIT $start,16");
          }

          if(mysqli_num_rows($res) == 0){
            echo " <h2 align='center'>Your search doesn't match any product</h2> ";
          }
				      while ($row = mysqli_fetch_array($res)) {
						  	$id = $row['id'];
				            echo '<div class="col-md-3 top_brand_left">
						                <div class="hover14 column">
							                 <div class="agile_top_brand_left_grid">
                                  <div class="agile_top_brand_left_grid1">
									                   <figure>
										                   <div class="snipcart-item block" >
														             <div class="snipcart-thumb">
															             <a href="single.php?link=' .$id .'"><img style="height:150px" title=" " alt=" " src="'.$row['image'].'" /></a><br>
															<p><a href="single.php?link=' .$id .'">'.$row['name'].'</a></p>
															             <h4>&#8358;'.$row['price'].'</h4>
														             </div>
											                   <div class="snipcart-details top_brand_home_details">
												                   <form action="" method="post">
													<fieldset>
														<input type="hidden" name="productid" value="'.$row['id'].'">
														<input type="hidden" name="add" value="1">
														<input type="hidden" name="business" value=" ">
														<input type="hidden" name="item_name" value="'.$row['name'].'">
														<input type="hidden" name="amount" value="'.$row['price'].'">
														<input type="hidden" name="discount_amount" value="0.00">
														<input type="hidden" name="currency_code" value="INR">
														<input type="hidden" name="return" value=" ">
														<input type="hidden" name="cancel_return" value=" ">';
					if(isset($_SESSION['usr_id'])){
												echo  '<input type="button" class="button" id="'. $row['id'] .'" onclick="SubmitFormData(this);" value="ADD To CART" />';
					}
											echo	'</fieldset>
												</form>
												<div id="results'. $row['id'] .'">';
					if(!isset($_SESSION['usr_id'])){

											echo '<button type="button" Style="font-size: 14px;color: #fff;background: #3399cc;text-decoration: none;position: relative;border: none; border-radius: 0;width: 100%;text-transform: uppercase;padding: .5em 0;outline: none;	" data-toggle="modal" data-target="#myModal">ADD TO CART</button>';
					}
									echo	'</div>
										</div>
									</figure>
								                    </div>
							                    </div>
						                    </div>
					                    </div>';

					if($i%4==0){
					echo   '<div class="clearfix"> </div>
							</div>
							<div class="agile_top_brands_grids">';

					}
					$i++;
			}
    }
    else {
      echo " <h2 align='center'>Your have not entered any keyword to search</h2> ";
    }
		?>





				<div class="agile_top_brands_grids">


				<div class="clearfix"> </div>
				</div>
				<nav class="numbering">
					<ul class="pagination paging">
						 <?php
              if(mysqli_num_rows($res) != 0)
							for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
								if($i==$page){
									echo " <li class='active'><a href='search.php?page=".$i."'>".$i."<span class='sr-only'>(current)</span></a></li> ";
								}
								else{
									echo "<li><a href='search.php?page=".$i."'";
									echo ">".$i."</a></li> ";
								}
							};
							?>

						</li>
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

<!--- gourmet --->

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


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

	  <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div style="padding: 1em 0;" class="login">
		<div class="container">
			<h2>Login Form</h2>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form role="form" action="<?php echo $_SESSION['url']; ?>" method="post" name="loginform">
					<input type="email" placeholder="Email Address" required=" " name="email" >
					<input type="password" placeholder="Password" required=" " name="password" >
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login" name="login">
				</form>
				<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			</div>
			<h4>For New People</h4>
			<p><a href="registered.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
  </div>

</div>

<!-- //main slider-banner -->

</body>
</html>
	
<script>
	function SubmitFormData(elem) {
    var name = elem.id;
	var email = $("#userid").val();
    $.post("submit.php", { name: name, email: email },
    function(data) {
	 $("#result"+name).html(data);
	 $("#results"+name).html(data);
	 $('#myForm')[0].reset();
    });
}
</script>	
	
