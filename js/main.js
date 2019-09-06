function gtform (formid) {
  var data = {};
  $(formid).find("[name]").each(function(index, value) {
      name = $(this).attr("name");
    value = $(this).val();
    data[name] = value;
  });
  return data;
}
function ajxcal (url, method, dataType, data) {
  this.jxhr = $.ajax({
    url: url,
    method: method,
    dataType: dataType,
    data: data
  });
}

$(document).on('click', '#unverifiedstaff', function () {
  var post = new ajxcal('/visionmedia/php/staff/unverified.php', 'post', 'html', {verifyStaffTable: 'regStaffTable'});
  post.jxhr.done(function (res) {
    $('#RegisterAdvert').html(res);
  });
});

$(document).on('click', '#verifiedstaff', function () {
  var post = new ajxcal('/visionmedia/php/staff/unverified.php', 'post', 'html', {verifiedTable: 'regStaffTable'});
  post.jxhr.done(function (res) {
    $('#RegisterAdvert').html(res);
  });
});

$(document).on('click', '#verifyStaffBtn', function () {
  let staffId = $(this).val();
  var post = new ajxcal('/visionmedia/php/staff/unverified.php', 'post', 'html', 
  {verifyStaffBtn: 'VerifyStaff', staffId: staffId});
  post.jxhr.done(function (res) {
    $('#unverifiedTable').html(res);
  });
});

$(document).ajaxStart(function () {
  $('body').Wload({
      el: '#RegisterAdvert'
  });
}).ajaxStop(function () {
  $('body').Wload('hide', {
    el: '#RegisterAdvert'
});
}).ajaxError(function (e,xhr,opt) {     

});

$(document).ready(function() {
  // console.log(document.body.clientHeight);
  var cDate = $("#CurrentDateTime").val();
  CurDateRowNo(cDate);
  DailyUpdatesAlt(cDate);
  $("#VloguserName").focus();

  $(".pdate").datepicker({
    dateFormat: "yy-mm-dd"
  });
  $(".se-pre-con").fadeOut("slow");
});

var crAddId = "";
function loadPages(getpage, loadinto) {
  $(".se-pre-con").fadeIn("slow");
  $(loadinto).load(getpage);
  $(".se-pre-con").fadeOut("slow");
}

$(document).on("click", "#RegisterAd", function() {
  loadPages("/visionmedia/php/registerAdvertForm.php", "#RegisterAdvert");
});

$(document).on("click", "#TransTableShow", function() {
  loadPages("/visionmedia/php/vtransactions.php", "#RegisterAdvert");
});

$(document).on("click", "#AutomationShow", function() {
  loadPages("/visionmedia/php/automation.php", "#RegisterAdvert");
});

$(document).on("click", "#AddupdateShow", function() {
  loadPages("/visionmedia/php/addupdate.php", "#RegisterAdvert");
});

$(document).on("click", "#printPageShow", function() {
  loadPages("/visionmedia/php/reportpage.php", "#RegisterAdvert");
});

$(document).on('click', '#onlineBackuptShow', function() {
  loadPages("/visionmedia/php/onlineBackupshow.php", "#RegisterAdvert");
});

$(document).on("click", "#printAdminPageShow", function() {
  loadPages("/visionmedia/php/reportadminpage.php", "#RegisterAdvert");
  $.ajax({
    method: "POST",
    dataType: "text",
    url: "/visionmedia/php/reportadminstations.php",
    success: function(response) {
      //var res = JSON.parse(response);
      console.log(response);
      //$("#chooseStationRpt").append(response);
    }
  });
});

$(document).on("click", "#StaffPageLoad", function() {
  loadPages("/visionmedia/php/staffpage.php", "#RegisterAdvert");
});

$(document).on("click", "#programsPageLoad", function() {
  loadPages("/visionmedia/php/programspage.php", "#RegisterAdvert");
});

$(document).on("click", "#RegisterProg", function() {
  loadPages("/visionmedia/php/registerprograms.php", "#loadreports");
});

$(document).on("click", "#presentform", function() {
  loadPages("/visionmedia/php/progpresentForm.php", "#loadreports");
});

$(document).on("click", "#chooseStationRpt", function() {});

$(document).on("click", "#SubStaffPageLoad", function() {
  var subUserID = $("#subUserID").val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/substafffcheckcv.php",
    data: { subUserID: subUserID },
    success: function(res) {
      if (res == "True") {
        loadPages("/visionmedia/php/substaffpage.php", "#RegisterAdvert");
      } else {
        alert(res);
      }
    }
  });
});
$(document).on('click', '#SubStaffViewProfile', function () {
  var post = new ajxcal('/visionmedia/php/staff/subStaffViewProfile.php', 'post', 'html');
  post.jxhr.done(function (res) {
    $('#registerAdvert').html(res);
  });
});
$(document).on("click", "#SubStaffViewLoad", function() {
  //loadPages("/visionmedia/php/substafffiewinfo.php", "#RegisterAdvert");
  var subUserID = $("#subUserID").val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/substafffgetinfo.php",
    data: { subUserID: subUserID },
    success: function(data) {
      var w = window.open("", "CV", "scrollbars=yes,width=900,height=600");
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#SubStaffEditLoad", function() {
  var subUserID = $("#subUserID").val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/substafffcheckcv.php",
    data: { subUserID: subUserID },
    success: function(res) {
      if (res == "True") {
        alert('Create your profile first.');
      } else {
        $("#RegisterAdvert").load("/visionmedia/php/substafffEditinfo.php");
      }
    }
  });
 
});

$(document).on("click", "#RegisterNewAdd", function() {
  var post = new ajxcal ('/php/registerAdvert.php', 'POST', 'HTML', 
  gtform("#RegAdvertsForm"));
    post.jxhr.done(function (res) {
    $('#rptrNwsMainCont').html(res); 
    if (res === 'Error! Failed to save' || res === 'Error! Empty Form') {
      alert(res);
    } else {
      loadPages("/visionmedia/php/setslotsform.php", "#RegisterAdvert");
      $("#setSlotHeadertxt").html("Saved with ID: " + res + " Now Set Date & Time");
      UpdateNumSlots(res);
      crAddId = res;
    }
  }); 
});

$(document).on("click", "#UpdateTimeBtn", function() {
  var updTimeId = $(this).val();
  loadPages("/visionmedia/php/setslotsform.php", "#RegisterAdvert");
  UpdateNumSlots(updTimeId);
  
  $.ajax({
    method: "POST",
    //	dataType: "json",
    data: { updTimeId: updTimeId },
    url: "/visionmedia/php/setslotsget.php",
    success: function(response) {
      $("#timeToUpdateCont").html(response);
    }
  });
});
$(document).on("change", "#ClientNameInput", function() {});

