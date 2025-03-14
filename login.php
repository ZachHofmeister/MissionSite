<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

// Include config file
require_once('config.php');
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: account.php");
    exit;
}
 
// Include config file
require_once('config.php');
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
		require_once ROOT_PATH . "/db/users.php";
		$user = User::fetchByUsername($username);

		//Verify the entered password matches the stored user's hash
		if(password_verify($password, $user->password)){
			// Password is correct, so start a new session
			session_start();
			
			// Store data in session variables
			$_SESSION["loggedin"] = true;
			$_SESSION["id"] = $user->id;
			$_SESSION["username"] = $user->username;
			$_SESSION["is_admin"] = $user->is_admin;                           
			
			// Redirect user to welcome page
			header("location: account.php");
		} else{
			// Password is not valid, display a generic error message
			$login_err = "Invalid username or password.";
		}
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/home.css" type="text/css" rel="stylesheet">
	<link href="css/navbar.css" type="text/css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAVBAR -->
	<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

	<style>
		.error-msg {
			color: red;
		}
	</style>

    <div>
        <h2>Login</h2>
        <p>Please enter your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="error-msg">' . $login_err . '</div>';
        }        
        ?>

		<!-- The following line tells the server to execute this script as a POST request -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
                <span class="error-msg"><?php echo htmlspecialchars($username_err); ?></span>
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password">
                <span class="error-msg"><?php echo htmlspecialchars($password_err); ?></span>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Create one now</a>.</p>
        </form>
    </div>
</body>
</html>