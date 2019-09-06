<?php
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

require "con_Vfm.php";
	date_default_timezone_set("Africa/Lagos");
	$date = date("D d/m/Y");

	$getadd = $vfms_con->query("SELECT S_Location, S_Address, S_Contact FROM stations WHERE Station_ID = '$stID' ");
	$grow = $getadd->fetch_array(MYSQLI_NUM);
	$stLocation = $grow[0]; $stAddress = $grow[1]; $stContact = $grow[2];
	$table = "
		<!DOCTYPE html>
		<html lang='en'>
		<head>
		  <meta charset='utf-8'>
			<title>$reporttitle</title>
			<link rel='stylesheet' href='../css/bootstrap.css'>
		  <link rel='stylesheet' href='../css/paperstyle.css'>	  
		  <style>
		  	@page { 
		  		size: A4; 
		  	}
		
		  	#section {paddin: 0px;}
		  
		  	table {border: }
		  	.maintb {font-size:12px;}
		  	.tbcost th {font-weight: bold}
		  	.maintb th {font-weight: bold}
		  </style>
		</head>
		<body class='A4 sheet padding-10mm'>
		<header class='clearfix padding-10mm'>
		  <div id='logo'>
		    <img src='../images/Vlogo.png'>
		  </div>
		  <h1>$reporttitle</h1>
		  <div id='company' class='clearfix'>
		   
		  </div>
		  <div id='project'>
		    <div><span>COMPANY</span>Vision FM $stLocation</div>
		    <div><span>ADDRESS</span> $stAddress.</div>
		    <div><span>MOBILE</span>$stContact</div>
		    <div><span>EMAIL</span> <a href='mailto:visionfm@example.com'>vision@example.com</a></div>
		    <div><span>DATE</span>$date</div>
		  </div>
		</header>
		<hr>
	";
