<?php
session_start();
require "con_Vfm.php";
if (isset($_SESSION['vuserp'])) {
	$stID = $_SESSION['Station_ID_No'];
	
}
elseif (isset($_SESSION['vsubuserp'])) {
	$subuserid = $_SESSION['Sub_UserID'];
		$ssnm = $_SESSION['vsubuserp'];
        $location = $_SESSION['location'];
        $stID = $_SESSION['Station_ID_No']; 
}
if (isset($_POST['staffID_No'])) {
    if(!empty($_POST['staffID_No'])) {
        $subuserid = $_POST['staffID_No'];
    }
}
if (isset($_POST['S_Name'])) {
	if (empty($_POST['S_Name']) | empty($_POST['S_Number']) | empty($_POST['S_Gender']) ) {
		echo "Error! Empty Form";
	}
		else {
			$SName = mysqli_real_escape_string($vfms_con, $_POST['S_Name']);
			$SNumber = mysqli_real_escape_string($vfms_con, $_POST['S_Number']);
			$SEmail = mysqli_real_escape_string($vfms_con, $_POST['S_Email']);
			$SDateofbirth = mysqli_real_escape_string($vfms_con, $_POST['S_Dateofbirth']);
			$SGender = mysqli_real_escape_string($vfms_con, $_POST['S_Gender']);
			$SMaritalstatus = mysqli_real_escape_string($vfms_con, $_POST['S_Maritalstatus']);
			$SNationality = mysqli_real_escape_string($vfms_con, $_POST['S_Natiolity']);
			$SState = mysqli_real_escape_string($vfms_con, $_POST['S_State']);
			$SLga = mysqli_real_escape_string($vfms_con, $_POST['S_Lga']);
			$SAddress = mysqli_real_escape_string($vfms_con, $_POST['S_Address']);
			$SQualification = mysqli_real_escape_string($vfms_con, $_POST['S_Qualification']);
			$STitle = mysqli_real_escape_string($vfms_con, $_POST['S_Title']);
			$SLevel = mysqli_real_escape_string($vfms_con, $_POST['S_Level']);
			$SBank = mysqli_real_escape_string($vfms_con, $_POST['S_Bank']);
			$SAccName = mysqli_real_escape_string($vfms_con, $_POST['S_AccName']);
			$SAccNumber = mysqli_real_escape_string($vfms_con, $_POST['S_AccNumber']);

            $checkquer = $vfms_con->query("SELECT `Staff_ID` 
			FROM `vsn_staff` WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");
			$rows = $checkquer->fetch_array(MYSQLI_NUM);
			if (empty($rows[0])) {
			$stfquer = $vfms_con->query("INSERT INTO vsn_staff (Staff_ID, C_Name, C_Number, C_Email, 
				C_Dateofbirth, C_Gender, C_Maritalstatus, C_State, C_Lga, C_Address, C_Qualification, 
				C_Title, C_Level, Station_ID, C_Bank, C_AccNumber, C_AccName, C_Nationality) 
				VALUES ('$subuserid', '$SName', '$SNumber', '$SEmail', '$SDateofbirth', '$SGender', 
				'$SMaritalstatus', '$SState', '$SLga', '$SAddress', '$SQualification', '$STitle', 
                '$SLevel', '$stID', '$SBank', '$SAccNumber', '$SAccName', '$SNationality')");
            } else {
			$stfquer = $vfms_con->query("UPDATE vsn_staff SET 
				C_Name = '$SName', C_Number = '$SNumber', C_Email = '$SEmail', 
				C_Dateofbirth = '$SDateofbirth', C_Gender = '$SGender', 
				C_Maritalstatus = '$SMaritalstatus', C_State = '$SState', C_Lga = '$SLga', 
				C_Address = '$SAddress', C_Qualification = '$SQualification', 
				C_Title = '$STitle', C_Level = '$SLevel', 
				C_Bank = '$SBank', C_AccNumber = '$SAccNumber', C_AccName = '$SAccName', 
				C_Nationality = '$SNationality' WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");
			}
			if ($stfquer) {
				echo "Successefully updated";
			} 
			else {
				echo "Error! Failed To Update Details";
			}
		}
    }

if (isset($_POST['S_Primary'])) {
    if (empty($_POST['S_Primary']) | empty($_POST['S_Prfrom']) | empty($_POST['S_Prto'])) {
        echo "Error! Empty Form";
    } else {
        $S_Primary = mysqli_real_escape_string($vfms_con, $_POST['S_Primary']);
        $S_PrimaryQual = mysqli_real_escape_string($vfms_con, $_POST['S_PrimaryQual']);
        $S_Prfrom = mysqli_real_escape_string($vfms_con, $_POST['S_Prfrom']);
        $S_Prto = mysqli_real_escape_string($vfms_con, $_POST['S_Prto']);

        $S_Secondary = mysqli_real_escape_string($vfms_con, $_POST['S_Secondary']);
        $S_SecondaryQual = mysqli_real_escape_string($vfms_con, $_POST['S_SecondaryQual']);
        $S_Secfrom = mysqli_real_escape_string($vfms_con, $_POST['S_Secfrom']);
        $S_Secto = mysqli_real_escape_string($vfms_con, $_POST['S_Secto']);

        $S_Tertiary = mysqli_real_escape_string($vfms_con, $_POST['S_Tertiary']);
        $S_TertiaryQual = mysqli_real_escape_string($vfms_con, $_POST['S_TertiaryQual']);
        $S_Terfrom = mysqli_real_escape_string($vfms_con, $_POST['S_Terfrom']);
        $S_Terto = mysqli_real_escape_string($vfms_con, $_POST['S_Terto']);
   
        

        if (isset($_POST['S_OtherSch1']) & !empty($_POST['S_OtherSch1']) & !empty($_POST['S_OtherQual1']) & !empty($_POST['S_OtherFrom1']) & !empty($_POST['S_OtherTo1']) ) {
            
            $S_OtherSch1 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherSch1']);
            $S_OtherQual1 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherQual1']);
            $S_OtherFrom1 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherFrom1']);
            $S_OtherTo1 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherTo1']);

        } else {
                $S_OtherSch1 = "";
                $S_OtherQual1 = "";
                $S_OtherFrom1 = "";
                $S_OtherTo1 = ""; 
            }

        if (isset($_POST['S_OtherSch2']) & !empty($_POST['S_OtherSch2']) & !empty($_POST['S_OtherQual2']) & !empty($_POST['S_OtherFrom2']) & !empty($_POST['S_OtherTo2']) ) {
            
            $S_OtherSch2 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherSch2']);
            $S_OtherQual2 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherQual2']);
            $S_OtherFrom2 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherFrom2']);
            $S_OtherTo2 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherTo2']);

        } else {
                $S_OtherSch2 = "";
                $S_OtherQual2 = "";
                $S_OtherFrom2 = "";
                $S_OtherTo2 = ""; 
            }

        if (isset($_POST['S_OtherSch3']) & !empty($_POST['S_OtherSch3']) & !empty($_POST['S_OtherQual3']) & !empty($_POST['S_OtherFrom3']) & !empty($_POST['S_OtherTo3']) ) {
            
            $S_OtherSch3 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherSch3']);
            $S_OtherQual3 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherQual3']);
            $S_OtherFrom3 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherFrom3']);
            $S_OtherTo3 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherTo3']);

        } else {
                $S_OtherSch3 = "";
                $S_OtherQual3 = "";
                $S_OtherFrom3 = "";
                $S_OtherTo3 = ""; 
            }

        if (isset($_POST['S_OtherSch4']) & !empty($_POST['S_OtherSch4']) & !empty($_POST['S_OtherQual4']) & !empty($_POST['S_OtherFrom4']) & !empty($_POST['S_OtherTo4']) ) {
            
            $S_OtherSch4 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherSch4']);
            $S_OtherQual4 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherQual4']);
            $S_OtherFrom4 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherFrom4']);
            $S_OtherTo4 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherTo4']);

        } else {
                $S_OtherSch4 = "";
                $S_OtherQual4 = "";
                $S_OtherFrom4 = "";
                $S_OtherTo4 = ""; 
            }

        if (isset($_POST['S_OtherSch5']) & !empty($_POST['S_OtherSch5']) & !empty($_POST['S_OtherQual5']) & !empty($_POST['S_OtherFrom5']) & !empty($_POST['S_OtherTo5']) ) {
            
            $S_OtherSch5 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherSch5']);
            $S_OtherQual5 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherQual5']);
            $S_OtherFrom5 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherFrom5']);
            $S_OtherTo5 = mysqli_real_escape_string($vfms_con, $_POST['S_OtherTo5']);

        } else {
                $S_OtherSch5 = "";
                $S_OtherQual5 = "";
                $S_OtherFrom5 = "";
                $S_OtherTo5 = ""; 
            }
            // Update mysql database
        $checkquer = $vfms_con->query("SELECT `Staff_ID` 
	     FROM `vsn_staff_schools` WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");
			$rows = $checkquer->fetch_array(MYSQLI_NUM);
		if (empty($rows[0])) {
			$schquer = $vfms_con->query("INSERT INTO `vsn_staff_schools`(`Staff_ID`,`C_Prm`, 
			`C_PrmQual`, `C_PrmFrom`, `C_PrmTo`, `C_Sec`, `C_SecQual`, `C_SecFrom`, 
			`C_SecTo`, `C_Ter`, `C_TerQual`, `C_TerFrom`, `C_TerTo`, `C_ScOne`, 
			`C_ScOneQual`, `C_ScOneFrom`, `C_ScOneTo`, `C_ScTwo`, `C_ScTwoQual`, 
			`C_ScTwoFrom`, `C_ScTwoTo`, `C_ScThree`, `C_ScThreeQual`, `C_ScThreeFrom`, 
			`C_ScThreeTo`, `C_ScFour`, `C_ScFourQual`, `C_ScFourFrom`, `C_ScFourTo`, 
			`C_ScFive`, `C_ScFiveQual`, `C_ScFiveFrom`, `C_ScFiveTo`, `Station_ID`) 
			VALUES ('$subuserid', '$S_Primary', '$S_PrimaryQual', '$S_Prfrom','$S_Prto', 
			'$S_Secondary', '$S_SecondaryQual', '$S_Secfrom', '$S_Secto', '$S_Tertiary', 
			'$S_TertiaryQual', '$S_Terfrom', '$S_Terto', '$S_OtherSch1', '$S_OtherQual1', 
			'$S_OtherFrom1', '$S_OtherTo1', '$S_OtherSch2', '$S_OtherQual2', '$S_OtherFrom2', 
			'$S_OtherTo2', '$S_OtherSch3', '$S_OtherQual3', '$S_OtherFrom3', '$S_OtherTo3', 
			'$S_OtherSch4', '$S_OtherQual4', '$S_OtherFrom4', '$S_OtherTo4', '$S_OtherSch5', 
            '$S_OtherQual5', '$S_OtherFrom5', '$S_OtherTo5', '$stID') ");  
        } else { 
        $schquer = $vfms_con->query("UPDATE `vsn_staff_schools` SET
            `C_Prm` = '$S_Primary', `C_PrmQual` = '$S_PrimaryQual', 
            `C_PrmFrom` = '$S_Prfrom', `C_PrmTo` = '$S_Prto', `C_Sec` = '$S_Secondary', 
            `C_SecQual` = '$S_SecondaryQual', `C_SecFrom` = '$S_Secfrom',
            `C_SecTo` = '$S_Secto', `C_Ter` = '$S_Tertiary', `C_TerQual` = '$S_TertiaryQual',
            `C_TerFrom` = '$S_Terfrom', `C_TerTo` = '$S_Terto', `C_ScOne` = '$S_OtherSch1', 
            `C_ScOneQual` = '$S_OtherQual1', `C_ScOneFrom`= '$S_OtherFrom1', 
            `C_ScOneTo` = '$S_OtherTo1', `C_ScTwo` = '$S_OtherSch2',  
            `C_ScTwoQual`= '$S_OtherQual2', `C_ScTwoFrom` = '$S_OtherFrom2', 
            `C_ScTwoTo` = '$S_OtherTo2', `C_ScThree` = '$S_OtherSch3', 
            `C_ScThreeQual` = '$S_OtherQual3', `C_ScThreeFrom` = '$S_OtherFrom3',  
            `C_ScThreeTo` =  '$S_OtherTo3', `C_ScFour` = '$S_OtherSch4', 
            `C_ScFourQual` = '$S_OtherQual4', `C_ScFourFrom` = '$S_OtherFrom4', 
            `C_ScFourTo` = '$S_OtherTo4', `C_ScFive` = '$S_OtherSch5',
            `C_ScFiveQual` = '$S_OtherQual5', `C_ScFiveFrom` = '$S_OtherFrom5', 
            `C_ScFiveTo` = '$S_OtherTo5' WHERE `Staff_ID` = '$subuserid' AND `Station_ID` = '$stID'");
        }
        if ($schquer) {
            echo "Successfully Updated";
        } 
        else {
            echo "Error! Failed To Update Details";
        }
    }
}
// kills 

if (isset($_POST['skill_1'])) {
// Skills
    if (!empty($_POST['skill_1']) & !empty($_POST['skillDes_1']) ) {
        
        $Sskill_1 = mysqli_real_escape_string($vfms_con, $_POST['skill_1']);
        $SskillDes_1 = mysqli_real_escape_string($vfms_con, $_POST['skillDes_1']);
        
    } else {
            $Sskill_1 = "";
            $SskillDes_1 = "";
        }

    if (!empty($_POST['skill_2']) & !empty($_POST['skillDes_2']) ) {
        
        $Sskill_2 = mysqli_real_escape_string($vfms_con, $_POST['skill_2']);
        $SskillDes_2 = mysqli_real_escape_string($vfms_con, $_POST['skillDes_2']);
        
    } else {
            $Sskill_2 = "";
            $SskillDes_2 = "";
        }

    if (!empty($_POST['skill_3']) & !empty($_POST['skillDes_3']) ) {
        
        $Sskill_3 = mysqli_real_escape_string($vfms_con, $_POST['skill_3']);
        $SskillDes_3 = mysqli_real_escape_string($vfms_con, $_POST['skillDes_3']);
        
    } else {
            $Sskill_3 = "";
            $SskillDes_3 = "";
        }

    if (!empty($_POST['skill_4']) & !empty($_POST['skillDes_4']) ) {
        
        $Sskill_4 = mysqli_real_escape_string($vfms_con, $_POST['skill_4']);
        $SskillDes_4 = mysqli_real_escape_string($vfms_con, $_POST['skillDes_4']);
        
    } else {
            $Sskill_4 = "";
            $SskillDes_4 = "";
        }

    if (!empty($_POST['skill_5']) & !empty($_POST['skillDes_5']) ) {
        
        $Sskill_5 = mysqli_real_escape_string($vfms_con, $_POST['skill_5']);
        $SskillDes_5 = mysqli_real_escape_string($vfms_con, $_POST['skillDes_5']);
        
    } else {
            $Sskill_5 = "";
            $SskillDes_5 = "";
        }
// Working Experience
    if (!empty($_POST['job_1']) & !empty($_POST['jobcom_1']) & !empty($_POST['jobdatefrom_1']) & !empty($_POST['jobdateto_1'])) {
        
        $Sjob_1 = mysqli_real_escape_string($vfms_con, $_POST['job_1']);
        $Sjobcom_1 = mysqli_real_escape_string($vfms_con, $_POST['jobcom_1']);
        $Sjobdatefrom_1 = mysqli_real_escape_string($vfms_con, $_POST['jobdatefrom_1']);
        $Sjobdateto_1 = mysqli_real_escape_string($vfms_con, $_POST['jobdateto_1']);
        
    } else {
            $Sjob_1 = "";
            $Sjobcom_1 = "";
            $Sjobdatefrom_1 = "";
            $Sjobdateto_1  = "";
        }

    if (!empty($_POST['job_2']) & !empty($_POST['jobcom_2']) & !empty($_POST['jobdatefrom_2']) & !empty($_POST['jobdateto_2'])) {
        
        $Sjob_2 = mysqli_real_escape_string($vfms_con, $_POST['job_2']);
        $Sjobcom_2 = mysqli_real_escape_string($vfms_con, $_POST['jobcom_2']);
        $Sjobdatefrom_2 = mysqli_real_escape_string($vfms_con, $_POST['jobdatefrom_2']);
        $Sjobdateto_2 = mysqli_real_escape_string($vfms_con, $_POST['jobdateto_2']);
        
    } else {
            $Sjob_2 = "";
            $Sjobcom_2 = "";
            $Sjobdatefrom_2 = "";
            $Sjobdateto_2  = "";
        }

    if (!empty($_POST['job_3']) & !empty($_POST['jobcom_3']) & !empty($_POST['jobdatefrom_3']) & !empty($_POST['jobdateto_3'])) {
        
        $Sjob_3 = mysqli_real_escape_string($vfms_con, $_POST['job_3']);
        $Sjobcom_3 = mysqli_real_escape_string($vfms_con, $_POST['jobcom_3']);
        $Sjobdatefrom_3 = mysqli_real_escape_string($vfms_con, $_POST['jobdatefrom_3']);
        $Sjobdateto_3 = mysqli_real_escape_string($vfms_con, $_POST['jobdateto_3']);
        
    } else {
            $Sjob_3 = "";
            $Sjobcom_3 = "";
            $Sjobdatefrom_3 = "";
            $Sjobdateto_3 = "";
        }

    if (!empty($_POST['job_4']) & !empty($_POST['jobcom_4']) & !empty($_POST['jobdatefrom_4']) & !empty($_POST['jobdateto_4'])) {
        
        $Sjob_4 = mysqli_real_escape_string($vfms_con, $_POST['job_4']);
        $Sjobcom_4 = mysqli_real_escape_string($vfms_con, $_POST['jobcom_4']);
        $Sjobdatefrom_4 = mysqli_real_escape_string($vfms_con, $_POST['jobdatefrom_4']);
        $Sjobdateto_4 = mysqli_real_escape_string($vfms_con, $_POST['jobdateto_4']);
        
    } else {
            $Sjob_4 = "";
            $Sjobcom_4 = "";
            $Sjobdatefrom_4 = "";
            $Sjobdateto_4  = "";
        }

    if (!empty($_POST['job_5']) & !empty($_POST['jobcom_5']) & !empty($_POST['jobdatefrom_5']) & !empty($_POST['jobdateto_5'])) {
        
        $Sjob_5 = mysqli_real_escape_string($vfms_con, $_POST['job_5']);
        $Sjobcom_5 = mysqli_real_escape_string($vfms_con, $_POST['jobcom_5']);
        $Sjobdatefrom_5 = mysqli_real_escape_string($vfms_con, $_POST['jobdatefrom_5']);
        $Sjobdateto_5 = mysqli_real_escape_string($vfms_con, $_POST['jobdateto_5']);
        
    } else {
            $Sjob_5 = "";
            $Sjobcom_5 = "";
            $Sjobdatefrom_5 = "";
            $Sjobdateto_5  = "";
        }
    $checkquer = $vfms_con->query("SELECT `Staff_ID`
		FROM `vsn_staff_expr` WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");
			$rows = $checkquer->fetch_array(MYSQLI_NUM);
			if (empty($rows[0])) {
			$expquer = $vfms_con->query("INSERT INTO `vsn_staff_expr`(`Staff_ID`, `Skill_1`, `SkillDesc_1`, 
			`Skill_2`, `SkillDesc_2`, `Skill_3`, `SkillDesc_3`, `Skill_4`, `SkillDesc_4`, `Skill_5`, 
			`SkillDesc_5`, `Job_1`, `JobCom_1`, `JobFrom_1`, `JobTo_1`, `Job_2`, `JobCom_2`, `JobFrom_2`, 
			`JobTo_2`, `Job_3`, `JobCom_3`, `JobFrom_3`, `JobTo_3`, `Job_4`, `JobCom_4`, `JobFrom_4`, `JobTo_4`, 
			`Job_5`, `JobCom_5`, `JobFrom_5`, `JobTo_5`, `Station_ID`) VALUES ('$subuserid', '$Sskill_1', '$SskillDes_1', 
			'$Sskill_2', '$SskillDes_2', '$Sskill_3', '$SskillDes_3', '$Sskill_4', '$SskillDes_4', '$Sskill_5', 
			'$SskillDes_5', '$Sjob_1', '$Sjobcom_1', '$Sjobdatefrom_1', '$Sjobdateto_1', '$Sjob_2', '$Sjobcom_2', 
			'$Sjobdatefrom_2', '$Sjobdateto_2', '$Sjob_3', '$Sjobcom_3', '$Sjobdatefrom_3', '$Sjobdateto_3', '$Sjob_4', 
			'$Sjobcom_4', '$Sjobdatefrom_4', '$Sjobdateto_4', '$Sjob_5', '$Sjobcom_5', '$Sjobdatefrom_5', 
            '$Sjobdateto_5', '$stID') ");
            } else {
    $expquer = $vfms_con->query("UPDATE `vsn_staff_expr` SET  
        `Skill_1` = '$Sskill_1', `SkillDesc_1` = '$SskillDes_1', `Skill_2` = '$Sskill_2', 
        `SkillDesc_2` = '$SskillDes_2', `Skill_3` = '$Sskill_3', `SkillDesc_3` = '$SskillDes_3',
        `Skill_4` = '$Sskill_4', `SkillDesc_4` = '$SskillDes_4', `Skill_5` = '$Sskill_5',
        `SkillDesc_5` = '$SskillDes_5', `Job_1` = '$Sjob_1', `JobCom_1` = '$Sjobcom_1', 
        `JobFrom_1` = '$Sjobdatefrom_1', `JobTo_1` = '$Sjobdateto_1', `Job_2` = '$Sjob_2',
        `JobCom_2` = '$Sjobcom_2', `JobFrom_2` = '$Sjobdatefrom_2', `JobTo_2` = '$Sjobdateto_2',
        `Job_3` = '$Sjob_3', `JobCom_3` = '$Sjobcom_3', `JobFrom_3` = '$Sjobdatefrom_3',
        `JobTo_3` = '$Sjobdateto_3', `Job_4` = '$Sjob_4', `JobCom_4` = '$Sjobcom_4',
        `JobFrom_4` = '$Sjobdatefrom_4', `JobTo_4` = '$Sjobdateto_4', `Job_5` = '$Sjob_5',
        `JobCom_5` = '$Sjobcom_5', `JobFrom_5` = '$Sjobdatefrom_5', `JobTo_5` = '$Sjobdateto_5'  
        WHERE `Staff_ID` = '$subuserid' AND `Station_ID` = '$stID'");
            }
    if ($expquer) {
            echo "Successfully Updated";
        } 
        else {
            echo "Error! Failed To Save Details";
        }

    }
    
if (isset($_POST['S_Nexofkin'])) {
    if (empty($_POST['S_Nexofkin']) | empty($_POST['S_Nexofkinrel']) | empty($_POST['S_Nexofkinnum'])) {
    echo "Error! Empty Form";
    } else {
        $S_Nexofkin = mysqli_real_escape_string($vfms_con, $_POST['S_Nexofkin']);
        $S_Nexofkinrel = mysqli_real_escape_string($vfms_con, $_POST['S_Nexofkinrel']);
        $S_Nexofkinnum = mysqli_real_escape_string($vfms_con, $_POST['S_Nexofkinnum']);
        $S_Nexofkinadd = mysqli_real_escape_string($vfms_con, $_POST['S_Nexofkinadd']);
        $S_Refreeone = mysqli_real_escape_string($vfms_con, $_POST['S_Refreeone']);
        $S_Refonetit = mysqli_real_escape_string($vfms_con, $_POST['S_Refonetit']);
        $S_Refonenum = mysqli_real_escape_string($vfms_con, $_POST['S_Refonenum']);
        $S_Refoneadd = mysqli_real_escape_string($vfms_con, $_POST['S_Refoneadd']);
        $S_Refreetwo = mysqli_real_escape_string($vfms_con, $_POST['S_Refreetwo']);
        $S_Reftwotit = mysqli_real_escape_string($vfms_con, $_POST['S_Reftwotit']);
        $S_Reftwonum = mysqli_real_escape_string($vfms_con, $_POST['S_Reftwonum']);
        $S_Reftwoadd = mysqli_real_escape_string($vfms_con, $_POST['S_Reftwoadd']);
        $S_Refreethree = mysqli_real_escape_string($vfms_con, $_POST['S_Refreethree']);
        $S_Refthreetit = mysqli_real_escape_string($vfms_con, $_POST['S_Refthreetit']);
        $S_Refthreenum = mysqli_real_escape_string($vfms_con, $_POST['S_Refthreenum']);
        $S_Refthreeadd = mysqli_real_escape_string($vfms_con, $_POST['S_Refthreeadd']);

        $checkquer = $vfms_con->query("SELECT `Staff_ID` 
			FROM `vsn_staff_next` WHERE Staff_ID = '$subuserid' AND Station_ID = '$stID' ");
			$rows = $checkquer->fetch_array(MYSQLI_NUM);
			if (empty($rows[0])) {
			$nexquer = $vfms_con->query("INSERT INTO `vsn_staff_next`(`Staff_ID`, `C_Next_of_kin`, 
			`C_Relation`, `C_Number`, `C_Address`, `C_Refreeone`, `C_Refreeone_Tit`, `C_Refreeone_Num`, 
			`C_Refreeone_Add`, `C_Refreetwo`, `C_Refreetwo_Tit`, `C_Refreetwo_Num`, `C_Refreetwo_Add`, 
			`C_Refreethree`, `C_Refreethree_Tit`, `C_Refreethree_Num`, `C_Refreethree_Add`, `Station_ID`) 
			VALUES ('$subuserid', '$S_Nexofkin', '$S_Nexofkinrel', '$S_Nexofkinnum', '$S_Nexofkinadd', 
			'$S_Refreeone', '$S_Refonetit', '$S_Refonenum', '$S_Refoneadd', '$S_Refreetwo', '$S_Reftwotit', 
			'$S_Reftwonum', '$S_Reftwoadd', '$S_Refreethree', '$S_Refthreetit', '$S_Refthreenum', 
            '$S_Refthreeadd', '$stID') ");
            } else {
        $nexquer = $vfms_con->query("UPDATE `vsn_staff_next` SET 
		    `C_Next_of_kin`= '$S_Nexofkin', `C_Relation` = '$S_Nexofkinrel', `C_Number` = '$S_Nexofkinnum',
		    `C_Address` = '$S_Nexofkinadd', `C_Refreeone` = '$S_Refreeone', `C_Refreeone_Tit` = '$S_Refonetit',
		    `C_Refreeone_Num` = '$S_Refonenum', `C_Refreeone_Add` = '$S_Refoneadd', 
		    `C_Refreetwo` = '$S_Refreetwo', `C_Refreetwo_Tit` = '$S_Reftwotit', 
		    `C_Refreetwo_Num` = '$S_Reftwonum', `C_Refreetwo_Add` = '$S_Reftwoadd',
		    `C_Refreethree` = '$S_Refreethree', `C_Refreethree_Tit` = '$S_Refthreetit', 
		    `C_Refreethree_Num` = '$S_Refthreenum', `C_Refreethree_Add` = '$S_Refthreeadd' 
		    WHERE `Staff_ID` = '$subuserid' AND `Station_ID` = '$stID' ");
            }
        if ($nexquer) {
            echo "Successfully Updated";
        } 
        else {
            echo "Error! Failed To Save Details";
        }	
    }	
}
