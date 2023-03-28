<?php

require '../config.php';
require_once '../dao/DesenhosDaoMySql.php';
require_once '../models/Desenhos.php';

if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}

$name = filter_input(INPUT_POST,'name');
$CatDao = new CategoriaDaoMySql($pdo);

if ($name) {
    $novaCat = new Categoria();
    $novaCat->setNomeCategoria($name);
    $CatDao->create($novaCat);
    header('Location:adicionar_categoria.php');
    

}else{
    header('Location:index.php');
}

?>