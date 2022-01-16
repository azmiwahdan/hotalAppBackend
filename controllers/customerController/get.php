<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");// this ti retusn jason data.

include_once '../../config/Database.php';
include_once '../../services/CustomerService.php';

$database = new Database();
$db = $database->getConnection();//data base connection
 
$service = new CustomerService($db);// sevice
$service->customer_id = (isset($_GET['customer_id']) && $_GET['customer_id']) ? $_GET['customer_id'] : '0';


$result = $service->getAllCustomers();

if($result->num_rows > 0){    
    $customersList=array();
    $customersList["customers"]=array(); 
	while ($customer = $result->fetch_assoc()) { 	
        extract($customer); 
        $customerFields=array(
            "customer_id" => $customer_id ,
            "customer_name" => $customer_name,
            "customer_username" => $customer_username ,
            "customer_password" => $customer_password ,
            "customer_visa" => $customer_visa,
            "customer_phone" => $customer_phone,
            "dateOfBirth" => $dateOfBirth

           		
        ); 
       array_push($customersList["customers"], $customerFields);
    }    
    http_response_code(200);     
    echo json_encode($customersList);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No customer found.")
    );
} 