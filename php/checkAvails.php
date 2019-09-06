<?php
	session_start();

	if(isset($_POST['ChekDay'])){
		$day = $_POST['ChekDay'];

		function CheckAvails ($ptable, $mmtime, $mmtable) {

			if (isset($_SESSION['vuserp'])) {
				$stID = $_SESSION['Station_ID_No'];
			}

			elseif (isset($_SESSION['vadminp'])) {
				$stID = $_POST['scstID'];
			}
			
			$time = $_POST['ChekTime'];
			
			require "con_Vfm.php";
			$checkrquery = $vfms_con->query("SELECT Advert_Name, $mmtime FROM $mmtable WHERE $mmtime LIKE '$time%' AND Station_ID = '$stID' ");
			while ($row = $checkrquery->fetch_array(MYSQLI_NUM)) {
				$table .= "<tr><td>" .$row[0] ."</td><td>" .$row[1] ."</td></tr>";
			}

			$checkrquery = $vfms_con->query("SELECT P_Name, T_From, T_To FROM $ptable WHERE T_From LIKE '$time%' AND Station_ID = '$stID' ");
			while ($row = $checkrquery->fetch_array(MYSQLI_NUM)) {
				$table .= "<tr><td>" .$row[0] ."</td><td>" .$row[1] ." - " .$row[2] ."</td></tr>";
			}
			echo $table;
		}

		switch ($day) {
			case 'Monday':
				CheckAvails('p_mon', 'M_Time', 't_monday');
				break;
			case 'Tuesday':
				CheckAvails('p_tue', 'T_Time', 't_tuesday');
				break;
			case 'Wednesday':
				CheckAvails('p_wed', 'W_Time', 't_wednesday');
				break;
			case 'Thursday':
				CheckAvails('p_thu', 'T_Time', 't_thursday');
				break;
			case 'Friday':
				CheckAvails('p_fri', 'F_Time', 't_friday');
				break;
			case 'Saturday':
				CheckAvails('p_sat', 'S_Time', 't_saturday');
				break;
			case 'Sunday':
				CheckAvails('p_sun', 'S_Time', 't_sunday');
				break;
			
			default:
	
				break;
		}

	}
?>