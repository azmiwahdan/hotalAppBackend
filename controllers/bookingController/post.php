<?php

    include_once '../../config/Database.php';
        $customer = $_POST['customer'];
        $room = $_POST['room'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $customer_message = $_POST['customer_message'];

        $pdo = new PDO('mysql:host=localhost;dbname=hotelDB','azmiDB','root');

        $sql = "INSERT INTO reservations (customer,room,start_date,end_date,customer_message) values ({$customer},{$room},'{$start_date}','{$end_date}','{$customer_message}');";
        $stmt= $pdo->prepare($sql);

        if($stmt->execute()){
            $sql_update = "UPDATE room SET room_reserve = 'true' WHERE room_id = {$room}";
            $stmt_update = $pdo->prepare($sql_update);
            if($stmt_update->execute()){
                echo "Inserted Successfully";
            }
            else{
                echo "Error";
            }
        }
        else{
           echo "Error";
        }

        
        

    
?>