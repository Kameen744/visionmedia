<?php
 date_default_timezone_set('Africa/Lagos');
class getfile 
{ 
    public function getlogtable ($pageno) {
        require "../con_Vfm.php";
        if($pageno >= 1) {
            $this->getLogDb($pageno);
        } else {
        $dte = date("Y-m-d");
        $ext = '.m3u';
        $filepath = "C:\Users\KML\Documents\VirtualDJ\History";
        $files = new FilesystemIterator($filepath, FilesystemIterator::UNIX_PATHS);
        $sub = [];
        foreach ($files as $file) {
            if($file->getExtension() === 'txt'){
            $open = $file->openFile('r+');
            $open->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::READ_CSV | SplFileObject::DROP_NEW_LINE);
       
            foreach ($open as $line) {
                $linetrim = trim($line[0]);
                array_push($sub, $linetrim);
                }
            $ovr = fopen($file, 'w');
            }
        }
        foreach ($sub as $key => $value) {
            $string = preg_replace('/[^\p{L}\p{N}]/u', '', $value);
            $datep = substr($string, 0, 16);
            if($datep == "VirtualDJHistory") {
                $mdate = substr($value, -10);
            } 
            elseif( $value == "------------------------------") {
                
            }  
            else {
                $name = substr_replace($value, "", 0, 8);
                if($name != "") {
                    $time = substr($value, 0, 5); 
                    $dbdate = new DateTime($mdate);
                    $dddate = $dbdate->format('Y-m-d');
                    $stmt = $vfms_virtual->query("INSERT log_data (File_Name, Date_Played, Time_Played) 
                        VALUES ('$name', '$dddate', '$time')");
                }
            } 
          }
          $this->getLogDb(1);
        }
        
    }

    public function getLogDb ($page) {
        $record_per_page = 10;
        $start_from_page = ($page - 1) * $record_per_page;
         require "../con_Vfm.php";
         echo "<div class='col-md-4' style='margin-bottom:5px; padding:0px;'>
         <a href='#' class='label label-primary' id='printLog'>Print Log</a></div>";
         $table = "<table class='table table-bordered' style='background:rgba(0,0,0,0.3)'>
        <tr><th>S/No</th><th>Add/File Name</th><th>Date Played</th><th>Time Played</th></tr>";
        $mdate = "";

        $gstm = $vfms_virtual->query("SELECT * FROM log_data 
        ORDER BY `ID` DESC LIMIT $start_from_page, $record_per_page");
         while($row = $gstm->fetch_array(MYSQLI_NUM)) {
            $evenable = new DateTime($row[2]);
            $evdate = $evenable->format('D d-m-Y');
            $mmtime = new DateTime($row[3]);
            $dtfor = $mmtime->format('g:i A'); 
            $table .= "<tr><th>" .$row[0] ."</th><th>" .$row[1] ."</th><th>" 
            .$evdate ."</th><th>" .$dtfor ."</th></tr>";
        }
        $table .= "</table>";
        $gstmt = $vfms_virtual->query("SELECT * FROM log_data");
        $total_records = mysqli_num_rows($gstmt);
	    $total_pages = ceil($total_records / $record_per_page);
        $alwaysShowPages = array(1, 2, 3);
        for ($i = 3; $i >= 0; $i--) {
    $alwaysShowPages[] = $total_pages - $i;
}

    for ($i = 1; $i <= $total_pages; $i++) {
        $showPageLink = true;

        if ($total_pages > 10 && !in_array($i, $alwaysShowPages)) {
            if (($i < $page && ($page - $i) > 3) || ($i > $page && ($i - $page) > 3)) {
                $showPageLink = false;
            }
        }

        if ($showPageLink) {
            if ($i == $page) {
                $table .= "
                <button class='btn btn-primary btn-xs getlog_page_link' id='".$i."'>".$i."</button>
            ";
            } else { 
            $table .= "
                <button class='btn btn-primary btn-xs getlog_page_link' id='".$i."'>".$i."</button>
            ";
            }
        }
    }
        $table .= "
        <div id='printLogDialog'></div>
        ";
        echo $table;
    }

     public function printAllLogData ($datFrom, $datTo, $LogByName) {
        require "../con_Vfm.php";
        if (empty($LogByName)) {
            $getQuery = $vfms_virtual->query("SELECT * FROM `log_data` WHERE 
            `Date_Played` >= '$datFrom' AND `Date_Played` <= '$datTo'");
        } else {
            $getQuery = $vfms_virtual->query("SELECT * FROM `log_data` WHERE 
            `File_Name` REGEXP '$LogByName' AND `Date_Played` >= '$datFrom' 
            AND `Date_Played` <= '$datTo'");
        }
        $reporttitle = 'Vision FM Log From ' .$datFrom .' to ' .$datTo;
        require '../reportheader.php';
		$count = 1;
        $table .= "
		<table class='table table-bordered'><tr>
			<th>S/N</th>
            <th>File Name</th>
            <th>Date Played</th>
			<th>Time Played</th>
        </tr>";
        $tablerows = "";
        while($row = $getQuery->fetch_array(MYSQLI_NUM)) {
            $mmtime = new DateTime($row[3]);
            $dtfor = $mmtime->format('g:i A');
                $tablerows .=  "<tr><td>" .$count ."</td>
                <td>" .$row[1] ."</td><td>" .$row[2] ."</td>
                <td>" .$dtfor ."</td></tr>";
                $count ++;
			}
        $table .= $tablerows ."</table></body></html>";
		echo $table;
		}
}
?>