<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }
    require "con_Vfm.php";
    if (isset($_POST['getPres'])) {
        $tableh = "
        <button class='btn btn-danger btn-xs' id='presentaionsPrint'>
        <span class='glyphicon glyphicon-print'></span> Print</button>
        <table class='table table-bordered table-responsive'><tr>
        <th>S/N</th><th>Program</th><th>Type</th>
        <th>Guest</th> <th>Number</th>
        <th>Date</th><th>Time</th><th>Action</th>";
        $tableb = "";
        $tableh3 = ""; $tableh5 = ""; $tableh7 = ""; $tableh9 = ""; $tableh11 = ""; $tableh13 = "";
        $pquer = $vfms_con->query("SELECT `ID`, `Prog_Name`, `Prog_Type`, 
        `Guest_one`, `Guest_one_num`, `Guest_two`, `Guest_two_num`, 
        `Guest_three`, `Guest_three_num`, `Guest_four`, `Guest_four_num`, 
        `Guest_five`, `Guest_five_num`, `Guest_six`, `Guest_six_num`, 
        `Prog_Date`, `Prog_Time` FROM `presentation` 
        WHERE `Station_ID` = '$stID' ORDER BY `ID` DESC");
    
        while ($row = $pquer->fetch_array(MYSQLI_NUM)) {
            $gst = ''; $gstNum = '';
        if ($row[3] != "") {
            $gst .= "<li>" .$row[3] ."</li>";
            $gstNum .= "<li>" .$row[4] ."</li>";
        }
        if ($row[5] != "") {
            $gst .= "<li>" .$row[5] ."</li>";
            $gstNum .= "<li>" .$row[6] ."</li>";
        }
        if ($row[7] != "") {
            $gst .= "<li>" .$row[7] ."</li>";
            $gstNum .= "<li>" .$row[8] ."</li>";
        }
        if ($row[9] != "") {
            $gst .= "<li>" .$row[9] ."</li>";
            $gstNum .= "<li>" .$row[10] ."</li>";
        }
        if ($row[11] != "") {
            $gst .= "<li>" .$row[11] ."</li>";
            $gstNum .= "<li>" .$row[12] ."</li>";
        }
        if ($row[13] != "") {
            $gst .= "<li>" .$row[13] ."</li>";
            $gstNum .= "<li>" .$row[14] ."</li>";
        }

        $tableb .= "<tr><td>" .$row[0] ."</td><td>" .$row[1] ."</td><td>" .$row[2] ."</td>
        <td>" .$gst ."</td><td>" .$gstNum ."</td><td>" .$row[15] ."</td><td>" 
        .$row[16] ."</td><td>
        <button class='btn btn-info btn-sm editPresntBtn' value='".$row[0]."'>Edit</button>
        </td></tr>";
       }
       $tablehdtm = "</tr>"; 
       
       $tableh .= $tablehdtm;
       $tablee = "</table>";
       echo $tableh .$tableb .$tablee; 
    }
    // .$tableh3 .$tableh5 .$tableh7 .$tableh9 .$tableh11 .$tableh13
    if (isset($_POST['presPrint'])) {
        date_default_timezone_set("Africa/Lagos");
        $date = date("D d/m/Y");
        $reporttitle = "Programs Live Presentation";
        require_once 'reportheader.php';
        $pquer = $vfms_con->query("SELECT `ID`, `Prog_Name`, `Prog_Type`, 
        `Guest_one`, `Guest_one_num`, `Guest_two`, `Guest_two_num`, 
        `Guest_three`, `Guest_three_num`, `Guest_four`, `Guest_four_num`, 
        `Guest_five`, `Guest_five_num`, `Guest_six`, `Guest_six_num`, 
        `Prog_Date`, `Prog_Time` FROM `presentation` 
        WHERE `Station_ID` = '$stID' ORDER BY `ID` DESC");

        $tableh = $table ."<div style='overflow-wrap: break-word;'>
        <table class='table table-bordered table-responsive'>
        <thead><tr>
            <th>S/N</th> <th>Program / Topic</th> <th>Type</th>
            <th>Guest</th> <th>Number</th>
            <th>Date</th><th>Time</th>
        </tr>
        </thead>
        ";
        $tableb = "";
        
        while ($row = $pquer->fetch_array(MYSQLI_NUM)) {
            $gst = ''; $gstNum = '';
        if ($row[3] != "") {
            $gst .= "<li>" .$row[3] ."</li>";
            $gstNum .= "<li>" .$row[4] ."</li>";
        }
        if ($row[5] != "") {
            $gst .= "<li>" .$row[5] ."</li>";
            $gstNum .= "<li>" .$row[6] ."</li>";
        }
        if ($row[7] != "") {
            $gst .= "<li>" .$row[7] ."</li>";
            $gstNum .= "<li>" .$row[8] ."</li>";
        }
        if ($row[9] != "") {
            $gst .= "<li>" .$row[9] ."</li>";
            $gstNum .= "<li>" .$row[10] ."</li>";
        }
        if ($row[11] != "") {
            $gst .= "<li>" .$row[11] ."</li>";
            $gstNum .= "<li>" .$row[12] ."</li>";
        }
        if ($row[13] != "") {
            $gst .= "<li>" .$row[13] ."</li>";
            $gstNum .= "<li>" .$row[14] ."</li>";
        }

        $tableb .= "<tr><td>" .$row[0] ."</td><td>" .$row[1] ."</td><td>" .$row[2] ."</td>
        <td>" .$gst ."</td><td>" .$gstNum ."</td><td>" .$row[15] ."</td><td>" 
        .$row[16] ."</td></tr>";
       }

       $tablee = "
			</table></div>
			</section>
			<div style='height:10px;'></div>
		</body>
		</html>";
        echo $tableh .$tableb .$tablee;  
    }

    if(isset($_POST['editPresents'])) {
        $id = $_POST['editPresents'];
        $pquer = $vfms_con->query("SELECT `ID`, `Prog_Name`, `Prog_Type`, 
        `Guest_one`, `Guest_one_num`, `Guest_two`, `Guest_two_num`, 
        `Guest_three`, `Guest_three_num`, `Guest_four`, `Guest_four_num`, 
        `Guest_five`, `Guest_five_num`, `Guest_six`, `Guest_six_num`, 
        `Prog_Date`, `Prog_Time` FROM `presentation` 
        WHERE `ID` = '$id' AND `Station_ID` = '$stID'");
        $row = $pquer->fetch_array(MYSQLI_NUM);
        $out = '
        <div class="row">
        <input type="hidden" value="'.$id.'" name="edId">
            <div class="form-group col-md-12 col-sm-12">
                <input class="form-control input-sm" value="'.$row[1].'" name="edProgName" placeholder="Guest 1">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[3].'" name="edGuest1Pr" placeholder="Guest 1">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[4].'" name="edGuest1NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[5].'" name="edGuest2Pr" placeholder="Guest 2">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[6].'" name="edGuest2NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[7].'" name="edGuest3Pr" placeholder="Guest 3">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[8].'" name="edGuest3NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[9].'" name="edGuest4Pr" placeholder="Guest 4">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[10].'" name="edGuest4NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[11].'" name="edGuest5Pr" placeholder="Guest 5">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[12].'" name="edGuest5NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <input class="form-control input-sm" value="'.$row[13].'" name="edGuest6Pr" placeholder="Guest 6">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <input class="form-control input-sm" value="'.$row[14].'" name="edGuest6NumPr" placeholder="Number">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <input class="form-control input-sm" value="'.$row[15].'" name="edDatePr" placeholder="Date">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <input class="form-control input-sm" value="'.$row[16].'" name="edTimeNumPr" placeholder="Time">
            </div>
        </div>
        ';
        echo $out;
    }
    if(isset($_POST['edGuest1Pr']) & isset($_POST['edGuest1NumPr'])) {
        $id = $_POST['edId'];
        $edProgName = $_POST['edProgName'];
        $edDatePr = $_POST['edDatePr']; 
        $edGuest1NumPr = $_POST['edGuest1NumPr'];
        $edGuest1Pr = $_POST['edGuest1Pr'];
        $edGuest2NumPr = $_POST['edGuest2NumPr'];
        $edGuest2Pr = $_POST['edGuest2Pr'];
        $edGuest3NumPr = $_POST['edGuest3NumPr'];
        $edGuest3Pr = $_POST['edGuest3Pr'];
        $edGuest4NumPr = $_POST['edGuest4NumPr'];
        $edGuest4Pr = $_POST['edGuest4Pr'];
        $edGuest5NumPr = $_POST['edGuest5NumPr'];
        $edGuest5Pr = $_POST['edGuest5Pr'];
        $edGuest6NumPr = $_POST['edGuest6NumPr'];
        $edGuest6Pr = $_POST['edGuest6Pr'];
        $edTimeNumPr = $_POST['edTimeNumPr'];
        
        $prequer = $vfms_con->query("UPDATE `presentation` 
        SET `Prog_Name` = '$edProgName', `Guest_one`= '$edGuest1Pr',
        `Guest_one_num`= '$edGuest1NumPr',
        `Guest_two`= '$edGuest2Pr',`Guest_two_num`= '$edGuest2NumPr',
        `Guest_three`= '$edGuest3Pr',`Guest_three_num`= '$edGuest3NumPr',
        `Guest_four`= '$edGuest4Pr',`Guest_four_num`= '$edGuest4NumPr',
        `Guest_five`= '$edGuest5Pr',`Guest_five_num`= '$edGuest5NumPr',
        `Guest_six`= '$edGuest6Pr',`Guest_six_num`= '$edGuest6NumPr',
        `Prog_Date`= '$edDatePr',`Prog_Time`= '$edTimeNumPr'
        WHERE `ID` = '$id' AND `Station_ID`= '$stID'");

        if($prequer) {
            echo 'Successefully Updated';
        } else {
            echo 'Erorr: Fail to update record';
        }
    }