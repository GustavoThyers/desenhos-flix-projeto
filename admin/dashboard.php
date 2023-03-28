<?php
require '../config.php';
require_once '../dao/UserDaoMySql.php';

if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}

$id = $_SESSION['id'];



$UserDao = new UserDaoMySql($pdo);
$idUser = $UserDao->findById($id);


?>
<?php foreach ($idUser as $item) : ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <title>Document</title>
    </head>
    <body>

    <div class="alert alert-info" role="alert">
        <h1 class="text-center" style="color:black;"> Bem vindo(a) <?=$item['nome_usuario']?></h1>
    </div>
    
        <?php endforeach ?>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <p class="text-center">Paginas liberadas : <br>
            </a>
            <a href="userList.php" class="list-group-item list-group-item-action">Todos Os Usuarios Cadastrados</a>
            <a href="adicionar.php" class="list-group-item list-group-item-action">Adicionar um desenho</a>
            <a href="adicionarEpisodio.php" class="list-group-item list-group-item-action">Adicionar um episodio</a>
            <a href="desenhos.php" class="list-group-item list-group-item-action">Lista de desenhos</a>
            <a href="episodios.php" class="list-group-item list-group-item-action">episodios.php</a>
            <a href="../dao/index.php" class="list-group-item list-group-item-action">Ir para Home</a>

        </div>
        
        


    
<script src="../assets/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
