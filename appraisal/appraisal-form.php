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
    <div class="container bg-primary text-white">
        <nav class="nav justify-content-center bg-primary">
          <h2 class="text-light text-center">VISION MEDIA SERVICES</h2>
        </nav>
        <hr class="bg-white">
            <h3 class="text-center mt-3">Staff Appraisal Form</h3>
            <hr class="bg-white">
            <form action="server.php" method="post" class="form pb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                  
                        <input type="text"
                            class="form-control" name="Emp_Name" id="Emp_Name" placeholder="Employee Name" required>
                        </div>
                        <div class="form-group">
                 
                        <input type="text"
                            class="form-control" name="Emp_Department" id="Emp_Department" placeholder="Employee Department" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        
                        <input type="text"
                            class="form-control" name="Spv_Name" id="Spv_Name" placeholder="Supervisor Name" required>
                        </div>
                        <div class="form-group">
                       
                        <input type="text"
                            class="form-control" name="Spv_Title" id="Spv_Title" placeholder="Supervisor Title" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                <label for="Apr_Date">Self-Appraisal Date</label>
                <input type="date"
                    class="form-control" name="Apr_Date" id="Apr_Date" placeholder="Self-Appraisal Date" required>
                </div>
                <hr class="bg-white">

                <div class="form-group">
                <label for="Emp_Task">What are your tasks during the previous one year?</label>
                <textarea class="form-control" name="Emp_Task" id="Emp_Task" rows="3" required></textarea>
                </div>

                <div class="form-group">
                <label for="Emp_Task_Year">Year</label>
                <textarea class="form-control" name="Emp_Task_Year" id="Emp_Task_Year" rows="3" required></textarea>
                </div>

                <div class="form-group">
                <label for="Emp_Area_Imp">Please list your area(s) & area(s) of improvement in the last year.</label>
                <textarea class="form-control" name="Emp_Area_Imp" id="Emp_Area_Imp" rows="3" required></textarea>
                </div>

                <div class="form-group">
                <label for="Emp_Challenges">What are the challenges that you faced and be able to tackle them in discharging your tasks in the previous year?</label>
                <textarea class="form-control" name="Emp_Challenges" id="Emp_Challenges" rows="3" required></textarea>
                </div>

                <div class="form-group">
                <label for="Emp_Bariers">Describe any bariers or challenges that affected your ....</label>
                <textarea class="form-control" name="Emp_Bariers" id="Emp_Bariers" rows="3" required></textarea>
                </div>

                <div class="form-group">
                <label for="Emp_Training">What are the tools or training would you need to develope to improve your performance?</label>
                <textarea class="form-control" name="Emp_Training" id="Emp_Training" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                <label for="Emp_Info">Is there any information you would like to share with your supervisor regarding your work performance?</label>
                <textarea class="form-control" name="Emp_Info" id="Emp_Info" rows="3" required></textarea>
                </div>
                <hr class="bg-white">
                <button type="submitFirstStepForm" id="submitFirstStepForm" class="btn btn-success btn-block">SUBMIT</button>
            </form>
        
    </div>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>