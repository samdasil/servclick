<?php

class Usuario {
    
    private $login;
    private $senha;
    private $perfil;
    private $status_;
    private $dtcadastro;
    
    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function getStatus_() {
        return $this->status_;
    }

    public function getDtcadastro() {
        return $this->dtcadastro;
    }
    
    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function setStatus_($status_) {
        $this->status_ = $status_;
    }
    
    public function setDtcadastro($dtcadastro) {
        $this->dtcadastro = $dtcadastro;
    }

}
