<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Registration</title>
		<link rel="stylesheet" href="../css/registration.css" type="text/css"/>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<script src="../js/javascrip.js" type="text/javascript"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (User_name, password, Email_id)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="leftBox form-container shadow">
			<form class="form" action="" method="post">
				<h1 class="title">SMART</h1>
				<h1 class="title">AGRICULTURE</h1>
				<h3 class="text">Create an account</h3>
				<p class="text">Let's get started!</p>
				<p class="content">Name</p>
			    <input type="text" class="login-input custom-input" name="username" placeholder="Username" required />
			    <p class="content">Email</p>
				<input type="text" class="login-input custom-input" name="email" placeholder="Email Adress">
				<p class="content">Password</p>
			    <input type="password" class="login-input custom-input" name="password" placeholder="Password">
			    <input type="submit" name="submit" value="Sign up" class="login-button custom-button">
			    <p class="link">Already have an account?<a href="login.php" class="custom-link">Log In</a></p>
			</form>
		</div>
		<div class="rightBox img-container">
			<img src="TechThinkeres.png"/>
		</div>
<?php
    }
?>
</body>
</html>