$(document).on("click", "#Settings", function() {
  $("#RegisterAdvert").load("/visionmedia/php/settings.php");
});

$(document).on("click", "#SaveStation", function() {
  var station = $("#Station").val(),
    location = $("#Location").val(),
    address = $("#Address").val(),
    cnumber = $("#Cnumber").val();
  $.ajax({
    method: "POST",
    data: {
      station: station,
      location: location,
      address: address,
      cnumber: cnumber
    },
    url: "/visionmedia/php/regstations.php",
    success: function(response) {
      $("#settingsalert").slideDown(function() {
        $(this).html(response);
      });
      setTimeout(function() {
        $("#settingsalert").slideUp();
      }, 4000);
    }
  });
});

$(document).on("click", "#SaveUser", function() {
  var StLocation = $("#StLocation").val(),
    VUserName = $("#VUserName").val(),
    VPassword = $("#VPassword").val(),
    VStatus = $("#VStatus").val();
  $.ajax({
    method: "POST",
    data: {
      StLocation: StLocation,
      VUserName: VUserName,
      VPassword: VPassword,
      VStatus: VStatus
    },
    url: "/visionmedia/php/regstations.php",
    success: function(response) {
      $("#settingsalert").slideDown(function() {
        $(this).html(response);
      });
      setTimeout(function() {
        $("#settingsalert").slideUp();
      }, 4000);
    }
  });
});

$(document).on("change", "#VPassword", function() {
  var SlLocation = "Location";
  $.ajax({
    method: "POST",
    data: { SlLocation: SlLocation },
    dataType: "html",
    url: "/visionmedia/php/regstations.php",
    success: function(response) {
      $("#StLocation").html(response);
    }
  });
});

$(document).on("change", "#VloginPassword", function() {
  var SlLocation = "Location";
  $.ajax({
    method: "POST",
    data: { SlLocation: SlLocation },
    dataType: "html",
    url: "/visionmedia/php/regstations.php",
    success: function(response) {
      $("#LogSelectLoc").html(response);
    }
  });
});

$(document).on("click", "#RegStation", function() {
  $("#Userscontainer").fadeOut(function() {
    $('#ManageStationsBody').fadeOut();
    $("#Stationscontainer").fadeIn();
  });
});

$(document).on("click", "#RegUsers", function() {
  $("#Stationscontainer").fadeOut(function() {
    $('#ManageStationsBody').fadeOut();
    $("#Userscontainer").fadeIn();
  });
});

$(document).on("change", "#noofguestprest", function() {
  var noguest = $(this).val();
  var gs1 = $("#guest_1"),
    gs2 = $("#guest_2"),
    gs3 = $("#guest_3"),
    gs4 = $("#guest_4"),
    gs5 = $("#guest_5"),
    gs6 = $("#guest_6");
  switch (noguest) {
    case "1":
      gs1.fadeIn();
      gs2.fadeOut();
      gs3.fadeOut();
      gs4.fadeOut();
      gs5.fadeOut();
      gs6.fadeOut();
      break;
    case "2":
      gs1.fadeIn();
      gs2.fadeIn();
      gs3.fadeOut();
      gs4.fadeOut();
      gs5.fadeOut();
      gs6.fadeOut();
      gs2.fadeIn();
      break;
    case "3":
      gs1.fadeIn();
      gs2.fadeIn();
      gs3.fadeIn();
      gs4.fadeOut();
      gs5.fadeOut();
      gs6.fadeOut();
      break;
    case "4":
      gs1.fadeIn();
      gs2.fadeIn();
      gs3.fadeIn();
      gs4.fadeIn();
      gs5.fadeOut();
      gs6.fadeOut();
      break;
    case "5":
      gs1.fadeIn();
      gs2.fadeIn();
      gs3.fadeIn();
      gs4.fadeIn();
      gs5.fadeIn();
      gs6.fadeOut();
      break;
    case "6":
      gs1.fadeIn();
      gs2.fadeIn();
      gs3.fadeIn();
      gs4.fadeIn();
      gs5.fadeIn();
      gs6.fadeIn();
      break;
  }
});

$(document).on("click", "#savePresentDetails", function() {
  var that = $("#presentationForm"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/progpresetreg.php",
    success: function(response) {
      if (response == "Error! Failed to save record") {
        alert(response);
      } else {
        clearInputs($("#presentationForm"));
        $("#presSuccessalert").html(response);
        $("#presSuccessalert").fadeIn();
        setTimeout(function() {
          $("#presSuccessalert").fadeOut();
        }, 3000);
      }
    }
  });
});

function clearInputs(tag) {
  tag.find("[name]").each(function(index, value) {
    $(this).val("");
  });
}

$(document).on("click", "#RegisterOop", function() {
  $.ajax({
    method: "GET",
    dataType: "html",
    url: "/visionmedia/php/registeroop.php",
    success: function(pagedata) {
      $("#RegisterAdvert").html(pagedata);
    }
  });
});

$(document).on("click", "#RegisterStaff", function() {
  $.ajax({
    method: "GET",
    dataType: "html",
    url: "/visionmedia/php/staffform.php",
    success: function(pagedata) {
      $("#loadreports").html(pagedata);
    }
  });
});

$(document).on("click", "#RegisterNewStaff", function(e) {
  e.preventDefault();
  var that = $("#RegStaffForm"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    dataType: "json",
    url: "/visionmedia/php/staffreg.php",
    success: function(restf) {
      if (restf == "Error! Failed to save") {
        alert(restf);
      } else if (restf == "Error! Empty Form") {
        alert(restf);
      } else {
        $("#RegStaffForm").slideUp(function() {
          $("#SchoolsAttendedDates").slideDown();
          $(".sfIDNo").append(
            "<input type='text' value='" + restf.returnedid + " ' name='sIdR'>"
          );
        });
      }
    }
  });
});

