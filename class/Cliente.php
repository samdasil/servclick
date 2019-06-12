<?php

class Cliente extends Usuario{
    
    private $idcliente;
    private $cpf;
    private $foto;
    private $nome;
    private $fone;
    private $email;
    private $endereco;
    
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFone() {
        return $this->fone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
}