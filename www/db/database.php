<?php
// Include config file
require_once(__DIR__.'/../config.php');

class Database {
	private static $instance = null; // Singleton instance
	private mysqli $conn;

	private function __construct() {
		// Read database password file location from ENV (see docker-compose.yml)
		$passFile = $_ENV['PHP_DB_PASSWORD_FILE'];
		if (!file_exists($passFile)) {
			die("DB password file not found.");
		}

		// Database creds
		$host = $_ENV['PHP_DB_HOST'] ?? null;
		$user = $_ENV['PHP_DB_USER'] ?? null;
		$pass = file_get_contents($passFile) ?? null;
		$name = $_ENV['PHP_DB_NAME'] ?? null;

		// connect to database
		try {
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$this->conn = mysqli_connect($host, $user, $pass, $name);
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
		
		//Temp code to bind params
		if (!empty($args)) {
			$types = ''; 

			foreach ($args as $arg) {
				if (is_int($arg)) {
					$types .= 'i'; // Integer
				} elseif (is_double($arg)) {
					$types .= 'd'; // Double/Float
				} elseif (is_string($arg)) {
					$types .= 's'; // String
				} else {
					$types .= 'b'; // Blob
				}
			}
			
			$stmt->bind_param($types, ...$args);
		}

		$stmt->execute();
		return $stmt;
	}

	// Prevent cloning (singleton pattern)
	private function __clone() {}

	public function __destruct() {
		if ($this->conn) {
			$this->conn->close();
		}
	}
}
?>