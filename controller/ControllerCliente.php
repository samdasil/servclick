<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/model/dao/ClienteDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/model/dao/EnderecoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/class/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/class/Endereco.php';

class ControllerCliente{

    public function cadastrar($dados = null, $aFile = null)
    {

        if ( !isset($dados) ) return false;

        $cliente  = new Cliente;
        $endereco = new Endereco; 
        $clienteDao = new ClienteDao;
        $EnderecoDao   = new EnderecoDao;

        $cpf  = str_replace(".", "", str_replace("-", "", $dados['cpf']));
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

       // var_dump($_POST);
        $valida = $clienteDao->validaCpf($cpf);
        //var_dump($cpf);
        //exit;
        if ( $valida && isset($aFile) ) {

            $foto =  $dados['login'] . time('ss') . ".jpg";

            $cliente->setCpf($cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT));
            $cliente->setNome(ucwords($dados['nome']));
            $cliente->setEmail(strtolower($dados['email']));
            $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $cliente->setLogin(strtolower($dados['login']));
            $cliente->setSenha(base64_encode($dados['senha']));
            $cliente->setPerfil(2); // 2=cliente
            $cliente->setFoto($foto);
            $cliente->setStatus(1); //1=ativo 2=inativo

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setNumero($dados['numero']);
            $endereco->setComplemento($dados['complemento']);

            $result = $clienteDao->cadastrarCliente($cliente,$endereco);
            
            if ( $result === true ) {

                $target  = "assets/images/cliente/" . $foto;
                $tamanho = $aFile['foto']['size'];
                $imagem  = $aFile['foto']['name'];
                $path    = $aFile['foto']['tmp_name'];
                //var_dump($aFile);
                
                
                try {

                    move_uploaded_file($path, $target);                 
                    echo "<script>alert('Seu cadastro foi efetuado com sucesso!');</script>";
                    echo "<script>window.location = 'index.php';</script>";

                } catch (Exception $e) {
                    echo "<script>alert('Ocorreu um erro ao salvar a foto, mas seu cadastro foi realizado!');</script>";
                    echo "<script>window.location = 'index.php';</script>";
                }   
                
            } else {
                $erro = str_replace("'"," ",$result);
                //exit;
                echo "<script>alert('Erro: ".$erro."');</script>";
                echo "<script>window.location = 'view/cliente/cadastro.php';</script>";

            }
            
        } else {
            
            echo "<script>alert('CPF informado eh invalido');</script>";
            echo "<script>window.location = 'view/cliente/cadastro.php';</script>";            

        }

    }

    public function editar($dados, $id, $aFile = null)
    {

        $cliente  = new Cliente;
        $endereco = new Endereco; 
        $clienteDao = new ClienteDao;
        $EnderecoDao   = new EnderecoDao;

        $cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        $valida = $clienteDao->validaCpf($cpf);

        if($valida) {

            if ( isset($aFile['foto']['name']) && !empty($aFile) ) {
                $foto =  $dados['login'] . time('ss') . ".jpg";
                
            } else {
                $foto = $dados['img'];
            }

            $cliente->setCpf($cpf);
            $cliente->setNome(ucwords($dados['nome']));
            $cliente->setEmail(strtolower($dados['email']));
            $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $cliente->setLogin(strtolower($dados['login']));
            if(isset($dados['senha'])){
                $cliente->setSenha(base64_encode($dados['senha']));    
            }
            $cliente->setPerfil(2); // 2=cliente
            $cliente->setFoto($foto);
            $cliente->setStatus(1); //1=ativo 2=inativo

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setNumero($dados['numero']);
            $endereco->setComplemento($dados['complemento']);
            
            $result = $clienteDao->editarCliente($cliente,$endereco, $id);
            
            if( $result === true ){
                
                if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                    $target  = "assets/images/cliente/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    //var_dump($aFile);
                    
                    move_uploaded_file($path, $target);                 

                }

                echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                echo "<script>window.location = 'view/cliente/perfil.php';</script>";

            } else if ($result === false) {
                
                echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                echo "<script>window.location = 'view/cliente/perfil.php';</script>";
                                
            } else {
                $erro = str_replace("'"," ",$result);
                //exit;
                echo "<script>alert('Erro ao atualizar: ".$erro."');</script>";
                echo "<script>window.location = 'view/cliente/editar.php';</script>";

            }

        } else {
            
            echo "<script>alert('CPF informado eh invalido');</script>";
            echo "<script>window.location = 'view/cliente/cadastro.php';</script>";            

        }

    }

    public function desativar($id = null)
    {
        
        if ( is_null($id) ) return false;

        $clienteDao     = new ClienteDao;

        $result = $clienteDao->desativarCliente($id);

        if ( $result ) {

            echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
            echo "<script>window.location = 'index.php';</script>";

        } else {

            echo "<script>alert('Nao foi possivel desativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
            echo "<script>window.location = 'view/cliente/home.php';</script>";

        }

    }

}

