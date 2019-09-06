<?php
	session_start(); 
	if ($_SESSION['vuserp']){
        // require_once 'config/database.php';
        // $db = new Database();

        require_once 'dbquery/allrecords.php';

		$ssnm = $_SESSION['vuserp'];
        $location = $_SESSION['location'];
        $stationID = $_SESSION['Station_ID_No']; 

        // $advertsRegistered = $db->getRow('SELECT COUNT(`ID`) AS ttadvrts FROM `Register_Advert` 
        // WHERE `Station_ID` = ?', [$stationID]);
        $db = new allrecords();

        $add = $db->get('`id`', '`Register_Advert`', '`Station_ID` = ?', [$stationID]);
        $unvsff = $db->get('`id`', '`vsn_sub_users`', '`Station_ID` = ?', [$stationID]);
        $vsff = $db->get('`id`', '`vsn_sub_user_verified`', '`Station_ID` = ?', [$stationID]);

        $unverifiedStaff = sizeof($unvsff);
        $verifiedStaff = sizeof($vsff);
        $noofAdverts = sizeof($add);

        date_default_timezone_set('Africa/Lagos');
        
	}
	else{
		header("Location: ../index.php");
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

    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
     <!-- Page-Level CSS -->
    
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/vicon.ico" />
    <link rel="icon" type="image/x-icon" href="../images/vicon.ico" />

</head>
<body id="bodybg"> 
	 <nav class="navbar navbar-default bg-danger navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="#">
                    <img width="150" height="50" src="../images/Vlogo.png" alt="Vision FM">
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background: transparent;">
                        <span class="top-label label label-danger  notificationNumber" style="font-size: 12px; border-radius: 10px; border: 1px solid white;"></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts notificationList">
                       
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background: transparent;">
                        <i class="fa fa-user fa-3x"></i>
                    </a> 
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user"> 
                        <li><a href="#" id="useruserprofile"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#" id="userSettings"><i class="fa fa-gear fa-fw"></i>Settings</a>
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

        <div class="container-fluid" style="padding: 0px; margin-top: 80px;">
        <nav class="col-md-2 col-xs-12" role="navigation" style="width:210px; padding: 0px;">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse" style="">
                <!-- side-menu -->
                <ul class="nav" id="side-menu" style="background:#BC3437;">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="background: #BC3437;">
                              <p class="" style="padding-left: 15px;"><?php echo $location; ?></p>
                            
                            <div class="col-md-12" style="color: white;">
                              
                               <p><?php  date_default_timezone_set('Africa/Lagos'); $dte = date('D d/m/Y'); echo $dte; ?></p>
                               <p style="font-size: 15px; font-family: times;"><?php echo $ssnm; ?></p>
                            </div>

                        </div>
                        <hr>
                        <input type="hidden" name="" value="<?php echo $dte; ?>" id="crtime">
                        <input type="hidden" name="" value="<?php $dd = new DateTime(); $tdd = $dd->format('Y-m-d'); echo $tdd; ?>" id="CurrentDateTime">
                        
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control " id="SearchText" placeholder="Search...">
                            <span class="input-group-btn" style="padding-top: 5px;">
                                <button class="btn btn-default " type="button" id="SearchRec">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="">
                        <a href="#" id="RegisterAd">
                            <i class="fa fa-desktop fa-1x"> |</i> Advert Register
                        </a>
                    </li>
                    <li class="">
                        <a href="#" id="programsPageLoad">
                            <i class="fa fa-edit fa-1x"> </i> Programs Register
                        </a>
                    </li>
                    <li class="">
                        <a href="#" id="StaffPageLoad">
                            <i class="fa fa-user fa-1x"> </i> Staff Information
                        </a>
                    </li>
                    <li>
                        <a href="#" id="TransTableShow">
                            <i class="fa fa-exchange fa-1x"> </i> Transactions
                        </a>
                    </li>
                     <li>
                        <a href="#" id="AutomationShow">
                            <i class="fa fa-play"> </i> Radiodj Report
                        </a>
                    </li>
                    <li>
                        <a href="#" id="printPageShow">
                            <i class="fa fa-print"> </i> Print Report
                        </a>
                    </li>
                    <li>
                        <a href="#" id="onlineBackuptShow">
                            <i class="fa fa-web"> </i> Online Backup
                        </a>
                    </li>
                 
                        <!-- second-level-items -->
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>

            <div id="page-wrapper" class="mainwrapper">
            <div class="se-pre-con"></div>
                <div id="RegisterAdvert"> 
                </div>
            </div>
    </div>
        <div id="UpdateModal" style="font-weight: bold;">
        </div>

        <div class="" id="AddPayModal">  
        </div>

        <div id="DeleteModal">
        </div>
        <div id="EditPrsntModal">
        </div>

    /.. 

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/timesfile.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
