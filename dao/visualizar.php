<?php

require '../config.php';
require_once 'DesenhosDaoMySql.php';

$id = filter_input(INPUT_GET,'id');

$novoDesenho = new DesenhosDaoMySql($pdo);
if ($id) {
    $pegar = $novoDesenho->findById($id);
    

}else{
    header('Location:index.php');
}

if (!isset($_SESSION['id'])) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: login.php');
    exit();
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">    

    <link rel="stylesheet" href="../style8.css">
    <title>Document</title>
</head>
<body>
<div class="conteiner">
    <div class="header">
        <?php foreach ($pegar as $item) : ?>
            
        <div class="background">
            <img src="<?= $item['poster_url'];?>" alt="">
        </div>
        <?php endforeach; ?>
            <nav>
                <div class="navbar">

                    <div class="logo">
                        <p><span class='red-span'>TH</span> FILMES</p>
                    </div>
                    <div class="icone">
                        <span id="icone" class="material-icons" onclick='clickMenu()'>menu</span>
                    </div>
                    <ul id="itens">
                        <li><a href="">Home</a></li>
                        <li><a href="">Filmes</a></li>
                        <li><a href="">Series</a></li>
                        <li><a href="">Contatos</a></li>
                        
                    </ul>
                </div>

            </nav>
            
                
        </div>
    </div>    

    <div class="itens-conteiner">
        <div class="itens">
        <?php foreach ($pegar as $item) : ?>
            
            <h1><?=$item['titulo']?></h1>
            <p class="desc">Assista aqui todas as temporadas de <?=$item['titulo']?> Sozinho ou Com sua familia !</p>
            <?php foreach ($pegar as $item) : ?>
                   <a href="listaEpisodios.php?id=<?=$item['id']?>">Assistir</a>
                    <?php endforeach ?>
          

            <?php endforeach; ?>
        </div>
    </div>


    <div class='info-conteiner'>
        <div class='info'>
            <div class="area1">
               <?php foreach ($pegar as $item) : ?>
            
            <h3>Estudio: <span style="font-size:26px;"><?=$item['estudio_animacao'] ?></span></h3>

            <p>Ano de Lançamento: <span><?=$item['ano_lancamento']?></span> </p>


            <p class='descricao'> descricao: <span><?=$item['descricao']?></span> </p>
            </div>

            <div class="area2">
            
                <p>Numero de temporadas: <span><?=$item['num_temporadas']?> Temporadas</span> </p>

                <p>Numeros de episodios: <span><?=$item['num_episodios']?> Episodios</span> </p>

                <p>Classificão indicativa: <span>
                <?php if($item['classificacao_indicativa'] == 1): ?>
                    Livre para todos
                <?php else: ?>
                    <?php echo 'proibido para menores de '. $item['classificacao_indicativa']. ' anos'; ?>
                <?php endif; ?>
                </span></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
        function clickMenu(){
        
        if (itens.style.display == 'block') {
            itens.style.display = 'none';
        }else{
            itens.style.display = 'block';
            
        }
    }
    </script>
</body>
</html>