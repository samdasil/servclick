<?php

class ControllerEndereco{

    public function cadastrar($dados)
    {

        $endereco    = new Endereco; 
        $EnderecoDao = new EnderecoDao;
        $cliente     = new Cliente;

        $endereco->setCep($dados['cep']);
        $endereco->setLogradouro($dados['logradouro']);
        $endereco->setCidade($dados['cidade']);
        $endereco->setBairro($dados['bairro']);
        $endereco->setEstado($dados['estado']);
        $endereco->setNumero($dados['numero']);
        $endereco->setComplemento($dados['complemento']);
        $endereco->setCliente($cliente->setIdcliente()->$dados['idcliente']);

        $result = $enderecoDao->cadastrar($endereco);


        if(!$result){

                echo "<script>alert('Erro ao cadastrar endereço na base de dados!: '".$result.");</script>";

                echo "<script>window.location = 'view/cliente/cadastro.php';</script>";

        }else{

                echo "<script>alert('Seu cadastro foi efetuado com sucesso!');</script>";

                echo "<script>window.location = 'index.php';</script>";

        }

    }

    public function carregarEnderecoCliente($idcliente)
    {    

        $endereco = new Endereco();
        $edao     = new EnderecoDAO();

        if($result  = $edao->carregarEnderecoCliente($idcliente)){
            $endereco->setCep($result[0]['cep']); 
            $endereco->setLogradouro($result[0]['logradouro']); 
            $endereco->setCidade($result[0]['cidade']); 
            $endereco->setBairro($result[0]['bairro']); 
            $endereco->setEstado($result[0]['estado']); 
            $endereco->setNumero($result[0]['numero']); 
            $endereco->setComplemento($result[0]['complemento']); 
            $endereco->setCliente($result[0]['cliente']); 

            return $endereco;        
        }else{
            return false;
        }

    }

    public function carregarEnderecoFisico($idfisico)
    {    

        $endereco = new Endereco();
        $edao     = new EnderecoDAO();

        $result  = $edao->carregarEnderecoFisico($idfisico);
        
        $endereco->setCep($result[0]['cep']); 
        $endereco->setLogradouro($result[0]['logradouro']); 
        $endereco->setCidade($result[0]['cidade']); 
        $endereco->setBairro($result[0]['bairro']); 
        $endereco->setEstado($result[0]['estado']); 
        $endereco->setNumero($result[0]['numero']); 
        $endereco->setComplemento($result[0]['complemento']); 
        $endereco->setFisico($result[0]['fisico']); 

        return $endereco;

    }

    public function carregarEnderecoJuridico($idjuridico)
    {    

        $endereco = new Endereco();
        $edao     = new EnderecoDAO();

        $result  = $edao->carregarEnderecoJuridico($idjuridico);
        
        $endereco->setCep($result[0]['cep']); 
        $endereco->setLogradouro($result[0]['logradouro']); 
        $endereco->setCidade($result[0]['cidade']); 
        $endereco->setBairro($result[0]['bairro']); 
        $endereco->setEstado($result[0]['estado']); 
        $endereco->setNumero($result[0]['numero']); 
        $endereco->setComplemento($result[0]['complemento']); 
        $endereco->setJuridico($result[0]['juridico']); 

        return $endereco;

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
        $endereco->setComplemento($result[0]['complemento']);; 

        return $endereco;

    }

}

