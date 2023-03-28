<?php
require_once '../dao/UserDaoMySql.php';
require_once '../models/User.php';
require '../config.php';
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');
$verify_password = filter_input(INPUT_POST,'verify_password');


$userDao = new UserDAOMySql($pdo);
$newUser = new User(); 
if ($name && $email && $password && $verify_password) {
    if ($password == $verify_password) {
        if ($userDao->findByEmail($email) === false) {
            $newUser->setName($name);
            $newUser->setEmail($email);
            $newUser->setPassword($password);
            $userDao->create($newUser);
           
           

            header('Location:login.php');
            

        }else{
            header('Location:register.php');
        }
    }else{
        header('Location:register.php');
    }
}else{
    header('Location:register.php');
}



?>