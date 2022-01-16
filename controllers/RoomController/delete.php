<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../config/Database.php';
include_once '../../services/RoomService.php';

$database = new Database();
$db = $database->getConnection();//data base connection
 

$service= new RoomService($db); 
$room = json_decode(file_get_contents("php://input"));

if(!empty($room->room_id)) {
	$service->room_id = $room->room_id;
	if($service->deleteRoom()){    
		http_response_code(200); 
		echo json_encode(array("message" => "Room was deleted."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to delete Room."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to delete Room. Data is incomplete."));
}
?>