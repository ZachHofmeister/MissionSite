<?php 
// Include config file
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
	<?php
		//sets the NEWSLETTER_DIR and NEWSLETTER_DIR_REL constant
		require_once ROOT_PATH . '/includes/get-newsletter-dir.php';
		require_once ROOT_PATH . "/db/newsletters.php";
		$nl = Newsletter::fetchByEdition( NEWSLETTER_EDITION);
	?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php
			//Set page title (tab bar) from database if it exists
			if (!empty($nl)) {
				echo '<title>' . htmlspecialchars($nl->title) . '</title>';
			} else {
				echo '<title>Newsletter</title>';
			}
			//Link colors CSS
			echo '<link rel="stylesheet" type="text/css" href="' . NEWSLETTER_DIR_REL . '/colors.css">';
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
		<?php
			if (empty($nl->content_html)) {
				include(NEWSLETTER_DIR . '/pages.php');
			} else {
				echo htmlspecialchars($nl->content_html); //todo change this so that approved script can be inserted into content, for now this is safer to prevent XSS
			}
		?>

		<!-- LIGHTBOX -->
		<?php include(ROOT_PATH . '/includes/lightbox.php'); ?>

		<!-- JAVASCRIPT -->
		<script src="/js/navbar.js"></script>
		<script src="/js/lightbox.js"></script>
	</body>
</html>