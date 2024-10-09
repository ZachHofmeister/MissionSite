<?php
// Include config file
require_once(__DIR__.'/../config.php');

class Database {
	private $conn;

	function __construct() {
		// Read paths file to get path to database creds
		$pathsJson = file_get_contents(ROOT_PATH . "/.paths.json");
		$paths = json_decode($pathsJson, true);

		// Read database creds file
		$json = file_get_contents(ROOT_PATH ."/". $paths['creds']); // THIS WILL NEED TO BE CHANGED TO WORK WITH SERVER SETUP - maybe it has been
		$creds = json_decode($json, true);

		// Database creds
		$host = $creds['host'] ?? null;
		$user = $creds['username'] ?? null;
		$pass = $creds['password'] ?? null;
		$name = $creds['schema'] ?? null;
		$port = $creds['port'] ?? null;

		// connect to database
		try {
			$this->conn = mysqli_connect($host, $user, $pass, $name, $port);
		} catch (Exception $e) {
			if (!$this->conn) {
				die("Error");
				// die("Error connecting to database: " . mysqli_connect_error());
			}
		}
	}

	function __destruct() {
		$this->conn->close();
	}

	public function run($sql, $args = NULL) {
		$stmt = $this->conn->prepare($sql);
		$stmt->execute($args);
		return $stmt;
	}
}
?>