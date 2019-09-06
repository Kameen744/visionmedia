<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }
    $reporttitle = "All Programs Schedule";
    require 'reportheader.php';
	$tablehead = "
	<table class='table table-bordered table-responsive'><tr>
			<th>S/N</th>
			<th>Program</th>
			<th>Duration</th>
			<th>From</th>
			<th>To</th>
		</tr>";
		$count = 1;
		function progschedule ($dttable) {
		require "con_Vfm.php";
		global $table, $stID, $count, $tablehead;
		$gpro = $vfms_con->query("SELECT P_Name, Duration, 
		T_From, T_To FROM $dttable WHERE Station_ID = '$stID' ORDER BY T_From ASC");
		$day = "";
		switch ($dttable) {
			case "p_mon":
			$day = "Monday";
			break;
			case "p_tue":
			$day = "Tuesday";
			break;
			case "p_wed":
			$day = "Wednesday";
			break;
			case "p_thu":
			$day = "Thursday";
			break;
			case "p_fri":
			$day = "Friday";
			break;
			case "p_sat":
			$day = "Saturday";
			break;
			case "p_sun":
			$day = "Sunday";
			break;
        }
        $table .= "<tr></tr><h4 class='text-center' style='margin-bottom:1px;'>$day</h4>";
		$table .= $tablehead;
		
		$am = '';
		$pm = '';
		while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
			$subAmPm = substr($row[2], -2);
			if ($subAmPm == 'AM') {
				$am .= "<tr><td>" .$count ."</td><td>"
			 .$row[0] ."</td><td>" 
			 .$row[1] ."</td><td>" .$row[2] ."</td><td>" 
			 .$row[3] ."</td></tr>";
			} else {
				$pm .= "<tr><td>" .$count ."</td><td>"
			 .$row[0] ."</td><td>" 
			 .$row[1] ."</td><td>" .$row[2] ."</td><td>" 
			 .$row[3] ."</td></tr>";
			}
			
			$count ++;
            }
            $table .= $am .$pm ."</table>";
		}
       
		$daysarr = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
		foreach ($daysarr as $dd) {
			progschedule ($dd);
		}
		
		$table .= "</body></html>";
		echo $table;
?>