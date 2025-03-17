<?php
// Include config file
require_once('config.php');

// Initialize the session just in case
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
 
// Unset all of the session variables
$_SESSION = [];
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>