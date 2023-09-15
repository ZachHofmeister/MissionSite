<?php
class Newsletter {
	public $id;
	public $title;
	public $blurb;
	public $url;
	public $img_url;
	public $edition;
	public $author;
	public $published;
	public $published_date;

	function __construct($id, $title, $blurb, $url, $img_url, $edition, $author, $published, $published_date) {
		$this->id = $id;
		$this->title = $title;
		$this->blurb = $blurb;
		$this->url = $url;
		$this->img_url = $img_url;
		$this->edition = $edition;
		$this->author = $author;
		$this->published = $published;
		$this->published_date = $published_date;
	}

	// Create from database row
	public static function fromArray($arr) {
		return new Newsletter(
			$arr["id"], 
			$arr["title"], 
			$arr["blurb"], 
			$arr["url"], 
			$arr["img_url"], 
			$arr["edition"], 
			$arr["author"], 
			$arr["published"], 
			$arr["published_date"]
		);
	}

	// Create from json
	public static function fromJson($json) {
		return Newsletter::fromArray(json_decode($json, true)); //true means decode to an array
	} 

	// Retrieve newsletter from db based on edition
	public static function fetchByEdition ($edition) {
		require_once "database.php";
		$db = new Database();

		$sql = 'SELECT *
			FROM newsletters
			WHERE edition = ?';
		$args = array($edition);
		$stmt = $db->run($sql, $args);
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			return Newsletter::fromArray($result->fetch_assoc());
		} else {
			echo "Error: could not fetch any newsletters";
		}
	}

	function toJson() {
		return json_encode($this);
	}
}

function getAllNewsletters() {
	require_once "database.php";
	$db = new Database();

	$sql = 'SELECT *, DATE_FORMAT(published_date, "%m/%d/%Y") AS nice_date
		FROM newsletters
		WHERE published = 1
		ORDER BY published_date DESC';
	$stmt = $db->run($sql);
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		$newsletters = $result->fetch_all(MYSQLI_ASSOC);
		return $newsletters;
	} else {
		echo "Error: could not fetch any newsletters";
	}
}

// Initialize session
// session_start();

// echo dirname(__FILE__, 2)."<br>";

// If not admin, exit
// if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
// 	exit();
// }

// // Constant ROOT_PATH, used for creating paths
// define ('ROOT_PATH', realpath(dirname(__FILE__, 2)));

// // Read paths file to get path to database creds
// $pathsJson = file_get_contents(ROOT_PATH . "/.paths.json");
// $paths = json_decode($pathsJson, true);

// // Read database creds file
// $json = file_get_contents(ROOT_PATH ."/". $paths['creds']); // THIS WILL NEED TO BE CHANGED TO WORK WITH SERVER SETUP
// $creds = json_decode($json, true);

// // Database creds
// $host = $creds['host'] ?? null;
// $user = $creds['username'] ?? null;
// $pass = $creds['password'] ?? null;
// $db = $creds['schema'] ?? null;
// $port = $creds['port'] ?? null;

// // connect to database
// $conn = mysqli_connect($host, $user, $pass, $db, $port);
// if (!$conn) {
// 	die("Error");
// 	// die("Error connecting to database: " . mysqli_connect_error());
// }

// Set content type to JSON
// header("Content-Type:application/json");
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
// 	if (isset($_GET["id"])) {
// 		echo "id";
// 	} else if (isset($_GET["edition"])) {
// 		$edition = $_GET["edition"];
// 		// statement to get by edition
// 		$sql = "SELECT * FROM newsletters WHERE edition = \"".$conn->real_escape_string($edition)."-01\""; //RES escapes special chars, to protect from sql injection
// 		// run the statement
// 		$result = $conn->query($sql);

// 		if ($result->num_rows > 0) {
// 			// Get the row
// 			$row = $result->fetch_assoc();
// 			// echo $row["id"];
// 			// echo "<br>";
// 			// newsletter to store data
// 			$nl = Newsletter::fromArray($row);
// 			// respond with json
// 			echo $nl->toJson();
// 		} else {
// 			echo "Error: edition not found";
// 		}
// 	} else { //Default url
// 		$sql = 'SELECT *, DATE_FORMAT(published_date, "%m/%d/%Y") AS nice_date
// 			FROM newsletters
// 			WHERE published = 1
// 			ORDER BY published_date DESC';
// 		$result = $conn->query($sql);
// 		if ($result->num_rows > 0) {
// 			$newsletters = $result->fetch_all(MYSQLI_ASSOC);
// 			echo json_encode($newsletters);
// 		} else {
// 			echo "Error: could not fetch any newsletters";
// 		}
		
// 	}
// }
// $conn->close();
 
// Newsletter update
// if($_SERVER["REQUEST_METHOD"] == "PUT"){

// 	$id = $_PUT['id'];
// 	$title = $_PUT['title'];
// 	$blurb = $_PUT['blurb'];
// 	$url = $_PUT['url'];
// 	$img_url = $_PUT['img_url'];
// 	$edition = $_PUT['edition'];
// 	$author = $_PUT['author'];
// 	$published = ($_PUT['published'] == 'true'? 1 : 0);
// 	$published_date = $_PUT['published_date'];
	
// 	// Prepare an insert statement
// 	$sql = "UPDATE newsletters SET title=?, blurb=?, url=?, img_url=?, edition=?, author=?, published=?, published_date=? WHERE $id = ?";
		
// 	if($stmt = $conn->prepare($sql)){
// 		// Bind variables to the prepared statement as parameters
// 		$stmt->bind_param("ssssssiss", $param_title, $param_blurb, $param_url, $param_img_url, $param_edition, $param_author, $param_published, $param_published_date, $param_id);
		
// 		// Set parameters
// 		$param_title = $title;
// 		$param_blurb = $blurb;
// 		$param_url = $url;
// 		$param_img_url = $img_url;
// 		$param_edition = $edition;
// 		$param_author = $author;
// 		$param_published = $published;
// 		$param_published_date = $published_date;
// 		$param_id = $id;
		
// 		// Attempt to execute the prepared statement
// 		if($stmt->execute()) {
// 			// header("location: login.php");
// 		} else {
// 			echo "Oops! Something went wrong. Please try again later.";
// 		}

// 		// Close statement
// 		$stmt->close();
// 	}
	
// 	// Close connection
// 	$conn->close();
// }

?>