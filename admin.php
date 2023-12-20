<?php
// Include config file
require_once('config.php');

// If not admin, send to front page
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	header("location: /");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Tools</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/home.css" type="text/css" rel="stylesheet">
	<link href="css/navbar.css" type="text/css" rel="stylesheet">
	<!-- <link href="css/modal.css" type="text/css" rel="stylesheet"> -->
	<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAVBAR -->
	<?php include_once(ROOT_PATH . '/includes/navbar.php'); ?>

	<!-- Display user id -->
	<h3>user id: <?php echo $_SESSION["id"];?></h3>

	<h3>Actions</h3>
	<p><a href="/register.php">Register new user</a></p>

	<h3>Post management</h3>
	<!-- Add Newsletter Button -->
	<form action="/db/newsletters.php" method="post">
		<input type="submit" value="Create New Newsletter">
	</form>
	
	<!-- List of newsletters -->
	<table>
		<tr>
			<th>Title</th>
			<th>Edition</th>
			<th>Published?</th>
			<th>Edit Details</th>
		</tr>
	<?php
	require_once ROOT_PATH . "/db/newsletters.php";
	$newsletters = getAllNewsletters(false);

	foreach($newsletters as $nl) {
		echo '
			<tr>
				<td><a href="'.$nl->getUrl().'">'.$nl->title.'</a></td>
				<td>'.$nl->edition.'</td>
				<td>'.($nl->published? "Yes":"No").'</td>
				<td><a href="'.$nl->getUrl().'&editing=1">Edit</a></td>
			</tr>
		';
	}
	/*
	<tr>
		<td>'.$row['title'].'</td>
		<td>'.$row['blurb'].'</td>
		<td>'.$row['img_url'].'</td>
		<td>'.$row['edition'].'</td>
		<td>'.$row['author'].'</td>
		<td>'.$row['published'].'</td>
		<td>'.$row['published_date'].'</td>
		<td><a href="'.$nl_url.'">'.$nl_url.'</a></td>
		<td>'.$row['id'].'</td>
	</tr>
	*/
	// MODAL
	// include_once(ROOT_PATH."/includes/modal-post-details.php");
	?>
	<table>
</body>
</html>