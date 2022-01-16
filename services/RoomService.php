<?php
class RoomService{   
    
    private $table = "room";      
    public $room_id;
    public $room_number;
    public $room_type;
    public $room_description;
    public $room_price;   
    public $imageUrl ;  
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function getAllRooms(){	

		if($this->room_id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE room_id = ?");
			$stmt->bind_param("i", $this->room_id);	
		}else{
		
			$stmt = $this->conn->prepare("SELECT * FROM  room");		
		}
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	function insertRoom(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->table."(`room_number`, `room_type`, `room_price`,`imageUrl`,`room_description`)
			VALUES(?,?,?,?,?)");		
		$stmt->bind_param("ssiss", $this->room_number, $this->room_type, $this->room_price, $this->imageUrl,$this->room_description);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}



	function deleteRoom(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->table." 
			WHERE room_id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->room_id));
	 
		$stmt->bind_param("i", $this->room_id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}





	
}
?>