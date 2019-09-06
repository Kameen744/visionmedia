<?php 
    require '../php/config/database.php';

    
    // session_start();

	// if (isset($_SESSION['vadminp']) | isset($_SESSION['vuserp'])) {
	// 	if (isset($_SESSION['vuserp'])) {
	// 		  $stID = $_SESSION['Station_ID_No']; 
    //     } elseif (isset($_SESSION['vadminp'])) {
	// 		    $stID = $_POST['scstID'];
    //     }
    // } else {
    //     header("Location: ../index.php");
    // }
    // $title = 'Appraisal Dashboard';
    // $uriSgmnt = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    // require_once 'header.php';

    $db = new Database();

    // $staffs = $db->getRows('SELECT * FROM `vsn_staff` WHERE `Station_ID` = ?', [$stID]);

    if (isset($_POST['email']) & isset($_POST['username'])) {

        function sanitize_my_email($field) {
            $field = filter_var($field, FILTER_SANITIZE_EMAIL);
            if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }
       
        $email = $db->validate($_POST['email']);
        $username = $db->validate($_POST['username']);
        $password = $db->validate($_POST['password']);
        $station = $db->validate($_POST['station']);

        $sub = substr($username, 0, 2);
        $subUId = rand(11, 99) .rand(10, 99) .strtoupper($sub);

        $stID = $db->getRow('SELECT `S_Location` FROM `stations` WHERE `Station_ID` = ?', [$station]);
        $loc = $stID['S_Location'];

        $data = [$subUId, $email, $username, $password, $loc, $station, 'Self'];

        $checkEmail = $db->getRow('SELECT * FROM `vsn_sub_users` WHERE `user_email` = ?', [$email]);
        $checkUnvEmail = $db->getRow('SELECT * FROM `vsn_sub_user_verified` WHERE `user_email` = ?', [$email]);
    
        $checkUnvUsers = $db->getRow('SELECT * FROM `vsn_sub_users` WHERE `V_S_username` = ?', [$username]);
        $checkUsers = $db->getRow('SELECT * FROM `vsn_sub_user_verified` WHERE `V_S_username` = ?', [$username]);
        

        if($checkEmail || $checkUnvEmail || $checkUnvUsers || $checkUsers) {
            $insUser = false;
        }else {
            $insUser = $db->insertRow('INSERT INTO `vsn_sub_users`(`Sub_User_ID`, `user_email`, 
            `V_S_username`, `V_S_password`, `V_S_Location`, `Station_ID`, 
            `Created_By`) VALUES (?, ?, ?, ?, ?, ?, ?)', $data);
           
            $to_email = $email;
            $subject = 'Vision Media Services Registration';

            $message = '
            <!Doctype html>
            <html>
            <head>
                <title>Vision Media Services</title>
            </head>
            <body>
            <h1> --- Vision Media Services ---</h1>
            <h3>www.vms.ng</h3>

            <h4>
            This message is to confirm the creation of your account 
            with Vision Media Services. <br> Please wait for verification. 
            Once verified you can login with your Username: <b>' .$username .'</b>, 
             Password: <b>' .$password .'</b> and Station: <b>'.$station .' '.$loc .'</b>
            </h4>

            <br>
            <br>

            <p> Sincerely, </p>
            <p>Vision Media Services</p>
            <p><b> (www.vms.ng) </b></p>
            </body>
            </html>
            ';

            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: Vision Media Service (www.vms.ng)';

            //check if the email address is invalid $secure_check
            $secure_check = sanitize_my_email($to_email);
            if ($secure_check == false) {
                echo "Error occur while sending confirmation email.";
            } else { 
                try {
                    mail($to_email, $subject, $message, implode("\r\n", $headers));
                } catch (\Throwable $th) {
                    echo $th;
                }
            }
        }

        if ($insUser) {
            echo "<script>alert('Successefully Registered. Use your username and password to login.'); window.open('../index.php', '_self');</script>";
        } else {
            echo "<script>alert('The Email or Username already exist.'); window.open('../register.php', '_self');</script>";
        }
    }
    
?>