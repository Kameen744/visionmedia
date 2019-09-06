<div class="row">
    
        <div class="form-group col-sm-12 col-md-4">
            <label>From...</label>
             <input type="text" name="srchdate" id="SearchFromDate" class="form-control srchdateclass" placeholder="Regisgered From">
        </div>
        <div class="form-group col-md-4 col-sm-12">
             <label class="">...To</label>
             <input type="text" name="srchdate col-md-6" id="dateto" class="form-control srchdateclass" placeholder="To....">
        </div>
</div>
<div class="form-group col-md-4 col-sm-12">
    <button class="btn btn-danger" id="searchHistiory">Search</button>
</div>
<script type="text/javascript">
    $(".srchdateclass").datepicker({dateFormat: "yy-mm-dd"});
</script>