<?php

class ControllerEndereco{

    public function cadastrar($dados)
    {

        $endereco    = new Endereco(); 
        $EnderecoDao = new EnderecoDao();
        $cliente     = new Cliente();

        $endereco->setCep($dados['cep']);
        $endereco->setLogradouro($dados['logradouro']);
        $endereco->setCidade($dados['cidade']);
        $endereco->setBairro($dados['bairro']);
        $endereco->setEstado($dados['estado']);
        $endereco->setNumero($dados['numero']);
        $endereco->setComplemento($dados['complemento']);

        $result = $enderecoDao->cadastrar($endereco);


        if(!$result){

            $endereco->setIdendereco($result[0]['idendereco']); 
            $endereco->setCep($result[0]['cep']); 
            $endereco->setLogradouro($result[0]['logradouro']); 
            $endereco->setCidade($result[0]['cidade']); 
            $endereco->setBairro($result[0]['bairro']); 
            $endereco->setEstado($result[0]['estado']); 
            $endereco->setNumero($result[0]['numero']); 
            $endereco->setComplemento($result[0]['complemento']);

            return $endereco;

        } else {

            return false;

        }

    }


    public function carregarEndereco($idendereco)
    {
        $endereco = new Endereco();
        $edao     = new EnderecoDAO();

        $result  = $edao->carregarEndereco($idendereco);
        
        $endereco->setCep($result[0]['cep']); 
        $endereco->setLogradouro($result[0]['logradouro']); 
        $endereco->setCidade($result[0]['cidade']); 
        $endereco->setBairro($result[0]['bairro']); 
        $endereco->setEstado($result[0]['estado']); 
        $endereco->setNumero($result[0]['numero']); 
        $endereco->setComplemento($result[0]['complemento']);

        return $endereco;

    }

    public function editarEndereco(Endereco $endereco)
    {
        $endereco    = new Endereco(); 
        $EnderecoDao = new EnderecoDao();
        $cliente     = new Cliente();

        $endereco->setCep($endereco->getCep());
        $endereco->setLogradouro($endereco->getLogradouro());
        $endereco->setCidade($endereco->getCidade());
        $endereco->setBairro($endereco->getBairro());
        $endereco->setEstado($endereco->getEstado());
        $endereco->setNumero($endereco->getNumero());
        $endereco->setComplemento($endereco->getComplemento());

        $result = $enderecoDao->editar($endereco);

        if(!$result){

            return false;

        }else{

            return true;

        }        
    }   

}

