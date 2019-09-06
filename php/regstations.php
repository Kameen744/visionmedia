<?php
	session_start();
	
	if (isset($_SESSION['vadminp'])) {
		require_once 'config/database.php';
		$db = new Database();

	if (isset($_POST['station'])) {
		$station = $db->validate($_POST['station']);
		$location = $db->validate($_POST['location']);
		$address = $db->validate($_POST['address']);
		$cnumber = $db->validate($_POST['cnumber']);

		$vtx = substr($station, 0, 1);
		$std = substr($location, 0, 3); 
		$stdid = $vtx .strtoupper($std) .rand(10, 99) .rand(10, 99);

		$stquer = $db->insertRow("INSERT INTO `stations` 
		(`Station_ID`, `S_Name`, `S_Location`, `S_Address`, `S_Contact`) VALUES (?,?,?,?,?)", 
		[$stdid, $station, $location, $address, $cnumber]);
		
		if ($stquer) {
			echo "<span class='alert alert-success'> Station saved with an id: " .$stdid ."</sapn>";
		} else {
			echo "<span class='alert alert-danger'> Error While Saving: " .$stdid ."</sapn>";
		}
	}

	if (isset($_POST['StLocation'])) {
		$StLocation = $db->validate($_POST['StLocation']);
		$VUserName = $db->validate($_POST['VUserName']);
		$VPassword = $db->validate($_POST['VPassword']);
		$VStatus = $db->validate($_POST['VStatus']);

		$stLocate = substr($StLocation, +8);
		$stIDD = substr($StLocation, 0, 8);

		$stquer = $db->insertRow("INSERT INTO `vsn_users` (`V_S_Location`, 
			`V_User_Name`, `V_User_Password`, `V_Status`, `Station_ID`) 
			VALUES (?,?,?,?,?)", [$stLocate, $VUserName, $VPassword, $VStatus, $stIDD]);
		if ($stquer) {
			echo "<span class='alert alert-success'> User saved " .$VUserName ."</sapn>";
		} else {
			echo "<span class='alert alert-danger'> Error While Saving</sapn>";
		}
	}

	}
	else {
		echo "Error! Unknown Session";
	}

	if (isset($_POST['SlLocation'])) {
		$tag = "";
		$stations = $db->getRows("SELECT S_Name, S_Location, Station_ID FROM stations");
		foreach ( $stations as $station ) {
			$snam = $station['S_Name'];
			$resl = $station['S_Location'];
			$sid = $station['Station_ID'];
			$tag .= "<option value='$sid $resl'>$snam $resl</option>";
		}
		echo "<option value=''>Station/Location</option>" .$tag;
	}

?>