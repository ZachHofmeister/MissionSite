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
		// check if published or not + filter convert to boolean int
		$published = isset($arr["published"])? (int)filter_var($arr["published"], FILTER_VALIDATE_BOOLEAN) : 0;
		return new Newsletter(
			$arr["id"], 
			$arr["title"], 
			$arr["blurb"], 
			$arr["url"], 
			$arr["img_url"], 
			$arr["edition"], 
			$arr["author"], 
			$published,
			$arr["published_date"]
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

	// Database Functions

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

	// Update the newsletter in the database
	public function update() {
		require_once "database.php";
		$db = new Database();

		$sql = 'UPDATE newsletters
			SET title=?, blurb=?, url=?, img_url=?, edition=?, author=?, published=?, published_date=?
			WHERE id=?';
		$args = array($this->title, $this->blurb, $this->url, $this->img_url, $this->edition, $this->author, $this->published, $this->published_date, $this->id);
		$stmt = $db->run($sql, $args);
		return $stmt->errno? false : true; // return false if there's an error, true otherwise
	}
}

function getAllNewsletters($only_published = true) {
	require_once "database.php";
	$db = new Database();

	$sql = 'SELECT *, DATE_FORMAT(published_date, "%m/%d/%Y") AS nice_date
		FROM newsletters'.($only_published? ' WHERE published = 1 ': ' ').'ORDER BY published_date DESC';
	$stmt = $db->run($sql);
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		$newsletters = $result->fetch_all(MYSQLI_ASSOC);
		return $newsletters;
	} else {
		echo "Error: could not fetch any newsletters";
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // HTML only supports GET and POST
	if ($_POST["_method"] == "PUT") {
		// Update newsletter
		$newsletter = Newsletter::fromArray($_POST);
		// echo $newsletter->published;

		// Attempt to update newsletter
		if($newsletter->update()) {
			// Redirect back to editing newsletter
			header("location: ".$newsletter->getUrl()."&editing=1");
		} else {
			echo "Oops! Something went wrong. Please try again later.";
		}
	}
}

?>