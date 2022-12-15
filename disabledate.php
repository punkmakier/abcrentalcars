<!-- datepicker -->
<?php
$period = new DatePeriod(
     new DateTime('2022-10-01'),
     new DateInterval('P1D'),
     new DateTime('2022-10-05')
);

foreach ($period as $key => $value) {
    echo $value->format('Y-m-d').",";       
}
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">>

<style type="text/css">
	.disabled{
    color:#cecece;
}
#picker{
    width:12em;
    margin:1em;
}

</style>>
<input type="text" id="picker">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script>
	$("#picker").datepicker({
    datesDisabled:["10/01/2022","10/05/2022","10/08/2022","10/21/2022"]
}).focus();
</script>


<br><br><br><br><br><br><br><br>




<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<input type="text" name="datepicker">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "abcrentalcars";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM transactions";
$result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)) {


$period = new DatePeriod(
     new DateTime($row['from']),
     new DateInterval('P1D'),
     new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($row['to']))))
);

foreach ($period as $key => $value) {
    $date[] = $value->format('Y-m-d');       
}



  }
 $date = json_encode($date);


 $alldate = str_replace( array('[',']') , ''  , $date );


?>

<script type="text/javascript">
			var date = new Date();
			date.setDate(date.getDate() + 1)
			$('input[name="datepicker"]').daterangepicker({


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

			});
</script>