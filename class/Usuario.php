<?php

class Usuario {
    
    private $login;
    private $senha;
    private $perfil;
    
    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->perfil;
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
    
}
