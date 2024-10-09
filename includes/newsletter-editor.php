<?php

// If not admin, exit
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
	exit();
}

require_once ROOT_PATH . "/db/newsletters.php";
$newsletter = Newsletter::fetchByEdition(NEWSLETTER_EDITION);

?>

<div style="background-color: white; border: 1px solid black;">
	<h2 style="text-align: left;">Post Details</h2>
	<form action="/db/newsletters.php" method="post">
		<input type="hidden" name="_method" value="PUT"/>
		<div>
			<label>ID</label>
			<input type="text" name="id" value="<?php echo $newsletter->id; ?>" readonly>
		</div>
		<div>
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $newsletter->title; ?>">
		</div>
		<div>
			<label>Blurb</label>
			<textarea name="blurb" rows="4" cols="50"><?php echo $newsletter->blurb; ?></textarea>
		</div>  
		<div>
			<label>URL</label>
			<input type="text" name="url" value="<?php echo $newsletter->url; ?>">
		</div>
		<div>
			<label>Image URL</label>
			<input type="text" name="img_url" value="<?php echo $newsletter->img_url; ?>">
		</div>
		<div>
			<label>Edition</label>
			<input type="date" name="edition"  value="<?php echo $newsletter->edition; ?>">
		</div>
		<div>
			<label>Author</label>
			<input type="text" name="author"  value="<?php echo $newsletter->author; ?>">
		</div>
		<div>
			<label>Published</label>
			<input type="checkbox" name="published" value="true" <?php echo ($newsletter->published? 'checked' : '') ?>>
		</div>
		<div>
			<label>Published Date</label>
			<input type="date" name="published_date" value=<?php echo $newsletter->published_date; ?>>
		</div>
		<div>
			<label for="content_html">HTML Content</label>
			<textarea name="content_html" id="content_html" rows="40" cols="80"><?php echo trim($newsletter->content_html); ?></textarea>
		</div>
		<div>
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		</div>
	</form>
</div>