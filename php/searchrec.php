<?php
	session_start();

	if(isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	elseif (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	require "con_Vfm.php";
	if (isset($_REQUEST['SearchR'])) {
		$textosearch = $_REQUEST['SearchR'];
		$tosearch = mysqli_real_escape_string($vfms_con, $textosearch);
		if($tosearch == ""){
			echo "<div style='padding:90px; color:white;'>Type record to search</div>";
		}
		else{

			$adsql = "SELECT Advert_ID, Client_Name, Client_Type, Client_Number, Advert_Name, Advert_Type, Remarks, Reg_By, Reg_Date FROM register_advert WHERE Client_Name REGEXP '$tosearch' AND Station_ID = '$stID' OR Advert_Name REGEXP '$tosearch' AND Station_ID = '$stID'";
			$page = "
			

<div class='card'>
	<div class='card-header p-0'>
		<button class='btn btn-danger btn-sm' id='printSearchbyReoprt'>Print Report</button>
	</div>
	<div class='card-body'>
		<div class='row'>
			<div class='col-12' id='loadreports'>
				<table class='table table-striped table-inverse table-responsive'>
				<thead>
					<tr>
						<th>ID</th><th>Client Name</th><th>Advert Name</th><th>Advert Type</th><th>Reg Date</th><th>Reg By</th><th>Remark</th><th>Action</th>
					</tr>
				</thead>
				<tbody>";
			$adquery = $vfms_con->query($adsql);
			while ($adrow = $adquery->fetch_array(MYSQLI_NUM)) {
				$id = $adrow[0];
				$client = $adrow[1];
				$Cltype = $adrow[2];
				$Clnumber = $adrow[3];
				$Adname = $adrow[4];
				$Adtype = $adrow[5];
				$Remark = $adrow[6];
				$RegBy = $adrow[7];
				$RegDate = $adrow[8];

				$query = $vfms_con->query("SELECT Active_State FROM ended_adverts WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
				$result = $query->fetch_array(MYSQLI_NUM);

				if($result[0] == 1) {
					$btnTxt = 'Stop Advert';
				} else {
					$btnTxt = 'Continue';
				}
 
				$page .= "<tr>
				<td>$id</td><td>$client</td><td>$Adname</td>
				<td>$Adtype</td><td>$RegDate</td>
				<td>$RegBy</td><td>$Remark</td>

					<td id='btnaction' style='font-weight:bold; font-size:14px;'>
					<div class='btn-group'>
					<button type='button' class='btn btn-danger btn-sm dropdown-toggle' data-toggle='dropdown'>
	                    Actions
	                    <span class='caret'></span>
	                </button>
	                <ul class='dropdown-menu pull-right' role='menu' style='font-weight:bold; font-size:14px;'>
	                	<li>
	                    	<button class='btn btn-success btn-block btn-sm' id='LogReprtBtn' value='$Adname'>Log Report</button>
	                    </li>
	                    <li>
	                    	<button class='btn btn-warning btn-block btn-sm' id='UpdateBtn' value='$id'>Update Record</button>
						</li>
						<li>
	                    	<button class='btn btn-primary btn-block btn-sm' id='UpdateTimeBtn' value='$id'>Update Time</button>
	                    </li>
	                    <li>
	                    	<button class='btn btn-secondary btn-block btn-sm' id='AddPBtn' value='$id'>Add Payment</button>
	                    </li>
	                    <li>
	                    	<button class='btn btn-primary btn-block btn-sm' id='PrntRecpt' value='$id'>Print</button>
	                    </li>
	                    <li>
	                    	<button class='btn btn-warning btn-block btn-sm' id='StopAddBtn' value='$id'>$btnTxt</button>
						</li>
						<li>
	                    	<button class='btn btn-danger btn-block btn-sm' id='DeleteBtn' value='$id'>Delete Record</button>
	                    </li>
	                </ul>

					</div>

					</td>
					</tr>";
			}

			$page .= "</tbody>
						</table>
						</div>
					</div>
				</div>
				<div class='card-footer text-muted text-center'>
				<div id='AlertsModal'></div>
				</div>
			</div>";
			echo $page;
		}
	}

	if (isset($_POST['printSearchtext'])) {

		$tosearch = $_POST['printSearchtext'];
		
		$reporttitle = "Log ";
		require_once "reportheader.php";
		
		$table = "
			<table class='table table-bordered'>
			<tr>
				<th>ID</th><th>Client Name</th>
				<th>Client Type</th>
				<th>Client Number</th>
				<th>Advert Name</th>
				<th>Advert Type</th>
				<th>Reg Date</th>
				<th>Reg By</th>
				<th>Remark</th>
			</tr>";

		$adquery = $vfms_con->query("SELECT Advert_ID, Client_Name, Client_Type, Client_Number, Advert_Name, 
		Advert_Type, Remarks, Reg_By, Reg_Date FROM register_advert 
		WHERE Client_Name REGEXP '$tosearch' AND Station_ID = '$stID' OR Advert_Name REGEXP '$tosearch' 
		AND Station_ID = '$stID'");
		while ($adrow = $adquery->fetch_array(MYSQLI_NUM)) {
			$id = $adrow[0];
			$client = $adrow[1];
			$Cltype = $adrow[2];
			$Clnumber = $adrow[3];
			$Adname = $adrow[4];
			$Adtype = $adrow[5];
			$Remark = $adrow[6];
			$RegBy = $adrow[7];
			$RegDate = $adrow[8];

			$table .= "<tr>
			<td>$id</td><td>$client</td><td>$Cltype</td>
			<td>$Clnumber</td><td>$Adname</td>
			<td>$Adtype</td><td>$RegDate</td>
			<td>$RegBy</td><td>$Remark</td>
			</tr>";
		}

		$table .= "</body></table>";

		echo 
		$table;
	}
	