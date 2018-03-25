<?php
define('HOST', 'localhost');    // адрес сервера 
define('DATABASE', 'maranello');   // имя базы данных
define('USER', 'root'); 	// имя пользователя
define('PASSWORD', '');		// пароль

//Основные константы
define('DIR_ROOT', __DIR__ . '/');
define('VIEW', DIR_ROOT .'/view/default/');
define('HTTP_SERVER', 'http://maranello');

define('LIBS', $_SERVER['DOCUMENT_ROOT'] . '/libs');
define('IMAGE', HTTP_SERVER .'/img/');
define('NOIMAGE', HTTP_SERVER .'/img/no_image.png');
?>