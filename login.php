<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
		<!--声明文档兼容模式-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<!--设置视口的宽度,页面初始缩放值-->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Login</title>
		<!--引入Bootstrap核心CSS文件-->
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<!-- 引入自定义css文件 -->
		<link rel="stylesheet" href="../css/login.css" type="text/css"/>
		<!--引入jQuery核心JS文件-->
		<script src="../js/jquery-1.11.3.min.js"></script>
		<!--引入BootStrap核心JS文件-->
		<script src="../js/bootstrap.min.js"></script>
		<!-- 引入自定义js文件 -->
		<script src="../js/login.js" type="text/javascript"></script>
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
        $query    = "SELECT * FROM `users` WHERE username='$username'
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
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>