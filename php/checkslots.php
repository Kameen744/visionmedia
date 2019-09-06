<?php
	require "con_Vfm.php";
	if(isset($_POST['CreatSlots'])){
		$sql = "SELECT * FROM register_advert ORDER BY ID DESC LIMIT 0, 1";
		$squery = $vfms_con->query($sql);
		while ($rows = $squery->fetch_array(MYSQLI_NUM)){
			$adid = $rows[1];
			$cname = $rows[2];
			$slno = $rows[12];
		}

			foreach ($_POST['motime'] as $key => $value) {
				echo "Works: $value";
			}
		
		$ssadid = mb_substr($adname, 0, 2);
		$sidd = mb_convert_case($ssadid, MB_CASE_UPPER);
		$slotid = $sidd .rand(1001, 9999); 
	}
?>