function staffRecEdit(that, elm) {
  var data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/staffregedit.php",
    success: function(restf) {
      elm.html(restf);
    }
  });
}
$(document).on("click", "#RegisterNewStaffEdit", function(e) {
  e.preventDefault();
  var that = $("#RegStaffFormEdit");
  var domElm = $("#savestaffidsuccessEdit");
  staffRecEdit(that, domElm);
});
$(document).on("click", "#SchoolsAttendedEdit", function(e) {
  e.preventDefault();
  var that = $("#EditSchoolsAtt");
  var domElm = $("#SchoolsAttendedsuccessEdit");
  staffRecEdit(that, domElm);
});
$(document).on("click", "#SkillsExperienceUpdate", function(e) {
  e.preventDefault();
  var that = $("#SkillsExperienceEdit");
  var domElm = $("#skillsEditSuccess");
  staffRecEdit(that, domElm);
});
$(document).on("click", "#NexofkinSubmEdit", function(e) {
  e.preventDefault();
  var that = $("#NexofkinandRefreesEditForm");
  var domElm = $("#NexofkinEditsuccess");
  staffRecEdit(that, domElm);
});
function editPage(data, url) {
  $.ajax({
    method: "POST",
    dataType: "html",
    data: {
      StaffIDNo: data
    },
    url: url,
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
}
$(document).on("click", "#editBioData", function() {
  var StaffIDNo = $(this).val();
  editPage(StaffIDNo, "/visionmedia/php/staffbioedit.php");
});
$(document).on("click", "#editSchools", function() {
  var StaffIDNo = $(this).val();
  editPage(StaffIDNo, "/visionmedia/php/staffschoolsedit.php");
});
$(document).on("click", "#editSkillsExp", function() {
  var StaffIDNo = $(this).val();
  editPage(StaffIDNo, "/visionmedia/php/staffskillsedit.php");
});
$(document).on("click", "#editRefreesNex", function() {
  var StaffIDNo = $(this).val();
  editPage(StaffIDNo, "/visionmedia/php/staffrefreedit.php");
});
$(document).on("click", "#StaffEditCV", function() {
  var StaffIDNo = $(this).val();
  $.ajax({
    method: "POST",
    dataType: "html",
    data: {
      StaffIDNo: StaffIDNo
    },
    url: "/visionmedia/php/substafffEditinfo.php",
    success: function(data) {
      $("#RegisterAdvert").html(data);
    }
  });
});

var count = 1;
var skillscount = 2;
var expcount = 1;
$(document).on("click", "#AddMoreSchools", function(e) {
  e.preventDefault();
  var counter = "Other Institution " + count;
  if (count > 5) {
    alert("Sorry you can't add morethan five institutions");
  } else {
    var that = $("#SchoolsFormArea");
    count++;
    that.append(`
      <div class="form-group col-md-4">
        <label class="label label-danger">${counter}</label>
        <input name="S_OtherSch${count}" class="form-control ">
      </div>
      <div class="form-group col-md-4">
        <label class="label label-danger">Qualification Obtained</label>
        <input name="S_OtherQual${count}" class="form-control ">
      </div>
      <div class="form-group col-md-2">
        <label class="label label-danger">Start From</label>
        <input type="date" name="S_OtherFrom${count}" class="form-control " placeholder="1999-12-15">
      </div>
      <div class="form-group col-md-2">
        <label class="label label-danger">Finished</label>
        <input type="date" name="S_OtherTo${count}" class="form-control " placeholder="1999-12-15">
      </div>
		`);
  }
});

$(document).on("click", "#AddMoreSkills", function(e) {
  e.preventDefault();
  if (skillscount >= 5) {
    alert("Sorry you can't add morethan Six skills");
  } else {
    var that = $("#SkillsContain");
    skillscount++;
    that.append(`
			<div class="col-md-3 regformcontrol">			
		<input type="text" name="skill_${skillscount}" class="form-control " placeholder="Skill ${skillscount}">
		</div>
		<div class="col-md-3 regformcontrol">			
		<textarea type="text" name="skillDes_${skillscount}" class="form-control " placeholder="Description ${skillscount}"></textarea>
		</div>
			`);
  }
});

$(document).on("click", "#AddMoreExperience", function(e) {
  e.preventDefault();
  if (expcount >= 5) {
    alert("Sorry you can't add morethan 5 working experience");
  } else {
    var that = $("#ExperienceContain");
    expcount++;
    that.append(`
		<div class="col-md-3 regformcontrol">
			<i class="label label-danger">Job Title ${expcount}</i>			
			<input type="text" name="job_${expcount}" class="form-control " placeholder="Job Title">
		</div>
		<div class="col-md-3 regformcontrol">
			<i class="label label-danger">Company</i>				
			<input type="text" name="jobcom_${expcount}" class="form-control " placeholder="Company">
		</div>
		<div class="col-md-3 regformcontrol">
			<i class="label label-danger">Start Date</i>				
			<input type="date" name="jobdatefrom_${expcount}" class="form-control " placeholder="From">
		</div>
		<div class="col-md-3 regformcontrol">
			<i class="label label-danger">End Date. Skip if still working there</i>				
			<input type="date" name="jobdateto_${expcount}" class="form-control " placeholder="To">
		</div>
			`);
  }
});

$(document).on("click", "#SchoolsAttended", function(e) {
  e.preventDefault();
  var that = $("#SchoolsAttendedDates"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/staffreg.php",
    success: function(response) {
      if (response == "Error! Failed to save") {
        alert(response);
      } else if (response == "Error! Empty Form") {
        alert(response);
      } else {
        $("#SchoolsAttendedDates").slideUp(function() {
          $("#SkillsExperience").slideDown();
        });
      }
    }
  });
});

$(document).on("click", "#SkillsExperienceSubmit", function(e) {
  e.preventDefault();
  var that = $("#SkillsExperience"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/staffreg.php",
    success: function(response) {
      if (response == "Error! Failed to save") {
        alert(response);
      } else if (response == "Error! Empty Form") {
        alert(response);
      } else {
        $("#SkillsExperience").slideUp(function() {
          $("#NexofkinandRefrees").slideDown();
        });
      }
    }
  });
});

$(document).on("click", "#NexofkinRef", function(e) {
  e.preventDefault();
  var that = $("#NexofkinandRefrees"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/staffreg.php",
    success: function(response) {
      if (response == "Error! Failed to save") {
        alert(response);
      } else if (response == "Error! Empty Form") {
        alert(response);
      } else {
        $("#NexofkinRefsuccess").html(response);
        $("#NexofkinRefsuccess").fadeIn(function() {
          setTimeout(function() {
            $("#NexofkinRefsuccess").fadeOut();
            $("#NexofkinandRefrees").slideUp();
          }, 4000);
        });
      }
    }
  });
});

function DailyUpdatesAlt(tcdate) {
  $.ajax({
    method: "GET",
    dataType: "text",
    data: { CurDate: tcdate },
    url: "/visionmedia/php/dailyupdate.php",
    success: function(data) {
      $(".notificationList").html(data);
    }
  });
}

function CurDateRowNo(CurDateRows) {
  $.ajax({
    method: "GET",
    dataType: "text",
    data: { CurDateRows: CurDateRows },
    url: "/visionmedia/php/dailyupdate.php",
    success: function(data) {
      $(".notificationNumber").html(data);
    }
  });
}

function searchRecSynch(SearchR) {
  $.ajax({
    method: "GET",
    dataType: "text",

    data: { SearchR: SearchR },
    url: "/visionmedia/php/searchrec.php",
    success: function(response) {
      $("#RegisterAdvert").html(response);
    }
  });
}

