<?php
    session_start();
    if (isset($_POST['soundtrack'])) {
		require_once 'virtualdj/getfile.php';
		$gfile = new getfile();
		$gfile->getSoundtrackLog();
	}