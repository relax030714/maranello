<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

//Проверка прав
if($_SESSION['status'] == 3){

// Конфиг сайта
require_once '/config.php';
require_once '../libs/database.php';
require_once '../libs/route.php';
$path_obj = new My_rout;

//получим имя нужного контроллера
if(isset($_GET['_route_'])){
    $add_controller = $path_obj->get_controller($_GET['_route_']);
}
else{
    $add_controller = 'main';  
}
//эта функция просто включит необходимые контроллеры и шаблоны верстки в текущий скрипт
$path_obj->includder($add_controller);

//редирект на вход, если нет прав
} else {
    header('Location: ../login');
}
