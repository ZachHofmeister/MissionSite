<?php
// Include config file
require_once('config.php');
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/home.css" type="text/css" rel="stylesheet">
	<link href="css/navbar.css" type="text/css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAVBAR -->
	<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

	<!-- Display username -->
	<h1><?php
		echo htmlspecialchars($_SESSION["username"]);
	?></h1>
	<!-- Display role (admin/user) -->
	<h3><?php
		echo "Role: " . ($_SESSION["is_admin"]? "Admin" : "User");
	?></h3>
	<!-- Admin page link if admin -->
	<?php
		if ($_SESSION["is_admin"]) {
			echo "<p><a href='admin.php'>Go To Admin Panel</a></p>";
		}
	?>
	<!-- Logout link -->
    <p>
        <a href="logout.php">Log Out</a>
    </p>
</body>
</html>