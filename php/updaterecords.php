<?php
session_start();
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}
	require "con_Vfm.php";
	if (isset($_POST['addid'])) {
		$adid = $_POST['addid'];
		$sql = "SELECT Advert_ID, Client_Name, Client_Type, Client_Number, Advert_Name, Advert_Type, Second_Pay_Due, Third_Pay_Due, Amount, Paid, Start_Date, End_Date FROM Register_Advert WHERE Advert_ID = '$adid' ";
		$query = $vfms_con->query($sql);
		$row = $query->fetch_array(MYSQLI_NUM);
		
		$outpt = "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Advert ID</i>
				</div>
				<input class='form-control' name='advaid' value=' " .$row[0] ." ' readonly=''>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Client Name</i>
				</div>
				<input class='form-control' name='clntname' value=' " .$row[1] ." '>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Client Type</i>
				</div>
				<select class='form-control' name='clnttype'>
					<option value=' " .$row[2] ." '>Individual</option>
					<option value='Contract'>Contract</option>
					<option value='Government'>Government</option>
				</select>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Cleint Number</i>
				</div>
				<input class='form-control' name='clntnum' value=' " .$row[3] ." '>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Advert Name</i>
				</div>
				<input class='form-control' name='advaname' value=' " .$row[4] ." '>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Advert Type</i>
				</div>
				<select class='form-control' name='advatype'>
					<option value=' " .$row[5] ." '>".$row[5]."</option>
					<option value='Live Program'>Live Program</option>
					<option value='Live Coverage'>Live Coverage</option>
					<option value='Sport'>Sport</option>
					<option value='Studio Fee'>Studio Fee</option>
				</select>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>2nd Pay Due</i>
				</div>
				<input class='form-control updatepicker' name='scndpdue' value=' " .$row[6] ." ' id='scndpdue'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>3rd Pay Due</i>
				</div>
				<input class='form-control updatepicker' name='thrdpdue' value=' " .$row[7] ." ' id='thrdpdue'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Paid</i>
				</div>
				<input type='hidden' name='amount' value=' " .$row[8] ." '>
				<input class='form-control' name='paid' value=' " .$row[9] ." '>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Start Date</i>
				</div>
			<input class='form-control updatepicker' name='stdate' value=' " .$row[10] ." ' id='stdate'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>End Date</i>
				</div>
			<input class='form-control updatepicker' name='endate' value=' " .$row[11] ." ' id='endate'>
			</div>";
		$outpt .= "
			 <script type='text/javascript'>
    			$('.updatepicker').datepicker({dateFormat: 'yy-mm-dd'});
    			$('.updatepicker').css('z-index', '9999');
			</script>
		";
		echo $outpt;
	}

