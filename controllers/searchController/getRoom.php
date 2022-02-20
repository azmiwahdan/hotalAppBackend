<?php

include_once '../../config/conn.php';


if ( isset($_GET['key']) ){

    $key = $_GET['key'];
    $query = "SELECT * FROM room WHERE room_number LIKE ".$key;
    $result = mysqli_query($conn , $query);    

    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){
        array_push($response , 
        array(
            'room_number' => $row['room_number'],
            'room_type' => $row['room_type'],
            'room_price' => $row['room_price'])
        );
    }

    if (empty($response)){
        echo json_encode(null);
    }
    else{
        echo json_encode($response);
    }

}
else {

    echo json_encode(null);

}

mysqli_close($conn);

?>