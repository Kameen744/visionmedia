<?php
	session_start();
	require_once 'config/database.php';
	$db = new Database();
	
	if(isset($_POST['client'])){

		if (empty($_POST['client']) | empty($_POST['item']) ) {
			echo "Error! Empty Form";
		} else {

		if (isset($_SESSION['vadminp'])) {
			$stationId = $db->validate($_SESSION['vadminp']);
		}

		elseif (isset($_SESSION['vuserp'])) {
			$regby = $_SESSION['vuserp'];
			$stationId = $_SESSION['Station_ID_No'];
		}
		
		$client = $db->validate($_POST['client']);
		$clnumber = $db->validate($_POST['clientnumber']);
		$item = $db->validate($_POST['item']);
		$itemtype = $db->validate($_POST['itemtype']);
		$duration = $db->validate($_POST['duration']);
		$slot = $db->validate($_POST['slot']);
		$amountpslot = $db->validate($_POST['amount']);
		$amounpaid = $db->validate($_POST['amountpaid']);
		$startdate = $db->validate($_POST['startdate']);
		$enddate = $db->validate($_POST['enddate']);
		$clienttype = $db->validate($_POST['clienttype']);

		$paymentmode = $db->validate($_POST['paymentmode']);
		$secondpayment = $db->validate($_POST['secondpaydue']);
		$thirdpayment = $db->validate($_POST['thirdpaydue']);
		$commision = $db->validate($_POST['commission']);
		$comamnt = $db->validate($_POST['commissionamount']);
		$agencypay = $db->validate($_POST['agencypay']);
		$source	= $db->validate($_POST['source']);
		$modeofpayment = $db->validate($_POST['modeofpayment']);
			
		$regdate = $db->rtnDate();

		if (empty($amounpaid)) {
			$amounpaid = 0;
		}

		if(empty($clnumber)) {
			$clnumber = 0;
		}

		if (empty($agencypay)) {
			$agencypay = 0;
		}

		$amount = ($amountpslot * $slot);
		$balance = $amount - $amounpaid;

		$date1 = new DateTime($startdate, new DateTimeZone('Africa/Lagos'));
		$date2 = new DateTime($enddate, new DateTimeZone('Africa/Lagos'));

		$commisionperc = $commision ."%";
		$agencypayperc = $agencypay ."%";

		if (empty($commision) & !empty($comamnt)){
			$commisionamount = $comamnt;
		}
		elseif (empty($comamnt) & !empty($commision)){
			$commisionamount = ($amount / 100) * $commision;
		}
		elseif (empty($commision) & empty($comamnt)) {
			$commisionamount = 0;
		}
		
		
		$agencypayamount = ($amount / 100) * $agencypay;
		$netpay = $amount - $commisionamount - $agencypayamount; 
		
	
		//Date Formating to use later
		//$startdatef = $date1->format('d/m/Y');

		$diff = date_diff($date1,$date2);

		 $dif = $diff->format("%a");
		
		if ($amount <= $amounpaid){
			$Remarks = "Paid";
		} else {
			$Remarks = "Not Paid";
		}

		$ssadid = substr($item, 0, 2);
		$sidd = strtoupper($ssadid);
		$addId = $sidd .rand(11, 99) .rand(10, 99);


		$mquery = $db->insertRow("INSERT INTO `register_advert` (`Advert_ID`, `Client_Name`, 
		`Client_Type`, `Client_Number`, `Advert_Name`, `Advert_Type`, `Payment_Mode`, 
		`Second_Pay_Due`, `Third_Pay_Due`, `Per_Slot`, `Amount`, `Paid`, `Balance`, 
		`Duration`, `Slot`, `Start_Date`, `End_Date`, `Num_Days`, `Remarks`, `Reg_By`, 
		`Reg_Date`, `Commision`, `CommisionAmount`, `Agencypay`, `AgencypayAmount`, 
		`Modeofpay`, `Source`, `Netamount`, `Station_ID`) VALUES 
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", 
		[$addId, $client, $clienttype, $clnumber, $item, $itemtype, $paymentmode, $secondpayment, 
		$thirdpayment, $amountpslot, $amount, $amounpaid, $balance, $duration, $slot, $startdate, 
		$enddate, $dif, $Remarks, $regby, $regdate, $commisionperc, $commisionamount, 
		$agencypayperc, $agencypayamount, $modeofpayment, $source, $netpay, $stationId]);

		if (!$mquery) {
			 echo "Error! Failed to save";
		}else{
			// $ssltquery = $db->insertRow('INSERT INTO `set_slot` (`Advert_ID`, `Num_Slots`, 
			// `Station_ID`) VALUES (?,?,?)', [$addId, $slot, $stationId]);
			$_SESSION['advert_ID'] = $addId;
			echo $addId;
		}
	}
	
	}