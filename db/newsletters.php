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

?>