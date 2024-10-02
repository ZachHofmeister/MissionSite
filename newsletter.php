<!DOCTYPE html>
<html lang="en">
	<?php
		require_once('config.php');
		//sets the NEWSLETTER_DIR and NEWSLETTER_DIR_REL constant
		include(ROOT_PATH . '/includes/get-newsletter-dir.php');
		// $newsletter = Newsletter::fetchByEdition(NEWSLETTER_EDITION);
		
	?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php
			// echo '<link rel="stylesheet" type="text/css" href="' . NEWSLETTER_DIR_REL . '/colors.css">'
			include(NEWSLETTER_DIR . '/head.php');
			// echo '<title>September 2024 Update</title>
			// <link rel="stylesheet" type="text/css" href="/2024/09/colors.css">'
		?>
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

		<!-- JAVASCRIPT -->
		<script src="/js/navbar.js"></script>
		<script src="/js/lightbox.js"></script>
	</body>
</html>