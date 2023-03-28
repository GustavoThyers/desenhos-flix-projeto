<?php

require '../config.php';
require_once '../dao/DesenhosDaoMySql.php';
require_once '../models/Desenhos.php';

if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <title>Categorias</title>
</head>
<body>
    <h1>Adicionar nova categoria</h1>
    <div class="mb-3">
    <form action="categoria_action.php" method="POST">
    <label for="exampleFormControlInput1" class="form-label" >Nome Da Categoria</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="name" id="name" placeholder="Name"> <br>
    </div>
    </form>
</body>
</html>