<?php

require '../config.php';
require_once '../dao/EpisodiosDaoMySql.php';
require_once '../models/Episodio.php';

if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}
$nome = filter_input(INPUT_POST,'nome_ep');
$desenho = filter_input(INPUT_POST,'desenho');
$url = filter_input(INPUT_POST,'url');



$novoEpisodio = new Episodios();
$episodioDao = new EpisodiosDaoMySql($pdo);



if ($nome & $desenho && $url) {
    $novoEpisodio->setNome($nome);
    $novoEpisodio->setUrlEpisodio($url);
    $novoEpisodio->setIdDesenho($desenho);
    

    $episodioDao->insert($novoEpisodio);
    header('Location:episodios.php');


}else{
    header('Location:index.php');
}


?>