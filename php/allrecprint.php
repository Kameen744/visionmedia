<?php
	require "con_Vfm.php";
	session_start();
	if (isset($_SESSION['vadminp']) | isset($_SESSION['vuserp'])) {
		if (isset($_SESSION['vuserp'])) {
			$stID = $_SESSION['Station_ID_No']; 
		} 
		elseif (isset($_SESSION['vadminp'])) {
			$stID = $_POST['scstID'];
		}
	$getadd = $vfms_con->query("SELECT S_Location, S_Address, S_Contact FROM stations WHERE Station_ID = '$stID' ");
	$grow = $getadd->fetch_array(MYSQLI_NUM);
	$stLocation = $grow[0]; $stAddress = $grow[1]; $stContact = $grow[2];
	date_default_timezone_set("Africa/Lagos");
	$date = date("D d/m/Y");
			$table = "
					<!DOCTYPE html>
					<html lang='en'>
					<head>
					  <meta charset='utf-8'>
					  <title>All Registered Adverts</title>
					  <link rel='stylesheet' href='../css/bootstrap.css'>
					  <link rel='stylesheet' href='../css/paperstyle.css'>
					
					</head>
					<body class='A4 landscape'>
					<section class='sheet padding-10mm'>
					<header class='clearfix' style='margin-top:0px;'>
					  <div id='logo'>
					    <img src='../images/Vlogo.png'>
					  </div>
					  <h1>All Registered Records</h1>
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
	
	$result = $vfms_con->query("SELECT ID, Client_Name, Client_Number, Advert_Name, Amount, Paid, Balance, Start_Date, End_Date, Slot, Num_Days, Remarks, Reg_By FROM register_advert WHERE Station_ID = '$stID' ORDER BY ID DESC ");
	$table .= "
		<table class='table table-bordered table-responsive' style='margin-bottom: 5px;'>
		<tr>
			<th>S/N</th>
			<th>Client</th>
			<th>Number</th>
			<th>Advert</th>
			<th>Amount</th>
			<th>Paid</th>
			<th>Balance</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Slots</th>
			<th>Days</th>
			<th>Reg By</th>
			<th>Remark</th>
		</tr>
	";

	while ($rows = $result->fetch_array(MYSQLI_NUM)){
		$sn = $rows[0];
		$Cname = $rows[1];
		$Cnum = $rows[2];
		$Aditem = $rows[3];
		$Amnt = $rows[4];
		$paid = $rows[5];
		$Balance = $rows[6];
		$startdate = $rows[7];
		$enddate = $rows[8];
		$slots = $rows[9];
		$days = $rows[10];
		$remark = $rows[11];
		$regby = $rows[12];
		
		$table .= "<tr>
				<td>$sn</td>
				<td>$Cname</td>
				<td>$Cnum</td>
				<td>$Aditem</td>
				<td>$Amnt</td>
				<td>$paid</td>
				<td>$Balance</td>
				<td>$startdate</td>
				<td>$enddate</td>
				<td>$slots</td>
				<td>$days</td>
				<td>$regby</td>
				<td>$remark</td>
				</tr>";
	}
			
		$table .= "
			</table>
			</section>
			<div style='height:10px;'></div>
		</body>
		</html>
		";
		echo $table;
		$vfms_con->close();
	}
	else {
		echo "Access Denied!";
	}
?>