
<?php
if(isset($_POST['register_button'])) {
    global $db;
    $register_license    = post('register_license');
    $register_surname    = post('register_surname');
    $register_middlename = post('register_middlename');
    $register_firstname  = post('register_firstname');
    $register_email      = post('register_email');
    $register_contact    = post('register_contact');
    $register_username   = post('register_username');
    $register_password   = password_hash(post('register_password'),PASSWORD_DEFAULT);
    $user_type           = post('user_type');
    register($register_license,$register_surname,$register_firstname,$register_middlename,$register_email,$register_contact,$register_username,$register_password,$user_type);
}

if(isset($_POST['login_button'])) {
    $login_username = post('login_username');
    $login_password = post('login_password');
    secureLogin($login_username,$login_password);
}
if(isset($_POST['forgotPass'])){
    $email = $_POST['forgot_pass_email'];
    forgotPassword($email);
}
?>
<div id="overlay_block"></div>
    <div class="admin-form-content sign_register_block">
        <div class="admin-form-block">
            <form class="main-form admin-form" method="POST" novalidate>
                <div class="main_form_navigation">
                    <div id="tab_register" class="title-form back"><span class="register"><a href="#register"
                                title="">Register</a></span></div>
                    <div id="tab_sign_in" class="title-form current"><span class="sign_in"><a href="#sign_in"
                                title="">Sign In</a></span></div>
                </div>
                <div id="tab_sign_in_content" class="content-form">
                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="Username" type="text" name="login_username" required/>
                    </div>
                    <div>
                        <input id="sign_in_pass" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="login_password" required/>
                    </div>
                    <input class="admin-form-submit orange_button" type="submit" name="login_button" value="Continue" />
                    
                    <div class="admin_form_link">
                        <span class="forgot_passwd"><a class="tab_link_button" href="#forgot_passwd" title="">Forgot password?</a></span>
                    </div>
                </div>
            </form>
            <form class="main-form admin-form" method="POST" enctype="multipart/form-data" >
                <div id="tab_register_content" class="content-form hidden">


                    <div>
                        <p>Driver's License/Valid ID<br>
                            Business Permit (for Business Owners only)</p>
                        <input  id="requirements" class="" type="file" name="requirement" required/>
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="License/Permit No." type="text" name="register_license" required/>
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="Surname" type="text" name="register_surname" required/>
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="First Name" type="text" name="register_firstname" required/>
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="Middle Name" type="text" name="register_middlename" required/>
                    </div>

                    <div>
                        <input id="register_email" class="input_placeholder" type="email" placeholder="Email Address" name="register_email" />
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" type="text" placeholder="Contact Number" name="register_contact" />
                    </div>

                    <div>
                        <select name="user_type" id="customize" class="customize" required>
                            <option value="">Register As:</option>
                            <option value="Customer">Customer</option>
                            <option value="Macro">Macro</option>
                            <option value="Micro">Micro</option>
                        </select>
                    </div>

                    <div>
                        <input id="register_name" class="input_placeholder" placeholder="Username" type="text" name="register_username" required/>
                    </div>

                    

                    <div>
                        <input id="sign_in_pass" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="register_password" />
                    </div>


                        <input class="admin-form-submit continue"  type="button" value="Continue" style="cursor: pointer;" />
         
       <!--                  <input class="admin-form-submit submit orange_button" name="register_button" type="submit" value="Continue" /> -->


                    
                    

        <div class="termsandconditions">
            <span class="close">x</span>
            <div>
            <div>
                <div style="display: flex;place-items:center;justify-content: center;">
                    <input type="checkbox" required />
                    <p><a href="#" class="showcontent">Terms & Conditions</a></p>
                </div>
                <div class="customertermsandconditions">
                    <?php foreach(get_all_editpage_termsandconditionscustomer() as $row) { ?>
                        <div class="content"><?php echo $row['content'] ?></div>
                    <?php } ?>
                </div>
                <div class="macrotermsandconditions">
                    <?php foreach(get_all_editpage_termsandconditionsmacro() as $row) { ?>
                        <div class="content"><?php echo $row['content'] ?></div>
                    <?php } ?>
                </div>
                <div class="microtermsandconditions">
                    <?php foreach(get_all_editpage_termsandconditionsmicro() as $row) { ?>
                        <div class="content"><?php echo $row['content'] ?></div>
                    <?php } ?>
                </div>
            </div>
                <input class="admin-form-submit submit orange_button" name="register_button" type="submit" value="Submit" />
        </div>   
        </div>
                    
                    <div class="admin_form_link">
                        <span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">Already
                                registered?</a></span>
                    </div>
                </div>
                <div class="clear"></div>
            </form>
        </div>
    </div>
    <div class="admin-form-content forgot_passwd_block">
        <div class="admin-form-block">
            <form class="main-form admin-form" method="POST" >
                <div class="main_form_navigation">
                    <div id="tab_forgot_passwd" class="title-form current" value=""></div>
                </div>
                <div id="tab_forgot_passwd_content" class="content-form">
                    <input id="forgot_pass_email" class="input_placeholder" type="email" value=""
                        placeholder="Email address" name="forgot_pass_email" required/>
                    <div id="forgot_pass_text"> We will send you the password in few minutes.</div>
                    <input class="admin-form-submit orange_button" type="submit" name="forgotPass" value="Continue" />
                    <div class="admin_form_link">
                        <span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">Sign In</a></span>
                    </div>
                </div>
                <div class="clear"></div>
            </form>
        </div>
    </div>




    


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $('.continue').click(function(){
            $('.termsandconditions').addClass('termsandconditions_show')

            if ($('#customize').val() == '') {
                     $('.customertermsandconditions').css('display','none')
                $('.macrotermsandconditions').css('display','none')
                $('.microtermsandconditions').css('display','none')
            }
        })

        $('.close').click(function(){
            $('.termsandconditions').removeClass('termsandconditions_show')
        })


        $('#customize').change(function(){
            if ($(this).val() == 'Customer') {
                $('.customertermsandconditions').css('display','unset')
                $('.macrotermsandconditions').css('display','none')
                $('.microtermsandconditions').css('display','none')
            }else if ($(this).val() == 'Macro') {
                $('.customertermsandconditions').css('display','none')
                $('.macrotermsandconditions').css('display','unset')
                $('.microtermsandconditions').css('display','none')
            }else if ($(this).val() == 'Micro') {
                $('.customertermsandconditions').css('display','none')
                $('.macrotermsandconditions').css('display','none')
                $('.microtermsandconditions').css('display','unset')
            }
        })

        $('.showcontent').click(function(){
            $('.content').toggleClass('content_show')
        })

    </script>

    <style>
        .content{
            height: 0;
            overflow: hidden;
        }
        .content_show{
            height: 100%;
        }
        .termsandconditions{
         box-shadow: 0px 0px 30px rgba(0,0,0,0.5);
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%,-50%);
         z-index: 1000;
         width: 400px !important;
         max-width: 100%;
         height: 250px;
         text-align: center;
         display: grid;
         place-items: center;
         display: none !important;
         background-color: #fff;
        }
        .close{
            position: absolute;
            top: 10px;
            right: 18px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        .termsandconditions .orange_button{
            width: 200px !important;
        }
        .termsandconditions_show{
            display: unset !important;
            display: grid !important;
        }
    </style>