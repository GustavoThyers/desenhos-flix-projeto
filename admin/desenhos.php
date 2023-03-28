<?php
require '../config.php';
require_once '../dao/DesenhosDaoMySql.php';
require_once '../models/Desenhos.php';


if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}
$desenhoDao = new DesenhosDaoMySql($pdo);

$desenho = $desenhoDao->read();





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
    <div class="container-fluid">
    <a style="margin-top:20px; margin-bottom:20px;" style="text-decoration:none; color:white;" href="adicionar.php" class="btn btn-primary">Adicionar um desenho</a>
    
    <table class='table table-striped table-sm' style="width:1700px">
    <thead class="table-dark">
        <tr >
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ano Lançamento</th>
            <th>Classificação indicativa</th>
            <th>Numero de temporadas</th>
            <th>Numero de Episodios</th>
            <th>Estudio</th>
            <th>Url Poster</th>
            <th>Categoria Id</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($desenho as $item): ?>
    
        <tr>
        
                
            
            <td><?=$item['titulo']?></td>
            <td ><?=$item['descricao']?></td>
            <td><?=$item['ano_lancamento']?></td>
            <td><?=$item['classificacao_indicativa']?></td>
            <td><?=$item['num_temporadas']?></td>
            <td><?=$item['num_episodios']?></td>
            <td><?=$item['estudio_animacao']?></td>
            <td ><img style="width:100px" src="<?=$item['poster_url']?>"></td>
            <td><?=$item['categoria_id'] ?></td>

            
        </tr>
        
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>