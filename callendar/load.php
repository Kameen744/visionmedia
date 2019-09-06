<?php 

require_once '../php/config/database.php';
$db = new Database();

$data = [];

$events = $db->getRows('SELECT * FROM `events` ORDER BY `ID` ASC ');

echo json_encode($events);

