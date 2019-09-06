
<?php
$ddte = date("d/m/Y");
$tabname = 'Staff Info';
$cardnav = '
<nav class="nav justify-content-center">
	
	
	<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="ViewStaff">View Staff Info</a>
	<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="../appraisal/staffappraisal.php" id="staffAppraisal">Staff Appraisal</a>
</nav>
<input type="hidden" name="" value="$ddte" id="todaysadd">
<script type="text/javascript">
$(".logDatpick").datepicker({dateFormat: "yy-mm-dd"});
</script>
';
include_once 'layouts/main-card.php';
?>
<!-- <a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="addUserPermission">Add User</a> -->
<!-- <a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="RegisterStaff">Add New Staff</a> -->