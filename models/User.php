<?php

class User{
    public $id;
    public $nome_usuario;
    public $email;
    public $senha;
    public $is_admin;



    public function setName($n){
        $this->nome_usuario = $n;
    }

    public function getName(){
        return $this->nome_usuario;
    }

    public function setEmail($e){
        $this->email = $e;
    }

    public function getEmail(){
        return $this->email;
    }


    public function setPassword($p){
        $this->senha = $p;
    }

    public function getPassword(){
        return $this->senha;
    }

    public function setAdmin($a){
        $this->is_admin = $a;
    }

    public function getAdmin(){
        return $this->is_admin;
    }



}



interface UserDao{
    public function findByEmail($email);
    public function create(User $u);
    public function IsAdmin();
}



?>