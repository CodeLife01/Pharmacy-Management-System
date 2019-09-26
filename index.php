<?php
ob_start();
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html>
<head>
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
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="images/11.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
<!--					<h3>Buy Rice Products Are Now On Line With Us</h3>-->
				</div>
			</li>
			<li>
				<img src="images/22.jpg" alt="" />
				  <div class="slide-desc">
<!--					<h3>Whole Spices Products Are Now On Line With Us</h3>-->
				</div>
			</li>

			<li>
				<img src="images/44.jpg" alt="" />
				<div class="slide-desc">
<!--					<h3>Whole Spices Products Are Now On Line With Us</h3>-->
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container" style="margin-top: -100px;">
<!--		<h2>Top selling offers</h2>-->
			<div class="grid_3 grid_5">




				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Top Selling</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Popular</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Most Buyed</h5>
								</div>
							<div class="agile_top_brands_grids">





						<?php	if(isset($_SESSION['usr_id'])){
								echo '<input type="hidden" id="userid" name="userid" value="'. $_SESSION['usr_id'] .'" />    ';
								}
						?>
			<?php
				$i=1;
				$res = mysqli_query($con,"SELECT * FROM products ORDER BY ocount DESC LIMIT 6");
				while ($row = mysqli_fetch_array($res)) {
							$id = $row['id'];
							echo '<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="single.php?link=' .$id .'"><img style="height:150px" title=" " alt=" " src="'.$row['image'].'" /></a><br>
															<p><a href="single.php?link=' .$id .'">'.$row['name'].'</a></p>
															
															<h4>&#8358;' .$row['price'].'</h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
													<form action"#"  method="post">
													<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" id="name" name="id" value="ADD TO CART" />    ';   ?>
																<?php
																		if(isset($_SESSION['usr_id'])){

																	echo  '	<input type="button" class="button" id="'. $row['id'] .'" onclick="SubmitFormData(this);" value="ADD TO CART" />' ; } ?>



															<?php
																		if(!isset($_SESSION['usr_id'])){

																	echo  '	<input type="submit" name="addtocart1'. $row['id'] .'" value="Add tocart" class="button" /> ' ; } ?>

														<?php			if(isset($_POST["addtocart1".$id]) and ($_SESSION['usr_id']=="")){
																		header('Location: login.php');
            														}
														?>

													<?php	echo'</fieldset>
															</form>
															<div id="result'. $row['id'] .'">
   												<!-- All data will display here  -->
   														</div>

														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div> '      ;

					if($i==3){
						echo '<div class="clearfix"> </div>
							</div>
							<div class="agile_top_brands_grids">';
					}
					$i++;

				}


		?>

				 		<div class="clearfix"> </div>
					</div>
				</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>This week</h5>
								</div>
							<div class="agile_top_brands_grids">

								<?php
				$i=1;
				$res = mysqli_query($con,"SELECT * FROM products ORDER BY ocount DESC LIMIT 6");
				while ($row = mysqli_fetch_array($res)) {
							$id = $row['id'];
							echo '<div class="col-md-4 top_brand_left">
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
													<form action"#"  method="post">
													<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" id="name" name="id" value="ADD TO CART" />    ';   ?>
																<?php
																		if(isset($_SESSION['usr_id'])){

																	echo  '	<input type="button" class="button" id="'. $row['id'] .'" onclick="SubmitFormData(this);" value="ADD To CART" />' ; } ?>



															<?php
																		if(!isset($_SESSION['usr_id'])){

																	echo  '	<input type="submit" name="addtocart2'. $row['id'] .'" value="ADD TO CART" class="button" /> ' ; } ?>

														<?php			if(isset($_POST["addtocart2".$id]) and ($_SESSION['usr_id']=="")){
																		header('Location: login.php');
            														}
														?>

													<?php	echo'</fieldset>
															</form>
															<div id="results'. $row['id'] .'">
   <!-- All data will display here  -->
   </div>

														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div> '      ;

					if($i==3){
						echo '<div class="clearfix"> </div>
							</div>
							<div class="agile_top_brands_grids">';
					}
					$i++;

				}


		?>

								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->

<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="images/p2.jpg" class="img-responsive" alt=""/>

							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="images/p3.jpg" class="img-responsive" alt=""/>

									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="images/p4.jpg" class="img-responsive" alt=""/>

									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="images/111.jpg" class="img-responsive" alt=""/>


							</div>
						</div>

						<div class="clearfix"></div>
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
<script src="js/minicart.min.js"></script>

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




<!-- //main slider-banner -->
</body>
</html>
