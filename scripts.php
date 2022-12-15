<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<!--[if IE]>
<script type="text/javascript" src="js/placeholder_ie.js"></script>
<![endif]-->
<script type="text/javascript" src="js/custom-form-elements.js"></script>
<script type="text/javascript" src="js/jquery.meio.mask.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.min.js"></script>
<script type="text/javascript" src="js/jquery.blueberry.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<script>
    $('.mybtn').click(e => {
        $('.mybtn').attr('disabled',true);
        $('#myForm').submit();
    })
</script>