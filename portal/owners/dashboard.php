<?php include '../../config/functions.php'?>
<?php include '../../config/config.php'?>
<?php 
error_reporting(0);
if($_SESSION['owners_id'] == 0) {
    header('location: index.php');
} else {
    $data = get_account_details($_SESSION['owners_id']);
    if($data['user_type'] == 'Macro' || $data['user_type'] == 'Micro') {
    } else {
        unset($_SESSION['owners_id']);
        header('location: index.php');
    }
}


if(isset($_GET['logout']) == 'true') {
    unset($_SESSION['owners_id']);
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>Portal - Owner</title>

    <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../assets/images/adl-icon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="../assets/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../assets/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../assets/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../assets/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../assets/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../assets/vendor/flag-icon-css/flag-icon.css">

    <link rel="stylesheet" href="../assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css">

    <!-- Sweet JS Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
       function submitForm(form){
          swal({
              title: "Are you sure?",
              text:  "Do you want to logout?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((isOkay) => {
              if (isOkay){
             window.location = "?logout=true";
            }
          });
          return false;
       }
   </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="../assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../assets/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <script src="../assets/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="animsition site-navbar-small ">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand navbar-brand-center" href="javascript:void(0)">
                <span class="navbar-brand-text hidden-xs-down"> ABC CAR RENTAL INC</span>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="nav-item hidden-float" id="toggleMenubar">
                        <a class="nav-link" data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Toggle menubar</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                </ul>
                <!-- End Navbar Toolbar -->

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                            data-animation="scale-up" role="button">
                            <span class="avatar avatar-online">
                                <img src="../assets/portraits/21.jpg" alt="...">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="profile.php" role="menuitem"><i class="icon wb-user"
                                    aria-hidden="true"></i> Profile</a>
                            <a class="dropdown-item" href="?logout=true" onclick="return submitForm(this);" role="menuitem"><i class="icon wb-power"
                                    aria-hidden="true"></i> Logout</a>
                        </div>
                    </li>

                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->

        </div>
    </nav>
    <div class="site-menubar site-menubar-light">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-category">General</li>

                        <li class="dropdown site-menu-item active">
                            <a data-toggle="dropdown" href="dashboard.php">
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="dropdown site-menu-item">
                            <a data-toggle="dropdown" href="reservations.php">
                                <span class="site-menu-title">Reservations</span>
                            </a>
                        </li>

               
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Page -->
    <div class="page">
        <div class="page-content">
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Dashboard</h3>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4" >
                            <div class="card" style="background-color: #465985;">
                                <div class="card-body">
                                    <h2 class="text-white"><?php $i=1; foreach(get_all_total_profit() as $totalprofit) { echo "₱ ".number_format($totalprofit['totalprofit'],2); } ?></h2>
                                    <h4 class="text-white">Total Profit</h4>
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" style="cursor: pointer;">
                            <a href="my-vehicles.php" style="text-decoration: none;">
                                <div class="card" style="background-color: #9ec556;">
                                    <div class="card-body">
                                       <h2 class="text-white"><?php $i=1; foreach(get_all_total_vehicle() as $totalvehicle) { echo $totalvehicle['totalvehicle']; } ?></h2>
                                        <h4 class="text-white">Registered Vehicles</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4" data-toggle="modal" data-target="#bookings" style="cursor: pointer;">
                            <div class="card" style="background-color: #6da6dc;">
                                <div class="card-body">
                                   <h2 class="text-white"><?php $i=1; foreach(get_all_total_bookings() as $totalbookings) { echo $totalbookings['totalbookings']; } ?></h2>
                                    <h4 class="text-white">Completed Bookings</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" data-toggle="modal" data-target="#pendingbookings" style="cursor: pointer;">
                            <div class="card" style="background-color: #4CC6BF;">
                                <div class="card-body">
                                   <h2 class="text-white"><?php $i=1; foreach(get_all_total_pendingbookings() as $totalbookings) { echo $totalbookings['pendingbookings']; } ?></h2>
                                    <h4 class="text-white">Pending Bookings</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div style="float: right; margin-left: 30px;">
                <h5>Daily Profit: <b><?php getDailyProfit($_SESSION['owners_id']); ?></b></h5>
            </div>
            <div style="float: right; margin-left: 30px;">
                <h5>Weekly Profit: <b><?php getWeeklyProfit($_SESSION['owners_id']); ?></b> </h5>
            </div>
            <div style="float: right; margin-left: 30px;">
                <h5>Monthly Profit: <b><?php getMonthlyProfit($_SESSION['owners_id']); ?></b></h5>
            </div>

            <div id="myChart"></div>
            
        </div>
    </div>
    <!-- End Page -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">© <?=date('Y')?> <a href="javascript:void(0)">ABC Car Rental Inc.</a></div>
    </footer>
    <!-- Core  -->
    <script>
   var options = {
          series: [
          {
            name: "High - 2013",
            data: [ <?php getDayProfit($_SESSION['owners_id'],"Monday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Tuesday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Wednesday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Thursday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Friday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Saturday");
              echo ",";
              getDayProfit($_SESSION['owners_id'],"Sunday");
            ?> ]
          },
        ],
          chart: {
          height: 350,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Daily Profits',
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
          title: {
            text: 'Days Profit'
          }
        },
        yaxis: {
          title: {
            text: 'Daily Profits'
          }
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

        var chart = new ApexCharts(document.querySelector("#myChart"), options);
        chart.render();
    </script>
    <script src="../assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../assets/vendor/jquery/jquery.js"></script>
    <script src="../assets/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="../assets/vendor/animsition/animsition.js"></script>
    <script src="../assets/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../assets/vendor/asscrollable/jquery-asScrollable.js"></script>

    <!-- Plugins -->
    <script src="../assets/vendor/switchery/switchery.js"></script>
    <script src="../assets/vendor/intro-js/intro.js"></script>
    <script src="../assets/vendor/screenfull/screenfull.js"></script>
    <script src="../assets/vendor/slidepanel/jquery-slidePanel.js"></script>

    <!-- Scripts -->
    <script src="../assets/js/Component.js"></script>
    <script src="../assets/js/Plugin.js"></script>
    <script src="../assets/js/Base.js"></script>
    <script src="../assets/js/Config.js"></script>

    <script src="../assets/js/Section/Menubar.js"></script>
    <script src="../assets/js/Section/Sidebar.js"></script>
    <script src="../assets/js/Section/PageAside.js"></script>
    <script src="../assets/js/Plugin/menu.js"></script>

    <script src="../assets/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="../assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>

    <!-- Config -->
    <script src="../assets/js/config/colors.js"></script>
    <script src="../assets/js/config/tour.js"></script>
    <script>
        Config.set('assets', 'assets');
    </script>

    <!-- Page -->
    <script src="../assets/js/Site.js"></script>
    <script src="../assets/js/Plugin/asscrollable.js"></script>
    <script src="../assets/js/Plugin/slidepanel.js"></script>
    <script src="../assets/js/Plugin/switchery.js"></script>

    <script>
        (function (document, window, $) {
            'use strict';

            var Site = window.Site;
            $(document).ready(function () {
                Site.run();
            });
        })(document, window, jQuery);
    </script>

</body>

</html>

<div class="modal fade" id="vehicle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Vehicles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table">
            <tr>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Year</th>
                <th>Fuel Type</th>
                <th>Rate Per Day</th>
            </tr>
                <?php foreach(get_all_total_vehicle2() as $row) { ?>
                    <tr>
                        <td><?php echo $row['manufacturer']?></td>
                        <td><?php echo $row['model']?></td>
                        <td><?php echo $row['year']?></td>
                        <td><?php echo $row['fuel_type']?></td>
                        <td>₱<?php echo number_format($row['rate'],2)?></td>
                    </tr>
                <?php } ?>
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="bookings" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Bookings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table">
            <tr>
                <th>Customer</th>
                <th>Destination</th>
                <th>From</th>
                <th>To</th>
                <th>Rate per Day</th>
                <th>Days</th>
                <th>Total</th>
                <th>Reference</th>
                <th>Status</th>
            </tr>
                <?php foreach(get_customer_transactions($_SESSION['owners_id']) as $row) { ?>
                    <?php $rdata = get_account_details($row['customer_id']);?>
                    <tr>
                        <td><?php echo $rdata['firstname'].' '.$rdata['middlename'].' '.$rdata['surname']?></td>
                        <td><?php echo $row['destination']?></td>
                        <td><?php echo $row['from']?></td>
                        <td><?php echo $row['to']?></td>
                        <td>₱<?php echo number_format($row['rate_per_day'],2)?></td>
                        <td><?php echo $row['days_rented']?></td>
                        <td>₱<?php echo number_format($row['total'],2)?></td>
                        <td><?php echo $row['reference']?></td>
                        <td><?php echo $row['status']?></td>
                    </tr>
                <?php } ?>
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="pendingbookings" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Bookings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table">
            <tr>
                <th>Customer</th>
                <th>Destination</th>
                <th>From</th>
                <th>To</th>
                <th>Rate per Day</th>
                <th>Days</th>
                <th>Total</th>
                <th>Reference</th>
                <th>Status</th>
            </tr>
                <?php foreach(get_customer_pendingtransactions($_SESSION['owners_id']) as $row) { ?>
                    <?php $rdata = get_account_details($row['customer_id']);?>
                    <tr>
                        <td><?php echo $rdata['firstname'].' '.$rdata['middlename'].' '.$rdata['surname']?></td>
                        <td><?php echo $row['destination']?></td>
                        <td><?php echo $row['from']?></td>
                        <td><?php echo $row['to']?></td>
                        <td>₱<?php echo number_format($row['rate_per_day'],2)?></td>
                        <td><?php echo $row['days_rented']?></td>
                        <td>₱<?php echo number_format($row['total'],2)?></td>
                        <td><?php echo $row['reference']?></td>
                        <td><?php echo $row['status']?></td>
                    </tr>
                <?php } ?>
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


