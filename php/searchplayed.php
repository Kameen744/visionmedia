
<!-- <div class="nav-link">
    <span class="label label-primary">Search By Name</span>
    <input type="text" id="searchPlayedNameText" class="form-control">
    <span class="label label-warning hidden">Press Enter Key To Search Record</span>
</div>

<div class="nav-link">
    <span class="label label-warning">Search By Date</span>
    <input type="text" id="searchPlayedDateText" class="form-control pdate">
    <span class="label label-warning hidden">Press Enter Key To Search Record</span>
</div>

<div class="nav-link" style="margin-left:20px;">   
    <div class="">          
        <span class="label label-success">Search From Date</span>           
        <input type="text" id="searchPlayedFromText" class="form-control pdate">
    </div>
    <div class="">          
        <span class="label label-success">Search To Date</span>
        <input type="text" id="searchPlayedToText" class="form-control pdate">
    </div>
</div>
<script>
    $(".pdate").datepicker({dateFormat: 'yy-mm-dd'});    
</script> -->


<?php
$ddte = date("d/m/Y");
	$tabname = 'Print Reports';
	$cardnav = '
	<nav class="nav justify-content-center">
    <div class="nav-link">
    <span class="label label-primary">Search By Name</span>
    <input type="text" id="searchPlayedNameText" class="form-control">
    <span class="label label-warning hidden">Press Enter Key To Search Record</span>
</div>

<div class="nav-link">
    <span class="label label-warning">Search By Date</span>
    <input type="text" id="searchPlayedDateText" class="form-control pdate">
    <span class="label label-warning hidden">Press Enter Key To Search Record</span>
</div>

<div class="nav-link" style="margin-left:20px;">   
    <div class="">          
        <span class="label label-success">Search From Date</span>           
        <input type="text" id="searchPlayedFromText" class="form-control pdate">
    </div>
    <div class="">          
        <span class="label label-success">Search To Date</span>
        <input type="text" id="searchPlayedToText" class="form-control pdate">
    </div>
</div>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	';
	include_once 'layouts/main-card.php';
?>
<script>
    $(".pdate").datepicker({dateFormat: 'yy-mm-dd'});    
</script>