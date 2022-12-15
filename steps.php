<?php 
    if($_GET['step'] == 1) {
        $one = '';
        $two = '';
        $three = '';
        $four = '';
    } elseif($_GET['step'] == 2) {
        $one = 'done';
        $two = '';
        $three = '';
        $four = '';
    } elseif($_GET['step'] == 3) {
        $one = 'done';
        $two = 'done';
        $three = '';
        $four = '';
    } elseif($_GET['step'] == 4) {
        $one = 'done';
        $two = 'done';
        $three = 'done';
        $four = '';
    }
?>  
<div class="progress-bar-step <?=$_GET['step'] == 1 ? 'current' : ''?> <?=$one?>">
    <div class="step_number">1</div>
    <div class="step_name">Choose a car</div>
    <div class="clear"></div>
</div>
<div class="progress-bar-step <?=$_GET['step'] == 2 ? 'current' : ''?> <?=$two?>">
    <div class="step_number">2</div>
    <div class="step_name">Select Date</div>
    <div class="clear"></div>
</div>
<div class="progress-bar-step <?=$_GET['step'] == 3 ? 'current' : ''?> <?=$three?>">
    <div class="step_number">3</div>
    <div class="step_name">Confirm Booking</div>
    <div class="clear"></div>
</div>

<div class="progress-bar-step <?=$_GET['step'] == 4 ? 'current' : ''?> <?=$four?>">
    <div class="step_number">4</div>
    <div class="step_name">Thank you</div>
    <div class="clear"></div>
</div>