<?php
namespace app\controllers;

require __DIR__.'/../models/rates.php';
use app\models\rateModel;

class rateControl{
    private $model;

    public function __construct($db){

      $this->model= new rateModel($db);

    }

    public function jsonResponce($data){
        header("Content-type:application/json");
        echo json_encode($data);
        
      }
      /*public function index() {
        $users = $this->model->get();
        $this->jsonResponce($rate);
      }*/
      public function addrate() {
        if($_SERVER['REQUEST_METHOD']=='POST') {
           
        
        $id=$_POST['id'];
          $rate=$_POST['rates'];
          $doctor_id=$_POST['doctor_id'];
          $user_id=$_POST['user_id'];
          
          $data= [
            'id' => $id,
            'rates' => $rate,
            'doctor_id'=> $doctor_id,
            'user_id'=>  $user_id,
            
          ];
        
     if($this->model->addRate($data)){
            
             $this->jsonResponce( ['message'=>'done']);
            
          }else {
             $this->jsonResponce( ['error'=>'not']);
          }
        }
      }

      public function updaterate($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=$_POST['id'];
          $rate=$_POST['rates'];
          $doctor_id=$_POST['doctor_id'];
          $user_id=$_POST['user_id'];
            $data = [
                'id' => $id,
                'rates' => $rate,
                'doctor_id'=> $doctor_id,
                'user_id'=>  $user_id,
            ];
    
            if ($this->model->updateRate($id, $data)) {
                
                $this->jsonResponce( ['message'=>'done']);
                
            } else {
              $this->jsonResponce( ['error'=>'not']);
               
            }
        } 
    }
    public function getratebyid($doctor_id,$user_id) {
        header("Content-type:application/json");
        $rate = $this->model->getratebyid($doctor_id,$user_id);
        if($rate){
          return json_encode($rate);
        }else{
          return json_encode(['message'=>'failed to show rate']);
        }
    
       }
       public function getratebydoctor_id($doctor_id) {
        header("Content-type:application/json");
        $rate = $this->model->getratebydoctor_id($doctor_id);
        $avg=array_sum($rate)/count($rate);
        if($avg){
          return json_encode($avg);
        }else{
          return json_encode(['message'=>'failed to show rate']);
        }
    
       }
    
    } 
    
    
    
