<?php

class Juridico extends Profissional{
    
    private $idjuridico;
    private $cnpj;
    private $razaosocial;
    private $nomefantasia;
    private $responsavel;
    
    public function getIdjuridico() {
        return $this->idjuridico;
    }

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

    public function setIdjuridico($idjuridico) {
        $this->idjuridico = $idjuridico;
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

}
