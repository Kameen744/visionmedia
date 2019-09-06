<?php
    session_start(); 
    require_once '../config/database.php';
    $db = new Database();
	if (isset($_SESSION['vuserp'])){
		$ssnm = $_SESSION['vuserp'];
        $location = $_SESSION['location'];
        $stationID = $_SESSION['Station_ID_No']; 

        date_default_timezone_set('Africa/Lagos');

        $staffs = $db->getRows('SELECT * FROM `vsn_sub_users` WHERE `Station_ID` = ? ', [$stationID]);

        $verifiedStaffs = $db->getRows('SELECT * FROM `vsn_sub_user_verified` WHERE `Station_ID` = ?', 
        [$stationID]);

	} elseif (isset($_SESSION['vadminp'])) {
        $ssnm = $_SESSION['vadminp'];
        
        if(isset($_POST['scstID'])){
           $stID = $_POST['scstID']; 
        }else{
            $stID = '';
        }
        
        if(isset($stID)){
            $staffs = $db->getRows('SELECT * FROM `vsn_sub_users` WHERE `Station_ID` = ? ', [$stID]);
            $verifiedStaffs = $db->getRows('SELECT * FROM `vsn_sub_user_verified` WHERE `Station_ID` = ?', 
            [$stID]);
        } else {
            $staffs = $db->getRows('SELECT * FROM `vsn_sub_users`');
            $verifiedStaffs = $db->getRows('SELECT * FROM `vsn_sub_user_verified`');
        }
       
	}
	else{
		header("Location: ../index.php");
    }

?>
<?php if(isset($_POST['verifyStaffTable'])): ?>
<table class="table table-bordered table-striped table-inverse table-responsive" id="unverifiedTable">
    <thead class="thead-inverse">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Location</th>
            <th>Registered On</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($staffs as $staff): ?>
            <tr>
                <td scope="row"><?= $staff['V_S_username'] ?></td>
                <td><?= $staff['user_email'] ?></td>
                <td><?= $staff['V_S_Location'] ?></td>
                <td><?= $staff['Created_At'] ?></td>
                <td>
                <button type="button" name="" id="verifyStaffBtn" 
                class="btn btn-danger btn-sm btn-block" value="<?= $staff['Sub_User_ID'] ?>">
                    Verify
                </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>
<?php endif; ?>

<!-- verify staff button clicked -->
<?php if(isset($_POST['verifyStaffBtn'])): ?>

    <?php 

    $staffId = $_POST['staffId'];
    try {
        $vstf = $db->getRow('SELECT * FROM `vsn_sub_users` 
        WHERE `Sub_User_ID` = ?', [$staffId]); 
    
        $ins = $db->insertRow('INSERT INTO `vsn_sub_user_verified` (`Sub_User_ID`, `user_email`,
        `V_S_username`, `V_S_password`, `Station_ID`, `V_S_Location`, `Approved_By`) 
        VALUES (?,?,?,?,?,?,?)', [$vstf['Sub_User_ID'], $vstf['user_email'], $vstf['V_S_username'], 
        $vstf['V_S_password'], $vstf['Station_ID'], $vstf['V_S_Location'], $ssnm]);
      
        $del = $db->deleteRow('DELETE FROM `vsn_sub_users` WHERE `Sub_User_ID` = ?', [$staffId]);

        if(isset($stID)){
            $stafNew = $db->getRows('SELECT * FROM `vsn_sub_users` WHERE `Station_ID` = ? ', [$stID]);
        } elseif (isset($stationID)) {
            $stafNew = $db->getRows('SELECT * FROM `vsn_sub_users` WHERE `Station_ID` = ? ', [$stationID]);
        }else{
            $stafNew = $db->getRows('SELECT * FROM `vsn_sub_users`');
        }

    
    } catch (\Throwable $th) {
        throw $th;
    }
    
    ?>

    <?php if($ins): ?>
        <?php if($stafNew): ?>
        <thead class="thead-inverse">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Location</th>
                <th>Registered On</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($stafNew as $staff): ?>
                <tr>
                    <td scope="row"><?= $staff['V_S_username'] ?></td>
                    <td><?= $staff['user_email'] ?></td>
                    <td><?= $staff['V_S_Location'] ?></td>
                    <td><?= $staff['Created_At'] ?></td>
                    <td>
                    <button type="button" name="" id="verifyStaffBtn" 
                    class="btn btn-danger btn-sm btn-block" value="<?= $staff['Sub_User_ID'] ?>">
                        Verify
                    </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    <?php endif; ?>

<?php endif; ?>

<?php if(isset($_POST['verifiedTable'])): ?>
<table class="table table-bordered table-striped table-inverse table-responsive" id="unverifiedTable">
    <thead class="thead-inverse">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Location</th>
            <th>Verified On</th>
            <!-- <th>Action</th> -->
        </tr>
        </thead>
        <tbody>
        <?php foreach($verifiedStaffs as $staff): ?>
            <tr>
                <td scope="row"><?= $staff['V_S_username'] ?></td>
                <td><?= $staff['user_email'] ?></td>
                <td><?= $staff['V_S_Location'] ?></td>
                <td><?= $staff['Approved_At'] ?></td>
                <!-- <td>
                <button type="button" name="" id="verifyStaffBtn" 
                class="btn btn-danger btn-sm btn-block" value="<?= $staff['Sub_User_ID'] ?>">
                    Verify
                </button>
                </td> -->
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>
<?php endif; ?>