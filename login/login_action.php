<?php
require_once '../dao/UserDaoMySql.php';
require_once '../models/User.php';
require '../config.php';

$email = filter_input(INPUT_POST,'email');

$senha = filter_input(INPUT_POST,'password');



$UserDao = new UserDaoMySql($pdo);
$newUser = new User();



if ($email && $senha) {

    $user = $UserDao->findByEmail($email);
    $validar = $UserDao->validateLogin($email, $senha);
    if ($validar) {
        
        $_SESSION['id'] = $validar['id'];
        $_SESSION['admin'] = $validar['is_admin'];

        if ($_SESSION['admin'] == 1) {
            header('Location: ../admin/dashboard.php');
            exit;

        }
        

        
        // Se as credenciais de login forem válidas, redirecione o usuário para a página de índice
        header('Location:../dao/index.php');
        exit;
    } else {
        // Se as credenciais de login forem inválidas, redirecione o usuário de volta para a página de login
        header('Location: login.php');
        exit;
    }
} else {
    // Se o email ou a senha não foram fornecidos, redirecione o usuário de volta para a página de login
    header('Location:login.php');
    exit;
}

?>