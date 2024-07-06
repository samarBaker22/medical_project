<?php
namespace app\models;

class rateModel{
    private $db;
    public function __construct($db){
        $this->db = $db; 
    }
    public function getRatebyid($doctors_id,$user_id){
        return $this->db->where ('doctors_id',$doctors_id )->where( 'user_id',$user_id)->get('rate');
    }

public function getRatebydoctor_id($doctors_id){
    return $this->db->where ('doctors_id',$doctors_id )->get('rate');
}
    public function addRate($data) {
        return $this->db->insert('rate',$data);

    }

    public function updateRate($id,$data) {
        $this->db->where('id',$id);
        return $this->db->update('rate',$data);
}

}





?>