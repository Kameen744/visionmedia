<div class="nav justify-content-center">
  
        
    <div class="form-group col-md-3 col-sm-12">
    <button class="btn btn-danger" id="ProgramsSchedule">All Programs</button>
    </div>
    <div class="form-group col-md-3 col-sm-12" >
        <select id="progday" class="form-control ">
        <option value="">Search Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <div class="input-group">
            <input type="text" class="form-control" id="progname" placeholder="SearchProgs" aria-label="SearchProgs" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-danger" id="SearchProgs" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            </div>
        </div>
    </div>
    <div class="form-group col-md-2 col-sm-12">
        <button class="btn btn-danger" id="getPresentations">Presentation</button>
    </div>
    <div class="col-12">
        <hr class="bg-danger"> 
    </div>
</div>
<div class="row">
    <div class="col-12 mt-4" id="ProgramsHhtmlres"></div>
</div>