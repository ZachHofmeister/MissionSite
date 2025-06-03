<?php
// Require config file
require_once __DIR__ . '/../config.php';
require_once 'newsletters.php';

header('Content-Type: application/json');

$db = Database::getInstance();
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
	case 'GET':
		//GET /newsletter-api.php?id=...
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = 'SELECT * FROM newsletters WHERE id = ?';
			$result = $db->run($sql, array($id))->get_result();
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
		break;
	case 'PUT':
		break;
	case 'DELETE':
		break;
	default:
		echo json_encode(['message' => 'Invalid request method']);
		break;
}

?>