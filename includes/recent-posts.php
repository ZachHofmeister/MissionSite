<?php 
// Include config file
require_once(__DIR__.'/../config.php');

require_once ROOT_PATH . "/db/newsletters.php";
$newsletters = getAllNewsletters();
?>

<div class="section post-container" id="recent-posts">
	<?php
		foreach($newsletters as $nl) {
			echo '
				<a href="' . $nl->getUrl() . '">
					<div class="post">
						<img class="post-img" src="' . $nl->img_url . '" alt="">
						<div class="post-body">
							<h2 class="post-title">' . htmlspecialchars($nl->title) . '</h2>
							<h6 class="post-details">Published ' . $nl->prettyDate() . ' by ' . $nl->author . '</h6>
							<p class="post-blurb">
								' . htmlspecialchars($nl->blurb) . '
								<strong>...</strong>
							</p>
						</div>
					</div>
				</a>
			';
		}
	?>
</div>