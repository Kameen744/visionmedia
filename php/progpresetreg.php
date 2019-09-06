<?php
	session_start();
	if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];

		if (isset($_POST['programName'])) {
			if (!empty($_POST['programName']) & !empty($_POST['progType']) & !empty($_POST['presDate']) & !empty($_POST['presDate']) ) {
				require "con_Vfm.php";
				$programName = mysqli_real_escape_string($vfms_con, $_POST['programName']);
				$programTopic = mysqli_real_escape_string($vfms_con, $_POST['programTopicName']);
				$progType = mysqli_real_escape_string($vfms_con, $_POST['progType']);
				$presDate = mysqli_real_escape_string($vfms_con, $_POST['presDate']);
				$presTime = mysqli_real_escape_string($vfms_con, $_POST['presTime']);
				$noofguest = mysqli_real_escape_string($vfms_con, $_POST['noofguest']);
				$gues_1 = mysqli_real_escape_string($vfms_con, $_POST['gues_1']);
				$gues_1_num = mysqli_real_escape_string($vfms_con, $_POST['gues_1_num']);
				$gues_2 = mysqli_real_escape_string($vfms_con, $_POST['gues_2']);
				$gues_2_num = mysqli_real_escape_string($vfms_con, $_POST['gues_2_num']);
				$gues_3 = mysqli_real_escape_string($vfms_con, $_POST['gues_3']);
				$gues_3_num = mysqli_real_escape_string($vfms_con, $_POST['gues_3_num']);
				$gues_4 = mysqli_real_escape_string($vfms_con, $_POST['gues_4']);
				$gues_4_num = mysqli_real_escape_string($vfms_con, $_POST['gues_4_num']);
				$gues_5 = mysqli_real_escape_string($vfms_con, $_POST['gues_5']);
				$gues_5_num = mysqli_real_escape_string($vfms_con, $_POST['gues_5_num']);
				$gues_6 = mysqli_real_escape_string($vfms_con, $_POST['gues_6']);
				$gues_6_num = mysqli_real_escape_string($vfms_con, $_POST['gues_6_num']);

				$programName .= '<li>' .$programTopic .'</li>';

				$prequer = $vfms_con->query("INSERT INTO `presentation`(`Prog_Name`, `Prog_Type`, 
				`Guest_one`, `Guest_one_num`, `Guest_two`, `Guest_two_num`, 
				`Guest_three`, `Guest_three_num`, `Guest_four`, `Guest_four_num`, 
				`Guest_five`, `Guest_five_num`, `Guest_six`, `Guest_six_num`, `Prog_Date`, 
				`Prog_Time`, `Station_ID`) 
				VALUES ('$programName', '$progType', '$gues_1', '$gues_1_num', '$gues_2', 
				'$gues_2_num', '$gues_3', '$gues_3_num', '$gues_4', '$gues_4_num', '$gues_5', 
				'$gues_5_num', '$gues_6', '$gues_6_num', '$presDate', '$presTime', '$stID')");
				if ($prequer) {
					echo "Successefully Saved";
				} else {
					echo "Error! Failed to save record";
				}
			} else {
				echo "Error! Empty field detected";
			}
		} else {
			echo "Error! Program not set";
		}
	}
?>