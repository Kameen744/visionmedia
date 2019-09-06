<?php 
session_start();
if (isset($_SESSION['vuserp'])) {
	$stID = $_SESSION['Station_ID_No'];
}
require "con_Vfm.php";
	if (isset($_REQUEST['CurDate'])) {
		
		$cdate = $_REQUEST['CurDate'];
		$query = $vfms_con->query("SELECT Advert_Name, Balance FROM Register_Advert WHERE Second_Pay_Due = '$cdate' AND Station_ID = '$stID' OR Third_Pay_Due = '$cdate' AND Station_ID = '$stID' ");
		$out = "";
		
		while ($row = $query->fetch_array(MYSQLI_NUM)) {
			$adid = $row[0];
			$blnc = "₦ ".number_format($row[1]);
			$dat = new DateTime($cdate);
			$date = $dat->format('D d/m/Y');
			$out .= "				 
	                <li class='notelistmain'>
	                    <div>
	                        <i class='fa fa-tasks fa-fw'></i><strong>$adid:</strong> Due to Make Payment of <br><b>$blnc</b>
	                        <span class='pull-right small'>$date</span>
	                    </div>
	                </li>
	                <li class='divider'></li> 
			";

		}

		echo $out;
	}

	if (isset($_REQUEST['CurDateRows'])) {
		$cdate = $_REQUEST['CurDateRows'];
		$query = $vfms_con->query("SELECT Advert_ID, Second_Pay_Due, Third_Pay_Due FROM Register_Advert WHERE Second_Pay_Due = '$cdate' AND Station_ID = '$stID' OR Third_Pay_Due = '$cdate' AND Station_ID = '$stID' ");
		$out = $query->num_rows;

		echo $out;
	}
?>