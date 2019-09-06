<?php
session_start();
// require "con_Vfm.php";'
require 'config/database.php';
if (isset($_SESSION['vuserp'])) {
	$stID = $_SESSION['Station_ID_No'];
	$db = new Database();
}
elseif (isset($_SESSION['vsubuserp'])) {
	$subuserid = $_SESSION['Sub_UserID'];
	$ssnm = $_SESSION['vsubuserp'];
	$location = $_SESSION['location'];
	$stID = $_SESSION['Station_ID_No']; 
	$db = new Database();
}
// Staff Bio Data
if (isset($_POST['S_Name'])) {
	if (empty($_POST['S_Name']) | empty($_POST['S_Number']) | empty($_POST['S_Email']) | empty($_POST['S_Gender']) ) {
		echo "Error! Empty Form";
	}
		else {
			$SName = $db->validate($_POST['S_Name']);
			$SNumber = $db->validate($_POST['S_Number']);
			$SEmail = $db->validate($_POST['S_Email']);
			$SDateofbirth = $db->validate($_POST['S_Dateofbirth']);
			$SGender = $db->validate($_POST['S_Gender']);
			$SMaritalstatus = $db->validate($_POST['S_Maritalstatus']);
			$SNationality = $db->validate($_POST['S_Natiolity']);
			$SState = $db->validate($_POST['S_State']);
			$SLga = $db->validate($_POST['S_Lga']);
			$SAddress = $db->validate($_POST['S_Address']);
			$SQualification = $db->validate($_POST['S_Qualification']);
			$STitle = $db->validate($_POST['S_Title']);
			$SLevel = $db->validate($_POST['S_Level']);
			$SBank = $db->validate($_POST['S_Bank']);
			$SAccName = $db->validate($_POST['S_AccName']);
			$SAccNumber = $db->validate($_POST['S_AccNumber']);

			$stfquer = $db->insertRow('INSERT INTO `vsn_staff` (`Staff_ID`, `C_Name`, `C_Number`,
			 	`C_Email`, `C_Dateofbirth`, `C_Gender`, `C_Maritalstatus`, `C_State`, `C_Lga`, 
				`C_Address`, `C_Qualification`, `C_Title`, `C_Level`, `Station_ID`, `C_Bank`, 
				`C_AccNumber`, `C_AccName`, `C_Nationality`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
				[$subuserid, $SName, $SNumber, $SEmail, $SDateofbirth, $SGender, $SMaritalstatus, 
				$SState, $SLga, $SAddress, $SQualification, $STitle, $SLevel, $stID, $SBank, 
				$SAccNumber, $SAccName, $SNationality]);

			if ($stfquer) {
				$resmsg = array("returnedid" => $subuserid, "returnedmsgs" => "Successfully Saved");
				echo json_encode($resmsg);
			} 
			else {
				echo "Error! Failed To Save Details";
			}
		}
	}

