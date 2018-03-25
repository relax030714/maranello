<?php
    include '/model/'.$add_controller.'.php';
    $model = new $add_controller;

    if(isset($_POST['email']) && isset($_POST['password'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $add_tpl = 'login';
            $email = $model->save_string($_POST['email']);
            $password = md5($_POST['password']);
            $log = $model->GetUser($email, $password);
            if($email == $log['email'] && $password == $log['password'] && $log['status'] == 3){
                $_SESSION['status'] = $log['status'];
                $_SESSION['name'] = $log['name'];
                header('Location: ../');
            }
            else if($email == $log['email'] && $password == $log['password']){
                $_SESSION['status'] = $log['status'];
                $_SESSION['name'] = $log['name'];
                header('Location: ../');
            }
        }
    }