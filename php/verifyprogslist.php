<?php
session_start();
if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }

if (isset($_POST['verData'])) {
    require 'Database/Database.php';
    require 'Database/Logdatabase.php';
    require 'Database/Radiodjlog.php';
    $tabe = "<table class='table table-bordered'>
    <tr><td>Progs/Add Schdule</td><td>Time</td><td>Status</td></tr>";
    $progr = "";
    $advrt = "";
    function getRecords ($date, $param = []) {
        global $progr, $advrt, $tabe, $stID;
        $db = new Database();
        $ads = $db->getRows("SELECT * FROM `ended_adverts` WHERE `Date_Played` = '$date' 
        AND `Station_ID` = '$stID'");
        $prog = $db->getRows("SELECT * FROM p_mon WHERE `Station_ID` = '$stID'");
        foreach ($prog as $key => $prg) {
            $progflnm = $prg['P_Name'];
            $progtmpl = $prg['T_From'];
            $proglog = getVirtualPlayed("SELECT * FROM log_data WHERE `File_Name` 
            LIKE '%$progflnm%' AND `Date_Played` = '$date'");
            if (empty($proglog)){
                $proglognm = $progflnm;
                $proglotym = $progtmpl;
                $progstatus = "Not Played";
                $progclass = "notplayedtracks";
            } else {
                $proglognm = $proglog[0]['File_Name'];
                $newdate = new DateTime($proglog[0]['Time_Played']);
                $proglotym = $newdate->format('g:i A');
                $progstatus = "Played at " .$proglotym;
                $progclass = "playedtracks";
            }
            $progr .= "<tr class=".$progclass."><td>" .$proglognm ."</td><td>". $proglotym ."</td><td>" .$progstatus ."</td></tr>";
        }

        foreach ($ads as $key => $add) {
            $flnm = $add['Advert_Name'];
            $tmpl = $add['Time_Played'];
            $daylog = getVirtualPlayed("SELECT * FROM log_data WHERE `File_Name` 
            REGEXP '$flnm' AND `Date_Played` = '$date'");
            if (empty($daylog)){
                $lognm = $flnm;
                $lotym = $tmpl;
                $status = "Not Played";
                $class = "notplayedtracks";
            } else {
                $lognm = $daylog[0]['File_Name'];
                $newdate = new DateTime($daylog[0]['Time_Played']);
                $lotym = $newdate->format('g:i A');
                $status = "Played at " .$lotym;
                $class = "playedtracks";
            }
            $advrt .= "<tr class=".$class."><td>" .$lognm ."</td><td>". $lotym ."</td><td>" .$status ."</td></tr>";
        }
        echo $tabe .$progr .$advrt ."</table>";
    }

    function getVirtualPlayed ($query, $param = []) {
        $db = new Virtualdj();
        return $db->getRows($query, $param);
    }

    function getRadioLog ($query, $param = []) {
        $db = new Radiodj();
        return $db->getRows($query, $param);
    }
    
    $searchby = new DateTime($_POST['verData']);
    $day = $searchby->format('D');
    $date = $searchby->format('Y-m-d');
    switch ($day) {
        case 'Mon':
            getRecords($date);
        break;
        case 'Tue':
            getRecords($date);
        break;
        case 'Wed':
            getRecords($date);
        break;
        case 'Thu':
            getRecords($date);
        break;
        case 'Fri':
            getRecords($date);
        break;
        case 'Sat':
            getRecords($date);
        break;
        case 'Sun':
            getRecords($date);
        break;
    }

} 