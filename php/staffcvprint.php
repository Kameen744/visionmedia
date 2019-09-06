<?php
session_start();
if (isset($_SESSION['vuserp'])) {
		$stID = $_SESSION['Station_ID_No']; 
	} 
elseif (isset($_SESSION['vadminp'])) {
		$stID = $_POST['scstID'];
	}

if (isset($_POST['StfID'])) {
	$StfID = $_POST['StfID'];
	require "con_Vfm.php";
	
	if ($StfID == "") {
		echo "Date Not Set";
	}else{
		$table = "
				<!DOCTYPE html>
				<html>
				<head>
				<title>$stID - $StfID</title>
				<meta charset='UTF-8'> 
				<meta name='viewport' content='width=device-width'/>
				<link type='text/css' rel='stylesheet' href='../css/cvstyle.css'>
				</head>
				<body id='top'>
			";

		$monqur = $vfms_con->query("SELECT `Staff_ID`, `C_Name`, `C_Number`, `C_Email`, `C_State`, `C_Lga`, `C_Address`, `C_Dateofbirth`, `C_Maritalstatus`, `C_Gender`, `C_Qualification`, `C_Nationality` FROM `vsn_staff` WHERE Station_ID = '$stID' AND Staff_ID = '$StfID' ");
		$prow = $monqur->fetch_array(MYSQLI_NUM);

		if (!empty($prow[0])) {
		$staffID = $prow[0]; $staffName = $prow[1]; $staffNumber = $prow[2];
		$staffEmail = $prow[3]; $staffState = $prow[4]; $stafflga = $prow[5];
		$staffaddress = $prow[6]; $staffdateobirth = $prow[7]; $staffmaritalstatus = $prow[8];
		$staffGender = $prow[9]; $staffqualification = $prow[10]; $staffnationality = $prow[11];

		$scquer = $vfms_con->query("SELECT `C_Prm`, `C_PrmQual`, `C_PrmFrom`, `C_PrmTo`, `C_Sec`, `C_SecQual`, `C_SecFrom`, `C_SecTo`, `C_Ter`, `C_TerQual`, `C_TerFrom`, `C_TerTo`, `C_ScOne`, `C_ScOneQual`, `C_ScOneFrom`, `C_ScOneTo`, `C_ScTwo`, `C_ScTwoQual`, `C_ScTwoFrom`, `C_ScTwoTo`, `C_ScThree`, `C_ScThreeQual`, `C_ScThreeFrom`, `C_ScThreeTo`, `C_ScFour`, `C_ScFourQual`, `C_ScFourFrom`, `C_ScFourTo`, `C_ScFive`, `C_ScFiveQual`, `C_ScFiveFrom`, `C_ScFiveTo` FROM `vsn_staff_schools` WHERE Staff_ID = '$StfID' AND Station_ID = '$stID' ");

		$scrow = $scquer->fetch_array(MYSQLI_NUM);

		$sprm = $scrow[0]; $sprmql = $scrow[1]; $sprmfrm = $scrow[2]; $sprmto = $scrow[3];
		$ssec = $scrow[4]; $ssecql = $scrow[5]; $ssecfrm = $scrow[6]; $ssecto = $scrow[7];
		$ster = $scrow[8]; $sterql = $scrow[9]; $sterfrm = $scrow[10]; $sterto = $scrow[11];

		$exquer = $vfms_con->query("SELECT `Skill_1`, `SkillDesc_1`, `Skill_2`, `SkillDesc_2`, `Skill_3`, `SkillDesc_3`, `Skill_4`, `SkillDesc_4`, `Skill_5`, `SkillDesc_5`, `Job_1`, `JobCom_1`, `JobFrom_1`, `JobTo_1`, `Job_2`, `JobCom_2`, `JobFrom_2`, `JobTo_2`, `Job_3`, `JobCom_3`, `JobFrom_3`, `JobTo_3`, `Job_4`, `JobCom_4`, `JobFrom_4`, `JobTo_4`, `Job_5`, `JobCom_5`, `JobFrom_5`, `JobTo_5` FROM `vsn_staff_expr` WHERE Staff_ID = '$StfID' AND Station_ID = '$stID' ");
		$exrow = $exquer->fetch_array(MYSQLI_NUM);

		$refquer = $vfms_con->query("SELECT `C_Refreeone`, `C_Refreeone_Tit`, `C_Refreeone_Num`, `C_Refreeone_Add`, `C_Refreetwo`, `C_Refreetwo_Tit`, `C_Refreetwo_Num`, `C_Refreetwo_Add`, `C_Refreethree`, `C_Refreethree_Tit`, `C_Refreethree_Num`, `C_Refreethree_Add` FROM `vsn_staff_next` WHERE Staff_ID = '$StfID' AND Station_ID = '$stID' ");
		$rfrow = $refquer->fetch_array(MYSQLI_NUM);

		$table .= "
		<div id='cv' class='instaFade'>
			<div class='mainDetails'>
				<div id='headshot' class='quickFade'>
					<img src='../images/staff/headshot.jpg' alt='$staffName' />
				</div>
				
				<div id='name'>
					<h1 class='quickFade delayTwo'>CURRICULUM VITAE</h1>
					<h2 class='quickFade delayThree'>$staffName</h2>
				</div>
				
				<div id='contactDetails' class='quickFade delayFour'>
					<ul>
						<li>E-mail: <a href='mailto:joe@bloggs.com' target='_blank'>$staffEmail</a></li>
						<li>Address: <a href='#'>$staffaddress</a></li>
						<li>Phone No.: $staffNumber</li>
					</ul>
				</div>
				<div class='clear'></div>
			</div>

	<div id='mainArea' class='quickFade delayFive'>
		<section>
			<article>
				<div class='sectionTitle' style='width:650px;'>
					<h1>Personal Profile</h1>
					<div style='width:200px; float:left;'>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>Date of Birth: </b>
						</div>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>Nationality: </b>
						</div>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>State of Origin: </b>
						</div>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>Local Government: </b>
						</div>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>Marital Status: </b>
						</div>
						<div>
							<b style='font-weight: bold; font-size: 16px;'>Gender: </b>
						</div>
					</div>
					<div style='width:400;'>
						<div>
							<i style=''>$staffdateobirth</i> 
						</div>
						<div>
							<i style=''>$staffnationality</i>
						</div>
						<div>
							<i style=''>$staffState</i>
						</div>
						<div>
							<i style=''>$stafflga</i>
						</div>
						<div>
							<i style=''>$staffmaritalstatus</i>
						</div>
						<div>
							<i style=''>$staffGender</i>
						</div>
					</div>
				</div>
			</article>
			<div class='clear'></div>
		</section>

		<section >
			<article>
				<div class='sectionTitle' style='width:inherit;'>
					<h1>Eduction</h1>
						<div>
							<h3 style='width:450px; float:left; font-weight:bold;'>$sprm</h3>
							<h3 style='width:200px; float:right; font-weight:bold;'>$sprmfrm - $sprmto</h3>
							<h3 style=''>$sprmql</h3>
						<div>
						<section></section>
						<div>
							<h3 style='width:450px; float:left; font-weight:bold;'>$ssec</h3>
							<h3 style='width:200px; float:right; font-weight:bold;'>$ssecfrm - $ssecto</h3>
							<h3 style=''>$ssecql</h3>
						<div>
						<section></section>
						<div>
							<h3 style='width:450px; float:left; font-weight:bold;'>$ster</h3>
							<h3 style='width:200px; float:right; font-weight:bold;'>$sterfrm - $sterto</h3>
							<h3 style=''>$sterql</h3>
						<div>
		";	

// sch 1
		if (!empty($scrow[12]) & !empty($scrow[13]) & !empty($scrow[14]) & !empty($scrow[15])) {

		$sne = $scrow[12]; $sneql = $scrow[13]; $snefrm = $scrow[14]; $sneto = $scrow[15];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$sne</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$snefrm - $sneto</h3>
				<h3 style=''>$sneql</h3>
			<div>
		";
		} else {
		$sne = ""; $sneql = ""; $snefrm = ""; $sneto = "";	
		}
//sch 2
		if (!empty($scrow[16]) & !empty($scrow[17]) & !empty($scrow[18]) & !empty($scrow[19])) {
		$stw = $scrow[16]; $stwql = $scrow[17]; $stwfrm = $scrow[18]; $stwto = $scrow[19];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$stw</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$stwfrm - $stwto</h3>
				<h3 style=''>$stwql</h3>
			<div>
		";
		} else {
		$stw = ""; $stwql = ""; $stwfrm = ""; $stwto = "";	
		}
//sch 3
		if (!empty($scrow[20]) & !empty($scrow[21]) & !empty($scrow[22]) & !empty($scrow[23])) {
		$str = $scrow[20]; $strql = $scrow[21]; $strfrm = $scrow[22]; $strto = $scrow[23];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$str</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$strfrm - $strto</h3>
				<h3 style=''>$strql</h3>
			<div>
		";
		} else {
		$str = ""; $strql = ""; $strfrm = ""; $strto = "";	
		}
//sch 4
		if (!empty($scrow[24]) & !empty($scrow[25]) & !empty($scrow[26]) & !empty($scrow[27])) {
		$sfr = $scrow[24]; $sfrql = $scrow[25]; $sfrfrm = $scrow[26]; $sfrto = $scrow[27];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$sfr</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$sfrfrm - $sfrto</h3>
				<h3 style=''>$sfrql</h3>
			<div>
		";
		} else {
		$sfr = ""; $sfrql = ""; $sfrfrm = ""; $sfrto = "";
		}
//sch 5
		if (!empty($scrow[28]) & !empty($scrow[29]) & !empty($scrow[30]) & !empty($scrow[31])) {
		$sfv = $scrow[28]; $sfvql = $scrow[29]; $sfvfrm = $scrow[30]; $sfvto = $scrow[31];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$sfv</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$sfvfrm - $sfvto</h3>
				<h3 style=''>$sfvql</h3>
			<div>
		";
		} else {
		$sfv = ""; $sfvql = ""; $sfvfrm = ""; $sfvto = "";
		}
//sch 6
		if (!empty($scrow[32]) & !empty($scrow[33]) & !empty($scrow[34]) & !empty($scrow[35])) {
		$ssx = $scrow[32]; $ssxql = $scrow[33]; $ssxfrm = $scrow[34]; $ssxto = $scrow[35];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$ssx</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$ssxfrm - $ssxto</h3>
				<h3 style=''>$ssxql</h3>
			<div>
		";
		} else {
		$ssx = ""; $ssxql = ""; $ssxfrm = ""; $ssxto = "";
		}

		$table .= "
				</div>
			</article>
			<div class='clear'></div>
		</section>
		";
// education end -----------
// Start Working Experience
		$table .= "
		<section >
			<article>
				<div class='sectionTitle' style='width:inherit;'>
					<h1>Working Experience</h1> ";

		if (!empty($exrow[10]) & !empty($exrow[11]) & !empty($exrow[12]) & !empty($exrow[13])) {
		$job_1 = $exrow[10]; $jobCom_1 = $exrow[11]; $joFrm_1 = $exrow[12]; $jobto_1 = $exrow[13];
		$table .= "
		
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$jobCom_1</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$joFrm_1 - $jobto_1</h3>
				<h3 style=''>$job_1</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[14]) & !empty($exrow[15]) & !empty($exrow[16]) & !empty($exrow[17])) {
		$job_2 = $exrow[14]; $jobCom_2 = $exrow[15]; $joFrm_2 = $exrow[16]; $jobto_2 = $exrow[17];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$jobCom_2</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$joFrm_2 - $jobto_2</h3>
				<h3 style=''>$job_2</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[18]) & !empty($exrow[19]) & !empty($exrow[20]) & !empty($exrow[21])) {
		$job_3 = $exrow[18]; $jobCom_3 = $exrow[19]; $joFrm_3 = $exrow[20]; $jobto_3 = $exrow[21];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$jobCom_3</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$joFrm_3 - $jobto_3</h3>
				<h3 style=''>$job_3</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[22]) & !empty($exrow[23]) & !empty($exrow[24]) & !empty($exrow[25])) {
		$job_4 = $exrow[22]; $jobCom_4 = $exrow[23]; $joFrm_4 = $exrow[24]; $jobto_4 = $exrow[25];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$jobCom_4</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$joFrm_4 - $jobto_4</h3>
				<h3 style=''>$job_4</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[26]) & !empty($exrow[27]) & !empty($exrow[28]) & !empty($exrow[29])) {
		$job_5 = $exrow[26]; $jobCom_5 = $exrow[27]; $joFrm_5 = $exrow[28]; $jobto_5 = $exrow[29];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$jobCom_5</h3>
				<h3 style='width:200px; float:right; font-weight:bold;'>$joFrm_5 - $jobto_5</h3>
				<h3 style=''>$job_5</h3>
			<div>
		";
		} else {
		
		}	
		
		$table .= "
				</div>
			</article>
			<div class='clear'></div>
		</section>
		";

