<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../config/Database.php';
include_once '../../services/bookingService.php';

$database = new Database();
$db = $database->getConnection();//data base connection
 

$service= new bookingService($db); 
$book = json_decode(file_get_contents("php://input"));

if(!empty($book->book_id)) {
	$service->book_id = $book->book_id;
	if($service->cancelReservation()){    
		http_response_code(200); 
		echo json_encode(array("message" => "book was cancled."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to cancel booking."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to cancel booking. Data is incomplete."));
}
?>