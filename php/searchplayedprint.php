<?php  
session_start();
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }
    $reporttitle = "Log";
    require_once "reportheader.php";
    $output = $table;
    $output .= "
	<table class='table table-bordered' style='margin-bottom: 5px;'>
		<tr>
			<th>S/N</th>
			<th>Artist</th>
			<th>Track Title</th>
			<th>Duration</th>
			<th id='kv-5'>Date</th>
			<th>Time</th>
		</tr>
	";

   function getRecd ($text) {
    global $output; 
    $count = 1;
    require "vfmauto_con.php";
    $query = $vfms_con->query("SELECT artist, title, duration, date_played 
    FROM history WHERE $text 
    ORDER BY date_played ASC");
    while ($rows = $query->fetch_array(MYSQLI_NUM)){
        $artist = $rows[0];
		$title = $rows[1];
		$durationf = ($rows[2] / 60);
		$durationn = substr($durationf, 0, 3);
		$duration = $durationn ." Min";
		$datep = new DateTime($rows[3]);
		$dateplayed = $datep->format('D d/m/Y');
		$timeplayed = $datep->format('h:i:s A');
		$output .= "<tr>
				<td>$count</td>
				<td>$artist</td>
				<td>$title</td>
				<td>$duration</td>
				<td>$dateplayed</td>
				<td>$timeplayed</td>
                </tr>";
                $count++;
    }
    $output .= "</table>";
	
   echo $output;
   }
   
    function getRecdVtdj ($text, $tit) {
    global $table; global $reporttitle;
    $output = $table ."
	<table class='table table-bordered' style='margin-bottom: 5px;'>
		<tr>
			<th>S/N</th>
			<th>File Name</th>
			<th id='kv-5'>Date</th>
			<th>Time</th>
		</tr>
	";
    $count = 1;
	require "con_Vfm.php";
    $query = $vfms_virtual->query("SELECT File_Name, Date_Played, Time_Played 
    FROM log_data WHERE $text 
    ORDER BY Date_Played ASC");
    while ($rows = $query->fetch_array(MYSQLI_NUM)){
        $artist = $rows[0];
		$datep = new DateTime($rows[1]);
		$dateplayed = $datep->format('D d/m/Y');
		$timep = new DateTime($rows[2]);
		$timeplayed = $timep->format('h:i:s A');
		$output .= "<tr>
				<td>$count</td>
				<td>$artist</td>
				<td>$dateplayed</td>
				<td>$timeplayed</td>
                </tr>";
                $count++;
    }
    $output .= "
		</table>
	";
	$reporttitle .= $tit;
   echo $output;
   }
    
if (isset($_POST['srcText']) && !empty($_POST['srcText'])) {
	$text = ($_POST['srcText']);
    getRecdVtdj("File_Name LIKE '%$text%'", $text);
       
}

if (isset($_POST['srcDate']) && !empty($_POST['srcDate'])) {
	$text = ($_POST['srcDate']);
    getRecd("date_played LIKE '$text%' ");
}

if (isset($_POST['srcDateFrom'])) {
	$dateFrom = $_POST['srcDateFrom'];
    $dateTo = $_POST['srcDateTo'];
	getRecd("date_played >= '$dateFrom' AND date_played <= '$dateTo' ");
}