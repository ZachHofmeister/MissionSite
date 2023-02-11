<!DOCTYPE html>
<html>
	<!-- CONFIG INCLUDE -->
	<?php require_once('config.php') ?>
	<head>
		<title>Zach's Mission Updates</title>
		<link href="css/home.css" type="text/css" rel="stylesheet"/>
		<link href="css/navbar.css" type="text/css" rel="stylesheet"/>
		<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- NAVBAR -->
		<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

		<!-- MAIN -->
		<div id="main">
			<!-- RECENT POSTS -->
			<?php include(ROOT_PATH . '/includes/recent-posts.php'); ?>
		</div>
	</body>

	<!-- JAVASCRIPT-->
	<script src="/js/navbar.js" type="module"></script>
</html>