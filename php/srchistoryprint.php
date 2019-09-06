<?php

if (isset($_POST['vfrom'])) {
	require "con_Vfm.php";

	$vfrom = $_POST['vfrom'];
	$vto = $_POST['vto'];
	$date = date("d/m/Y");
	
	if ($vfrom == "") {
			echo "Empty ID";
			}else{
				$dtable = "
					<!DOCTYPE html>
					<html lang='en'>
					<head>
					  <meta charset='utf-8'>
					  <title>$vfrom To $vto Records</title>	  
					  <link rel='stylesheet' href='../css/bootstrap.css'>
					  <link rel='stylesheet' href='../css/paperstyle.css'>
					  <style>
					  	@page { 
					  		size: A4; 
					  	}
					  	.tbcost { float:left; width: 101px; margin-left:1px; font-size:10px;}
					  	#section {paddin: 0px;}
					  	#headdiv { height:60px; background:#D9534F; margin:0px; paddin: 0px; }
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
					  <h1>Records From $vfrom to $vto</h1>
					  <div id='company' class='clearfix'>
					    <div>Company Name</div>
					    <div>455 Foggy Heights,<br /> AZ 85004, NG</div>
					    <div>(602) 519-0450</div>
					    <div><a href='mailto:company@example.com'>company@example.com</a></div>
					  </div>
					  <div id='project'>
					    <div><span>COMPANY</span>Vision FM</div>
					    <div><span>ADDRESS</span> 79 Gidan Dare, Sokoto State.</div>
					    <div><span>MOBILE</span>08080808080</div>
					    <div><span>EMAIL</span> <a href='mailto:vision@example.com'>vision@example.com</a></div>
					    <div><span>DATE</span>$date</div>
					  </div>
					</header>
					<hr>
				";
			
				$dtable .= "<table class='table table-bordered'><tr> <th>S/N</th> <th>Name</th> <th>Number</th> <th>Advert</th> <th>Registered</th> <th>Start</th> <th>End</th> <th>For</th> <th>Remark</th> <th>Reg By</th> </tr>";
				$ssqur = $vfms_con->query("SELECT  Client_Name, Client_Number, Advert_Name, Start_Date, End_Date, Num_Days, Remarks, Reg_By, Reg_Date  FROM register_advert WHERE Reg_Date >= '$datefrom' AND Reg_Date <= '$dateto' ");
				while ($srows = $ssqur->fetch_array(MYSQLI_NUM)) {
					$clnm = $srows[0];
					$clnumb = $srows[1];
					$advrt = $srows[2];
					$Slot = $srows[3];
					$pslot = $srows[4];

					$amount = "₦ ".number_format($srows[5]);
					$paid = "₦ ".number_format($srows[6]);
					$balance = "₦ ".number_format($srows[7]);

					$regdate = new datetime($srows[8]);
					$rdate = $regdate->format('d/m/Y');
					$strtdate = new datetime($srows[9]);
					$stdate = $strtdate->format('d/m/Y');
				$dtable .= "<tr><td>$advId</td><td>$clnm</td><td>$clnumb</td><td>$advrt</td><td>$Slot</td><td>$pslot</td><td>$amount</td><td>$paid</td><td>$balance</td><td>$rdate</td><td>$stdate</td></tr>";
				}
	echo $dtable;
	}
}
?>