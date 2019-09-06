<?php 
    session_start();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sb-admin-2.min.css">
    <title>Appraisal Form</title>
</head>
<body>
    <div class="card card-body mx-md-5 mt-2 mx-sm-1">
        <nav class="nav justify-content-center bg-primary">
          <h3 class="text-light text-center">VISION MEDIA SERVICES</h3>
        </nav>
            <h3 class="text-center">Staff Appraisal Form</h3>
            <p>
                The Self-Appraisal provides you with the opportunity
                to contribute significantly to improving both your own 
                performance and your working relationship with your 
                supervisor. The Performance Appraisal Program is 
                designed to provide time for the employee and supervisor
                to look back over the past and realistically plan for the 
                future. <br>
                the self-appraisal form also serves as a tool for employment
                (temporary, casual and permanent) promotion and upgrading of 
                from one level to another.
            </p> 
            <h3 class="text-center">Instructions for completing this form:</h3>
            <ul>
                <li>Employees should respond to each of the questions completetely and accurately.</li>
                <li>Employees should complete this form prior to the annual
                performance appraisal meeting with their supervisor.</li>
                <li>Employees should provide their supervisor an copy of this
                completed form prior to their performance appraisal meeting.</li>
            </ul>
        
        <div class="card card-body">
            
            <a href="appraisal-form.php" class="btn btn-primary mb-3" >Start</a>

            <a href="../php/userdashboard.php" class="btn btn-danger" >Back to dashboard</a>
            
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>