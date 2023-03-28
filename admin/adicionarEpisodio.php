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

$pegar = $desenhoDao->read();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <title>Login</title>
</head>
<body>
    <div class="conteiner">
        <nav>
            <div class="navbar">
                <p class="titlte-navbar">TH FILMES</p>
            </div>
        </nav>

        <section>
            <div class="conteiner-section">
                <div class="itens-conteiner">
                    <div class="itens">
                        <p class="title">Adicionar desenho</p>
                        <form  action="adicionarEp_action.php" method ="POST">
                        <label for="exampleFormControlInput1" class="form-label" >Nome Do desenho</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" id="nome" placeholder="Name"> <br>

                            
                            <label for="categoria_id">Desenhos::</label>
                            <select name="desenho" id="desenho">
                                 <?php foreach ($pegar as $item): ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['titulo']; ?></option>
                                    <?php endforeach; ?>
                            </select> <br> <br>

                            <input class="input" type="text" placeholder="Url Episodio" name="url" id="url"> <br>

                            <div class="button-input">
                                <button class="button" type="submit">Enviar</button>
                            </div>
                        </form>
                       

                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>