<?php
session_start();
require_once 'config/database.php';
$db = new Database();
if (isset($_SESSION['vuserp'])) {
	$stID = $_SESSION['Station_ID_No'];
	$adid = $_SESSION['advert_ID'];
}
if (isset($_POST['rptTagtime'])) {
	
	$mdate = $_POST['rptDate'];
	$mtime = $_POST['rptTagtime'];
    $rptTime = $_POST['rptTime'];
	
	$update = $db->updateRow('UPDATE `ended_adverts` SET  `Date_Played`=?,`Time_Played`=?
	WHERE Advert_ID =? Time_Played =? AND Station_ID = ?', [$adid, $mdate, $mtime]);
	
}

if (isset($_POST['deleteRptTime'])) {
	$deltime = $_POST['deleteRptTime'];

    $del = $db->deleteRow('DELETE FROM `ended_adverts` WHERE `Advert_ID` = ? AND
	`Time_Played` =? AND `Station_ID` =?', [$adid, $deltime, $stID]);

	if($deltime) {
		getTable($adid);
	}
}

function getTable ($adid) {
	global $db;
	$getRec = $db->getRows("SELECT `Advert_ID`, `Advert_Name`, `Date_Played`, `Time_Played` 
    FROM `ended_adverts` WHERE `Advert_ID` = ?", [$adid]);
   
    $table = '
        <table class="table table-bordered table-responsive" style="background: rgba(0,0,0,0.3); color: white;">
        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
    ';

    $mon = ''; $tue = ''; $wed = ''; $thu = ''; $fri = ''; $sat = ''; $sun = '';

    foreach($getRec as $val) {
        $dte = new DateTime($val['Date_Played'], new DateTimeZone('Africa/Lagos'));
        $day = $dte->format('D');
        
        $mtime = $val['Time_Played']; 
        $mdate = $val['Date_Played']; 
        
        switch ($day) {
            case 'Mon':
                    $mon .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Tue':
                    $tue .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Wed':
                    $wed .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Thu':
                    $thu .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Fri':
                    $fri .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Sat':
                    $sat .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            case 'Sun':
                    $sun .= "<button class='slotsspan' value='$mtime'> $mdate | $mtime </button>";
                break;
            default:
    
                break;
        }
	}
	
	$table .='
        <tr>
            <td id="Montd">'.$mon.'</td>
            <td id="Tuetd">'.$tue.'</td>
            <td id="Wedtd">'.$wed.'</td>
            <td id="Thutd">'.$thu.'</td>
            <td id="Fritd">'.$fri.'</td>
            <td id="Sattd">'.$sat.'</td>
            <td id="Suntd">'.$sun.'</td>
        </tr>
    </table>';
	echo $table;
}