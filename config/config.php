<?php 
session_start();
ob_end_clean();
ob_start();
 //$db = new mysqli('localhost','u937407737_abcrentalcars','Atcnp@$/70[e','u937407737_abcrentalcars');
//$db = new mysqli('localhost','root','123','u937407737_abcrentalcars');
$db = new mysqli('localhost','root','','u937407737_abcrentalcars');
date_default_timezone_set('Asia/Manila');
if(!isset($_SESSION['customer_id'])) {
    $_SESSION['customer_id'] = 0;
}
if(!isset($_SESSION['owners_id'])) {
    $_SESSION['owners_id'] = 0;
}

if(!isset($_SESSION['admin_id'])) {
    $_SESSION['admin_id'] = 0;
}


