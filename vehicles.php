<?php include 'config/functions.php';?>
<?php 

if (isset($_POST['btnTransaction2'])) {
	$_SESSION['rate'] = $_POST['rate'];
	$_SESSION['total'] = $_POST['total'];
	$_SESSION['days'] = $_POST['days'];
}
if(isset($_POST['search'])) {
	global $db;
	$manufacturers = post('manufacturers');
	$price_filter  = post('price_filter');
	$price_range   = post('price_range');
	$fuel_type 	   = post('fuel_type');
	$data = get_vehicles($manufacturers,$price_filter,$price_range,$fuel_type);
} else {
	$manufacturers = null;
	$price_filter  = null;
	$price_range   = null;
	$fuel_type 	   = null;
	$seating_capacity 	   = null;
	$data = get_vehicles();
}
if(!isset($_POST['cars_id']) && $_GET['step'] == 2) {
	header('location:vehicles.php?step=1');
}

if(!isset($_POST['cars_id']) && $_GET['step'] == 3) {
	header('location:vehicles.php?step=1');
}

if(!isset($_POST['cars_id']) && $_GET['step'] == 4) {
	header('location:vehicles.php?step=1');
}

if($_SESSION['customer_id'] != 0) {
	$rows = get_account_details($_SESSION['customer_id']);
	if(empty($rows['requirement'])) {
		header('location: portal/profile.php?success=false&message='.urlencode("You need to upload your driver's license first."));
	}
}

