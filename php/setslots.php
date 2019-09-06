<?php
require_once 'config/database.php';	
if (isset($_POST['AddID'])) {
	$db = new Database();
	$ID = $_POST['AddID'];
	$numSlots = $db->getRow('SELECT `Slot` FROM `register_advert` WHERE `Advert_ID` = ?', [$ID]);
	
	$regSlots = $db->getRow('SELECT COUNT(*) AS regSlots FROM `ended_adverts` WHERE `Advert_ID` = ?', [$ID]);

	echo $numSlots['Slot'] - $regSlots['regSlots'];
}