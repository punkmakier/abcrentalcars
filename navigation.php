<?php
    if(isset($_GET['logout'])=='true') {
        unset($_SESSION['customer_id']);
        header('location:index.php');
    }
?>
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
<div id="branding-content">
    <div class="menus">
        <?php if($_SESSION['customer_id'] == 0) { ?>
            <span class="register"><a class="sign_button" style="background:transparent;color:#000;text-transform:uppercase">WELCOME!</a></span>
            
        <?php } else { ?>
            <?php 
                $user = get_account_details($_SESSION['customer_id']);
            ?>
            <span class="register"><a class="sign_button" style="background:transparent;color:#000">Hello! <?=$user['firstname'].' '.$user['middlename'].' '.$user['surname']?></a></span>
            
        <?php } ?>
    </div>
    <div class="title-content">
        <img class="site-logo" src="images/thumbnew.png" alt="" />
    </div>
    <div class="access-content">
        <label for="menu-icon" class="menu-icon"><img src="images/menu.png" alt="menu" /></label>
        <input type="checkbox" id="menu-icon" value="1" />
        <ul>
            <li class="menu-close">
                <span>&#10006;</span>
            </li>
            <li id="home"><a href="index.php" title="">Home</a></li>
            <li id="vehicles"><a href="vehicles.php?step=1">Vehicles</a></li>
            <li id="about-us"><a href="about-us.php">About Us</a></li>
            <li id="contact-us"><a href="contact-us.php">Contact Us</a></li>
            <li id="rules"><a href="faqs.php">FAQs</a></li>
        </ul>
    </div><!-- .access -->
    <div class="member">
        <?php if($_SESSION['customer_id'] == 0) { ?>
            <span class="sign_in"><a class="sign_button tab_link_button" href="#sign_in" title="">Sign in</a></span>
            <span class="register"><a class="sign_button tab_link_button" href="#register" title="">Register</a></span>
        <?php } else { ?>
            <?php 
                $user = get_account_details($_SESSION['customer_id']);
            ?>
            <span class="register"><a class="sign_button" href="?logout=true" onclick="return submitForm(this);" title="">Logout</a></span>
            <span class=""><a class="sign_button" href="portal">My Portal</a></span>
        <?php } ?>
        
    </div>
</div><!-- #branding-content -->
<div class="clear"></div>