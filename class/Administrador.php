<?php

class Administrador extends Usuario{
    
    private $idadmin;
    private $nome;
    private $dtcadastro;
    private $status;
    
    public function getIdadmin() {
        return $this->idadmin;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDtcadastro() {
        return $this->dtcadastro;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setIdadmin($idadmin) {
        $this->idadmin = $idadmin;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDtcadastro($dtcadastro) {
        $this->dtcadastro = $dtcadastro;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
}
