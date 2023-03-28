<?php

class Categoria{
    public $id;
    public $nome_categoria;

    public function setNomeCategoria($c){
        $this->nome_categoria = $c;
    }

    public function getNomeCategoria(){
        return $this->nome_categoria;
    }

}
interface CategoriaDao{
    public function create(Categoria $c);
}