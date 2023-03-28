<?php
require '../config.php';
require_once '../dao/DesenhosDaoMySql.php';
require_once '../models/Desenhos.php';


if (($_SESSION['admin']) != 1) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../dao/index.php');
    exit();
}


$nome = filter_input(INPUT_POST,'nome');
$descricao = filter_input(INPUT_POST,'descricao');
$ano = filter_input(INPUT_POST,'ano');
$classificacao = filter_input(INPUT_POST,'classificacao');
$temporadas = filter_input(INPUT_POST,'temporadas');
$episodios = filter_input(INPUT_POST,'episodios');
$estudio = filter_input(INPUT_POST,'estudio');
$url = filter_input(INPUT_POST,'url');
$categoria = filter_input(INPUT_POST,'categoria_id');



if ($nome && $descricao && $ano && $classificacao && $temporadas && $episodios && $estudio && $url && $categoria) {
    $DesenhoDao = new DesenhosDaoMySql($pdo);
    $novoDesenho = new Desenho();
    $novoDesenho->setTitulo($nome);
$novoDesenho->setDescricao($descricao);
$novoDesenho->setAno($ano);
$novoDesenho->setClassificacao($classificacao);
$novoDesenho->setTemporadas($temporadas);
$novoDesenho->setEpisodios($episodios);
$novoDesenho->setEstudio($estudio);
$novoDesenho->setUrl($url);
$novoDesenho->setCategoria($categoria);

    $DesenhoDao->add($novoDesenho);
    header('Location:desenho.php');
    exit;

}else{
    header('Location:adicionar.php');
}



?>