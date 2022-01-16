    <?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");// this ti retusn jason data.

    include_once '../../config/Database.php';
    include_once '../../services/receptionService.php';

    $database = new Database();
    $db = $database->getConnection();//data base connection

    $service = new receptionService($db);// sevice
    $service->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';


    $result = $service->getReceptions();

    if($result->num_rows > 0){
        $receptionistList=array();
        $receptionistList["receptionist"]=array();
        while ($reception = $result->fetch_assoc()) {
            extract($reception);
            $receptionistFields=array(

                "id" => $id,
                "name" => $name,
                "username" => $username ,
                "password" => $password  ,
                "email" => $email  ,
                "phone" => $phone



            );
           array_push($receptionistList["receptionist"], $receptionistFields);
        }
        http_response_code(200);
        echo json_encode($receptionistList);
    }else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No Receptions found.")
        );
    }