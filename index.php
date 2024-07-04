<?php
use app\controllers\ratecontrol;
require_once  __DIR__ . '/config/config.php';
require_once  __DIR__ . '/vendor/lib/MysqliDb.php';
require_once  __DIR__ . '/app/controllers/ratecontrol.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name'],
);

$request = $_SERVER['REQUEST_URI'];
 
define('BASE_PATH', '/');

$controller = new ratecontrol($db);
switch ($request) {
    case BASE_PATH:
        $controllers->index();
        break;
    case BASE_PATH . 'addrate':
        $controllers->addrate();
        break;
    
    case BASE_PATH . 'updaterate?id=' . $_GET['id']:
             $controllers->updaterate($_GET['id']);
            break;

    case BASE_PATH . 'getratebydoctor_id?doctor_id='.$_GET['doctor_id']:
             $controller->getratebydoctor_id($_GET['doctor_id']);
                break;   
                
    case BASE_PATH . 'getratebyid?doctor_id='.$_GET['doctor_id'].'user-id='.$_GET['user_id'].'':
             $controller->getratebyid($_GET['doctor_id'],$_GET['user_id']);
              break; 
   
   }

?>