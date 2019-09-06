<?php
session_start();
require_once 'config/database.php';
$db = new Database();
if (isset($_POST['updTimeId'])) {
    $_SESSION['advert_ID'] = $_POST['updTimeId'];
    $adid = $_SESSION['advert_ID'];
    
    $getRec = $db->getRows("SELECT `Advert_ID`, `Advert_Name`, `Date_Played`, `Time_Played` 
    FROM `ended_adverts` WHERE `Advert_ID` = ?", [$adid]);
   
    $table = '
        <table class="table table-bordered" style="background: rgba(0,0,0,0.3); color: white;">
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

    // function getSlots ($adid, $t_mon, $S_Date, $S_Time) {
    //     global $table;
    //     require "con_Vfm.php";
    //     if (isset($_SESSION['vuserp'])) {
    //     $stID = $_SESSION['Station_ID_No'];
    //     }

    //     $getqur = $vfms_con->query("SELECT $S_Date, $S_Time, Re_peat FROM $t_mon  
    //     WHERE Advert_ID = '$adid' AND Station_ID = '$stID'");
    //         while ($row = $getqur->fetch_array(MYSQLI_NUM)) {
    //             $mdate = $row[0]; $mtime = $row[1]; $rept = $row[2];
    //             $table .= "<td><button class='slotsspan' value='$mtime'> $mdate | $rept Wks | $mtime </button></td>";
    //         }
    // }

    // $garr = ['t_monday', 't_tuesday', 't_wednesday', 't_thursday', 
    // 't_friday', 't_saturday', 't_sunday'];
    // foreach ($garr as $key => $value) {
    // switch ($value) {
    //     case 't_monday':
    //         getSlots($_POST['updTimeId'], $value, 'M_Date', 'M_Time');
    //         break;
    //     case 't_tuesday':
    //         getSlots($_POST['updTimeId'], $value, 'T_Date', 'T_Time');
    //         break;
    //     case 't_wednesday':
    //         getSlots($_POST['updTimeId'], $value, 'W_Date', 'W_Time');
    //         break;
    //     case 't_thursday':
    //         getSlots($_POST['updTimeId'], $value, 'T_Date', 'T_Time');
    //         break;
    //     case 't_friday':
    //         getSlots($_POST['updTimeId'], $value, 'F_Date', 'F_Time');
    //         break;
    //     case 't_saturday':
    //         getSlots($_POST['updTimeId'], $value, 'S_Date', 'S_Time');
    //         break;
    //     case 't_sunday':
    //         getSlots($_POST['updTimeId'], $value, 'S_Date', 'S_Time');
    //         break;
    //     default:
    //         # code...
    //         break;
    // }
    
    // }
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
