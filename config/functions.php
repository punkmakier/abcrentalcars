<?php
include 'config.php';

function post($data) {
    global $db;
    return $db->real_escape_string($_POST[$data]);
}

function register($register_license,$register_surname,$register_firstname,$register_middlename,$register_email,$register_contact,$register_username,$register_password,$user_type) {
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE email = '$register_email'");
    if($checker->num_rows > 0) {
        echo "<script>
alert('Email already exists');
</script>";
    } else {
        $requirement  = $_FILES['requirement']['name'];
        $location = $user_type == 'Customer' ? 'license' : 'permit';
        $db->query("INSERT INTO accounts (license,surname,firstname,middlename,email,contact,username,password,user_type,requirement) VALUES ('$register_license','$register_surname','$register_firstname','$register_middlename','$register_email','$register_contact','$register_username','$register_password','$user_type','$requirement')");
        move_uploaded_file($_FILES['requirement']['tmp_name'],'images/'.$location.'/'.$_FILES['requirement']['name']);
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo"
        <style>
        .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #FF8C00;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
        .swal-button:hover {
    background-color: #FFD580;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
        ";

        require './vendors/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
        $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
        $mail->addAddress($register_email, 'New Entry');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Request Registration';
        $mail->Body    = 'Thank you for registering to our website please wait for the action of admin.';

        if(!$mail->send()) {
            echo "<script>swal ( 'Error!' ,  'Something went wrong...' ,  'error' )</script>";
        } else {
            echo "<script>swal ( 'Success' ,  'Account has been successfuly registered. Please wait for approval' ,  'success' )</script>";
        }



    }
}

function forgotPassword($register_email){
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE email = '$register_email'");
    if($checker->num_rows > 0) {
        $data = mysqli_fetch_assoc($checker);
        // send link here
        require './vendors/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
        $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
        $mail->addAddress($register_email, 'New Entry');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Forgot Password Request';
        $mail->Body    = "To change your new password, please click this link: <a href='http://localhost/abcrentalcars/changepassword.php?id=".$data['id']."'>http://localhost/abcrentalcars/changepassword.php</a> ";

        if(!$mail->send()) {
            echo "<script>swal ( 'Error!' ,  'Something went wrong...' ,  'error' )</script>";
        } else {
            echo "<script>swal ( 'Success' ,  'Request has been sent. Please check your email' ,  'success' )</script>";
        }
    }else{
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo"
        <style>
        .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #FF8C00;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
        .swal-button:hover {
    background-color: #FFD580;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
        ";
        echo "<script>swal ( 'Failed' ,  'Email not registered.' ,  'error' )</script>";

    }
}
function changeAccPassword($id,$pass){
    global $db;
    $checker = $db->query("UPDATE `accounts` SET password='$pass' WHERE id = '$id'");
    if($checker){
        echo "<script>
            window.location.href='http://localhost/abcrentalcars/changepassword.php?id=$id&status=success';
        </script>";

    }else{
        return false;
    }
}


function get_account_details($id) {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE id = $id")->fetch_assoc();
}
//customer profile
function update_profile($license,$surname,$firstname,$middlename,$email,$contact) {
    global $db;
    $query = $db->query("UPDATE accounts SET license = '$license', surname = '$surname', firstname = '$firstname', middlename = '$middlename', email = '$email', contact = '$contact' WHERE id = ".$_SESSION['customer_id']);
    if($query) {
        header('location: profile.php?success=true&message='.urlencode('Your information has been updated')); 
    }
}
//customer password
function update_profile_password($old_password,$new_password,$confirm_new_password) {
    global $db;
    $data = get_account_details($_SESSION['customer_id']);
    
    if(password_verify($old_password,$data['password'])) {
        if($new_password == $confirm_new_password) {
            $password   = password_hash($new_password,PASSWORD_DEFAULT);
            $query      = $db->query("UPDATE accounts SET password = '$password' WHERE id = ".$_SESSION['customer_id']);
            if($query) {
                header('location: profile.php?success=true&message='.urlencode('Password has been changed.')); 
            }
        } else {
            header('location: profile.php?success=false&message='.urlencode('New password and confirm new password is mismatched')); 
        }
    } else {
        header('location: profile.php?success=false&message='.urlencode('Old password is incorrect')); 
    }
}

//admin
function update_admin_profile($surname,$firstname,$middlename,$email,$contact) {
    global $db;
    $query = $db->query("UPDATE accounts SET surname = '$surname', firstname = '$firstname', middlename = '$middlename', email = '$email', contact = '$contact' WHERE id = ".$_SESSION['admin_id']);
    if($query) {
        header('location: profile.php?success=true&message='.urlencode('Your information has been updated')); 
    }
}
//admin
function update_admin_password($old_password,$new_password,$confirm_new_password) {
    global $db;
    $data = get_account_details($_SESSION['admin_id']);
    
    if(password_verify($old_password,$data['password'])) {
        if($new_password == $confirm_new_password) {
            $password   = password_hash($new_password,PASSWORD_DEFAULT);
            $query      = $db->query("UPDATE accounts SET password = '$password' WHERE id = ".$_SESSION['admin_id']);
            if($query) {
                header('location: profile.php?success=true&message='.urlencode('Password has been changed.')); 
            }
        } else {
            header('location: profile.php?success=false&message='.urlencode('New password and confirm new password is mismatched')); 
        }
    } else {
        header('location: profile.php?success=false&message='.urlencode('Old password is incorrect')); 
    }
}
function update_owner_password($old_password,$new_password,$confirm_new_password) {
    global $db;
    $data = get_account_details($_SESSION['owners_id']);
    
    if(password_verify($old_password,$data['password'])) {
        if($new_password == $confirm_new_password) {
            $password   = password_hash($new_password,PASSWORD_DEFAULT);
            $query      = $db->query("UPDATE accounts SET password = '$password' WHERE id = ".$_SESSION['owners_id']);
            if($query) {
                header('location: profile.php?success=true&message='.urlencode('Password has been changed.')); 
            }
        } else {
            header('location: profile.php?success=false&message='.urlencode('New password and confirm new password is mismatched')); 
        }
    } else {
        header('location: profile.php?success=false&message='.urlencode('Old password is incorrect')); 
    }
}

function update_owner_profile($license, $surname,$firstname,$middlename,$email,$contact) {
    global $db;
    $query = $db->query("UPDATE accounts SET license = '$license', surname = '$surname', firstname = '$firstname', middlename = '$middlename', email = '$email', contact = '$contact' WHERE id = ".$_SESSION['owners_id']);
    if($query) {
        header('location: profile.php?success=true&message='.urlencode('Your information has been updated')); 
    }
}



function get_vehicles_details($id) {
    global $db;
    return $db->query("SELECT * FROM cars WHERE id = $id")->fetch_assoc();
}

function update_transactions($id,$reason) {
    global $db;
    $query = $db->query("UPDATE transactions SET reason = '$reason', status = 'Cancelled' WHERE id = $id");
    if($query) {
        header('location: reservation-details.php?id='.$id.'&success=true&message='.urlencode('Transaction has been cancelled'));
    }
}

function update_transaction_status($id,$status) {
    global $db;
    $query = $db->query("UPDATE transactions SET status = '$status' WHERE id = $id");
    if($query) {
        header('location: reservation-details.php?id='.$id.'&success=true&message='.urlencode('Transaction has been approved'));
    }
}

function get_my_cars($owners_id) {
    global $db;
    return $db->query("SELECT * FROM cars WHERE accounts_id = $owners_id");
}

function get_car_details($id) {
    global $db;
    return $db->query("SELECT * FROM cars WHERE id = $id");
}

function get_car_if_exists($id) {
    global $db;
    return $db->query("SELECT * FROM cars WHERE id = $id")->num_rows;
}


function get_chats($reference) {
    global $db;
    return $db->query("SELECT * FROM chat WHERE reference = '$reference'");
}

function get_chats_if_exists($reference) {
    global $db;
    return $db->query("SELECT * FROM chat WHERE reference = '$reference'")->num_rows;
}


function all_manufacturers() {
    global $db;
    return $db->query("SELECT * FROM manufacturers");
}

function get_manufacturers_details($id) {
    global $db;
    return $db->query("SELECT * FROM manufacturers WHERE id = $id");
}

function get_manufacturer_if_exists($id) {
    global $db;
    return $db->query("SELECT * FROM manufacturers WHERE id = $id")->num_rows;
}

function get_vehicles($manufacturers = null,$price_filter = null,$price_range = null,$fuel_type = null, $ownerType = null) {
    global $db;
    if($manufacturers == 'All') {
        $pre_condition1 = "";
    } else {
        $pre_condition1 = "WHERE manufacturer = '$manufacturers' "; 
    }
    
    if($fuel_type == 'All') {
        $pre_condition2 = "";
    } else {
        if($manufacturers == 'All') {
            $pre_condition2 = "WHERE fuel_type = '$fuel_type'";
        } else {
            $pre_condition2 = " AND fuel_type = '$fuel_type'";
        }
    }

    if($ownerType == 'All') {
        $pre_condition2 = "";
    } else {
        if($manufacturers == 'All') {
            $pre_condition2 = "WHERE user_type = '$ownerType'";
        } else {
            $pre_condition2 = " AND user_type = '$ownerType'";
        }
    }

    if($price_range == 0) {
        $pre_condition3 = "";
    } elseif($price_range == 10000) {

        if($manufacturers == 'All' && $fuel_type == 'All') {
            $pre_condition3 = " WHERE rate >= 10000";
        } else {
            $pre_condition3 = " AND rate >= 10000";
        }


    }
    

    
    else {
        $price  = explode('-',$price_range);
        $from   = $price[0];
        $to     = $price[1];
        if($manufacturers == 'All' && $fuel_type == 'All') {
            $pre_condition3 = " WHERE rate >= $from AND rate <= $to ";
        } else {
            $pre_condition3 = " AND rate >= $from AND rate <= $to ";
        }
    }


    $conditions = "$pre_condition1 $pre_condition2 $pre_condition3";

    if($manufacturers != null || $price_filter != null || $price_range != null || $fuel_type != null) {
        $checker = $db->query("SELECT * FROM cars INNER JOIN accounts ON cars.accounts_id = accounts.id $conditions");
        if($checker->num_rows > 0) {
            return $db->query("SELECT *,cars.id as cars_id FROM cars INNER JOIN accounts ON cars.accounts_id = accounts.id $conditions ORDER BY rate $price_filter");
        } else {
            return $db->query("SELECT *,cars.id as cars_id FROM cars INNER JOIN accounts ON cars.accounts_id = accounts.id $conditions ORDER BY rate $price_filter");
        }
    } else {
        return $db->query("SELECT *,cars.id as cars_id FROM cars INNER JOIN accounts ON cars.accounts_id = accounts.id");
    }
}

function secureLogin($username,$password) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE username = '$username' AND user_type = 'Customer' AND status = 1"); // validate if username already exist
    if($check->num_rows > 0) {
        $row = $check->fetch_assoc();
        if(password_verify($password,$row['password'])) {
            $_SESSION['customer_id'] = $row['id'];
            header('location: index.php');
        } else {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo"
        <style>
        .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #FF8C00;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
        .swal-button:hover {
    background-color: #FFD580;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
        ";
        echo "<script>swal ( 'Oops' ,  'Invalid Username or Password' ,  'error' )</script>";
        }
    } else {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo"
        <style>
        .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #FF8C00;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
        .swal-button:hover {
    background-color: #FFD580;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
        ";
        echo "<script>swal ( 'Oops' ,  'Account does not exist or Pending for approval' ,  'error' )</script>";
    }
}

function ownerLogin($username,$password) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE username = '$username' AND status = 1"); // validate if username already exist
    if($check->num_rows > 0) {
        $row = $check->fetch_assoc();
        if(password_verify($password,$row['password'])) {
            $_SESSION['owners_id'] = $row['id'];
            header('location: dashboard.php');
        } else {
            $message = "Invalid Username or Password";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else {
        $message = "Account is still pending for Approval";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function adminLogin($username,$password) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE username = '$username' AND user_type = 'Administrator' AND status = 1"); // validate if username already exist
    if($check->num_rows > 0) {
        $row = $check->fetch_assoc();
        if(password_verify($password,$row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            header('location: dashboard.php');
        } else {
            $message = "Invalid Username or Password";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else {
        $message = "Invalid Username or Password";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function get_all_owners() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE user_type = 'Micro' || user_type = 'Macro'");
}
function get_all_accounts_approved_list_all() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 1 AND user_type = 'Customer' OR status = 1 AND user_type = 'Micro' OR status = 1 AND user_type = 'Macro'");
}

function get_all_accounts_approved_list_customers() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 1 AND user_type = 'Customer'");
}

function get_all_accounts_approved_list_owners() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 1 AND user_type = 'Micro' OR status = 1 AND user_type = 'Macro'");
}

function get_all_accounts_approved() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS totalapproved FROM accounts WHERE status = 1 AND user_type = 'Customer' OR status = 1 AND user_type = 'Micro' OR status = 1 AND user_type = 'Macro'");
}

function get_all_accounts_not_approved_list_all() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 0 AND user_type = 'Customer' OR status = 0 AND user_type = 'Micro' OR status = 0 AND user_type = 'Macro'");
}

function get_all_accounts_not_approved_list_customers() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 0 AND user_type = 'Customer'");
}

function get_all_accounts_not_approved_list_owners() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 0 AND user_type = 'Micro' OR status = 0 AND user_type = 'Macro'");
}

function get_all_accounts_not_approved() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS totalnotapproved FROM accounts WHERE status = 0 AND user_type = 'Customer' OR status = 0 AND user_type = 'Micro' OR status = 0 AND user_type = 'Macro'");
}

function get_all_accounts_rejected() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS totalrejected FROM accounts WHERE status = 2 AND user_type = 'Customer' OR status = 2 AND user_type = 'Micro' OR status = 2 AND user_type = 'Macro'");
}