//	Schools Attended with dates

	elseif (isset($_POST['S_Primary'])) {
		if (empty($_POST['S_Primary']) | empty($_POST['S_Prfrom']) | empty($_POST['S_Prto'])) {
			echo "Error! Empty Form";
		} else {
			$S_Primary = $db->validate($_POST['S_Primary']);
			$S_PrimaryQual = $db->validate($_POST['S_PrimaryQual']);
			$S_Prfrom = $db->validate($_POST['S_Prfrom']);
			$S_Prto = $db->validate($_POST['S_Prto']);

			$S_Secondary = $db->validate($_POST['S_Secondary']);
			$S_SecondaryQual = $db->validate($_POST['S_SecondaryQual']);
			$S_Secfrom = $db->validate($_POST['S_Secfrom']);
			$S_Secto = $db->validate($_POST['S_Secto']);

			$S_Tertiary = $db->validate($_POST['S_Tertiary']);
			$S_TertiaryQual = $db->validate($_POST['S_TertiaryQual']);
			$S_Terfrom = $db->validate($_POST['S_Terfrom']);
			$S_Terto = $db->validate($_POST['S_Terto']);
			
			

			if (isset($_POST['S_OtherSch1']) & !empty($_POST['S_OtherSch1']) & !empty($_POST['S_OtherQual1']) & !empty($_POST['S_OtherFrom1']) & !empty($_POST['S_OtherTo1']) ) {
				
				$S_OtherSch1 = $db->validate($_POST['S_OtherSch1']);
				$S_OtherQual1 = $db->validate($_POST['S_OtherQual1']);
				$S_OtherFrom1 = $db->validate($_POST['S_OtherFrom1']);
				$S_OtherTo1 = $db->validate($_POST['S_OtherTo1']);

			} else {
					$S_OtherSch1 = "";
					$S_OtherQual1 = "";
					$S_OtherFrom1 = "";
					$S_OtherTo1 = ""; 
				}

			if (isset($_POST['S_OtherSch2']) & !empty($_POST['S_OtherSch2']) & !empty($_POST['S_OtherQual2']) & !empty($_POST['S_OtherFrom2']) & !empty($_POST['S_OtherTo2']) ) {
				
				$S_OtherSch2 = $db->validate($_POST['S_OtherSch2']);
				$S_OtherQual2 = $db->validate($_POST['S_OtherQual2']);
				$S_OtherFrom2 = $db->validate($_POST['S_OtherFrom2']);
				$S_OtherTo2 = $db->validate($_POST['S_OtherTo2']);

			} else {
					$S_OtherSch2 = "";
					$S_OtherQual2 = "";
					$S_OtherFrom2 = "";
					$S_OtherTo2 = ""; 
				}

			if (isset($_POST['S_OtherSch3']) & !empty($_POST['S_OtherSch3']) & !empty($_POST['S_OtherQual3']) & !empty($_POST['S_OtherFrom3']) & !empty($_POST['S_OtherTo3']) ) {
				
				$S_OtherSch3 = $db->validate($_POST['S_OtherSch3']);
				$S_OtherQual3 = $db->validate($_POST['S_OtherQual3']);
				$S_OtherFrom3 = $db->validate($_POST['S_OtherFrom3']);
				$S_OtherTo3 = $db->validate($_POST['S_OtherTo3']);

			} else {
					$S_OtherSch3 = "";
					$S_OtherQual3 = "";
					$S_OtherFrom3 = "";
					$S_OtherTo3 = ""; 
				}

			if (isset($_POST['S_OtherSch4']) & !empty($_POST['S_OtherSch4']) & !empty($_POST['S_OtherQual4']) & !empty($_POST['S_OtherFrom4']) & !empty($_POST['S_OtherTo4']) ) {
				
				$S_OtherSch4 = $db->validate($_POST['S_OtherSch4']);
				$S_OtherQual4 = $db->validate($_POST['S_OtherQual4']);
				$S_OtherFrom4 = $db->validate($_POST['S_OtherFrom4']);
				$S_OtherTo4 = $db->validate($_POST['S_OtherTo4']);

			} else {
					$S_OtherSch4 = "";
					$S_OtherQual4 = "";
					$S_OtherFrom4 = "";
					$S_OtherTo4 = ""; 
				}

			if (isset($_POST['S_OtherSch5']) & !empty($_POST['S_OtherSch5']) & !empty($_POST['S_OtherQual5']) & !empty($_POST['S_OtherFrom5']) & !empty($_POST['S_OtherTo5']) ) {
				
				$S_OtherSch5 = $db->validate($_POST['S_OtherSch5']);
				$S_OtherQual5 = $db->validate($_POST['S_OtherQual5']);
				$S_OtherFrom5 = $db->validate($_POST['S_OtherFrom5']);
				$S_OtherTo5 = $db->validate($_POST['S_OtherTo5']);

			} else {
					$S_OtherSch5 = "";
					$S_OtherQual5 = "";
					$S_OtherFrom5 = "";
					$S_OtherTo5 = ""; 
				}
			
			$schquer = $db->insertRow('INSERT INTO `vsn_staff_schools` (`Staff_ID`,`C_Prm`, 
			`C_PrmQual`, `C_PrmFrom`, `C_PrmTo`, `C_Sec`, `C_SecQual`, `C_SecFrom`, `C_SecTo`, 
			`C_Ter`, `C_TerQual`, `C_TerFrom`, `C_TerTo`, `C_ScOne`, `C_ScOneQual`, `C_ScOneFrom`, 
			`C_ScOneTo`, `C_ScTwo`, `C_ScTwoQual`, `C_ScTwoFrom`, `C_ScTwoTo`, `C_ScThree`, 
			`C_ScThreeQual`, `C_ScThreeFrom`, `C_ScThreeTo`, `C_ScFour`, `C_ScFourQual`, 
			`C_ScFourFrom`, `C_ScFourTo`, `C_ScFive`, `C_ScFiveQual`, `C_ScFiveFrom`, `C_ScFiveTo`,
			`Station_ID`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
			[$subuserid, $S_Primary, $S_PrimaryQual, $S_Prfrom, $S_Prto, $S_Secondary, $S_SecondaryQual, 
			$S_Secfrom, $S_Secto, $S_Tertiary, $S_TertiaryQual, $S_Terfrom, $S_Terto, $S_OtherSch1, 
			$S_OtherQual1, $S_OtherFrom1, $S_OtherTo1, $S_OtherSch2, $S_OtherQual2, $S_OtherFrom2, 
			$S_OtherTo2, $S_OtherSch3, $S_OtherQual3, $S_OtherFrom3, $S_OtherTo3, $S_OtherSch4, 
			$S_OtherQual4, $S_OtherFrom4, $S_OtherTo4, $S_OtherSch5, $S_OtherQual5, $S_OtherFrom5, 
			$S_OtherTo5, $stID]);

			if ($schquer) {
				echo "Successfully saved";
			} 
			else {
				
				echo "Error! Failed To Save Details";
			}
		}
	}

