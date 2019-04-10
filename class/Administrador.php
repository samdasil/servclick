<?php

require_once 'Usuario.php';

class Administrador extends Usuario{
    
    private $nome;
    private $dtcadastro;
    private $status;
    
    public function getNome() {
        return $this->nome;
    }

    public function getDtcadastro() {
        return $this->dtcadastro;
    }

    public function getStatus() {
        return $this->status;
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
