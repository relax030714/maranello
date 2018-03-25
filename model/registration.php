<?php
    class Registration extends Database{
        public function SetUser($name, $surname, $email, $phone, $password){
            return $this->insert_to_db("INSERT INTO users(name, surname, email, phone, password) VALUES('$name', '$surname', '$email', '$phone', '$password')");
        }
    }
?>