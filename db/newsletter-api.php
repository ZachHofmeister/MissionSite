<?php
// Require config file
require_once __DIR__ . '/../config.php';
// Need to change this if you want to use a Newsletter object, since this catches any POST attempts
// require_once 'newsletters.php';

header('Content-Type: application/json');

// Get db singleton
$db = Database::getInstance();
$method = $_SERVER['REQUEST_METHOD'];
// Used to support json input for API request
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
	case 'GET':
		//GET /newsletter-api.php?id=...
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = 'SELECT * FROM newsletters WHERE id = ?';
			$result = $db->run($sql, [$id])->get_result();
			$newsletter = $result->fetch_assoc();
			echo json_encode($newsletter);
		}
		//GET /newsletter-api.php
		//Option: ?published=0 or 1 if you want to show only published or non-published newsletters
		else { 
			$sql = 'SELECT * FROM newsletters'
				.(isset($_GET['published'])? ' WHERE published = ? ': ' ')
				.'ORDER BY published_date DESC';
			$args = isset($_GET['published'])? [$_GET['published']] : [];
			$result = $db->run($sql, $args)->get_result();
			$newsletters = [];
			while ($row = $result->fetch_assoc()) {
				$newsletters[] = $row;
			}
			echo json_encode($newsletters);
		}
		break;
	case 'POST':
		//Deny unauthenticated requests
		if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
			echo json_encode(['message' => 'Inadequate permission for request']);
			exit();
		}
		//TEMPORARY: make this able to accept parameters in the future
		$sql = 'INSERT INTO newsletters (title) VALUES (\'New Newsletter\')';
		$stmt = $db->run($sql);
		//If error has occurred
		if ($stmt->errno !== 0) {
			echo json_encode(['message' => 'Error creating newsletter']);
		} else {
			echo json_encode(["message" => "Newsletter added successfully"]);
		}
		break;
	case 'PUT':
		//Deny unauthenticated requests
		if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
			echo json_encode(['message' => 'Inadequate permission for request']);
			exit();
		}

		break;
	case 'DELETE':
		//Deny unauthenticated requests
		if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
			echo json_encode(['message' => 'Inadequate permission for request']);
			exit();
		}

		break;
	default:
		echo json_encode(['message' => 'Invalid request method']);
		break;
}

?>