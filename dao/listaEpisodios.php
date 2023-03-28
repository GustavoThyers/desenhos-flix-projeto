

<?php

require '../config.php';
require_once 'DesenhosDaoMySql.php';
require_once 'EpisodiosDaoMySql.php';
if (!isset($_SESSION['id'])) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: login.php');
    exit();
}

$id = filter_input(INPUT_GET,'id');
$episodioDAO = new EpisodiosDAOMySql($pdo);

$novoDesenho = new DesenhosDaoMySql($pdo);
if ($id) {
    $pegar = $novoDesenho->findById($id);
    $episodios = $episodioDAO->buscarEpisodiosPorDesenho($id);
    

}else{
    header('Location:index.php');
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">    

    <link rel="stylesheet" href="../style9.css">
    <title>Document</title>
</head>
<body>
<div class="conteiner">
    <div class="header" style="height:400px">
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
                        <li class="button-nav"><a href="">Assistir</a></li>
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
            
                   
          

            <?php endforeach; ?>
        </div>
    </div>

    <div style="height:1200px" class="ep-conteiner">
        <div class="episodios">
            <?php foreach ($episodios as $episodio) : ?>
                <p><?= $episodio['id'] - 1 ?>: </p>
                <p><?= $episodio['nome_episodio'] ?>: </p>
                <a href="assistirEpisodio.php?id=<?= $episodio['id'] ?>">Assistir</a>
                
            <?php endforeach ?>
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