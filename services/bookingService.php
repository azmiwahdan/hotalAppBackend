<?php
class bookingService{   
    
    private $table ="reservations";   
    public $book_id;   
    public $customer;
	public $room;
	public $start_date;
	public $end_date;


    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function getAllBooking(){	

		if($this->book_id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE book_id = ?");
			$stmt->bind_param("i", $this->book_id);	
		}else{
		
			$stmt = $this->conn->prepare("SELECT * FROM reservations");		
		}
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}


	
	function book_room(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->table."(`customer`, `room`, `start_date`, `end_date`)
			VALUES(?,?,?,?)");
		
		$stmt->bind_param("iiss", $this->customer, $this->room,
		 $this->start_date, $this->end_date);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}


	
	function cancelReservation(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->table." 
			WHERE book_id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->book_id));
	 
		$stmt->bind_param("i", $this->book_id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
	
	
	



	
}
?>