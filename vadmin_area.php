<?php
	session_start();
	if ($_SESSION['vadminp']){
		$ssnm = $_SESSION['vadminp'];
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
 
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/vicon.ico" />
    <link rel="icon" type="image/x-icon" href="../images/vicon.ico" />

</head>
<body id="bodybg">

	  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.html">
                    <img width="150" height="50" src="../images/Vlogo.png" alt="Vision FM">
                </a>
            </div>
           
            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                 
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
                  
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                 
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="row"> 
        
        <nav class="navbar-default col-md-2" role="navigation" style="margin-top: 80px; width:210px; padding: 0px; margin-left: 10px;">
            <div class="sidebar-collapse" style="">
                <ul class="nav" id="side-menu" style="background:#BC3437">
                    <li>
                        <div class="user-section" style="background:rgba(200,200,200,0.2);">
                            <div class="user-info">
                                <div><strong><?php $dte = date('d/m/Y'); echo " " .$ssnm ."  " .$dte; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="" value="<?php echo $dte; ?>" id="crtime">
                    </li>
                    <li class="sidebar-search">
                      
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" id="SearchText" placeholder="Search...">
                            <span class="input-group-btn" style="padding-top: 5px;">
                                <button class="btn btn-default" type="button" id="SearchRec">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                   
                    </li>
                    <li class="">
                        <a href="#" onclick="RegisterAd();"><i class="fa fa-save fa-fw"></i> Advert Register </a>
                    </li>
                    <li>
                        <a href="#" onclick="TransTableShow();"><i class="fa fa-exchange fa-fw"></i>Transactions</a>
                    </li>
                     <li>
                        <a href="#" onclick="AutomationShow();"><i class="fa fa-flask fa-fw"></i>Radio DJ Report</a>
                    </li>
                    <li>
                        <a href="#" onclick="AddupdateShow();"><i class="fa fa-edit fa-fw"></i>Add / Update</a>
                    </li>
                    <li>
                        <a href="#" onclick="printPageShow();"><i class="fa fa-print fa-fw"></i>Print Report</a>
                    </li>
                </ul>
            </div>
        
        </nav>
     
	        <div class="col-md-10" id="RegisterAdvert" style=" margin-top:0px; padding:20px; background: rgba(20,20,20,0.8);">
	        	  
	        </div>
        </div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>