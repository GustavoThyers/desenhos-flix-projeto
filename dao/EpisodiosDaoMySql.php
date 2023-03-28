<?php
require '../config.php';
require_once '../models/Episodio.php';


class EpisodiosDaoMySql implements EpisodiosDao{
    private $pdo;

    //crio o pdo
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }


    public function insert(Episodios $e){
        $sql = $this->pdo->prepare('INSERT INTO episodios (nome_episodio, url_episodio, id_desenho) VALUES (:nome, :url, :id )');

        $sql->bindValue(':nome', $e->nome_episodio);
        $sql->bindValue(':url', $e->url_episodio);
        $sql->bindValue(':id', $e->id_desenho);
      
        $sql->execute();
    
    }

    public function read(){
        $sql = $this->pdo->prepare ('SELECT * FROM episodios');
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;
            
        }

        return false;
    }

    public function listEpisodiosUrl($id){
        $sql = $this->pdo->prepare('SELECT * FROM episodios WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        $episodios = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $episodios;
        
    }

    public function buscarEpisodiosPorDesenho($idDesenho) {
        $consulta = "SELECT * FROM episodios WHERE id_Desenho = $idDesenho";
        $resultado = $this->pdo->query($consulta);
        $episodios = array();
        while ($episodio = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $episodios[] = $episodio;
        }
        return $episodios;
    }



}