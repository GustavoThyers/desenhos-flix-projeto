<?php


class Episodios{
    public $id;
    public $nome_episodio;
    public $url_episodio;
    public $id_desenho;
    


    public function setNome($n){
        $this->nome_episodio = $n;

    }

    public function getNome(){
        return $nome_episodio;
    }

    public function setIdDesenho($i){
        $this->id_desenho = $i;


    }

    public function getIdDesenho(){
        return $this->id_desenho;
    }

    public function setUrlEpisodio($d){
        $this->url_episodio = $d;


    }

    public function getUrlEpisodio(){
        return $this->url_episodio;
    }
}

interface EpisodiosDao{
    public function insert(Episodios $e);
}
