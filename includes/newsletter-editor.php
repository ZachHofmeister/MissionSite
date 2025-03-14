<?php

// If not admin, exit
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	exit();
}

require_once ROOT_PATH . "/db/newsletters.php";
$nl = Newsletter::fetchByEdition(NEWSLETTER_EDITION);

?>

<div style="background-color: white; border: 1px solid black;">
	<h2 style="text-align: left;">Post Details</h2>
	<form action="/db/newsletters.php" method="post">
		<input type="hidden" name="_method" value="PUT"/>
		<div>
			<label>ID</label>
			<input type="text" name="id" value="<?php echo htmlspecialchars($nl->id); ?>" readonly>
		</div>
		<div>
			<label>Title</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($nl->title); ?>">
		</div>
		<div>
			<label>Blurb</label>
			<textarea name="blurb" rows="4" cols="50"><?php echo htmlspecialchars($nl->blurb); ?></textarea>
		</div>  
		<div>
			<label>URL</label>
			<input type="text" name="url" value="<?php echo htmlspecialchars($nl->url); ?>">
		</div>
		<div>
			<label>Image URL</label>
			<input type="text" name="img_url" value="<?php echo htmlspecialchars($nl->img_url); ?>">
		</div>
		<div>
			<label>Edition</label>
			<input type="date" name="edition"  value="<?php echo htmlspecialchars($nl->edition); ?>">
		</div>
		<div>
			<label>Author</label>
			<input type="text" name="author"  value="<?php echo htmlspecialchars($nl->author); ?>">
		</div>
		<div>
			<label>Published</label>
			<input type="checkbox" name="published" value="true" <?php echo ($nl->published? 'checked' : '') ?>>
		</div>
		<div>
			<label>Published Date</label>
			<input type="date" name="published_date" value=<?php echo htmlspecialchars($nl->published_date); ?>>
		</div>
		<div>
			<label for="content_html">HTML Content</label>
			<textarea name="content_html" id="content_html" rows="40" cols="80"><?php echo htmlspecialchars(trim($nl->content_html)); ?></textarea>
		</div>
		<div>
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		</div>
	</form>
</div>