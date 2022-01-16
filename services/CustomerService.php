<?php
class CustomerService{   
    private $table = "customer";   
    public  $customer_id ;
	public 	$customer_name 	;
	public	$customer_username;	 	
	public  $customer_password 	;
	public  $customer_visa 	;
	public 	$customer_phone ;
    public  $dateOfBirth;
    private $conn;



    public function __construct($db){
        $this->conn = $db;
    }	
	
	function getAllCustomers(){	
		if($this->customer_id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE customer_id = ?");
			$stmt->bind_param("i", $this->customer_id);	
		}else{
		
    	$stmt = $this->conn->prepare("SELECT * FROM ".$this->table);		
			}	
			$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}

	

	
	
	function insertCustomer(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->table."(`customer_name`, `customer_username`, `customer_password`, `customer_visa`,`customer_phone`,`dateOfBirth`)
			VALUES(?,?,?,?,?,?)");
		
		$stmt->bind_param("ssssss", $this->customer_name, $this->customer_username,
		 $this->customer_password, $this->customer_visa,$this->customer_phone,$this->dateOfBirth);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}


	function deleteCustomer(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->table." 
			WHERE customer_id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->customer_id));
	 
		$stmt->bind_param("i", $this->customer_id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>