//Skills & Experience

	elseif (isset($_POST['skill_1'])) {
// Skills
		if (!empty($_POST['skill_1']) & !empty($_POST['skillDes_1']) ) {
			
			$Sskill_1 = $db->validate($_POST['skill_1']);
			$SskillDes_1 = $db->validate($_POST['skillDes_1']);
			
		} else {
				$Sskill_1 = "";
				$SskillDes_1 = "";
			}

		if (!empty($_POST['skill_2']) & !empty($_POST['skillDes_2']) ) {
			
			$Sskill_2 = $db->validate($_POST['skill_2']);
			$SskillDes_2 = $db->validate($_POST['skillDes_2']);
			
		} else {
				$Sskill_2 = "";
				$SskillDes_2 = "";
			}

		if (!empty($_POST['skill_3']) & !empty($_POST['skillDes_3']) ) {
			
			$Sskill_3 = $db->validate($_POST['skill_3']);
			$SskillDes_3 = $db->validate($_POST['skillDes_3']);
			
		} else {
				$Sskill_3 = "";
				$SskillDes_3 = "";
			}

		if (!empty($_POST['skill_4']) & !empty($_POST['skillDes_4']) ) {
			
			$Sskill_4 = $db->validate($_POST['skill_4']);
			$SskillDes_4 = $db->validate($_POST['skillDes_4']);
			
		} else {
				$Sskill_4 = "";
				$SskillDes_4 = "";
			}

		if (!empty($_POST['skill_5']) & !empty($_POST['skillDes_5']) ) {
			
			$Sskill_5 = $db->validate($_POST['skill_5']);
			$SskillDes_5 = $db->validate($_POST['skillDes_5']);
			
		} else {
				$Sskill_5 = "";
				$SskillDes_5 = "";
			}
// Working Experience
		if (!empty($_POST['job_1']) & !empty($_POST['jobcom_1']) & !empty($_POST['jobdatefrom_1']) & !empty($_POST['jobdateto_1'])) {
			
			$Sjob_1 = $db->validate($_POST['job_1']);
			$Sjobcom_1 = $db->validate($_POST['jobcom_1']);
			$Sjobdatefrom_1 = $db->validate($_POST['jobdatefrom_1']);
			$Sjobdateto_1 = $db->validate($_POST['jobdateto_1']);
			
		} else {
				$Sjob_1 = "";
				$Sjobcom_1 = "";
				$Sjobdatefrom_1 = "";
				$Sjobdateto_1  = "";
			}

		if (!empty($_POST['job_2']) & !empty($_POST['jobcom_2']) & !empty($_POST['jobdatefrom_2']) & !empty($_POST['jobdateto_2'])) {
			
			$Sjob_2 = $db->validate($_POST['job_2']);
			$Sjobcom_2 = $db->validate($_POST['jobcom_2']);
			$Sjobdatefrom_2 = $db->validate($_POST['jobdatefrom_2']);
			$Sjobdateto_2 = $db->validate($_POST['jobdateto_2']);
			
		} else {
				$Sjob_2 = "";
				$Sjobcom_2 = "";
				$Sjobdatefrom_2 = "";
				$Sjobdateto_2  = "";
			}

		if (!empty($_POST['job_3']) & !empty($_POST['jobcom_3']) & !empty($_POST['jobdatefrom_3']) & !empty($_POST['jobdateto_3'])) {
			
			$Sjob_3 = $db->validate($_POST['job_3']);
			$Sjobcom_3 = $db->validate($_POST['jobcom_3']);
			$Sjobdatefrom_3 = $db->validate($_POST['jobdatefrom_3']);
			$Sjobdateto_3 = $db->validate($_POST['jobdateto_3']);
			
		} else {
				$Sjob_3 = "";
				$Sjobcom_3 = "";
				$Sjobdatefrom_3 = "";
				$Sjobdateto_3 = "";
			}

		if (!empty($_POST['job_4']) & !empty($_POST['jobcom_4']) & !empty($_POST['jobdatefrom_4']) & !empty($_POST['jobdateto_4'])) {
			
			$Sjob_4 = $db->validate($_POST['job_4']);
			$Sjobcom_4 = $db->validate($_POST['jobcom_4']);
			$Sjobdatefrom_4 = $db->validate($_POST['jobdatefrom_4']);
			$Sjobdateto_4 = $db->validate($_POST['jobdateto_4']);
			
		} else {
				$Sjob_4 = "";
				$Sjobcom_4 = "";
				$Sjobdatefrom_4 = "";
				$Sjobdateto_4  = "";
			}

		if (!empty($_POST['job_5']) & !empty($_POST['jobcom_5']) & !empty($_POST['jobdatefrom_5']) & !empty($_POST['jobdateto_5'])) {
			
			$Sjob_5 = $db->validate($_POST['job_5']);
			$Sjobcom_5 = $db->validate($_POST['jobcom_5']);
			$Sjobdatefrom_5 = $db->validate($_POST['jobdatefrom_5']);
			$Sjobdateto_5 = $db->validate($_POST['jobdateto_5']);
			
		} else {
				$Sjob_5 = "";
				$Sjobcom_5 = "";
				$Sjobdatefrom_5 = "";
				$Sjobdateto_5  = "";
			}

		$expquer = $db->insertRow('INSERT INTO `vsn_staff_expr`
		(`Staff_ID`, `Skill_1`, `SkillDesc_1`, `Skill_2`, `SkillDesc_2`, `Skill_3`, `SkillDesc_3`, 
		`Skill_4`, `SkillDesc_4`, `Skill_5`, `SkillDesc_5`, `Job_1`, `JobCom_1`, `JobFrom_1`, 
		`JobTo_1`, `Job_2`, `JobCom_2`, `JobFrom_2`, `JobTo_2`, `Job_3`, `JobCom_3`, `JobFrom_3`, 
		`JobTo_3`, `Job_4`, `JobCom_4`, `JobFrom_4`, `JobTo_4`, `Job_5`, `JobCom_5`, `JobFrom_5`, 
		`JobTo_5`, `Station_ID`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
		,?,?,?)', 
		[$subuserid, $Sskill_1, $SskillDes_1, $Sskill_2, $SskillDes_2, $Sskill_3, 
		$SskillDes_3, $Sskill_4, $SskillDes_4, $Sskill_5, $SskillDes_5, $Sjob_1, 
		$Sjobcom_1, $Sjobdatefrom_1, $Sjobdateto_1, $Sjob_2, $Sjobcom_2, $Sjobdatefrom_2, 
		$Sjobdateto_2, $Sjob_3, $Sjobcom_3, $Sjobdatefrom_3, $Sjobdateto_3, $Sjob_4, 
		$Sjobcom_4, $Sjobdatefrom_4, $Sjobdateto_4, $Sjob_5, $Sjobcom_5, $Sjobdatefrom_5, 
		$Sjobdateto_5, $stID]);

		if ($expquer) {
				echo "Successfully saved";
			} 
			else {
				
				echo "Error! Failed To Save Details";
			}

	}

