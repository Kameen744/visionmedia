<?php
session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	
	if (isset($_POST['dattyp'])) {
		
		$searchby = $_POST['dattyp'];
		$searchtext = $_POST['Srprog'];
		$count = 1;
		$table = "

		<div class='col-xs-12' style='margin-bottom:5px;'>
		<input type='hidden' value='$searchby' id='SearchBy'>
		<input type='hidden' value='$searchtext' id='SearchText'>
 		<button value='$searchtext' class='btn btn-danger btn-xs' id='ProgSearchPrint'>Print</button>
		</div>
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

		if ($searchby == 'Name') {
			function searchByName ($ddtable) {
				require "con_Vfm.php";
				global $table, $searchtext, $stID, $count;
				$gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, Duration, T_From, T_To  
				 FROM $ddtable WHERE P_Name LIKE '$searchtext%' AND Station_ID = '$stID' ");
				$ccdday = "";
				switch ($ddtable) {
					case "p_mon":
					$ccdday = "Monday";
					break;
					case "p_tue":
					$ccdday = "Tuesday";
					break;
					case "p_wed":
					$ccdday = "Wednesday";
					break;
					case "p_thu":
					$ccdday = "Thursday";
					break;
					case "p_fri":
					$ccdday = "Friday";
					break;
					case "p_sat":
					$ccdday = "Saturday";
					break;
					case "p_sun":
					$ccdday = "Sunday";
					break;
				}
				while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
					$table .=  "<tr><td>" .$count ."</td><td>$ccdday</td><td>" 
					.$row[0] ."</td><td>" .$row[1] ."</td><td>" .$row[2] 
					."</td><td>" .$row[3] ."</td><td>" .$row[4] ."</td><td>" 
					.$row[5] ."</td></tr>";
					$count ++;
				}
			}

			$ddays = ["p_mon", "p_tue", "p_wed", "p_thu", "p_fri", "p_sat", "p_sun"];
			foreach ($ddays as $day) {
				searchByName ($day);
			}
		$table .= "</table>";
		echo $table;
		}


		elseif ($searchby == "Day") {
			function searchByDay ($ddtable, $ccdday) {
				require "con_Vfm.php";
				global $table, $searchtext, $stID, $count;
				$gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, Duration, T_From, T_To  
				 FROM $ddtable WHERE Station_ID = '$stID' ");
				while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
					$table .=  "<tr><td>" .$count ."</td><td>$ccdday</td><td>" 
					.$row[0] ."</td><td>" .$row[1] ."</td><td>" .$row[2] 
					."</td><td>" .$row[3] ."</td><td>" .$row[4] ."</td><td>" 
					.$row[5] ."</td><td>
					<a class='btn btn-primary btn-xs'>Edit</a>
					<a class='btn btn-danger btn-xs'>Delete</a>
					</td></tr>";
					$count ++;
				}
				$table .= "</table>";
			echo $table;
			}

		switch ($searchtext) {
			case "Monday":
				searchByDay ("p_mon", "Monday");
				break;

			case "Tuesday":
				searchByDay ("p_tue", "Tuesday");
				break;

			case "Wednesday":
				searchByDay ("p_wed", "Wednesday");
				break;

			case "Thursday":
				searchByDay ("p_thu", "Thursday");
				break;

			case "Friday":
				searchByDay ("p_fri", "Friday");
				break;
			
			case "Saturday":
				searchByDay ("p_sat", "Saturday");
				break;

			case "Sunday":
				searchByDay ("p_sun", "Sunday");
				break;
			
			}
		}
	}
?>