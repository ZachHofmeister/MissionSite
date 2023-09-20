<?php
class User {
	public $id;
	public $username;
	public $email;
	public $password;
	public $is_admin;
	public $created_at;

	function __construct($id = "", $username, $email, $password, $is_admin = 0, $created_at = "") {
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->is_admin = $is_admin;
		$this->created_at = $created_at;
	}

	// Create from database row
	public static function fromArray($arr) {
		return new User(
			$arr["id"], 
			$arr["username"], 
			$arr["email"], 
			$arr["password"], 
			$arr["is_admin"], 
			$arr["created_at"]
		);
	}

	// GET newsletter from db, based on username
	public static function fetchByUsername ($username) {
		require_once "database.php";
		$db = new Database();

		$sql = 'SELECT * 
			FROM users 
			WHERE username = ?';
		$args = array($username);
		$stmt = $db->run($sql, $args);
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			return User::fromArray($result->fetch_assoc());
		} else {
			echo "Error: could not fetch user";
		}
	}
}

// POST new user to DB
function registerUser($username, $email, $plain_password) {
	require_once "database.php";
	$db = new Database();
	$sql = 'INSERT INTO users (username, email, password)
		VALUES (?, ?, ?)';
	$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
	$args = array($username, $email, $hashed_password);
	$stmt = $db->run($sql, $args);
	return $stmt->errno? false : true; // return false if there's an error, true otherwise
}

// QUERY if user with username exists in the database
function usernameExists($username) {
	require_once "database.php";
	$db = new Database();
	$sql = 'SELECT id FROM users WHERE username = ?';
	$args = array($username);
	$stmt = $db->run($sql, $args);
	if (!$stmt->errno) {
		if ($stmt->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	} else{
		echo "Oops! Something went wrong. Please try again later.";
		return true;
	}
}

// QUERY if user with email exists in the database
function emailExists($email) {
	require_once "database.php";
	$db = new Database();
	$sql = 'SELECT id FROM users WHERE email = ?';
	$args = array($email);
	$stmt = $db->run($sql, $args);
	if (!$stmt->errno) {
		if ($stmt->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	} else{
		echo "Oops! Something went wrong. Please try again later.";
		return true;
	}
}

?>