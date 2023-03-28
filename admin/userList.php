<?php
require '../config.php';
require_once '../dao/UserDaoMySql.php';
if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}
$UserDao = new UserDaoMySql($pdo);
$usuarios = $UserDao->listUser();



?>

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
<p style="text-decoration:none; color:white;"  class="btn btn-primary">Todos os Usuarios</p>

    
<table class="table table-striped">
<thead class="table-dark">
    <tr>
        <th>ID Do Usuario</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Admin</th>
       
    </tr>
</thead>
    <?php foreach($usuarios as $item): ?>
    <tr>
    
            
        
        <td><?=$item['id']?></td>
        <td><?=$item['nome_usuario']?></td>
        <td><?=$item['email']?></td>
        <td><?=$item['is_admin']?></td>
                   
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>