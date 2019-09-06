<?php 
    session_start();
    if (isset($_SESSION['vsubuserp'])) {
        require_once 'config/database.php';
        $stID = $_SESSION['Station_ID_No']; 
        $subuserid = $_SESSION['Sub_UserID'];
        $ssnm = $_SESSION['vsubuserp'];
        $location = $_SESSION['location'];
        $db = new Database();

        $bio = $db->getRow('SELECT * FROM `vsn_staff` WHERE 
        `Staff_ID` = ? AND `Station_ID` = ?', [$subuserid, $stID]);
        $edu = $db->getRow('SELECT * FROM `vsn_staff_schools` WHERE 
        `Staff_ID` = ? AND `Station_ID` = ?', [$subuserid, $stID]);
        $exp = $db->getRow('SELECT * FROM `vsn_staff_expr` WHERE 
        `Staff_ID` = ? AND `Station_ID` = ?', [$subuserid, $stID]);
    }else{
        header('Location: ../index.php');
    }
    require_once 'layouts/sub-header.php';
?>
<div class="container">
    <?php if(!$bio): ?>
    <div class="row">
        <div class="col-md-4">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <strong>No Profile Created</strong>
                </div>
            </div>
            <a href="userdashboard.php" class="btn btn-sm btn-danger">
            <i class="fas fa-caret-left"></i> Dashboard
            </a>
        </div>
    </div>
    <?php endif; ?>
    <?php if($bio): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <img class="card-img-top" src="../images/staff/headshot.jpg" alt="User Image">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="text-primary">
                            <?= strtoupper($bio['C_Name'])?>
                        </h5>
                        
                        <h6>
                            <?= strtoupper($bio['C_Title'])?>
                        </h6>
                        <h6>
                            <?= strtoupper($bio['C_Number'])?>
                        </h6>
                        <hr class="bg-danger">
                                <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <button href="#" class="btn btn-sm btn-primary" id="SubStaffViewLoad">
                    <i class="fas fa-print"></i> Print
                    </button>
                    <a href="userdashboard.php" class="btn btn-sm btn-danger">
                    <i class="fas fa-caret-left"></i> Dashboard
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-4 card p-2">
                                    <h5 class="text-danger">Personal Data</h5>
                                    <hr class="m-0 mb-1 bg-danger">
                                    <h6><b>Reg ID:</b> <?= $bio['Staff_ID'] ?></h6>
                                    <h6><b>Gender</b> <?= $bio['C_Gender'] ?></h6>
                                    <h6><b>Marital Status:</b> <?= $bio['C_Maritalstatus'] ?></h6>
                                    <h6><b>Date of Birth:</b> <?= $bio['C_Dateofbirth'] ?></h6>
                                    <h6><b>Email:</b> <?= $bio['C_Email'] ?></h6>
                                    <h6><b>Nationality:</b> <?= $bio['C_Nationality'] ?></h6>
                                    <h6><b>State:</b> <?= $bio['C_State'] ?></h6>
                                    <h6><b>LGA:</b> <?= $bio['C_Lga'] ?></h6>
                                    <h6><b>Address:</b> <?= $bio['C_Address'] ?> lore</h6>
                                    <h6><b>Acc No.:</b> <?= $bio['C_AccNumber'] ?></h6>
                                    <h6><b>Acc Name:</b> <?= $bio['C_AccName'] ?></h6>
                                    <h6><b>Bank:</b> <?= $bio['C_Bank'] ?></h6>
                                </div>
                                <div class="col-md-8 card p-2">
                                  <h5 class="text-danger">Education</h5>
                                  <hr class="m-0 mb-1 bg-danger">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <h6><b>Primary:</b><br><?= $edu['C_Prm']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_PrmQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_PrmFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_PrmTo'] ?></h6>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h6><b>Secondary:</b><br><?= $edu['C_Sec']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_SecQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_SecFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_SecTo'] ?></h6>
                                    </div>
                                    <?php if($edu['C_Ter']): ?>
                                    <div class="col-md-6">
                                    <hr class="bg-danger">
                                        <h6><b>Tertiary:</b><br><?= $edu['C_Ter']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_TerQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_TerFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_TerTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($edu['C_ScOne']): ?>
                                    <div class="col-md-6">
                                        <hr class="bg-danger">
                                        <h6><b>Other Institution: </b><br><?= $edu['C_ScOne']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_ScOneQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_ScOneFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_ScOneTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($edu['C_ScTwo']): ?>
                                    <div class="col-md-6">
                                        <hr class="bg-danger">
                                        <h6><b>Other Institution:</b><br><?= $edu['C_ScTwo']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_ScTwoQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_ScTwoFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_ScTwoTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($edu['C_ScThree']): ?>
                                    <div class="col-md-6">
                                        <hr class="bg-danger">
                                        <h6><b>Other Institution:</b><br><?= $edu['C_ScThree']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_ScThreeQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_ScThreeFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_ScThreeTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($edu['C_ScFour']): ?>
                                    <div class="col-md-6">
                                        <hr class="bg-danger">
                                        <h6><b>Other Institution:</b><br><?= $edu['C_ScFour']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_ScFourQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_ScFourFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_ScFourTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($edu['C_ScFive']): ?>
                                    <div class="col-md-6">
                                        <hr class="bg-danger">
                                        <h6><b>Other Institution:</b><br><?= $edu['C_ScFive']?></h6>
                                        <h6><b>Certificate</b><br><?= $edu['C_ScFiveQual'] ?></h6>
                                        <h6><b>From: </b><?= $edu['C_ScFiveFrom'] ?></h6>
                                        <h6><b>To: </b><?= $edu['C_ScFiveTo'] ?></h6>
                                    </div>
                                    <?php endif; ?>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6 card p-2">
                                  <h5 class="text-danger">Skills</h5>
                                  <hr class="m-0 mb-1 bg-danger">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <?php if($exp['Skill_1']): ?>
                                            <h6><b>Skill: </b><br><?= $exp['Skill_1']?></h6>
                                            <h6><b>Description: </b><br><?= $exp['SkillDesc_1'] ?></h6>
                                        <?php endif; ?>
                                        <?php if($exp['Skill_2']): ?>
                                            <h6><b>Skill: </b><br><?= $exp['Skill_2']?></h6>
                                            <h6><b>Description: </b><br><?= $exp['SkillDesc_2'] ?></h6>
                                        <?php endif; ?>
                                        <?php if($exp['Skill_3']): ?>
                                            <h6><b>Skill: </b><br><?= $exp['Skill_3']?></h6>
                                            <h6><b>Description: </b><br><?= $exp['SkillDesc_3'] ?></h6>
                                        <?php endif; ?>
                                        <?php if($exp['Skill_4']): ?>
                                            <h6><b>Skill: </b><br><?= $exp['Skill_4']?></h6>
                                            <h6><b>Description: </b><br><?= $exp['SkillDesc_4'] ?></h6>
                                        <?php endif; ?>
                                        <?php if($exp['Skill_5']): ?>
                                            <h6><b>Skill: </b><br><?= $exp['Skill_5']?></h6>
                                            <h6><b>Description: </b><br><?= $exp['SkillDesc_5'] ?></h6>
                                        <?php endif; ?>
                                    </div>

                                   </div>
                                </div>
                                <div class="col-md-6 card p-2">
                                    <h5 class="text-danger">Experience</h5>
                                    <hr class="m-0 mb-1 bg-danger">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if($exp['Job_1']): ?>
                                                <h6><b>Title: </b><br><?= $exp['Job_1']?></h6>
                                                <h6><b>Company: </b><br><?= $exp['JobCom_1'] ?></h6>
                                                <h6><b>From: </b><br><?= $exp['JobFrom_1'] ?></h6>
                                                <h6><b>To: </b><br><?= $exp['JobTo_1'] ?></h6>
                                            <?php endif; ?>
                                            <?php if($exp['Job_2']): ?>
                                                <h6><b>Title: </b><br><?= $exp['Job_2']?></h6>
                                                <h6><b>Company: </b><br><?= $exp['JobCom_2'] ?></h6>
                                                <h6><b>From: </b><br><?= $exp['JobFrom_2'] ?></h6>
                                                <h6><b>To: </b><br><?= $exp['JobTo_2'] ?></h6>
                                            <?php endif; ?>
                                            <?php if($exp['Job_3']): ?>
                                                <h6><b>Title: </b><br><?= $exp['Job_3']?></h6>
                                                <h6><b>Company: </b><br><?= $exp['JobCom_3'] ?></h6>
                                                <h6><b>From: </b><br><?= $exp['JobFrom_3'] ?></h6>
                                                <h6><b>To: </b><br><?= $exp['JobTo_3'] ?></h6>
                                            <?php endif; ?>
                                            <?php if($exp['Job_4']): ?>
                                                <h6><b>Title: </b><br><?= $exp['Job_4']?></h6>
                                                <h6><b>Company: </b><br><?= $exp['JobCom_4'] ?></h6>
                                                <h6><b>From: </b><br><?= $exp['JobFrom_4'] ?></h6>
                                                <h6><b>To: </b><br><?= $exp['JobTo_4'] ?></h6>
                                            <?php endif; ?>
                                            <?php if($exp['Job_5']): ?>
                                                <h6><b>Title: </b><br><?= $exp['Job_5']?></h6>
                                                <h6><b>Company: </b><br><?= $exp['JobCom_5'] ?></h6>
                                                <h6><b>From: </b><br><?= $exp['JobFrom_5'] ?></h6>
                                                <h6><b>To: </b><br><?= $exp['JobTo_5'] ?></h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <?php endif; ?>
</div>

<?php 
    require_once 'layouts/sub-footer.php';
?>