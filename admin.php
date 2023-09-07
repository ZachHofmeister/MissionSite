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
	<script src="https://kit.fontawesome.com/43ec7226a9.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAVBAR -->
	<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

	<!-- Display user id -->
	<h3>id: <?php echo $_SESSION["id"];?></h3>

	<!-- Register page -->
	<p><a href="/register.php">Register new user</a></p>

	<!-- List of newsletters -->
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th {
			font-weight: bold;
		}
	</style>
	<table>
		<tr>
			<th>title</th>
			<th>blurb</th>
			<!-- <th>url</th> -->
			<th>img_url</th>
			<th>edition</th>
			<th>author</th>
			<th>published</th>
			<th>published_date</th>
			<th>link</th>
		</tr>
	<?php
	$query = 'SELECT *
		FROM newsletters
		ORDER BY published_date DESC';
	$result = $conn->query($query);
	$newsletters = $result->fetch_all(MYSQLI_ASSOC);

	foreach($newsletters as $row) {
		$nl_url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $row['edition'])->format('Y-m');
		// echo $nl_url;
		echo '
			<tr>
				<td>'.$row['title'].'</td>
				<td>'.$row['blurb'].'</td>
				<td>'.$row['img_url'].'</td>
				<td>'.$row['edition'].'</td>
				<td>'.$row['author'].'</td>
				<td>'.$row['published'].'</td>
				<td>'.$row['published_date'].'</td>
				<td><a href="'.$nl_url.'">'.$nl_url.'</a></td>
			</tr>
		';
	}
	?>
	<table>
</body>
</html>