<?php

class Categoria {
    
    private $idcategoria;
    private $descricao;
    
    public function getIdcategoria() {
        return $this->idcategoria;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
}
