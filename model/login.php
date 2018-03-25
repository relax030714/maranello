<?php
class Login extends Database{
    public function GetUser($email, $password){
        return $this->get_one_db("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    }
}
