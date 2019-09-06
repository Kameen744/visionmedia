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
$schquer = $vfms_con->query("SELECT `Staff_ID`,`C_Prm`, 
    `C_PrmQual`, `C_PrmFrom`, `C_PrmTo`, `C_Sec`, `C_SecQual`, `C_SecFrom`, 
    `C_SecTo`, `C_Ter`, `C_TerQual`, `C_TerFrom`, `C_TerTo`, `C_ScOne`, 
    `C_ScOneQual`, `C_ScOneFrom`, `C_ScOneTo`, `C_ScTwo`, `C_ScTwoQual`, 
    `C_ScTwoFrom`, `C_ScTwoTo`, `C_ScThree`, `C_ScThreeQual`, `C_ScThreeFrom`, 
    `C_ScThreeTo`, `C_ScFour`, `C_ScFourQual`, `C_ScFourFrom`, `C_ScFourTo`, 
    `C_ScFive`, `C_ScFiveQual`, `C_ScFiveFrom`, `C_ScFiveTo` 
    FROM `vsn_staff_schools` WHERE `Staff_ID` = '$subuserid'
    AND `Station_ID` = '$stID'");
$row = $schquer->fetch_array(MYSQLI_NUM);

 $out = '
    <form id="EditSchoolsAtt">	
	<h4 class="btn btn-danger btn-sm btn-block">Schools Atended with Dates</h4>
	<input type="hidden" name="staffID_No" value="'.$subuserid.'">
    <div class="row">
		<div style="display: none;" class="sfIDNo">	
		</div>
		<!-- Primary School -->
		<div class="col-12" style="padding:0px; padding-top: 10px;">
		</div>
		
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Primary School</label>
			<input name="S_Primary" class="form-control " value="'.$row[1].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_PrimaryQual" class="form-control " value="'.$row[2].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_Prfrom" class="form-control " value="'.$row[3].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_Prto" class="form-control " value="'.$row[4].'">
		</div>
	</div>
	
		<!-- Secondary School -->
	<div class="row">
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Secondary School</label>
			<input name="S_Secondary" class="form-control " value="'.$row[5].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_SecondaryQual" class="form-control " value="'.$row[6].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_Secfrom" class="form-control " value="'.$row[7].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_Secto" class="form-control " value="'.$row[8].'">
		</div>
	</div>

		<!-- Tertiary  -->
	<div class="row">
		<div class="form-group col-sm-12 col-md-4" >
			<label class="text-danger font-weight-bold">Tertiary Institution</label>
			<input name="S_Tertiary" class="form-control " value="'.$row[9].'">
		</div>
		<div class="form-group col-sm-12 col-md-4" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_TertiaryQual" class="form-control " value="'.$row[10].'">
		</div>
		<div class="form-group col-sm-12 col-md-2">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_Terfrom" class="form-control " value="'.$row[11].'">
		</div>
		<div class="form-group col-sm-12 col-md-2">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_Terto" class="form-control " value="'.$row[12].'">
		</div>
	</div>
';
if(!empty($row[13])) {
    $out .= '
    <div class="row">
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Other Institution</label>
			<input name="S_OtherSch1" class="form-control " value="'.$row[13].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_OtherQual1" class="form-control " value="'.$row[14].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_OtherFrom1" class="form-control " value="'.$row[15].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_OtherTo1" class="form-control " value="'.$row[16].'">
		</div>
	</div>
  ';
}
if(!empty($row[17])) {
    $out .= '
    <div class="row">
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Other Institution</label>
			<input name="S_OtherSch2" class="form-control " value="'.$row[17].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_OtherQual2" class="form-control " value="'.$row[18].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_OtherFrom2" class="form-control " value="'.$row[19].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_OtherTo2" class="form-control " value="'.$row[20].'">
		</div>
	</div>
  ';
}
if(!empty($row[21])) {
    $out .= '
    <div class="row">
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Other Institution</label>
			<input name="S_OtherSch3" class="form-control " value="'.$row[21].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_OtherQual3" class="form-control " value="'.$row[22].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_OtherFrom3" class="form-control " value="'.$row[23].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_OtherTo3" class="form-control " value="'.$row[24].'">
		</div>
	</div>
  ';
}
if(!empty($row[25])) {
    $out .= '
    <div class="row">
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Other Institution</label>
			<input name="S_OtherSch4" class="form-control " value="'.$row[25].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_OtherQual4" class="form-control " value="'.$row[26].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_OtherFrom4" class="form-control " value="'.$row[27].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_OtherTo4" class="form-control " value="'.$row[28].'">
		</div>
	</div>
  ';
}
if(!empty($row[29])) {
    $out .= '
    <div class="row">
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Other Institution</label>
			<input name="S_OtherSch5" class="form-control " value="'.$row[29].'">
		</div>
		<div class="form-group col-sm-12 col-md-3" >
			<label class="text-danger font-weight-bold">Qualification Obtained</label>
			<input name="S_OtherQual5" class="form-control " value="'.$row[30].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Start From</label>
			<input type="date" name="S_OtherFrom5" class="form-control " value="'.$row[31].'">
		</div>
		<div class="form-group col-sm-12 col-md-3">
			<label class="text-danger font-weight-bold">Finished</label>
			<input type="date" name="S_OtherTo5" class="form-control " value="'.$row[32].'">
		</div>
	</div>
  ';
}
$out .= '
<div class="row" id="SchoolsFormArea">
</div>
<div class="col-12" style="padding-top: 10px;">
	<button class="btn btn-danger btn-sm" id="AddMoreSchools">
	<i class="fas fa-plus-square"></i> Add More Schools
	</button>
</div>
<hr>
<div class="col-12 text-center" id="SchoolsAttendedsuccessEdit">	
</div>
<div class="col-12">
	<hr>
	<button id="SchoolsAttendedEdit" class="btn  btn-danger btn-block">Update</button>
</div>
<hr>
</form>
';
echo $out;