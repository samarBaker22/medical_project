<?php
require __DIR__.'/../models/Datemodel.php';
class DateController{
    private $model;
    public function __construct($db){
        $this->model=new DateModel($db);
    }
    private function jsonResponse($data){
       
        header("Content-Type:application/json");
       
        echo json_encode($data);
    
       }
    public function addDates(){
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            $doc_id=$_POST["doc_id"];
            $user_id=$_POST["user_id"];
            $date=$_POST["date"];
            $time=$_POST["time"];
            if($this->model->getexistdates($doc_id,$date, $time))
              $this-> json_encode(["err"=>"user already exist"]); 
            else{
            $data=
            ["doctor_id"=>$doc_id,
            "user_id"=>$user_id,
            "date"=>$date,
              "time"=>$time];

            if($this->model->addDates($data))
                $this-> json_encode(["msg"=>"booking added successfully"]); 
            else   $this->json_encode(["err"=>"error"]); 
            }
        }
    }


    public function deleteDate($id){
        if($this->model->deleteDates($id)){
            $this-> json_encode(["msg"=>"booking deleted successfully"]);
        }
        else    $this->json_encode(["err"=>"error"]);
    }


    
    public function GetUserBooking($user_id){
        $usdate=$this->model->getuserdate($users_id);
        foreach($usdate as $b ){
            $usdata=["id"=>$b["Doctor_id"],
             "name"=>ارجعيلو ,
             "date"=>$b["date"]];
         }
        $this-> json_encode($usdate);
    }
    public function GetDoctorBooking($Doctor_id){
        $docbooking=$this->model->getdoctordate($Doctor_id);
        foreach($booking as $b ){
           $docdata=["id"=>$b["users_id"],
            "name"=>ارجعيلو ,
            "date"=>$b["date"]];
        }
        $this-> json_encode($docdata);
    }
    public function GetDoctorbookingbyDay($doc_id,$date){
       $daybooking= $this->model->getDatesbyid($doc_id,$date)
       return  $this-> json_encode($daybooking);
    }
}