<?php
if(isset($_POST['StaffIDNo'])) {
    $id = $_POST['StaffIDNo'];
} else {
    $id = "";
}
$ddte = date("d/m/Y");
$tabname = 'Edit Data';
$cardnav = '
<nav class="nav justify-content-center">
	
	<button class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="editBioData" value="'.$id .'">Edit Bio Data</button>
	<button class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="editSchools" value="'.$id .'">Schools Attended</button>
	<button class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="editSkillsExp" value="'.$id .'">Skills & Experience</button>
	<button class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="editRefreesNex" value="'.$id .'">Refrees</button>
</nav>
<input type="hidden" name="" value="$ddte" id="todaysadd">
<script type="text/javascript">
$(".logDatpick").datepicker({dateFormat: "yy-mm-dd"});
</script>
';
include_once 'layouts/main-card.php';
?>
       