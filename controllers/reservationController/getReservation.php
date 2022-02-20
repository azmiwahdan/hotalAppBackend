<?php

include_once '../../config/conn.php';


if ( isset($_GET['user_name']) ){

    $user_name = $_GET['user_name'];
    $query = "SELECT * FROM reserved WHERE customer LIKE " . $user_name;
    $result = mysqli_query($conn , $query);    

    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){
        array_push($response , 
        array(
            'room' => $row['room'] , 
            'start_date' => $row['start_date'] , 
            'end_date' => $row['end_date'] )
        );
    }

    if (empty($response)){
        echo json_encode(null);
    }
    else{
        echo json_encode($response);
    }

}



mysqli_close($conn);

?>