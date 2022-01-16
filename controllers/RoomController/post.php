<?php


	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$room_number = isset($_POST['room_number']) ? $_POST['room_number'] : "";
		$room_type = isset($_POST['room_type']) ? $_POST['room_type'] : "";
		$room_price = isset($_POST['room_price']) ? $_POST['room_price'] : "";
		$imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl'] : "";
		$room_description = isset($_POST['room_description']) ? $_POST['room_description'] : "";
		$room_reserve = isset($_POST['room_reserve']) ? $_POST['room_reserve'] : "";


		$server_name = "localhost";
		$username = "azmiDB";
		$password = "root";
		$dbname = "hotelDB";

		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "insert into room values (NULL, '" . $room_number . "','" . $room_type . "','" . $room_price . "','" . $imageUrl . "','" . $room_description ."',".$room_reserve . ")";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}


?>