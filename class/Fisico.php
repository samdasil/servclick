<?php

class Fisico extends Profissional{
    
    private $idfisico;
    private $cpf;
    private $nome;
    
    public function getIdfisico() {
        return $this->idfisico;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdfisico($idfisico) {
        $this->idfisico = $idfisico;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}
