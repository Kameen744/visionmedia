<?php
	session_start(); 
	if ($_SESSION['vsubuserp']){
        require_once 'config/database.php';
        $db = new Database();

        $subuserid = $_SESSION['Sub_UserID'];
		$ssnm = $_SESSION['vsubuserp'];
        $location = $_SESSION['location'];
        $stationID = $_SESSION['Station_ID_No']; 

        date_default_timezone_set('Africa/Lagos');
        
        require_once 'layouts/sub-header.php';
	}
	else{
		header("Location: ../index.php");
    }
    
?>
    <?php require_once 'layouts/sub-side-navbar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
        <div id="content">

            <?php require_once 'layouts/sub-top-navbar.php'; ?>

            <div class="container-fluid px-3" id="RegisterAdvert">
                <div class="row">

                   
                    <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Messages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                            </div>
                            <div class="col-auto">
                            
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    
    </div>
<?php require_once 'layouts/sub-footer.php'; ?>