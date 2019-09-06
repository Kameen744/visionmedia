<?php
	session_start();
	if (isset($_SESSION['vadminp'])) {
        require "con_Vfm.php";
        $resp = [];
        $stquery = $vfms_con->query("SELECT Station_ID, S_Name, S_Location FROM Stations");
        while($row = $stquery->fetch_array(MYSQLI_NUM)) {
            $st = $row[0]; $stn =  $row[1] ." " .$row[2]; 
            $resp .= ["stName" => "$stn", "stID" => "$st"];
        }

        $out = json_encode($resp);
        echo $out;
    }
?>