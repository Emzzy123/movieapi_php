<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../movies.php';
$database = new Database();

$db = $database->getConnection();
$items = new Movie($db);
$records = $items->getMovies();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$movieArr = array();
$movieArr["body"] = array();
$movieArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($movieArr["body"], $row);
}
echo json_encode($movieArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>