<div class="section" id="recent-posts">
	<?php
		$query = 'SELECT *, DATE_FORMAT(published_date, "%M %d, %Y") AS nice_date
			FROM newsletters
			WHERE published = 1
			ORDER BY published_date DESC';
		$result = $conn->query($query);
		$newsletters = $result->fetch_all(MYSQLI_ASSOC);

		foreach($newsletters as $row) {
			echo '
				<a href="' . $row['url'] . '">
					<div class="post" data-href="' . $row['url'] . '">
						<div class="post-body">
							<h2 class="post-title">' . $row['title'] . '</h2>
							<h6 class="post-details">Published ' . $row['nice_date'] . ' by ' . $row['author'] . '</h6>
							<p class="post-preview">
								' . $row['desc'] . '
								<strong>...</strong>
							</p>
						</div>
						<img class="post-img" src="' . $row['img_url'] . '" alt="">
					</div>
				</a>
			';
		}
	?>
</div>