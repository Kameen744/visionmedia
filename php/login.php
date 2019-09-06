<?php
	require_once 'config/database.php';
	$db = new Database();
	// require "con_Vfm.php";
	session_start();
	if(isset($_POST['username'])){
		$Uname = $db->validate($_POST['username']);
		$Upass = $db->validate($_POST['password']);
		$StationID = $db->validate($_POST['LogSelectLoc']);
		$data = [$Uname, $Upass, $StationID];
		
		if(!empty($StationID)) {
			$user = $db->getRow('SELECT * FROM `vsn_users` WHERE `V_User_Name` = ? AND 
			`V_User_Password` = ? AND `Station_ID` = ?', [$Uname, $Upass, $StationID]);
			
			if($user) {
				$station = $db->getRow('SELECT * FROM `stations` WHERE `Station_ID` = ?', [$StationID]);
				$_SESSION['vuserp'] = $user['V_User_Name'];
				$_SESSION['location'] = $user['V_S_Location'];
				$_SESSION['Station_ID_No'] = $user['Station_ID'];
				$_SESSION['Station_Location'] = $station['S_Location'];
				$_SESSION['Station_Address'] = $station['S_Address'];
				header('Location: vuser_area.php');
				// echo "<script>window.open('vuser_area.php', '_self')</script>";
			}else {

				$subuser = $db->getRow('SELECT * FROM `vsn_sub_user_verified` WHERE `V_S_username` = ? 
				AND `V_S_password` = ? AND `Station_ID` = ?', [$Uname, $Upass, $StationID]);
				if ($subuser) {
						
					$_SESSION['Sub_UserID'] = $subuser['Sub_User_ID'];
					$_SESSION['vsubuserp'] = $subuser['V_S_username'];
					$_SESSION['location'] = $subuser['V_S_Location'];
					$_SESSION['Station_ID_No'] = $subuser['Station_ID'];
					$_SESSION['user_email'] = $subuser['user_email'];
					header('Location: userdashboard.php');
					
					// echo "<script>window.open('userdashboard.php', '_self')</script>";
				} else {
					$_SESSION['error'] = 'Username/Password Incorrect';
					header('Location: ../index.php');
					// echo "<script>alert('Username/Password Incorrect'); window.open('../index.php', '_self');</script>";
				}
			}

		}else {
			$admin = $db->getRow('SELECT * FROM `login` WHERE `User_Name` = ? AND `Password` = ?', 
			[$Uname, $Upass]);

			if ($admin) {
				
				$_SESSION['vadminp'] = $admin['User_Name'];
				
					header('Location: vadmin_area.php');
				// echo "<script>window.open('vadmin_area.php', '_self')</script>";
			}
			else{
				$_SESSION['error'] = 'Username/Password Incorrect';
				header('Location: ../index.php');
				// echo "<script>alert('Username/Password Incorrect'); window.open('../index.php', '_self');</script>";
			}
			
		}
	}