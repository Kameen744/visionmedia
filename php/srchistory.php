<?php
session_start();
require '../vendor/autoload.php';
//Load Composer's autoloader
	require "con_Vfm.php";
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

	if (isset($_REQUEST['datefrom'])) {
//	$dtefrom = $_REQUEST['SearchFrom'];
	$datefrom = mysqli_real_escape_string($vfms_con, $_REQUEST['datefrom']);
	$dateto = mysqli_real_escape_string($vfms_con, $_REQUEST['dateto']);
	$countr = 0;
	//$acdate = mb_substr($dtefrom, 3, 7);
	if ($datefrom == "") {
		echo "Empty Date";
		}else{
			echo "<div class='col-md-12' style='margin-bottom:10px;'>
			<input type='hidden' value='$datefrom' id='recpfrom'/>
			<input type='hidden' value='$dateto' id='recpto'/>
			<a class='btn btn-danger btn-xs' id='SrchMontHis'>
			<span class='glyphicon glyphicon-print'></span>Print</a>
			</div>";
			echo "<table class='table table-bordered'><tr> 
			<th>S/N</th> <th>Client Name</th><th>File</th> 
			<th>Registered</th> <th>Start</th> <th>End</th> 
			<th>For</th> <th>Remark</th> <th>Reg By</th> </tr>";
		
			$ssqur = $vfms_con->query("SELECT  Client_Name, Advert_Name, Start_Date, 
			End_Date, Num_Days, Remarks, Reg_By, Reg_Date  
			FROM register_advert WHERE Reg_Date >= '$datefrom' 
			AND Reg_Date <= '$dateto' AND Station_ID = '$stID' ");
			
			while ($srows = $ssqur->fetch_array(MYSQLI_NUM)) {
				$countr++;
				$clnm = $srows[0];
				$advrt = $srows[1];
				$srtdate = $srows[2];
				$endate = $srows[3];
				$ndays = $srows[4];
				$rmark = $srows[5];
				$regby = $srows[6];
				$regdate = new datetime($srows[7]);
				$orgdate = $regdate->format('d/m/Y');
			echo "<tr><td>$countr</td><td>$clnm</td><td>$advrt</td>
			<td>$orgdate</td><td>$srtdate</td><td>$endate</td>
			<td>$ndays</td><td>$rmark</td><td>$regby</td></tr>";
		}
		echo "</table>";
	}
}else{
	if(isset($_REQUEST['datePrFrom'])) {
		$countr = 0;
		$datefrom = $_REQUEST['datePrFrom'];
		$dateto = $_REQUEST['datePrTo'];
		$reporttitle = "Registered Adverts From " .$datefrom ." to " .$dateto;
		require_once "reportheader.php";
	$table .= "<table class='table table-bordered'>
		<tr>
			<td>S/N</td>
			<td>Advert ID</td>
			<td>Name</td>
			<td>Client</td>
			<td>Amount</td>
			<td>Paid</td>
			<td>Balance</td>
			<td>VAT</td>
			<td>Num_Days</td>
			<td>Reg_Date</td>
		</tr>
	";
	$counter = 1;
	$query = $vfms_con->query("SELECT Advert_ID, Advert_Name,  
	Client_Name, Amount, Paid, Balance, Num_Days, Reg_Date 
	FROM register_advert WHERE Reg_Date >= '$datefrom' 
	AND Reg_Date <= '$dateto' AND Station_ID = '$stID' ");
	while ($rows = $query->fetch_array(MYSQLI_NUM)) {
		$vat = "₦ " .number_format(($rows[3] / 100) * 0.5);
		$table .= "<tr>" ."<td>" .$counter ."</td>" ."<td>".$rows[0] 
		."</td>" ."<td>" .$rows[1] ."</td>" ."<td>" .$rows[2] ."</td>" 
		."<td>" ."₦ " .number_format($rows[3]) ."</td>" ."<td>" ."₦ " .number_format($rows[4]) ."</td>" 
		."<td>" ."₦ " .number_format($rows[5]) ."</td>" ."<td>" .$vat ."</td><td>" .$rows[6] ."</td>" ."<td>" 
		.$rows[7] ."</td>" ."</tr>";
		$counter++;
	}
	
	$totalquery = $vfms_con->query("SELECT COUNT(ID), SUM(Amount), 
	SUM(Paid), SUM(Balance) FROM register_advert 
	WHERE Reg_Date >= '$datefrom' AND Reg_Date <= '$dateto' 
	AND Station_ID = '$stID' ");
	$totalrow = $totalquery->fetch_array(MYSQLI_NUM);
		$ttrs = number_format($totalrow[0]);
		$tamt = "₦ ".number_format($totalrow[1]);
		$tpad = "₦ ".number_format($totalrow[2]);
		$tbln = "₦ ".number_format($totalrow[3]);
		$tlvat = "₦ " .number_format(($totalrow[1] / 100) * 0.5); 
	$table .= "<tr>
			<th>$ttrs</th>
			<th colspan='3'></th>
			<th colspan=''>$tamt</th>
			<th colspan=''>$tpad</th>
			<th colspan=''>$tbln</th>
			<th colspan=''>$tlvat</th>
		</tr>";
	$table .="</table>";
	echo $table;

/* 	// Create the Transport
$transport = (new Swift_SmtpTransport('mail.visionfmradio.ng', 25))
  ->setUsername('kamal@visionfmradio.ng')
  ->setPassword('kameen744')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Vision FM Reports'))
  ->setFrom(['kamal@visionfmradio.ng' => 'Reports'])
  ->setTo(['reports@visionfmradio.ng'])
  ->setBody($table)
  ;

// Send the message
$result = $mailer->send($message);
if($result) {
	echo "Mail sent successefully";
} */
/*	
		$to = 'reports@visionfmradio.ng';
	//	$from = "Vision FM Sokoto";
		$subject = 'Registered Adverts '.$datefrom .' to ' .$dateto;
		$headers = "From: Vision Sokoto  \r\n";
		$headers .= "Reply-To: visionfmabuja@gmail.com \r\n";
		$headers .= "CC: susan@example.com\r\n";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'From: '.$from."\r\n".
    				'Reply-To: '.$from."\r\n" .
    				'X-Mailer: PHP/' . phpversion();
		
		$mail = mail($to, $subject, $table, $headers);
		if ($mail) {
			echo $table;
			echo "Copy of this report sent to " .$to;
			exit;
		}else {
			echo $table;
			echo "Fail to send mail";
			exit;
		}
		
	/*	
	//	$to = 'kamalaminu94@gmail.com';
	//	$from = "visionfmabuja@gmail.com";
	//	$subject = 'Vision Report';

		//$send = new sendMail ($to, $from, 'Test Mail', $subject);
	*/
	
	/* $to = 'reports@visionfmradio.ng';
	$subject = 'Hello from XAMPP!';
	$message = 'This is a test';
	$headers = "From: Vision Sokoto\r\n";
	if (mail($to, $subject, $message, $headers)) {
	echo "SUCCESS";
	} else {
	echo "ERROR";
	}	 */

	/* Create the Transport
$transport = (new Swift_SmtpTransport('server203.web-hosting.com', 465))
  ->setUsername('kamal@visionfmradio.ng')
  ->setPassword('kameen744')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['kamalaminu94@gmail.com'])
  ->setBody('This is Test Mail')
  ;
 Send the message 
$result = $mailer->send($message);
*/
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

/*
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.visionfmradio.ng';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'reports@visionfmradio.ng';                 // SMTP username
    $mail->Password = 'kameen744';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('reports@visionfmradio.ng', 'Mailer');
    $mail->addAddress('kamalaminu94@gmail.com', 'Vision Reports');     // Add a recipient
    $mail->addAddress('kobserve@yahoo.com');               // Name is optional
    $mail->addReplyTo('reports@visionfmradio.ng', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
*/		
} else { 
			echo "Data Not recieved";
		}
		
	}
?>