<!-- https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php -->
<?php
//THIS DISABLES REGISTRATION - COMMENT THIS OUT TO ENABLE
header("location: index.php");
exit();

// Include config file
require_once('config.php');

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
		// Prepare a select statement
		$sql = "SELECT id FROM users WHERE username = ?";
		
		if($stmt = mysqli_prepare($conn, $sql)){
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			
			// Set parameters
			$param_username = trim($_POST["username"]);
			
			// Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
				/* store result */
				mysqli_stmt_store_result($stmt);
				
				if(mysqli_stmt_num_rows($stmt) == 1){
					$username_err = "This username is already taken.";
				} else{
					$username = trim($_POST["username"]);
				}
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	// Validate email
	if(empty(trim($_POST["email"]))) {
		$email_err = "Please enter an email.";
	} elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
		$email_err = "Please enter a valid email address.";
	} else {
		// Prepare a select statement
		$sql = "SELECT id FROM users WHERE email = ?";
		
		if($stmt = mysqli_prepare($conn, $sql)){
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "s", $param_email);
			
			// Set parameters
			$param_email = trim($_POST["email"]);
			
			// Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)) {
				/* store result */
				mysqli_stmt_store_result($stmt);
				
				if(mysqli_stmt_num_rows($stmt) == 1) {
					$email_err = "This email address is in use.";
				} else {
					$email = trim($_POST["email"]);
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
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
		
		// Prepare an insert statement
		$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
		
		if($stmt = mysqli_prepare($conn, $sql)){
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
			
			// Set parameters
			$param_username = $username;
			$param_email = $email;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			
			// Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)) {
				// Redirect to login page
				header("location: login.php");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}
	
	// Close connection
	mysqli_close($conn);
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
				<span class="error-msg"><?php echo $username_err; ?></span>
            </div>
			<div>
                <label>Email</label>
                <input type="text" name="email">
				<span class="error-msg"><?php echo $email_err; ?></span>
            </div>  
            <div>
                <label>Password</label>
                <input type="password" name="password">
				<span class="error-msg"><?php echo $password_err; ?></span>
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
				<span class="error-msg"><?php echo $confirm_password_err; ?></span>
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