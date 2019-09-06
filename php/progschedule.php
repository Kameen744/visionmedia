<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	$table = "
		<div class='col-xs-12' style='margin-bottom:5px;'><a class='btn btn-danger btn-xs' id='ProgramsSchedulePrintAll'>Print</a></div>
	<table class='table table-bordered table-responsive'><tr>
			<th>S/N</th>
			<th>Day</th>
			<th>Program</th>
			<th>Producer</th>
			<th>Presenters</th>
			<th>Duration</th>
			<th>From</th>
			<th>To</th>
		</tr>";
		$count = 1;
		function progschedule ($dttable) {
		require "con_Vfm.php";
		global $table, $stID, $count;
		$gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, Duration, 
		T_From, T_To FROM $dttable WHERE Station_ID = '$stID' ");
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
		while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
			$proName = $row[0];
			$table .= "<tr><td>" .$count ."</td><td>"
			 ."$day</td><td>" .$proName ."</td><td>" 
			 .$row[1] ."</td><td>" .$row[2] ."</td><td>" 
			 .$row[3] ."</td><td>" .$row[4] ."</td><td>" 
			 .$row[5] ."</td><td>
			 <button class='btn btn-primary btn-xs' value='$proName' id='editProgram'>Edit</button>
			 <button class='btn btn-danger btn-xs' value='$proName' id='deleteProgram'>Delete</button>
			 </td></tr>";
			$count ++;
			}
		}

		$daysarr = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
		foreach ($daysarr as $dd) {
			progschedule ($dd);
		}
		
		$table .= "</table>";
		echo $table;
	
?>