function get_all_total_profit() {
    global $db;
    return $db->query("SELECT *,SUM(total) AS totalprofit FROM transactions WHERE owners_id = '".$_SESSION['owners_id']."' AND status = 'Approved'");
}

function get_all_total_vehicle() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS totalvehicle FROM cars WHERE accounts_id = '".$_SESSION['owners_id']."'");
}

function get_all_total_vehicle2() {
    global $db;
    return $db->query("SELECT * FROM cars WHERE accounts_id = '".$_SESSION['owners_id']."'");
}

function get_all_total_bookings() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS totalbookings FROM transactions WHERE owners_id = '".$_SESSION['owners_id']."' AND status = 'Approved'");
}

function get_all_total_pendingbookings() {
    global $db;
    return $db->query("SELECT *,COUNT(id) AS pendingbookings FROM transactions WHERE owners_id = '".$_SESSION['owners_id']."' AND status = 'Pending'");
}


function get_all_customers() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE user_type = 'Customer'");
}

function get_all_accounts_approved2() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 1 AND user_type = 'Customer'");
}

function get_all_accounts_notapproved2() {
    global $db;
    return $db->query("SELECT * FROM accounts WHERE status = 0 AND user_type = 'Customer'");
}

function get_all_transactions() {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE cars_id = '12'");
}
function get_all_transactions2($carsID) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE cars_id = '$carsID' AND status = 'Pending' OR status = 'A/pproved'");
}
function get_all_editpage_aboutus() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 1");
}

