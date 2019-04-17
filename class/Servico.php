<?php

class Servico {
    
    private $idservico;
    private $dtinicio;
    private $dtfim;
    private $valor;
    private $endereco;
    private $cliente;
    private $profissional;
       
    public function getIdservico() {
        return $this->idservico;
    }

    public function getDtinicio() {
        return $this->dtinicio;
    }

    public function getDtfim() {
        return $this->dtfim;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getEndereco() {
        return $this->endereco;
    }
    
     public function getCliente() {
        return $this->cliente;
    }

    public function getProfissional() {
        return $this->profissional;
    }

    public function setIdservico($idservico) {
        $this->idservico = $idservico;
    }

    public function setDtinicio($dtinicio) {
        $this->dtinicio = $dtinicio;
    }

    public function setDtfim($dtfim) {
        $this->dtfim = $dtfim;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setProfissional($profissional) {
        $this->profissional = $profissional;
    }


    
}
