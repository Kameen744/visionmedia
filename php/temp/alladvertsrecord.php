<?php
	require "con_Vfm.php";
	session_start();
	if($_SESSION['vadminp']){

	$sql = "SELECT ID, Client_Name, Client_Number, Advert_Name, Amount, Paid, Balance, Start_Date, End_Date, Slot, Num_Days, Remarks, Reg_By FROM register_advert ORDER BY ID LIMIT 0, 50";
	$tquery = $vfms_con->query($sql);
	echo "<div class='col-md-4 col-md-offset-4' style='text-align:center; color:#C4C5CF;'><h3>All Registered Adverts</h3></div>";
	echo "<div class='col-md-12' style=''>";
	echo "<div class='col-md-4 col-md-offset-4' style='margin-bottom:5px;'><a href='../assets/reports/examples/alladvertsrecordpdf.php' class='btn btn-primary btn-block'>Generate PDF Report</a></div>";
	echo "<table class='table table-hoover table-bordered' id='transtabletag' style='color:#D9DBE8; margin-top:5px; font-weight:bold;'>";
	echo "<thead>
			<th>S/N</th>
			<th>Client</th>
			<th>Number</th>
			<th>Advert</th>
			<th>Amount</th>
			<th>Paid</th>
			<th>Balance</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Slots</th>
			<th>Days</th>
			<th>Reg By</th>
			<th>Remark</th>
		</thead>";
		echo "<tbody>";
	while ($rows = $tquery->fetch_array(MYSQLI_NUM)){
		$sn = $rows[0];
		$Cname = $rows[1];
		$Cnum = $rows[2];
		$Aditem = $rows[3];
		$Amnt = $rows[4];
		$paid = $rows[5];
		$Balance = $rows[6];
		$startdate = $rows[7];
		$enddate = $rows[8];
		$slots = $rows[9];
		$days = $rows[10];
		$remark = $rows[11];
		$regby = $rows[12];
		
		echo "<tr>";
			echo "
				<td>$sn</td>
				<td>$Cname</td>
				<td>$Cnum</td>
				<td>$Aditem</td>
				<td>$Amnt</td>
				<td>$paid</td>
				<td>$Balance</td>
				<td>$startdate</td>
				<td>$enddate</td>
				<td>$slots</td>
				<td>$days</td>
				<td>$regby</td>
				<td>$remark</td>
				
			";
		echo "</tr>";
	}

	//$dd = mb_substr($stdate, 0, 2) .'-'; 
	//	$m1 = mb_substr($stdate, 3,3);
	//$m2 = mb_substr($stdate, 2 ).'-';
	//$mm = $m1 .$m2;
	//$yy = mb_substr($stdate, 6, 9);

	// $ffdate = DateTime::createFromFormat('d/m/Y', $stdate);
    // $sdateFormat = $ffdate->format('Y-m-d');

    // $ssdate = DateTime::createFromFormat('d/m/Y', $endate);
    // $edateFormat = $ssdate->format('Y-m-d');

    //	$intv = $sdateFormat->diff($edateFormat);
	//$ttsql = "SELECT sum("
     			
	echo "</tbody></table>";
	echo "</div>";
	}
?>