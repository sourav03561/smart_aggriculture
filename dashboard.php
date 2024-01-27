<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Dashboard</title>
		<link rel="stylesheet" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		
	</head>
	<body>
	<div class="leftContainer">
			<div class="navbar">
				<img src="logo.png"/>
				<a href="home.php" target="contentFrame">Home</a>
				<a href="AboutUs.html" target="contentFrame">About Us</a>
				<a href="profile.php" target="contentFrame">Profile</a>
				<a href="signout.php">Sign out</a>
			</div>
			<div class="leftContent">
				<div style=" margin: 0;padding: 0;height: 100vh;display: flex;justify-content: flex-start;align-items: center;background-image: url('TechThinkeres.png');background-size: cover;background-position: right bottom;">
					<div style="margin-left: 100px;margin-bottom: 420px;">
					  <h1 style="margin: 0;text-align: center;color: rgb(65,230,75);margin-bottom: 180px;font-size: 50px;font-weight: 800;font-family: Arial, Helvetica, sans-serif;">
					  SMART<br />AGRICULTURE
					  </h1>
					  <a href="DetectLand.php" style="  margin: 30px auto 0;padding: 10px 20px;height: 50px;font-size: 20px;font-weight: 800;font-family: Arial, Helvetica, sans-serif;display: inline-block;background-color: rgb(65,230,75);color: white;text-decoration: none;border: none;border-radius: 50px;">DETECT LAND</a>
					</div>
				</div>
			</div>
		</div>
		<div class="rightContainer">
			<h1 class="dashboard-title">Harvesting<br />Tomorrow</h1>
			<h1 class="dashboard-title">Smart<br />Agriculture</h1>
			<h1 class="dashboard-title">Sensor<br />Solutions</h1>
		</div>
		
	</body>
	
</html>
</body>
</html>