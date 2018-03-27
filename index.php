<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
require_once '/config.php';
require_once '/libs/database.php';
require_once '/libs/route.php';
$path_obj = new My_rout;

//получим имя нужного контроллера
if(isset($_GET['_route_'])){
    $add_controller = $path_obj->get_controller($_GET['_route_']);
}
else{
    $add_controller = 'categories';  
}
//эта функция просто включит необходимые контроллеры и шаблоны верстки в текущий скрипт
$path_obj->includder($add_controller);
?>
<html>
    <head>
	<meta charset="utf-8">
	<meta name="description" content="Официальный сайт сети пиццерий Maranello, город Харьков.">
	<meta name="keywords" content="Maranello, Маранелла, Маранелло, пиццерия, пицца, pizza, доставка, Харьков, доставка еды, ресторан, кафе">
	<meta name="author" content="Valerii Kovalenko">        
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/categories.css">
        <link rel="stylesheet" href="/css/about.css">
        <link rel="stylesheet" href="/css/registration.css">
        <link rel="stylesheet" href="/css/login.css">
        <link rel="stylesheet" href="/css/one_category.css">
        <link rel="stylesheet" href="/css/one_product.css">
        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Pacifico" rel="stylesheet">
    </head>
    <body>
        
    </body>
</html>