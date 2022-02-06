<?php

    include_once '../../config/Database.php';

    $customer_id = $_POST['id'];
    $customer_email = $_POST['email'];
    $customer_topic = $_POST['topic'];
    $customer_msg = $_POST['message'];

    $pdo = new PDO('mysql:host=localhost;dbname=hoteldb','root12345','root12345');



    $sql = "INSERT INTO contact_form (customer_id,customer_email,topic,message) VALUES ({$customer_id},'{$customer_email}','{$customer_topic}','{$customer_msg}');";
    $stmt= $pdo->prepare($sql);

    if($stmt->execute()){
        echo "Inserted Successfully";
    }
    else{
        echo "Error happened";
    }

?>
