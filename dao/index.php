<?php
require '../config.php';
require 'DesenhosDaoMySql.php';


if (!isset($_SESSION['id'])) {
    // Se o usuário não tiver uma sessão válida, redirecione-o para a página de login ou exiba uma mensagem de erro
    header('Location: ../login/login.php');
    exit();
}




$desenhoDao = new DesenhosDaoMySql($pdo);

$desenho = $desenhoDao->read();



foreach ($desenho as $item) {
  $id = $item['categoria_id'] = 3;
}

foreach ($desenho as $item) {
  $id1 = $item['categoria_id'] = 1;
}






$categoria = $desenhoDao->PegarCategoria($id);
$categoria1 = $desenhoDao->PegarCategoria($id1);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">    
    <link rel="stylesheet" href="../style6.css">
    <title>Document</title>
</head>
<body>
<div class="conteiner">

<div class="header">
    <div class="img-banner">
        <nav>
            <div class="navbar">

                <div class="logo">
                    <p><span>TH</span> FILMES</p>
                </div>
                <div class="icone">
                        <span id="icone" class="material-icons" onclick='clickMenu()'>menu</span>
                    </div>
                <ul id='itens'>
                    
 
                    <li><a href="">Home</a></li>
                    <li><a href="">Filmes</a></li>
                    <li><a href="">Series</a></li>
                    <li><a href="">Contatos</a></li>
                    
                    <li class="button-nav"><a class="button-nave" href="../login/logout.php">Sair</a></li>
                    

                </ul>
                
            </div>

        </nav>
        
            
</div>    

<div class="title-cards">
    <h1>Filmes</h1>
</div>


<div class="cards">
    
    <?php foreach ($categoria as $item) : ?>
      
      <div class="card-iten">
      <a href="visualizar.php?id=<?=$item['id']?>"> <img src="<?=$item['poster_url'];?>"> </a>
        <span class="play-text">PLAY</span>

      </div>
      <?php endforeach; ?>
      
</div>





<div class="title-cards">
    <h1>Desenhos</h1>
</div>



<div class="cards">
<?php foreach ($categoria1 as $item) : ?>
    
      <div class="card-iten">
      <a href="visualizar.php?id=<?=$item['id']?>"><img style="" src="<?=$item['poster_url']?>"></a>
        <span class="play-text">PLAY</span> </a>

      </div>

      <?php endforeach ?>

      
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