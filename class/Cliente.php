<?php

class Cliente extends Usuario{
    
    private $idcliente;
    private $cpf;
    private $nome;
    private $email;
    private $fone;
    private $foto;
    private $status_;
    private $dtcadastro;
    private $endereco;
    
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

    public function getStatus_() {
        return $this->status_;
    }

    public function getDtcadastro() {
        return $this->dtcadastro;
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

    public function setStatus_($status_) {
        $this->status_ = $status_;
    }

    public function setDtcadastro($dtcadastro) {
        $this->dtcadastro = $dtcadastro;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
}