if($_GET['step'] == 4) {
	$customer_id  = $_SESSION['customer_id'];
	$cars_id 	  = post('cars_id');
	$rate_per_day = post('rate_per_day');
	$total 		  = post('total');
	$destination  = post('destination');
	$purpose      = post('purpose');
	$from 		  = post('from');
	$to 		  = post('to');
	$days_rented  = post('days_rented');
	$reference	  = 'ABC'.rand(111111,999999);
	$status		  = 'Pending';
	transactions($customer_id,$cars_id,$destination,$purpose,$from,$to,$rate_per_day,$days_rented,$total,$reference,$status);
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>ABC - Choose Car</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/adl-icon.ico" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery.slider.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

		.division {
			padding: 0 20px;
			min-width: 300px;
			font-family: 'Akkurat-Regular', sans-serif;
			background-color: #fffffe;
			color: #1a1a1a;
			text-align: center;
			word-wrap: break-word;
			-webkit-font-smoothing: antialiased
		}

		.site-header {
			margin: 0 auto;
			padding: 80px 0 0;
			max-width: 820px;
		}

		.site-header__title {
			margin: 0;
			font-family: Montserrat, sans-serif;
			font-size: 2.5rem;
			font-weight: 700;
			line-height: 1.1;
			text-transform: uppercase;
			-webkit-hyphens: auto;
			-moz-hyphens: auto;
			-ms-hyphens: auto;
			hyphens: auto;
		}

		.main-content {
			margin: 0 auto;
			max-width: 820px;
		}

		.main-content__checkmark {
			font-size: 4.0625rem;
			line-height: 1;
			color: #24b663;
		}

		.main-content__body {
			margin: 20px 0 20px ;
			font-size: 1rem;
			line-height: 1.4;
		}

		@media only screen and (min-width: 40em) {
			.site-header {
				padding-top: 10px;
			}

			.site-header__title {
				font-size: 6.25rem;
			}

			.main-content__checkmark {
				font-size: 9.75rem;
			}

			.main-content__body {
				font-size: 1.25rem;
			}

			.site-footer {
				padding: 145px 0 25px;
			}

			.site-footer__fineprint {
				font-size: 1.125rem;
			}
		}
	</style>


	<!--[if IE]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" id="stylesheet-ie" href="css/css_ie.css" type="text/css" media="all" />
		<![endif]-->
</head>

<body class="page page-two-column">
	<div id="conteiner">
		<div id="branding">
			<?php include 'navigation.php';?>
		</div><!-- #branding -->
		<div id="progress-bar text-center">
			<div id="progress-bar-steps" style="margin-top:10px">
				<?php include 'steps.php';?>
			</div>
			<div class="clear"></div>
		</div>
		<div id="main">
			<div id="primary" style="margin-top:10px">
				<?php if($_GET['step'] == 1) { ?>
				<form method="POST" novalidate>
					<aside id="secondary" class="sidebar-left">
						<div class="widget filter_widget">
							<h3 class="widget-title">
								<?=$data->num_rows?> result(s) found
							</h3>
							<h4>Manufacturers</h4>
							<div style="padding:20px">
								<select name="manufacturers" class="customize">
									<option value="All">All</option>
									<option value="Audi"
										<?= $manufacturers !== null ? $manufacturers == 'Audi' ? 'selected' : '' : ''?>>
										Audi</option>
									    <option value="BMW"
										<?= $manufacturers !== null ? $manufacturers == 'BMW' ? 'selected' : '' : ''?>>
										BMW</option>
										<option value="Chery"
										<?= $manufacturers !== null ? $manufacturers == 'Chery' ? 'selected' : '' : ''?>>
										Chery</option>
										<option value="Ford"
										<?= $manufacturers !== null ? $manufacturers == 'Ford' ? 'selected' : '' : ''?>>
										Ford</option>
										<option value="Foton"
										<?= $manufacturers !== null ? $manufacturers == 'Foton' ? 'selected' : '' : ''?>>
										Foton</option>
										<option value="Geely"
										<?= $manufacturers !== null ? $manufacturers == 'Geely' ? 'selected' : '' : ''?>>
										Geely</option>
										<option value="Honda"
										<?= $manufacturers !== null ? $manufacturers == 'Honda' ? 'selected' : '' : ''?>>
										Honda</option>
										<option value="Hyundai"
										<?= $manufacturers !== null ? $manufacturers == 'Hyundai' ? 'selected' : '' : ''?>>
										Hyundai</option>
										<option value="Isuzu"
										<?= $manufacturers !== null ? $manufacturers == 'Isuzu' ? 'selected' : '' : ''?>>
										Isuzu</option>
										<option value="Kia"
										<?= $manufacturers !== null ? $manufacturers == 'Kia' ? 'selected' : '' : ''?>>
										Kia</option>
										<option value="MG"
										<?= $manufacturers !== null ? $manufacturers == 'MG' ? 'selected' : '' : ''?>>
										MG</option>
										<option value="Mazda"
										<?= $manufacturers !== null ? $manufacturers == 'Mazda' ? 'selected' : '' : ''?>>
										Mazda</option>
										<option value="Mitsubishi"
										<?= $manufacturers !== null ? $manufacturers == 'Mitsubishi' ? 'selected' : '' : ''?>>
										Mitsubishi</option>
										<option value="Nissan"
										<?= $manufacturers !== null ? $manufacturers == 'Nissan' ? 'selected' : '' : ''?>>
										Nissan</option>
										<option value="Subaru"
										<?= $manufacturers !== null ? $manufacturers == 'Subaru' ? 'selected' : '' : ''?>>
										Subaru</option>
										<option value="Suzuki"
										<?= $manufacturers !== null ? $manufacturers == 'Suzuki' ? 'selected' : '' : ''?>>
										Suzuki</option>
									    <option value="Toyota"
										<?= $manufacturers !== null ? $manufacturers == 'Toyota' ? 'selected' : '' : ''?>>
										Toyota</option>
								</select>
							</div>
							<h4>Price Filter</h4>
							<div style="padding:20px">
								<select name="price_filter" class="customize" required>
									<option value="ASC"
										<?= $price_filter !== null ? $price_filter == 'ASC' ? 'selected' : '' : ''?>>
										Lowest to Highest</option>
									<option value="DESC"
										<?= $price_filter !== null ? $price_filter == 'DESC' ? 'selected' : '' : ''?>>
										Highest to Lowest</option>
								</select>
							</div>

							<h4>Price Range</h4>
							<div style="padding:20px">
								<select name="price_range" class="customize" id="" required>
									<option value="0"
										<?= $price_range !== null ? $price_range == '0' ? 'selected' : '' : ''?>>All
									</option>
									<option value="1000-4999"
										<?= $price_range !== null ? $price_range == '1000-4999' ? 'selected' : '' : ''?>>
										₱<?=number_format(1000,2)?> - ₱<?=number_format(4999,2)?></option>
									<option value="5000-7999"
										<?= $price_range !== null ? $price_range == '5000-7999' ? 'selected' : '' : ''?>>
										₱<?=number_format(5000,2)?> - ₱<?=number_format(7999,2)?></option>
									<option value="8000-9999"
										<?= $price_range !== null ? $price_range == '8000-9999' ? 'selected' : '' : ''?>>
										₱<?=number_format(8000,2)?> - ₱<?=number_format(9999,2)?></option>
									<option value="10000"
										<?= $price_range !== null ? $price_range == '10000' ? 'selected' : '' : ''?>>
										₱<?=number_format(10000,2)?> and above</option>
								</select>
							</div>

							<h4>Fuel Type</h4>
							<div style="padding:20px">
								<select name="fuel_type" class="customize" id="" required>
									<option value="All"
										<?= $fuel_type !== null ? $fuel_type == 'All' ? 'selected' : '' : ''?>>All
									</option>
									<option value="Diesel"
										<?= $fuel_type !== null ? $fuel_type == 'Diesel' ? 'selected' : '' : ''?>>Diesel
									</option>
									<option value="Gas"
										<?= $fuel_type !== null ? $fuel_type == 'Gas' ? 'selected' : '' : ''?>>Gas
									</option>
								</select>
							</div>

						

							<div style="padding:20px;margin-top:-20px">
								<input class="orange_button" style="width:100%" type="submit" name="search"
									value="Search" />
							</div>
						</div>
					</aside>
				</form>
				<?php } elseif($_GET['step'] == 2) {  ?>
				<?php 
					$cars_id 	 = post('cars_id');
					$vehicleData = get_vehicles_details($cars_id);
				?>
				<?php $user    = get_account_details($vehicleData['accounts_id']);?>
				<aside id="secondary" class="sidebar-left">
					<div class="widget">
						<h3 class="widget-title">
							<label style="margin-left:-5px">Car Details</label>
						</h3>
						<div class="widget-content main-block product-widget-mini">
							<div class="product-img">
							</div>
							<div class="product-info">
								<div class="entry-format">
									<div><?=$vehicleData['model']?></div>
								</div>
								<div class="features">
									<p>Manufacturer: <?=$vehicleData['manufacturer']?></p>
									<p>Year: <?=$vehicleData['year']?></p>
									<p>Model: <?=$vehicleData['model']?></p>
									<p>Fuel Type: <?=$vehicleData['fuel_type']?></p>
								</div>

								<div class="details">
									<div class="view-details">[+] view owner details</div>
									<div class="close-details">[-] close owner details</div>
									<ul class="details-more">
										<li><?=$user['firstname']?> <?=$user['middlename']?> <?=$user['surname']?></li>
										<li><?=$user['contact']?></li>
										<li><?=$user['email']?></li>
										<li><?=$user['user_type']?></li>
									</ul>
								</div>

							</div>
						</div>
					</div>
					<div class="widget">
						<h3 class="widget-title">
							<label style="margin-left:-5px">Rules & Regulations</label>
						</h3>
						<div class="widget-content main-block product-widget-mini">
				
							<div class="product-info">
								<div class="entry-format">
									<div><?=$vehicleData['rulesandregulations']?></div>
								</div>
							</div>
						</div>
					</div>
				</aside>

				<?php } elseif($_GET['step'] == 3) { ?>
				<?php 
					$cars_id 	 = post('cars_id');
					$vehicleData = get_vehicles_details($cars_id);
				?>
				<?php $user    = get_account_details($vehicleData['accounts_id']);?>
				<aside id="secondary" class="sidebar-left">
					<div class="widget">
						<h3 class="widget-title">
							<label style="margin-left:-5px">Car Details</label>
						</h3>
						<div class="widget-content main-block product-widget-mini">
							<div class="product-img">
							</div>
							<div class="product-info">
								<div class="entry-format">
									<div><?=$vehicleData['model']?></div>
								</div>
								<div class="features">
									<p>Manufacturer: <?=$vehicleData['manufacturer']?></p>
									<p>Year: <?=$vehicleData['year']?></p>
									<p>Model: <?=$vehicleData['model']?></p>
									<p>Fuel Type: <?=$vehicleData['fuel_type']?></p>
								</div>
								<div class="details">
									<div class="view-details">[+] view owner details</div>
									<div class="close-details">[-] close owner details</div>
									<ul class="details-more">
										<li><?=$user['firstname']?> <?=$user['middlename']?> <?=$user['surname']?></li>
										<li><?=$user['contact']?></li>
										<li><?=$user['email']?></li>
										<li><?=$user['user_type']?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</aside>
				<?php } ?>
				<?php if($_GET['step'] == 1) { ?>
				<div id="content" class="sidebar-middle">
					<div class="widget main-widget product-widget">
						<?php if($data->num_rows == 0) { ?>
						<div class="post">
							<div style="padding:15px">
								No record found.
							</div>
						</div>
						<?php } else { ?>
						<?php foreach($data as $vehicles){ ?>
						<?php $user    = get_account_details($vehicles['accounts_id']);?>
						<div class="post">
							<div class="main-block_container">
								<div class="main-block">
									<div class="product-img">
										<img src="<?=$vehicles['images'] == '' ? 'https://s7d1.scene7.com/is/image/hyundai/compare-vehicle-1225x619?wid=276&hei=156&fmt=png-alpha' : 'images/vehicles/'.$vehicles['images']?>"
											style="width:250px" alt="" />
									</div>
									<div class="product-info">
										<h3 class="entry-format"><?=$vehicles['model']?></h3>
										<div class="features">
											<p><strong>Brand:</strong> <?=$vehicles['manufacturer']?></p>
											<p><strong>Model:</strong> <?=$vehicles['model']?> </p>
											<p><strong>Year:</strong> <?=$vehicles['year']?></p>
											<p><strong>Fuel:</strong> <?=$vehicles['fuel_type']?></p>
										</div>

										<div class="details">
											<div class="view-details">[+] More details</div>
											<div class="close-details">[-] Close details</div>
										</div>
										<div class="details-more">
											<p><strong>Type:</strong> <?=$user['user_type']?></p>
											<p><strong>No of Doors:</strong> <?=$vehicles['no_of_doors']?></p>
											<p><strong>Fuel Tank Capacity:</strong> <?=$vehicles['fuel_tank_capacity']?>
											</p>
											<p><strong>Seating Capacity:</strong> <?=$vehicles['seating_capacity']?></p>
											<p><strong>Transmission Type:</strong> <?=$vehicles['transmission_type']?>
											</p>
											<p><strong>Gear Box:</strong> <?=$vehicles['gear_box']?></p>
										</div>
									</div>

								</div>
								<div class="additional-block">
									<div>
										<p>₱<?=number_format($vehicles['rate'],2)?></p>
										<p class="span">Rate Per day</p>
										<?php if($_SESSION['customer_id'] == 0) { ?>
											<span class="sign_in"><a class="tab_link_button" style="font-size:14px;text-transform:uppercase" href="#sign_in" title="">Reserve</a></span>
										<?php } else { ?>
											<input class="continue_button blue_button" onclick="selectThis(<?=$vehicles['cars_id']?>)" type="submit" value="Reserve" />
										<?php } ?>
									</div>

									<div style="margin-top:10px">

									<!-- <a href="" style="font-size:14px;text-transform:uppercase">Chat Now</a> -->

									</div>

								</div>

								<div class="clear"></div>
							</div>
						</div>
						<div class="post-delimiter"></div>
						<?php } ?>
						<?php } ?>

					</div>
				</div>
				<?php } elseif($_GET['step'] == 2) { ?>
				<form action="vehicles.php?step=3" method="POST">
					<input type="hidden" name="rate" class="hiderate" value="<?=$vehicleData['rate']?>">
					<input type="hidden" name="total" class="totalrate" value="<?=$vehicleData['rate']?>">
					<input type="hidden" name="cars_id" value="<?=$cars_id?>">
					<div id="content" class="sidebar-middle">
						<div class="widget">

							<h3 class="widget-title">
								<label style="margin-left:-5px"> Rent Details</label>
							</h3>

							<div class="post">
								<div style="padding:20px">
									<p>Date Range</p>
									<input type="text" class="shortcode_input" style="width:100%" name="dates"
										autocomplete=off required>

									<p>Destination</p>
									<input type="text" class="shortcode_input" style="width:100%" name="destination"
										required>

                                    <p>Purpose of renting</p>
									<input type="text" class="shortcode_input" style="width:100%" name="purpose"
										required>

									<p>Days</p>
									<input type="text" readonly class="shortcode_input" style="width:100%" value=1
										id="days" name="days">

									<p>Rent per day</p>
									<input type="text" disabled class="shortcode_input showrate" style="width:100%"
										value="₱<?=number_format($vehicleData['rate'],2)?>">

								
                        
									</div>

							</div>

							<div class="widget-footer widget-footer-total">
								Total <span class="price">₱<strong class="totalrate" 
										id="rate"><?= number_format($vehicleData['rate'],2)?></strong></span>
							</div>
						</div>
					</div>
					<div class="next_page">
						<input class="continue_button blue_button" name="btnTransaction2" type="submit"
							value="Continue to Transaction" />
					</div>
				</form>
				<?php } elseif($_GET['step'] == 3) { ?>
				<form action="vehicles.php?step=4" method="POST">
					<input type="hidden" name="cars_id" value="<?=post('cars_id')?>">
					<input type="hidden" name="rate_per_day" value="<?=$_SESSION['rate']?>">
					<input type="hidden" name="total" value="<?=$_SESSION['rate'] * $_SESSION['days']?>">
					<?php $explode = explode(' - ',post('dates'));?>
					<div id="content" class="sidebar-middle">
						<div class="widget">

							<h3 class="widget-title">
								<label style="margin-left:-5px"> Booking Details</label>
							</h3>

							<div class="post">
								<div style="padding:20px">
									<p>Destination</p>
									<input type="text" class="shortcode_input" readonly style="width:100%"
										name="destination" value="<?=post('destination')?>" required>

                                    <p>Purpose of renting</p>
									<input type="text" class="shortcode_input" readonly style="width:100%"
										name="purpose" value="<?=post('purpose')?>" required>

									<p>From</p>
									<input type="text" class="shortcode_input" readonly style="width:100%" name="from"
										value="<?=$explode[0]?>" required>

									<p>To</p>
									<input type="text" class="shortcode_input" readonly style="width:100%" name="to"
										value="<?=$explode[1]?>" required>

									<p>Days rented</p>
									<input type="text" class="shortcode_input" readonly style="width:100%"
										name="days_rented" value="<?=$_SESSION['days']?>" required>

									<p>Rate per day</p>
									<input type="text" class="shortcode_input" disabled style="width:100%"
										value="₱<?=number_format($_SESSION['rate'],2)?>">

								</div>

							</div>

							<div class="widget-footer widget-footer-total">
								Total <span class="price">₱<strong
										id="rate"><?= number_format($vehicleData['rate'] * post('days'),2)?></strong></span>
							</div>
						</div>
					</div>
					<div class="next_page">
						<input class="continue_button blue_button" name="btnTransaction" type="submit"
							value="Complete" />
					</div>
				</form>
				<?php } else { ?>
					<div id="content" class="">
						<div class="widget">
							<div class="post">
								<div class="division">
									<header class="site-header" id="header">
										<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
									</header>

									<div class="main-content">
										<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
										<p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch
											for filling that out. It means a lot to us, just like you do! We really
											appreciate you giving us a moment of your time today. Thanks for being you.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	</div>
	<!--end:conteiner-->
	<?php include 'login-register.php';?>
	<?php include 'scripts.php';?>
	<form method="POST" id="formStep" action="vehicles.php?step=2">
		<input type="hidden" id="cars_id" name="cars_id">
	</form>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>


<div style="display: none;">
<?php
      foreach(get_all_transactions() as $owner) { ?>
                       
<?php  $owner['from'].' '.$owner['to']."<br>" ?>
	
<?php
$from[] = date('Y-m-d', strtotime($owner['from']));
$to[] = date('Y-m-d', strtotime($owner['to']));

?>

</div>
<br>

	<?php
$period = new DatePeriod(
     new DateTime($owner['from']),
     new DateInterval('P1D'),
     new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($owner['to']))))
);

