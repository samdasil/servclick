<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fisico
 *
 * @author Neturno
 */

require_once 'Profissional.php';

class Fisico extends Profissional{
    
    private $cpf;
    private $nome;
    private $foto;
    
    public function getCpf() {
        return $this->cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

}
