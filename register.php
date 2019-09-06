<?php 
	require 'php/config/database.php';
	$db = new Database();
	$stations = $db->getRows('SELECT * FROM `stations`');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VisionFM Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="container">
		<div class="row justify-content-center">
			<div class="col-md-3 mt-5">
				<div class="card shadow-lg">
					<div class="card-header">
					<h3 class="text-danger text-center">Vision Media Services</h3>
					</div>
					<div class="card card-body">
						<form method="POST" action="register/register.php">
                            <label class="text-danger">Email Address:</label>
							<input type="text" name="email" class="form-control border-primary" required placeholder="E-mail Address">
                            <label class="text-danger">User Name / Nickname:</label>
							<input type="text" name="username" class="form-control border-primary" required placeholder="User Name">
							<label class="text-danger">Password:</label>
							<input type="password" name="password" class="form-control border-primary" required="" placeholder="Password">
							<label class="text-danger">Location:</label>
							<select name="station" class="form-control border-primary">
								<option value="">Station</option>
								<?php foreach($stations as $station): ?>
									<option value="<?= $station['Station_ID'] ?>">
										<?= $station['S_Name'] .' ' .$station['S_Location'] ?>
									</option>
								<?php endforeach; ?>
							</select>
							<hr>
							<input type="submit" name="submit" class="btn btn-danger btn-block" value="Register">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>