function get_all_editpage_contactus() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 2");
}

function get_all_editpage_rules() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 3");
}

function get_all_editpage_termsandconditionscustomer() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 4");
}

function get_all_editpage_termsandconditionsmacro() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 5");
}

function get_all_editpage_termsandconditionsmicro() {
    global $db;
    return $db->query("SELECT * FROM editpage WHERE id = 6");
}

function update_status($id,$status) {
    global $db;
    $query = $db->query("UPDATE accounts SET status = $status WHERE id = $id");
    if($query) {
        $message = "Account status has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_owner_status($id,$status) {
    global $db;
    $query = $db->query("UPDATE accounts SET status = $status WHERE id = $id");
    if($query) {

        $query2 = $db->query("SELECT `email` FROM `accounts` WHERE id = $id");
        $stmt = mysqli_fetch_assoc($query2);
        $email = $stmt['email'];

        require '../../vendors/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
        $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
        $mail->addAddress($email, 'New Entry');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        if($status == 1){
            $mail->Subject = 'Accepted';
            $mail->Body    = "Hi, your account has been <b style='color: green;'>accepted</b> to our system";
        }
        else if($status == 2){
            $mail->Subject = 'Rejected';
            $mail->Body    = "Hi, your account has been <b style='color: red;'>rejected</b> to our system";
        }
        

        if(!$mail->send()) {
            $message = "Something went wrong...";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {
            $message = "Account status has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }


        
    }
}

function update_content_status($aboutus) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$aboutus' WHERE id = 1 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_content_termsandconditionscustomer($termsandconditions) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$termsandconditions' WHERE id = 4 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_content_termsandconditionsmacro($termsandconditions) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$termsandconditions' WHERE id = 5 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_content_termsandconditionsmicro($termsandconditions) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$termsandconditions' WHERE id = 6 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}


function update_content_contactus($contactus) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$contactus' WHERE id = 2 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_content_rules($rules) {
    global $db;
    $query = $db->query("UPDATE editpage SET content = '$rules' WHERE id = 3 ");
    if($query) {
        $message = "Page Content has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}




function transactions($customer_id,$cars_id,$destination,$purpose,$from,$to,$rate_per_day,$days_rented,$total,$reference,$status) {
    global $db;
    $check = $db->query("SELECT * FROM transactions WHERE customer_id = '$customer_id'  AND `from` = '$from' AND `to` = '$to'"); // validate if username already exist
    if($check->num_rows > 0) {
        $message = "Booking already exists!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $data = get_vehicles_details($cars_id);
        $rowSender  = get_account_details($data['accounts_id']);
        $rowReceiver  = get_account_details($customer_id);
        $owners_id    = $data['accounts_id'];
        $senderName = $rowSender['firstname'].' '.$rowSender['middlename'].' '.$rowSender['surname']; 
        $receiverName = $rowReceiver['firstname'].' '.$rowReceiver['middlename'].' '.$rowReceiver['surname']; 
        $query = $db->query("INSERT INTO transactions (customer_id,owners_id,cars_id,destination,purpose,`from`,`to`,rate_per_day,days_rented,total,reference,status) VALUES ('$customer_id','$owners_id','$cars_id','$destination','$purpose','$from','$to','$rate_per_day','$days_rented','$total','$reference','$status')");

        if($query) {
            $message = 'Thank you for your reservation. Your reference code is '.$reference;
            $db->query("INSERT INTO chat (reference,sender,receiver,message,position) VALUES ('$reference','$senderName','$receiverName','$message',0)");
        }
    }
}

function get_my_transactions($owners_id) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE owners_id = '$owners_id'"); // validate if username already exist
}

function save_chat($message,$reference,$transaction_id,$customer_id) {
    global $db;
    $rowTransaction = get_transaction_details($transaction_id);
    
    $rowData        = get_vehicles_details($rowTransaction['cars_id']);
    $rowReceiver    = get_account_details($rowData['accounts_id']);
    $rowSender      = get_account_details($customer_id);
    $senderName     = $rowSender['firstname'].' '.$rowSender['middlename'].' '.$rowSender['surname']; 
    $receiverName   = $rowReceiver['firstname'].' '.$rowReceiver['middlename'].' '.$rowReceiver['surname']; 
    $msg            = $message;
    $query = $db->query("INSERT INTO chat (reference,sender,receiver,message,position) VALUES ('$reference','$senderName','$receiverName','$msg',1)");
    if($query) {
        header('location: chat-owner.php?reference='.$reference.'&id='.$transaction_id.'&success=true&message='.urlencode('Message has been sent'));
    }
}

function save_cars($manufacturer,$no_of_doors,$fuel_tank_capacity,$seating_capacity,$transmission_type,$gear_box,$model,$color,$year,$rate,$fuel_type,$rulesandregulations) {
    global $db;
    $accounts_id = $_SESSION['owners_id'];
    $images  = $_FILES['images']['name'];

    $query = $db->query("INSERT INTO cars (accounts_id,images,manufacturer,no_of_doors,fuel_tank_capacity,seating_capacity,transmission_type,gear_box,model,color,`year`,rate,fuel_type,rulesandregulations) VALUES ($accounts_id,'$images','$manufacturer','$no_of_doors','$fuel_tank_capacity','$seating_capacity','$transmission_type','$gear_box','$model','$color','$year','$rate','$fuel_type','$rulesandregulations')");
    if($query) {
        move_uploaded_file($_FILES['images']['tmp_name'],'../../images/vehicles/'.$_FILES['images']['name']);
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo"
        <style>
        .swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #FF8C00;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
        .swal-button:hover {
    background-color: #FFD580;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
        ";
        echo "<script>swal ( 'Success' ,  'Vehicle added successfully' ,  'success' )</script>";
    }
}

function update_cars($id,$manufacturer,$no_of_doors,$fuel_tank_capacity,$seating_capacity,$transmission_type,$gear_box,$model,$color,$year,$rate,$fuel_type,$rulesandregulations) {
    global $db;
    $accounts_id = $_SESSION['owners_id'];
    $query = $db->query("UPDATE cars SET manufacturer = '$manufacturer', no_of_doors = '$no_of_doors', fuel_tank_capacity = '$fuel_tank_capacity', seating_capacity = '$seating_capacity', transmission_type = '$transmission_type', gear_box = '$gear_box', model = '$model', color = '$color',`year` = '$year', rate = '$rate', fuel_type = '$fuel_type', rulesandregulations = '$rulesandregulations' WHERE id = $id");
    if($query) {
        $message = "Vehicles has been updated!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function update_car_image($id) {
    global $db;
    $accounts_id = $_SESSION['owners_id'];
    $images  = $_FILES['images']['name'];

    $query = $db->query("UPDATE cars SET images = '$images' WHERE id = $id");
    if($query) {
        move_uploaded_file($_FILES['images']['tmp_name'],'../../images/vehicles/'.$_FILES['images']['name']);
        header('location: vehicle-details.php?id='.$id.'&success=true&message='.urlencode('Image has been updated'));
    }
}

function delete_cars($id) {
    global $db;
    $query = $db->query("DELETE FROM cars WHERE id = $id");
    if($query) {
        header('location: my-vehicles.php?success=true&message='.urlencode('Vehicle has been deleted'));
    }
} 


function save_owner_chat($message,$reference,$transaction_id,$owners_id) {
    global $db;
    $rowTransaction = get_transaction_details($transaction_id);
    
    $rowData        = get_vehicles_details($rowTransaction['cars_id']);
    $rowReceiver    = get_account_details($rowData['accounts_id']);
    $rowSender      = get_account_details($owners_id);
    $senderName     = $rowSender['firstname'].' '.$rowSender['middlename'].' '.$rowSender['surname']; 
    $receiverName   = $rowReceiver['firstname'].' '.$rowReceiver['middlename'].' '.$rowReceiver['surname']; 
    $msg            = $message;
    $query = $db->query("INSERT INTO chat (reference,sender,receiver,message,position) VALUES ('$reference','$senderName','$receiverName','$msg',0)");
    if($query) {
        header('location: chat-customer.php?reference='.$reference.'&id='.$transaction_id.'&success=true&message='.urlencode('Message has been sent'));
    }
}



function get_transaction_details($id) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE id = $id")->fetch_assoc();
}

function upload_drivers_license() {
    global $db;
    $requirement  = $_FILES['requirement']['name'];

    $query = $db->query("UPDATE accounts SET requirement = '$requirement' WHERE id = ".$_SESSION['customer_id']);
    if($query) {
        move_uploaded_file($_FILES['requirement']['tmp_name'],'../images/license/'.$_FILES['requirement']['name']);
        header('location: profile.php?success=true&message='.urlencode('Driver\'s license has been updated'));
    }
}

function upload_business_permit() {
    global $db;
    $requirement  = $_FILES['requirement']['name'];

    $query = $db->query("UPDATE accounts SET requirement = '$requirement' WHERE id = ".$_SESSION['owners_id']);
    if($query) {
        move_uploaded_file($_FILES['requirement']['tmp_name'],'../../images/permit/'.$_FILES['requirement']['name']);
        header('location: profile.php?success=true&message='.urlencode('Business Permit has been updated'));
    }
}



function get_transaction_if_exists($id) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE id = $id")->num_rows;
}

function get_transactions() {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE customer_id = ".$_SESSION['customer_id']);
}

function get_customer_transactions($owners_id) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE status = 'Approved' AND owners_id = '$owners_id'"); // validate if username already exist
}

function get_customer_pendingtransactions($owners_id) {
    global $db;
    return $db->query("SELECT * FROM transactions WHERE status = 'Pending' AND owners_id = '$owners_id'"); // validate if username already exist
}




function encryption($data) {
    $plaintext = $data;
    $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
    return $ciphertext;
}

function decryption($data) {
    $c                  = base64_decode($data);
    $key                = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $ivlen              = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv                 = substr($c, 0, $ivlen);
    $hmac               = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw     = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac            = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac))// timing attack safe comparison
    {
        return $original_plaintext;
    }
}

