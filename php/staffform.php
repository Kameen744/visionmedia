<?php
require 'config/database.php';
$db = new Database();
$jobs = $db->getRows('SELECT * FROM `vsn_job_title` ORDER BY `job_title` ASC');
?>
<!-- <form id="RegStaffForm">
	<h4 class="rgadfrm alert alert-danger">Bio Data</h4>	
<div class="row">
	<div class="form-group col-md-3 col-sm-12">			
		<input type="text" name="S_Name" class="form-control" placeholder="Full Name" required="" id="ClientNameInput">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_Number" class="form-control" maxlength="11" placeholder="Phone Number" required="">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="email" name="S_Email" class="form-control" placeholder="E-Mail" required="">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="date" name="S_Dateofbirth" class="form-control" placeholder="Date of Birth" required="">
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3 col-sm-12">
		<select type="text" name="S_Gender" class="form-control " required="">
			<option value="">Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<select type="text" name="S_Maritalstatus" class="form-control " required="">
			<option value="">Marital Status</option>
			<option value="Maried">Maried</option>
			<option value="Single">Single</option>
		</select>
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_Natiolity" class="form-control " required="" placeholder="Nationaliy" >
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_State" class="form-control " required="" placeholder="State of Origin" >
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_Lga" class="form-control " placeholder="L.G.A" required="">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_Address" class="form-control " placeholder="Contact Address">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_Qualification" class="form-control " placeholder="Qualification">
	</div>	
	<div class="form-group col-md-3 col-sm-12">
		<select type="text" name="S_Title" id="S_Title" class="form-control " required="">
			<option value="">Job Title</option>
			<?php foreach($jobs as $job): ?>
			<option value="<?= $job['job_title'] ?>"><?= $job['job_title'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3 col-sm-12">
		<select type="text" name="S_Level" id="S_Level" class="form-control " disabled="">
			<option value="">Grade Level</option>
			<option value="Level 01">Level 01</option>
			<option value="Level 02">Level 02</option>
			<option value="Level 03">Level 03</option>
			<option value="Level 04">Level 04</option>
			<option value="Level 05">Level 05</option>
			<option value="Level 06">Level 06</option>
			<option value="Level 07">Level 07</option>
			<option value="Level 08">Level 08</option>
			<option value="Level 09">Level 09</option>
			<option value="Level 10">Level 10</option>
			<option value="Level 11">Level 11</option>
			<option value="Level 12">Level 12</option>
			<option value="Level 13">Level 13</option>
			<option value="Level 14">Level 14</option>
			<option value="Level 15">Level 15</option>
			<option value="Level 16">Level 16</option>
		</select>
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<select type="text" name="S_Bank" id="S_Bank" class="form-control " required="">
			<option value="">Bank</option>
			<option value="Access Bank">Access Bank</option>
			<option value="Diamond Bank">Diamond Bank</option>
			<option value="First Bank">First Bank</option>
			<option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
			<option value="JAIZ Bank">JAIZ Bank</option>
			<option value="Keystone Bank">Keystone Bank</option>
			<option value="Union Bank">Union Bank</option>
			<option value="United Bank for Africa">United Bank for Africa</option>
			<option value="Unity Bank">Unity Bank</option>
			<option value="Zenith Bank">Zenith Bank</option>
			<option value=""></option>
		</select>
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_AccName" class="form-control " placeholder="Account Name">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="S_AccNumber" class="form-control " placeholder="Account Number">
	</div>
</div>
<hr>
<div class="row">
	<div class="col-12 alert alert-success text-center" id="savestaffidsuccess" style="display: none;">	
	</div>
	<div class="col-12">
		<hr>
		<button id="RegisterNewStaff" class="btn btn-danger btn-block text-white">Save & Next</button>
	</div>
	<hr>
</div>
</form>

<!-- Schools Attended with dates -->
<form style="padding-bottom: 5px; display: none;" id="SchoolsAttendedDates">
	<h4 class="rgadfrm alert alert-danger">Schools Atended with Dates</h4>	

	<div style="display: none;" class="sfIDNo"></div>
	<!-- Primary School -->
	<div class="row">
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Primary School</label>
			<input name="S_Primary" class="form-control ">
		</div>
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Qualification Obtained</label>
			<input name="S_PrimaryQual" class="form-control " placeholder="Primary School Certificate" id="PrmQl">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Start From</label>
			<input type="date" name="S_Prfrom" class="form-control " placeholder="1999-12-15">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Finished</label>
			<input type="date" name="S_Prto" class="form-control " placeholder="1999-12-15">
		</div>
	</div>

		<!-- Secondary School -->
	<div class="row">
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Secondary School</label>
			<input name="S_Secondary" class="form-control ">
		</div>
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Qualification Obtained</label>
			<input name="S_SecondaryQual" class="form-control " placeholder="Senior Secondary School Cerficate" id="SecQl">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Start From</label>
			<input type="date" name="S_Secfrom" class="form-control " placeholder="1999-12-15">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Finished</label>
			<input type="date" name="S_Secto" class="form-control " placeholder="1999-12-15">
		</div>
	</div>

		<!-- Tertiary  -->
	<div class="row">
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Tertiary Institution</label>
			<input name="S_Tertiary" class="form-control ">
		</div>
		<div class="form-group col-md-4 col-sm-12">
			<label class="label label-danger">Qualification Obtained</label>
			<input name="S_TertiaryQual" class="form-control " placeholder="ND, OND, HND, NCE, BSc">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Start From</label>
			<input type="date" name="S_Terfrom" class="form-control " placeholder="1999-12-15">
		</div>
		<div class="form-group col-md-2 col-sm-12">
			<label class="label label-danger">Finished</label>
			<input type="date" name="S_Terto" class="form-control " placeholder="1999-12-15">
		</div>
	</div>
	<div class="row" id="SchoolsFormArea">
	</div>

	<div class="col-12" style="padding-top: 10px;">
		<button class="btn btn-danger btn-sm" id="AddMoreSchools">
			Add More Schools <i class="fas fa-plus-square"></i>
		</button>
	</div>
	<hr>
	<div class="col-12 alert alert-success text-center" id="SchoolsAttendedsuccess" style="display: none;">	
	</div>
	<div class="col-12">
		<hr>
		<button id="SchoolsAttended" class="btn btn-danger btn-block ">Save & Next</button>
	</div>
	<hr>

</form>
<!-- Skills & Experience -->
<form style="padding-bottom: 5px; display: none;" id="SkillsExperience">
	<h4 class=" alert alert-danger">Special Skills</h4>	
<div style="display: none;" class="sfIDNo">
		
</div>
<div class="row" id="SkillsContain">
	<div class="col-md-3 col-sm-12 form-group">			
		<input type="text" name="skill_1" class="form-control " placeholder="Skill 1">
	</div>
	<div class="col-md-3 col-sm-12 form-group">			
		<textarea type="text" name="skillDes_1" class="form-control " placeholder="Description 1"></textarea>
	</div>
	<div class="col-md-3 col-sm-12 form-group">			
		<input type="text" name="skill_2" class="form-control " placeholder="Skill 2">
	</div>
	<div class="col-md-3 col-sm-12 form-group">			
		<textarea type="text" name="skillDes_2" class="form-control " placeholder="Description 2"></textarea>
	</div>
</div>

<div class="col-12" style="padding-top: 10px;">
	<button class="btn btn-danger btn-sm" id="AddMoreSkills">
	 More Skills <i class="fas fa-plus-square"></i>
	</button>
</div>

<div class="col-12"> 
	<hr>
	<h4 class="rgadfrm alert alert-danger">Working Experience</h4>	
</div>

<div class="row" id="ExperienceContain">
	<div class="col-md-3 col-sm-12 form-group">
		<i class="label label-danger">Job Title</i>			
		<input type="text" name="job_1" class="form-control " placeholder="Job Title">
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<i class="label label-danger">Company</i>				
		<input type="text" name="jobcom_1" class="form-control " placeholder="Company">
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<i class="label label-danger">Start Date</i>				
		<input type="date" name="jobdatefrom_1" class="form-control " placeholder="From">
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<i class="label label-danger">End Date. Skip if still working there</i>				
		<input type="date" name="jobdateto_1" class="form-control " placeholder="To">
	</div>
</div>

<div class="col-12" style="padding-top: 10px;">
	<button class="btn btn-danger btn-sm" id="AddMoreExperience">
		More Experience <i class="fas fa-plus-square"></i> 
	</button>
</div>
<div class="col-12">
	<hr>
	<button id="SkillsExperienceSubmit" class="btn btn-danger">Save & Next</button>
</div>
</form>

	<!-- Next of Kin & Refrees -->
<form class="col-md-12" style="padding-bottom: 5px; display: none;" id="NexofkinandRefrees">
	<h4 class="rgadfrm alert alert-danger">Next of Kin</h4>	
	<!-- Next of Kin  -->
<div style="display: none;" class="sfIDNo">
		
</div>
<div class="row">
	<div class="col-md-3 col-sm-12 form-group">			
		<input type="text" name="S_Nexofkin" class="form-control " placeholder="Next of kin" required="" >
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<input type="text" name="S_Nexofkinrel" class="form-control " placeholder="Relationship" required="">
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<input type="text" name="S_Nexofkinnum" class="form-control " placeholder="Number" required="">
	</div>
	<div class="col-md-3 col-sm-12 form-group">
		<input type="text" name="S_Nexofkinadd" class="form-control " placeholder="Address" required="">
	</div>
</div>
<hr>
<h4 class="rgadfrm alert alert-danger">Referees</h4>	
	<!-- Refree 1  -->
<div class="row" style="padding:0px; padding-top: 10px;">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 1</label>
		<input name="S_Refreeone" class="form-control ">
	</div>
	<div class="form-group col-sm-12 col-md-4" style="padding: 0px;">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Refonetit" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Refonenum" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Address</label>
		<textarea type="text" name="S_Refoneadd" class="form-control " placeholder=""></textarea>
	</div>
</div>
	<!-- Refree 2  -->
<div class="row" style="padding:0px; padding-top: 10px;">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 2</label>
		<input name="S_Refreetwo" class="form-control ">
	</div>
	<div class="form-group col-sm-12 col-md-4" style="padding: 0px;">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Reftwotit" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Reftwonum" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Address</label>
		<textarea type="text" name="S_Reftwoadd" class="form-control " placeholder=""></textarea>
	</div>
</div>

<!-- Refree 3  -->
<div class="row" style="padding:0px; padding-top: 10px;">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 2</label>
		<input name="S_Refreethree" class="form-control ">
	</div>
	<div class="form-group col-sm-12 col-md-4" style="padding: 0px;">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Refthreetit" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Refthreenum" class="form-control " placeholder="">
	</div>
	<div class="form-group col-sm-12 col-md-2" style="padding: 0px;">
		<label class="label label-danger">Address</label>
		<textarea type="text" name="S_Refthreeadd" class="form-control " placeholder=""></textarea>
	</div>
</div>


<hr>
<div class="col-12 alert alert-success text-center" id="NexofkinRefsuccess" style="display: none;">	
</div>
<div class="col-12">
	<hr>
	<button id="NexofkinRef" class="btn btn-danger btn-block">Save & Finish</button>
</div>
	<hr>
</form> -->

<!-- <script>
	$("#SecQl").autocomplete({
		source: ['Senior Secondary School Cerficate']
	});
	$("#PrmQl").autocomplete({
		source: ['Primary School Certificate']
	});
	$(".timeautocomp").autocomplete({
		source: timeautocomp
	});
	$(".pdate").datepicker({dateFormat: 'yy-mm-dd'});
</script> -->
