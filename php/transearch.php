<div class="col-md-12">
    <div class=" col-md-8 col-md-offset-2">
        <div class="col-md-4">
            <label>Transactions From...</label>
             <input type="text" name="srchdate" id="FromDate" class="form-control srchdateclass" placeholder="Search Transactions From...." style="background: rgba(250,250,250,0.3); color:white;">
        </div>
        <div class="col-md-4">
             <label class="">...To</label>
             <input type="text" name="srchdate col-md-6" id="ToDate" class="form-control srchdateclass" placeholder=".....To" style="background: rgba(250,250,250,0.3); color:white;" style="color: white;">
        </div>
       
        <div class="col-md-4" style="padding-top: 25px;">
             <button class="btn btn-success" style="margin-top: 5px;" id="SearchTransD">Search</button>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(".srchdateclass").datepicker({dateFormat: "yy-mm-dd"});
</script>