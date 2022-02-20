<?php

    include_once '../../config/Database.php';

    $customer_username = $_POST['username'];
    $customer_password = $_POST['password'];

    $pdo = new PDO('mysql:host=localhost;dbname=hoteldb','root12345','root12345');



    $sql = "UPDATE customer SET customer_password = '{$customer_password}' WHERE customer_username = '{$customer_username}'";
    $stmt= $pdo->prepare($sql);

    if($stmt->execute()){
        echo "Updated Successfully";
    }
    else{
        echo "Error happened";
    }

?>
