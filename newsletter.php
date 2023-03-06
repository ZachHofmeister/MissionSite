<!DOCTYPE html>
<html lang="en">
	<?php
		require_once('config.php');
		//sets the NEWSLETTER_DIR and NEWSLETTER_DIR_REL constant
		include(ROOT_PATH . '/includes/get-newsletter-dir.php');
	?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php 
			// echo '<link rel="stylesheet" type="text/css" href="' . NEWSLETTER_DIR_REL . '/colors.css">'
			include(NEWSLETTER_DIR . '/head.php');
		?>
		<link rel="stylesheet" type="text/css" href="/css/newsletter.css">
		<link rel="stylesheet" type="text/css" href="/css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="/css/navbar.css">
		<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- NAVBAR -->
		<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
		
		<?php include(NEWSLETTER_DIR . '/pages.php'); ?>

		<!-- LIGHTBOX -->
		<?php include(ROOT_PATH . '/includes/lightbox.php'); ?>

		<!-- JAVASCRIPT -->
		<script src="/js/navbar.js"></script>
		<script src="/js/lightbox.js"></script>
	</body>
</html>