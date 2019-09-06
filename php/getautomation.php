<?php
	require "vfmauto_con.php";
	$record_per_page = 10;
	$output = "";
	$page = "";
	if (isset($_POST['automation'])) {
		$page = $_POST['automation'];
	}
	else{
		$page = 1;
	}

	$start_from_page = ($page - 1) * $record_per_page;

	$query = "SELECT ID, artist, title, duration, date_played FROM history ORDER BY ID DESC LIMIT $start_from_page, $record_per_page";
	$result = $vfms_con->query($query);
	
	
	echo "<div class='col-md-4' style='margin-bottom:5px; padding:0px;'><a href='#' class='label label-primary'>Print Report</a></div>";
	$output .= "
		<table class='table table-bordered table-responsive' style='margin-bottom: 5px;'>
		<tr>
			<th>S/N</th>
			<th>Artist</th>
			<th>Track Title</th>
			<th>Duration</th>
			<th id='kv-5'>Date</th>
			<th>Time</th>
		</tr>
	";
	while ($rows = $result->fetch_array(MYSQLI_NUM)){
		$sn = $rows[0];
		$artist = $rows[1];
		$title = $rows[2];
		$durationf = ($rows[3] / 60);
		$durationn = substr($durationf, 0, 3);
		$duration = $durationn ." Min";
		$datep = new DateTime($rows[4]);
		$dateplayed = $datep->format('d/m/Y');
		$timeplayed = $datep->format('h:i:s A');
	
		$output .= "<tr>
				<td>$sn</td>
				<td>$artist</td>
				<td>$title</td>
				<td>$duration</td>
				<td>$dateplayed</td>
				<td>$timeplayed</td>
				</tr>";
	}
	$output .= "
		</table>
	";
	$page_query = "SELECT * FROM history ORDER BY ID DESC";
	$page_result = $vfms_con->query($page_query);
	$total_records = mysqli_num_rows($page_result);
	$total_pages = ceil($total_records / $record_per_page);
	$alwaysShowPages = array(1, 2, 3);

// dynamically add last 3 pages
for ($i = 3; $i >= 0; $i--) {
    $alwaysShowPages[] = $total_pages - $i;
}

for ($i = 1; $i <= $total_pages; $i++) {
    $showPageLink = true;

    if ($total_pages > 10 && !in_array($i, $alwaysShowPages)) {
        if (($i < $page && ($page - $i) > 3)
            || ($i > $page && ($i - $page) > 3)
        ) {
            $showPageLink = false;
        }
    }

    if ($showPageLink) {
        if ($i == $page) {
            $output .= "
			<span class='label label-primary auto_page_link' style='cursor:pointer;' id='".$i."'>".$i."</span>
		";
        } else { 
           $output .= "
			<span class='label label-primary auto_page_link' style='cursor:pointer;' id='".$i."'>".$i."</span>
		";
        }
	}
	echo  $output;
}
?>