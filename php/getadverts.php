<?php
session_start();
if (isset($_REQUEST['getAdverts'])) {	
	function getAdvertsTime ($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate) {
		require "con_Vfm.php";
		$table = "<button value='$gtdate' class='btn btn-danger btn-xs' id='PrintGetAdverts'><span class='glyphicon glyphicon-print'></span> Print</button>
			</div class='table-responsive'>
		 	<table class='table table-bordered' style='color:white; font-weight:bold;' id='advtable'>
			<thead>
			<tr>
				<th>S/N</th><th style=''>Advert</th> <th>Time To Play</th> <th>Signature</th>
			</tr>";

		$monqur = $vfms_con->query("SELECT Advert_Name, Advert_ID, $mdate, $mtime, Re_peat FROM $t_mon WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
		if ($monqur->num_rows > 0) {
			$countr = 0;
		while ($monres = $monqur->fetch_array(MYSQLI_NUM)) {
			
			$monadv = $monres[0];
			$monid = $monres[1];
			$mondate = $monres[2];
			$montme = $monres[3];
			$monrept = $monres[4];
			$countr ++;

			$monqr = $vfms_con->query("INSERT INTO ended_adverts (Advert_ID, Advert_Name, Date_Played, Time_Played, Station_ID) VALUES ('$monid', '$monadv', '$mondate', '$montme', '$stID')");
			if ($monqr) {

				if ($monrept <= 1) {
				$monupqr = $vfms_con->query("UPDATE $t_mon SET Advert_Name = NULL, Advert_ID = NULL, $mdate = NULL, $mtime = NULL, Re_peat = 0, End_Date = NULL WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
				}
				elseif ($monrept > 1) {
				$monreptmns = $monrept - 1;
				$monupsecqr = $vfms_con->query("UPDATE $t_mon SET $mdate = '$monnexdate', Re_peat = '$monreptmns' WHERE $mdate = '$gtdate' AND Station_ID = '$stID' ");
				}

				$table .= "<tr><td>$countr</td><td>$monadv</td> <td>$montme</td> <td></td></tr>";
			}
		
		}

		}
			$table .= "</table>";
			echo $table;
			$vfms_con->close();
	}
		$gtdate = $_REQUEST['getAdverts'];
		date_default_timezone_set('Africa/Lagos');
		$monupdate = new DateTime($gtdate);
		$moninterval = new DateInterval('P1W');
		$monnext_week = $monupdate->add($moninterval);
		$monnexdate = $monnext_week->format('Y-m-d');
		$tddy = $monupdate->format('D');
		$stID = "";
		if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No']; 
		}
		elseif (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
		}

		switch ($tddy) {
			case 'Mon':
				$t_mon = "t_monday";
				$mdate = "M_Date";
				$mtime = "M_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Tue':
				$t_mon = "t_tuesday";
				$mdate = "T_Date";
				$mtime = "T_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Wed':
				$t_mon = "t_wednesday";
				$mdate = "W_Date";
				$mtime = "W_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Thu':
				$t_mon = "t_thursday";
				$mdate = "T_Date";
				$mtime = "T_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Fri':
				$t_mon = "t_friday";
				$mdate = "F_Date";
				$mtime = "F_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Sat':
				$t_mon = "t_saturday";
				$mdate = "S_Date";
				$mtime = "S_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			case 'Sun':
				$t_mon = "t_sunday";
				$mdate = "S_Date";
				$mtime = "S_Time";
				getAdvertsTime($t_mon, $mdate, $mtime, $stID, $gtdate, $monnexdate);
				break;
			
			default:

				break;
		}

		
	}

?>