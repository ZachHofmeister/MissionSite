<div class="navbar" id="navbar">
	<a href="/"><div class="navbar-link navbar-title">
		Zach's Mission Updates
	</div></a>

	<div onClick="return true" class="navbar-link navbar-toggle">
		<i class="fa fa-bars"></i><div>M</div>
	</div>

	<nav class="navbar-items">
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
				if ($_SESSION["is_admin"]) {
					echo "
					<a href='/admin.php'><div class='navbar-link'>
						Admin Panel
					</div></a>
					";
				}
				echo "
				<a href='/logout.php'><div class='navbar-link'>
					Logout
				</div></a>
				";
			}
		?>
	</nav>
</div>

<!-- JAVASCRIPT -->
<script src="/js/navbar.js"></script>