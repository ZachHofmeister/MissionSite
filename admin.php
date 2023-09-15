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
	<link href="css/modal.css" type="text/css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAVBAR -->
	<?php include_once(ROOT_PATH . '/includes/navbar.php'); ?>

	<!-- Display user id -->
	<h3>user id: <?php echo $_SESSION["id"];?></h3>

	<h3>Actions</h3>
	<p><a href="/register.php">Register new user</a></p>
	<p><a href="/logout.php">Logout</a></p>

	<h3>Post management</h3>
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
	$newsletters = getAllNewsletters();

	foreach($newsletters as $row) {
		$nl_url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $row['edition'])->format('Y-m');
		echo '
			<tr>
				<td><a href="'.$nl_url.'">'.$row['title'].'</a></td>
				<td>'.$row['edition'].'</td>
				<td>'.($row['published']? "Yes":"No").'</td>
				<td><a class="modal-open">Edit</a></td>
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
	include_once(ROOT_PATH."/includes/modal-post-details.php");
	?>
	<table>
</body>
</html>