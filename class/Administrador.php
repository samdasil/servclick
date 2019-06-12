<?php

class Administrador extends Usuario{
    
    private $idadmin;
    private $nome;
    
    
    public function getIdadmin() {
        return $this->idadmin;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdadmin($idadmin) {
        $this->idadmin = $idadmin;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
}
