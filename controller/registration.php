<?php
include '/model/'.$add_controller.'.php';
$model = new $add_controller;

    if(isset($_POST['name']) && !empty($_POST['name'])){
        if(isset($_POST['surname']) && !empty($_POST['surname'])){
            if(isset($_POST['email']) && !empty($_POST['email'])){
                if(isset($_POST['phone']) && !empty($_POST['phone'])){
                    if(isset($_POST['password']) && !empty($_POST['password'])){
                        if(isset($_POST['password2']) && !empty($_POST['password2'])){
                           $name = $model->save_string($_POST['name']);
                           $surname = $model->save_string($_POST['surname']);
                           $email = $model->save_string($_POST['email']);
                           if(preg_match("/[0-9a-z]+@[a-z]/", $email)){
                                $phone = $model->save_string($_POST['phone']);
                                if(preg_match("/^[0-9]{10,10}+$/", $phone)){
                                    $password = md5($_POST['password']);
                                    $password2 = md5($_POST['password2']);
                                    if($password == $password2){
                                        $model->SetUser($name, $surname, $email, $phone, $password);
                                        header('Location: ../');
                                   }
                               }
                           }
                        }
                    }
                }
            }
        }
    }
?>