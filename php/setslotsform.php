<!-- Time & Slots Form -->
<form id="RegSlotsForm">
<div class="row">
	<div class="col-md-9">
		<h3 class="rgadfrm label label-danger" id="setSlotHeadertxt"></h3>	
		<div class="row" style="margin-top: 10px;">
			<div class="form-group col-md-3">
				<label class="label label-danger">Date</label>
				<input type="text" class="form-control  pdate" placeholder="Date" id="SetSlotDate" required="">
			</div>
			<div class="form-group col-md-3">
				<label class="label label-danger">Time: Eg. 02:00 PM</label>
				<input type="text" class="form-control  timeautocomp" placeholder="Time" id="SetSlotTime" maxlength="8" minlength="8" required="">
			</div>

			<div class="form-group col-md-3">
				<label class="label label-danger">Repeat: Weeks </label>
				<input type="number" class="form-control  " placeholder="Repeat" id="SetSlotRepeat">
			</div>

			<button class="btn  btn-danger" id="MonSlotTime"><i class="fas fa-plus-square"></i></button>
		</div>
		<div class="col-md-12" style="margin-top: 10px;" id="slotsTableData">
			<table class="table table-bordered table-responsive table-inverse">
				<tr>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</tr>
				<tr>
					<td id="Montd"></td>
					<td id="Tuetd"></td>
					<td id="Wedtd"></td>
					<td id="Thutd"></td>
					<td id="Fritd"></td>
					<td id="Sattd"></td>
					<td id="Suntd"></td>
				</tr>
			</table>
			<div class="col-md-12" style="overflow: auto;" id="timeToUpdateCont"></div>
		</div>
	</div>

	<div class="col-md-3" style="background: #BC3437; padding-bottom: 5px;">
    	<h3 id="RemainingSlots" class="text-white text-center"></h3>
		<hr>
		<div style="position:relative; width: 250px; height: 280px; overflow:auto; font-size: 12px;" id="AvailsRes">	
		</div>
		<button href="#" class="btn  btn-danger btn-xs" id="SlotSetF">Print Reciept</button>
	</div>
</div>
</form>
	<div id="rptAddModal">
    </div>
<script>
	$(".timeautocomp").autocomplete({
		source: timeautocomp	
	});
	$(".pdate").datepicker({dateFormat: 'yy-mm-dd'});
</script>