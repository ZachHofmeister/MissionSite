<?php
	//Require config file
	require_once('config.php');
	//sets the NEWSLETTER_DIR and NEWSLETTER_DIR_REL constant
	include(ROOT_PATH . '/includes/get-newsletter-dir.php');

	//Toggle editing button
	function toggleEditing() {
		// Store date value
		$date = $_GET['date'];
		// Redirect
		if (isset($_GET["editing"])) {
			header('location: /newsletter.php?date='.$date);
		} else {
			header('location: /newsletter.php?date='.$date.'&editing=1');
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php include(NEWSLETTER_DIR . '/head.php');?>
		<!-- <link rel="stylesheet" type="text/css" href="/css/home.css/"> -->
		<link rel="stylesheet" type="text/css" href="/css/newsletter.css">
		<link rel="stylesheet" type="text/css" href="/css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="/css/navbar.css">
		<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- NAVBAR -->
		<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

		<?php
		//Admin tools if admin and requested in URL
		if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]
		&& isset($_GET["editing"]) && $_GET["editing"]) {
			include(ROOT_PATH . '/includes/newsletter-editor.php');
		}
		?>
		
		<!-- PAGES -->
		<?php include(NEWSLETTER_DIR . '/pages.php'); ?>

		<!-- LIGHTBOX -->
		<?php include(ROOT_PATH . '/includes/lightbox.php'); ?>
	</body>
</html>