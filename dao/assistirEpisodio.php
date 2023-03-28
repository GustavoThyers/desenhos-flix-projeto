

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

$episodios = $episodioDAO->listEpisodiosUrl($id);

$url = $episodios[0]['url_episodio'];






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<iframe width="1360" height="600"  src="<?=$url?>" frameborder="0"></iframe>

</body>
<style>
        @media(max-width:400px){
            iframe{
                width: 340px;
                height: 400px;
            }
        }
    </style>
</html>