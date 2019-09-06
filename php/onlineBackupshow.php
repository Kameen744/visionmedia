
<?php
$ddte = date("d/m/Y");
	$tabname = 'Online Backup';
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="uploadAdverts">Upload Adverts</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="uploadPrograms">Upload Programs</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="uploadStaff">Upload Staff</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="uploadLog">Upload Radio Log</a>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	';
	include_once 'layouts/main-card.php';
?>