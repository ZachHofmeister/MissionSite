<?php 
	error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

	ini_set('ignore_repeated_errors', TRUE); // always use TRUE

	ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

	ini_set('log_errors', TRUE); // Error/Exception file logging engine.
	ini_set('error_log', '/phpErrors/phpErrorLog-missionSite.log'); // Logging file path

	session_start();

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	// define('BASE_URL', 'http://localhost/');

	$pathsJson = file_get_contents(ROOT_PATH . "/.paths.json");
	$paths = json_decode($pathsJson, true);

	// connect to database

	$json = file_get_contents($paths['creds']);
	$creds = json_decode($json, true);

	$host = $creds['host'] ?? null;
	$user = $creds['username'] ?? null;
	$pass = $creds['password'] ?? null;
	$db = $creds['schema'] ?? null;
	$port = $creds['port'] ?? null;

	$conn = null;

	try {
		$conn = mysqli_connect($host, $user, $pass, $db, port: $port);
	} catch (Exception $e) {
		// echo "Exception: " . $e;
		if (!$conn) {
			die("Error");
			// die("Error connecting to database: " . mysqli_connect_error());
		}
	}
?>