// --------------------------------------------------------------------------------------//

	if(isset($_POST['advaid'])){
		$id = mysqli_real_escape_string($vfms_con, $_POST['advaid']);
		$clntname = mysqli_real_escape_string($vfms_con, $_POST['clntname']);
		$clnttype = mysqli_real_escape_string($vfms_con, $_POST['clnttype']);
		$clntnum = mysqli_real_escape_string($vfms_con, $_POST['clntnum']);
		$advaname = mysqli_real_escape_string($vfms_con, $_POST['advaname']);
		$advatype = mysqli_real_escape_string($vfms_con, $_POST['advatype']);
		$scndpdue = mysqli_real_escape_string($vfms_con, $_POST['scndpdue']);
		$thrdpdue = mysqli_real_escape_string($vfms_con, $_POST['thrdpdue']);
		$amount = mysqli_real_escape_string($vfms_con, $_POST['amount']);
		$paid = mysqli_real_escape_string($vfms_con, $_POST['paid']);
		$stdate = mysqli_real_escape_string($vfms_con, $_POST['stdate']);
		$endate = mysqli_real_escape_string($vfms_con, $_POST['endate']);

		$tid = trim($id);
		$tclntname = trim($clntname);
		$tclnttype = trim($clnttype);
		$tclntnum = trim($clntnum);
		$tadvaname = trim($advaname);
		$tadvatype = trim($advatype);
		$tscndpdue = trim($scndpdue);
		$tthrdpdue = trim($thrdpdue);
		$tamount = trim($amount);
		$tpaid = trim($paid);
		$tstdate = trim($stdate);
		$tendate = trim($endate);
		$balance = ((int)$amount) - ((int)$paid);
		if ($balance <= 0) {
			$remarks = "Paid";
		} else {
			$remarks = "Not Paid";
		}
		function updateSlotsName ($value, $tadvaname) {
		require "con_Vfm.php";
		global $tid, $stID;
		$delqur = $vfms_con->query("UPDATE `$value` SET Advert_Name = '$tadvaname' 
		WHERE Advert_ID = '$tid' AND Station_ID = '$stID'");
		}

		$qquery = $vfms_con->query("UPDATE Register_Advert SET Client_Name = '$tclntname', 
		Client_Type = '$tclnttype', Client_Number = '$tclntnum', 
		Advert_Name = '$tadvaname', Advert_Type = '$tadvatype', 
		Second_Pay_Due = '$tscndpdue', Third_Pay_Due = '$tthrdpdue', 
		Paid = '$tpaid', Balance = '$balance', Remarks = '$remarks', Start_Date = '$tstdate', 
		End_Date = '$tendate' WHERE Advert_ID = '$tid' ");
		if ($qquery) {
			$garr = ['t_monday', 't_tuesday', 't_wednesday', 't_thursday', 
    		't_friday', 't_saturday', 't_sunday'];
    		foreach ($garr as $key => $value) { 
				updateSlotsName($value, $tadvaname);
			}
			$upend = $vfms_con->query("UPDATE ended_adverts SET Advert_Name = '$tadvaname'
			WHERE Advert_ID = '$tid' AND Station_ID = '$stID'");
			$outpt = "
            <div class='alert alert-success'>$id: successefully updated</div>
		";
		} else{
		$outpt = "
            <div class='alert alert-danger'>$id: An error occur fail to update records </div>
		";
		}
		echo $outpt;
	}


	//---------------------------------------------------------------------------------//

	if (isset($_POST['AddPayment'])) {
		$id = $_POST['AddPayment'];
		$query = $vfms_con->query("SELECT Amount, Paid, Balance, Second_Pay_Amt, Third_Pay_Amt FROM Register_Advert WHERE Advert_ID = '$id' ");
		$result = $query->fetch_array(MYSQLI_NUM);
		$amount = "₦ " .number_format($result[0]);
		$paid = "₦ " .number_format($result[1]);
		$balance = "₦ " .number_format($result[2]);
		$spamount = $result[3];
		$tpamount = $result[4];

		if (is_null($spamount) && is_null($tpamount)) {
			$outpt = "
			<input type='hidden' value='$id' id='AddPayId'>
			<div style='font-size: 15px;' class='label label-danger'>
			Amount Charged: $amount | Paid: $paid | Remaining: $balance
			</div> 
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Second Pay Amount</i>
				</div>
				<input type='number' class='form-control updatepicker' id='SecondPay' placeholder='2ND Payment'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Third Pay Amount</i>
				</div>
				<input type='number' class='form-control updatepicker' id='ThirdPay' placeholder='3RD Payment'>
			</div>";
		}
		elseif (! is_null($spamount) && ! is_null($tpamount)) {
			$outpt = "
			<div style='font-size: 15px;' class='label label-danger'>
			Amount Charged: $amount | Paid: $paid | Remaining: $balance
			</div>
			";
		}
		elseif (is_null($spamount) && ! is_null($tpamount)) {
			$outpt = "
			<input type='hidden' value='$id' id='AddPayId'>
			<div style='font-size: 15px;' class='label label-danger'>
			Amount Charged: $amount | Paid: $paid | Remaining: $balance
			</div> 
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Second Pay Amount</i>
				</div>
				<input type='number' class='form-control updatepicker' id='SecondPay' placeholder='Remaining 2ND Payment'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Third Pay Amount</i>
				</div>
				<input type='number' disabled='' class='form-control updatepicker' id='ThirdPay' value'' placeholder='$tpamount'>
			</div>";
		}
		elseif (! is_null($spamount) &&  is_null($tpamount)) {
				$outpt = "
			<input type='hidden' value='$id' id='AddPayId'>
			<div style='font-size: 15px;' class='label label-danger'>
			Amount Charged: $amount | Paid: $paid | Remaining: $balance
			</div> 
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Second Pay Amount</i>
				</div>
				<input type='number' disabled='' class='form-control updatepicker' id='SecondPay' value='' placeholder='$spamount'>
			</div>";
		$outpt .= "
			<div class='input-group'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<i class='btn btn-danger'>Third Pay Amount</i>
				</div>
				<input type='number' class='form-control updatepicker' id='ThirdPay' placeholder='Remaining 3RD Payment'>
			</div>";
		}
		echo $outpt;
	}

	//--------------------------------------------------------------------------------//

	if (isset($_POST['AddPayId'])) {
		$id = $_POST['AddPayId'];
		$Scpay = $_POST['SecondPay'];
		$Thpay = $_POST['ThirdPay'];

		if (empty($Scpay) && empty($Thpay)) {

			$outpt = "
            <div class='alert alert-danger'>$id: Empty 2ND & 3RD Payment Fields, Fail To Add Payment !!</div>
			";
		}
		else {
			$query = $vfms_con->query("SELECT Amount, Paid, Balance, Remarks FROM Register_Advert WHERE Advert_ID = '$id' ");
			$result = $query->fetch_array(MYSQLI_NUM);

			$amount = mysqli_real_escape_string($vfms_con, $result[0]);
			$paid = mysqli_real_escape_string($vfms_con, $result[1]);
			$balance = mysqli_real_escape_string($vfms_con, $result[2]);
			$remarks = mysqli_real_escape_string($vfms_con, $result[3]);
			$secondpay = mysqli_real_escape_string($vfms_con, $Scpay);
			$thirdpay = mysqli_real_escape_string($vfms_con, $Thpay);

			if ($secondpay > 0 && $thirdpay > 0) {
				$sec = 1; $thi = 1;
				$tpaid = ($secondpay + $thirdpay) + $paid;
			}
			elseif ($secondpay > 0 && $thirdpay == "" || $thirdpay < 0) {
				$sec = 1; $thi = 0;
				$tpaid = $secondpay + $paid;	
			}
			elseif ($secondpay < 0 || $secondpay == "" && $thirdpay > 0 ) {
				$sec = 0; $thi = 1;
				$tpaid = $thirdpay + $paid;
			}
			
		
			$tbalance = ($amount - $tpaid);
			if ($tpaid == $amount) {
				$remarks = "Paid";
			}
			elseif ($tpaid > $amount) {
				$remarks = "Over Paid";
			}
			else{
				$remarks = "Not Paid";
			}

			if ($sec > 0 && $thi > 0) {
				$sql = "UPDATE Register_Advert SET Paid = '$tpaid', Second_Pay_Amt = '$secondpay', Third_Pay_Amt = '$thirdpay', Balance = '$tbalance', Remarks = '$remarks' WHERE Advert_ID = '$id' ";
			}
			elseif ($sec > 0 && $thi <= 0) {
				$sql = "UPDATE Register_Advert SET Paid = '$tpaid', Second_Pay_Amt = '$secondpay', Balance = '$tbalance', Remarks = '$remarks' WHERE Advert_ID = '$id' ";	
			}
			elseif ($sec <= 0 && $thi > 0) {
				$sql = "UPDATE Register_Advert SET Paid = '$tpaid', Third_Pay_Amt = '$thirdpay', Balance = '$tbalance', Remarks = '$remarks' WHERE Advert_ID = '$id' ";
			}

			$query = $vfms_con->query($sql);
			if ($query) {
				$outpt = "
            	<div class='alert alert-success'>$id: Payment Added Successefully</div>
				";
			}else{
				$outpt = "
            	<div class='alert alert-danger'>$id: An error occur fail to add payment </div>
				";
			}
         
		}
		 echo $outpt;
	}

	if (isset($_POST['DeleteRec'])) {
		$id = $_POST['DeleteRec'];
		echo "
			<input type='hidden' id='DeleteID' value='$id'>
        	<div class='alert alert-danger'>$id: Are You Sure, You Want Delete This Record</div>
        	<div class='alert alert-danger'>$id: All Adverts Schedule Will Be Deleted</div>
			";
	}

	if (isset($_POST['StopAddRec'])) {
		$id = $_POST['StopAddRec'];
		$today = date('Y-m-d');

		$query = $vfms_con->query("SELECT Active_State FROM ended_adverts WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
		$result = $query->fetch_array(MYSQLI_NUM);

		if($result[0] == 1) {
			$updquery = $vfms_con->query("UPDATE ended_adverts SET Active_State = 0 WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
			if ($updquery) {
				$outpt = ["Msg" => "$id Schedule for this adverts has been stoped $today", "Btn" => "Continue"];
			}
			else{
				$outpt = ["Msg" => "$id Error Occur Failed To Stop Advert"];	
			}
		}elseif($result[0] == 0) {
			$updquery = $vfms_con->query("UPDATE ended_adverts SET Active_State = 1 WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
			if ($updquery) {
				$outpt = ["Msg" => "$id Successefully changed. to continue $today", "Btn" => "Stop Advert"];
			}
			else{
				$outpt = ["Msg" => "$id Error Occur Failed To Stop Advert"];	
			}
		}

		echo  json_encode($outpt);
	}

	if (isset($_POST['DeleteId'])) {
		$id = $_POST['DeleteId'];
		$today = date('Y-m-d');

		$query = $vfms_con->query("DELETE FROM Register_Advert WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
		if ($query) {
			$monupqr = $vfms_con->query("DELETE FROM ended_adverts WHERE Advert_ID = '$id' AND Station_ID = '$stID' ");
			$outpt = "
        	<div class='alert alert-danger'>$id: Record Deleted From The Database</div>
			";
		}
		else{
			$outpt = "
        		<div class='alert alert-danger'>$id: Error Occur Failed To Delete</div>
			";	
		}
		echo $outpt;
	}
?>