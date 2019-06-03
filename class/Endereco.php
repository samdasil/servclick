<?php

class Endereco {
    
    private $idendereco;
    private $cep;
    private $logradouro;
    private $cidade;
    private $bairro;
    private $estado;
    private $numero;
    private $complemento;

    public function getIdendereco() {
        return $this->idendereco;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }


    public function setIdendereco($idendereco) {
        $this->idendereco = $idendereco;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    
}
