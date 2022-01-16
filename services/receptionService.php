<?php
class receptionService{   
    
    private $table = "receptionist";
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function getReceptions(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id = ?");
			$stmt->bind_param("i", $this->id);	
		}else{
		$stmt = $this->conn->prepare("SELECT * FROM ".$this->table);	
		}	
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
}
?>