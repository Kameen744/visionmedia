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
$expquer = $vfms_con->query("SELECT `Staff_ID`, `Skill_1`, `SkillDesc_1`, 
`Skill_2`, `SkillDesc_2`, `Skill_3`, `SkillDesc_3`, `Skill_4`, `SkillDesc_4`, `Skill_5`, 
`SkillDesc_5`, `Job_1`, `JobCom_1`, `JobFrom_1`, `JobTo_1`, `Job_2`, `JobCom_2`, `JobFrom_2`, 
`JobTo_2`, `Job_3`, `JobCom_3`, `JobFrom_3`, `JobTo_3`, `Job_4`, `JobCom_4`, `JobFrom_4`, `JobTo_4`, 
`Job_5`, `JobCom_5`, `JobFrom_5`, `JobTo_5` 
FROM `vsn_staff_expr` WHERE `Staff_ID` = '$subuserid' AND `Station_ID` = '$stID'");
$row = $expquer->fetch_array(MYSQLI_NUM);
$out = '
<form id="SkillsExperienceEdit">
    <h4 class="btn btn-danger btn-block btn-xs ">Skills</h4>	
    <input type="hidden" name="staffID_No" value="'.$subuserid.'">
<div style="display: none;" class="sfIDNo">
</div>
<div class="row" id="SkillsContain">
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Skill</i>			
		<input type="text" name="skill_1" class="form-control " value="'.$row[1].'">
	</div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Description</i>				
		<input type="text" name="skillDes_1" class="form-control " value="'.$row[2].'">
	</div>
    <div class="col-md-3 form-group col-sm-12">
    	<label class="text-danger font-weight-bold">Skill</i>
		<input type="text" name="skill_2" class="form-control " value="'.$row[3].'">
	</div>
    <div class="col-md-3 form-group col-sm-12">
        <label class="text-danger font-weight-bold">Description</i>			
		<input type="text" name="skillDes_2" class="form-control " value="'.$row[4].'">
	</div>';

if(!empty($row[5])) {
    $out .= '
        <div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skill_1" class="form-control " value="'.$row[5].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skillDes_1" class="form-control " value="'.$row[6].'">
		</div>
    ';
}
if(!empty($row[7])) {
    $out .= '
        <div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skill_2" class="form-control " value="'.$row[7].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skillDes_2" class="form-control " value="'.$row[8].'">
		</div>
    ';
}
if(!empty($row[9])) {
    $out .= '
        <div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skill_3" class="form-control " value="'.$row[9].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">			
		<input type="text" name="skillDes_3" class="form-control " value="'.$row[10].'">
		</div>
    ';
}

$out .= '</div>
<div class="col-12 form-group">
	<button class="btn btn-danger btn-sm" id="AddMoreSkills">
	<i class="fas fa-plus-square"></i> More Skills </button>
</div>
<div class="col-12 form-group"> 
	<h4 class="btn btn-danger btn-block btn-sm ">Workig Experience</h4>	
</div>

<div class="row" id="ExperienceContain">
	<div class="col-md-3 form-group col-sm-12">
		<label class="text-danger font-weight-bold">Job Title</i>			
		<input type="text" name="job_1" class="form-control " value="'.$row[11].'">
	</div>
	<div class="col-md-3 form-group col-sm-12">
		<label class="text-danger font-weight-bold">Company</i>				
		<input type="text" name="jobcom_1" class="form-control " value="'.$row[12].'">
	</div>
	<div class="col-md-3 form-group col-sm-12">
		<label class="text-danger font-weight-bold">Start Date</i>				
		<input type="date" name="jobdatefrom_1" class="form-control " value="'.$row[13].'">
	</div>
	<div class="col-md-3 form-group col-sm-12">
		<label class="text-danger font-weight-bold">End Date</i>				
		<input type="date" name="jobdateto_1" class="form-control " value="'.$row[14].'">
	</div>';
	if (!empty($row[15])) {
        $out .= '
        <div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Job Tittle</i>			
			<input type="text" name="job_1" class="form-control " value="'.$row[15].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Company</i>				
			<input type="text" name="jobcom_1" class="form-control " value="'.$row[16].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Start Date</i>				
			<input type="date" name="jobdatefrom_1" class="form-control " value="'.$row[17].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">End Date</i>				
			<input type="date" name="jobdateto_1" class="form-control " value="'.$row[18].'">
		</div>
        ';
    }
    if (!empty($row[19])) {
        $out .= '
        <div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Job Tittle</i>			
			<input type="text" name="job_2" class="form-control " value="'.$row[19].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Company</i>				
			<input type="text" name="jobcom_2" class="form-control " value="'.$row[20].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Start Date</i>				
			<input type="date" name="jobdatefrom_2" class="form-control " value="'.$row[21].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">End Date</i>				
			<input type="date" name="jobdateto_2" class="form-control " value="'.$row[22].'">
		</div>
        ';
    }
    	if (!empty($row[23])) {
        $out .= '
        <div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Job Tittle</i>			
			<input type="text" name="job_3" class="form-control " value="'.$row[23].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Company</i>				
			<input type="text" name="jobcom_3" class="form-control " value="'.$row[24].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Start Date</i>				
			<input type="date" name="jobdatefrom_3" class="form-control " value="'.$row[25].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">End Date</i>				
			<input type="date" name="jobdateto_3" class="form-control " value="'.$row[26].'">
		</div>
        ';
    }
    if (!empty($row[27])) {
        $out .= '
        <div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Job Tittle</i>			
			<input type="text" name="job_4" class="form-control " value="'.$row[27].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Company</i>				
			<input type="text" name="jobcom_4" class="form-control " value="'.$row[28].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">Start Date</i>				
			<input type="date" name="jobdatefrom_4" class="form-control " value="'.$row[29].'">
		</div>
		<div class="col-md-3 form-group col-sm-12">
			<label class="text-danger font-weight-bold">End Date</i>				
			<input type="date" name="jobdateto_4" class="form-control " value="'.$row[30].'">
		</div>
        ';
    }
$out .= '</div>
	<div class="col-12 form-group">
		<button class="btn btn-danger btn-sm" id="AddMoreExperience">
		<i class="fas fa-plus-square"></i> More Experience 
		</button>
    </div>
<div class="col-12 text-center" id="skillsEditSuccess">	
</div>
<div class="col-12 form-group">
	<hr>
	<button id="SkillsExperienceUpdate" class="btn btn-danger btn-block btn-lg">Update</button>
</div>
</form>
';
echo $out;