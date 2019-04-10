<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juridico
 *
 * @author Neturno
 */

require_once 'Profissional.php';

class Juridico extends Profissional{
    
    private $cnpj;
    private $razaosocial;
    private $nomefantasia;
    private $responsavel;
    private $logo;
    
    public function getCnpj() {
        return $this->cnpj;
    }

    public function getRazaosocial() {
        return $this->razaosocial;
    }

    public function getNomefantasia() {
        return $this->nomefantasia;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setRazaosocial($razaosocial) {
        $this->razaosocial = $razaosocial;
    }

    public function setNomefantasia($nomefantasia) {
        $this->nomefantasia = $nomefantasia;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }
    
}
