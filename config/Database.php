<?php
class Database{
	private $host  = 'localhost';
    private $user  = 'root12345';
    private $password   = "root12345";

    private $database  = "hoteldb";
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>
