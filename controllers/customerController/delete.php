<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../config/Database.php';
include_once '../../services/CustomerService.php';

$database = new Database();
$db = $database->getConnection();//data base connection
 

$service= new CustomerService($db); 
$customer = json_decode(file_get_contents("php://input"));

if(!empty($customer->customer_id)) { 
	$service->customer_id = $customer->customer_id;
	if($service->deleteCustomer()){    
		http_response_code(200); 
		echo json_encode(array("message" => "CUstomer was deleted."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to delete Customer."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to delete Customer. Data is incomplete."));
}
?>