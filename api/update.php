<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../movies.php';

$database = new Database();
$db = $database->getConnection();
$item = new Movie($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->title = $_GET['title'];
$item->description = $_GET['description'];
$item->genre = $_GET['genre'];
$item->release_date = date('Y-m-d H:i:s');
if($item->updateMovie()){
echo json_encode("Movie data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>

