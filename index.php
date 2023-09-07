<!-- CONFIG INCLUDE -->
<?php require_once('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zach's Mission Updates</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link type="text/css" rel="stylesheet" href="/css/home.css">
	<link type="text/css" rel="stylesheet" href="/css/post-previews.css" >
	<link type="text/css" rel="stylesheet" href="/css/navbar.css">
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
</html>