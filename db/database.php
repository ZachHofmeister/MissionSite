<?php
// Include config file
require_once(__DIR__.'/../config.php');

class Database {
	private static $instance = null; // Singleton instance
	private mysqli $conn;

	private function __construct() {
		// Read paths file to get path to database creds
		$pathsFile = ROOT_PATH . "/.paths.json";
		if (!file_exists($pathsFile)) {
			die("Paths file not found.");
		}
		$pathsJson = file_get_contents($pathsFile);
		$paths = json_decode($pathsJson, true);

		// Read database creds file
		$credsFile = ROOT_PATH ."/". $paths['creds'];
		if (!file_exists($credsFile)) {
			die("Creds file not found.");
		}
		$json = file_get_contents($credsFile);
		$creds = json_decode($json, true);

		// Database creds
		$host = $creds['host'] ?? null;
		$user = $creds['username'] ?? null;
		$pass = $creds['password'] ?? null;
		$name = $creds['schema'] ?? null;
		$port = $creds['port'] ?? null;

		// connect to database
		try {
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$this->conn = mysqli_connect($host, $user, $pass, $name, $port);
		} catch (mysqli_sql_exception $e) {
			die("Database connection failed: " . $e->getMessage());
		}
	}

	public static function getInstance(): Database {
		if (self::$instance === null) {
			self::$instance = new Database();
		}
		return self::$instance;
	}

	public function run($sql, $args = []) {
		$stmt = $this->conn->prepare($sql);
		if ($stmt === false) {
			die("SQL Error: " . $this->conn->error);
		}
		// if (!empty($args)) {
			//bind param...
		// }
		$stmt->execute(params: $args);
		return $stmt;
	}

	// Prevent cloning (singleton pattern)
	private function __clone() {}

	private function __destruct() {
		if ($this->conn) {
			$this->conn->close();
		}
	}
}
?>