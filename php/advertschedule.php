
<div class="form-group col-md-4 col-sm-12">
    <div class="input-group">
        <input type="text" class="form-control" name="srchdate" id="srchdate" placeholder="Search Adverts Schedule by Date" aria-label="SerchByDate" aria-describedby="SerchByDate">
        <div class="input-group-append">
        <button class="btn btn-danger" id="SerchByDate" type="button">
            <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#srchdate").datepicker({dateFormat: "yy-mm-dd"});
</script>

