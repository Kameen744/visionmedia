<?php
	require "vfmauto_con.php";
	$record_per_page = 10;
	$output = "";
	$page = "";
	if (isset($_POST['eventgets'])) {
		$page = $_POST['eventgets'];
	}
	else{
		$page = 1;
	}

	$start_from_page = ($page - 1) * $record_per_page;

	$time = "time"; 
	$date = "date";

	$result = $vfms_con->query("SELECT ID, $time, name, $date, enabled FROM events ORDER BY ID DESC LIMIT $start_from_page, $record_per_page");
	
	
	echo "<div class='col-md-4' style='margin-bottom:5px; padding:0px;'><a href='../assets/reports/examples/allplaylistpdf.php' class='btn btn-danger btn-xs'>Generate PDF Report</a> <a class='btn btn-danger btn-xs' id='printEvents'><span class='glyphicon glyphicon-print'></span>Print</a></div>";
	$output .= "
		<table class='table table-bordered' style='margin-bottom: 5px;'>
		<tr>
			<th>S/N</th>
			<th>Name</th>
			<th>Time</th>
			<th>Date</th>
			<th>Enabled</th>
		</tr>
	";
	while ($rows = $result->fetch_array(MYSQLI_NUM)){
		$sn = $rows[0];
		$evname = $rows[1];
		$evtime = $rows[2];
		$evenable = new DateTime($rows[3]);
		$evdate = $evenable->format('D d/m/Y');
		$enabled = $rows[4];
	
		$output .= "<tr>
				<td>$sn</td>
				<td>$evname</td>
				<td>$evtime</td>
				<td>$evdate</td>
				<td>$enabled</td>
				</tr>";
	}
	$output .= "
		</table>
	";
	$page_query = "SELECT * FROM events ORDER BY ID DESC";
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
			<span class='label label-primary get_event_page' style='cursor:pointer;' id='".$i."'>".$i."</span>
		";
        } else { 
           $output .= "
			<span class='label label-primary get_event_page' style='cursor:pointer;' id='".$i."'>".$i."</span>
		";
        }
    }
}
	echo  $output;

?>