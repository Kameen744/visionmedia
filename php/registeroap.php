<?php  
session_start();
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
require "con_Vfm.php";	
	if (isset($_POST['ofname'])) {
		$fname = $vfms_con->real_escape_string($_POST['ofname']);
		$lname = $vfms_con->real_escape_string($_POST['oflname']);
		$number = $vfms_con->real_escape_string($_POST['ofnumber']);
		$station = $vfms_con->real_escape_string($_POST['ofstation']);
		$location = $vfms_con->real_escape_string($_POST['oflocation']);
		$programs = $vfms_con->real_escape_string($_POST['ofprograms']);

		$sbid = substr($fname, 0, 2);
		$oapid = $sbid .rand(10, 99) .rand(10, 99);
		$chquer = $vfms_con->query("SELECT P_Number FROM register_oap WHERE P_Number = '$number' AND Station_ID = '$stID' ");
		$row = $chquer->fetch_array(MYSQLI_NUM);
		if ($row[0] <= 0) {
			$opqur = $vfms_con->query("INSERT INTO register_oap (Oap_ID, First_Name, Last_Name, P_Number, Station, Location, Programs, Station_ID) VALUES ('$oapid', '$fname', '$lname', '$number', '$station', '$location', '$programs', '$stID')");
		if ($opqur) {
			echo "<span class='label label-success'>" .$oapid .": " .$fname ." " .$lname ." Successefully Saved </span>";
		} else {
			echo "<span class='label label-danger'>Error: Save Failed</span>";
		}
			
		} else {
			echo "<span class='label label-danger'>Error: Record Exist</span>";
		}
	} else{

	}
?>