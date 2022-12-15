<?php include 'config/functions.php';?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>ABC - Contact Us</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/adl-icon.ico" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/jquery.slider.min.css" />
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
        <div id="main">
            <div id="primary" style="margin-top:10px">
                <div class="widget  ">
                    <div class="widget-content widget-note">
                    <?php $i=1; foreach(get_all_editpage_contactus() as $row) { ?>
                            <p style="font-size: 140%;"><?php echo $row['content'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
 
    </div>
    <!--end:conteiner-->
    <?php include 'login-register.php';?>
    <?php include 'scripts.php';?>
    <script>
        $('#contact-us').addClass('current_page_item')
    </script>
</body>

</html>