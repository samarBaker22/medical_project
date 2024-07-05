<?php
class DateModel{
    private $db;
    public $id,$doctors_id,$users_id,$date;
    public function __construct($db){
        $this->db=$db;
    }
    public function getdateid(){
    return $this->db->get("Dates",null,"id");}


    public function getexistdates($Doctors_id,$dates,$time){// لحتى اتاكد انو مافي حجزين عند نفس الدكتور بنفس الوقت
    return $this->db->where("Doctors_id",$Doctors_id)->where("date",$dates)->where("time",$time)->get("dates",1,"date");
    }

    public function addDates($data){
        return $this->db->insert('Dates', $data);
    }

    public function deleteDates($id){
    return $this->db->where("id",$id)->delete('Dates');}


    public function getDatesbyid($id){
        return $this->db->where('id',$id)->get('Dates');
    }
    
    public function getuserdate($users_id){
    return $this->db->where("users_id",$users_id)->get("dates",null,["doctors_id","date"]);
    }
    public function getdoctordate($doctor_id){
        return $this->db->where("doctors_id",$doctor_id)->get("dates",null,["users_id","date"]);
}}
public function getDatesbyid($doc_id,$date){
    return $this->db->where("Doctors_id",$Doctors_id)->where("date",$dates)->get('Dates');
}