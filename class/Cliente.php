<?php

class Cliente extends Usuario{
    
    private $idcliente;
    private $cpf;
    private $nome;
    private $email;
    private $fone;
    private $foto;
    private $status;
    
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFone() {
        return $this->fone;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
}