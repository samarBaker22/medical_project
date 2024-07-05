<?php




require_once __DIR__ . '/lib/DB/MysqliDb.php';
require __DIR__ . '/app/controllers/StatusController.php';
require_once __DIR__ . '/app/controllers/DateController.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);
$request = $_SERVER['REQUEST_URI'];
$StatusController= new StatusController($db);
$DateController= new DateController($db);
define('BASE_PATH', '/');
switch ($request) {
    case BASE_PATH."status/add":
    $StatusController->addStatus();
   
    break;
 
        
       
    case BASE_PATH.'status/show?id='.$_GET['id'] :
         $StatusController->getuserstatus($_GET['id']);
       break;
     case BASE_PATH.'status/delete?id='.$_GET['id']:
           $StatusController->DeleteStatus($_GET['id']);
        break;
    case BASE_PATH.'date/add':
        $DateController->addDates();
        break;
    case BASE_PATH.'date/delete?id='.$_GET['id']:
        $DateController->deleteDate($_GET['id']);
        break;
    case BASE_PATH."date/userbooking?id".$_GET['id']:
        $DateController->GetUserBooking($_GET['id']);
        break;
    case BASE_PATH."date/docbooking?id".$_GET['id']:
        $DateController-> GetDoctorBooking($_GET['id']);
        break;
    default:
    break;
           
}