// End Working experience
//start Skills

		$table .= "
		<section >
			<article>
				<div class='sectionTitle' style='width:650px;'>
					<h1>Skills & Abilities</h1> ";

		if (!empty($exrow[0]) & !empty($exrow[1])) {
		$skil_1 = $exrow[0]; $skilDes_1 = $exrow[1];
		$table .= "
			<div>
				<h3 style='width:600px; float:left; font-weight:bold;'>$skil_1</h3>
				<h3 style='width:600px; float:left;'>$skilDes_1</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[2]) & !empty($exrow[3])) {
		 $skil_2 = $exrow[2]; $skilDes_2 = $exrow[3];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:600px; float:left; font-weight:bold;'>$skil_2</h3>
				<h3 style='width:600px; float:left;'>$skilDes_2</h3>
			<div>
		";
		} else {
		
		}


		if (!empty($exrow[4]) & !empty($exrow[5])) {
		 $skil_3 = $exrow[4]; $skilDes_3 = $exrow[5];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:600px; float:left; font-weight:bold;'>$skil_3</h3>
				<h3 style='width:600px; float:left;'>$skilDes_3</h3>
			<div>
		";
		} else {
		
		}


		if (!empty($exrow[6]) & !empty($exrow[7])) {
		 $skil_4 = $exrow[6]; $skilDes_4 = $exrow[7];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:600px; float:left; font-weight:bold;'>$skil_4</h3>
				<h3 style='width:600px; float:left;'>$skilDes_4</h3>
			<div>
		";
		} else {
		
		}

		if (!empty($exrow[8]) & !empty($exrow[9])) {
		 $skil_5 = $exrow[8]; $skilDes_5 = $exrow[9];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:600px; float:left; font-weight:bold;'>$skil_4</h3>
				<h3 style='width:600px; float:left;'>$skilDes_4</h3>
			<div>
		";
		} else {
		
		} 

		$table .= "
				</div>
			</article>
			<div class='clear'></div>
		</section>
		";
