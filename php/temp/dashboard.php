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
        include_once 'layouts/header.php';
	}
	else{
		header("Location: ../index.php");
    }
    
?>
<!-- <!DOCTYPE html>
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
     Page-Level CSS -->
    
	<!-- <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/vicon.ico" />
    <link rel="icon" type="image/x-icon" href="../images/vicon.ico" />

</head>
<body id="bodybg">  -->
	 <!-- <nav class="navbar navbar-default bg-danger navbar-fixed-top" role="navigation" id="navbar"> -->
            <!-- navbar-header -->
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="#">
                    <img width="150" height="50" src="../images/Vlogo.png" alt="Vision FM">
                </a>
            </div> -->
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <!-- <ul class="nav navbar-top-links navbar-right"> -->
                <!-- main dropdown -->
                <!-- <li class="dropdown"> -->
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background: transparent;">
                        <span class="top-label label label-danger  notificationNumber" style="font-size: 12px; border-radius: 10px; border: 1px solid white;"></span>  <i class="fa fa-bell fa-3x"></i>
                    </a> -->
                    <!-- dropdown alerts-->
                    <!-- <ul class="dropdown-menu dropdown-alerts notificationList">
                       
                    </ul> -->
                    <!-- end dropdown-alerts -->
                <!-- </li> -->

                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background: transparent;">
                        <i class="fa fa-user fa-3x"></i>
                    </a> -->
                    <!-- dropdown user-->
                    <!-- <ul class="dropdown-menu dropdown-user"> -->
                        <!-- <li><a href="#" id="useruserprofile"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#" id="userSettings"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li> -->
                    <!-- </ul> -->
                    <!-- end dropdown-user -->
                <!-- </li> -->
                <!-- end main dropdown -->
            <!-- </ul> -->
            <!-- end navbar-top-links -->
        <!-- </nav> -->
    <?php include_once 'layouts/side-navbar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
        <div id="content">

            <?php include_once 'layouts/top-navbar.php'; ?>

            <div class="container-fluid" id="RegisterAdvert">
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Adverts Registered</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $noofAdverts ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-ad fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Unverified Staff.</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $unverifiedStaff ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Verified Staff.</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $verifiedStaff ?></div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    </div>

    <!-- <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/timesfile.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html> -->
<?php include_once 'layouts/footer.php'; ?>