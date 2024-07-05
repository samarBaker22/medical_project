<?php
require __DIR__.'/../models/StatusModel.php';


class StatusController{
    private $model;
public function __construct($db){
    $this->model=new StatusModel($db);
}

private function jsonResponse($data){
       
    header("Content-Type:application/json");
   
    echo json_encode($data);

}
public function getuserstatus($id){
    $usersta=$this->model-> getstatusbyid($id);
   return $this-> jsonResponse($usersta);
}

public function addStatus(){
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $dates_id=$_POST["dates_id"];
        $drugs=$_POST["drugs"];
        $analysis=$_POST["analysis"];
        $illness=$_POST["illness"];

        if($this->model-> getstatusbyid($dates_id))
        return  $this->jsonResponse(["msg"=>"status already exist"]);
       else{

        $stdata=
        ["dates_id"=>$dates_id ,
        "drugs"=>$drugs,
        "analysis"=>$analysis,
        "illness"=>$illness];
       

       if( $this->model->addstatus($stdata))
     return  $this->jsonResponse(["msg"=>"status added succesfully"]);
    else  return $this-> json_encode(["err"=>"error"]);
    }}
}
public function DeleteStatus($stid){
    if($this->model->deletestatus($stid))
   return $this->jsonResponse(["msg"=>"status deleted succesfully"]);
    else return   $this->jsonResponse(["err"=>"error"]);

}
}