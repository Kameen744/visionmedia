<form id="presentationForm">
<h2 class="rgadfrm alert alert-danger text-center">Presentation</h2>
<div class="row">
		

	<div class="form-group col-md-3 col-sm-12">			
		<input type="text" name="programName" class="form-control " placeholder="Program" required="" id="program">
	</div>
	<div class="form-group col-md-3 col-sm-12">			
		<input type="text" name="programTopicName" class="form-control " placeholder="Topic" required="" id="topicProgram">
	</div>

	<div class="form-group col-md-3 col-sm-12">
		<select name="progType" class="form-control " required="">
			<option>Program Type</option>
			<option value="Live">Live</option>
			<option value="Recorded">Recorded</option>
		</select>
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3 col-sm-12">
		<input class="form-control  pdate" type="text" name="presDate" id="prone" placeholder="Date">
	</div>

	<div class="form-group col-md-3 col-sm-12">
		<input class="form-control  timeautocomp" type="text" name="presTime" id="prtwo" placeholder="Time">
	</div>

	<div class="form-group col-md-2 col-sm-12">
		<select name="noofguest" id="noofguestprest" class="form-control " required="">
			<option>No of guest</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>
	</div>
</div>
<div class="row">
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_1" id="prthree" placeholder="Guest 1">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_1_num" id="prthree" placeholder="Guest Number">
		</div>

		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_2" id="prthree" placeholder="Guest 2">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_2_num" id="prthree" placeholder="Guest Number">
		</div>
</div>
<div class="row">
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_3" id="prthree" placeholder="Guest 3">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_3_num" id="prthree" placeholder="Guest Number">
		</div>
	
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_4" id="prthree" placeholder="Guest 4">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_4_num" id="prthree" placeholder="Guest Number">
		</div>
</div>
<div class="row">
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_5" id="prthree" placeholder="Guest 5">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_5_num" id="prthree" placeholder="Guest Number">
		</div>
	
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_6" id="prthree" placeholder="Guest 6">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input class="form-control " type="text" name="gues_6_num" id="prthree" placeholder="Guest Number">
		</div>
</div>
<div class="row">
	<div class="form-group col-md-12 col-sm-12 alert alert-success" id="presSuccessalert">
		
	</div>	
	<div class="col-12">
		<a href="#" id="savePresentDetails" class="btn btn-danger btn-block text-white">Save</a>
	</div>
</div>
</form>	



<script>
$(".pdate").datepicker({dateFormat: 'yy-mm-dd'});
$(".timeautocomp").autocomplete({
		source: timeautocomp
	});
</script>
