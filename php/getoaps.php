<?php	
	session_start();
	require "con_Vfm.php";
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

		if (isset($_POST['getoap'])) {
			$oquer = $vfms_con->query("SELECT * FROM register_oap WHERE Station_ID = '$stID' ");
		$tbl = "<div class='col-md-4' style='margin-bottom:5px; padding:0px;'><button class='btn btn-danger btn-xs' id='PrintAllOap'><span class='glyphicon glyphicon-print'></span> Print</button></div><table class='table table-bordered' style='color:white;'>
			<tr><th>S/N</th><th>O A P ID</th><th>First Name</th><th>Last Name</th><th>Number</th><th>Station</th><th>Location</th><th>Programs</th></tr>
		";
		while ($rows = $oquer->fetch_array(MYSQLI_NUM)) {
			$tbl .= "<tr><td>" .$rows[0] ."</td><td>" .$rows[1] ."</td><td>" .$rows[2] ."</td><td>" .$rows[3] ."</td><td>" .$rows[4] ."</td><td>" .$rows[5] ."</td><td>" .$rows[6] ."</td><td>" .$rows[7] ."</td></tr>";
		}
		$tbl .= "</table>";
		echo $tbl;
		}
		
		if (isset($_POST['rptype'])) {
			$reporttitle = "O A P";
			include_once "reportheader.php";
			$oquer = $vfms_con->query("SELECT * FROM register_oap");
		$table .= "<table class='table table-bordered table-responsive'>
			<tr><th>S/N</th><th>O A P ID</th><th>First Name</th><th>Last Name</th><th>Number</th><th>Station</th><th>Location</th><th>Programs</th></tr>
		";
		while ($rows = $oquer->fetch_array(MYSQLI_NUM)) {
			$table .= "<tr><td>" .$rows[0] ."</td><td>" .$rows[1] ."</td><td>" .$rows[2] ."</td><td>" .$rows[3] ."</td><td>" .$rows[4] ."</td><td>" .$rows[5] ."</td><td>" .$rows[6] ."</td><td>" .$rows[7] ."</td></tr>";
		}
		$table .= "</table></body></html>";
		echo $table;

		}
	
?>