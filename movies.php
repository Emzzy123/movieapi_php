<?php
class Movie{
// dbsection
private $db;
// Table
private $db_table = "movie";
// Columns
public $id;
public $title;
public $description;
public $genre;
public $release_date;
public $result;



// Db dbsection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getMovies(){
$sqlQuery = "SELECT id, title, description, genre, release_date FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createMovie(){
// sanitize
$this->title=htmlspecialchars(strip_tags($this->title));
$this->description=htmlspecialchars(strip_tags($this->description));
$this->genre=htmlspecialchars(strip_tags($this->genre));
$this->release_date=htmlspecialchars(strip_tags($this->release_date));

$sqlQuery = "INSERT INTO
". $this->db_table ." SET title = '".$this->title."',
description = '".$this->description."',
genre = '".$this->genre."',release_date = '".$this->release_date."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleMovie(){
$sqlQuery = "SELECT id, title, description, genre, release_date FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->title = $dataRow['title'];
$this->description = $dataRow['description'];
$this->genre = $dataRow['genre'];
$this->release_date = $dataRow['release_date'];
}

// UPDATE
public function updateMovie(){
$this->title=htmlspecialchars(strip_tags($this->title));
$this->description=htmlspecialchars(strip_tags($this->description));
$this->genre=htmlspecialchars(strip_tags($this->genre));
$this->release_date=htmlspecialchars(strip_tags($this->release_date));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET title = '".$this->title."',
description = '".$this->description."',
genre = '".$this->genre."', release_date = '".$this->release_date."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteMovie(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>