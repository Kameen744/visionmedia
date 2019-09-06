<?php

if (isset($_POST['AddID'])) {
	require "con_Vfm.php";

	$advId = $_POST['AddID'];

	
	
	if ($advId == "") {
			echo "Empty ID";
			}else{
				$dtable = "
					<!DOCTYPE html>
					<html lang='en'>
					<head>
					  <meta charset='utf-8'>
					  <title>Vision Reciept</title>
					  <link rel='stylesheet' href='../css/paper.css'>
					  <style>
					  	@page { 
					  		size: A4; 
					  	}
					  	.tbcost { float:left; width: 170px; margin-left: 2px;}
					  	#section {paddin: 0px;}
					  	#headdiv { height:60px; background:#D9534F; margin:0px; paddin: 0px; }
					  </style>
					</head>
					<body class='A4'>
					<div class='row sheet padding-10mm'>
					<div class='col-md-12' id='headdiv'>
						<h1> Vision FM Reciept </h1>
					</div>
				";
			
				$dtable .= "<table class='table table-bordered'><tr> <th>Advert ID</th> <th>Name</th> <th>Number</th> <th>Advert</th> <th>Slots</th><th>Per Slot</th> <th>Amount</th> <th>Paid</th> <th>Balance</th> <th>Reg Date</th><th>Start On</th></tr>";
				$ssqur = $vfms_con->query("SELECT  Client_Name, Client_Number, Advert_Name, Slot, Per_Slot, Amount, Paid, Balance, Reg_Date, Start_Date FROM register_advert WHERE Advert_ID = '$advId' ");
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

			$dtable .= "</table>";
			$dtable .= "<table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Mon</th><th>For</th></tr>";
			$msql = $vfms_con->query("SELECT M_Time, Re_peat FROM t_monday WHERE Advert_ID = '$advId' ");
			while ($mrow = $msql->fetch_array(MYSQLI_NUM)){
				if($mrow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$mrow[0] ."</td><td>" .$mrow[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Tue</th><th>For</th></tr>";
			$tusql = $vfms_con->query("SELECT T_Time, Re_peat FROM t_tuesday WHERE Advert_ID = '$advId' ");
			while ($turow = $tusql->fetch_array(MYSQLI_NUM)){
				if($turow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$turow[0] ."</td><td>" .$turow[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Wed</th><th>For</th></tr>";
			$wsql = $vfms_con->query("SELECT W_Time, Re_peat FROM t_wednesday WHERE Advert_ID = '$advId' ");
			while ($wrow = $wsql->fetch_array(MYSQLI_NUM)){
				if($wrow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$wrow[0] ."</td><td>" .$wrow[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Thu</th><th>For</th></tr>";
			$thsql = $vfms_con->query("SELECT T_Time, Re_peat FROM t_thursday WHERE Advert_ID = '$advId' ");
			while ($throw = $thsql->fetch_array(MYSQLI_NUM)){
				if($throw[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$throw[0] ."</td><td>" .$throw[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Fri</th><th>For</th></tr>";
			$fsql = $vfms_con->query("SELECT F_Time, Re_peat FROM t_friday WHERE Advert_ID = '$advId' ");
			while ($frow = $fsql->fetch_array(MYSQLI_NUM)){
				if($frow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$frow[0] ."</td><td>" .$frow[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Sat</th><th>For</th></tr>";
			$satsql = $vfms_con->query("SELECT S_Time, Re_peat FROM t_saturday WHERE Advert_ID = '$advId' ");
			while ($satrow = $satsql->fetch_array(MYSQLI_NUM)){
				if($satrow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$satrow[0] ."</td><td>" .$satrow[1] .$w ."</td></tr>";
			}
			$dtable .= "</table><table class='table table-bordered tbcost'>";
			$dtable .= "<tr><th>Sun</th><th>For</th></tr>";
			$sunsql = $vfms_con->query("SELECT S_Time, Re_peat FROM t_sunday WHERE Advert_ID = '$advId' ");
			while ($sunrow = $sunsql->fetch_array(MYSQLI_NUM)){
				if($sunrow[1] <= 1){
					$w = " Week";
				}else{
					$w = " Weeks";
				}
				$dtable .= "<tr><td>" .$sunrow[0] ."</td><td>" .$sunrow[1] .$w ."</td> </tr>";
			}
		}
		$dtable .= "
				</table>
				</div>
			</body>
			</html>
		";
	echo $dtable;
	}
?>