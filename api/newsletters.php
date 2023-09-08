<?php
// Initialize session
session_start();

// If not admin, exit
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	exit();
}

// Include config file
require_once('config.php');

// $query = 'SELECT id, title, edition, published
// 	FROM newsletters
// 	ORDER BY published_date DESC';
// $result = $conn->query($query);
// $newsletters = $result->fetch_all(MYSQLI_ASSOC);

?>