function getDayProfit($id){
    global $db;
    for($i = 0; $i < 7; $i+=1){
        if($i == 0){
            $sqlQ = $db->query("SELECT SUM(`total`) as totalDayProfit FROM transactions WHERE `owners_id`= '$id' AND `status`='Approved' AND DATE_FORMAT(`date`, '%Y-%m-%d') = CURDATE()");
            $stmt = mysqli_fetch_assoc($sqlQ);
            echo '"'.$stmt['totalDayProfit'].'"'.",";

    
        }else{
            $sqlQ = $db->query("SELECT SUM(`total`) as totalDayProfit FROM transactions WHERE `owners_id`='$id' AND `status`='Approved' AND DATE(`date`) = CURDATE()+$i");
            $stmt = mysqli_fetch_assoc($sqlQ);
            echo '"'.$stmt['totalDayProfit'].'"'.",";
        }

        
    }

   
}


function dayName($id){
    global $db;

            $sqlQ = $db->query("SELECT `date` as dayName FROM transactions WHERE `owners_id`= '$id' AND `status`='Approved'");
            while($stmt = mysqli_fetch_assoc($sqlQ)){
                $converted = substr($stmt['dayName'],0,10);
                $newDateName = date('l', strtotime($converted));
                echo '"'.$newDateName.'"'.",";
            } 
}

function getDailyProfit($id){
    global $db;
    $sqlQ = $db->query("SELECT SUM(`total`) as dailyProfit FROM transactions WHERE `owners_id`='$id' AND `status`='Approved' AND DATE_FORMAT(`date`, '%Y-%m-%d') = CURDATE();");
    $stmt = mysqli_fetch_assoc($sqlQ);
    echo $stmt['dailyProfit'];
                
}

function getWeeklyProfit($id){
    global $db;
    $sqlQ = $db->query("SELECT SUM(`total`) as weeklyProfit FROM transactions WHERE `owners_id`='$id' AND `status`='Approved' AND YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)");
    $stmt = mysqli_fetch_assoc($sqlQ);
    echo $stmt['weeklyProfit'];
                
}

function getMonthlyProfit($id){
    global $db;
    $sqlQ = $db->query("SELECT SUM(`total`)  as monyhlyProfit
    FROM transactions
    WHERE `owners_id`='$id' AND `status`='Approved' AND MONTH(date) = MONTH(CURRENT_DATE())
    AND YEAR(date) = YEAR(CURRENT_DATE())");
    $stmt = mysqli_fetch_assoc($sqlQ);
    echo $stmt['monyhlyProfit'];
                
}