<?php
    include '/model/'.$add_controller.'.php';
    $model = new $add_controller;
    
    $add_tpl = 'logout';
    
    session_destroy();
    
    header('Location: ../')
?>