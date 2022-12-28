
<?php
include 'config/functions.php';


if(isset($_POST['changePass'])){
    $newPass = $_POST['newpass'];
    $connewPass = $_POST['conpass'];

    if($newPass != $connewPass){
        echo "<script>alert('Password does not match.');
            window.reload();
        </script>";
        
    }else{
        $encryptPass = password_hash($newPass,PASSWORD_DEFAULT);
        changeAccPassword($_GET['id'],$encryptPass);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body style="display: flex; justify-content: center;">
<form style="margin-top:40px; max-height: 280px; width: 30%; background-color: #fff;;" method="POST">
						<div class="main_form_navigation">
							<div id="book_car" class="title-form current"><a href="#" title="">Change Password</a></div>
						</div>
						<div class="content-form ">



							<div class="location-block" style="margin-bottom:10px">
								<div style="">New Password</div>
								<input name="newpass" type="password" class="customize" required>
							</div>
                            <div class="location-block" style="margin-bottom:10px">
								<div style="">Confirm New Password</div>
								<input name="conpass" type="password" class="customize" required>
							</div>
							


							<input class="orange_button form-continue" style="float:right" name="changePass" type="submit" value="Submit"/>

							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</form>


    
    <?php 
        if(isset($_GET['status']) == "success"){
            echo "<script>
            Swal.fire({
                title: 'Success',
                text: 'Your password has been successfully changed. Proceed to login.',
                icon: 'success',
            }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href='http://localhost/abcrentalcars/index.php#sign_in';
                }
              })
            </script>";
        }
    
    ?>
    
</body>
</html>


<!-- SELECT SUM(`total`) FROM transactions WHERE `owners_id`='43' AND `status`='Approved' AND DATE_FORMAT(`date`, '%Y-%m-%d') = CURDATE();   - today
SELECT SUM(`total`) FROM transactions WHERE `owners_id`='43' AND `status`='Approved' AND YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1); - 1 week

SELECT SUM(`total`)
FROM transactions
WHERE `owners_id`='43' AND `status`='Approved' AND MONTH(date) = MONTH(CURRENT_DATE())
AND YEAR(date) = YEAR(CURRENT_DATE()) - MONTH -->