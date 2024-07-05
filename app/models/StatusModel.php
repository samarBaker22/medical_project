<?php
class StatusModel{
    private $db;
    public $id,$drugs,$analysis,$illness;
    public function __construct($db){
        $this->db=$db;
    }
    public function getstid(){
        return $this->db->get("status",null,"id");
    }

   

    public function getstatusbyid($dates_id){
        return $this->db->where("dates_id",$dates_id)->get("status");   
    }
    public function addstatus($data){
        return $this->db->insert('status',$data);
    }
    public function deletestatus($stid){
    return $this->db->where("id",$stid)->delete("status");

    }
}