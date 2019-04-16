<?php


class Profissional extends Usuario{
    
    private $descricao;
    private $email;
    private $fone;
    private $fixo;
    private $pagina;
    private $status;
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFone() {
        return $this->fone;
    }

    public function getFixo() {
        return $this->fixo;
    }

    public function getPagina() {
        return $this->pagina;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }

    public function setFixo($fixo) {
        $this->fixo = $fixo;
    }

    public function setPagina($pagina) {
        $this->pagina = $pagina;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
}
