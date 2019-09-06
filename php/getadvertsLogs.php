<?php 
session_start();

	if(isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	elseif (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
if (isset($_POST['LogRprt'])) {
	
}
	require "con_Vfm.php";
?>