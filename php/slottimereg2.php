<?php
	require "con_Vfm.php";
	session_start();
	if(! $_SESSION['vadminp']){
		header("Location: ../index.php");
	}
	else{
		$ssnm = $_SESSION['vadminp'];

		$sql = "SELECT * FROM register_advert ORDER BY ID DESC LIMIT 0, 1";
		$squery = $vfms_con->query($sql);
		while ($rows = $squery->fetch_array(MYSQLI_NUM)){
			$adid = $rows[1];
			$cname = $rows[2];
			$slno = $rows[21];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>VisionFM</title>

	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.theme.css">
	
   <!-- <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" /> -->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <!-- <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" /> -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
   <!-- <link href="../assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>

</head>
<body id="bodybg">

	  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="width: 100px; height: 80px;">
                    <img width="100" height="100" src="../images/Vlogo.png" alt="Vision FM">
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
             <sapn class="label label-danger" style="position: absolute; margin-top: 200px; margin-left: 1000px; font-size: 20px; text-align: left;">
             		<hr>
                	<span>Total Slots: <span id="TotalSlotsN">10</span></span>
                	<hr>
                	<span>Sets: <span id="SetSlots">10</span></span>
                	<hr>
                	<span>Remaining: <span id="RemainingSlots">10</span></span>
                	<hr>
              </sapn>

            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i>Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i>New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->
        </nav> 
<div class="col-md-12" style="margin-top:90px;">
	<input type="hidden" name="" id="NumDays" value="<?php echo $slno; ?>">
	<input type="hidden" name="" id="AdvertId" value="<?php echo $adid; ?>">
	
	<div class="col-md-12" style="max-height: 250px; overflow-y: auto; align-content: center;">
		<div class="col-md-2 col-md-offset-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 30px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Mondaydate" class="form-control datepick" placeholder="Monday" id="MondayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Mondaytime" class="form-control tmautocp" placeholder="Time" id="MondayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="MonSlotTime();">Set</button>
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="MonTimes">
				<div id="MonSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>	
			</div>	
		</div>

		<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 30px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Tuesdaydate" class="form-control datepick" placeholder="Tuesday" id="TuesdayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Tuesdaytime" class="form-control" placeholder="Time" id="TuesdayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="TueSlotTime()">Set</button>	

			<div class="col-md-12" style="margin-top: 10px; color: white;" id="TueTimes">
				<div id="TueSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>
			</div>	
		</div>
	
	<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 50px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Wednesdaydate" class="form-control datepick" placeholder="Wednesday" id="WednesdayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Wednesdaytime" class="form-control" placeholder="Time" id="WednesdayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="WedSlotTime()">Set</button>	
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="WedTimes">
				<div id="WedSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>
			</div>	
		</div>

		<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 50px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Thursdaydate" class="form-control datepick" placeholder="Thursday" id="ThursdayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Thursdaytime" class="form-control" placeholder="Time" id="ThursdayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="ThuSlotTime()">Set</button>	
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="ThuTimes">
				<div id="ThuSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>
				
			</div>	
		</div>
</div>	


<div class="col-md-12" style="margin-top: 10px; max-height: 250px; overflow-y: auto;">
		<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 30px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Fridaydate" class="form-control datepick" placeholder="Friday" id="FridayDate">
				</div>
					<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Fridaytime" class="form-control tmautocp" placeholder="Time" id="FridayTime">		
				</div>
					<button class="btn btn-danger btn-block" onclick="FriSlotTime();">Set</button>
			
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="FriTimes">
			<div id="FriSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>	
			</div>	
		</div>


		<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 30px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Saturdaydate" class="form-control datepick" placeholder="Saturday" id="SaturdayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Saturdaytime" class="form-control" placeholder="Time" id="SaturdayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="SatSlotTime()">Set</button>	
			
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="SatTimes">
				<div id="SatSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>
			</div>	
			
		</div>
	
	<div class="col-md-2" style="background: rgba(20,50,20,0.4); max-width: 250px; padding: 0px; margin-left: 50px; padding-top: 10px; border-top-right-radius:10px; border-bottom-right-radius: 10px;">
				<div class="col-md-1" style="width: 105px; padding: 0px;">
					<input type="text" name="Sundaydate" class="form-control datepick" placeholder="Sunday" id="SundayDate">
				</div>
				<div class="col-md-1" style="width: 105px; padding: 0px;">
						<input type="text" name="Sundaytime" class="form-control" placeholder="Time" id="SundayTime">
				</div>
					<button class="btn btn-danger btn-block" onclick="SunSlotTime()">Set</button>	
			<div class="col-md-12" style="margin-top: 10px; color: white;" id="SunTimes">
				<div id="SunSDate" style="color:white; background:rgba(150,50,50,0.4); border-radius:10px; text-align:center; margin-bottom:10px;"></div>
				
			</div>	
		</div>
</div>	
<div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
	<a href="vadmin_area.php"><button class="btn btn-danger btn-block">Finish</button></a>
</div>
</div>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/timesfile.js"></script>

    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

<script type="text/javascript">
			
</script>
</body>
</html>