foreach ($period as $key => $value) {
     $date[] = $value->format('Y-m-d');       
}
	?>

<?php } ?>




<?php
 $date = json_encode($date);
// $from = json_encode($from);
//  str_replace( array('[',']') , ''  , $from );
// $to = json_encode($to);
//  str_replace( array('[',']') , ''  , $to );

  $alldate = str_replace( array('[',']') , ''  , $date );
?>

	<script>
		$('#vehicles').addClass('current_page_item')

		function selectThis(id) {
			$('#cars_id').val(id);
			$('#formStep').submit();
		}

		<?php if ($_GET['step'] == 2) { ?>
			var date = new Date();
			date.setDate(date.getDate() + 1)
			$('input[name="dates"]').daterangepicker({


			 format: 'YYYY-MM-DD',
        minDate: new Date(),
        isInvalidDate: function(date) {
         i = 0;
           check = [<?php echo $alldate ?>]
           for (var i = 0; i < check. length; i++) {
            if (date.format('YYYY-MM-DD') ==  check[i]) {
                return true; 
            }
        }
        }


			}).on('apply.daterangepicker', function (ev, picker) {
				 debugger
				 var start = moment(picker.startDate.format('YYYY-MM-DD'));
				var end = moment(picker.endDate.format('YYYY-MM-DD'));
				var diff = start.diff(end, 'days'); // returns correct number
				var day = Math.abs(diff);
				var days = day == 0 ? 1 : day + 1;
				var rate = '<?=$vehicleData['rate']?>' * days;
				$('#days').val(days)
				$('#rate').html(numberWithCommas(rate.toFixed(2)))
				res = $(this).val().split(' - ')





	
 var $firstDateVal = new Date(res[0]);
  var $secondDateVal = new Date(res[1]);
  var $firstTime = $firstDateVal.getTime();
  var $secondTime = $secondDateVal.getTime();
  var days = 1000 * 60 *60 * 24;
  $days = $secondTime - $firstTime;
  $days = Math.floor($days / days);
  $firstDate = $firstDateVal;
  $secondDate = $secondDateVal;

  hiderate = $('.hiderate').val()
  
 
  $('.totalrate').val(hiderate*$days)
  $('#days').val($days)


 $('.showrate').val('₱'+ new Intl.NumberFormat('en-IN', {
  maximumFractionDigits: 2
 }).format(hiderate*$days)+'.00')


$('.totalrate').text(new Intl.NumberFormat('en-IN', {
  maximumFractionDigits: 2
}).format(hiderate*$days)+'.00')


			});

			$('input[name="dates"]').on('apply.daterangepicker', function (ev, picker) {
			 	$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
			 });

			$('input[name="dates"]').on('cancel.daterangepicker', function (ev, picker) {
			 	$(this).val('');
			 });

			function numberWithCommas(x) {
				x = x.toString();
				var pattern = /(-?\d+)(\d{3})/;
				while (pattern.test(x))
					x = x.replace(pattern, "$1,$2");
				return x;
			} 
			<?php } ?>
			<?php if ($_GET['step'] == 4) { ?>
				setTimeout(function() {
					location.href = 'index.php?success=true&message=<?= urlencode('Booking has been made')?>'
				},1000)
			<?php } ?>
	</script>
</body>

</html>