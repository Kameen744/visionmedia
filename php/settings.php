<?php
session_start();
require "config/database.php";

if(isset($_SESSION['vadminp'])) {
	$db = new Database();
	$stations = $db->getRows('SELECT * FROM stations');
}
$ddte = date("d/m/Y");
	$tabname = 'Stations & Users';
	$cardnav = '
	
	';
?>
<div class="card">
	<div class="card-header p-0">
	<input type="hidden" value="$ddte" id="todaysadd">
		<nav class="nav justify-content-center">
			<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="RegStation">Register Stations</a>
			<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="viewEditUsersBtn">View / Edit Users</a>
			<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="RegUsers">Add Users</a>
		</nav>
	</div>
	<div class="card-body">
		<div class="row text-center" style="display:none;" id="settingsalert">
		<hr>
		</div>
		<div class="row" style="display: none;" id="ManageStationsBody">
		</div>
		<div class="row" style="display: none;" id="Userscontainer">
			<div class="col-12"><h2 class="text-center">Add Users</h2></div>
			
			<hr>

			<div class="form-group col-lg-3">
				<input type="text" class="form-control" id="VUserName" placeholder="UserName">
			</div>
			<div class="form-group col-lg-3">
				<input type="text" class="form-control" id="VPassword" placeholder="Password">
			</div>
			<div class="form-group col-lg-3">
				<select class="form-control" id="StLocation" required="">
					<option value="">Station/Location</option>
				</select>
			</div>
			<div class="form-group col-lg-3">
				<input type="text" class="form-control" id="VStatus" placeholder="Status">
			</div>
			
			<div class="col-12">
				<button class="btn btn-block btn-danger" id="SaveUser">Save User</button>
			</div>
		</div>

		<div class="row" style="display: none;" id="Stationscontainer">
			<div class="col-12"><h2 class="text-center">Register Stations</h2></div>
			
			<hr>	
			<div class="form-group col-lg-3" style="">
				<select class="form-control " id="Station" required="">
					<option value="">Station</option>
					<option value="Vision FM">Vision FM</option>
					<option value="Farin Wata">Farin Wata</option>
				</select>
			</div>
			<div class="form-group col-lg-3">
				<input type="text" class="form-control " id="Location" placeholder="State">
			</div>
			<div class="form-group col-lg-3">
				<input type="text" class="form-control " id="Address" placeholder="Address">
			</div>
			<div class="form-group col-lg-3">
				<input type="text" class="form-control " id="Cnumber" placeholder="Contact Number">
			</div>
			<div class="col-12">
			<hr>
				<button class="btn btn-block btn-danger" id="SaveStation">Save Station</button>
			</div>
		</div>
				
	</div>

	<div class="card-footer text-muted text-center">
		<?php if(isset($tabname)): ?>
  			<strong><?= $tabname ?></strong>
		<?php endif; ?>
	</div>
</div>
<script>
	$("#Location").autocomplete({
		source: ['Abuja', 'Adamawa', 'Bauchi', 'Maiduguri', 'Niger', 'Kano', 
		'Kaduna', 'Katsina', 'Kebbi', 'Sokoto', 'Gombe', 'Zamfara'
		]
	});	
</script>