<?php
require_once '../models/Desenhos.php';



class DesenhosDaoMySql  implements DesenhoDao{

    private $pdo;

    //crio o pdo
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }


    public function add(Desenho $d){
        $sql = $this->pdo->prepare('INSERT INTO desenhos (
            titulo,
            descricao,
            ano_lancamento,
            classificacao_indicativa,
            num_temporadas,
            num_episodios,
            estudio_animacao,
            poster_url,
            categoria_id
        ) VALUES (
            :titulo,
            :descricao,
            :ano,
            :classificacao,
            :temporadas,
            :episodios,
            :estudio,
            :url,
            :categoria
        )');

        $sql->bindValue(':titulo', $d->titulo);
        $sql->bindValue(':descricao', $d->descricao);
        $sql->bindValue(':ano', $d->ano);
        $sql->bindValue(':classificacao', $d->classificacao);
        $sql->bindValue(':temporadas', $d->temporadas);
        $sql->bindValue(':episodios', $d->episodios);
        $sql->bindValue(':estudio', $d->estudio);
        $sql->bindValue(':url', $d->url);
        $sql->bindValue(':categoria', $d->categoria);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

    public function listCategoria(){
        $sql = $this->pdo->prepare('SELECT * FROM categorias');
        $sql->execute();

        $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
        var_dump($categorias);
        
    }

    

    public function read(){
        $sql = $this->pdo->prepare ('SELECT * FROM desenhos');
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;
            
        }

        return false;
    }

    public function findById($id){
        $sql = $this->pdo->prepare('SELECT * FROM desenhos WHERE id = :id ');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data; 
        }
        return false;
    }

    
    public  function PegarCategoria($id_categoria){
        $sql = $this->pdo->prepare('SELECT * FROM desenhos WHERE categoria_id = :id');
        $sql->bindValue(':id', $id_categoria);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;
        }
    }


}




?>