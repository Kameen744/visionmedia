<?php
$ddte = date("d/m/Y");
	$tabname = 'Print Reports';
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="printAllAdverts">Print All Records</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="AdvertSchedule">Adverts Schedule</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="getHistory">Monthly Report</a>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	';
	include_once 'layouts/main-card.php';
?>