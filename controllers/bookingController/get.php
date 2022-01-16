<?php
    header("Access-Control-Allow-Origin: *");

    include_once '../../config/Database.php';
    include_once '../../services/bookingService.php';

    $database = new Database();
    $db = $database->getConnection();//data base connection
    
    $service = new bookingService($db);// sevice
    $service->book_id = (isset($_GET['book_id']) && $_GET['book_id']) ? $_GET['book_id'] : '0';

    $result = $service->getAllBooking();

    if($result->num_rows > 0){    
        $bookingList=array();
        $bookingList["bookings"]=array(); 
        while ($book = $result->fetch_assoc()) { 	
            extract($book); 
            $bookFields=array(
                "book_id" => $book_id,
                "customer" => $customer,
                "room" => $room ,
                "start_date" => $start_date ,
                "end_date" => $end_date ,
                "customer_message" => $customer_message);
                 array_push($bookingList["bookings"], $bookFields);
        }    
        http_response_code(200);     
        echo json_encode($bookingList);
    }else{     
        http_response_code(404);     
        echo json_encode(
            array("message" => "No reservation found.")
        );
    } 