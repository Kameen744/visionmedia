<?php
     session_start();
     require '../php/config/database.php';

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

    $db = new Database();
    $title = 'View/Edit Appraisal';
    $uriSgmnt = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $apps = $db->getRows('SELECT `appraisal_Date` FROM `vsn_staff_appraisal` 
    WHERE `station_id` = ? AND `vsn_staff_id` = ?', [$stationID, $subuserid]);

    // print_r($uriSgmnt);
    require_once 'header.php';
?>
<!-- vie edit appraisal page -->
<?php if(!isset($uriSgmnt[4])): ?>
<div class="container">
    <h1 class="text-center text-white bg-primary py-2 my-1">View / Edit Appraisal</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Appraisal Date</th>
                <th>View Content</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($apps as $app): ?>
                <tr>
                    <td scope="row"><?= $app['appraisal_Date'] ?></td>
                    <td>
                     <a class="btn btn-primary" 
                     href="../appraisal/viewappraisal.php/<?= $app['appraisal_Date']?>">View</a>
                    </td>
                    <td>
                    <a class="btn btn-primary" 
                     href="../appraisal/viewappraisal.php/edit/<?= $app['appraisal_Date']?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
        <a href="../php/userdashboard.php" class="btn btn-danger" >Back to dashboard</a>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- view edit -->
<?php if(isset($uriSgmnt[4])): ?>

    <!-- edit appraisal -->
    <?php if($uriSgmnt[4] === 'edit'): ?>
    <h1 class="text-center text-white bg-primary py-2 my-1">Edit Appraisal</h1>
    <?php else: ?>

    <!-- view Appraisal -->
    <!-- get appraisal to view from database -->
    <?php 
        $viewapp = $db->getRow('SELECT * FROM `vsn_staff_appraisal` 
        WHERE `station_id` = ? AND `vsn_staff_id` = ? AND `appraisal_Date` = ?' , 
        [$stationID, $subuserid, $uriSgmnt[4]]);
    ?>
    <div class="container">
        <h1 class="text-center text-white bg-primary py-2 my-1">
        Staff Appraisal of <?= $viewapp['appraisal_Date']?>
        </h1>

        <div class="row border mx-2">
            <div class="col-6">
                <h3>Employee Name:</h3>
            </div>
            <div class="col-6">
                <h3><?= $viewapp['staff_name']?></h3>
            </div>
            <div class="col-6">
                <h3>Employee Department:</h3>
            </div>
            <div class="col-6">
                <h3><?= $viewapp['staff_department']?></h3>
            </div>
            <div class="col-6">
                <h3>Supervisor Name:</h3>
            </div>
            <div class="col-6">
                <h3><?= $viewapp['supervisor_name']?></h3>
            </div>
            <div class="col-6">
                <h3>Supervisor Title:</h3>
            </div>
            <div class="col-6">
                <h3><?= $viewapp['supervisor_title']?></h3>
            </div>
            
        </div>

        <hr class="bg-primary mx-2">

        <div class="row border mx-2">
            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">What are your tasks during the previous one year?</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_task']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">Year</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_task_year']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">Please list your area(s) & area(s) of improvement in the last year.</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_area_imp']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">What are the challenges that you faced and be able to tackle them in discharging your tasks in the previous year?</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_challenges']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">Describe any bariers or challenges that affected your</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_bariers']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">What are the tools or training would you need to develope to improve your performance?</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_training']?></h5 class="text-justify">
            </div>

            <div class="col-12">
                <h4 class="text-center text-white bg-info py-1">Is there any information you would like to share with your supervisor regarding your work performance?</h4>
            </div>
            <div class="col-12 border mb-2">
                <h5 class="text-justify"><?= $viewapp['staff_info']?></h5 class="text-justify">
            </div>
        </div>
    </div>

    <?php endif; ?>
<?php endif; ?>

<?php require_once 'footer.php'; ?>

<!-- Array ( [0] => Array ( 
[id] => 7 [vsn_staff_id] => 7747KA [station_id] => VABU8429 
[staff_name] => Kamal Aminu [staff_department] => Test D 
[supervisor_name] => Tes S [supervisor_title] => Test Title 
[appraisal_Date] => 2019-06-13 [staff_task] => test Task 
[staff_task_year] => test year [staff_area_imp] => test area of impr 
[staff_challenges] => test challanges [staff_bariers] => test bariers 
[staff_training] => test training needed 
[staff_info] => test information share [created_At] => 2019-06-13 14:08:30 ))  -->