$("#SearchText").keypress(function(event) {
  if (event.which == 13) {
    var searchtext = $(this).val();
    $.ajax({
      url: "/visionmedia/php/searchrec.php?SearchR=" + searchtext + "",
      method: "GET",
      dataType: "text",

      success: function(response) {
        $("#RegisterAdvert").html(response);
      }
    });
  }
});

$(document).on('click', '#printSearchbyReoprt', function () {
  var printSearchtext = $("#SearchText").val();
  var post = new ajxobj('/php/searchrec.php', 'POST', 'HTML', {printSearchtext: printSearchtext});
  post.jxhr.done(function (res) {
    var w = window.open("", "Print", "scrollbars=yes,width=850,height=700");
      w.document.write(res);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
  });
});

$(document).on("click", "#UpdateBtn", function() {
  var updateValue = $(this).attr("value");
  var updatem = $("#UpdateModal");
  $.ajax({
    method: "POST",
    data: { addid: updateValue },
    url: "/visionmedia/php/updaterecords.php",
    success: function(result) {
      updatem.html(result);
      updatem.dialog("open");
    }
  });
});

$(document).on("click", "#AddPBtn", function() {
  var AddPayment = $(this).attr("value");
  var updatem = $("#AddPayModal");
  $.ajax({
    method: "POST",
    data: { AddPayment: AddPayment },
    url: "/visionmedia/php/updaterecords.php",
    success: function(result) {
      updatem.html(result);
      updatem.dialog("open");
    }
  });
});

$(document).on("click", "#LogReprtBtn", function() {
  var LogRprt = $(this).attr("value");
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/searchplayedprint.php",
    data: { srcText: LogRprt },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#StopAddBtn", function() {
  var StopAddRec = $(this).attr("value");
  $.ajax({
    method: "POST",
    data: { StopAddRec: StopAddRec },
    url: "/visionmedia/php/updaterecords.php",
    success: function(result) {
      var res = JSON.parse(result);
      $("#StopAddBtn").html(res.Btn);
      alert(res.Msg);
      console.log(result);
    }
  });
});

$(document).on("click", "#DeleteBtn", function() {
  var DeleteRec = $(this).attr("value");
  var updatem = $("#DeleteModal");
  $.ajax({
    method: "POST",
    data: { DeleteRec: DeleteRec },
    url: "/visionmedia/php/updaterecords.php",
    success: function(result) {
      updatem.html(result);
      updatem.dialog("open");
    }
  });
});

$(document).on("click", "#PrntRecpt", function() {
  var PrintAddID = $(this).attr("value");
  printSlotTimings(PrintAddID);
});

$("#UpdateModal").dialog({
  autoOpen: false,
  width: 400,
  buttons: [
    {
      text: "Save Changes",
      click: function() {
        var that = $(this),
          data = {};
        that.find("[name]").each(function(index, value) {
          var that = $(this),
            name = that.attr("name");
          value = that.val();
          data[name] = value;
        });
        $.ajax({
          method: "POST",

          data: data,
          url: "/visionmedia/php/updaterecords.php",
          success: function(response) {
            var alertm = $("#AlertsModal");
            that.dialog("close");
            alertm.html(response);
            alertm.slideDown(1000);
            setTimeout(function() {
              alertm.slideUp();
            }, 10000);
          }
        });
      }
    },
    {
      text: "Cancel",
      click: function() {
        $(this).dialog("close");
      }
    }
  ]
});

$("#AddPayModal").dialog({
  autoOpen: false,
  width: 500,
  buttons: [
    {
      text: "Add Payment",
      click: function() {
        var that = $(this);
        var data = {
          AddPayId: $("#AddPayId").val(),
          SecondPay: $("#SecondPay").val(),
          ThirdPay: $("#ThirdPay").val()
        };
        $.ajax({
          method: "POST",

          data: data,
          url: "/visionmedia/php/updaterecords.php",
          success: function(response) {
            var alertm = $("#AlertsModal");
            that.dialog("close");
            alertm.html(response);
            alertm.slideDown(1000);
            setTimeout(function() {
              alertm.slideUp();
            }, 10000);
          }
        });
      }
    },
    {
      text: "Cancel",
      click: function() {
        $(this).dialog("close");
      }
    }
  ]
});

$("#DeleteModal").dialog({
  autoOpen: false,
  width: 500,
  buttons: [
    {
      text: "Delete Record",
      click: function() {
        var that = $(this);
        DeleteId = $("#DeleteID").val();

        $.ajax({
          method: "POST",

          data: { DeleteId: DeleteId },
          url: "/visionmedia/php/updaterecords.php",
          success: function(response) {
            var alertm = $("#AlertsModal");
            that.dialog("close");
            alertm.html(response);
            alertm.slideDown(1000);
            setTimeout(function() {
              alertm.slideUp();
            }, 10000);
          }
        });
      }
    },
    {
      text: "Cancel",
      click: function() {
        $(this).dialog("close");
      }
    }
  ]
});

