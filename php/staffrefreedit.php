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
$nexquer = $vfms_con->query("SELECT `Staff_ID`, `C_Next_of_kin`, 
    `C_Relation`, `C_Number`, `C_Address`, `C_Refreeone`, `C_Refreeone_Tit`, `C_Refreeone_Num`, 
    `C_Refreeone_Add`, `C_Refreetwo`, `C_Refreetwo_Tit`, `C_Refreetwo_Num`, `C_Refreetwo_Add`, 
    `C_Refreethree`, `C_Refreethree_Tit`, `C_Refreethree_Num`, `C_Refreethree_Add` 
    FROM `vsn_staff_next` WHERE `Staff_ID` = '$subuserid' AND `Station_ID` = '$stID' "); 
$row = $nexquer->fetch_array(MYSQLI_NUM);
$out = '
<form id="NexofkinandRefreesEditForm">
    <h4 class="btn btn-danger btn-sm btn-block">Next of Kin</h4>	
    <input type="hidden" name="staffID_No" value="'.$subuserid.'">
	<!-- Next of Kin  -->
<div style="display: none;" class="sfIDNo">	
</div>
<div class="row">
	<div class="form-group col-sm-12 col-md-3">
		<label class="text-danger font-weight-bold">Next of Kin</i>	
		<input type="text" name="S_Nexofkin" class="form-control " value="'.$row[1].'">
	</div>
	<div class="form-group col-sm-12 col-md-3">
		<label class="text-danger font-weight-bold">Relationship</i>	
		<input type="text" name="S_Nexofkinrel" class="form-control " value="'.$row[2].'">
	</div>
	<div class="form-group col-sm-12 col-md-3">
		<label class="text-danger font-weight-bold">Phone Number</i>	
		<input type="text" name="S_Nexofkinnum" class="form-control " value="'.$row[3].'">
	</div>
	<div class="form-group col-sm-12 col-md-3">
		<label class="text-danger font-weight-bold">Contact Address</i>	
		<input type="text" name="S_Nexofkinadd" class="form-control " value="'.$row[4].'">
	</div>
</div>
<hr>
<h4 class="btn btn-danger btn-sm btn-block">Refrees</h4>
	<!-- Refree 1  -->
<div class="row">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 1</label>
		<input name="S_Refreeone" class="form-control " value="'.$row[5].'">
	</div>
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Refonetit" class="form-control " value="'.$row[6].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Refonenum" class="form-control " value="'.$row[7].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Address</label>
		<input type="text" name="S_Refoneadd" class="form-control " value="'.$row[8].'">
	</div>
</div>
	<!-- Refree 2  -->
<div class="row">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 2</label>
		<input name="S_Refreetwo" class="form-control " value="'.$row[9].'">
	</div>
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Reftwotit" class="form-control " value="'.$row[10].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Reftwonum" class="form-control " value="'.$row[11].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Address</label>
		<input type="text" name="S_Reftwoadd" class="form-control " value="'.$row[12].'">
	</div>
</div>

<!-- Refree 3  -->
<div class="row">
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Referee 2</label>
		<input name="S_Refreethree" class="form-control " value="'.$row[13].'">
	</div>
	<div class="form-group col-sm-12 col-md-4">
		<label class="label label-danger">Title</label>
		<input type="text" name="S_Refthreetit" class="form-control " value="'.$row[14].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Phone Number</label>
		<input type="text" name="S_Refthreenum" class="form-control " value="'.$row[15].'">
	</div>
	<div class="form-group col-sm-12 col-md-2">
		<label class="label label-danger">Address</label>
		<input type="text" name="S_Refthreeadd" class="form-control " value="'.$row[16].'">
	</div>
</div>

<div class="col-12 text-center" id="NexofkinEditsuccess">	
</div>
<div class="col-12">
	<hr>
	<button id="NexofkinSubmEdit" class="btn  btn-danger btn-block bnt-xx">Update</button>
</div>
</form>
';
echo $out;