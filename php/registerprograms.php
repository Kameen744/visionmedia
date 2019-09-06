<form id="RegProgramsForm">
	<?php $tabname = 'Programs'; ?>
	<div class="row">
		<div class="form-group col-md-3 col-sm-12">			
			<input type="text" name="prog" class="form-control " placeholder="Program" required="" id="program">
		</div>

		<div class="form-group col-md-3 col-sm-12">
			<input type="text" class="form-control " name="produc" id="producer" placeholder="Producer" required="">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<select name="nopr" id="noofpresenters" class="form-control " required="">
				<option>No of Presenters</option>
				<option value="1">One</option>
				<option value="2">Two</option>
				<option value="3">Three</option>
			</select>
		</div>

		<div class="form-group col-md-3 col-sm-12" style="display: none;" id="pr1">
			<input class="form-control " type="text" name="pr1" id="prone" placeholder="Presenter ">
		</div>
	</div>

<div class="row">
	<div class="form-group col-md-4 col-sm-12" style="display: none;" id="pr2">
		<input class="form-control " type="text" name="pr2" id="prtwo" placeholder="Second Presenter">
	</div>
	<div class="form-group col-md-4 col-sm-12" style="display: none;" id="pr3">
		<input class="form-control " type="text" name="pr3" id="prthree" placeholder="Third Presenter">
	</div>
</div>

<div class="row">
	<div class=" form-group col-md-4 col-sm-12 mx-1">
		<label class="text-dark">From: Eg. 01:00 PM</label>
		<input type="text" class="form-control  timeautocomp" name="frm" placeholder="01:00 PM" id="sunfr" maxlength="8" minlength="8">
	</div>
	<div class=" form-group col-md-4 col-sm-12 mx-1">
		<label class="text-dark">To: Eg. 01:30 PM</label>
		<input type="text" class="form-control  timeautocomp" name="tto" placeholder="01:30 PM" id="sunto" maxlength="8" minlength="8">
	</div>
</div>

<div class="row p-2">
	<div class="col-12">
		<h4 class="text-dark">Fresh/Repeat</h4>
	</div>
	
	
	<div class="form-group p-1">
		<label class="btn btn-danger" for="Daily" id="DailyLab">Daily
		<input type="checkbox" name="Daily" value="" id="Daily">
		</label>
		
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Mon" id="MonLab">Monday
			<input type="checkbox" name="Mon" value="" id="Mon">
		</label>
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Tue" id="TueLab">Tuesday
			<input type="checkbox" name="Tue" value="" id="Tue">
		</label>
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Wed" id="WedLab">Wednesday
			<input type="checkbox" name="Wed" value="" id="Wed">
		</label>	
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Thu" id="ThuLab">Thursday
			<input type="checkbox" name="Thu" value="" id="Thu">
		</label>
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Fri" id="FriLab">Friday
			<input type="checkbox" name="Fri" value="" id="Fri">
		</label>
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Sat" id="SatLab">Saturday
			<input type="checkbox" name="Sat" value="" id="Sat">
		</label>
	</div>
	<div class="form-group p-1">
		<label class="btn btn-secondary" for="Sun" id="SunLab">Sunday
			<input type="checkbox" name="Sun" value="" id="Sun">
		</label>
	</div>
	
	
	<div class="col-12">
		<a href="#" class="btn btn-danger btn-block text-white" id="SunSets">Save</a>
	</div>

</div>	
</form>	

<div class="row" id="regProgResp">

</div>


<script>
$(".timeautocomp").autocomplete({
	source: timeautocomp
});
$( "#noofpresenters" ).change(function(){
	var prval = $(this).val();
	if (prval == 1) {
		$("#pr1, #pr2, #pr3").fadeOut();
		$("#pr1").fadeIn();
	}
	else if (prval == 2) {
		$("#pr1, #pr2, #pr3").fadeOut();
		$( "#pr1, #pr2").fadeIn();
	}
	else if (prval == 3) {
		$("#pr1, #pr2, #pr3").fadeOut();
		$( "#pr1, #pr2, #pr3").fadeIn();
	}
})
</script>
