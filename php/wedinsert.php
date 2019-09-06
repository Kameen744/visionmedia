<?php
	require "con_Vfm.php";

	$sql = "SELECT Advert_ID, Advert_Name, End_Date FROM register_advert ORDER BY ID DESC LIMIT 0, 1";
		$squery = $vfms_con->query($sql);
		while ($rows = $squery->fetch_array(MYSQLI_NUM)){
			$adid = $rows[0];
			$adname = $rows[1];
			$endate = $rows[2];
		//	$slno = $rows[3];
		}

	if (isset($_REQUEST['WedTime'])) {
		$mtime = $_REQUEST['WedTime'];

		if ($mtime != "") {
			$checkr = "SELECT W_Avail FROM t_wednesday WHERE W_Avail = '$mtime' AND W_Time IS NOT NULL";
			$checkrquery = $vfms_con->query($checkr);
			$checkrqueryresult = $checkrquery->fetch_array(MYSQLI_NUM);
			 $MR = $checkrqueryresult[0];
			 if($MR == ""){
			 	$monupdatesql = "UPDATE t_wednesday SET Advert_Name = '$adname', Advert_ID = '$adid', W_Time = '$mtime', End_Date = '$endate' WHERE W_Avail = '$mtime' ";
			 	$monupdatequery = $vfms_con->query($monupdatesql);
			 	if ($monupdatequery) {

			 		echo "<div style='color:white; background:#D13438; border-radius:10px; text-align:center; margin-top:0px;'>$mtime: is set</div>";
			 	}else{
			 		echo "<div style='color:red; background:yellow;'>adN:$adname iD:$adid tm:$mtime endte: $endate </div>";
			 	}
			 }else{
			 	echo "<div style='color:red; background:yellow;'>There's Advert on this Time</div>";
			 }	
		}else{
			echo "<div style='color:red; background:yellow;'>Can't set empty time</div>";
		}
	}

	if(isset($_REQUEST['WedDate'])){
		$mdate = $_REQUEST['WedDate'];
		if ($mdate != "") {
			$checkr = "SELECT Advert_ID FROM t_wednesday WHERE Advert_ID = '$adid' ";
			$checkrquery = $vfms_con->query($checkr);
			$checkrqueryresult = $checkrquery->fetch_array(MYSQLI_NUM);
			 $MR = $checkrqueryresult[0];
			 if($MR == ""){
			 	 	echo "<div style='color:red; background:yellow;'>There's Advert on this Date</div>";
			 }else{
			 		$monupdatesql = "UPDATE t_wednesday SET W_Date = '$mdate' WHERE Advert_ID = '$adid' AND W_Date IS NULL ";
			 	$monupdatequery = $vfms_con->query($monupdatesql);
			 	if ($monupdatequery) {
			 		echo "$mdate";
			 	}else{
			 		echo "<div style='color:red; background:yellow;'>Error While Updating Date</div>";
			 	}
			 }	
		}else{
			echo "<div style='color:red; background:yellow;'>Can't set empty date</div>";
		}	
	}
?>