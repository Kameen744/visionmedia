<?php
session_start();
require_once 'config/database.php';
$db = new Database();
	if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
		$adid = $_SESSION['advert_ID'];
	}
	if (isset($_POST['MonDate'])) {
		if (!empty($_POST['MonDate'])) {
			$mdate = $_POST['MonDate'];
			$mtime = $_POST['MonTime'];
			$rept = $_POST['SlRepeat'];
			SetSlotDateTime ($mdate, $mtime, $rept);
		}
	} elseif ((isset($_POST['rptDate']))) {
		$mdate = $_POST['rptDate'];
		$mtime = $_POST['rptTime'];
		$rept = $_POST['rptRpt'];
		SetSlotDateTime ($mdate, $mtime, $rept);
	}

	function SetSlotDateTime ($ddte, $mtime, $rept) {
		global $db, $stID, $adid;
		
			// require "con_Vfm.php";
			
			$gtdqr = $db->getRow("SELECT Advert_Name 
			FROM register_advert WHERE Advert_ID = ? 
			AND Station_ID = ?", [$adid, $stID]);

			$adname = $gtdqr['Advert_Name'];

			$nnw = $db->rtnDate(); 
			$mdate = $db->rtnDate($ddte);

			$dte = new DateTime($mdate, new DateTimeZone('Africa/Lagos'));
			$tpmon = $dte->format('D');

			if(empty($rept)) {
				$rept = 1;
			}
			
		if ($mtime !== "") {
			if ($mdate >= $nnw){
			 	$checkrquery = $db->getRow("SELECT `Advert_ID` FROM `ended_adverts` 
				 WHERE `Date_Played` = ?  AND `Time_Played` = ? AND `Station_ID` = ?", 
				 [$mdate, $mtime, $stID]);

				if (empty($checkrquery['Advert_ID'])) {
					$insSlot = '';
					$insdate = new DateTime($ddte, new DateTimeZone('Africa/Lagos'));
					
					$numSlots = $db->getRow('SELECT `Slot` FROM 
					`register_advert` WHERE `Advert_ID` = ?', [$adid]);
	
					$regSlots = $db->getRow('SELECT COUNT(*) AS regSlots FROM 
					`ended_adverts` WHERE `Advert_ID` = ?', [$adid]);

					$remainSlots = $numSlots['Slot'] - $regSlots['regSlots'];
					if ($remainSlots >= $rept){
						for ($i=0; $i < $rept; $i++) { 
							$insdateToDb = $insdate->format('Y-m-d');
	
							$insSlot = $db->insertRow('INSERT INTO `ended_adverts` ( 
							`Advert_ID`, `Advert_Name`, `Date_Played`, `Time_Played`, 
							`Station_ID`) VALUES (?,?,?,?,?)', [$adid, $adname, 
							$insdateToDb, $mtime, $stID]);
	
							$moninterval = new DateInterval('P1W');
							$insdate = $insdate->add($moninterval);
						}
						if (!empty($insSlot)) {
							$remSlots = $remainSlots - $rept;
							$cout = "<p class='label-danger' value='$mtime' style='padding: 2px; border-top: 3px solid white;'> $mdate | $rept Wks | $mtime </p>";
							$resarr = array('resday' => $tpmon, 'rescont' => $cout, 'remSlots' => $remSlots);
							
							echo json_encode($resarr);
	   
							}else{
								$resarr = array('resday' => 'Error', 'rescont' => 'Error! unable to update time' );
								echo json_encode($resarr);
							}
					} else {
						$resarr = array('resday' => 'Error', 'rescont' => 'Exceeds remaining slots' );
						echo json_encode($resarr);
					}
					

				}else {
					$resarr = array('resday' => 'Error', 'rescont' => 'Time Booked');
			 			echo json_encode($resarr);	
				}
			 	
		}else{
			$resarr = array('resday' => 'Error', 'rescont' => 'Error: Past date');
			echo json_encode($resarr);	
		}
		}else{
			$resarr = array('resday' => 'Error', 'rescont' => 'Error: Empty date');
			echo json_encode($resarr);	
		}
}

if(isset($_POST['checkAvailDate'])) {
	$ctime = $_POST['checkAvailsByTime'];
	$cdate = $_POST['checkAvailDate'];

	$table = "<table class='table table-bordered table-responsive' style='color:white;'>
	<tr><th>Programs/Adverts</th><th>Time</th></tr>";

	$checkrquery = $db->getRows("SELECT * FROM `ended_adverts` WHERE 
	`Date_Played` = ? AND Station_ID = ? ", [$cdate, $stID]);

	foreach ($checkrquery as $val) {
		$table .= "<tr><td>" .$val['Advert_Name'] ."</td><td>" .$val['Time_Played'] ."</td></tr>";
	}
	echo $table .'</table>';
};