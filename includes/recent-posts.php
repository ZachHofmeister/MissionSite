<div class="section post-container" id="recent-posts">
	<?php
		// $date_format = "%M %d, %Y";
		$query = 'SELECT *, DATE_FORMAT(published_date, "%m/%d/%Y") AS nice_date
			FROM newsletters
			WHERE published = 1
			ORDER BY published_date DESC';
		$result = $conn->query($query);
		$newsletters = $result->fetch_all(MYSQLI_ASSOC);

		foreach($newsletters as $row) {
			$nl_url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $row['edition'])->format('Y-m');
			// echo $nl_url;
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