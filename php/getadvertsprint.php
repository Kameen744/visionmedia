<?php
session_start();
require_once "con_Vfm.php";
require_once 'config/database.php';
if (isset($_REQUEST['AddID'])) {
	$db = new Database();
	// function getAdvertsTime ($t_mon, $mdate, $mtime, $stID, $gtdate, 
	// $monnexdate, $stLocation, $stAddress, $stContact) {
		// require "con_Vfm.php";
	if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No']; 
	}
	elseif (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	$getadd = $vfms_con->query("SELECT S_Location, S_Address, S_Contact FROM stations WHERE Station_ID = '$stID' ");
	$grow = $getadd->fetch_array(MYSQLI_NUM);
	$stLocation = $grow[0]; $stAddress = $grow[1]; $stContact = $grow[2];
		$gtdate = $_REQUEST['AddID'];
		$table = "
					<!DOCTYPE html>
					<html lang='en'>
					<head>
					  <meta charset='utf-8'>
					  <title>$gtdate Adverts Schedule</title>
					  <link rel='stylesheet' href='../css/bootstrap.css'>
					  <link rel='stylesheet' href='../css/paperstyle.css'>
					</head>
					<body class='A4'>
					<section class='sheet padding-10mm'>
					<header class='clearfix' style='margin-top:0px;'>
					  <div id='logo'>
					    <img src='../images/Vlogo.png'>
					  </div>
					  <h1>ADVERTS SCHEDULE ON $gtdate</h1>
					  <div id='company' class='clearfix'>
					    
					  </div>
					  <div id='project'>
					    <div><span>COMPANY:</span>Vision FM $stLocation</div>
		    			<div><span>ADDRESS:</span> $stAddress.</div>
		    			<div><span>DATE:</span>$gtdate</div>
					  </div>
					</header>
					<hr>
				";
			$table .= "
			  <table class='table'>
				<thead>
				<tr>
					<th>S/N</th><th>Advert</th> <th>Time To Play</th> <th>Signature</th><th>Comment</th>
				<tr>";
// check adverts that ends today
		date_default_timezone_set('Africa/Lagos');
		$dateToday = new DateTime();
		$nowDate = $dateToday->format("Y-m-d");
// 		$varEnddate = $vfms_con->query("SELECT Advert_ID, End_Date FROM `register_advert` 
// 		WHERE End_Date < '$nowDate' AND Station_ID = '$stID' ");
// 		while($var = $varEnddate->fetch_array(MYSQLI_NUM)) {
// 			$delAddId = $var[0];
// 			$vfms_con->query("DELETE FROM $t_mon WHERE Advert_ID = '$delAddId' AND Station_ID = '$stID' ");
// 			$vfms_con->query("DELETE FROM `ended_adverts` WHERE Advert_ID = '$delAddId' AND Station_ID = '$stID'");
// 		}
// // end of check




// //adverts that should be played today
// 		$monqur = $vfms_con->query("SELECT Advert_Name, Advert_ID, $mdate, $mtime, 
// 		Re_peat FROM $t_mon WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
// 		$countr = 0;
		// if ($monqur->num_rows > 0) {
		// while ($monres = $monqur->fetch_array(MYSQLI_NUM)) {
		// 	$monadv = $monres[0];
		// 	$monid = $monres[1];
		// 	$mondate = $monres[2];
		// 	$montme = $monres[3];
		// 	$monrept = $monres[4];
			
		// 		if ($monrept < 1) {
		// 		$monupqr = $vfms_con->query("UPDATE $t_mon SET $mdate = 'Finished' 
		// 		WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
		// 		}
		// 		elseif ($monrept >= 1) {
		// 		$monreptmns = $monrept - 1;
		// 		$monupsecqr = $vfms_con->query("UPDATE $t_mon SET $mdate = '$monnexdate', 
		// 		Re_peat = '$monreptmns' WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
		// 		}
		// 	$chekendquer = $vfms_con->query("SELECT Advert_Name FROM ended_adverts 
		// 	WHERE Date_Played = '$mondate' AND Time_Played = '$montme' AND Station_ID = '$stID' ");

		// 	if ($chekendquer->num_rows == 0) {
		// 		$monqr = $vfms_con->query("INSERT INTO ended_adverts (Advert_ID, Advert_Name, 
		// 		Date_Played, Time_Played, Station_ID) VALUES ('$monid', '$monadv', '$mondate', '$montme', '$stID')");
		// 	}
		// 		//$table .= "<tr><td>$countr</td><td>$monadv</td><td>$montme</td><td></td></tr>";
		// 	}
		// }

		$setNo = $vfms_con->query("SET @No:=0");
		$monqur = $vfms_con->query("SELECT @No:=@No+1 No, Advert_Name, Time_Played 
					FROM ended_adverts WHERE Date_Played = '$gtdate' 
					AND Station_ID = '$stID' AND Active_State = 1 ORDER BY SUBSTRING(Time_Played, -2) ASC, Time_Played ASC");

			$rownum = $monqur->num_rows;
		
			
			$tablePm = "";
			
			while ($monres = $monqur->fetch_array(MYSQLI_NUM)) {
				$No = $monres[0];
				$monadv = $monres[1];
				
				$dtfor = $monres[2];
				
				$tablePm .= "<tr><td style='text-align:left'>$No</td><td style='text-align:left'>$monadv</td> <td style='text-align:left'>$dtfor</td> <td></td><td></td></tr>";
			}

		$table .= $tablePm ."
			</table>
			</section>
		</body>
		</html>
		";
		echo $table;

		// }
	// function getAdvertsTime($t_mon, $m_date, $m_time, $ddte, $stID) {
	// 	global $db;

	// 	$getym = $db->getRows("SELECT Advert_Name, Advert_ID, $m_date, $m_time, Re_peat 
	// 	FROM $t_mon WHERE $m_date >= ? AND Station_ID = ? ", [$ddte, $stID]);

	// 	foreach ($getym as $value) {
	// 		$rept = $value['Re_peat'];
	// 		$mdate = $value[$m_date];
	// 		$adid = $value['Advert_ID'];
	// 		$adname = $value['Advert_Name'];
	// 		$mtime = $value[$m_time];
	// 		if($rept >= 1 & $mdate != 'Finished') {
	// 			$insdate = new DateTime($mdate, new DateTimeZone('Africa/Lagos'));
	// 			for ($i=0; $i < $rept; $i++) { 
	// 				$insdateToDb = $insdate->format('Y-m-d');
					
	// 				$check = $db->getRow('SELECT `ID`, `Advert_ID`, `Advert_Name`, 
	// 				`Date_Played`, `Time_Played`, `Station_ID` FROM `ended_adverts`
	// 				WHERE `Advert_ID` = ? AND `Date_Played` = ? AND `Time_Played` = ?', 
	// 				[$adid, $mdate, $mtime]);

	// 				if (empty($check)) {
						
	// 				$insSlot = $db->insertRow('INSERT INTO `ended_adverts` ( 
	// 				`Advert_ID`, `Advert_Name`, `Date_Played`, `Time_Played`, 
	// 				`Station_ID`) VALUES (?,?,?,?,?)', [$adid, $adname, 
	// 				$insdateToDb, $mtime, $stID]);
	// 				}


	// 				$moninterval = new DateInterval('P1W');
	// 				$insdate = $insdate->add($moninterval);
	// 			}
	// 		}
	// 	}
	// }

	// getAdvertsTime("t_monday", "M_Date", "M_Time", $nowDate, $stID);
	// getAdvertsTime("t_tuesday", "T_Date", "T_Time", $nowDate, $stID);
	// getAdvertsTime("t_wednesday", "W_Date", "W_Time", $nowDate, $stID);
	// getAdvertsTime("t_thursday", "T_Date", "T_Time", $nowDate, $stID);
	// getAdvertsTime("t_friday", "F_Date", "F_Time", $nowDate, $stID);
	// getAdvertsTime("t_saturday", "S_Date", "S_Time", $nowDate, $stID);
	// getAdvertsTime("t_sunday", "S_Date", "S_Time", $nowDate, $stID);

	// if (isset($_SESSION['vuserp'])) {
	// 	$stID = $_SESSION['Station_ID_No']; 
	// }
	// elseif (isset($_SESSION['vadminp'])) {
	// $stID = $_POST['scstID'];
	// }
	// $getadd = $vfms_con->query("SELECT S_Location, S_Address, S_Contact FROM stations WHERE Station_ID = '$stID' ");
	// $grow = $getadd->fetch_array(MYSQLI_NUM);
	// $stLocation = $grow[0]; $stAddress = $grow[1]; $stContact = $grow[2];
	// $gtdate = $_REQUEST['AddID'];
	// 	date_default_timezone_set('Africa/Lagos');
	// 	$monupdate = new DateTime($gtdate);
	// 	$moninterval = new DateInterval('P1W');
	// 	$monnext_week = $monupdate->add($moninterval);
	// 	$monnexdate = $monnext_week->format('Y-m-d');
	// 	$tddy = $monupdate->format('D');
	// 	switch ($tddy) {
	// 		case 'Mon':
	// 			getAdvertsTime("t_monday", "M_Date", "M_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Tue':
	// 			getAdvertsTime("t_tuesday", "T_Date", "T_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Wed':
	// 			getAdvertsTime("t_wednesday", "W_Date", "W_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Thu':
	// 			getAdvertsTime("t_thursday", "T_Date", "T_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Fri':
	// 			getAdvertsTime("t_friday", "F_Date", "F_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Sat':
	// 			getAdvertsTime("t_saturday", "S_Date", "S_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		case 'Sun':
	// 			getAdvertsTime("t_sunday", "S_Date", "S_Time", $stID, $gtdate, $monnexdate, $stLocation, $stAddress, $stContact);
	// 			break;
	// 		default:

	// 			break;
	// 	}
}
?>