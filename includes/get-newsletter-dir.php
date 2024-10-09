<?php 
// Include config file
require_once(__DIR__.'/../config.php');

//Provides a verified NEWSLETTER_DIR constant
function isValidDate($date, $format = 'Y-m-d') {
	// echo $_GET['date'] . '<br>';
	//HOTFIX: appending day to format and day of 01 to the date, fix for the 'feb 30' bug
	$d = DateTime::createFromFormat($format, $date . '-01');
	// echo $d->format('Y-m-d');;
	return $d && $d->format($format) === $date . '-01'; //HOTFIX cont
}

//Check if date param is a string in valid format (YYYY-mm)
if (!isValidDate($_GET['date'])) {
	echo '<h3 style="color:red !important;">Error: invalid date!</h3>';
	return;
}
$date = DateTime::createFromFormat('Y-m-d', datetime: $_GET['date'] . '-01'); //HOTFIX cont
$date_str = $date->format('Y/m');
$newsletter_dir = ROOT_PATH . '/' . $date_str;
//Check if there is a valid path to newsletter dir
if (!file_exists($newsletter_dir)) {
	echo '<h3 style="color:red !important;">Error: a newsletter for ' . $date_str . ' does not exist!</h3>';
	return;
}
// echo '<h1 style="color:white;">' . '/' . $date->format('Y/m') . '/include.php' . '</h1>' ;
define('NEWSLETTER_EDITION', $date->format('Y-m-d'));
define('NEWSLETTER_DIR', $newsletter_dir);
define('NEWSLETTER_DIR_REL', '/' . $date_str);
?>