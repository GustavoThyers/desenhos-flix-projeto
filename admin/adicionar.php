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
$categoria = $desenhoDao->listCategoria();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="stylep.c">

    <title>Login</title>
</head>
<body>
    <div class="conteiner">
        <nav>
            <div class="navbar">
                <p class="titlte-navbar"> <span style="background-color:red; padding:10px;"> TH </span> FILMES</p>
             
            </div>
        </nav>

        <section>
        <div class="mb-3">
            <form action="adicionar_action.php" method ="POST">
                <label for="exampleFormControlInput1" class="form-label" >Nome Do desenho</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" id="nome" placeholder="Name"> <br>
                </div>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Sinopse</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" id="descricao" rows="3"></textarea> <br>

                <label for="exampleFormControlInput1" class="form-label" >Ano de Lançamento</label>
                <input type="number" class="form-control" id="exampleFormControlInput1"  name="ano" id="ano" placeholder="Ano"> <br>
                </div>

                <label for="exampleFormControlInput1" class="form-label" >Classificacao Indicativa</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="classificacao" id="classificacao" placeholder="Classificaçao"> <br>
                </div>

                <label for="exampleFormControlInput1" class="form-label" >Numero de temporada</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="temporadas" id="temporadas" placeholder="Temporadas"> <br>
                </div>

                <label for="exampleFormControlInput1" class="form-label" >Numero de episodios</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="episodios" id="episodios" placeholder="Episodios"> <br>
                </div>

                <label for="exampleFormControlInput1" class="form-label" >Estudio</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="estudio" id="estudio" placeholder="Estudio"> <br>
                </div>

                <label for="exampleFormControlInput1" class="form-label" >Numero de episodios</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="url" id="url"  placeholder="URL"> <br>
                </div>
            </form>
        </div>
            <div class="conteiner-section">
                <div class="itens-conteiner">
                    <div class="itens">
                        <p class="title">Adicionar desenho</p>
                       
                            
                            <label for="categoria_id">Categoria:</label>
                            <select name="categoria_id" id="categoria_id">
                                 <?php foreach ($categoria as $cat): ?>
                                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome_categoria']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                            <div class="button-input">
                                <button class="button" type="submit">Enviar</button>
                            </div>
                        </form>
                           
                        <div class="line1"></div>
                        <p class="or">or</p>    
                        <div class="line2"></div>

                        <a class="create" href="">Create new Account</a>

                        <a class="forgot" href="">Forgot Accont</a>

                        <a class="forgot" href="">Not Now</a>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</body>
</html>