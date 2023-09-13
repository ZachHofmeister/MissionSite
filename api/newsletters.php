<?php
// Initialize session
session_start();

// If not admin, exit
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	exit();
}

// Include config file
// require_once('../config.php');

// Define variables and initialize with empty values
$id = $title = $blurb = $url = $img_url = $edition = $author = $published = $published_date = "";
 
// Newsletter update
// if($_SERVER["REQUEST_METHOD"] == "PUT"){

// 	$id = $_PUT['id'];
// 	$title = $_PUT['title'];
// 	$blurb = $_PUT['blurb'];
// 	$url = $_PUT['url'];
// 	$img_url = $_PUT['img_url'];
// 	$edition = $_PUT['edition'];
// 	$author = $_PUT['author'];
// 	$published = ($_PUT['published'] == 'true'? 1 : 0);
// 	$published_date = $_PUT['published_date'];
	
// 	// Prepare an insert statement
// 	$sql = "UPDATE newsletters SET title=?, blurb=?, url=?, img_url=?, edition=?, author=?, published=?, published_date=? WHERE $id = ?";
		
// 	if($stmt = $conn->prepare($sql)){
// 		// Bind variables to the prepared statement as parameters
// 		$stmt->bind_param("ssssssiss", $param_title, $param_blurb, $param_url, $param_img_url, $param_edition, $param_author, $param_published, $param_published_date, $param_id);
		
// 		// Set parameters
// 		$param_title = $title;
// 		$param_blurb = $blurb;
// 		$param_url = $url;
// 		$param_img_url = $img_url;
// 		$param_edition = $edition;
// 		$param_author = $author;
// 		$param_published = $published;
// 		$param_published_date = $published_date;
// 		$param_id = $id;
		
// 		// Attempt to execute the prepared statement
// 		if($stmt->execute()) {
// 			// header("location: login.php");
// 		} else {
// 			echo "Oops! Something went wrong. Please try again later.";
// 		}

// 		// Close statement
// 		$stmt->close();
// 	}
	
// 	// Close connection
// 	$conn->close();
// }

?>