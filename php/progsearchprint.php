<?php
session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	
	if (isset($_POST['SearchBy']) | isset($_POST['SearchText']) ) {
       
       
		
        $searchby = $_POST['SearchBy'];
        $searchtext = $_POST['SearchText'];
        $reporttitle = $searchtext;
        require 'reportheader.php';
		$count = 1;
        $tablehead = "
		<table class='table table-bordered table-responsive'><tr>
			<th>S/N</th>
            <th>Program</th>
            <th>Duration</th>
			<th>From</th>
			<th>To</th>
		</tr>";

		if ($searchby == 'Name') {
			function searchByName ($ddtable) {
				require "con_Vfm.php";
				global $table, $tablehead, $searchtext, $stID, $count;
				$gpro = $vfms_con->query("SELECT P_Name, Duration, T_From, T_To  
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
                $table .= "<tr></tr><h4 class='text-center' style='margin-bottom:1px;'>$ccdday</h4>";
                $table .= $tablehead;
				while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
					$table .=  "<tr><td>" .$count ."</td><td>" 
					.$row[0] ."</td><td>" .$row[1] ."</td><td>dgdsgds" .$row[2] 
					."</td><td>" .$row[3] ."</td></tr>";
					$count ++;
                }
                $table .= "</table>";
			}

			$ddays = ["p_mon", "p_tue", "p_wed", "p_thu", "p_fri", "p_sat", "p_sun"];
			foreach ($ddays as $day) {
				searchByName ($day);
			}
		
		echo $table;
		}

		elseif ($searchby == "Day") {
			function searchByDay ($ddtable, $ccdday) {
				require "con_Vfm.php";
				global $table, $tablehead, $searchtext, $stID, $count;
				$gpro = $vfms_con->query("SELECT P_Name, Duration, T_From, T_To  
                 FROM $ddtable WHERE Station_ID = '$stID' ");
                $table .= $tablehead;
				while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
					$table .=  "<tr><td>" .$count ."</td><td>" 
					.$row[0] ."</td><td>" .$row[1] ."</td><td>" .$row[2] 
					."</td><td>" .$row[3] ."</td></tr>";
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