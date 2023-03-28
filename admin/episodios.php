<?php
require '../config.php';
require_once '../dao/EpisodiosDaoMySql.php';
require_once '../models/Desenhos.php';

if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}

$episodioDao = new EpisodiosDaoMySql($pdo);

$episodio = $episodioDao->read();





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
    <a style="text-decoration:none; color:white;" href="adicionarEpisodio.php" class="btn btn-primary">Adicionar um Episodio</a>

    
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nome do Episodio</th>
            <th>Url</th>
            <th>Desenho</th>
           
        </tr>
    </thead>
        <?php foreach ($episodio as $item): ?>
        <tr>
        
                
            
            <td><?=$item['nome_episodio']?></td>
            <td><?=$item['url_episodio']?></td>
            <td><?=$item['id_desenho']?></td>
                       
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>