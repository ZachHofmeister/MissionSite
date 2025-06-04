<?php
// Require config file
require_once(__DIR__.'/../config.php');

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
	public $content_html;

	function __construct($id, $title, $blurb, $url, $img_url, $edition, $author, $published, $published_date, $content_html) {
		$this->id = $id;
		$this->title = $title?? "";
		$this->blurb = $blurb?? "";
		$this->url = $url?? "";
		$this->img_url = $img_url?? "";
		$this->edition = $edition?? "2000-01-01";
		$this->author = $author?? "";
		$this->published = $published;
		$this->published_date = $published_date?? "2000-01-01";
		$this->content_html = $content_html?? "";
	}

	// Create from database row
	public static function fromArray($arr) {
		// check if published or not + filter convert to boolean int
		return new Newsletter(
			$arr["id"] ?? "", 
			$arr["title"] ?? "", 
			$arr["blurb"]?? "", 
			$arr["url"] ?? "", 
			$arr["img_url"] ?? "", 
			$arr["edition"] ?? "", 
			$arr["author"] ?? "", 
			(int)filter_var($arr["published"], FILTER_VALIDATE_BOOLEAN) ?? 0,
			$arr["published_date"] ?? "",
			$arr["content_html"] ?? ""
		);
	}

	// Create from json
	public static function fromJson($json) {
		return Newsletter::fromArray(json_decode($json, true)); //true means decode to an array
	} 

	function toJson() {
		return json_encode($this);
	}

	function getUrl() {
		$url = '/newsletter.php?date=' . DateTime::createFromFormat('Y-m-d', $this->edition)->format('Y-m');
		return $url;
	}

	// Returns published date in American format
	function prettyDate() {
		$date_to_use = $this->edition;
		if ($this->published) {
			$date_to_use = $this->published_date;
		}
		$date = DateTime::createFromFormat('Y-m-d', $date_to_use);
		return $date->format("m/d/Y");
	}

	// Database Functions

	// GET newsletter from database, by edition
	public static function fetchByEdition ($edition): ?Newsletter {
		$db = Database::getInstance();

		$sql = 'SELECT *
			FROM newsletters
			WHERE edition = ?';
		$args = array($edition);
		$stmt = $db->run($sql, $args);
		if (!$stmt) {
			throw new Exception("fetchByEdition: Database query failed");
		}
		$result = $stmt->get_result();
		if ($result && $result->num_rows > 0) {
			return Newsletter::fromArray($result->fetch_assoc());
		}

		return null;
	}

	// PUT update the newsletter in the database
	public function update() {
		$db = Database::getInstance();

		$sql = 'UPDATE newsletters
			SET title=?, blurb=?, url=?, img_url=?, edition=?, author=?, published=?, published_date=?, content_html=?
			WHERE id=?';
		$args = array($this->title, $this->blurb, $this->url, $this->img_url, $this->edition, $this->author, $this->published, $this->published_date, $this->content_html, $this->id);
		$stmt = $db->run($sql, $args);
		return $stmt->errno? false : true; // return false if there's an error, true otherwise
	}

	public function delete() {
		$db = Database::getInstance();

		$sql = 'DELETE FROM newsletters
			WHERE id=?';
		$args = array($this->id);
		$stmt = $db->run($sql, $args);
		return $stmt->errno? false : true; // return false if there's an error, true otherwise
	}
}

// function debug_to_console($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }

// GET all newsletters from database
function getAllNewsletters($only_published = true) {
	$db = Database::getInstance();

	$sql = 'SELECT * FROM newsletters'
		.($only_published? ' WHERE published = 1 ': ' ')
		.'ORDER BY published_date DESC';
	$stmt = $db->run($sql);
	$result = $stmt->get_result();
	$newsletters = array();
	if ($result->num_rows > 0) {
		$newsletters_raw = $result->fetch_all(MYSQLI_ASSOC);
		foreach($newsletters_raw as $row) {
			// array_push($newsletters, values: Newsletter::fromArray($row));
			$newsletters[] = Newsletter::fromArray($row);
		}
	} else {
		echo "Error: could not fetch any newsletters";
	}
	return $newsletters;
}

function getAllNewslettersAPI() {
	$url = "http://localhost:3300";
	$endpoint = "/db/newsletter-api.php";
	$ch = curl_init($url . $endpoint);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);

	$response = curl_exec($ch);

	$newsletters = array();
	if ($response === false) {
		echo "GET Request Failed: " . curl_error($ch);
		//Fallback on getAllNewsletters function for now
		$newsletters = getAllNewsletters();
	} else {
		$data = json_decode($response, true);
		foreach($data as $row) {
			// array_push($newsletters, values: Newsletter::fromArray($row));
			$newsletters[] = Newsletter::fromArray($row);
		}
	}
	curl_close($ch);
	return $newsletters;
}

// POST a new newsletter to the database
function createNewsletter() {
	$db = Database::getInstance();
	//TODO: This should be a prepared statement

	$sql = 'INSERT INTO newsletters (title) VALUES (\'New Newsletter\')';
	$stmt = $db->run($sql);
	// If no error in creation
	return $stmt->errno == 0; //return true if there is no error
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // HTML form only supports GET and POST
	// If not admin, exit
	if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
		exit();
	}
	if (isset($_POST["_method"])) {
		if ($_POST["_method"] == "PUT") {
			// Update newsletter

			$newsletter = Newsletter::fromArray($_POST);
			// Attempt to update newsletter
			if($newsletter->update()) {
				// Redirect back to editing newsletter
				header("location: ".$newsletter->getUrl()."&editing=1");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		} else if ($_POST["_method"] == "DELETE") {
			// Delete newsletter
			$newsletter = Newsletter::fromArray($_POST);
			// Attempt to delete newsletter
			if($newsletter->delete()) {
				header("location: /admin.php");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
	} else { //else, actually a POST
		// Attempt to create a newsletter
		if(createNewsletter()) {
			// Redirect back to admin page
			header("location: /admin.php");
		} else {
			echo "Oops! Something went wrong. Please try again later.";
		}
	}
}

?>