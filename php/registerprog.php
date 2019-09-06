<?php
	session_start();
	if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	
	if (isset($_POST['prog'])) {
		$result = "Error! Fail to save record";
		$prog = $_POST['prog'];
		$produc = $_POST['produc'];
		$nopr = $_POST['nopr'];
		$prsnt = ""; 
		
		if ($nopr == 1) {
			$prsnt .= $_POST['pr1'];	
		}
		elseif ($nopr == 2) {
			$prsnt .= $_POST['pr1'] ." " .$_POST['pr2'];		
		}
		elseif ($nopr == 3) {
			$prsnt .= $_POST['pr1'] ." " .$_POST['pr2'] ." " .$pr3 = $_POST['pr3'];
		}
		
		$frm = $_POST['frm'];
		$tto = $_POST['tto'];

			$To = strtotime("2017-12-28 " .$_POST['tto']);
			$From = strtotime("2017-12-28 " .$_POST['frm']);

		 $dur =  ($To - $From) / 60 ." Min";
		 
		
		if (empty($prog) | empty($stID) | empty($nopr) | empty($frm) | empty($tto)){
			echo "<span class='label label-danger'>
				Error: Make sure all fields are not empty. 
			 	And you have permission to add program.
			 </span>";
		}
		else{
			function regProg ($day) {
				require "con_Vfm.php";
				global $prog, $dur, $produc, $prsnt, $frm, $tto, $stID, $result;

				$prquer = $vfms_con->query("INSERT INTO $day (P_Name, 
				Duration, Producer, Presenters, 
				T_From, T_To, Station_ID) VALUES 
				('$prog', '$dur', '$produc', '$prsnt', 
				'$frm', '$tto', '$stID')");
				if ($prquer) { 
					$result = "Successefully Saved";
				}
			}

			if (!empty($_POST['Daily'])) {
				$ddays = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
				foreach ($ddays as $dd) {
					regProg($dd);
				}
			} else {
				if (!empty($_POST['Mon'])) {
					regProg('p_mon');
				}
				if (!empty($_POST['Tue'])) {
					regProg('p_tue');
				}
				if (!empty($_POST['Wed'])) {
					regProg('p_wed');
				}
				if (!empty($_POST['Thu'])) {
					regProg('p_thu');
				}
				if (!empty($_POST['Fri'])) {
					regProg('p_fri');
				}
				if (!empty($_POST['Sat'])) {
					regProg('p_sat');
				}
				if (!empty($_POST['Sun'])) {
					regProg('p_sun');
				}
			}
			
			echo "<span class='label label-danger'>$result<span>";
		}
		
	}
?>