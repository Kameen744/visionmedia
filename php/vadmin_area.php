<?php
	session_start(); 
	if ($_SESSION['vadminp']){
		$ssnm = $_SESSION['vadminp'];
        date_default_timezone_set('Africa/Lagos');
        require "config/database.php";
        $db = new Database();
        
     try {
        $add = $db->getRows('SELECT `id` FROM `register_advert`');
        $unvsff = $db->getRows('SELECT `id` FROM `vsn_sub_users`');
        $vsff = $db->getRows('SELECT `id` FROM `vsn_sub_user_verified`');
        $stations = $db->getRows('SELECT * FROM stations');
     } catch (\Throwable $th) {
        
     }
        
        $unverifiedStaff = sizeof($unvsff);
        $verifiedStaff = sizeof($vsff);
        $noofAdverts = sizeof($add);
	}
	else{
		header("Location: ../index.php");
    }
    
    include_once 'layouts/header.php';
?>
<?php include_once 'layouts/admin-side-navbar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
        <div id="content">
            <?php include_once 'layouts/admin-top-navbar.php'; ?>

            <div class="container-fluid px-3" id="RegisterAdvert">
                <div class="row">
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
                        <a href="#" id="unverifiedstaff">
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
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#" id="verifiedstaff">
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
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include_once 'layouts/footer.php'; ?>