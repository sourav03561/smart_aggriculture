<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE User_name='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="leftBox form-container">
				<form class="form" method="post" name="login">
				      <h1 class="title">SMART</h1>
					  <h1 class="title">AGRICULTURE</h1>
					  <p class="link">Welcome to our APP<a href="registration.php" class="custom-link">Register</a></p>
				      <p class="content">Name</p>
					  <input type="text" class="login-input custom-input" name="username" placeholder="Username" autofocus="true"/>
				      <p class="content">Password</p>
					  <input type="password" class="login-input custom-input" name="password" placeholder="Password"/>
				      <input type="submit" value="Login" name="submit" class="login-button custom-button"/>
				      
				</form>
			</div>
			<!-- rightBox -->
			<div class="rightBox img-container shadow">
				<img src="TechThinkeres.png"/>
			</div>
	</div>
<?php
    }
?>
</body>
</html>