<!-- Time & Slots Form -->
<form class="col-md-12" id="RegSlotsForm">
	<div class="col-md-9">
		<h3 class="rgadfrm label label-danger" id="setSlotHeadertxt"></h3>	
		<div class="col-md-12" style="margin-top: 10px;">
			<div class="col-md-2" style="padding: 0px;">
				<label class="label label-danger">Date</label>
				<input type="text" class="form-control  pdate" placeholder="Date" id="SetSlotDate" required="">
			</div>
			<div class="col-md-2" style="padding: 0px;">
				<label class="label label-danger">Time: Eg. 02:00 PM</label>
				<input type="text" class="form-control  timeautocomp" placeholder="Time" id="SetSlotTime" maxlength="8" minlength="8" required="">
			</div>

			<div class="col-md-2" style="padding: 0px;">
				<label class="label label-danger">Repeat: Weeks </label>
				<input type="number" class="form-control  " placeholder="Repeat" id="SetSlotRepeat">
			</div>

			<a class="btn  btn-danger pull-left" id="MonSlotTime" style="margin-top: 25px;"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
		<div class="col-md-12" style="margin-top: 10px;">
			<table class="table table-bordered" style="background: rgba(0,0,0,0.3); color: white;">
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
		</div>
	</div>

	<div class="col-md-3" style="background: #BC3437; padding-bottom: 5px;">
    	<h1 id="RemainingSlots"></h1>
    	<div class="input-group">
		<select class="form-control  col-xs-1 " id='SelectDay' style="width: 120px;">
			<option value="">Day</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
		</select>
		<input type="number" maxlength="2" name="" id="SelectTime" class="form-control " style="width: 70px;"> 
		<span class="input-group-btn">
			<a class="btn  btn-danger" id="CheckAvails" style="width: 60px; margin-top: 4px;">Avails</a>
		</span>  
		</div> 
		<hr>
		<div style="position:relative; width: 250px; height: 280px; overflow:auto; font-size: 12px;" id="AvailsRes">	
		</div>
		<a href="#" class="btn  btn-danger btn-xs" id="SlotSetF">Print Reciept</a>
		<a href="#" class="btn  btn-danger btn-xs" >Close</a>
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