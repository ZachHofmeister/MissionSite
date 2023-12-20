<nav class="navbar" id="navbar">
	<a href="/"><div class="navbar-link navbar-title">
		Zach's Mission Updates
	</div></a>

	<div class="navbar-link navbar-toggle">
		<div><i class="fa fa-bars"></i></div>
	</div>

	<div class="navbar-items">
		<a href="/resources.php"><div class="navbar-link">
			Resources
		</div></a>
		<?php
			// If logged in
			if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) {
				echo "
				<a href='/account.php'><div class='navbar-link'>
					Account
				</div></a>
				";
			}
		?>
	</div>
</nav>

<!-- JAVASCRIPT -->
<script src="/js/navbar.js"></script>