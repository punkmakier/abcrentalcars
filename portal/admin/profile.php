<?php include '../../config/functions.php'?>
<?php 
    $rows = get_account_details($_SESSION['admin_id']);

  

    
    
   

    if(isset($_POST['saveChanges'])) {
        $surname    = post('surname');
        $firstname  = post('firstname');
        $middlename = post('middlename');
        $email      = post('email');
        $contact    = post('contact');
        update_admin_profile($surname,$firstname,$middlename,$email,$contact);
    }

    if(isset($_POST['btnChangePassword'])) {
        $old_password         = post('old_password');
        $new_password         = post('new_password');
        $confirm_new_password = post('confirm_new_password');
        update_admin_password($old_password,$new_password,$confirm_new_password);
    }
    if(isset($_GET['logout']) == 'true') {
        unset($_SESSION['admin_id']);
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

    <title>Admin - Profile</title>

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



    <!-- Fonts -->
    <link rel="stylesheet" href="../assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../assets/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <script src="../assets/vendor/breakpoints/breakpoints.js"></script>
    
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

                        <li class="dropdown site-menu-item ">
                            <a data-toggle="dropdown" href="dashboard.php">
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        

                        <li class="dropdown site-menu-item">
                            <a data-toggle="dropdown" href="editpage.php">
                                <span class="site-menu-title">Edit Page</span>
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
            <div class="row">
                <?php if(isset($_GET['success'])) { ?>
                <div class="col-12">
                    <div class="alert alert-<?=$_GET['success'] == 'false' ? 'danger' : 'info'?>">
                        <?=urldecode($_GET['message'])?></div>
                </div>
                <?php } ?>
                <div class="col-md-4 col-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">

                                


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8 col-12">

                    <div class="examle-wrap">
                        <h4 class="example-title">Your Information</h4>
                        <div class="example">
                            <div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
                                aria-multiselectable="true" role="tablist">
                                <div class="panel">
                                    <div class="panel-heading" id="exampleHeadingContinuousOne" role="tab">
                                        <a class="panel-title" data-parent="#exampleAccordionContinuous"
                                            data-toggle="collapse" href="#exampleCollapseContinuousOne"
                                            aria-controls="exampleCollapseContinuousOne" aria-expanded="true">
                                            General Information
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse show" id="exampleCollapseContinuousOne"
                                        aria-labelledby="exampleHeadingContinuousOne" role="tabpanel">
                                        <div class="panel-body">
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Surname</label>
                                                            <input type="text" name="surname" class="form-control"
                                                                value="<?=$rows['surname']?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">First Name</label>
                                                            <input type="text" name="firstname" class="form-control"
                                                                value="<?=$rows['firstname']?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" name="middlename" class="form-control"
                                                                value="<?=$rows['middlename']?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Email Address</label>
                                                            <input type="text" name="email" class="form-control"
                                                                value="<?=($rows['email'])?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Contact</label>
                                                            <input type="text" name="contact" class="form-control"
                                                                value="<?=$rows['contact']?>">
                                                        </div>
                                                    </div>


                                                    <div class="col-12 text-right">
                                                        <button type="submit" name="saveChanges"
                                                            class="btn btn-primary btn-sm">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" id="exampleHeadingContinuousTwo" role="tab">
                                        <a class="panel-title collapsed" data-parent="#exampleAccordionContinuous"
                                            data-toggle="collapse" href="#exampleCollapseContinuousTwo"
                                            aria-controls="exampleCollapseContinuousTwo" aria-expanded="false">
                                            Change Password
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="exampleCollapseContinuousTwo"
                                        aria-labelledby="exampleHeadingContinuousTwo" role="tabpanel">
                                        <div class="panel-body">
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Old Password</label>
                                                            <input type="password" name="old_password"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">New Password</label>
                                                            <input type="password" name="new_password"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Confirm New Password</label>
                                                            <input type="password" name="confirm_new_password"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-right">
                                                        <button type="submit" name="btnChangePassword"
                                                            class="btn btn-primary btn-sm">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->

    <!-- Modal -->
    <form action="?id=<?=$_GET['id']?>&action=cancel" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel Reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Reason</label>
                                    <textarea name="reason" class="form-control" style="resize:none" id=""
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">© <?=date('Y')?> <a href="javascript:void(0)">ABC Car Rental Inc.</a></div>
    </footer>
    <!-- Core  -->
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
        Config.set('../assets', '../assets');
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