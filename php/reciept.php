<?php
session_start();

if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
	}

if (isset($_REQUEST['PrintAddId'])) {
	require "con_Vfm.php";
	$advId = $_REQUEST['PrintAddId'];
	$date = date("d/m/Y");
	
	if ($advId == "") {
			echo "Empty ID";
			}else{
				$reporttitle = "INVOICE " .$advId;
				require_once "reportheader.php";

				$table .= "<table class='table table-bordered maintb'>
				<tr>
					<th>Name</th> <th>Number</th> <th>Advert</th> 
					<th>Slots</th><th>Per Slot</th> <th>Amount</th> 
					<th>Paid</th> <th>Balance</th> <th>Reg Date</th>
					<th>Start On</th>
				</tr>";

				$ssqur = $vfms_con->query("SELECT  Client_Name, Client_Number, Advert_Name, Slot, Per_Slot, Amount, Paid, Balance, Reg_Date, Start_Date, Commision, CommisionAmount, Agencypay, AgencypayAmount, Modeofpay, Source, Netamount FROM register_advert WHERE Advert_ID = '$advId' AND Station_ID = '$stID' ");
			
					$srows = $ssqur->fetch_array(MYSQLI_NUM);
					$clnm = $srows[0];
					$clnumb = $srows[1];
					$advrt = $srows[2];
					$Slot = $srows[3];
					$pslot = $srows[4];

					$amount = "₦ ".number_format($srows[5]);
					$paid = "₦ ".number_format($srows[6]);
					$balance = "₦ ".number_format($srows[7]);

					$regdate = new datetime($srows[8]);
					$rdate = $regdate->format('d/m/Y');
					$strtdate = new datetime($srows[9]);
					$stdate = $strtdate->format('d/m/Y');
					$comms = $srows[10] ." = ₦" .$srows[11];
					$agenc = $srows[12] ." = ₦" .$srows[13];
					$modeofpay = $srows[14];
					$source = $srows[15];
					$netamount = "₦ " .$srows[16];

				$table .= "<tr>
					<td>$clnm</td><td>$clnumb</td>
					<td>$advrt</td><td>$Slot</td>
					<td>$pslot</td><td>$amount</td>
					<td>$paid</td><td>$balance</td>
					<td>$rdate</td><td>$stdate</td>
					</tr>
					<tr><td style='column-span:all;'><td></tr>
					";

				$table .= "<tr>
					<th>Agent</th><th>Mode of Payment</th>
					<th>Commission</th><th>Agency Pay</th>
					<th>Net Amount</th>
				</tr>";

				$table .= "<tr>
					<td>$source</td><td>$modeofpay</td>
					<td>$comms</td><td>$agenc</td>
					<td>$netamount</td>
				</tr>";
				$table .= "</table>";
			function tablerows ($mtime, $ttable, $day) {
				require "con_Vfm.php";
				global $table; global $advId; global $stID;
				
				$msql = $vfms_con->query("SELECT $mtime, Re_peat FROM $ttable WHERE Advert_ID = '$advId' AND Station_ID = '$stID' ");
				if($msql->num_rows >= 1) {
					$table .= "<table class='table table-bordered tbcost'>";
					$table .= "<tr><th>$day</th><th>For</th></tr>";
					while ($mrow = $msql->fetch_array(MYSQLI_NUM)){
					if($mrow[1] <= 1){
						$w = " Week";
					}else{
						$w = " Weeks";
					}
						$table .="<tr><td>" .$mrow[0] ."</td><td>" .$mrow[1] .$w ."</td></tr>";
					}
				}
				

			}	

			tablerows("M_Time", "t_monday", "Monday");
			tablerows("T_Time", "t_tuesday", "Tuesday");
			tablerows("W_Time", "t_wednesday", "Wednesday");
			tablerows("T_Time", "t_thursday", "Thursday");
			tablerows("F_Time", "t_friday", "Friday");
			tablerows("S_Time", "t_saturday", "Saturday");
			tablerows("S_Time", "t_sunday", "Sunday");
		}
		$table .= "
				</table>
			</body>
			</html>
		";
	echo $table;
	}
?>