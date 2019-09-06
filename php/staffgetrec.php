<?php
	session_start();
	require "con_Vfm.php";
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

	if (isset($_POST['getStaffrec'])) {
		$getsquer = $vfms_con->query("SELECT * FROM vsn_staff WHERE Station_ID = '$stID'");
		$table = "
			<button value='' class='btn btn-danger btn-sm m-1' id='PrintAllStaffL'>
			<span class='glyphicon glyphicon-print'></span> Print</button>
			<table class='table table-bordered table-responsive'>
			<tr>
				<th>Staff ID</th><th>Name</th><th>Number</th><th>E-mail</th>
				<th>Title</th><th>Gender</th></th><th>Action</th>
			</tr>
		";
		while ($row = $getsquer->fetch_array(MYSQLI_NUM)) {
			$id = $row[1];
			$table .= "<tr><td>" 
				.$row[1] ."</td><td>" .$row[2] ."</td><td>" .$row[3] ."</td><td>" .$row[4] 
				."</td><td>" .$row[12] ."</td><td>" .$row[10] ." 
					<td id='btnaction' style='font-weight:bold; font-size:14px;'>
					<div class='btn-group'>
					<button type='button' class='btn btn-danger btn-sm dropdown-toggle' data-toggle='dropdown'>
	                    Actions
	                    <span class='caret'></span>
	                </button>
					<ul class='dropdown-menu pull-right' role='menu' style='font-weight:bold; font-size:14px;'>
	                    <li>
	                    	<button class='btn btn-success btn-sm' id='StaffPrintCV' value='$id'>Print CV</button>
						</li>
						<li>
	                    	<button class='btn btn-warning btn-sm' id='StaffPayInvoice' value='$id'>Payment</button>
	                    </li>
	                </ul>
					</div>
					</td>
				</tr>";
		}

		$table .= "</table>";
		echo $table;
	}

	if(isset($_POST['getStaffrecPrintAll'])) {
		$reporttitle = "All Staff List $stID";
		require_once "reportheader.php";
		$getsquer = $vfms_con->query("SELECT * FROM vsn_staff WHERE Station_ID = '$stID'");
		$table .= "
			<table class='table table-bordered table-responsive'>
			<tr>
				<th>Staff ID</th><th>Name</th><th>Number</th><th>E-mail</th>
				<th>Title</th><th>Gender</th></th>
			</tr>
		";
		while ($row = $getsquer->fetch_array(MYSQLI_NUM)) {
			$id = $row[1];
			$table .= "<tr><td>" 
				.$row[1] ."</td><td>" .$row[2] ."</td><td>" .$row[3] ."</td><td>" .$row[4] 
				."</td><td>" .$row[12] 
				."</td><td>" .$row[10] ."
				</tr>";
		}

		$table .= "</table>";
		echo $table;
	}
?>

<!-- <li>
	<button class='btn btn-primary btn-block btn-sm' id='StaffEditCV' value='$id'>Edit Record</button>
</li> -->