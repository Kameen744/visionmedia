<?php
$ddte = date("d/m/Y");
	$tabname = 'Transactions';
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="GetAllTrans">All Transactions</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="TransByDate">Daily Transactions</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="TransSearchbydate">Search By</a>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	';
	include_once 'layouts/main-card.php';
?>