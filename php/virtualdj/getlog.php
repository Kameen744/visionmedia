<?php 
session_start();
    if(isset($_POST['getLog'])) {
        require_once "getfile.php";
        $pagesub = $_POST['getLog'];
        $log = new getfile();
        $log->getlogtable($pagesub); 
        //$log->getlogtable();
        //$log->logtodb();
    }
    if(isset($_REQUEST['printLogFilter'])) {
        echo "<input type='text' class='form-control' placeholder='Search by Name' id='LogByName'>
            <input type='text' class='form-control logDatpick' placeholder='From' id='plogFrom'>
            <input type='text' class='form-control logDatpick' placeholder='To' id='plogTo'>
            <script>
                $('.logDatpick').datepicker({dateFormat: 'yy-mm-dd'});
            </script>
            ";
    }
    if(isset($_POST['logFrom'])) {
        require_once "getfile.php";
        $log = new getfile();
        $log->printAllLogData(trim($_POST['logFrom']), trim($_POST['logTo']), trim($_POST['LogByName']));
    }
?>