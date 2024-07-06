<?php
class loginAdmin {
    
    private $db;
    public function __construct($db){
        $this->db = $db; 
    }
    public function login($name,$email,$password){
        return $this->db->where("name",$name)->where("email",$email)->where("password",$password)->get("admins");        
     
    }
        
    
}
?>