<?php 
    require '../php/config/database.php';
    session_start();
    date_default_timezone_set('Africa/Lagos');
	if (isset($_SESSION['vadminp']) | isset($_SESSION['vuserp'])) {
		if (isset($_SESSION['vuserp'])) {
			  $stID = $_SESSION['Station_ID_No']; 
        } elseif (isset($_SESSION['vadminp'])) {
			    $stID = $_POST['scstID'];
        }
    } else {
        header("Location: ../index.php");
    }
    
    // echo $_SERVER['DOCUMENT_ROOT'];
    $title = 'Appraisal Dashboard';
    $uriSgmnt = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    require_once 'header.php';
    $db = new Database();
    $year = date('Y');
    $staffs = $db->getRows('SELECT `Staff_ID`, `Station_ID`, C_Name 
    FROM `vsn_staff` WHERE `Station_ID` = ? ORDER BY `C_Name` ASC', [$stID]);
    
?>

<div class="container">
<h1 class="text-center text-white bg-danger py-2 my-1">Vision Media Services Staff Appraisal</h1>
<div class="card text-white bg-danger">
  <div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="row d-flex content-align-center">
                <div class="col-md-4">
                 <div class="form-group">
                   <select class="form-control" name="appYear">
                     <option>Filter by Year</option>
                     <option value="<?= $year ?>"><?= $year ?></option>
                   </select>
                 </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h4 class="card-title">Staff List</h4>
                <hr>
                <div class="list-group p-0">
                  <?php for($i = 0; $i < sizeof($staffs); $i++): ?>
                    <?php 
                      $stfid = $staffs[$i]['Staff_ID']; $stid = $staffs[$i]['Station_ID'];
                      
                      $confApp = $db->getRow('SELECT `id` FROM `vsn_super_appraisal` 
                      WHERE `Apr_Date` REGEXP ? AND `Staff_ID` = ? AND `Station_ID` = ?', 
                      [$year, $stfid, $stid]); 
                      if(isset($confApp['id'])){
                        $clsbg = 'bg-info text-white disabled';
                      } else {
                        $clsbg = 'bg-warning text-white';
                      }
                    ?>
                    <a href="supervisor.php/<?= $stfid .'/' .$stid ?>" 
                    class="list-group-item list-group-item-action py-1 <?= $clsbg ?>">
                    <?= $i+1 .': ' .strtoupper($staffs[$i]['C_Name']) ?>
                    </a>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">                    
<a href="../php/vuser_area.php" class="btn btn-danger m-2" >Back to dashboard</a>
</div>
</div>
<?php require_once 'footer.php'; ?>