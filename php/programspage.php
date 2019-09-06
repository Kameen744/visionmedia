  <!-- <div class="panel panel-primary " style="padding:5px; background: rgba(20,20,20,0.8); margin-top: 5px;">
	    <div class="panel-heading" style=" font-size: 20px;">
	        <span class="label"><i class="fa fa-edit fa-fw"></i>Programs</span> 
	        <div class="pull-right">
	        	<a href="#" style="text-decoration: none;" class="pnavbtn" id="RegisterProg"> 
						<span class="label label-danger pnavlabel">Add Program</span>
				</a>

				<a href="#" style="text-decoration: none;" class="pnavbtn" id="presentform">
				<span class="label label-danger pnavlabel">Presentation</span>
				</a>

				<a href="#" class="pnavbtn" id="viewProgsPage">
				<span class="label label-danger pnavlabel">View Records</span>
				</a>
	        </div>
	    </div>

	    <div class="panel-body">
			<div class="row" id="loadreports" style="color:white;">
			</div>
	    </div>
	</div> -->
<?php
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="RegisterProg">Add Program</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="presentform">Presentation</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="viewProgsPage">View Records</a>
	</nav>
	';
	include_once 'layouts/main-card.php';
?>