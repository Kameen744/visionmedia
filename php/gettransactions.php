<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

	if (isset($_POST['alltrans'])) {
		All_Transactions($stID);
	}

	if (isset($_POST['SearchDate'])) {
		$sdate = $_POST['SearchDate'];
		require "con_Vfm.php";
		$data_table = "<label class='col-md-6 col-md-offset-3 label label-primary'>Transactions on $sdate</label>";
		$data_table .= "<table class='table table-bordered table-responsive'>
			<tr>
				<td>S/N</td>
				<td>Advert ID</td>
				<td>Name</td>
				<td>Client</td>
				<td>Amount</td>
				<td>Paid</td>
				<td>Balance</td>
				<td>Num_Days</td>
				<td>Reg_Date</td>
			</tr>
		";
		$counter = 1;
		$sqls = "SELECT Advert_ID, Advert_Name,  Client_Name, Amount, Paid, Balance, Num_Days, Reg_Date FROM register_advert WHERE Reg_Date = '$sdate' AND Station_ID = '$stID' ";
		$query = $vfms_con->query($sqls);
		while ($rows = $query->fetch_array(MYSQLI_NUM)) {

		//	$treg = number_format($rows[8]);
			$data_table .= "<tr>" ."<td>" .$counter ."</td>" ."<td>".$rows[0] ."</td>" ."<td>" .$rows[1] ."</td>" ."<td>" .$rows[2] ."</td>" ."<td>" .$rows[3] ."</td>" ."<td>" .$rows[4] ."</td>" ."<td>" .$rows[5] ."</td>" ."<td>" .$rows[6] ."</td>" ."<td>" .$rows[7] ."</td>" ."</tr>";

			$counter++;
		}
		$totalsql = "SELECT COUNT(ID), SUM(Amount), SUM(Paid), SUM(Balance) FROM register_advert WHERE Reg_Date = '$sdate' AND Station_ID = '$stID' ";
		$totalquery = $vfms_con->query($totalsql);
		$totalrow = $totalquery->fetch_array(MYSQLI_NUM);
			$ttrs = number_format($totalrow[0]);
			$tamt = "₦ ".number_format($totalrow[1]);
			$tpad = "₦ ".number_format($totalrow[2]);
			$tbln = "₦ ".number_format($totalrow[3]);

		$data_table .= "<tr>
				<th>$ttrs</th>
				<th colspan='3'></th>
				<th colspan=''>$tamt</th>
				<th colspan=''>$tpad</th>
				<th colspan=''>$tbln</th>
			</tr>";
		$data_table .= "</table>";
		echo $data_table;
	}

	if (isset($_POST['FromDate'])) {
		$FromDate = $_POST['FromDate'];
		$ToDate = $_POST['ToDate'];
	
		require "con_Vfm.php";
		$data_table = "<label class='col-md-6 col-md-offset-3 label label-primary'>Transactions From $FromDate To $ToDate</label>";
		$data_table .= "<table class='table table-bordered'>
			<tr>
				<td>S/N</td>
				<td>Advert ID</td>
				<td>Name</td>
				<td>Client</td>
				<td>Amount</td>
				<td>Paid</td>
				<td>Balance</td>
				<td>Num_Days</td>
				<td>Reg_Date</td>
			</tr>
		";
		$counter = 1;
		$sqls = "SELECT Advert_ID, Advert_Name,  Client_Name, Amount, Paid, Balance, Num_Days, Reg_Date FROM register_advert WHERE Reg_Date >= '$FromDate' AND Reg_Date <= '$ToDate' AND Station_ID = '$stID' ";
		$query = $vfms_con->query($sqls);
		while ($rows = $query->fetch_array(MYSQLI_NUM)) {
		//	$treg = number_format($rows[8]);
			
			$data_table .= "<tr>" ."<td>" .$counter ."</td>" ."<td>".$rows[0] ."</td>" ."<td>" .$rows[1] ."</td>" ."<td>" .$rows[2] ."</td>" ."<td>" .$rows[3] ."</td>" ."<td>" .$rows[4] ."</td>" ."<td>" .$rows[5] ."</td>" ."<td>" .$rows[6] ."</td>" ."<td>" .$rows[7] ."</td>" ."</tr>";

		
			$counter++;
		}
		$totalsql = "SELECT COUNT(ID), SUM(Amount), SUM(Paid), SUM(Balance) FROM register_advert WHERE Reg_Date >= '$FromDate' AND Reg_Date <= '$ToDate' AND Station_ID = '$stID' ";
		$totalquery = $vfms_con->query($totalsql);
		$totalrow = $totalquery->fetch_array(MYSQLI_NUM);
			$ttrs = number_format($totalrow[0]);
			$tamt = "₦ ".number_format($totalrow[1]);
			$tpad = "₦ ".number_format($totalrow[2]);
			$tbln = "₦ ".number_format($totalrow[3]);

		$data_table .= "<tr>
				<th>$ttrs</th>
				<th colspan='3'></th>
				<th colspan=''>$tamt</th>
				<th colspan=''>$tpad</th>
				<th colspan=''>$tbln</th>
			</tr>";

		$data_table .="</table>";
		echo $data_table;
	}

	function All_Transactions($stID){
		require "con_Vfm.php";
		$data_table = "<table class='table table-bordered table-responsive'>
			<tr>
				<th>Total Registered</th>
				<th>Total Amount</th>
				<th>Total Paid</th>
				<th>Total Balance</th>
			</tr>
		";
		$sqls = "SELECT COUNT(ID), SUM(Amount), SUM(Paid), SUM(Balance) FROM register_advert WHERE Station_ID = '$stID' ";
		$query = $vfms_con->query($sqls);
		while ($rows = $query->fetch_array(MYSQLI_NUM)) {
			$treg = number_format($rows[0]);
			$tamt = "₦ ".number_format($rows[1]);
			$tpad = "₦ ".number_format($rows[2]);
			$tbln = "₦ ".number_format($rows[3]);
			$data_table .= "<tr>
				<td>$treg</td>
				<td>$tamt</td>
				<td>$tpad</td>
				<td>$tbln</td>
			</tr>";
		}
		$data_table .= "</table>";
		echo $data_table;
	}

?>