// Next of kin and Refrees
	elseif (isset($_POST['S_Nexofkin'])) {
		if (empty($_POST['S_Nexofkin']) | empty($_POST['S_Nexofkinrel']) | empty($_POST['S_Nexofkinnum'])) {
		echo "Error! Empty Form";
		} else {
			$S_Nexofkin = $db->validate($_POST['S_Nexofkin']);
			$S_Nexofkinrel = $db->validate($_POST['S_Nexofkinrel']);
			$S_Nexofkinnum = $db->validate($_POST['S_Nexofkinnum']);
			$S_Nexofkinadd = $db->validate($_POST['S_Nexofkinadd']);
			$S_Refreeone = $db->validate($_POST['S_Refreeone']);
			$S_Refonetit = $db->validate($_POST['S_Refonetit']);
			$S_Refonenum = $db->validate($_POST['S_Refonenum']);
			$S_Refoneadd = $db->validate($_POST['S_Refoneadd']);
			$S_Refreetwo = $db->validate($_POST['S_Refreetwo']);
			$S_Reftwotit = $db->validate($_POST['S_Reftwotit']);
			$S_Reftwonum = $db->validate($_POST['S_Reftwonum']);
			$S_Reftwoadd = $db->validate($_POST['S_Reftwoadd']);
			$S_Refreethree = $db->validate($_POST['S_Refreethree']);
			$S_Refthreetit = $db->validate($_POST['S_Refthreetit']);
			$S_Refthreenum = $db->validate($_POST['S_Refthreenum']);
			$S_Refthreeadd = $db->validate($_POST['S_Refthreeadd']);
			
			$nexquer = $db->insertRow('INSERT INTO `vsn_staff_next`(`Staff_ID`, `C_Next_of_kin`, 
			`C_Relation`, `C_Number`, `C_Address`, `C_Refreeone`, `C_Refreeone_Tit`, `C_Refreeone_Num`, 
			`C_Refreeone_Add`, `C_Refreetwo`, `C_Refreetwo_Tit`, `C_Refreetwo_Num`, `C_Refreetwo_Add`, 
			`C_Refreethree`, `C_Refreethree_Tit`, `C_Refreethree_Num`, `C_Refreethree_Add`, `Station_ID`)
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
			[$subuserid, $S_Nexofkin, $S_Nexofkinrel, $S_Nexofkinnum, $S_Nexofkinadd, $S_Refreeone, 
			$S_Refonetit, $S_Refonenum, $S_Refoneadd, $S_Refreetwo, $S_Reftwotit, $S_Reftwonum, 
			$S_Reftwoadd, $S_Refreethree, $S_Refthreetit, $S_Refthreenum, $S_Refthreeadd, $stID]);

			if ($nexquer) {
				echo "Successfully saved";
			} 
			else {
				echo "Error! Failed To Save Details";
			}	
			
		}	
	}

?>
