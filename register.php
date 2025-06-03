<!-- https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php -->
<?php
// Include config file
require_once('config.php');

//THIS DISABLES REGISTRATION FOR NON-ADMIN - COMMENT THIS OUT TO ENABLE
// if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
// 	header("location: /");
// 	exit();
// }

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	// Validate username
	if(empty(trim($_POST["username"]))) {
		$username_err = "Please enter a username.";
	} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
		$username_err = "Username can only contain letters, numbers, and underscores.";
	} else {
		// Check if username exists in db
		require_once ROOT_PATH . "/db/users.php";
		if (usernameExists(trim($_POST["username"]))) {
			$username_err = "This username is already taken.";
		} else {
			$username = trim($_POST["username"]);
		}
	}

	// Validate email
	if(empty(trim($_POST["email"]))) {
		$email_err = "Please enter an email.";
	} elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
		$email_err = "Please enter a valid email address.";
	} else {
		// Check if email exists in db
		require_once ROOT_PATH . "/db/users.php";
		if (emailExists(trim($_POST["email"]))) {
			$email_err = "This email is already in use.";
		} else {
			$email = trim($_POST["email"]);
		}
	}
	
	// Validate password
	if(empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";     
	} elseif(strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have at least 6 characters.";
	} else {
		$password = trim($_POST["password"]);
	}
	
	// Validate confirm password
	if(empty(trim($_POST["confirm_password"]))){
		$confirm_password_err = "Please confirm password.";     
	} else{
		$confirm_password = trim($_POST["confirm_password"]);
		if(empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}
	
	// Check input errors before inserting in database
	if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
		require_once ROOT_PATH . "/db/users.php";
		// Attempt to register user
		if(registerUser($username, $email, $password)) {
			// Redirect to login page
			header("location: login.php");
		} else {
			echo "Oops! Something went wrong. Please try again later.";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
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
        <h2>Create Account</h2>
        <p>Please fill this form to create an account.</p>
		
		<!-- The following line tells the server to execute this script as a POST request -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
				<span class="error-msg"><?php echo htmlspecialchars($username_err); ?></span>
            </div>
			<div>
                <label>Email</label>
                <input type="text" name="email">
				<span class="error-msg"><?php echo htmlspecialchars($email_err); ?></span>
            </div>  
            <div>
                <label>Password</label>
                <input type="password" name="password">
				<span class="error-msg"><?php echo htmlspecialchars($password_err); ?></span>
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
				<span class="error-msg"><?php echo htmlspecialchars($confirm_password_err); ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>