<?php


	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : "";
		$customer_username = isset($_POST['customer_username']) ? $_POST['customer_username'] : "";
		$customer_password = isset($_POST['customer_password']) ? $_POST['customer_password'] : "";
		$customer_visa = isset($_POST['customer_visa']) ? $_POST['customer_visa'] : "";
		$customer_phone = isset($_POST['customer_phone']) ? $_POST['customer_phone'] : "";
		$dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : "";


		$server_name = "localhost";
		$username = "azmiDB";
		$password = "root";
		$dbname = "hotelDB";

		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "insert into customer values (NULL, '" . $customer_name . "','" . $customer_username . "','" . $customer_password . "','" . $customer_visa . "','" . $customer_phone ."',".$dateOfBirth . ")";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}


?>