$(document).on("click", "#GetAllTrans", function() {
  var alltrans = null;
  $.ajax({
    method: "POST",
    data: { alltrans: alltrans },
    url: "/visionmedia/php/gettransactions.php",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});

$(document).on("click", "#TransByDate", function() {
  $("#loadreports").load("../php/transbydate.php");
});

$(document).on("click", "#TransSearchbydate", function() {
  $("#loadreports").load("../php/transearch.php");
});

$(document).on("click", "#TranSearch", function() {
  var TransDate = $("#srchdate").val();
  $.ajax({
    method: "POST",
    dataType: "text",
    data: { SearchDate: TransDate },
    url: "/visionmedia/php/gettransactions.php",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});

$(document).on("click", "#SearchTransD", function() {
  var TransDateFrom = $("#FromDate").val();
  var TransDateto = $("#ToDate").val();
  $.ajax({
    method: "POST",
    dataType: "text",
    data: { FromDate: TransDateFrom, ToDate: TransDateto },
    url: "/visionmedia/php/gettransactions.php",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});

$(document).on("click", "#ViewStaff", function() {
  var getStaffrec = 0;
  $.ajax({
    method: "POST",
    dataType: "text",
    data: { getStaffrec: getStaffrec },
    url: "/visionmedia/php/staffgetrec.php",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});
$(document).on("click", "#PrintAllStaffL", function() {
  $.ajax({
    method: "POST",
    dataType: "text",
    data: {
      getStaffrecPrintAll: "getAllStaff"
    },
    url: "/visionmedia/php/staffgetrec.php",
    success: function(data) {
      var w = window.open(
        "",
        "Programs",
        "scrollbars=yes,width=1000,height=700"
      );
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#addUserPermission", function() {
  $.ajax({
    method: "GET",
    dataType: "html",
    url: "/visionmedia/php/staffaddpermform.php",
    success: function(pagedata) {
      $("#loadreports").html(pagedata);
    }
  });
});

$(document).on("click", "#SaveUserPerm", function() {
  var username = $("#User_Name").val(),
    password = $("#User_Password").val();
  $.ajax({
    method: "POST",
    data: { V_S_User: username, V_S_Password: password },
    url: "/visionmedia/php/staffsaveperm.php",
    success: function(pagedata) {
      $("#saveSucResponse").html(pagedata);
    }
  });
});

function printalladrec(page) {
  $.ajax({
    url: "/visionmedia/php/temp.php",
    method: "POST",
    data: { page: page },
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
}

$(document).on("click", "#progsget", function() {
  $("#loadreports").load("progsget.php");
});

$(document).on("click", "#progsVerify", function() {
  $("#loadreports").load("verygets.php");
});

function veryProgramslist(data) {
  $.ajax({
    url: "/visionmedia/php/verifyprogslist.php",
    method: "POST",
    data: { verData: data },
    success: function(data) {
      $("#VerifyHhtmlres").html(data);
    }
  });
}

$(document).on("click", "#verySearchProgs", function() {
  var searbyday = $("#veryprogday").val();
  veryProgramslist(searbyday);
});

$(document).on("click", "#viewProgsPage", function() {
  $("#loadreports").load("progsget.php");
});

$(document).on("click", "#SearchProgs", function() {
  var progday = $("#progday").val();
  var progname = $("#progname").val();

  if ((progday == "") & (progname != "")) {
    var datasearch = progname,
      srdttyp = "Name";
    SearchProgramsSchedul(srdttyp, datasearch);
  } else if ((progday != "") & (progname == "")) {
    var datasearchh = progday,
      srdttypp = "Day";
    SearchProgramsSchedul(srdttypp, datasearchh);
  } else {
    alert("Error: Search by name or by day only");
  }
});

function SearchProgramsSchedul(dattyp, datas) {
  $.ajax({
    url: "/visionmedia/php/progsearch.php",
    method: "POST",
    dataType: "text",
    data: { dattyp: dattyp, Srprog: datas },
    success: function(data) {
      $("#ProgramsHhtmlres").html(data);
    }
  });
}

$(document).on("click", "#ProgSearchPrint", function() {
  var SearchBy = $("#SearchBy").val();
  var SearchText = $("#ProgSearchPrint").val();
  $.ajax({
    url: "/visionmedia/php/progsearchprint.php",
    method: "POST",
    dataType: "text",
    data: { SearchBy: SearchBy, SearchText: SearchText },
    success: function(data) {
      var w = window.open(
        "",
        "Programs",
        "scrollbars=yes,width=1000,height=700"
      );
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});
$(document).on("click", "#presentaionsPrint", function() {
  var pressPrint = "printPresent";
  $.ajax({
    url: "/visionmedia/php/presentationsget.php",
    method: "POST",
    dataType: "text",
    data: {
      presPrint: pressPrint
    },
    success: function(data) {
      var w = window.open(
        "",
        "Programs",
        "scrollbars=yes,width=1000,height=700"
      );
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});
$(document).on("click", "#getPresentations", function() {
  var getPress = "GetRec";
  $.ajax({
    method: "POST",
    data: { getPres: getPress },
    url: "/visionmedia/php/presentationsget.php",
    success: function(data) {
      $("#ProgramsHhtmlres").html(data);
    }
  });
});
$("#EditPrsntModal").dialog({
  autoOpen: false,
  width: 400,
  buttons: [
    {
      text: "Save Changes",
      click: function() {
        var that = $(this),
          data = {};
        that.find("[name]").each(function(index, value) {
          var that = $(this),
          name = that.attr("name");
          value = that.val();
          data[name] = value;
        });
        $.ajax({
          method: "POST",
          data: data,
          url: "/visionmedia/php/presentationsget.php",
          success: function(res) {
            alert(res);
          }
        });
      }
    },
    {
      text: "Cancel",
      click: function() {
        $(this).dialog("close");
      }
    }
  ]
});

$(document).on('click', '.editPresntBtn', function () {
  $edPresModl = $("#EditPrsntModal");
  $.ajax({
    method: "POST",
    data: {editPresents: $(this).val()},
    url: "/visionmedia/php/presentationsget.php",
    success: function(res) {
      $edPresModl.html(res);
      $edPresModl.dialog("open");
    }
  });
});

$(document).on("click", "#ProgramsSchedule", function() {
  $.ajax({
    url: "/visionmedia/php/progschedule.php",
    method: "POST",
    success: function(data) {
      $("#ProgramsHhtmlres").html(data);
    }
  });
});

$(document).on("click", "#getPresentations", function() {
  var getPress = "GetRec";
  $.ajax({
    method: "POST",
    data: { getPres: getPress },
    url: "/visionmedia/php/presentationsget.php",
    success: function(data) {
      $("#ProgramsHhtmlres").html(data);
    }
  });
});

$(document).on("click", "#editProgram", function() {
  var updateValue = $(this).attr("value");
  $.ajax({
    method: "POST",
    data: { ProgName: updateValue },
    url: "/visionmedia/php/updateprograms.php",
    success: function(result) {
      $("#loadreports").html(result);
    }
  });
});

$(document).on("click", "#deleteProgram", function() {
  var updateValue = $(this).attr("value");
  $.ajax({
    method: "POST",
    data: { ProgNameDelete: updateValue },
    url: "/visionmedia/php/updateprograms.php",
    success: function(result) {
      $("#loadreports").html(result);
    }
  });
});

$(document).on("click", "#ProgUpdateFinish", function() {
  var that = $("#ProgUpdateFinishedForm");
  var data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name");
    value = that.val();
    data[name] = value;
  });
  console.log(data);
  $.ajax({
    method: "POST",
    data: data,
    url: "/visionmedia/php/updateprograms.php",
    success: function(result) {
      $("#loadreports").html(result);
    }
  });
});

$(document).on("click", "#ProgramsSchedulePrintAll", function() {
  $.ajax({
    url: "/visionmedia/php/progscheduleprintall.php",
    method: "POST",
    success: function(data) {
      var w = window.open(
        "",
        "Programs Schedule",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", ".page_link", function() {
  var page = $(this).attr("id");
  printalladrec(page);
});

function GetAutomation(automation) {
  $.ajax({
    url: "/visionmedia/php/getautomation.php",
    method: "POST",
    data: { automation: automation },
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
}

function getEventsPages(eventgets) {
  $.ajax({
    url: "/visionmedia/php/getevents.php",
    method: "POST",
    data: { eventgets: eventgets },
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
}

$(document).on("click", "#getid-3", function() {
  $.ajax({
    url: "/visionmedia/php/getid.php",
    method: "GET",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});

$(document).on("click", "#PlaylistHistory", function() {
  GetAutomation();
});

$(document).on("click", "#SoundTrackHist", function() {
  $.ajax({
    url: "/visionmedia/php/getsoundtrack.php",
    method: "POST",
    data: { soundtrack: "soundtrack" },
    success: function(data) {
      var w = window.open(
        "",
        "Soundtrack Log",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

function getLogData(getLog) {
  $(".se-pre-con").fadeIn("slow");
  $.ajax({
    method: "POST",
    data: { getLog: getLog },
    url: "/visionmedia/php/virtualdj/getlog.php",
    success: function(response) {
      $(".se-pre-con").fadeOut("slow");
      $("#loadreports").html(response);
    }
  });
}
$(document).on("click", "#VirtualPlaylistHistory", function() {
  getLogData("");
});

$(document).on("click", ".getlog_page_link", function() {
  var page = $(this).attr("id");
  getLogData(page);
});
$(document).on("click", "#printLog", function() {
  $("#printLogDialog").dialog({
    autoOpen: false,
    buttons: [
      {
        text: "Print Log",
        click: function() {
          var logFrom = $("#plogFrom").val(), logTo = $("#plogTo").val(), 
          LogByName = $("#LogByName").val();
          $.ajax({
            method: "POST",
            url: "/visionmedia/php/virtualdj/getlog.php",
            data: { logFrom: logFrom, logTo: logTo, LogByName: LogByName},
            success: function(response) {
              var w = window.open(
                "",
                "Vision Log",
                "scrollbars=yes,width=850,height=700"
              );
              w.document.write(response);
              w.document.close();
              setTimeout(function() {
                w.print();
              }, 1000);
            }
          });
        }
      }
    ]
  });
  var printLogMod = $("#printLogDialog");
  $.ajax({
    method: "GET",
    dataType: "html",
    data: { printLogFilter: "Filter" },
    url: "/visionmedia/php/virtualdj/getlog.php",
    success: function(response) {
      printLogMod.html(response);
      printLogMod.dialog("open");
    }
  });
});
$(document).on("click", ".auto_page_link", function() {
  var page = $(this).attr("id");
  GetAutomation(page);
});

$(document).on("click", "#RadioEvents", function() {
  getEventsPages();
});
$(document).on("click", "#get_event_page", function() {
  var page = $(this).attr("id");
  getEventsPages(page);
});

$(document).on("click", "#SearPlayedBy", function() {
  $("#loadreports").load("/visionmedia/php/searchplayed.php");
});

$("#searchPlayedNameText").keypress(function(event) {
  if (event.which === 13) {
    var textval = $("#searchPlayedNameText").val();
    $.ajax({
      method: "POST",
      dataType: "html",
      url: "/visionmedia/php/searchplayedget.php",
      data: { srcText: textval },
      success: function(response) {
        $("#loadreports").html(response);
      }
    });
  }
});

$(document).on("change", "#searchPlayedDateText", function() {
  var textval = $("#searchPlayedDateText").val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/searchplayedget.php",
    data: { srcDate: textval },
    success: function(response) {
      $("#loadreports").html(response);
    }
  });
});

$(document).on("change", "#searchPlayedToText", function() {
  var dateFrom = $("#searchPlayedFromText").val();
  var dateTo = $("#searchPlayedToText").val();
  if ((dateFrom.length < 10) | (dateTo.length < 10)) {
    alert("Pls. Select Valid Date");
  } else {
    $.ajax({
      method: "POST",
      dataType: "html",
      data: { dateFrom: dateFrom, dateTo: dateTo },
      url: "/visionmedia/php/searchplayedget.php",
      success: function(response) {
        $("#loadreports").html(response);
      }
    });
  }
});

$(document).on("click", "#prntSrchName", function() {
  var textval = $(this).val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/searchplayedprint.php",
    data: { srcText: textval },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#prntSrchDate", function() {
  var textval = $(this).val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/searchplayedprint.php",
    data: { srcDate: textval },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#prntSrchFrom", function() {
  var srcDateFrom = $("#srcDateFrom").val();
  var srcDateTo = $("#srcDateTo").val();
  $.ajax({
    method: "POST",
    dataType: "html",
    url: "/visionmedia/php/searchplayedprint.php",
    data: { srcDateFrom: srcDateFrom, srcDateTo: srcDateTo },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$("#SearchRec").click(function() {
  var searchtext = $("#SearchText").val();
  $.ajax({
    url: "/visionmedia/php/searchrec.php?SearchR=" + searchtext + "",
    method: "GET",
    dataType: "text",
    success: function(response) {
      $("#RegisterAdvert").html(response);
    }
  });
});

$(document).on("click", "#SearchToday", function() {
  var todays = $("#todaysdate").val();
  searchadverts(todays);
});

$(document).on("click", "#SerchByDate", function() {
  var todays = $("#srchdate").val();
  searchadverts(todays);
});

function searchadverts(searchedt) {
  $(".se-pre-con").fadeIn("slow");
  var todaysadd = searchedt;
  $.ajax({
    url: "/visionmedia/php/getadvertsprint.php",
    method: "GET",
    data: {
      AddID: todaysadd
    },
    success: function(response) {
      $(".se-pre-con").fadeOut("slow");
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
  //	$.ajax({
  //		url: "/visionmedia/php/getadverts.php",
  //		method: "GET",
  //		dataType: "text",
  //		data: {getAdverts: todaysadd},
  //		success: function(response){
  //			$("#loadreports").html(response);
  //			$(".se-pre-con").fadeOut("slow");
  //		}
  //});
}
$(document).on("click", "#searchHistiory", function() {
  var srdatefrom = $("#SearchFromDate").val();
  var srdateto = $("#dateto").val();
  $.ajax({
    method: "GET",
    dataType: "text",
    url: "/visionmedia/php/srchistory.php",
    data: { datefrom: srdatefrom, dateto: srdateto },
    success: function(result) {
      $("#loadreports").html(result);
    }
  });
});

$(document).on("click", "#SrchMontHis", function() {
  var datefrom = $("#recpfrom").val();
  var dateto = $("#recpto").val();
  $.ajax({
    method: "GET",
    dataType: "text",
    url: "/visionmedia/php/srchistory.php",
    data: { datePrFrom: datefrom, datePrTo: dateto },
    success: function(result) {
      var w = window.open(
        "",
        "Vision All Records",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(result);
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#SrchMontHis", function() {
  var vfrom = "#vdatefrom".val();
  var vto = "#vdateto".val();
  $.ajax({
    url: "/visionmedia/php/srchistoryprint.php",
    method: "POST",
    data: { vfrom: vfrom, vto: vto },
    success: function(response) {
      var w = window.open(
        "",
        "Vision All Records",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

function searchMonthlyHistiory() {
  var srdatefrom = $("#SearchFromDate").val();
  var srdateto = $("#dateto").val();
  $.ajax({
    method: "GET",
    dataType: "text",

    url: "/assets/srchistory.php",
    data: { datefrom: srdatefrom, dateto: srdateto },
    success: function(result) {
      $("#loadreports").html(result);
    }
  });
}

function getAdvertsPDF() {
  var todaysadd = $("#getPDFrec").val();
  $.ajax({
    url:
      "/assets/reports/examples/getadvertspdf.php?getAdvertsPdfFile=" +
      todaysadd +
      "",
    method: "GET",
    dataType: "object",
    success: function(response) {
      $("#loadreports").html(response);
    }
  });
}
$("#getDailyAdvertPdf").on(function() {
  //	alert("works fine")
});
$(document).on("click", "#getHistory", function() {
  $("#loadreports").load("adhistory.php");
});

/*	function getadverts (){
			var todaysadd = $("#todaysadd").val();
			$.ajax({
				url: "/visionmedia/php/getadverts.php?getAdverts="+todaysadd+"",
				method: "GET",
				dataType: "text",
				success: function(response){
					$("#loadreports").html(response);
				}
			});
		}
*/
$(document).on("click", "#AdvertSchedule", function() {
  $("#loadreports").load("advertschedule.php");
});

function NumofDaysCount() {
  var numofdays = $("#NumDays").val();
  while (numofdays < 1) {
    numofdays--;
  }
  $("#MonTimes").append(numofdays + "<br>");
}

function UpdateNumSlots(addata) {
  var post = new ajxcal ('/php/setslots.php', 'POST', 'HTML', {AddID: addata});
    post.jxhr.done(function (res) { 
       $("#RemainingSlots").html(res);
    });
}

$(document).on("click", "#MonSlotTime", function(e) {
  e.preventDefault();
  var SetSlotDate = $("#SetSlotDate").val();
  setSlotDateTime(SetSlotDate);
});

$(document).on("click", ".slotsspan", function() {
  var rptTime = $(this).val();
  
  $(".pdated").datepicker({
    dateFormat: "yy-mm-dd"
  });
  $(".timeautocompp").autocomplete({
    source: timeautocomp
  });
  $("#rptAddModal").dialog({
    autoOpen: false,
    buttons: [
      {
        text: "Delete Time",
        click: function() {
          var post = new ajxcal ('/php/monupdate.php', 'POST', 'HTML', {deleteRptTime: rptTime});
          post.jxhr.done(function (res) { 
            $('#timeToUpdateCont').html(res);
          });
        }
      }
      // {
      //   text: "Update Time",
      //   click: function() {
      //     var rptDate = $("#rptAddDate").val();
      //     var rptRpt = $("#rptAddRpt").val();
      //     var rptTagtime = $("#rptAddTime").val();
          
      //     var post = new ajxcal ('/php/monupdate.php', 'POST', 'JSON', 
      //     {rptDate: rptDate, rptTagtime: rptTagtime, rptTime: rptTime, rptRpt: rptRpt});
      //     post.jxhr.done(function (res) { 
      //       updateSlotsRem(res.resday, res.rescont, res.remSlots);
      //     });
      //   }
      // },
      // {
      //   text: "Repeat Time",
      //   click: function() {
      //     var rptDate = $("#rptAddDate").val();
      //     var rptRpt = $("#rptAddRpt").val();

      //     var post = new ajxcal ('/php/moninsert.php', 'POST', 'JSON', 
      //     {rptDate: rptDate, rptTime: rptTime, rptRpt: rptRpt});
      //     post.jxhr.done(function (res) { 
      //       updateSlotsRem(res.resday, res.rescont, res.remSlots);
      //     });
      //   }
      // }
    ]
  });
  $("#rptAddModal").dialog("open");
  $("#rptAddTime").val(rptTime);
  $("#rptAddDate").focus();
});
function setSlotDateTime(sslotdate) {
  var SetSlotDate = sslotdate;
  var post = new ajxcal ('/php/moninsert.php', 'POST', 'JSON', 
  {AddvrID: crAddId, MonDate: SetSlotDate, MonTime: $("#SetSlotTime").val(), SlRepeat: $("#SetSlotRepeat").val()});
  post.jxhr.done(function (res) { 
    updateSlotsRem(res.resday, res.rescont, res.remSlots);
  });
}

function updateSlotsRem(day, res, rem) {
  $("#RemainingSlots").html(rem);
  switch (day) {
    case "Mon":
      $("#Montd").append(res);
      break;
    case "Tue":
      $("#Tuetd").append(res);
      break;
    case "Wed":
      $("#Wedtd").append(res);
      break;
    case "Thu":
      $("#Thutd").append(res);
      break;
    case "Fri":
      $("#Fritd").append(res);
      break;
    case "Sat":
      $("#Sattd").append(res);
      break;
    case "Sun":
      $("#Suntd").append(res);
      break;
    case "Error":
      alert(res);
      break;
  }
}

$(document).on('change', '#SetSlotDate', function () {
  var post = new ajxcal ('/php/moninsert.php', 'POST', 'HTML', 
  {checkAvailsByTime: $(this).val(), checkAvailDate: $('#SetSlotDate').val()});
  post.jxhr.done(function (res) { 
    $('#AvailsRes').html(res);
  });
});
$(document).on("click", "#CheckAvails", function() {
  var ChekDay = $("#SelectDay").val();
  var ChekTime = $("#SelectTime").val();
  if (ChekTime.length > 2) {
    $("#AvailsRes").html("Only Two Digit Allow E.g 01");
  } else if (ChekTime.length < 2) {
    $("#AvailsRes").html("Only Two Digit Allow E.g 01");
  } else {
    $.ajax({
      url: "/visionmedia/php/checkavails.php",
      method: "POST",
      dataType: "text",
      data: { ChekDay: ChekDay, ChekTime: ChekTime },
      success: function(response) {
        $("#AvailsRes").html(response);
      }
    });
  }
});

$(document).on("click", "#SlotSetF", function(e) {
  e.preventDefault();
  //var SlotsAddID = $("#AdvertId").val();
  printSlotTimings(crAddId);
});

function printSlotTimings(printadId) {
  $.ajax({
    url: "/visionmedia/php/reciept.php",
    method: "GET",

    data: { PrintAddId: printadId },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
}

$(document).on("click", "#PrintAllRecordsReport", function() {
  $.ajax({
    url: "/visionmedia/php/allrecprint.php",
    method: "GET",
    success: function(response) {
      var w = window.open(
        "",
        "All Records",
        "scrollbars=yes,width=1000,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#PrintGetAdverts", function() {
  var AddID = $(this).val();
  $.ajax({
    url: "/visionmedia/php/getadvertsprint.php",
    method: "GET",
    data: { AddID: AddID },
    success: function(response) {
      var w = window.open(
        "",
        "Vision Invoice",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("click", "#SunSets", function() {
  var that = $("#RegProgramsForm"),
    data = {};
  that.find("[name]").each(function(index, value) {
    var that = $(this),
      name = that.attr("name"),
      val = that.val();
    data[name] = val;
  });
  $.ajax({
    method: "POST",
    url: "/visionmedia/php/registerprog.php",
    data: data,
    success: function(data) {
      $("#regProgResp").html(data);
      setTimeout(function() {
        $("#loadreports").load("/visionmedia/php/registerprograms.php");
      }, 2000);
    }
  });
});
function progcheckbox(day, daycheck, dayselect) {
  if ($(dayselect).val() == "") {
    $(daycheck).val(day);
  } else if ($(dayselect).val() == day) {
    $(dayselect).val("");
  }
}
$(document).on("click", "#DailyLab", function() {
  progcheckbox("Daily", "#Daily:checked", "#Daily");
});
$(document).on("click", "#MonLab", function() {
  progcheckbox("Mon", "#Mon:checked", "#Mon");
});
$(document).on("click", "#TueLab", function() {
  progcheckbox("Tue", "#Tue:checked", "#Tue");
});
$(document).on("click", "#WedLab", function() {
  progcheckbox("Wed", "#Wed:checked", "#Wed");
});
$(document).on("click", "#ThuLab", function() {
  progcheckbox("Thu", "#Thu:checked", "#Thu");
});
$(document).on("click", "#FriLab", function() {
  progcheckbox("Fri", "#Fri:checked", "#Fri");
});
$(document).on("click", "#SatLab", function() {
  progcheckbox("Sat", "#Sat:checked", "#Sat");
});
$(document).on("click", "#SunLab", function() {
  progcheckbox("Sun", "#Sun:checked", "#Sun");
});

$(document).on("click", "#RegisterOap", function() {
  var ofname = $("#oapfname").val();
  var oflname = $("#oaplname").val();
  var ofstation = $("#oapstation").val();
  var oflocation = $("#oaplocation").val();
  var ofprograms = $("#oapprograms").val();
  var ofnumber = $("#oapnumber").val();
  $.ajax({
    method: "POST",
    url: "/visionmedia/php/registeroap.php",
    dataType: "text",
    data: {
      ofname: ofname,
      oflname: oflname,
      ofstation: ofstation,
      oflocation: oflocation,
      ofprograms: ofprograms,
      ofnumber: ofnumber
    },
    success: function(dataResult) {
      $("#oapsuccess").fadeIn(function() {
        $(this).html(dataResult);
      });
      setTimeout(function() {
        $("#oapsuccess").fadeOut();
      }, 5000);
    }
  });
});

$(document).on("click", "#oapgetrs", function() {
  var getoap = "getoap";
  $.ajax({
    method: "POST",
    dataType: "text",
    data: { getoap: getoap },
    url: "/visionmedia/php/getoaps.php",
    success: function(data) {
      $("#loadreports").html(data);
    }
  });
});

$(document).on("click", "#PrintAllOap", function() {
  var rptype = "printoap";
  $.ajax({
    method: "POST",
    dataType: "text",
    data: { rptype: rptype },
    url: "/visionmedia/php/getoaps.php",
    success: function(data) {
      var w = window.open("", "O A P", "scrollbars=yes,width=850,height=700");
      w.document.write(data);
      w.document.close();
      setTimeout(function() {
        w.print();
      }, 1000);
    }
  });
});

$(document).on("keyup", "#RegAdvertsForm", function() {
  $(this).validate();
});

$(document).on("keyup", "#RegSlotsForm", function() {
  $(this).validate();
});

$(document).on("keyup", "#RegProgramsForm", function() {
  $(this).validate();
});

$(document).on("keyup", "#NexofkinandRefrees", function() {
  $(this).validate();
});

$(document).on("keyup", "#SchoolsAttendedDates", function() {
  $(this).validate();
});

$(document).on("keyup", "#RegStaffForm", function() {
  $(this).validate();
});

$(document).on("click", "#testm3u", function() {
  $.ajax({
    method: "POST",
    url: "/visionmedia/php/getm3u.php",
    success: function(response) {
      $("#loadreports").html(response);
    }
  });
});

$(document).on("click", "#StaffPrintCV", function() {
  $.ajax({
    method: "POST",
    dataType: "html",
    data: { StfID: $(this).val() },
    url: "/visionmedia/php/staffcvprint.php",
    success: function(response) {
      var w = window.open(
        "",
        "Staff Info",
        "scrollbars=yes,width=850,height=700"
      );
      w.document.write(response);
      w.document.close();
      setTimeout(function() {
        w.print();
      });
    }
  });
});

// Online backup
$(document).on('click', '#uploadAdverts', function() {
    $.ajax({
      method: "GET",
      dataType: "JSON",
      data: {'getAllRegisteredAdvertsAndSchedule': 'getAllRegisteredAdvertsAndSchedule'},
      url: "/visionmedia/php/onlineBackupGetRec.php",
      success: function(res) {
          $.ajax({
            method: "post",
            dataType: "json",
            contentType:"application/json",
            data: {'insertRegisteredAdvertsAndSchedule': 'insertRegisteredAdvertsAndSchedule', 'Recrds': res},
            url: "http://visionmediaservices.ng/php/onlineBackupInsrtRec.php",
            success: function(res) {
              console.log(res);
            }
          }); 
      }
    });
});
// ---------------------------------2019 added------------------------------------
$(document).on('click', '#viewEditUsersBtn', function() {
  $("#Userscontainer").fadeOut(function() {
    $('#Stationscontainer').fadeOut();
  });
  var post = new ajxcal ('/php/viewEditUsersBtn.php', 'POST', 'HTML', 
  {Station_id: $('#chooseStationRpt').val()}); 
  post.jxhr.done(function(res) {
    $("#ManageStationsBody").fadeIn();
    $('#ManageStationsBody').html(res);
  });
});

// $(document).on('click', '#AppraisalFormBtn', function() {
//   var post = new ajxcal ('/php/appraisalForm.php', 'POST', 'HTML', 
//   {Station_id: $('#chooseStationRpt').val()}); 
//   post.jxhr.done(function(res) {
//     $('#RegisterAdvert').html(res);
//   });
// });

