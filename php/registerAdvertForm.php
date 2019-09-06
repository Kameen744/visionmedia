	
<form id="RegAdvertsForm">
	<h2 class="text-center bg-danger text-white py-1">Register Advert</h2>	
	<!-- Form Group one -->
	
	<div class="row">
		<div class="form-group col-md-3 col-sm-12">			
			<input type="text" name="client" class="form-control" placeholder="Client Name" required="" id="ClientNameInput">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input type="number" name="clientnumber" class="form-control" minlength="11" maxlength="11" placeholder="Client Number" required="">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input type="text" name="item" class="form-control" placeholder="File Name" required="">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<select type="text" name="itemtype" class="form-control" required="">
				<option value="">Item Type</option>
				<option value="Advert">Advert</option>
				<option value="Announcement">Announcement</option>
				<option value="Jingle">Jingle</option>
				<option value="Live Program">Live Program</option>
				<option value="Live Coverage">Live Coverage</option>
				<option value="Recorded Programe">Recorded Programe</option>
				<option value="Sport">Sport</option>
				<option value="Studio Fee">Studio Fee</option>
			</select>
		</div>
	</div>
	

<!-- Form Group two -->

	<div class="row">
		<div class="form-group col-md-3 col-sm-12">
			<select name="duration" class="form-control" required="">
				<option value="">Select Duration</option>
				<option value="5 Sec">5 Sec</option>
				<option value="10 Sec">10 Sec</option>
				<option value="15 Sec">15 Sec</option>
				<option value="20 Sec">20 Sec</option>
				<option value="25 Sec">25 Sec</option>
				<option value="30 Sec">30 Sec</option>
				<option value="35 Sec">35 Sec</option>
				<option value="40 Sec">40 Sec</option>
				<option value="45 Sec">45 Sec</option>
				<option value="50 Sec">50 Sec</option>
				<option value="55 Sec">55 Sec</option>
				<option value="60 Sec">60 Sec</option>
				<option value="2 Min">2 Min</option>
				<option value="3 Min">3 Min</option>
				<option value="4 Min">4 Min</option>
				<option value="5 Min">5 Min</option>
				<option value="10 Min">10 Min</option>
				<option value="15 Min">15 Min</option>
				<option value="20 Min">20 Min</option>
				<option value="25 Min">25 Min</option>
				<option value="30 Min">30 Min</option>
				<option value="35 Min">35 Min</option>
				<option value="40 Min">40 Min</option>
				<option value="45 Min">45 Min</option>
				<option value="50 Min">50 Min</option>
				<option value="55 Min">55 Min</option>
				<option value="60 Min">60 Min</option>
			</select>
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input type="number" name="slot" class="form-control " required="" placeholder="Total Slots Purchased" >
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input type="number" name="amount" maxlength="4" class="form-control " placeholder="₦ Amount Per Slot" required="">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<select class="form-control " name="modeofpayment" id="modeofpayment" required="">
				<option value="">Mode of Payment</option>
				<option value="Cash">Cash</option>
				<option value="Compliment">Compliment</option>
				<option value="Credit">Credit</option>
				<option value="Transfer">Transfer</option>
				<option value="Cheque">Cheque</option>
			</select>
		</div>
	</div>

<!-- Form Group three -->

	<div class="row">
		<div class="form-group col-md-3 col-sm-12" style="display: none;" id="paidnow">
			<input type="number" name="amountpaid" id="amountpaid" class="form-control " placeholder="₦ Amount Paid Now">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<input type="text" name="source" class="form-control " placeholder="Source">
		</div>
		<div class="form-group col-md-3 col-sm-12">
			<select class="form-control " name="Commtype" id="Commtype">
				<option value="">Commission</option>
				<option value="₦">Amount ₦</option>
				<option value="%">Percentage %</option>
			</select>
		</div>
		<div class="form-group col-md-3 col-sm-12" id="commsshow" style="display: none;">
			<input type="number" name="commission" id="commission" class="form-control " placeholder="Commission Percent % ">
		</div>
		<div class="form-group col-md-3 col-sm-12" id="comshamt" style="display: none;">
			<input type="number" name="commissionamount" id="commissionamount" class="form-control " placeholder="Commission Amount ₦">
		</div>
	</div>
	<!-- Form group four -->
	<div class="row">
		<div class="form-group col-md-3 col-sm-12">
			<input type="number" name="agencypay" class="form-control " placeholder="% Agency Pay">
		</div>
		<div class="form-group col-md-3 col-sm-12" style="">
			<select class="form-control " name="clienttype" id="modpmt" required="">
				<option value="">Client Type</option>
				<option value="Contract">Contract</option>
				<option value="Government">Government</option>
				<option value="Individual">Individual</option>
			</select>
		</div>
		<div class="form-group col-md-3 col-sm-12" id="paymt" style="display: none;">
			<select class="form-control " name="paymentmode">
				<option value="">Payment Type</option>
				<option value="1">One Time</option>
				<option value="2">Two Times</option>
				<option value="3">Three Times</option>
			</select>
		</div>
	</div>

	<!-- Form group five -->
<div class="row">
	<div class="form-group col-md-3 col-sm-12" id="scdpdue" style="display: none;">
		<input type="text" name="secondpaydue" class="form-control  pdate" placeholder="Second Payment Due">
	</div>
	<div class="form-group col-md-3 col-sm-12" id="trdpdue" style="display: none;">
		<input type="text" name="thirdpaydue" class="form-control  pdate" placeholder="Third Payment Due">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="startdate" class="form-control  pdate" placeholder="Start Date" required="">
	</div>
	<div class="form-group col-md-3 col-sm-12">
		<input type="text" name="enddate" class="form-control  pdate" placeholder="End Date" required="">
	</div>
</div>
<hr class="bg-danger">
	<div class="col-md-12">
		<button id="RegisterNewAdd" type="button" class="btn btn-danger btn-block">Save Advert Details</button>
	</div>
<hr class="bg-danger">
</form>

<script>
	$(".timeautocomp").autocomplete({
		source: timeautocomp
	});
	$(".pdate").datepicker({dateFormat: 'yy-mm-dd'});
	$("#modpmt").change(function(){
			var tsval = $(this).val();
				if(tsval === 'Individual'){
					$("#paymt").fadeIn();
					$("#scdpdue").fadeIn();
					$("#trdpdue").fadeIn();
			}
		});
	
	$("#modeofpayment").change(function(){
		switch ($(this).val()) {
			case 'Cash':
				$("#paidnow").fadeIn();
				break;
			case 'Cheque':
				$("#paidnow").fadeIn();
				break;
			default:
			$("#paidnow").fadeOut();
				break;
		}
	});

	$("#Commtype").change(function (){
		var comtp = $(this).val();
		if (comtp === '₦') {
			$("#commsshow").fadeOut();
			$("#comshamt").fadeIn();
		}
		else if (comtp === '%') {
			$("#comshamt").fadeOut();
			$("#commsshow").fadeIn();
		}
	});
</script>
