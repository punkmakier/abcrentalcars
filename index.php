<?php include 'config/functions.php';?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>ABC - Home</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/adl-icon.ico" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<!--[if IE]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" id="stylesheet-ie" href="css/css_ie.css" type="text/css" media="all" />
		<![endif]-->
	</head>
	<body class="right-slider one-column">
		<div id="conteiner">
			<div id="branding">
				<?php include 'navigation.php';?>
			</div><!-- #branding -->
			<div id="slider">
				<div id="slider-img">
					<ul class="slides">
                    <li><img src="images/slider1.jpg" alt /></li>
                    <li><img src="images/slider2.jpg" alt /></li>
                    <li><img src="images/slider3.jpg" alt /></li>
						<div id="slider-pattern"></div>
					</ul>
				</div>
				<div id="slider-content">
					<div id="slider-post">
						<div class="post">
								<div class="entry-header">
									<h3 class="entry-format">Affordable Car Rental Cavite</h3>
								</div>
								<div class="entry-content">Rates so low, you won’t think twice.</div>
						</div>
						<div id="slider-front-img">
							<img src="images/slider_front_img_right.png" alt="" />
						</div>
					</div>
					<form id="slider-form" class="main-form" method="POST" action="vehicles.php?step=1" data-parsley-validate>
						<div class="main_form_navigation">
							<div id="book_car" class="title-form current"><a href="#" title="">Reserve a car</a></div>
						</div>
						<div id="book_car_content" class="content-form ">

							<div class="location-block" style="margin-bottom:10px">
								<div class="" style="">Manufacturers</div>
								<select name="manufacturers" class="customize" id="" required>
									<option value="All">All</option>
									<option value="Audi">Audi</option>
									<option value="BMW">BMW</option>
									<option value="Chery">Chery</option>
									<option value="Ford">Ford</option>
									<option value="Foton">Foton</option>
									<option value="Geely">Geely</option>
									<option value="Honda">Honda</option>
									<option value="Hyundai">Hyundai</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="MG">MG</option
									<option value="Mazda">Mazda</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Subaru">Subaru</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Toyota">Toyota</option>
									
									
									
								</select>
							</div>

							<div class="location-block" style="margin-bottom:10px">
								<div style="">Price Filter</div>
								<select name="price_filter" class="customize" id="" required>
									<option value="ASC">Lowest to Highest</option>
									<option value="DESC">Highest to Lowest</option>
								</select>
							</div>

							<div class="location-block" style="margin-bottom:10px">
								<div class="" style="">Price Range</div>
								<select name="price_range" class="customize" id="" required>
									<option value="0">All</option>
									<option value="1000-4999">₱<?=number_format(1000,2)?> - ₱<?=number_format(4999,2)?></option>
									<option value="5000-7999">₱<?=number_format(5000,2)?> - ₱<?=number_format(7999,2)?></option>
									<option value="8000-9999">₱<?=number_format(8000,2)?> - ₱<?=number_format(9999,2)?></option>
									<option value="10000">₱<?=number_format(10000,2)?> and above</option>
								</select>
							</div>

							<div class="location-block" style="margin-bottom:10px">
								<div style="">Fuel Type</div>
								<select name="fuel_type" class="customize" id="" required>
									<option value="All">All</option>
									<option value="Diesel">Diesel</option>
									<option value="Gas">Gas</option>
								</select>
							</div>

							<div class=" form-submit">
							<input class="orange_button form-continue" style="float:right" name="search" type="submit" value="Search"/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</form>
					<div class="clear"></div>
				</div>
			</div><!-- #slider -->
			<div id="main">
				<div id="primary">
					<div id="content">
						<div class="post">
							<div class="entry-header">
								<h3 class="entry-format">We try our best to make your drive memorable</h3>
							</div>
							<div class="entry-content">
								
							</div>
							
						</div>
					</div>
					<aside id="secondary" class="features">
						<div class="feature-single">
							<img class="feature-title-img" src="images/2-icon.png" alt="" /><div class="feature-title">Dedicated customer chat support</div>
							<div></div>
						</div>
						<div class="feature-single">
							<img class="feature-title-img" src="images/1-icon.png" alt="" /><div class="feature-title">Special low rates on car booking</div>
							<div></div>
						</div>
						<div class="feature-single">
							<img class="feature-title-img" src="images/3-icon.png" alt="" /><div class="feature-title">Manage your booking online</div>
							<div></div>
						</div>
						<div class="clear"></div>
					</aside>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			
		</div><!--end:conteiner-->
		<?php include 'login-register.php';?>
		<?php include 'scripts.php';?>
        <script>
            $('#home').addClass('current_page_item')
        </script>
	</body>
</html>