<?php
	if (isset($_POST['submit'])) {
		$amt = $_POST['amount'];
		$pd = $_POST['paid'];

		$mn = $amt - $pd;
		if ($mn <= 0) {
			$st = "Balanced";
		}else{
			$st = "Not Balanced";
		}
		echo "<h3> $amt <br> $pd</h3><br> <h2>$mn</h2><br> <h1>$st</h1>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.image-resize {
			height: 380px;
			object-fit: cover;
			object-position: center center;
		}
	</style>
</head>
<body>
	<form method="POST" action="test.php">
		<input type="date" name="amount"><br>
		<input type="date" name="paid">
		<input type="submit" name="submit">
	</form>
</body>
</html>