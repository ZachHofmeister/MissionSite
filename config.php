<?php 
	// Toggle this to change the setting
	// define('DEBUG', true);
	// // You want all errors to be triggered
	// error_reporting(E_ALL);
	// ini_set('display_errors', DEBUG ? 'On' : 'Off');

	session_start();

	// connect to database

	$json = file_get_contents(".creds.json");
	$creds = json_decode($json, true);

	$host = $settings['host'] ?? null;
	$user = $settings['username'] ?? null;
	$pass = $settings ['password'] ?? null;
	$db = $settings['schema'] ?? null;

	$conn = mysqli_connect($host, $user, $pass, $db);
	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	// define('BASE_URL', 'http://localhost/');
?>