<?php

?>
<div class="agileits_header">
		<div class="container">

			<div class="agile-login">
				<ul>

				<?php if (isset($_SESSION['usr_name'])) { ?>
				<li><p style="font-weight:bold; color:white">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="registered.php">Create Account</a></li>
				<?php } ?>

				</ul>
			</div>
			<div class="product_list_header">
					<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value="" onclick="location.href='cart.php'"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">

			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">LAMCO PHARMACY</a></h1>
			</div>
		<div class="w3l_search">
			<form action="search.php" method="post">
        <?php $searchtext = NULL; ?>
        <input type="search" name="searchtext" id="searchtext" placeholder="Search for a Product..." required="" value="<?php echo $searchtext; ?>">
				<button type="submit" name="search" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>

			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>
									<!-- Mega Menu -->
									<li><a href="products.php">All Products</a></li>
									<li><a href="products.php?cat=Tablets">Tablets</a></li>
									<li><a href="products.php?cat=Capsule">Capsule</a></li>
									<li><a href="products.php?cat=Injection">Injection</a></li>
									<li><a href="products.php?cat=Inhealer">Inhealer</a></li>
                                    <li><a href="products.php?cat=Syrup">Syrup</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
