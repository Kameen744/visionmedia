<?php
require '../php/config/database.php';
 session_start();
 if (isset($_SESSION['vsubuserp']) | isset($_SESSION['vuserp'])){
    if (isset($_SESSION['vsubuserp'])) {
        $subuserid = $_SESSION['Sub_UserID'];
        $ssnm = $_SESSION['vsubuserp'];
        $location = $_SESSION['location'];
        $stationID = $_SESSION['Station_ID_No'];
    }
     
     date_default_timezone_set('Africa/Lagos');
 }
 else{
    header("Location: ../index.php");
 }

if(isset($_POST['Emp_Name'])) {
    $db = new Database();

    $Emp_Name = $_POST['Emp_Name'];
    $Emp_Department = $_POST['Emp_Department'];
    $Spv_Name = $_POST['Spv_Name'];
    $Spv_Title = $_POST['Spv_Title'];
    $Apr_Date = $_POST['Apr_Date'];
    $Emp_Task = $_POST['Emp_Task'];
    $Emp_Task_Year = $_POST['Emp_Task_Year'];
    $Emp_Area_Imp = $_POST['Emp_Area_Imp'];
    $Emp_Challenges = $_POST['Emp_Challenges'];
    $Emp_Bariers = $_POST['Emp_Bariers'];
    $Emp_Training = $_POST['Emp_Training'];
    $Emp_Info = $_POST['Emp_Info'];

    $data = [$subuserid, $stationID, $Emp_Name, $Emp_Department, 
    $Spv_Name, $Spv_Title, $Apr_Date, $Emp_Task, $Emp_Task_Year, 
    $Emp_Area_Imp, $Emp_Challenges, $Emp_Bariers, 
    $Emp_Training, $Emp_Info];

    $datetime = new DateTime();
    $Year = $datetime->format('Y');
    
    $appr = $db->getRow('SELECT `created_At` FROM `vsn_staff_appraisal` 
        WHERE `vsn_staff_id` = ? AND `station_id` = ? AND `created_At` LIKE ?', 
        [$subuserid, $stationID, $Year.'%']);

    if($appr) {
        $_SESSION['appraisalStatus'] = 'Appraisal Form Already Submited';
        header("Location: ../php/vsub_user_area.php");
    } else {
         $insr = $db->insertRow('INSERT INTO `vsn_staff_appraisal`(
        `vsn_staff_id`, `station_id`, `staff_name`, `staff_department`, 
        `supervisor_name`, `supervisor_title`, `appraisal_Date`, 
        `staff_task`, `staff_task_year`, `staff_area_imp`, 
        `staff_challenges`, `staff_bariers`, `staff_training`, 
        `staff_info`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $data);

        if($insr) {
            $_SESSION['appraisalStatus'] = 'Appraisal Form Successefully Submited';
            header("Location: ../php/vsub_user_area.php");
        } else {
            $_SESSION['appraisalStatus'] = 'Form Failed to Submit';
            header("Location: ../php/vsub_user_area.php");
        }
    }
}
if(isset($_POST['S_Emp_Name'])) {
    $db = new Database();
    
    $data = [];

    foreach ($_POST as $post) {
        array_push($data, $db->validate($post));
    }
    
    try {
        $insApp = $db->insertRow('INSERT INTO `vsn_super_appraisal`(`S_Emp_Name`, 
        `Emp_Department`, `App_Period`, `Staff_ID`, `Station_ID`, `Apr_Date`, `Emp_Adj_Change`, 
        `Emp_Comp_Dmnd`, `Emp_Accpt_Inst`, `Adapt_Cmnt`, `Emp_Punctuality`, `Emp_Begin_Time`, 
        `Emp_Finish_Time`, `Emp_Deadline`, `Attnd_Punc_Cmnt`, `Emp_Resp_Inst`, `Emp_Commit`, 
        `Emp_Ask_Hlp`, `Depend_Cmnt`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $data);
        if($insApp) {
            header('Location: staffappraisal.php');
        }
    } catch (\Throwable $th) {
        echo $th;
    }
    // echo json_encode($data);
}

// Array ( [S_Emp_Name] => Bello Abdullahi Abubakar [Emp_Department] => a 
// [App_Period] => a [Staff_ID] => 1316BE [Station_ID] => VSOK7134 
// [Apr_Date] => 2019-06-20 [Emp_Adj_Change] => 1 [Emp_Comp_Dmnd] => 1 
// [Emp_Accpt_Inst] => 1 [Adapt_Cmnt] => cm [Emp_Punctuality] => 1 
// [Emp_Begin_Time] => 1 [Emp_Finish_Time] => 1 [Emp_Deadline] => 1 
// [Attnd_Punc_Cmnt] => cm [Emp_Resp_Inst] => 1 [Emp_Commit] => 1 
// [Emp_Ask_Hlp] => 1 [Depend_Cmnt] => cm ) 

// ["Bello Abdullahi Abubakar","a","a","1316BE","VSOK7134","2019-06-20","1","1","1","cm","1","1","1","1","cm","1","1","1","cm"]

