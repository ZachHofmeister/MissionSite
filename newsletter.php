<!DOCTYPE html>
<html>
	<?php
		require_once('config.php');
		//sets the NEWSLETTER_DIR and NEWSLETTER_DIR_REL constant
		include(ROOT_PATH . '/includes/get-newsletter-dir.php');
	?>
	<head>
		<?php 
			// echo '<link rel="stylesheet" type="text/css" href="' . NEWSLETTER_DIR_REL . '/colors.css">'
			include(NEWSLETTER_DIR . '/head.php');
		?>
		<link rel="stylesheet" type="text/css" href="/css/newsletter.css">
		<link rel="stylesheet" type="text/css" href="/css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="/css/navbar.css"/>
		<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- NAVBAR -->
		<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
		
		<?php include(NEWSLETTER_DIR . '/pages.php'); ?>

		<!-- LIGHTBOX -->

		<div id="lightbox" class="lightbox" style="display:none;">
			<div class="lightbox-content">
				<span class="close-lightbox">&times;</span>
				<!-- <p>Some text in the Lightbox..</p> -->
				<img id="main-img" src="" alt="">
			</div>
		</div>

	</body>
	<script type="text/javascript" src="/js/navbar.js"></script>
	<script type="text/javascript" src="/js/lightbox.js"></script>
</html>