<?php

class Juridico extends Profissional{
    
    private $idjuridico;
    private $cnpj;
    private $razaosocial;
    private $nomefantasia;
    private $responsavel;
    private $logo;
    
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

    public function getLogo() {
        return $this->logo;
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

    public function setLogo($logo) {
        $this->logo = $logo;
    }
    
}
