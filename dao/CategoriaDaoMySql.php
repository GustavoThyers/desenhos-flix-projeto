<?php
require '../config.php';
require_once '../models/Categoria.php';

class CategoriaDaoMySql implements CategoriaDao{
    private $pdo;

    //crio o pdo
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function create(Categoria $c){
        $sql = $this->pdo->prepare('INSERT INTO categorias (nome_categoria) VALUES (:nome)');
        $sql->bindValue(':nome', $c->getNomeCategoria());
        $sql->execute();


    }
   

}
