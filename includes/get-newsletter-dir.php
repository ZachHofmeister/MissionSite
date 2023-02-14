<?php
	require_once('config.php');
	//Provides a verified NEWSLETTER_DIR constant
	function isValidDate($date, $format = 'Y-m') {
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) === $date;
	}
	//Check if date param is a string in valid format (YYYY-mm)
	if (!isValidDate($_GET['date'])) {
		echo '<h3 style="color:red !important;">Error: invalid date!</h3>';
		return;
	}
	$date = DateTime::createFromFormat('Y-m', $_GET['date']);
	$date_str = $date->format('Y/m');
	$newsletter_dir = ROOT_PATH . '/' . $date_str;
	//Check if there is a valid path to newsletter dir
	if (!file_exists($newsletter_dir)) {
		echo '<h3 style="color:red !important;">Error: a newsletter for ' . $date_str . ' does not exist!</h3>';
		return;
	}
	// echo '<h1 style="color:white;">' . '/' . $date->format('Y/m') . '/include.php' . '</h1>' ;
	define('NEWSLETTER_DIR', $newsletter_dir);
	define('NEWSLETTER_DIR_REL', '/' . $date_str);
?>