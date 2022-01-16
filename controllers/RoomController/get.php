    <?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");// this ti retusn jason data.

    include_once '../../config/Database.php';
    include_once '../../services/RoomService.php';

    $database = new Database();
    $db = $database->getConnection();//data base connection
    
    $service = new RoomService($db);// sevice
    $service->room_id = (isset($_GET['room_id']) && $_GET['room_id']) ? $_GET['room_id'] : '0';

    $result = $service->getAllRooms();

    if($result->num_rows > 0){    
        $roomsList=array();
        $roomsList["rooms"]=array(); 
        while ($room = $result->fetch_assoc()) { 	
            extract($room); 
            $roomFields=array(
                "room_id" => $room_id,
                "room_number" => $room_number,
                "room_type" => $room_type ,
                "room_price" => $room_price ,
                "imageUrl" => $imageUrl,
                "room_description" => $room_description,
                "room_reserve" => $room_reserve
                    
            ); 
        array_push($roomsList["rooms"], $roomFields);
        }    
        http_response_code(200);     
        echo json_encode($roomsList);
    }else{     
        http_response_code(404);     
        echo json_encode(
            array("message" => "No Room found.")
        );
    } 