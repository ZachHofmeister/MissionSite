<div class="section post-container" id="recent-posts">
	<?php
		require_once ROOT_PATH . "/db/newsletters.php";
		$newsletters = getAllNewsletters();

		foreach($newsletters as $row) {
			$nl_url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $row['edition'])->format('Y-m');
			echo '
				<a href="' . $nl_url . '">
					<div class="post">
						<img class="post-img" src="' . $row['img_url'] . '" alt="">
						<div class="post-body">
							<h2 class="post-title">' . $row['title'] . '</h2>
							<h6 class="post-details">Published ' . $row['nice_date'] . ' by ' . $row['author'] . '</h6>
							<p class="post-blurb">
								' . $row['blurb'] . '
								<strong>...</strong>
							</p>
						</div>
					</div>
				</a>
			';
		}
	?>
</div>