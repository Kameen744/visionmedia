<?php
require_once 'config/database.php';
session_start();
if (isset($_SESSION['vsubuserp'])) {
    $db = new Database();
    $stID = $_SESSION['Station_ID_No']; 
       
    if (isset($_POST['subUserID'])) {

        $subuserid = $_SESSION['Sub_UserID'];

        $StfID = $_SESSION['Sub_UserID'];

        $getcv = $db->getRow('SELECT `Staff_ID`, 
        `C_Name` FROM `vsn_staff` WHERE Station_ID = ? AND Staff_ID = ?', [$stID, $StfID]);

        if ($getcv) {
           echo "C.V Created. Click View or Edit Information";
        } else {
            echo "True";
        }
    }
}
?>