// End Skills
// Start Referee
		$table .= "
		<section >
			<article>
				<div class='sectionTitle' style='width:inherit;'>
					<h1>Referees</h1> ";

		if (!empty($rfrow[0]) & !empty($rfrow[1]) & !empty($rfrow[2]) & !empty($rfrow[3])) {
		 $ref_1 = $rfrow[0]; $rfttl_1 = $rfrow[1]; $rfnum_1 = $rfrow[2]; $rfadd_1 = $rfrow[3];
		$table .= "
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$ref_1</h3>
				<h3 style=''>$rfttl_1</h3>
				<h3 style=''>$rfadd_1</h3>
				<h3 style=''>$rfnum_1</h3>
			<div>
		";
		} else {
		
		} 

		if (!empty($rfrow[4]) & !empty($rfrow[5]) & !empty($rfrow[6]) & !empty($rfrow[7])) {
		$ref_2 = $rfrow[4]; $rfttl_2 = $rfrow[5]; $rfnum_2 = $rfrow[6]; $rfadd_2 = $rfrow[7];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$ref_2</h3>
				<h3 style=''>$rfttl_2</h3>
				<h3 style=''>$rfadd_2</h3>
				<h3 style=''>$rfnum_2</h3>
			<div>
		";
		} else {
		
		} 

		if (!empty($rfrow[8]) & !empty($rfrow[9]) & !empty($rfrow[10]) & !empty($rfrow[11])) {
		$ref_3 = $rfrow[8]; $rfttl_3 = $rfrow[9]; $rfnum_3 = $rfrow[10]; $rfadd_3 = $rfrow[11];
		$table .= "
		<section></section>
			<div>
				<h3 style='width:450px; float:left; font-weight:bold;'>$ref_3</h3>
				<h3 style=''>$rfttl_3</h3>
				<h3 style=''>$rfadd_3</h3>
				<h3 style=''>$rfnum_3</h3>
			<div>
		";
		} else {
		
		} 

		$table .= "
				</div>
			</article>
			<div class='clear'></div>
		</section>
		";

	} else {

	}			

	$table .= "
		</div>
		</div>
		</body>
		</html>
	";
	echo $table;

	$vfms_con->close();
	}
}
?>