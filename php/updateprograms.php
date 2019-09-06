<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}
	elseif (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No'];
    }
    $outpt = "";
		function progschedule ($dttable, $progName) {
		require "con_Vfm.php";
		global $stID, $outpt;
		$gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, 
		T_From, T_To FROM $dttable WHERE P_Name = '$progName' AND Station_ID = '$stID' ");
	
		while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
            $progn = $row[0];
            $outpt = "
            <div id='ProgUpdateFinishedForm'>
                <div class='input-group'>
                    <div class='input-group-btn' style='padding-top:5px;'>
                        <i class='btn btn-danger'>Program</i>
                    </div>
                    <input class='form-control' name='ProgName' value=' " .$progn ." '>
                </div>
                <div class='input-group'>
                    <div class='input-group-btn' style='padding-top:5px;'>
                        <i class='btn btn-danger'>Producer</i>
                    </div>
                    <input class='form-control' name='Producer' value=' " .$row[1] ." '>
                </div>
                <div class='input-group'>
                    <div class='input-group-btn' style='padding-top:5px;'>
                        <i class='btn btn-danger'>Presenter</i>
                    </div>
                    <input class='form-control' name='Presenter' value=' " .$row[2] ." '>
                </div>
                <div class='input-group'>
                    <div class='input-group-btn' style='padding-top:5px;'>
                        <i class='btn btn-danger'>From</i>
                    </div>
                    <input class='form-control timeautocomp' name='Tfrom' value=' " .$row[3] ." '>
                </div>
                <div class='input-group'>
                    <div class='input-group-btn' style='padding-top:5px;'>
                        <i class='btn btn-danger'>To</i>
                    </div>
                    <input class='form-control timeautocomp' name='Tto' value=' " .$row[4] ." '>
                </div>
            </div>
            <hr>
            <div class='input-group col-md-2 col-md-offset-5'>
				<div class='input-group-btn' style='padding-top:5px;'>
					<button class='btn btn-primary' value='$progn' id='ProgUpdateFinish'>Update</button>
                </div>
                <div class='input-group-btn' style='padding-top:5px;'>
					<button class='btn btn-danger'>Cancel</button>
				</div>
            </div>
            ";
            }
		}
        
        if (isset($_POST['ProgName'])) {
            $daysarr = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
            foreach ($daysarr as $dd) {
                progschedule ($dd, $_POST['ProgName']);
            }
            echo $outpt;
        }
        
        if (isset($_POST['ProgName']) & isset($_POST['Producer']) ) {
            $pname = trim($_POST['ProgName']);
            function progscheduleUpdate ($dttable, $progName) {
                $prod = trim($_POST['Producer']);
                $prest = trim($_POST['Presenter']);
                $tfrom = trim($_POST['Tfrom']);
                $tto = trim($_POST['Tto']);
                require "con_Vfm.php";
		        global $stID, $pname;
		        $gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, 
                T_From, T_To FROM $dttable WHERE P_Name = '$progName' AND Station_ID = '$stID' ");
                if ($gpro) {
                   // while ($row = $gpro->fetch_array(MYSQLI_NUM)) {
                    //}
                    $update = $vfms_con->query("UPDATE $dttable SET P_Name = '$pname', 
                    Producer = '$prod', Presenters = '$prest', T_From = '$tfrom', T_To = '$tto'
                    WHERE P_Name = '$progName' AND Station_ID = '$stID' ");
                    if ($update) {
                        echo "Successefully Updated";
                    }
                }
            }

            $daysarr = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
            foreach ($daysarr as $dd) {
                progscheduleUpdate($dd, $pname);
            }

        }

        if (isset($_POST['ProgNameDelete'])) {
            $prodelete = $_POST['ProgNameDelete'];
            function progscheduleDelete ($dttable, $progName) {
                require "con_Vfm.php";
		        global $stID;
		        $gpro = $vfms_con->query("SELECT P_Name, Producer, Presenters, 
                T_From, T_To FROM $dttable WHERE P_Name = '$progName' AND Station_ID = '$stID' ");
                if ($gpro) {
                    $update = $vfms_con->query("DELETE FROM $dttable WHERE P_Name = '$progName' AND Station_ID = '$stID' ");
                    if ($update) {
                        echo "$progName Deleted.";
                    }
                }
            }
        $daysarr = ['p_mon', 'p_tue', 'p_wed', 'p_thu', 'p_fri', 'p_sat', 'p_sun'];
        foreach ($daysarr as $dd) {
            progscheduleDelete($dd, $prodelete);
        }
    }
?>