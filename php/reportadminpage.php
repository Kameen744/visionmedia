
<?php
session_start();
require "config/database.php";

if(isset($_SESSION['vadminp'])) {
	$db = new Database();
	$stations = $db->getRows('SELECT * FROM stations');
}
$ddte = date("d/m/Y");
	$options = '';
	$tabname = 'Print Reports';
	foreach($stations as $station){
		$stn = $station['Station_ID'];
		$stnname = $station['S_Name'];
		$stnloc = $station['S_Location'];
	 $options .= '<option value="$stn">$stnname $stnloc</option>';
	}
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#">
		<select class="form-control input-sm pull-left" placeholder="Select Station" id="chooseStationRpt">
			<option value="">Station</option>
			$options
		</select>
		</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="printAllAdverts">Print All Records</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="AdvertSchedule">Adverts Schedule</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="getHistory">Monthly Report</a>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	';
	include_once 'layouts/main-card.php';
?>

