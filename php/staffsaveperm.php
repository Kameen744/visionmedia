<?php
	session_start();
	require "con_Vfm.php";
	if (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
    }
    
	elseif (isset($_SESSION['vuserp'])) {
        $stID = $_SESSION['Station_ID_No'];
        $Created = $_SESSION['vuserp'];
        $location = $_SESSION['location']; 
    }

    if (isset($_POST['V_S_User']) & isset($_POST['V_S_Password'])) {
       
            $Username = mysqli_real_escape_string($vfms_con, $_POST['V_S_User']);
            $UserPassword = mysqli_real_escape_string($vfms_con, $_POST['V_S_Password']);
            $sub = substr($Username, 0, 2);
            $subUId = rand(11, 99) .rand(10, 99) .strtoupper($sub);
           
        $userquer = $vfms_con->query("INSERT INTO `vsn_sub_users`(`Sub_User_ID`, 
            `V_S_username`, `V_S_password`, 
            `V_S_Location`, `Station_ID`, 
            `Created_By`)VALUES ('$subUId', '$Username', 
            '$UserPassword', '$location', '$stID', '$Created')");
        if ($userquer) {
            echo "<div class='label label-danger'>Successfully Saved </div>";
        } else {
            echo "<div class='label label-danger'>Error!: Fail to save </div>";
        }
    }
?>