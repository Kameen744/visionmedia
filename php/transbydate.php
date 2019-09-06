<div class="col-md-12">
    <div class="input-group col-md-6 col-md-offset-3">
        
        <input type="text" name="srchdate" id="srchdate" class="form-control" placeholder="Get All Transactions By Date" style="background: rgba(250,250,250,0.3); color: 
        white;">
        <div class="input-group-btn">
            <button class="btn btn-success" style="margin-top: 5px;" id="TranSearch">Search</button>
        </div>
    </div>
</div>
<script>
    $("#srchdate").datepicker({dateFormat: "yy-mm-dd"});
</script>