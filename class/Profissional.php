<?php


class Profissional extends Usuario{
    
    private $descricao;
    private $fixo;
    private $fone;
    private $email;
    private $foto;
    private $endereco;
    private $area;
    private $pagina;
    private $admin;
        
    public function getDescricao(){
        return $this->descricao;
    }
    public function getFixo(){
        return $this->fixo;
    }
    public function getFone(){
        return $this->fone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getArea(){
        return $this->area;
    }
    public function getPagina(){
        return $this->pagina;
    }
    public function getAdmin(){
        return $this->admin;
    }
    
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    public function setFixo($fixo){
        $this->fixo=$fixo;
    }
    public function setFone($fone){
        $this->fone=$fone;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setFoto($foto){
        $this->foto=$foto;
    }
    public function setEndereco($endereco){
        $this->endereco=$endereco;
    }
    public function setArea($area){
        $this->area=$area;
    }
    public function setPagina($pagina){
        $this->pagina=$pagina;
    }
    public function setAdmin($admin){
        $this->admin=$admin;
    }
    
}
