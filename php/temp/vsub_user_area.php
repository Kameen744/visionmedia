<?php
    session_start(); 
    define( 'base_path', __DIR__);
	if ($_SESSION['vsubuserp']){
        $subuserid = $_SESSION['Sub_UserID'];
		$ssnm = $_SESSION['vsubuserp'];
        $location = $_SESSION['location'];
        $stationID = $_SESSION['Station_ID_No']; 
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
                        <span class="top-label label label-danger  subusernotificationNumber" style="font-size: 12px; border-radius: 10px; border: 1px solid white;"></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts subusernotificationList">
                       
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background: transparent;">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" id="subuseruserprofile"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>
                        <li><a href="#" id="subuserSettings"><i class="fa fa-gear fa-fw"></i>Settings</a>
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
        <nav class="col-md-2" role="navigation" style="width:210px; padding: 0px;">
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
                        <input type="hidden" value="<?php echo $subuserid; ?>" id="subUserID">
                        
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control " id="subuserSearchText" placeholder="Search...">
                            <span class="input-group-btn" style="padding-top: 5px;">
                                <button class="btn btn-default " type="button" id="subuserSearchRec">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="">
                        <a href="#" id="SubStaffPageLoad">
                            <i class="fa fa-edit fa-1x"> </i> Create CV
                        </a>
                        <a href="#" id="SubStaffViewLoad">
                            <i class="fa fa-table fa-lx"> </i> View Information
                        </a>
                        <a href="#" id="SubStaffEditLoad">
                            <i class="fa fa-info fa-1x"> </i> Edit Information
                        </a>
                        <a href="../appraisal" id="AppraisalFormBtn">
                            <i class="fa fa-wpforms fa-1x"> </i> Appraisal Form
                        </a>
                        <a href="../appraisal/viewappraisal.php" id="ViewAppraisalFormBtn">
                            <i class="fa fa-table fa-1x"> </i> View Appraisal
                        </a>
                    </li>
                        <!-- second-level-items -->
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>

            <div id="page-wrapper" class="mainwrapper">
                 <div id="RegisterAdvert"> 
                    <?php if(isset($_SESSION['appraisalStatus'])):?>
                        <div class="alert alert-success">
                          <strong><?= $_SESSION['appraisalStatus'] ?></strong> 
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    </div>
            <div id="UpdateModal" style="font-weight: bold;">
            </div>

            <div class="" id="AddPayModal">  
            </div>

            <div id="DeleteModal">
            </div>
        
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/timesfile.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>