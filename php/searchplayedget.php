<?php  
session_start();
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }
    $output = "
		<table class='table table-bordered table-responsive'>
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
    FROM history WHERE $text ORDER BY date_played ASC");
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
    $output .= "
		</table>
	";
	
   echo $output;
   } 
    
if (isset($_POST['srcText']) && !empty($_POST['srcText'])) {
	$text = ($_POST['srcText']);
	echo "<button value='$text' class='btn btn-primary btn-sm' id='prntSrchName'>Print Report</button>";
    getRecd("artist LIKE '%$text%' OR title LIKE '%$text%'");
       
}

if (isset($_POST['srcDate']) && !empty($_POST['srcDate'])) {
	$text = ($_POST['srcDate']);
	echo "<button value='$text' class='btn btn-primary btn-sm' id='prntSrchDate'>Print Report</button>";
    getRecd("date_played LIKE '$text%' ");
}

if (isset($_POST['dateFrom'])) {
	$dateFrom = $_POST['dateFrom'];
	$dateTo = $_POST['dateTo'];
	echo "
	<input type='hidden' value='$dateFrom' id='srcDateFrom'>
	<input type='hidden' value='$dateTo' id='srcDateTo'>
	<button class='btn btn-primary btn-sm' id='prntSrchFrom'>Print Report</button>";
	getRecd("date_played >= '$dateFrom' AND date_played <= '$dateTo' ");
}