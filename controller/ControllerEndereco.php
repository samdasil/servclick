<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCliente
 *
 * @author Neturno
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/class/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/class/Endereco.php';

class ControllerEndereco{

    public function cadastrar($dados)
    {

        $endereco = new Endereco; 
        $cliente  = new Cliente;

        $endereco->setCep($dados['cep']);
        $endereco->setLogradouro($dados['logradouro']);
        $endereco->setCidade($dados['cidade']);
        $endereco->setBairro($dados['bairro']);
        $endereco->setEstado($dados['estado']);
        $endereco->setNumero($dados['numero']);
        $endereco->setComplemento($dados['complemento']);
        $endereco->setCliente($cliente->setIdcliente()->$dados['idcliente']);

        $EnderecoDao   = new EnderecoDao;

        $result = $enderecoDao->cadastrarEndereco($endereco);


        if(!$result){

                echo "<script>alert('Erro ao cadastrar endereço na base de dados!: '".$result.");</script>";

                echo "<script>window.location = 'view/cliente/cadastro.php';</script>";

        }else{

                echo "<script>alert('Seu cadastro foi efetuado com sucesso!');</script>";

                echo "<script>window.location = 'index.php';</script>";

        }

    }

}

