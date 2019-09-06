<?php
    session_start();
	if(isset($_SESSION['vadminp'])) {
        require "config/database.php";
        $db = new Database();
        $stations = $db->getRows('SELECT * FROM `stations`');
    }
?>

<?php if(isset($_POST['Station_id'])): ?>

    <?php
        $Station_ID = $_POST['Station_id'];
        $vsn_users = $db->getRows('SELECT * FROM `vsn_users` WHERE `Station_ID` = ?', [$Station_ID]);
        $vsn_sub_users = $db->getRows('SELECT * FROM `vsn_sub_user_verified` WHERE `Station_ID` = ?', [$Station_ID]);
    ?>

    <div class="col-lg-5">
        <h3 class="text-center">Supervisors</h3>
        <table class="table table-inverse table-responsive table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($vsn_users as $user): ?>
                <tr>
                    <td><?= $user['V_User_Name'] ?></td>
                    <td><?= $user['V_Status'] ?></td>
                    <td>
                        <button class="btn btn-danger btn-sm" value="<?= $user['ID'] ?>" id="adminDeleteUser">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-7">
        <h3 class="text-center">Staff</h3>
        <table class="table table-inverse table-responsive table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Approved By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($vsn_sub_users as $staff): ?>
                <tr>
                    <td><?= $staff['V_S_username'] ?></td>
                    <td><?= $staff['user_email'] ?></td>
                    <td><?= $staff['Approved_By'] ?></td>
                    <td>
                        <button class="btn btn-danger btn-sm" value="<?= $staff['Sub_User_ID'] ?>" id="adminDeleteStaff">Delete</button>
                        <button class="btn btn-info btn-sm" value="<?= $staff['Sub_User_ID'] ?>" id="adminAppraisalStaff">Appraisal</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

<?php endif; ?>

<!-- ( [ID] => 1 [V_S_Location] => Abuja [V_User_Name] => Muslim 
[V_User_Password] => muslim [V_Status] => IT Engr [Station_ID] => VABU8429 ) -->
<!-- 
( [0] => Array ( [ID] => 27 [Sub_User_ID] => 1454LA 
[user_email] => [V_S_username] => Lawal [V_S_password] => sokoto921 
[V_S_Location] => Sokoto [Station_ID] => VSOK7134 
[Created_By] => Zaki [Created_At] => 2018-04-09 15:51:10 ) -->