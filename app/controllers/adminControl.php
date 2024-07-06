<?php
require __DIR__.'/../models/loginAdmin.php';

class adminControl{
    private $model;

    public function __construct($db){

      $this->model= new loginAdmin($db);

    }
    
    public function jsonResponce($data){
        header("Content-type:application/json");
        echo json_encode($data);
    }

    public function loginAdmin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['name'];
          $email=$_POST['email'];
          $password=$_POST['password'];

          $data=[
            'name' => $name,
            'email' => $email,
            'password'=> $password,
          ];
          if($this->model->loginAdmin($data)){
            
            $this->jsonResponce( ['message'=>'done']);
           
         }else {
            $this->jsonResponce( ['error'=>'not']);
         }
        }
    }
}
?>