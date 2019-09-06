<?php
session_start();
require_once 'config/database.php';
$db = new Database();

if(isset($_POST['insertRegisteredAdvertsAndSchedule']))
{
    print_r($_POST['insertRegisteredAdvertsAndSchedule']);
}