<?php 
// Include config file
require_once(__DIR__.'/../config.php');

// If not admin, end
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	exit();
}

// Include config file
require_once('config.php');

// Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST") {

// }
?>

<div id="modal" style="display:none;">
	<div id="modal-content">
		<div id="modal-title">Title</div>
		<span class="modal-button" id="modal-close">&times;</span>

		<?php
		// $query = 'SELECT id, title, edition, published
		// 	FROM newsletters
		// 	ORDER BY published_date DESC';
		// $result = $conn->query($query);
		// $newsletters = $result->fetch_all(MYSQLI_ASSOC);

		// foreach($newsletters as $row) {
		// 	$nl_url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $row['edition'])->format('Y-m');
		// 	echo '
		// 		<p><a href="'.$nl_url.'">'.$row['title'].'</a></p>
		// 		<p>'.$row['edition'].'</p>
		// 		<p>'.($row['published']? "Yes":"No").'</p>
		// 	';
		// }
		?>
	</div>
</div>

<!-- JAVASCRIPT -->
<script src="/js/modal.js"></script>