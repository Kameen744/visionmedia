<?php
session_start();
require_once 'config/database.php';
$db = new Database();
	if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }

if(isset($_GET['getAllRegisteredAdvertsAndSchedule']))
{
    $recs = $db->getRows('SELECT * FROM `register_advert` WHERE Station_ID = ?', [$stID]);

    print_r(json_encode($recs));
}