<?php

class Servico {
    
    private $idservico;
    private $descricao;
    private $dtinicio;
    private $dtfim;
    private $valor;
    private $nota;
    private $comentario;
    private $status_;
    private $cliente;
    private $fisico;
    private $juridico;
    private $area;
    private $endereco;
       
    public function getIdservico() {
        return $this->idservico;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDtinicio() {
        return $this->dtinicio;
    }

    public function getDtfim() {
        return $this->dtfim;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getStatus_() {
        return $this->status_;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getFisico() {
        return $this->fisico;
    }

    public function getJuridico() {
        return $this->juridico;
    }

    public function getArea() {
        return $this->area;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setIdservico($idservico) {
        $this->idservico = $idservico;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDtinicio($dtinicio) {
        $this->dtinicio = $dtinicio;
    }

    public function setDtfim($dtfim) {
        $this->dtfim = $dtfim;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setStatus_($status_) {
        $this->status_ = $status_;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setFisico($fisico) {
        $this->fisico = $fisico;
    }

    public function setJuridico($juridico) {
        $this->juridico = $juridico;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
}
