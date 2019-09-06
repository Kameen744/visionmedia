<?php
session_start();
require "con_Vfm.php";
if (isset($_SESSION['vsubuserp'])) {
    $stID = $_SESSION['Station_ID_No']; 
    $subuserid = $_SESSION['Sub_UserID'];
    $ssnm = $_SESSION['vsubuserp'];
    $location = $_SESSION['location'];
} 
if(isset($_POST['StaffIDNo'])){
    if(!empty($_POST['StaffIDNo'])) {
      $subuserid = $_POST['StaffIDNo'];
      $stID = $_SESSION['Station_ID_No']; 
    }
}
$stfquer = $vfms_con->query("SELECT Staff_ID, C_Name, C_Number, C_Email, 
		C_Dateofbirth, C_Gender, C_Maritalstatus, C_State, C_Lga, C_Address, C_Qualification, 
		C_Title, C_Bank, C_AccNumber, C_AccName, C_Nationality 
        FROM vsn_staff WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");

$out = '
    <form id="RegStaffFormEdit">
    <h4 class="btn btn-danger btn-sm btn-block">Bio Data</h4>
    <input type="hidden" name="staffID_No" value="'.$subuserid.'">
    <div class="row">
';
while ($row = $stfquer->fetch_array(MYSQLI_NUM)) {
    $out .= '                
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Full Name:</i>
        <input type="text" name="S_Name" value="'.$row[1].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Phone Number:</i>
        <input type="text" name="S_Number" value="'.$row[2].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">E-mail Address:</i>
        <input type="email" name="S_Email" value="'.$row[3].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Date of Birth:</i>
        <input type="date" name="S_Dateofbirth" value="'.$row[4].'" class="form-control ">
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Gender:</i>
        <input type="text" name="S_Gender" value="'.$row[5].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Marital Status:</i>
        <input type="text" name="S_Maritalstatus" value="'.$row[6].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Nationality:</i>
        <input type="text" name="S_Natiolity" value="'.$row[15].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">State of Origin:</i>
        <input type="text" name="S_State" value="'.$row[7].'" class="form-control ">
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Local Government:</i>
        <input type="text" name="S_Lga" value="'.$row[8].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Contact Address:</i>
        <input type="text" name="S_Address" value="'.$row[9].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Highers Qualification:</i>
        <input type="text" name="S_Qualification" value="'.$row[10].'" class="form-control ">
    </div>	
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Job Title:</i>
        <input type="text" name="S_Title" value="'.$row[11].'" class="form-control ">
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Grade Level:</i>
        <select type="disabled" name="S_Level" class="form-control ">
            <option value="">Grade Level</option>
        </select>
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Bank:</i>
        <input type="text" name="S_Bank" value="'.$row[12].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Account Name:</i>
        <input type="text" name="S_AccName" value="'.$row[14].'" class="form-control ">
    </div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Account Number:</i>
        <input type="text" name="S_AccNumber" value="'.$row[13].'" class="form-control ">
    </div>
</div>
<hr>
<div class="col-12 text-center text-success" id="savestaffidsuccessEdit">	
</div>
<div class="col-12">
    <hr>
	<button id="RegisterNewStaffEdit" class="btn  btn-danger btn-block">Update</button>
</div>
</form>
';
}
echo $out;