<?php

class Desenho{
    public $id;
    public $titulo;
    public $descrição;
    public $ano;
    public $classificacao;
    public $temporadas;
    public $episodios;
    public $estudio;
    public $url;
    public $categoria;

    public function setTitulo($t){
        $this->titulo = $t;
    }

    public function getTitulo(){
        return $this->titulo;
    }


    public function setDescricao($d){
        $this->descricao = $d;
    }

    public function getDescricao(){
        return $this->descricao ;
    }

    public function setAno($a){
        $this->ano = $a;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setClassificacao($c){
        $this->classificacao = $c;
    }

    public function getClassificacao(){
         return $this->classificacao;
    }

    public function setTemporadas($t){
        $this->temporadas = $t;
    }

    public function getTemporadas(){
        return $this->temporadas;
    }

    public function setEpisodios($e){
        $this->episodios = $e;
    }

    public function getEpisodios(){
        return $this->episodios;
    }

    public function setEstudio($e){
        $this->estudio = $e;
    }

    public function getEstudio(){
        return $this->estudio;
    }

    public function setUrl($u){
        $this->url = $u;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setCategoria($c){
        $this->categoria = $c;
    }

    public function getCategroia(){
        return $this->categoria;
    }


}

interface DesenhoDao{
    public function add(Desenho $d);
}


?>